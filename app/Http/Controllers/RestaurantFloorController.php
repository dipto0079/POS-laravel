<?php

namespace App\Http\Controllers;

use App\RestaurantFloor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;


class RestaurantFloorController extends Controller
{
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $floors = RestaurantFloor::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.sale.floor.index',compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.sale.floor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'positionArray' => 'required',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('floors.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        }else {
            # code...

            // $positionArray =$request->positionArray;
            // return $positionArray;
            // store

            $floor = new RestaurantFloor();
            $floor->name = $request->name;
            $floor->description = $request->description;
            $floor->position_array = $request->positionArray;
            $floor->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $floor->user_id = Auth::guard('restaurantUser')->id();
            $floor->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('floors.index');

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestaurantFloor  $restaurantFloor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($id)->user_id) {
            $floor = RestaurantFloor::find($id);

            $floorTables = json_encode($floor->floorTables->where('del_status', 'Live'));

            return view('pages.restaurant.sale.floor.show', compact('floor', 'floorTables'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RestaurantFloor  $restaurantFloor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        return 'edit';
        //dd($id);
        if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($id)->user_id) {
            $floor = RestaurantFloor::find($id);

            $floorTables = json_encode($floor->floorTables->where('del_status', 'Live'));

            return view('pages.restaurant.sale.floor.edit', compact('floor', 'floorTables'));
        } else {
            toastr()->error('You are not allowed to edit this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestaurantFloor  $restaurantFloor
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($id)->user_id) {
            $floor = RestaurantFloor::find($id);

            $floorTables = json_encode($floor->floorTables->where('del_status', 'Live'));

            return view('pages.restaurant.sale.floor.update', compact('floor', 'floorTables'));
        } else {
            toastr()->error('You are not allowed to edit this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestaurantFloor  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantFloor $restaurantFloor)
    {
        // return 'delete';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($id)->user_id) {
            $floor = RestaurantFloor::find($id);
            if ($floor) {
                $floor = RestaurantFloor::find($id);
                $floor->del_status = "Deleted";
                $floor->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('floors.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('floors.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }

    //update work
    public function updatefloor(Request $request,RestaurantFloor $restaurantFloor, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'positionArray' => 'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['position_array']=$request->positionArray;
        $data['restaurant_id']=Auth::guard('restaurantUser')->user()->restaurant_id;
        $data['user_id']=Auth::guard('restaurantUser')->id();
        //dd($data);
        DB::table('tbl_restaurant_floors')->where('id',$id)->update($data);
        toastr()->success('updated successfully.');
            // redirect
            return redirect()->route('floors.index');

    }

    //------------Wastes Report---------------

    public function WasteReport(){
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $wastes=DB::table('tbl_restaurant_wastes')
            ->join('tbl_restaurant_users','tbl_restaurant_wastes.user_id','tbl_restaurant_users.id')
            ->select('tbl_restaurant_wastes.*','tbl_restaurant_users.manager_name')
            ->where('tbl_restaurant_wastes.restaurant_id', $res_id)
            ->where('tbl_restaurant_wastes.del_status','=','Live')
            ->get();

        $loss=DB::table('tbl_restaurant_wastes')
            ->where('restaurant_id', $res_id)
            ->sum('total_loss');

         // dd($loss);
      return view('pages.restaurant.Report.wastesReport.wastesReport',compact('wastes','loss'));
    }

    public function DetailsWasteReport($id){

        $DetailsWaste=DB::table('tbl_restaurant_wastes')
            ->join('tbl_restaurant_users','tbl_restaurant_wastes.user_id','tbl_restaurant_users.id')
            ->select('tbl_restaurant_wastes.*','tbl_restaurant_users.manager_name')
            ->where('tbl_restaurant_wastes.id', $id)
            ->where('tbl_restaurant_wastes.del_status','=','Live')
                        ->first();

       // dd($DetailsWaste);

       return view('pages.restaurant.Report.wastesReport.DetailswastesReport',compact('DetailsWaste'));
    }

    public function ExpenseReport(){

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $restaurant_expenses=DB::table('tbl_restaurant_expenses')
            ->join('tbl_restaurant_expense_items','tbl_restaurant_expenses.cat_id','tbl_restaurant_expense_items.id')
            ->join('tbl_restaurant_users','tbl_restaurant_expenses.restaurant_id','tbl_restaurant_users.restaurant_id')
            ->select('tbl_restaurant_expenses.*','tbl_restaurant_expense_items.name','tbl_restaurant_users.manager_name')
            ->where('tbl_restaurant_expenses.restaurant_id', $res_id)
            ->where('tbl_restaurant_expenses.del_status','=','Live')
            ->get();

        $loss=DB::table('tbl_restaurant_expenses')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->sum('amount');

        return view('pages.restaurant.Report.ExpenseReport.expenseReport',compact('restaurant_expenses','loss'));
    }

    public function DetailsExpenseReport($id){
        $restaurant_expenses=DB::table('tbl_restaurant_expenses')
            ->join('tbl_restaurant_expense_items','tbl_restaurant_expenses.cat_id','tbl_restaurant_expense_items.id')
            ->join('tbl_restaurant_users','tbl_restaurant_expenses.restaurant_id','tbl_restaurant_users.restaurant_id')
            ->select('tbl_restaurant_expenses.*','tbl_restaurant_expense_items.name','tbl_restaurant_users.manager_name')
            ->where('tbl_restaurant_expenses.id', $id)
            ->where('tbl_restaurant_expenses.del_status','=','Live')
            ->first();

       return view('pages.restaurant.Report.ExpenseReport.DetailsExpenseReport',compact('restaurant_expenses'));
    }

    //------------Purchase-Report----------------------

     public function PurchaseReport(){

         return view('pages.restaurant.Report.PurchaseReport.purchasereport');
     }

     //----------Record-Payment---------

    public function recordPayment(){

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $supplier=DB::table('tbl_restaurant_purchases')
            ->join('tbl_restaurant_suppliers','tbl_restaurant_purchases.restaurant_id','=','tbl_restaurant_suppliers.restaurant_id')
            ->select('tbl_restaurant_purchases.*','tbl_restaurant_suppliers.name as supname')
            ->where('tbl_restaurant_purchases.restaurant_id',$res_id)
            ->where('tbl_restaurant_purchases.del_status','=','Live')
            ->get();


       return view('pages.restaurant.RecordPayment.recordPayment',compact('supplier'));
    }

}
