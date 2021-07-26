<?php

namespace App\Http\Controllers;


use App\RestaurantSale;
use App\Country;
use App\Notification;
use App\RestaurantCustomer;
use App\RestaurantFloor;
use App\RestaurantFoodMenuShift;
use App\RestaurantFoodMenuModifier;
use App\RestaurantFoodMenu;
use App\RestaurantFoodMenuCategory;
use App\RestaurantUser;
use App\Restaurant;
use App\RestaurantCustomerGroup;
use App\RestaurantSalesDetails;
use App\RestaurantSettingsThirdPartyVendor;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;
use DB;

use Illuminate\Http\Request;

class RestaurantPosController extends Controller
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
        $restaurantUser = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->first();
        $restaurantId = $restaurantUser->restaurant_id;
        $restaurant = Restaurant::with('taxSettings', 'shifts')->where('id', $restaurantId)->first();
        //$restaurantShifts =  $restaurant->shifts->where('del_status', 'Live');
        //return $restaurantShifts;

        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $customerGroups = RestaurantCustomerGroup::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                    ->where('del_status', 'Live')
                                                    ->orderBy('discount_percentage', 'asc')
                                                    ->orderBy('updated_at', 'desc')
                                                    ->get();

        $thirdPartyVendors = RestaurantSettingsThirdPartyVendor::with('thirdPartyVendorInfo:id,name')->where('restaurant_id', $restaurantId)->where('availability', 'Yes')->orderBy('updated_at', 'desc')->get();
        // return $thirdPartyVendors;

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $categories = RestaurantFoodMenuCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $subcategories=DB::table('table_sub_category')
            ->where('restaurant_id',$res_id)
            ->get();
        $floors = RestaurantFloor::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $waiters = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('role', 'waiter')->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $customers = RestaurantCustomer::with('customerGroup')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $notifications = Notification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->orderBy('updated_at', 'ASC')->get();


        //shift
        $now   = Carbon::now()->toTimeString();
        // return $now;
        $shift = RestaurantFoodMenuShift::select('id', 'starting_time', 'ending_time')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->whereTime('starting_time', '<=', $now )->whereTime('ending_time', '>=', $now )->first();

        //return $shift;


        // $food_menus = $shift->foodMenus;
        $food_menus = RestaurantFoodMenu::with('categoryInfo', 'modifiers', 'shifts:id,name,starting_time,ending_time,del_status')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                                    ->where('del_status', 'Live')
                                                                    ->orderBy('updated_at', 'desc')
                                                                    ->get();

        foreach ($food_menus as $key => $food_menu) {
            $food_menu->categoryInfo;
            $food_menu->modifiers;
            $food_menu->shifts;
        }

        // return $food_menus;

        // //need to change here
        // if ($shift) {
        //     # code...
        //     $food_menus = RestaurantFoodMenu::with('categoryInfo', 'modifiers')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
        //                                                             ->where('del_status', 'Live')
        //                                                             ->where('shift_id', $shift->id)
        //                                                             // ->where('shift_id', 10)
        //                                                             ->orderBy('updated_at', 'desc')
        //                                                             ->get();
        // }

        // return $food_menus;

        //for running orders
        $current_date_time   = Carbon::now()->toDateString();
        $current_date_time .= ' '. Carbon::now()->toTimeString();
        $st = '';
        $et = '';

        if ($shift) {
            # code...
            $st = $current_date_time .' '. $shift->starting_time;
            $et = $current_date_time .' '. $shift->ending_time;
        }
        // return [$st, $et];

        $t = [];

        if (Auth::guard('restaurantUser')->user()->role == 'Waiter') {

            $new_orders = RestaurantSale::with('customer:id,name', 'waiter:id,manager_name', 'table:id,name')
                                        ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                        ->where('processing_date_time', '<=', $current_date_time)
                                        // ->whereBetween('processing_date_time',[$st,$et])
                                        ->whereIn('order_status', [1, 2])
                                        ->where('waiter_id', Auth::guard('restaurantUser')->user()->id)
                                        ->where('del_status', 'Live')
                                        ->orderBy('updated_at', 'ASC')
                                        //->take(4)
                                        ->get();

        } else {
            # code...
            $new_orders = RestaurantSale::with('customer:id,name', 'waiter:id,manager_name', 'table:id,name')
                                        ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                        ->where('processing_date_time', '<=', $current_date_time)
                                        // ->whereBetween('processing_date_time',[$st,$et])
                                        ->whereIn('order_status', [1, 2])
                                        ->where('del_status', 'Live')
                                        ->orderBy('updated_at', 'ASC')
                                        //->take(4)
                                        ->get();
        }


        //return count($new_orders);
        //return $new_orders;
        // return $t ;
        $i = 0;

        if ($shift) {
            # code...
            $st = $shift->starting_time;
            $et = $shift->ending_time;
        }

        foreach($new_orders as  $key => $new_order){

            $processing_time =  Carbon::parse($new_order->processing_date_time)->toTimeString();

            if ($processing_time >= $st && $processing_time <= $et) {
                $new_order->time_status = [$st, $et, $processing_time];


                $t[$i] =  $new_order;
                $t[$i]->sale_id = $new_order->id;
                $t[$i]->total_kitchen_type_items = get_total_kitchen_type_items($new_order->id);

                $t[$i]->total_kitchen_type_done_items = get_total_kitchen_type_done_items($new_order->id);
                $t[$i]->total_kitchen_type_started_cooking_items = get_total_kitchen_type_started_cooking_items($new_order->id);
                // $new_order[$i]->tables_booked = $new_order->get_all_tables_of_a_sale_items($new_order[$i]->id);
                $t[$i]->tables_booked = [];
                $to_time = strtotime(date('Y-m-d H:i:s'));
                $from_time = strtotime($new_order->processing_date_time);
                $minutes = floor(abs($to_time - $from_time) / 60);
                $seconds = abs($to_time - $from_time) % 60;

                $t[$i]->minute_difference = str_pad(floor($minutes), 2, "0", STR_PAD_LEFT);
                $t[$i]->second_difference = str_pad(floor($seconds), 2, "0", STR_PAD_LEFT);
                $i++;
            }
                // $new_orders[$key]->sale_id = $new_order->id;
                // $new_orders[$key]->total_kitchen_type_items = get_total_kitchen_type_items($new_order->id);

                // $new_orders[$key]->total_kitchen_type_done_items = get_total_kitchen_type_done_items($new_order->id);
                // $new_orders[$key]->total_kitchen_type_started_cooking_items = get_total_kitchen_type_started_cooking_items($new_order->id);
                // // $new_order[$key]->tables_booked = $new_order->get_all_tables_of_a_sale_items($new_order[$key]->id);
                // $new_orders[$key]->tables_booked = [];
                // $to_time = strtotime(date('Y-m-d H:i:s'));
                // $from_time = strtotime($new_order->processing_date_time);
                // $minutes = floor(abs($to_time - $from_time) / 60);
                // $seconds = abs($to_time - $from_time) % 60;

                // $new_orders[$key]->minute_difference = str_pad(floor($minutes), 2, "0", STR_PAD_LEFT);
                // $new_orders[$key]->second_difference = str_pad(floor($seconds), 2, "0", STR_PAD_LEFT);

        }

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $allmethod = DB::table('tbl_restaurant_payment_method')
            ->where('restaurant_id',$res_id)
            ->get();

        $new_orders = $t;
        //return count($t);
        return view('pages.restaurant.sale.sales.pos', compact('thirdPartyVendors', 'shift', 'countries', 'customerGroups', 'restaurant', 'notifications', 'subcategories', 'food_menus', 'floors', 'waiters', 'customers', 'new_orders','categories','allmethod'));
    }

    /**
     * Get food menus by ajax call which is used for interval
     *
     * @return \Illuminate\Http\Response
     */
    public function changeFoodMenus(Request $request)
    {


        //shift
        $now   = Carbon::now()->toTimeString();
        // return $now;
        $shift = RestaurantFoodMenuShift::select('id')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                            ->where('del_status', 'Live')
                                            ->whereTime('starting_time', '<=', $now )
                                            ->whereTime('ending_time', '>=', $now )
                                            ->first();
        if ($shift) {
            if ($shift->id != $request->shift_id) {

                // $food_menus = [];
                // $food_menus = RestaurantFoodMenu::with('categoryInfo')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                //                                                         ->where('del_status', 'Live')
                //                                                         // ->where('shift_id', $shift->id)
                //                                                         ->where('shift_id', $shift->id)
                //                                                         ->orderBy('updated_at', 'desc')
                //                                                         ->get();

                //return response()->json(['shift_change' => true, 'food_menus'=> $food_menus]);
                return response()->json(['shift_change' => true, 'shift'=> $shift]);
            }else{
                return response()->json(['same_food_menus' => 'Not change', 's'=>1]);
            }
        }else{
            return response()->json(['no_food_menus' => 'Not available', 's'=>1]);
        }

        // return $shift;




        $menu_modifiers = RestaurantFoodMenuModifier::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        return view('pages.restaurant.sale.sales.pos', compact('restaurant', 'categories', 'foodmenus', 'menu_modifiers'));
    }

    //get_floor_with_tables_ajax
    public function getFloorWithTable(Request $request){

        // if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($request->floor_id)->user_id) {
        if (Auth::guard('restaurantUser')->user()->restaurant_id == RestaurantFloor::find($request->floor_id)->restaurant_id) {
            $floor = RestaurantFloor::find($request->floor_id);

            $floorTables = $floor->floorTables->where('del_status', 'Live');

            return response()->json(['floor'=>$floor, 'floorTables' => $floorTables]);
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }


    //get_all_tables_with_new_status_ajax
    public function getAllTablesWithNewStatus(Request $request){

        // if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($request->floor_id)->user_id) {
        if (Auth::guard('restaurantUser')->user()->restaurant_id == RestaurantFloor::find($request->floor_id)->restaurant_id) {

            $floor = RestaurantFloor::find($request->floor_id);
            $floorTables = $floor->floorTables->where('del_status', 'Live');

            // here need to return table's seat availability
            return response()->json(['floorTables' => $floorTables]);
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }

    //get_new_notifications_ajax
    public function getNewNotificationByAjax(Request $request){

        $notifications = Notification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                ->orderBy('updated_at', 'ASC')
                                ->get();


        return json_encode($notifications);

    }

    //remove_notication_ajax
    public function removeNotificationByAjax(Request $request){

        $notification = Notification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $request->notification_id)->first();
        $notification->delete();
        return json_encode($notification->id);
    }

    //remove_multiple_notification_ajax
    public function removeMultipleNotificationByAjax(Request $request){

        // return json_encode($request->notifications);
        $notifications_array = explode(",",$request->notifications);

        foreach($notifications_array as $single_notification){
            $notification = Notification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $single_notification)->first();
            $notification->delete();
        }
    }

    public function show_catagory_ajax($id)
    {
        $show_subcatagori = DB::table('tbl_under_sub_catagory')
        ->where('tbl_under_sub_catagory.catagory_id','=',$id)
            ->join('table_sub_category', 'table_sub_category.id', '=', 'tbl_under_sub_catagory.catagory_id')
            ->join('tbl_restaurant_food_menu_categories', 'tbl_restaurant_food_menu_categories.id', '=', 'tbl_under_sub_catagory.sub_catagory_id')

            ->select('table_sub_category.name as cat_name', 'tbl_restaurant_food_menu_categories.name', 'tbl_restaurant_food_menu_categories.id')->get();
        echo json_encode($show_subcatagori);
    }
    // public function show_food_menu_ajax($id)
    // {
    //     $all_menu = DB::table('tbl_restaurant_food_menus')
    //     ->where('cat_id','=', $id)
    //     ->get();

    //     echo json_encode($all_menu);
    // }
    public function showajax($id){

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $alldata = DB::table('tbl_table_resurved')
                ->where('id',$id)
                ->where('restaurant_id','=',$res_id)
                ->first();
        echo json_encode($alldata);

        $c_d= date('Y-m-d');
        $c_t= date('H:i:s').'.000000';

//        if (isset($alldata->id == $id)){
//            $table_resurved = DB::table('tbl_table_resurved')
//               ->whereDate('date_end', '>=', $c_d)
//                   ->where('id',$alldata->id)
//                ->get();
//            echo json_encode('true') ;
//
//        }
//        echo json_encode('false') ;



      //  echo  json_encode($alldata);

    }





}
