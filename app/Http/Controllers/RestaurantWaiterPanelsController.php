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
use App\RestaurantSalesDetails;
use Illuminate\Support\Facades\Auth;
use Carbon\carbon;

use Illuminate\Http\Request;

class RestaurantWaiterPanelsController extends Controller
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
        $restaurant = Restaurant::with('taxSettings')->where('id', $restaurantId)->first();

        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        $categories = RestaurantFoodMenuCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $floors = RestaurantFloor::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $waiters = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('role', 'waiter')->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $customers = RestaurantCustomer::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $notifications = Notification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->orderBy('updated_at', 'ASC')->get();
        //shift
        $now = Carbon::now()->toTimeString();
        // return $now;
        $shift = RestaurantFoodMenuShift::select('id', 'starting_time', 'ending_time')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->whereTime('starting_time', '<=', $now)->whereTime('ending_time', '>=', $now)->first();

        // return $shift;

        if ($shift != false) {
            $food_menus = $shift->foodMenus;

            foreach ($food_menus as $key => $food_menu) {
                $food_menu->categoryInfo;
                $food_menu->modifiers;
            }
        }


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
        $current_date_time = Carbon::now()->toDateString();
        $current_date_time .= ' ' . Carbon::now()->toTimeString();
        if ($shift != false) {
            $st = $current_date_time . ' ' . $shift->starting_time;
            $et = $current_date_time . ' ' . $shift->ending_time;
            // return [$st, $et];

            $t = [];
        }
        $new_orders = RestaurantSale::with('customer:id,name', 'waiter:id,manager_name', 'table:id,name')
            ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('processing_date_time', '<=', $current_date_time)
            // ->whereBetween('processing_date_time',[$st,$et])
            ->whereIn('order_status', [1, 2])
            ->where('del_status', 'Live')
            ->orderBy('updated_at', 'ASC')
            // ->take(2)
            ->get();
        // return count($new_orders);
        // return $t ;
        if ($shift != false) {
            $i = 0;

            $st = $shift->starting_time;
            $et = $shift->ending_time;
            foreach ($new_orders as $key => $new_order) {

                $processing_time = Carbon::parse($new_order->processing_date_time)->toTimeString();

                if ($processing_time >= $st && $processing_time <= $et) {
                    $new_order->time_status = [$st, $et, $processing_time];


                    $t[$i] = $new_order;
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

            $new_orders = $t;

            // return count($t);
            return view('pages.restaurant.waiterPanels.waiterPos', compact('shift', 'countries', 'restaurant', 'notifications', 'categories', 'food_menus', 'floors', 'waiters', 'customers', 'new_orders'));
        }
        toastr()->error('Waiter Panels Not Add');
        return back();
    }


}
