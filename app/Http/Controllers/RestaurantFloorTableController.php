<?php

namespace App\Http\Controllers;

use App\RestaurantFloorTable;
use App\RestaurantFloor;
use App\RestaurantUser;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;


class RestaurantFloorTableController extends Controller
{

    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }

    /**
     * this function is used for changing the position of a table.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFloorTable::find($request->table_id)->user_id) {

            $floorTable = RestaurantFloorTable::find($request->table_id);
            $floorTable->position = $request->position;
            $floorTable->save();
            return response()->json(['floorTable' => $floorTable, 'success'=> "position changed."]);
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($id)->user_id) {
            $floor = RestaurantFloor::find($id);

            $floorTables = $floor->floorTables->where('del_status', 'Live');

            $waiters = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('role', 'waiter')->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

            return view('pages.restaurant.sale.floorTable.create', compact('floor', 'waiters', 'floorTables'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
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
            'guest_count' => 'required',
            'width' => 'required',
            'height' => 'required',
            'table_type' => 'required',
            //this field was remove from the system
            // 'waiter_id' => 'required',
            'floor_id' => 'required',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        }else {

            // store

            $floorTable = new RestaurantFloorTable();
            $floorTable->name = Str::slug($request->name);
            $floorTable->guest_count = $request->guest_count;
            $floorTable->width = $request->width;
            $floorTable->height = $request->height;
            $floorTable->table_type = $request->table_type;
            //this field was remove from the system
            // $floorTable->waiter_id = $request->waiter_id;
            $floorTable->floor_id = $request->floor_id;

            $floorTable->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $floorTable->user_id = Auth::guard('restaurantUser')->id();
            $floorTable->save();

            return response()->json(['floorTable' => $floorTable, 'success'=> "Added successfully."]);

            // toastr()->success('Added successfully.');
            // return redirect()->route('floors.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestaurantFloorTable  $restaurantFloorTable
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantFloorTable $restaurantFloorTable)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RestaurantFloorTable  $restaurantFloorTable
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantFloorTable $restaurantFloorTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestaurantFloorTable  $restaurantFloorTable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantFloorTable $restaurantFloorTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestaurantFloorTable  $restaurantFloorTable
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantFloorTable $restaurantFloorTable)
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
        if (Auth::guard('restaurantUser')->id() == RestaurantFloorTable::find($id)->user_id) {
            $table = RestaurantFloorTable::find($id);
            if ($table) {
                $table = RestaurantFloorTable::find($id);
                $table->del_status = "Deleted";
                $table->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('floor-tables.create',[$table->floor_id]);
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('floor-tables.create',[$table->floor_id]);
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }





    /**
     * For update the table position.
     *
     * @param  \App\RestaurantFloorTable  $restaurantFloorTable
     * @return \Illuminate\Http\Response
     */
    public function tablePosition(Request $request)
    {

    }




}
