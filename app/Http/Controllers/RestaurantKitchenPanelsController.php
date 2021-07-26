<?php

namespace App\Http\Controllers;

use App\Notification;
use App\KitchenNotification;
use App\RestaurantSale;
use App\RestaurantUser;
use App\Restaurant;
use App\RestaurantFoodMenu;
use App\RestaurantFoodMenuCategory;
use App\RestaurantKitchenPanel;
use App\RestaurantSalesDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\carbon;
use DB;


class RestaurantKitchenPanelsController extends Controller
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
        $kitchens = RestaurantKitchenPanel::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.sale.kitchenPanel.index', compact('kitchens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.sale.kitchenPanel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $rules = array(
            'name' => 'required'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('kitchen-panels.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $kitchen = new RestaurantKitchenPanel();
            $kitchen->name = $request->name;
            $kitchen->description = $request->description;
            $kitchen->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $kitchen->user_id = Auth::guard('restaurantUser')->id();
            $kitchen->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('kitchen-panels.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantKitchenPanel::find($id)->user_id) {
            $kitchen = RestaurantKitchenPanel::find($id);

            return view('pages.restaurant.sale.kitchenPanel.edit', compact('kitchen'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('kitchen-panels.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantKitchenPanel::find($id)->user_id) {
            $rules = array(
                'name' => 'required'
            );

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $kitchen = RestaurantKitchenPanel::find($id);
                $kitchen->name = $request->name;
                $kitchen->description = $request->description;
                $kitchen->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $kitchen->user_id = Auth::guard('restaurantUser')->id();
                $kitchen->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('kitchen-panels.index');
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('kitchen-panels.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantKitchenPanel::find($id)->user_id) {
            $kitchen = RestaurantKitchenPanel::find($id);
            if ($kitchen) {
                $kitchen = RestaurantKitchenPanel::find($id);
                $kitchen->del_status = "Deleted";
                $kitchen->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('kitchen-panels.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('kitchen-panels.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('kitchen-panels.index');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allPanels()
    {
        $kitchens = RestaurantKitchenPanel::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.kitchenPanels.allPanels', compact('kitchens'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function singlePanel($id)
    {
        $restaurantUser = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->first();
        $restaurantId = $restaurantUser->restaurant_id;
        $restaurant = Restaurant::with('taxSettings')->where('id', $restaurantId)->first();
        $kitchen = RestaurantKitchenPanel::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                           ->where('del_status', 'Live')->where('id', $id)->first();

        //for running orders
        $current_date_time   = Carbon::now()->toDateString();
        $current_date_time .= ' '. Carbon::now()->toTimeString();

        $new_orders = RestaurantSale::with('salesDetails', 'waiter:id,manager_name', 'table:id,name')
                                    ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                    ->where('processing_date_time', '<=', $current_date_time)
                                    ->whereIn('order_status', [1, 2])
                                    ->where('del_status', 'Live')
                                    // ->orderBy('updated_at', 'ASC')
                                    ->orderBy('processing_date_time', 'ASC')
                                    ->where('id', 45)
                                    // ->take(2)
                                    ->get();
                                    // ->first();

        foreach($new_orders as $key=> $singleOrder){
            $new_orders[$key]->sale_id = $singleOrder->id;
            $new_orders[$key]->total_kitchen_type_items = get_total_kitchen_type_items($singleOrder->id);
            $new_orders[$key]->total_kitchen_type_started_cooking_items = get_total_kitchen_type_started_cooking_items($singleOrder->id);
            $new_orders[$key]->total_kitchen_type_done_items = get_total_kitchen_type_done_items($singleOrder->id);

            foreach ($singleOrder->salesDetails as $key => $item) {
                $item->foodmenu->panel_id;
                $singleOrder->salesDetails[$key]->delay_time = $item->foodmenu->categoryInfo->delay_time;
                $item->modifiers;

                foreach ($item->modifiers as $key => $modifier) {
                    $item->modifiers[$key]->name = $modifier->modifierName->name;
                }


                if ($item->foodmenu->panel_id != $kitchen->id) {
                    $singleOrder->salesDetails->forget($key);
                }

            }
            // return $singleOrder->salesDetails->sortBy('delay_time');

            // $new_orders[$key]->items = $singleOrder->salesDetails;
            // $items_by_sales_id = $this->Kitchen_model->getAllKitchenItemsFromSalesDetailBySalesId($new_orders[$i]->sale_id);

            // foreach($items_by_sales_id as $single_item_by_sale_id){
            //     $modifier_information = $this->Kitchen_model->getModifiersBySaleAndSaleDetailsId($new_orders[$i]->sale_id,$single_item_by_sale_id->sales_details_id);
            //     $single_item_by_sale_id->modifiers = $modifier_information;
            // }

        }

        $notifications = KitchenNotification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                ->where('kitchen_panel_id', $kitchen->id)
                                                ->orderBy('updated_at', 'ASC')
                                                ->get();
        $getUnReadyOrders = $new_orders;
        // return [$getUnReadyOrders[0]->processing_date_time, $current_date_time];
        // return $getUnReadyOrders;
        // return $notifications;
        return view('pages.restaurant.kitchenPanels.panel', compact('restaurant', 'kitchen', 'notifications', 'getUnReadyOrders'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getNewOrdersAjax(Request $request)
    {
        // return json_encode($request->all());
        $restaurantUser = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->first();
        $restaurantId = $restaurantUser->restaurant_id;
        $restaurant = Restaurant::with('taxSettings')->where('id', $restaurantId)->first();
        $kitchen = RestaurantKitchenPanel::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                           ->where('del_status', 'Live')->where('id', $request->kitchen_panel_id)->first();

        //for running orders
        $current_date_time   = Carbon::now()->toDateString();
        $current_date_time .= ' '. Carbon::now()->toTimeString();

        $new_orders = RestaurantSale::with('salesDetails', 'waiter:id,manager_name', 'table:id,name')
                                    ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                    ->where('processing_date_time', '<=', $current_date_time)
                                    ->whereIn('order_status', [1, 2])
                                    ->where('del_status', 'Live')
                                    // ->orderBy('updated_at', 'ASC')
                                    ->orderBy('processing_date_time', 'ASC')
                                    ->where('id', 45)
                                    // ->take(2)
                                    ->get();
                                    // ->first();

        foreach($new_orders as $key=> $singleOrder){
            $new_orders[$key]->sale_id = $singleOrder->id;
            $new_orders[$key]->total_kitchen_type_items = get_total_kitchen_type_items($singleOrder->id);
            $new_orders[$key]->total_kitchen_type_started_cooking_items = get_total_kitchen_type_started_cooking_items($singleOrder->id);
            $new_orders[$key]->total_kitchen_type_done_items = get_total_kitchen_type_done_items($singleOrder->id);


            foreach ($singleOrder->salesDetails->sortBy('delay_time') as $key => $item) {
                $item->foodmenu->panel_id;
                $singleOrder->salesDetails[$key]->delay_time = $item->foodmenu->categoryInfo->delay_time;
                $item->modifiers;

                foreach ($item->modifiers as $key => $modifier) {
                    $item->modifiers[$key]->name = $modifier->modifierName->name;
                }


                if ($item->foodmenu->panel_id != $kitchen->id) {
                    $singleOrder->salesDetails->forget($key);
                }

            }


            // $new_orders[$key]->items = $singleOrder->salesDetails;
            // $items_by_sales_id = $this->Kitchen_model->getAllKitchenItemsFromSalesDetailBySalesId($new_orders[$i]->sale_id);

            // foreach($items_by_sales_id as $single_item_by_sale_id){
            //     $modifier_information = $this->Kitchen_model->getModifiersBySaleAndSaleDetailsId($new_orders[$i]->sale_id,$single_item_by_sale_id->sales_details_id);
            //     $single_item_by_sale_id->modifiers = $modifier_information;
            // }

        }

        $getUnReadyOrders = $new_orders;
        // return [$getUnReadyOrders[0]->processing_date_time, $current_date_time];
        // return $getUnReadyOrders;
        return json_encode($getUnReadyOrders);
    }

    /**
     * Update Cooking status for a single sale item
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateCookingStatusAjax(Request $request){
        // return json_encode($request->all());

        $previous_id = $request->previous_id;
        $previous_id_array = explode(",",$previous_id);
        $cooking_status = $request->cooking_status;
        $total_item = count($previous_id_array);
        $i= 1;

        foreach($previous_id_array as $single_previous_id){
            $previous_id = $single_previous_id;
            $item_info = RestaurantSalesDetails::where('previous_id', $previous_id)->first();
            $sale_id = $item_info->sales_id;
            $sale_info = $item_info->salesInfo;
            $tables_booked = '';

            if($sale_info->table_id != null){
                $tables_booked = $sale_info->table->name;
            }else{
                $tables_booked = 'None';
            }

            if($cooking_status=="Started Cooking"){
                //update salesDetails cooking status
                $item_info->cooking_status = $cooking_status;
                $item_info->cooking_start_time = date('Y-m-d H:i:s');
                $item_info->save();

                if($sale_info->cooking_start_time == strtotime('0000-00-00 00:00:00') || $sale_info->cooking_start_time == null){
                    //update sales cooking status
                    $sale_info->cooking_start_time = date('Y-m-d H:i:s');
                    $sale_info->save();
                }

            }else{

                //update salesDetails cooking status
                $item_info->cooking_status = $cooking_status;
                $item_info->cooking_done_time = date('Y-m-d H:i:s');
                $item_info->save();

                //update sales cooking status
                $sale_info->cooking_done_time = date('Y-m-d H:i:s');
                $sale_info->save();

                if($i==$total_item){

                    if($sale_info->order_type==1){
                        $order_name = "D ".$sale_info->sale_no;
                    }elseif($sale_info[0]->order_type==2){
                        $order_name = "T ".$sale_info->sale_no;
                    }elseif($sale_info[0]->order_type==3){
                        $order_name = "DL ".$sale_info->sale_no;
                    }

                    //need to change here
                    $message = 'Item: '.$item_info->menu_name.' is ready to serve, Table: '.$tables_booked.', Customer: '.$sale_info->customer->name.', Order: '.$order_name;
                    $notification = new Notification;
                    $notification->notification = $message;
                    $notification->sales_id = $sale_id;
                    $notification->restaurant_id  = $sale_info->restaurant_id;
                    $notification->save();

                }
            }
            $i++;
        }
    }

    /**
     * Update Cooking status for a single sale item
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateCookingStatusDeliveryTakeAwayAjax(Request $request){
        // return json_encode($request->all());
        $m = '';
        $previous_id = $request->previous_id;
        $previous_id_array = explode(",",$previous_id);
        $cooking_status = $request->cooking_status;
        $total_item = count($previous_id_array);
        $i = 1;
        foreach($previous_id_array as $single_previous_id){
            $previous_id = $single_previous_id;
            $item_info = RestaurantSalesDetails::where('previous_id', $previous_id)->first();

            $sale_id = $item_info->sales_id;
            $sale_info = $item_info->salesInfo;

            if($cooking_status=="Started Cooking"){

                //update salesDetails cooking status
                $item_info->cooking_status = $cooking_status;
                $item_info->cooking_start_time = date('Y-m-d H:i:s');
                $item_info->save();

                if($sale_info->cooking_start_time == strtotime('0000-00-00 00:00:00') || $sale_info->cooking_start_time == null){
                    //update sales cooking status
                    $sale_info->cooking_start_time = date('Y-m-d H:i:s');
                    $sale_info->save();
                }
            }else{
                //update salesDetails cooking status
                $item_info->cooking_status = $cooking_status;
                $item_info->cooking_done_time = date('Y-m-d H:i:s');
                $item_info->save();

                //update sales cooking status
                $sale_info->cooking_done_time = date('Y-m-d H:i:s');
                $sale_info->save();

                if($i==$total_item){
                    $order_type_operation = '';
                    if($sale_info->order_type==1){
                        $order_name = "D ".$sale_info->sale_no;
                    }elseif($sale_info->order_type==2){
                        $order_name = "T ".$sale_info->sale_no;
                        $order_type_operation = 'Take Away order is ready to take';
                    }elseif($sale_info->order_type==3){
                        $order_name = "DL ".$sale_info->sale_no;
                        $order_type_operation = 'Delivery order is ready to deliver';
                    }

                    $message = 'Customer: '.$sale_info->customer->name.', Order Number: '.$order_name.' '.$order_type_operation;
                    $notification = new Notification;
                    $notification->notification = $message;
                    $notification->sales_id = $sale_id;
                    $notification->restaurant_id  = $sale_info->restaurant_id;
                    $notification->save();
                    $m =$notification;
                }
            }
            $i++;
        }

        return json_encode([$m]);
    }

    //get_new_notifications_ajax

    public function getNewNotificationByAjax(Request $request){

        $notifications = KitchenNotification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                ->where('kitchen_panel_id', $request->kitchen_panel_id)
                                ->orderBy('updated_at', 'ASC')
                                ->get();


        return json_encode($notifications);

    }


    //remove_notication_ajax

    public function removeNotificationByAjax(Request $request){

        $notification = KitchenNotification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $request->notification_id)->first();
        $notification->delete();
        return json_encode($notification->id);
    }

    //remove_multiple_notification_ajax
    public function removeMultipleNotificationByAjax(Request $request){

        // return json_encode($request->notifications);
        $notifications_array = explode(",",$request->notifications);

        foreach($notifications_array as $single_notification){
            $notification = KitchenNotification::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $single_notification)->first();
            $notification->delete();
        }
    }








    public function inventoryadjustments()
    {
        return view('pages.restaurant.inventoryadjustments.inventoryadjustments');
    }

    public function add_inventoryadjustments()
    {
        $food = DB::table('tbl_restaurant_food_menus')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $ingredients = DB::table('tbl_restaurant_ingredients')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $catagory = DB::table('table_sub_category')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->get();
        $sub_catagory = DB::table('tbl_under_sub_catagory')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->get();
        return view('pages.restaurant.inventoryadjustments.add_inventoryadjustment', compact('food','catagory','sub_catagory','ingredients'));
    }

    public function test(Request $request){
        $serch= $request->get(search);
        /*$all_data=DB::table('tbl_restaurant_food_menu_ingredients')
            ->where('id',$id,'=','ing_id')
            ->first();*/
        echo $serch;
    }

    public function show_food_menue($id)
    {
        $food = DB::table('tbl_restaurant_food_menu_ingredients')->where('ing_id',$id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        echo json_encode($food);
    }



}
