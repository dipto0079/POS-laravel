<?php

namespace App\Http\Controllers;

use App\RestaurantFoodMenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use mysql_xdevapi\Table;

class RestaurantFoodMenuCategoriesController extends Controller
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
        $categories = RestaurantFoodMenuCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->orderBy('delay_time', 'asc')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('pages.restaurant.sale.foodMenuCategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.sale.foodMenuCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        return $request->all();
        $rules = array(
            'name' => 'required',
            'delay_time' => 'required|numeric'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('food-menu-categories.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $category = new RestaurantFoodMenuCategory();
            $category->name = $request->name;
            $category->delay_time = $request->delay_time;
            $category->description = $request->description;
            $category->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $category->user_id = Auth::guard('restaurantUser')->id();
            $category->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('food-menu-categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuCategory::find($id)->user_id) {
            $category = RestaurantFoodMenuCategory::find($id);

            return view('pages.restaurant.sale.foodMenuCategory.edit', compact('category'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-categories.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuCategory::find($id)->user_id) {
            $rules = array(
                'name' => 'required',
                'delay_time' => 'required|numeric'
            );

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $category = RestaurantFoodMenuCategory::find($id);
                $category->name = $request->name;
                $category->delay_time = $request->delay_time;
                $category->description = $request->description;
                $category->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $category->user_id = Auth::guard('restaurantUser')->id();
                $category->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('food-menu-categories.index');
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuCategory::find($id)->user_id) {
            $category = RestaurantFoodMenuCategory::find($id);
            if ($category) {
                $category = RestaurantFoodMenuCategory::find($id);
                $category->del_status = "Deleted";
                $category->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('food-menu-categories.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('food-menu-categories.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-categories.index');
        }
    }


    public function subcategorys()
    {
        $show_subcatagori = DB::table('table_sub_category')
            //->join('tbl_restaurant_users', 'tbl_restaurant_users.id', '=', 'table_sub_category.added_by')
            ->where('restaurant_id', '=', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->select('table_sub_category.name', 'table_sub_category.id', 'table_sub_category.delay_time', 'table_sub_category.description')->get();
        return view('pages.restaurant.sale.subcategories.fust', compact('show_subcatagori'));
    }

    public function subcreate()
    {

        return view('pages.restaurant.sale.subcategories.create');
    }

    public function add_category($id)
    {
        $show_subcatagori = DB::table('tbl_under_sub_catagory')
            ->where('tbl_under_sub_catagory.catagory_id', '=', $id)
            ->join('table_sub_category', 'table_sub_category.id', '=', 'tbl_under_sub_catagory.catagory_id')
            ->join('tbl_restaurant_food_menu_categories', 'tbl_restaurant_food_menu_categories.id', '=', 'tbl_under_sub_catagory.sub_catagory_id')
            ->select('table_sub_category.name as cat_name', 'tbl_restaurant_food_menu_categories.name', 'tbl_under_sub_catagory.id')->get();

        $catagory_id = $id;
        $cat_name = DB::table('table_sub_category')
            ->where('id', $catagory_id)
            ->first();
        $categories = RestaurantFoodMenuCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->orderBy('delay_time', 'asc')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('pages.restaurant.sale.subcategories.add_category', compact('categories', 'catagory_id', 'cat_name', 'show_subcatagori'));
    }

    public function supplier_dues()
    {
        $restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $alldues = DB::table('tbl_supplier_due_payments')->get();
        $supplers = DB::table('tbl_restaurant_suppliers')
            ->where('tbl_restaurant_suppliers.restaurant_id', '=', $restaurant_id)->get();
        $show_all = DB::select('SELECT tbl_restaurant_suppliers.*,
(select sum(tbl_restaurant_purchases.grand_total) from tbl_restaurant_purchases where tbl_restaurant_purchases.supplier_id = tbl_restaurant_suppliers.id ) as Total_purches,
(select sum(tbl_restaurant_purchases.paid) from tbl_restaurant_purchases where tbl_restaurant_purchases.supplier_id = tbl_restaurant_suppliers.id ) as Total_Pay,
(select sum(tbl_supplier_due_payments.Payment_amount) from tbl_supplier_due_payments where tbl_supplier_due_payments.supplier_id = tbl_restaurant_suppliers.id ) as Total_Other_Pay

FROM `tbl_restaurant_suppliers` WHERE tbl_restaurant_suppliers.restaurant_id='.$restaurant_id);


     return view('pages.restaurant.supplier.supplier', compact('alldues', 'supplers','show_all'));
    }
    public  function DuePaymentsdetails($id){

        $detalis= DB::table('tbl_supplier_due_payments')
            ->where('supplier_id', $id)
            ->get();
        //echo $detalis;
        return view('pages.restaurant.supplier.due_payments_details',compact('detalis'));
    }

    public function Deletepayment($id)
    {
        DB::table('tbl_supplier_due_payments')
            ->where('restaurant_id', $id)
            ->delete();
        return back();
    }

    public function total_supplier_due($id)
    {
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $Total_Pueshes_due = DB::Table('tbl_restaurant_purchases')
            ->where('restaurant_id', '=', $res_id)
            ->where('supplier_id', '=', $id)
            ->sum('due');
        $total_payment = DB::Table('tbl_supplier_due_payments')
            ->where('restaurant_id', '=', $res_id)
            ->where('supplier_id', '=', $id)
            ->sum('Payment_amount');

        $grand_due = $Total_Pueshes_due - $total_payment;


        echo json_encode(array('result' => $grand_due));
    }

    public function add_supplier_due()
    {
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $all_data = DB::table('tbl_restaurant_suppliers')->where('restaurant_id', '=', $add_by)->get();
        $allmethod = DB::table('tbl_restaurant_payment_method')->get();
        $all_due = DB::table('tbl_restaurant_purchases')->where('restaurant_id', '=', $add_by)->sum('due');


        return view('pages.restaurant.supplier.add-supplier', compact('all_data', 'allmethod'));
    }

    public function supplierDuePayments(){
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $all_sup = DB::Table('tbl_restaurant_purchases')
            ->where('restaurant_id', '=', $res_id)
            ->get();

      //  echo $all_sup;
        return view('pages.restaurant.supplier.add-supplier',compact('all_sup'));
    }

    public function addfinalpayment(Request $request)
    {
        $all=$request->supplier_name;
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $Pueshes = DB::Table('tbl_restaurant_purchases')
            ->where('restaurant_id', '=', $res_id)
            ->where('supplier_id', '=', $all)
            ->where('del_status', 'Live')
            ->get();
       return view('pages.restaurant.supplier.add-supplier',compact('Pueshes'));


    }
    public function finpay($id){
        $all_fin = DB::Table('tbl_restaurant_purchases')
            ->where('id', '=', $id)
            ->where('del_status', 'Live')
            ->first();

        $pay= DB::Table('tbl_restaurant_payment_method')->get();

        $tot=DB::table('tbl_restaurant_suppliers_final_payment')
            ->sum('payment_amount');


        $allpay=DB::table('tbl_restaurant_suppliers_final_payment')
            ->join('tbl_restaurant_payment_method','tbl_restaurant_suppliers_final_payment.methord_id','=','tbl_restaurant_payment_method.id')
            ->join('tbl_restaurant_suppliers','tbl_restaurant_suppliers_final_payment.suppliers_id','=','tbl_restaurant_suppliers.id')
            ->select('tbl_restaurant_suppliers_final_payment.*','tbl_restaurant_payment_method.Methord as name','tbl_restaurant_suppliers.name as suName')
            ->get();


      //  echo $pay;
        //
        return view('pages.restaurant.supplier.fin_pay',compact('all_fin','pay','allpay','tot'));
    }
    public function  supdueupdate (Request $request){

        $id = $request->id;

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $data = array(
            'due' => (int)$request->final_due,

            'restaurant_id' => $res_id,
        );

        $fidata=array(
            'methord_id' =>$request->Pay_name,
            'payment_amount' =>$request->payment_amount,
            'date' =>$request->date,
            'suppliers_id' =>$request->supplier_id,
            'note' =>$request->note,

        );


        DB::table('tbl_restaurant_suppliers_final_payment')
            ->insert($fidata);


       DB::table('tbl_restaurant_purchases')
            ->where('id', $id)
            ->update($data);

        toastr()->success('Payments Success.');
        return back();
       // return redirect('restaurant/sale/supplier_due');
    }



    public function save_subcatagory(Request $request)
    {
        //        return $request->all();
        $add_by = Auth::guard('restaurantUser')->id();
        $data = array(
            'name' => $request->name,
            'delay_time' => $request->delay_time,
            'description' => $request->description,
            'added_by' => $add_by,
            'restaurant_id' => Auth::guard('restaurantUser')->user()->restaurant_id

        );
        DB::table('table_sub_category')->insert($data);
        return redirect('restaurant/sale/subcreate')->with('success', 'sucessfully Insert.');
    }

    public function subcatagory_insert(Request $request)
    {
        $id = $request->hidden_catagory_id;
        // $show_subcatagori = DB::table('tbl_under_sub_catagory')
        //     ->join('table_sub_category', 'table_sub_category.id', '=', 'tbl_under_sub_catagory.catagory_id')
        //     ->join('tbl_restaurant_food_menu_categories', 'tbl_restaurant_food_menu_categories.id', '=', 'tbl_under_sub_catagory.sub_catagory_id')
        //     ->select('table_sub_category.name','tbl_restaurant_food_menu_categories.name')->get();

        $add_by = Auth::guard('restaurantUser')->id();
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'sub_catagory_id' => $request->sub_catagory,
            'catagory_id' => $id,
            'catagory_name' => $request->hidden_catagory_name,
            'creat_this' => $add_by,
            'restaurant_id' => $res_id,

        );

        DB::table('tbl_under_sub_catagory')->insert($data);

        toastr()->success(' Successfully Insert');

        return redirect('restaurant/sale/Add-Category/' . $id);
    }

    public function subcatagory_edit(Request $request)
    {
        $id = $request->hidden_id;
        // $show_subcatagori = DB::table('tbl_under_sub_catagory')
        //     ->join('table_sub_category', 'table_sub_category.id', '=', 'tbl_under_sub_catagory.catagory_id')
        //     ->join('tbl_restaurant_food_menu_categories', 'tbl_restaurant_food_menu_categories.id', '=', 'tbl_under_sub_catagory.sub_catagory_id')
        //     ->select('table_sub_category.name','tbl_restaurant_food_menu_categories.name')->get();

        $add_by = Auth::guard('restaurantUser')->id();
        $data = array(
            'name' => $request->name,
            'delay_time' => $request->delay_time,
            'description' => $request->description,
            'added_by' => $add_by,

        );

        DB::table('table_sub_category')
            ->where('id', $id)
            ->update($data);

        return redirect('restaurant/sale/subcategory')->with('success', 'sucessfully Update.');
    }

    public function delete_sub_catagory($id)
    {
        DB::table('table_sub_category')->where('id', $id)->delete();
        return back()->with('success', 'sucessfully deleted.');
    }

    public function edit_catagory($id)
    {
        $edit_catagory = DB::table('table_sub_category')
            ->where('id', $id)
            ->first();
        return view('pages.restaurant.sale.subcategories.catagory_edit', compact('edit_catagory'));
    }

    public function delete_catagory($id)
    {
        DB::table('tbl_under_sub_catagory')->where('id', $id)->delete();

        //return redirect('restaurant/sale/Add-Category/'.$req)->with('success','sucessfully deleted.');
        return back()->with('success', 'sucessfully deleted.');
    }

    public function paymentmethod()
    {
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $allmethod = DB::table('tbl_restaurant_payment_method')
        ->where('restaurant_id',$res_id)
            ->get();

        return view('pages.restaurant.payment.payment', compact('allmethod'));
    }

    public function addmethod()
    {
        return view('pages.restaurant.payment.add-payment');
    }

    public function paymethod(Request $request)
    {
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'Methord' => $request->Methord,
            'Discription' => $request->Discription,
            'added_by' => $add_by,
            'restaurant_id' => $add_by,
        );
        DB::table('tbl_restaurant_payment_method')->insert($data);

        return redirect('restaurant/sale/payment-method');
    }

    public function deletemethod($id)
    {
        DB::table('tbl_restaurant_payment_method')->where('id', $id)->delete();
        return back();
    }

    public function editMethord($id)
    {
        $all_data = DB::table('tbl_restaurant_payment_method')
            ->where('id', $id)
            ->first();
        return view('pages.restaurant.payment.edit_method', compact('all_data'));
    }

    public function updateMethod(Request $request)
    {
        $id = $request->id;
        $data = array(
            'Methord' => $request->Methord,
            'Discription' => $request->Discription,
        );
        DB::table('tbl_restaurant_payment_method')
            ->where('id', $id)
            ->update($data);
        return redirect('restaurant/sale/payment-method');
    }




}
