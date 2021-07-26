@php
$baseURL = getBaseURL();
//dd($baseURL);


/*******************************************************************************************************************
* This secion is to construct menu list ****************************************************************************
*******************************************************************************************************************
*/
$shift_id = 0;
$previous_category = 0;
$total_menus = count($food_menus);
$i = 1;
$menu_to_show = "";
$javascript_obects = "";


if ($shift) {
# code...
$shift_id = $shift->id;
}

foreach($food_menus as $single_menus){


//checks that whether its new category or not
$is_new_category = false;
//get current food category
$current_category = $single_menus->cat_id;

//if it the first time of loop then default previous category is 0
//if it's 0 then set current category id to $previous category and set first category div
if($previous_category == 0){
$previous_category = $current_category;
$menu_to_show .= '<div id="category_'.$single_menus->cat_id.'" class="specific_category_items_holder">';
    }
    //if previous category and current category is not equal. it means it's a new category
    if($previous_category!=$current_category){

    $previous_category = $current_category;
    $is_new_category = true;
    }

    //if category is new and total menus are not finish yet then set exit to previous category and create new category
    //div
    if($is_new_category==true && $total_menus!=$i){
    $menu_to_show .= '</div>';
$menu_to_show .= '<div id="category_'.$single_menus->cat_id.'" class="specific_category_items_holder">';
    }

    // $img_size = @getimagesize($baseURL.'assets/POS/images/'.$single_menus->photo);
    // if(!empty($img_size) && $single_menus->photo!=""){
    // $image_path = $baseURL.'assets/POS/images/'.$single_menus->photo;
    // }else{
    // $image_path = $baseURL.'assets/images/image_thumb.png';
    // }
    if($single_menus->photo !=""){
    $image_path = $baseURL.'media/restaurant/photos/'.$single_menus->photo;
    }else{
    $image_path = $baseURL.'assets/images/image_thumb.png';
    }

    //$shift_check = false;
    //check that the food menu is for the current shift

    foreach($single_menus->shifts->where('del_status', 'Live') as $single_menu_shifts){
    // dd([$shift_id, $single_menu_shifts]);
    if ($single_menu_shifts->id == $shift_id) {
    $shift_check = true;
    // dd($shift_check);
    }
    }

    //if ($shift_check == true) {
    # code...
    //construct new single item content
    $menu_to_show .= '<div class="single_item fix" id="item_'.$single_menus->id.'">';
        $menu_to_show .= '<p class="item_price"> $<span id="d_price_'.$single_menus->id.'">'.$single_menus->dine_in_price.'</span> | $<span id="t_price_'.$single_menus->id.'">'.$single_menus->take_away_price.'</span> | $<span id="dl_price_'.$single_menus->id.'">'.$single_menus->delivery_order_price.'</span> </p>';
        $menu_to_show .= '<img src="'.$image_path.'" alt="" width="142">';
        $menu_to_show .= '<p class="item_name">'.$single_menus->name.' ('.$single_menus->code.')</p>';
        $menu_to_show .= '</div>';
    //}


    //if its the last content and there is no more category then set exit to last category
    if($is_new_category==false && $total_menus==$i){
    $menu_to_show .= '</div>';
}

//checks and hold the status of veg item
if($single_menus->veg_item=='Yes'){
$veg_status = "VEG";
}else{
$veg_status = "";
}

//this field was remove from the system
//checks and hold the status of beverage item
// if($single_menus->beverage=='Yes'){
// $soft_status = "BEV";
// }else{
// $soft_status = "";
// }

//this field was remove from the system
//checks and hold the status of bar item
// if($single_menus->bar_item=='Yes'){
// $bar_status = "BAR";
// }else{
// $bar_status = "";
// }

//get modifiers if menu id match with menu modifiers table
$modifiers = '';
$j=1;

$menu_modifiers = $single_menus->modifiers->where('del_status', 'Live');
// dd($menu_modifiers);
foreach($menu_modifiers as $single_menu_modifier){
if($single_menu_modifier->pivot->fd_menu_id ==$single_menus->id){

if($j==count($menu_modifiers)){
$modifiers .="{menu_modifier_id:'".$single_menu_modifier->id."',menu_modifier_name:'".$single_menu_modifier->name."',menu_modifier_price:'".$single_menu_modifier->price."'}";
}else{
$modifiers .="{menu_modifier_id:'".$single_menu_modifier->id."',menu_modifier_name:'".$single_menu_modifier->name."',menu_modifier_price:'".$single_menu_modifier->price."'},";
}

}
$j++;
}

//get shifts if menu id match
$shifts = '';
$s=1;

$menu_shifts = $single_menus->shifts->where('del_status', 'Live');
// dd($menu_shifts);
foreach($menu_shifts as $single_menu_shifts){
if($single_menu_shifts->pivot->fd_menu_id ==$single_menus->id){

if($s==count($menu_shifts)){
$shifts .="{menu_shift_id:'".$single_menu_shifts->id."',menu_shift_name:'".$single_menu_shifts->name."'}";
}else{
$shifts .="{menu_shift_id:'".$single_menu_shifts->id."',menu_shift_name:'".$single_menu_shifts->name."'},";
}

}
$j++;
}

// dd($single_menus->tax_info);


//this portion construct javascript objects, it is used to search item from search input
if($total_menus==$i){
$javascript_obects .= "{item_id:'".$single_menus->id."',item_code:'".$single_menus->code."',category_id:'".$single_menus->categoryInfo->id."',category_name:'".$single_menus->categoryInfo->name."',item_name:'".$single_menus->name."',price:'$".$single_menus->dine_in_price."',t_price:'$".$single_menus->take_away_price."',dl_price:'$".$single_menus->delivery_order_price."',image:'".$image_path."',tax_information:'".$single_menus->tax_info."',vat_percentage:'".$single_menus->percentage."',veg_item:'".$veg_status."',beverage_item:'',bar_item:'',sold_for:'".$single_menus->item_sold."',shifts:[".$shifts."],modifiers:[".$modifiers."]}";
}else{
$javascript_obects .= "{item_id:'".$single_menus->id."',item_code:'".$single_menus->code."',category_id:'".$single_menus->categoryInfo->id."',category_name:'".$single_menus->categoryInfo->name."',item_name:'".$single_menus->name."',price:'$".$single_menus->dine_in_price."',t_price:'$".$single_menus->take_away_price."',dl_price:'$".$single_menus->delivery_order_price."',image:'".$image_path."',tax_information:'".$single_menus->tax_info."',vat_percentage:'".$single_menus->percentage."',veg_item:'".$veg_status."',beverage_item:'',bar_item:'',sold_for:'".$single_menus->item_sold."',shifts:[".$shifts."],modifiers:[".$modifiers."]},";
}

//increasing always with the number of loop to check the number of menus
$i++;



}
/*******************************************************************************************************************
* End of This secion is to construct menu list*********************************************************************
*******************************************************************************************************************
*/

/********************************************************************************************************************
* This section is to construct options of customer select input*****************************************************
* ******************************************************************************************************************
*/
$customers_option = '';
$total_customers = count($customers);
$i = 1;
$customer_objects = '';
foreach ($customers as $customer){
$selected = '';
// $selected = ($customer->id=='1' || $customer->name=='Walk-in Customer')?'selected':'';
if($customer->name=='Walk-in Customer'){
if ($customer->customerGroup) {
$customers_option = '<option value="'.$customer->id.'" data-disc="'.$customer->customerGroup->discount_percentage.'" selected>'.$customer->name.' '.$customer->phone. ' '.$customer->customerGroup->name.'</option>'.$customers_option;
} else {
$customers_option = '<option value="'.$customer->id.'" selected>'.$customer->name.' '.$customer->phone.'</option>'.$customers_option;

}

}else{
if ($customer->customerGroup) {
$customers_option .= '<option value="'.$customer->id.'" data-disc="'.$customer->customerGroup->discount_percentage.'" '.$selected.'>'.$customer->name.' '.$customer->phone.' '.$customer->customerGroup->name.'</option>';
} else {
$customers_option .= '<option value="'.$customer->id.'" '.$selected.'>'.$customer->name.' '.$customer->phone.'</option>';

}


}


if($total_customers==$i){
$customer_objects .= "{customer_id:'".$customer->id."',customer_name:'".$customer->name."',customer_address:'".$customer->address."',gst_number:'".$customer->phone."'}";
}else{
$customer_objects .= "{customer_id:'".$customer->id."',customer_name:'".$customer->name."',customer_address:'".$customer->address."',gst_number:'".$customer->phone."'},";
}

$i++;
}

/********************************************************************************************************************
* This section is to construct options of customer select input*****************************************************
* ******************************************************************************************************************
*/

/********************************************************************************************************************
* This section is to construct options of waiter select input*****************************************************
* ******************************************************************************************************************
*/
$waiters_option = '';

foreach ($waiters as $waiter){
if (Auth::guard('restaurantUser')->user()->role == "Waiter" && $waiter->id == Auth::guard('restaurantUser')->user()->id) {
$waiters_option = '<option value="'.$waiter->id.'" selected>'.$waiter->manager_name.'</option>'.$waiters_option;
} else {

if($waiter->manager_name=='Default Waiter'){
$waiters_option = '<option value="'.$waiter->id.'" selected>'.$waiter->manager_name.'</option>'.$waiters_option;
}else{
$waiters_option .= '<option value="'.$waiter->id.'">'.$waiter->manager_name.'</option>';
}
}



}

/********************************************************************************************************************
* This section is to construct options of waiter select input*****************************************************
* ******************************************************************************************************************
*/

/************************************************************************************************************************
* Construct new orders those are still on processing *******************************************************************
* **********************************************************************************************************************
*/
$order_list_left = '';
$i = 1;
foreach($new_orders as $single_new_order){

$width = 100;
$total_kitchen_type_items = $single_new_order->total_kitchen_type_items;
$total_kitchen_type_started_cooking_items = $single_new_order->total_kitchen_type_started_cooking_items;
$total_kitchen_type_done_items = $single_new_order->total_kitchen_type_done_items;
if($total_kitchen_type_items==0){
$total_kitchen_type_items = 1;
}
$splitted_width = round($width/$total_kitchen_type_items,2);
$percentage_for_started_cooking = round($splitted_width*$total_kitchen_type_started_cooking_items,2);
$percentage_for_done_cooking = round($splitted_width*$total_kitchen_type_done_items,2);
if($i==1){
$order_list_left .= '<div data-started-cooking="'.$total_kitchen_type_started_cooking_items.'" data-done-cooking="'.$total_kitchen_type_done_items.'" class="single_order fix" style="margin-top:0px" data-selected="unselected" id="order_'.$single_new_order->sale_id.'">';
    }else{
    $order_list_left .= '<div data-started-cooking="'.$total_kitchen_type_started_cooking_items.'" data-done-cooking="'.$total_kitchen_type_done_items.'" class="single_order fix" data-selected="unselected" id="order_'.$single_new_order->sale_id.'">';
        }
        $order_list_left .='<div class="inside_single_order_container fix">';
            $order_list_left .='<div class="single_order_content_holder_inside fix">';
                $order_name = '';
                if($single_new_order->order_type=='1'){
                $order_name = 'D '.$single_new_order->sale_no;
                }else if($single_new_order->order_type=='2'){
                $order_name = 'T '.$single_new_order->sale_no;
                }else if($single_new_order->order_type=='3'){
                $order_name = 'DL '.$single_new_order->sale_no;
                }

                $minutes = $single_new_order->minute_difference;
                $seconds = $single_new_order->second_difference;
                $tables_booked = '';


                if($single_new_order->table_id != null){
                $tables_booked = $single_new_order->table->name;
                }else{
                $tables_booked = 'None';
                }

                $order_list_left .= '<span id="open_orders_order_status_'.$single_new_order->sale_id.'" style="display:none;">'.$single_new_order->order_status.'</span>
                <p style="font-size: 16px;text-align: left;width: 125px;float: left;">Order: <span class="running_order_order_number">'.$order_name.'</span></p><img src="'.$baseURL.'assets/images/right-arrow.png" style="float: right;width: 13px;margin: 2px;transition: .25s ease-out;" class="running_order_right_arrow" id="running_order_right_arrow_'.$single_new_order->sale_id.'">';
                $order_list_left .= '<p>Table: <span class="running_order_table_name">'.$tables_booked.'</span></p>';
               // $order_list_left .= '<p>Waiter: <span class="running_order_waiter_name">'.$single_new_order->waiter->manager_name.'</span></p>';
                $order_list_left .= '<p>Customer: <span class="running_order_customer_name">'.$single_new_order->customer->name.'</span></p>';
                $order_list_left .= '
            </div>';
            $order_list_left .= '<div class="order_condition">';
                $order_list_left .= '<p class="order_on_processing">Started Cooking: '.$total_kitchen_type_started_cooking_items.'/'.$total_kitchen_type_items.'</p>';
                $order_list_left .= '<p class="order_done">Done: '.$total_kitchen_type_done_items.'/'.$total_kitchen_type_items.'</p>';
                $order_list_left .= '</div>';
            $order_list_left .= '<div class="order_condition">';
                $order_list_left .= '<p style="font-size:16px;">Time Count: <span id="order_minute_count_'.$single_new_order->sale_id.'">'.str_pad(round($minutes), 2, "0", STR_PAD_LEFT).'</span>:<span id="order_second_count_'.$single_new_order->sale_id.'">'.str_pad(round($seconds), 2, "0", STR_PAD_LEFT).'</span> M</p>';
                $order_list_left .= '</div>';
            $order_list_left .= '</div>';
        $order_list_left .= '</div>';
    $i++;
    }
    /************************************************************************************************************************
    * Construct new orders those are still on processing *******************************************************************
    * **********************************************************************************************************************
    */

    /************************************************************************************************************************
    * Construct notification list ***********************************************************************************
    * **********************************************************************************************************************
    */
    $notification_number = 0;
    if(count($notifications)>0){
    $notification_number = count($notifications);
    }
    $notification_list_show = '';

    foreach ($notifications as $single_notification){
    $notification_list_show .= '<div class="single_row_notification fix" id="single_notification_row_'.$single_notification->id.'">';
        $notification_list_show .= '<div class="fix single_notification_check_box">';
            $notification_list_show .= '<input class="single_notification_checkbox" type="checkbox" id="single_notification_'.$single_notification->id.'" value="'.$single_notification->id.'">';
            $notification_list_show .= '</div>';
        $notification_list_show .= '<div class="fix single_notification">'.$single_notification->notification.'</div>';
        $notification_list_show .= '<div class="fix single_serve_button">';
            $notification_list_show .= '<button class="single_serve_b" id="notification_serve_button_'.$single_notification->id.'">Serve/Take/Delivery</button>';
            $notification_list_show .= '</div>';
        $notification_list_show .= '</div>';

    }

    /************************************************************************************************************************
    * End of Construct notification list ***********************************************************************************
    * **********************************************************************************************************************
    */

    @endphp

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{config('APP_NAME', 'Ask Me POS')}}</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" type="text/css" href="<?php echo $baseURL; ?>assets/POS/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo $baseURL; ?>assets/POS/css/font_awesome_all.css">
        <link rel="stylesheet" href="<?php echo $baseURL; ?>assets/bower_components/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo $baseURL; ?>asset/plugins/iCheck/minimal/color-scheme.css">
        <link rel="stylesheet" href="<?php echo $baseURL; ?>assets/POS/css/jquery-ui.css">
        <script src="<?php echo $baseURL ?>assets/POS/js/jquery-3.3.1.min.js"></script>
        <script src="<?php echo $baseURL ?>assets/POS/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/jquery.slimscroll.min.js"></script>
        <!-- Sweet alert -->
        <script src="<?php echo $baseURL; ?>assets/POS/sweetalert2/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" href="<?php echo $baseURL; ?>assets/POS/sweetalert2/dist/sweetalert.min.css">

        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/calculator.js"></script>
        <script type="text/javascript">
            var warning = "alert";
            var a_error = "error";
            var ok = "ok";
            //alert(warning)
            var cancel = "cancel";
            var please_select_order_to_proceed = "please_select_order_to_proceed";
            var exceeciding_seat = "exceeding_sit";
            var seat_greater_than_zero = "seat_greater_than_zero";
            var are_you_sure_cancel_booking = "are_you_sure_cancel_booking";
            var are_you_delete_notification = "are_you_delete_notification";
            var no_notification_select = "no_notification_select";
            var are_you_delete_all_hold_sale = "are_you_delete_all_hold_sale";
            var no_hold = "no_hold";
            var sure_delete_this_hold = "sure_delete_this_hold";
            var please_select_hold_sale = "please_select_hold_sale";
            var delete_only_for_admin = "delete_only_for_admin";
            var sure_delete_this_order = "sure_delete_this_order";
            var sure_cancel_this_order = "sure_cancel_this_order";
            var please_select_an_order = "please_select_an_order";
            var cart_not_empty = "cart_not_empty";
            var cart_not_empty_want_to_clear = "cart_not_empty_want_to_clear";
            var progress_or_done_kitchen = "progress_or_done_kitchen";
            var order_in_progress_or_done = "order_in_progress_or_done";
            var close_order_without = "close_order_without";
            var want_to_close_order = "want_to_close_order";
            var please_select_open_order = "please_select_open_order";
            var cart_empty = "cart_empty";
            var select_a_customer = "select_a_customer";
            var select_a_waiter = "select_a_waiter";
            var delivery_not_possible_walk_in = "delivery_not_possible_walk_in";
            var delivery_for_customer_must_address = "delivery_for_customer_must_address";
            var select_dine_take_delivery = "select_dine_take_delivery";
            var added_running_order = "added_running_order";
        </script>


        <base data-base="<?php echo $baseURL; ?>">
        <base data-role="<?php echo Auth::guard('restaurantUser')->user()->role; ?>">
        <base data-currency="$">
        <base data-shift="<?php echo $shift_id; ?>">
        <base data-collect-tax="<?php echo $restaurant->taxSettings->collect_tax; ?>">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo $baseURL; ?>assets/images/favicon.ico" type="image/x-icon">
        <!-- Favicon -->
        <link rel="icon" href="<?php echo $baseURL; ?>assets/images/favicon.ico" type="image/x-icon">
        <style type="text/css">
            #language {
                display: inline-block;
                width: 20%;
                margin-bottom: 3px;
            }

            canvas,
            img,
            figure {
                display: block;
            }

            .canvas_container {
                max-width: 800px;
                margin: 0 auto;
            }


            canvas {
                margin: 2em auto;
                max-width: 100%;
                outline: 2px solid #444;
            }

            .p {
                text-align: center;
                font-size: 14px;
                padding-top: 50px;
            }

            #shift {
                float: left;
                margin-right: 5px;
                padding: 2px 10px 2px 10px;
            }
        </style>
    </head>

    <body>



        <div class="modalOverlay"></div>

        <input type="hidden" name="print_status" id="" value="">
        <input type="hidden" name="print_type" class="print_type" id="print_type" value="">

        <span id="stop_refresh_for_search" style="display:none;">yes</span>
        <div class="wrapper fix">
            <div class="top_header_part fix">
                <div class="header_part_left_left fix">
                    <div class="fix outlet_holder">
                        <div class="fix outlet_holder_moving">
                            <p class="marquee">{{$restaurant->name}}</p>
                        </div>
                    </div>
                </div>
                <div class="header_part_left fix">
                    <button id="open_hold_sales"><i class="fas fa-folder-open"></i> Open Hold Sale</button>
                    <button id="help_button" disabled><i class="fas fa-question-circle"></i> Read Before Begin</button>
                    <button id="calculator_button" style="margin-right: 3px;"> <i class="fas fa-calculator"></i> Calculator</button>
                    <!-- <button id="kitchen_waiter_bar_button" style="    padding: 0px 10px;margin: 0px;"><i class="fas fa-directions"></i> kitchen_waiter_bar</button> -->

                    <!-- <button id="keyboard_shortcuts_button"><i class="fas fa-keyboard"></i> Keyboard Shortcuts</button> -->
                </div>
                <div class="header_part_right fix">
                    <div class="header_single_button_holder" style="width:15%">
                        <button style="float:left;" id="last_ten_sales_button" disabled><i class="fas fa-history"></i> Last 10 sales</button>
                    </div>

                    <div style="text-align:center;width:22%;" class="header_single_button_holder">
                        <button id="notification_button"><i class="fas fa-bell"></i> kitchen notification (<span id="notification_counter">{{$notification_number}}</span>)</button>
                    </div>


                    <div style="text-align:center;width:18%;" class="header_single_button_holder">
                        <button id="open_online_order">
                            <i class="fas fa-cart-plus"></i> Online Orders
                        </button>
                    </div>

                    <div class="header_single_button_holder" style="width:14%;">
                        <button  id="register_close" onclick="__reg_close()" style="float:right;" disabled><i class="fas fa-times"></i> Register</button>
                    </div>
                    <div class="header_single_button_holder" style="width:17%; ">
                        <a href="{{route('restaurant.home')}}" id="go_to_dashboard"><button style="float:right;"><i class="fas fa-caret-square-left"></i>
                                <?php
                                if (Auth::guard('restaurantUser')->user()->role == 'Manager') {
                                    echo "Dashboard";
                                } else {
                                    echo "Back";
                                }
                                ?>
                            </button></a>
                    </div>
                    <div class="header_single_button_holder" style="width:14%">
                        <a href="<?php echo $baseURL; ?>restaurant/logout"><button style="float:right;"><i class="fas fa-sign-out-alt"></i> Logout</button></a>
                    </div>

                </div>
            </div>
            <div id="main_part fix" style="display:flex; justify-content: space-between;">
                <div class="main_left fix">
                    <div class="holder fix">
                        <div id="running_order_header">
                            <h3>Running Order</h3>
                            <span id="refresh_order"><i class="fas fa-sync-alt"></i></span>
                            <input type="text" name="search_running_orders" id="search_running_orders" autocomplete='off' style="height: 15px;margin: 0px 0px 0px 5px;width: 90%;" placeholder="Customer, Waiter, Order, Table" />
                        </div>

                        <div class="order_details fix" id="order_details_holder">
                            <?php echo $order_list_left; ?>
                        </div>

                        <div style="position: absolute;bottom: 8px;width:100%;" id="left_side_button_holder_absolute">
                            <?php if ("Post Payment" == "Post Payment") { ?>
                                <button class="operation_button fix" id="modify_order"><i class="fas fa-edit"></i> Modify Order</button>
                            <?php } ?>
                            <button class="operation_button fix" id="single_order_details"><i class="fas fa-info-circle"></i> Order Details</button>

                            {{-- <div style="display:flex;justify-content:space-between;width:94%;position:relative">
                                <button style="width:calc(98% / 2)" class="operation_button fix" id="print_kot">
                                    <i class="fas fa-print"></i>KOT
                                </button>
                                <div class="kotToolTip">Print KOT</div>
                                <button style="width:calc(98% / 2);margin-bottom:5px" class="operation_button" id="print_bot">
                                    <i class="fas fa-print"></i> BOT
                                </button>
                                <div class="botToolTip">Print BOT</div>
                            </div> --}}

                            <div style="display:flex;justify-content:space-between;width:94%;position:relative;">
                                <?php if ("Post Payment" == "Post Payment") { ?>
                                    <button style="width:calc(98% / 2);" class="operation_button fix" id="create_invoice_and_close">
                                        Create Invoice Close
                                    </button>
                                    <div class="invoiceToolTip">Print Invoice and Close Order</div>
                                <?php } ?>
                                <button style="width:calc(98% / 2);margin-bottom:5px;" class="operation_button fix" id="create_bill_and_close">
                                    bill
                                </button>
                                <div class="billToolTip">Print Bill for Customer Before Invoicing</div>
                            </div>

                            <?php if ("Post Payment" == "Pre Payment") { ?>
                                <button class="operation_button fix" id="print_invoice"><i class="fas fa-file-invoice"></i> Create Invoice</button>
                                <button class="operation_button fix" id="close_order_button"><i class="fas fa-times-circle"></i> Close Order</button>
                            <?php } ?>

                            <?php if ("Post Payment" == "Post Payment") { ?>
                                <button class="operation_button fix" id="cancel_order_button"><i class="fas fa-ban"></i> Cancel Order</button>
                            <?php } ?>

                            <button class="operation_button fix" id="kitchen_status_button"><i class="fas fa-spinner"></i> Kitchen Status</button>
                        </div>
                    </div>
                </div>
                <div class="main_middle fix">
                    <div class="main_top fix">
                        <div class="button_holder fix">
                            <div class="single_button_middle_holder fix">
                                <button data-selected="unselected" style="float:left;margin-left:2px;" id="dine_in_button"><i class="fas fa-table"></i> Dine In</button>
                            </div>
                            <div style="text-align:center;" class="single_button_middle_holder fix">
                                <button id="take_away_button"><i class="fas fa-shopping-bag"></i> Take Away</button>
                            </div>
                            <div class="single_button_middle_holder fix">
                                <button data-selected="unselected" style="float:right;" id="delivery_button"><i class="fas fa-truck"></i> Delivery</button>
                            </div>

                        </div>
                        <div class="waiter_customer">
                            <div class="single_button_middle_holder" style="width:33.3%">
                                <select style="width:92%;margin-left:2px;" id="select_waiter" class="select2 select_waiter">
                                    <option value="">Waiter</option>
                                    <?php echo $waiters_option; ?>
                                </select>
                            </div>
                            <div class="single_button_middle_holder">
                                <div class="inner3item">
                                    <select id="walk_in_customer" id="select_walk_in_customer" class="select2">
                                        <option value="">Customer</option>
                                        <?php echo $customers_option; ?>
                                    </select>
                                    <i class="fas fa-pencil-alt" title="Edit Customer" id="edit_customer"></i>
                                    <button id="plus_button" title="Add Customer"><i class="fas fa-plus-square"></i></button>
                                </div>


                            </div>
                            <div class="single_button_middle_holder">
                                <button id="table_button"><i class="fas fa-table"></i> Table</button>
                            </div>
                        </div>
                        <!-- <select>
                                <option>Table</option>
                        </select> -->

                    </div>

                    <div class="main_center fix">
                        <div class="order_table_holder fix">
                            <div class="order_table_header_row fix">
                                <div class="single_header_column fix" id="single_order_item">Item</div>
                                <div class="single_header_column fix" id="single_order_price">Price</div>
                                <div class="single_header_column fix" id="single_order_qty">Qty</div>
                                <div class="single_header_column fix" id="single_order_discount">Discount</div>
                                <div class="single_header_column" id="single_order_total">Total</div>
                            </div>
                            <div class="order_holder fix cardIsEmpty" style="overflow-y: scroll;">

                            </div>
                        </div>

                    </div>
                    <div style="position: absolute;bottom: -7px;width: 100%" id="bottom_absolute">

                        <table cellspacing="0" cellpadding="0">
                            <!-- <tr style="background-color: #ffffff">
                                    <th style="width:50%;text-align:left;padding-left:10px">&nbsp;</th>
                                    <th style="width:10%;">&nbsp;</th>
                                    <th style="width:15%;">&nbsp;</th>
                                    <th style="width:10%;">&nbsp;</th>
                                    <th style="width:15%;text-align:right;padding-right:10px;">&nbsp;</th>
                                </tr> -->
                            <tr style="background-color:#F7FAFC;">
                                <td style="padding-left:10px;font-weight:bold;text-align:left;">Total Item: <span id="total_items_in_cart_with_quantity">0</span> <span id="total_items_in_cart" style="display: none;">0</span></td>
                                <td style="font-weight:bold;text-align:right;" colspan="3">Sub Total</td>
                                <td style="font-weight:bold;text-align:right;padding-right:10px;">$ <span id="sub_total_show">0.00</span><span id="sub_total" style="display:none;">0.00</span>
                                    <span id="total_item_discount" style="display:none">0</span><span id="discounted_sub_total_amount" style="display:none;">0.00</span>
                                </td>
                            </tr>
                            <tr style="background-color:#F7FAFC;">
                                <td style="padding-left:10px;font-weight:bold;text-align:left;">Processing Date & Time: <span id="processing_date_time"></span><input type="datetime-local" id="hidden_processing_date_time" hidden value="" /></td>
                                <td style="font-weight:bold;text-align:right;" colspan="3">Discount</td>
                                <td style="text-align:right;padding-right:10px;">
                                    <input type="text" name="" class="special_textbox" placeholder="Amt or %" id="sub_total_discount" />
                                    <span style="display:none" id="sub_total_discount_amount"></span>
                                </td>
                            </tr>
                            <tr style="background-color:#F7FAFC;">
                                <td style="font-weight:bold;text-align:right;padding-right:10px;" colspan="5"><span id="all_items_vat" style="display: block;overflow: auto;height: 30px;"></span></td>
                            </tr>
                            <tr style="background-color:#F7FAFC;">
                                <td></td>
                                <td style="font-weight:bold;text-align:right;" colspan="3">Others Discount(%)</td>
                                <td style="font-weight:bold;text-align:right;padding-right:10px;"><span id="others_discount"></span><span id="total_others_discount" style="display:none">0</span></td>
                            </tr>
                            <tr style="background-color:#F7FAFC;">
                                <td></td>
                                <td style="font-weight:bold;text-align:right;" colspan="3">Total Discount</td>
                                <td style="font-weight:bold;text-align:right;padding-right:10px;">$ <span id="all_items_discount">0.00</span></td>
                            </tr>
                            <tr style="background-color:#F7FAFC;">
                                <td></td>
                                <td style="font-weight:bold;text-align:right;" colspan="3">Delivery Charge</td>
                                <td style="text-align:right;padding-right:10px;"><input type="" name="" class="special_textbox" placeholder="Amt" id="delivery_charge" /></td>
                            </tr>
                            <tr style="background-color: #F7FAFC;height: 30px;">
                                <td></td>
                                <td style="font-weight:bold;text-align:right;" colspan="3">Total Payable</td>
                                <td style="font-weight:bold;text-align:right;padding-right:10px;">$<span id="total_payable">0.00</span></td>
                            </tr>
                        </table>
                        <div class="main_bottom fix" style="padding-top:2px;">
                            <div class="button_group fix">
                                <div class="single_button_middle_holder cart_bottom_buttons" style="width:17%;">
                                    <button style="float:left;padding:0px 3px;" id="cancel_button"><i class="fas fa-times"></i> Cancel</button>
                                </div>
                                <div style="text-align:center;width:20%;" class="single_button_middle_holder cart_bottom_buttons">
                                    <button id="hold_sale" style="padding:0px 3px;"><i class="fas fa-hand-rock"></i></i> Hold</button>
                                </div>
                                <div class="single_button_middle_holder cart_bottom_buttons" style="width:28%;">
                                    <button style="float:right;margin-right:2px;padding:0px 3px;" id="direct_invoice" disabled><i class="fas fa-file-invoice"></i> <span id="place_edit_order_direct_invoice">Direct Invoice</span></button>
                                </div>
                                <div class="single_button_middle_holder cart_bottom_buttons" style="width:34%;">
                                    <button style="float:right;margin-right:2px;padding:0px 3px;" class="placeOrderSound" id="place_order_operation"><i class="fas fa-utensils"></i> <span id="place_edit_order">Place Order</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- category slider --}}

                <div class="main_right fix">
                    {{-- <div style="display: block"> --}}
                    @if (count($restaurant->shifts)> 0)
                    @if (Auth::guard('restaurantUser')->user()->role == "Manager")
                    {{-- <button class="shift" id="shift"><i class="fas fa-bars"></i></i></button>--}}
                    <select class="select2" name="shift" id="shift">
                        @foreach ($restaurant->shifts->where('del_status', 'Live') as $restaurantShift)
                        <option value="{{$restaurantShift->id}}" @if ($restaurantShift->id == $shift_id) selected @endif>{{$restaurantShift->name}}</option>
                        @endforeach
                    </select>
                    @else
                    <select class="select2" name="shift" id="shift" disabled>
                        @foreach ($restaurant->shifts->where('del_status', 'Live') as $restaurantShift)
                        <option value="{{$restaurantShift->id}}" @if ($restaurantShift->id == $shift_id) selected @endif>{{$restaurantShift->name}}</option>
                        @endforeach
                    </select>
                    @endif

                    @endif
                    <input type="text" name="search" id="search" autocomplete="off" placeholder="Name Or Code Or Cat Or Veg Or Bev" />
                    {{-- </div> --}}
                    <div class="select_category fix">
                        <button class="category_next_prev" id="previous_category"><i class="fas fa-angle-left"></i></i></button>
                        <div class="select_category_inside">
                            <div class="select_category_inside_inside">
                                <button class="category_button" style="border-left: solid 2px #DEDEDE;">All</button>
                                @if ($subcategories)
                                @foreach ($subcategories as $category)

                                <button class="category_button" onclick="show_catagory('{{$category->id}}')" style="border-left: solid 2px #DEDEDE;">{{$category->name}}</button>

                                @endforeach
                                @endif
                            </div>

                        </div>
                        <button class="category_next_prev" id="next_category"><i class="fas fa-angle-right"></i></button>
                    </div>

                    <!-- subasish -->

                    <div class="select_category fix">
                        <button class="category_next_prev" id="previous_category"><i class="fas fa-angle-left"></i></i></button>
                        <div class="select_category_inside">
                            <div class="select_category_inside_inside" id="catagory_button">

                            @if ($categories)
                                @foreach ($categories as $ct)

                                <button class="category_button" id="button_category_{{$ct->id}}"  style="border-left: solid 2px #DEDEDE;">{{$ct->name}}</button>

                                @endforeach
                                @endif


                            </div>

                        </div>
                        <button class="category_next_prev" id="next_category"><i class="fas fa-angle-right"></i></button>
                    </div>
                    <div style="position:relative;" id="main_item_holder">
                        <div style="position:absolute;bottom:0px;width:100%" id="secondary_item_holder">
                            <div class="category_items fix">
                                {{-- {{$menu_to_show}} --}}
                                {!!$menu_to_show!!}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="overlayForCalculator"></div>
        <!-- item modal -->
        <!-- The Modal -->
        <div id="item_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span id="modal_item_row" style="display:none">0</span>
                <span id="modal_item_id" style="display:none"></span>
                <span id="modal_item_price" style="display:none"></span>
                <span id="modal_item_vat_percentage" style="display:none"></span>
                <h1 id="modal_item_name">item_name</h1>
                <div style="margin: 0 5px;">
                    <div class="section1 fix">
                        <div class="sec1_inside" id="sec1_1">Quantity</div>
                        <div class="sec1_inside" id="sec1_2"><i class="fas fa-minus-circle" id="decrease_item_modal"></i> <span id="item_quantity_modal">1</span> <i class="fas fa-plus-circle" id="increase_item_modal"></i></div>
                        <div class="sec1_inside" id="sec1_3">$ <span id="modal_item_price_variable" style="display:none;">0</span><span id="modal_item_price_variable_without_discount">0</span><span id="modal_discount_amount" style="display:none;">0</span></div>
                    </div>
                    <div class="section2 fix">
                        <div class="sec2_inside" id="sec2_1">Modifiers</div>
                        <div class="sec2_inside" id="sec2_2">$<span id="modal_modifier_price_variable">0</span><span id="modal_modifiers_unit_price_variable" style="display: none;">0</span></div>
                    </div>
                    <div class="section3 fix">
                        <div class="modal_modifiers">
                            <p>cool_haus_1</p>
                        </div>
                        <div class="modal_modifiers">
                            <p>first_scoo_1</p>
                        </div>
                        <div class="modal_modifiers">
                            <p>mg_1</p>
                        </div>
                        <div class="modal_modifiers">
                            <p>modifier_1</p>
                        </div>
                        <div class="modal_modifiers">
                            <p>cool_haus_1</p>
                        </div>
                        <div class="modal_modifiers">
                            <p>first_scoo_2</p>
                        </div>
                        <div class="modal_modifiers">
                            <p>mg-2</p>
                        </div>
                        <div class="modal_modifiers">
                            <p>modifier_1</p>
                        </div>
                    </div>
                    <div id="modal_discount_section">
                        <p style="float: left;margin: 0px 0px 0px 2px;font-size: 16px;">Discount</p><input type="text" name="" id="modal_discount" placeholder="Amt or %" />
                    </div>
                    <div class="section4 fix">Total&nbsp;&nbsp;&nbsp;$<span id="modal_total_price">0</span></div>
                </div>
                <div class="section5 fix">Note:</div>
                <div class="section6 fix">
                    <textarea name="item_note" id="modal_item_note" maxlength="50"></textarea>
                </div>
                <div class="section7 fix">
                    <div class="sec7_inside" id="sec7_2"><button id="add_to_cart">Add To Cart</button></div>
                    <div class="sec7_inside" id="sec7_1"><button id="close_item_modal">Cancel</button></div>
                </div>

                <!-- <span class="close">&times;</span> -->
                <!-- <p>Some text in the Modal..</p> -->
            </div>

        </div>
        <!-- end of item modal -->

        <!--add customer modal -->
        <!-- The Modal -->
        <div id="add_customer_modal" class="modal" style="padding-top:20px;">

            <!-- Modal content -->
            <div class="modal-content" id="editCustomer1">
                <h1>Add Customer</h1>

                <div class="customer_add_modal_info_holder">
                    <div class="content">

                        <div class="left-item b">
                            <input type="hidden" id="customer_id_modal" name="customer_id" value="">
                            <div class="customer_section fix">
                                <p class="input_level">Name <span style="color:red;">*</span></p>
                                <input type="text" class="add_customer_modal_input" id="customer_name_modal" required>
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">Phone <span style="color:red;">*</span></p>
                                <input type="text" class="add_customer_modal_input" id="customer_phone_modal" required>
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">Email</p>
                                <input type="email" class="add_customer_modal_input" id="customer_email_modal">
                            </div>

                            <div class="customer_section fix">
                                <p class="input_level">Country</p>
                                <select tabindex="1" class="add_customer_modal_input select2" name="country" style="width: 100%;" id="country">
                                    <option value="" selected>Select a Country</option>
                                    @if(count($countries) > 0)
                                    @foreach($countries as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">State</p>
                                <select tabindex="1" class="add_customer_modal_input select2" name="state" style="width: 100%;" id="state">
                                    <option value="">Select a State</option>
                                </select>
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">City</p>
                                <select tabindex="1" class="add_customer_modal_input select2" name="city" id="city" style="width: 100%;">
                                    <option value="">Select a City</option>
                                </select>
                            </div>
                        </div>

                        <div class="right-item b">
                            <div class="customer_section fix">
                                <p class="input_level">Apt.</p>
                                <input type="text" name="apt" class="add_customer_modal_input" id="customer_apt_number_modal" placeholder="Apt.">
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">Delivery Address</p>
                                <textarea id="customer_delivery_address_modal"></textarea>
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">Zip <span style="color:red;">*</span></p>
                                <input type="text" name="zip" class="add_customer_modal_input" id="customer_zip_modal" placeholder="zip.">
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">Code</p>
                                <input type="text" name="code" class="add_customer_modal_input" id="customer_code_modal" placeholder="zip.">
                            </div>
                            <div class="customer_section fix">
                                <p class="input_level">Customer Groups</p>
                                <select tabindex="1" class="add_customer_modal_input select2" name="customer_group" style="width: 100%;" id="customer_group_modal">
                                    <option value="">Select a Customer Group</option>
                                    @if(count($customerGroups) > 0)
                                    @foreach($customerGroups as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->name}}({{$v->discount_percentage}}%)</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="customer_section fix">
                        <p class="input_level">Note <span style="color:red;">*</span></p>
                        <textarea class="add_customer_modal_input" id="customer_note_modal"></textarea>

                    </div>
                </div>

                <div class="section7 fix">
                    <div class="sec7_inside" id="sec7_2"><button id="add_customer">Submit</button></div>
                    <div class="sec7_inside" id="sec7_1"><button id="close_add_customer_modal">Cancel</button></div>
                </div>
                <!-- <span class="close">&times;</span> -->
                <!-- <p>Some text in the Modal..</p> -->
            </div>

        </div>
        <!-- end add customer modal -->

        <!--add customer modal -->
        <!-- The Modal -->
        <!-- <div id="show_tables_modal" class="modal">

            <div class="modal-content" id="modal_content_show_tables">
                <h1>Tables</h1>

                <div class="select_table_modal_info_holder fix">



                </div>

                <div class="section7 fix">
                    <div class="sec7_inside" id="sec7_1"><button id="close_select_table_modal">Cancel</button></div>
                    <div class="sec7_inside" id="sec7_2"><button id="selected_table_done">Done</button></div>
                </div>
            </div>

        </div> -->
        <!-- end add customer modal -->

        {{-- set floors --}}
        <!-- The Modal -->
        <div id="show_tables_modal2" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_content_show_tables2">
                <h1 style="position: relative">
                    Tables
                    <a href="javascript:void(0)" style="top: 10px;right: 20px;" class="alertCloseIcon" id="table_modal_cancel_button2">X</a>
                </h1>
                <p id="new_or_order_number_table">Order number: <span id="order_number_or_new_text">New</span></p>
                <p class="select_floor">
                    <select style="width:15%;" id="select_floor" class="select2">
                        <option value=""> Select Floor </option>
                        @foreach ($floors as $floor)
                        <option value="{{$floor->id}}">{{$floor->name}} </option>
                        @endforeach
                    </select>
                </p>
                <div id="canvas_container" class="canvas_container">
                    <canvas id="floor_design" width="800" height="400">
                        <p>This is fallback content for users of assistive technologies or of browsers that don't have full support for the Canvas API.</p>
                    </canvas>
                </div>
                {{-- <div id="table" class="select_table_modal_info_holder2 fix">
                </div> --}}
                <div id="table">
                    <input id="selected_table" type="hidden" name="table_id" value="0">
                </div>

                <div class="fix bottom_button_holder_table_modal">
                    <div class="left fix floatleft half">
                        <button id="please_read_table_modal_button"><i class="fas fa-question-circle"></i> please_read</button>
                    </div>
                    <div class="right fix floatleft half">
                        <button class="floatright" onclick="_find_reservation()" id="submit_table_modal">Done</button>
                        <button class="floatright" id="proceed_without_table_button">Proceed Without Table</button>
                        <button class="floatright" id="table_modal_cancel_button">Cancel</button>
                    </div>
                </div>
                <!-- <span class="close">&times;</span> -->
                <!-- <p>Some text in the Modal..</p> -->
            </div>

        </div>
        <!-- end add customer modal -->

        <!-- The online Order modal -->
        <div id="show_online_order_modal" class="modal">
            <!-- Modal content -->
            <div class="modal-content" id="modal_content_online_order">
                <p class="cross_button_to_close cCloseIcon" id="online_order_close_button_cross">X</p>
                <!-- <img id="hold_sales_close_button_cross" class="close_button" src="<?php echo $baseURL; ?>assets/images/close_icon.png"> -->
                <div class="online_order_modal_info_holder fix">
                    <h1 class="main_header fix">Online Order</h1>
                    <div class="detail_online_order_holder fix">
                        <div class="online_order_left fix">
                            <div class="online_order_list_holder fix">
                                <div class="header_row fix">
                                    <div class="first_column column fix">Order Number</div>
                                    <div class="second_column column fix">Customer</div>
                                    <div class="third_column column fix">Table</div>
                                </div>
                                <div class="detail_holder fix">
                                    {{-- <div class="single_hold_sale fix">
                                        <div class="first_column column fix">08</div>
                                        <div class="second_column column fix">walk_in_customer</div>
                                        <div class="third_column column fix">table 7</div>
                                    </div> --}}
                                    <div class="single_online_order fix">
                                        <div class="first_column column fix">07</div>
                                        <div class="second_column column fix">walk in customer</div>
                                        <div class="third_column column fix">table 7</div>
                                    </div>
                                </div>
                                {{-- <div class="delete_all_online_order_container fix">
                                    <button id="delete_all_online_order_button">Delete all hold sale</button>
                                </div> --}}
                            </div>
                        </div>
                        <div class="online_order_right fix">
                            <div class="top fix">
                                <div class="top_middle fix">
                                    <h1>Order Details</h1>
                                    <div class="waiter_customer_table fix">
                                        <div class="fix order_type"><span style="font-weight: bold;">Order Type: </span><span id="online_order_order_type"></span><span id="online_order_order_type_id" style="display:none;"></span></div>
                                    </div>
                                    <div class="waiter_customer_table fix">
                                        <div class="waiter fix"><span style="font-weight: bold;">Waiter: </span><span style="display:none;" id="online_order_waiter_id"></span><span id="online_order_waiter_name"></span></div>
                                        <div class="customer fix"><span style="font-weight: bold;">Customer: </span><span style="display:none;" id="online_order_customer_id"></span><span id="online_order_customer_name"></span></div>
                                    </div>
                                    <div class="item_modifier_details fix">
                                        <div class="modifier_item_header fix">
                                            <div class="first_column_header column_hold fix">Item</div>
                                            <div class="second_column_header column_hold fix">Price</div>
                                            <div class="third_column_header column_hold fix">Qty</div>
                                            <div class="forth_column_header column_hold fix">Discount</div>
                                            <div class="fifth_column_header column_hold fix">Total</div>
                                        </div>
                                        <div class="modifier_item_details_holder fix">
                                        </div>
                                        <div class="bottom_total_calculation_online_order fix">
                                            <div class="single_row first fix">
                                                <div class="first_column fix">Total Item: <span id="total_items_in_cart_online_order">0</span></div>
                                                <div class="second_column fix">Sub Total</div>
                                                <div class="third_column fix">$ <span id="sub_total_show_online_order">0.00</span>
                                                    <span id="sub_total_online_order" style="display:none;">0.00</span>
                                                    <span id="total_item_discount_online_order" style="display:none;">0.00</span>
                                                    <span id="discounted_sub_total_amount_online_order" style="display:none;">0.00</span>
                                                </div>
                                            </div>
                                            <div class="single_row second fix">
                                                <div class="first_column fix">Discount</div>
                                                <div class="second_column fix"><span id="sub_total_discount_online_order"></span><span id="sub_total_discount_amount_online_order" style="display:none;">0.00</span></div>
                                            </div>
                                            <div class="single_row third fix">
                                                <!-- <div class="first_column fix">VAT</div> -->
                                                <div class="second_column fix" colspan="5" style="width:100%;"><span id="all_items_vat_online_order" style="display: block;overflow: auto;height: 40px;">0.00</span></div>
                                            </div>
                                            <div class="single_row forth fix">
                                                <div class="first_column fix">Total Discount</div>
                                                <div class="second_column fix">$ <span id="all_items_discount_online_order">0.00</span></div>
                                            </div>
                                            <div class="single_row fifth fix">
                                                <div class="first_column fix">Delivery Charge</div>
                                                <div class="second_column fix">$ <span id="delivery_charge_online_order">0.00</span></div>
                                            </div>
                                            <div class="single_row sixth fix">
                                                <div class="first_column fix">Total Payable</div>
                                                <div class="second_column fix">$ <span id="total_payable_online_order">0.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="button_holder">
                                    <div class="single_button_holder">
                                        <button id="online_order_accepte_to_running_order_button">Accepte</button>
                                    </div>
                                    <div class="single_button_holder">
                                        <button id="online_order_reject_button">Reject</button>
                                    </div>
                                    <div class="single_button_holder">
                                        <button id="online_order_close_button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end online Order modal -->

        <!-- The sale hold modal -->
        <div id="show_sale_hold_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_content_hold_sales">
                <p class="cross_button_to_close cCloseIcon" id="hold_sales_close_button_cross">X</p>
                <!-- <img id="hold_sales_close_button_cross" class="close_button" src="<?php echo $baseURL; ?>assets/images/close_icon.png"> -->
                <div class="hold_sale_modal_info_holder fix">
                    <h1 class="main_header fix">Hold Sale</h1>
                    <div class="detail_hold_sale_holder fix">
                        <div class="hold_sale_left fix">
                            <div class="hold_list_holder fix">
                                <div class="header_row fix">
                                    <div class="first_column column fix">Hold Number</div>
                                    <div class="second_column column fix">Customer</div>
                                    <div class="third_column column fix">Table</div>
                                </div>
                                <div class="detail_holder fix">
                                    {{-- <div class="single_hold_sale fix">
                                        <div class="first_column column fix">08</div>
                                        <div class="second_column column fix">walk_in_customer</div>
                                        <div class="third_column column fix">table 7</div>
                                    </div> --}}
                                    <div class="single_hold_sale fix">
                                        <div class="first_column column fix">07</div>
                                        <div class="second_column column fix">walk in customer</div>
                                        <div class="third_column column fix">table 7</div>
                                    </div>
                                </div>
                                <div class="delete_all_hold_sales_container fix">
                                    <button id="delete_all_hold_sales_button">Delete all hold sale</button>
                                </div>
                            </div>
                        </div>
                        <div class="hold_sale_right fix">
                            <div class="top fix">
                                <div class="top_middle fix">
                                    <h1>Order Details</h1>
                                    <div class="waiter_customer_table fix">
                                        <div class="fix order_type"><span style="font-weight: bold;">Order Type: </span><span id="hold_order_type"></span><span id="hold_order_type_id" style="display:none;"></span></div>
                                    </div>
                                    <div class="waiter_customer_table fix">
                                        <div class="waiter fix"><span style="font-weight: bold;">Waiter: </span><span style="display:none;" id="hold_waiter_id"></span><span id="hold_waiter_name"></span></div>
                                        <div class="customer fix"><span style="font-weight: bold;">Customer: </span><span style="display:none;" id="hold_customer_id"></span><span id="hold_customer_name"></span></div>
                                        <div class="table fix"><span style="font-weight: bold;">Table: </span><span style="display:none;" id="hold_table_id"></span><span id="hold_table_name"></span></div>
                                    </div>
                                    <div class="item_modifier_details fix">
                                        <div class="modifier_item_header fix">
                                            <div class="first_column_header column_hold fix">Item</div>
                                            <div class="second_column_header column_hold fix">Price</div>
                                            <div class="third_column_header column_hold fix">Qty</div>
                                            <div class="forth_column_header column_hold fix">Discount</div>
                                            <div class="fifth_column_header column_hold fix">Total</div>
                                        </div>
                                        <div class="modifier_item_details_holder fix">
                                        </div>
                                        <div class="bottom_total_calculation_hold fix">
                                            <div class="single_row first fix">
                                                <div class="first_column fix">Total Item: <span id="total_items_in_cart_hold">0</span></div>
                                                <div class="second_column fix">Sub Total</div>
                                                <div class="third_column fix">$ <span id="sub_total_show_hold">0.00</span>
                                                    <span id="sub_total_hold" style="display:none;">0.00</span>
                                                    <span id="total_item_discount_hold" style="display:none;">0.00</span>
                                                    <span id="discounted_sub_total_amount_hold" style="display:none;">0.00</span>
                                                </div>
                                            </div>
                                            <div class="single_row second fix">
                                                <div class="first_column fix">Discount</div>
                                                <div class="second_column fix"><span id="sub_total_discount_hold"></span><span id="sub_total_discount_amount_hold" style="display:none;">0.00</span></div>
                                            </div>
                                            <div class="single_row third fix">
                                                <!-- <div class="first_column fix">VAT</div> -->
                                                <div class="second_column fix" colspan="5" style="width:100%;"><span id="all_items_vat_hold" style="display: block;overflow: auto;height: 40px;">0.00</span></div>
                                            </div>
                                            <div class="single_row forth fix">
                                                <div class="first_column fix">Total Discount</div>
                                                <div class="second_column fix">$ <span id="all_items_discount_hold">0.00</span></div>
                                            </div>
                                            <div class="single_row fifth fix">
                                                <div class="first_column fix">Delivery Charge</div>
                                                <div class="second_column fix">$ <span id="delivery_charge_hold">0.00</span></div>
                                            </div>
                                            <div class="single_row sixth fix">
                                                <div class="first_column fix">Total Payable</div>
                                                <div class="second_column fix">$ <span id="total_payable_hold">0.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="button_holder">
                                    <div class="single_button_holder">
                                        <button id="hold_edit_in_cart_button">Edit in cart</button>
                                    </div>
                                    <div class="single_button_holder">
                                        <button id="hold_delete_button">Delete</button>
                                    </div>
                                    <div class="single_button_holder">
                                        <button id="hold_sales_close_button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end sale hold modal -->

        <!-- show_last_ten_sales_modal -->
        <div id="show_last_ten_sales_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_content_last_ten_sales">
                <p class="cross_button_to_close cCloseIcon" id="last_ten_sales_close_button_cross">X</p>
                <div class="last_ten_sales_modal_info_holder fix">
                    <h1 class="main_header fix">last_ten_sales</h1>
                    <div class="last_ten_sales_holder fix">
                        <div class="hold_sale_left fix">
                            <div class="hold_list_holder fix">
                                <div class="header_row fix">
                                    <div class="first_column column fix">sale_no</div>
                                    <div class="second_column column fix">customer</div>
                                    <div class="third_column column fix">table</div>
                                </div>
                                <div class="detail_holder fix">
                                    <div class="single_hold_sale fix">
                                        <div class="first_column column fix">09</div>
                                        <div class="second_column column fix">walk_in_customer</div>
                                        <div class="third_column column fix">table 8</div>
                                    </div>
                                    <div class="single_hold_sale fix">
                                        <div class="first_column column fix">08</div>
                                        <div class="second_column column fix">walk_in_customer</div>
                                        <div class="third_column column fix">table 7</div>
                                    </div>
                                    <div class="single_hold_sale fix">
                                        <div class="first_column column fix">07</div>
                                        <div class="second_column column fix">walk_in_customer</div>
                                        <div class="third_column column fix">table 7</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hold_sale_right fix">
                            <div class="top fix">
                                <div class="top_middle fix">
                                    <h1>order_details</h1>
                                    <div class="waiter_customer_table fix">
                                        <div class="fix order_type">
                                            <span style="font-weight: bold;">order_type: </span>
                                            <span id="last_10_order_type" style="width: 112px;display: inline-block;">&nbsp;</span>
                                            <span id="last_10_order_type_id" style="display:none;"></span>
                                            <span style="font-weight: bold;">invoice_no: </span>
                                            <span id="last_10_order_invoice_no"></span>
                                        </div>
                                    </div>
                                    <div class="waiter_customer_table fix">
                                        <div class="waiter fix"><span style="font-weight: bold;">waiter: </span><span style="display:none;" id="last_10_waiter_id"></span><span id="last_10_waiter_name"></span></div>
                                        <div class="customer fix"><span style="font-weight: bold;">customer: </span><span style="display:none;" id="last_10_customer_id"></span><span id="last_10_customer_name"></span></div>
                                        <div class="table fix"><span style="font-weight: bold;">table: </span><span style="display:none;" id="last_10_table_id"></span><span id="last_10_table_name"></span></div>
                                    </div>
                                    <div class="item_modifier_details fix">
                                        <div class="modifier_item_header fix">
                                            <div class="first_column_header column_hold fix">item</div>
                                            <div class="second_column_header column_hold fix">price</div>
                                            <div class="third_column_header column_hold fix">qty</div>
                                            <div class="forth_column_header column_hold fix">discount</div>
                                            <div class="fifth_column_header column_hold fix">total</div>
                                        </div>
                                        <div class="modifier_item_details_holder fix">
                                        </div>
                                        <div class="bottom_total_calculation_hold fix">
                                            <div class="single_row first fix">
                                                <div class="first_column fix">total_item: <span id="total_items_in_cart_last_10">0</span></div>
                                                <div class="second_column fix">sub_total</div>
                                                <div class="third_column fix">$<span id="sub_total_show_last_10">0.00</span>
                                                    <span id="sub_total_last_10" style="display:none;">0.00</span>
                                                    <span id="total_item_discount_last_10" style="display:none;">0.00</span>
                                                    <span id="discounted_sub_total_amount_last_10" style="display:none;">0.00</span>
                                                </div>
                                            </div>
                                            <div class="single_row second fix">
                                                <div class="first_column fix">discount</div>
                                                <div class="second_column fix"><span id="sub_total_discount_last_10"></span><span id="sub_total_discount_amount_last_10" style="display:none;">0.00</span></div>
                                            </div>
                                            <div class="single_row third fix">
                                                <!-- <div class="first_column fix">VAT</div> -->
                                                <div class="second_column fix" colspan="5" style="width:100%;"><span id="all_items_vat_last_10" style="display: block;overflow: auto;height: 40px;"></span></div>
                                            </div>
                                            <div class="single_row forth fix">
                                                <div class="first_column fix">total_discount</div>
                                                <div class="second_column fix">$ <span id="all_items_discount_last_10">0.00</span></div>
                                            </div>
                                            <div class="single_row fifth fix">
                                                <div class="first_column fix">delivery_charge</div>
                                                <div class="second_column fix">$ <span id="delivery_charge_last_10">0.00</span></div>
                                            </div>
                                            <div class="single_row sixth fix">
                                                <div class="first_column fix">total_payable</div>
                                                <div class="second_column fix">$ <span id="total_payable_last_10">0.00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom">
                                <div class="button_holder">
                                    <div class="single_button_holder">
                                        <button id="last_ten_print_invoice_button">print_invoice</button>
                                    </div>
                                    <div class="single_button_holder">
                                        <button id="last_ten_delete_button" style="text-transform:capitalize">delete</button>
                                    </div>
                                    <div class="single_button_holder">
                                        <button id="last_ten_sales_close_button">cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end show_last_ten_sales_modal -->

        <!-- generate_sale_hold_modal modal -->
        <div id="generate_sale_hold_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_content_generate_hold_sales">
                <h1>hold</h1>
                <div class="generate_hold_sale_modal_info_holder fix">
                    <p style="margin: 0px 0px 5px 0px;">hold_number <span style="color:red;">*</span></p>
                    <input type="text" name="" id="hold_generate_input">
                </div>
                <div class="section7 fix">
                    <div class="sec7_inside" id="sec7_1"><button id="close_hold_modal">cancel</button></div>
                    <div class="sec7_inside" id="sec7_2"><button id="hold_cart_info">submit</button></div>
                </div>
            </div>

        </div>
        <!-- end generate_sale_hold_modal -->
        <!-- The order details modal -->
        <div id="order_detail_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_content_sale_details">
                <div class="order_detail_modal_info_holder fix">
                    <div class="top fix">
                        <h1 class="order_detail_title">
                            Order Details
                            <a href="javascript:void(0)" class="alertCloseIcon" id="order_details_close_button2">X</a>
                        </h1>
                        <div class="top_middle fix">
                            <div class="waiter_customer_table fix">
                                <div class="fix order_type">
                                    <span style="font-weight: bold;">Order Type: </span>
                                    <span id="order_details_type" style="display: inline-block;width:118px;"></span>
                                    <span id="order_details_type_id" style="display:none;"></span>
                                    <span style="font-weight: bold;">Order Number: </span>
                                    <span id="order_details_order_number" style="display: inline-block;"></span>
                                </div>
                            </div>
                            <div class="waiter_customer_table fix">
                                <div class="waiter fix"><span style="font-weight: bold;">Waiter : </span><span style="display:none;" id="order_details_waiter_id"></span><span id="order_details_waiter_name"></span></div>
                                <div class="customer fix"><span style="font-weight: bold;">Customer : </span><span style="display:none;" id="order_details_customer_id"></span><span id="order_details_customer_name"></span></div>
                                <div class="table fix"><span style="font-weight: bold;">Table : </span><span style="display:none;" id="order_details_table_id"></span><span id="order_details_table_name"></span></div>
                            </div>
                            <div class="item_modifier_details fix">
                                <div class="modifier_item_header fix">
                                    <div class="first_column_header column_hold fix">Item</div>
                                    <div class="second_column_header column_hold fix">Price</div>
                                    <div class="third_column_header column_hold fix">Qty</div>
                                    <div class="forth_column_header column_hold fix">Discount</div>
                                    <div class="fifth_column_header column_hold fix">Total</div>
                                </div>
                                <div class="modifier_item_details_holder fix">
                                </div>
                                <div class="bottom_total_calculation_hold fix">
                                    <div class="single_row first fix">
                                        <div class="first_column fix">Total Item: <span id="total_items_in_cart_order_details">0</span></div>
                                        <div class="second_column fix">Sub Total</div>
                                        <div class="third_column fix">$ <span id="sub_total_show_order_details">0.00</span>
                                            <span id="sub_total_order_details" style="display:none;">0.00</span>
                                            <span id="total_item_discount_order_details" style="display:none;">0.00</span>
                                            <span id="discounted_sub_total_amount_order_details" style="display:none;">0.00</span>
                                        </div>
                                    </div>
                                    <div class="single_row second fix">
                                        <div class="first_column fix">Discount</div>
                                        <div class="second_column fix"><span id="sub_total_discount_order_details"></span><span id="sub_total_discount_amount_order_details" style="display:none;">0.00</span></div>
                                    </div>
                                    <div class="single_row third fix">
                                        <!-- <div class="first_column fix">VAT</div> -->
                                        <div class="second_column fix" colspan="5" style="width:100%;"><span id="all_items_vat_order_details" style="display: block;overflow: auto;height: 40px;">0.00</span></div>
                                    </div>
                                    <div class="single_row forth fix">
                                        <div class="first_column fix">Total Discount</div>
                                        <div class="second_column fix">$ <span id="all_items_discount_order_details">0.00</span></div>
                                    </div>
                                    <div class="single_row fifth fix">
                                        <div class="first_column fix">Delivery Charge</div>
                                        <div class="second_column fix"><span id="delivery_charge_order_details">0.00</span></div>
                                    </div>
                                    <div class="single_row sixth fix">
                                        <div class="first_column fix">Total Payable</div>
                                        <div class="second_column fix">$<span id="total_payable_order_details">0.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ("Post Payment" == "Pre Payment") { ?>
                        <div class="create_invoice_close_order_in_order_details" id="order_details_pre_invoice_buttons">
                            <div class="half fix floatleft textcenter">
                                <button id="order_details_create_invoice_button"><i class="fas fa-file-invoice"></i> Create Invoice</button>
                            </div>
                            <div class="half fix floatleft textcenter">
                                <button id="order_details_close_order_button"><i class="fas fa-times-circle"></i> Close Order</button>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if ("Post Payment" == "Post Payment") { ?>
                        <div class="create_invoice_close_order_in_order_details" id="order_details_post_invoice_buttons">
                            <button id="order_details_create_invoice_close_order_button"><i class="fas fa-file-invoice"></i> Create Invoice Close</button>
                        </div>
                    <?php } ?>
                    <div class="create_invoice_close_order_in_order_details">
                        <button id="order_details_print_kot_button"><i class="fas fa-file-invoice"></i> Print Kot</button>
                    </div>
                    <button id="order_details_close_button">Close</button>
                </div>
            </div>
        </div>
        <!-- end add customer modal -->

        <!-- The kitchen status modal -->
        <div id="kitchen_status_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_kitchen_status_details">
                <h1 id="kitchen_status_main_header">
                    Kitchen Status
                    <a href="javascript:void(0)" style="top:-22px;right: 0;" class="alertCloseIcon" id="kitchen_status_close_button2">X</a>
                </h1>
                <div class="kitchen_status_modal_info_holder fix">
                    <p><span style="font-weight:bold">Order Number:</span> <span id="kitchen_status_order_number"></span> <span style="font-weight:bold">Order Type:</span> <span id="kitchen_status_order_type"></span></p>
                    <p style="text-align:left;">
                        <span style="font-weight:bold">Waiter: </span><span id="kitchen_status_waiter_name">Tamim Shahriar</span>
                        <span style="font-weight:bold">Customer: </span><span id="kitchen_status_customer_name">Faruq Hussain</span>
                        <span style="font-weight:bold">Order Table: </span><span id="kitchen_status_table">Table 01</span>
                    </p>
                    <div id="kitchen_status_detail_holder" class="fix">
                        <div id="kitchen_status_detail_header" class="fix">
                            <div class="fix first">Item</div>
                            <div class="fix second">Quantity</div>
                            <div class="fix third">Status</div>
                        </div>
                        <div id="kitchen_status_item_details" class="fix">
                            <div class="kitchen_status_single_item fix">
                                <div class="fix">Chicken Picata</div>
                                <div class="fix">2</div>
                                <div class="fix">Started Cooking 12:34 Min Ago</div>
                            </div>
                            <div class="kitchen_status_single_item fix">
                                <div class="fix">Beef Chili Onion</div>
                                <div class="fix">3</div>
                                <div class="fix">Done Cooking 16:34 Min Ago</div>
                            </div>
                            <div class="kitchen_status_single_item fix">
                                <div class="fix">Tanduri Chicken</div>
                                <div class="fix">5</div>
                                <div class="fix">In the queue</div>
                            </div>
                        </div>
                    </div>
                    <h1 id="kitchen_status_order_placed">Order Placed At: 14:22</h1>
                    <h1 id="kitchen_status_time_count">Time Count: <span id="kitchen_status_ordered_minute">23</span>:<span id="kitchen_status_ordered_second">55</span> M</h1>
                    <button id="kitchen_status_close_button">Close</button>
                </div>
            </div>
        </div>
        <!-- end kitchen status modal -->

        <!-- The table modal please read -->
        <div id="please_read_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_please_read_details">
                <p class="cross_button_to_close cCloseIcon" id="please_read_close_button_cross">X</p>
                <h1 id="please_read_modal_header" style="color: #dc3545;">please_read</h1>
                <div class="help_modal_info_holder fix">

                    <!-- <p class="para_type_1">How order process works</p> -->
                    <p class="para_type_1">please_read_text_1:</p>
                    <p class="para_type_2">please_read_text_2</p>
                    <p class="para_type_1">please_read_text_3:</p>
                    <p class="para_type_2">please_read_text_4</p>

                </div>
                <button id="please_read_close_button">close</button>
            </div>
        </div>
        <!-- end table modal please read modal -->

        <!-- The kitchen status modal -->
        <div id="help_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_help_details">
                <p class="cross_button_to_close cCloseIcon" id="help_close_button_cross">X</p>
                <h1 id="help_modal_header" style="color: #dc3545;">read_before_begin</h1>
                <div class="help_modal_info_holder fix">
                    <p class="para_type_1">read_help_text_1</p>
                    <p class="para_type_2">read_help_text_2</p>
                    <p class="para_type_1">read_help_text_3</p>
                    <p class="para_type_2">read_help_text_4</p>

                    <!-- <p class="para_type_1">How order process works</p>
                    <p class="para_type_2" style="font-weight: bold;">Who take Post-Payment:</p>
                    <p class="para_type_2">Post payment means your customer orders first, then kitchen, then eat then invoice and pay.</p>
                    <p class="para_type_2">For this process, you will place the order first, that will go to Running Orders as well as to Kitchen, then the order will be hung in Running Orders until food comes from kitchen and customer finishes eating, after finishing eating, you will click on Create Invoice & Close.</p>
                    <p class="para_type_2">System will print an invoice and remove the order from Running Order list as well as change status of that order to Closed.</p>
                    <p class="para_type_2" style="font-weight: bold;">Who take Pre-Payment:</p>
                    <p class="para_type_2">Place the order and click on Create Invoice, system will print an invoice but it will not wipe the order from Running Orders as well as it will also be sent to Kitchen. And when Kitchen finishes delivery, just click on Close Order.</p>  -->
                    <p class="para_type_1">read_help_text_5</p>
                    <p class="para_type_2">read_help_text_6</p>
                    <p class="para_type_1">read_help_text_7</p>
                    <p class="para_type_2">read_help_text_8</p>
                    <p class="para_type_2">read_help_text_9</p>
                    <p class="para_type_2">read_help_text_10</p>
                    <p class="para_type_1">read_help_text_11</p>
                    <p class="para_type_2">read_help_text_12</p>
                    <p class="para_type_2">read_help_text_13</p>
                    <p class="para_type_2">read_help_text_14</p>
                    <p class="para_type_2">read_help_text_15</p>
                    <p class="para_type_1">read_help_text_16</p>
                    <p class="para_type_2">read_help_text_17</p>
                    <p class="para_type_1">read_help_text_18</p>
                    <p class="para_type_2">read_help_text_19</p>
                    <p class="para_type_1">read_help_text_20</p>
                    <p class="para_type_2">read_help_text_21</p>
                    <p class="para_type_1">read_help_text_22</p>
                    <p class="para_type_2">read_help_text_23</p>
                    <p class="para_type_1">read_help_text_24</p>
                    <p class="para_type_2">read_help_text_25</p>
                    <button id="help_close_button">close</button>
                </div>
            </div>
        </div>
        <!-- end kitchen status modal -->

        <!-- The Modal -->
        <div id="finalize_order_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_finalize_order_details">
                <h1 id="modal_finalize_header">Finalize Order</h1>
                <div class="fo_1 fix">
                    <span style="display:none;" id="finalize_update_type"></span>
                    <div class="half fix floatleft">Total Payable</div>
                    <div class="half fix floatleft textright">$ <span id="finalize_total_payable">0.00</span></div>
                </div>
                <div class="fo_2 fix">
                    <div class="half fix floatleft">Payment Method</div>
                    <div class="half fix floatleft textright">
                        <select name="finalie_order_payment_method" id="finalie_order_payment_method">
                            <option value="">Payment Method</option>
                            {{-- //need to change here for payment method --}}
                            @foreach($allmethod as $all_pay)
                            <option value="{{$all_pay->id}}">{{$all_pay->Methord}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-dark" onclick="myFunction2()" type="button">Add Payment</button>
                </div>
                <div class="fo_3 fix hide" id="gift_card">
                    <div class="half fix floatleft textleft">Gift Card</div>
                    <div class="half fix floatleft textright"><input type="text" name="payment_gift_card_no_modal_input" id="payment_gift_card_no_modal_input"></div>
                    <div class="" id="gift_card_checking_response">

                    </div>
                </div>
                <div class="fo_3 fix">
                    <div class="half fix floatleft textleft">Pay Amount</div>
                    <div class="half fix floatleft textright">Due Amount</div>
                    <div class="half fix floatleft textleft"><input type="text" name="pay_amount_invoice_modal_input" id="pay_amount_invoice_input"></div>
                    <div class="half fix floatleft textright"><input type="text" name="due_amount_invoice_modal_input" id="due_amount_invoice_input" disabled></div>
                </div>
                <div class="fo_3 fix">
                    <div class="half fix floatleft textleft">Tips</div>
                    <div class="half fix floatleft textright"><input type="text" name="tips_modal_input" id="tips_amount_input" value=""></div>
                </div>
                <div class="fo_3 fix">
                    <div class="half fix floatleft textleft">Given Amount</div>
                    <div class="half fix floatleft textright">Change Amount</div>
                    <div class="half fix floatleft textleft"><input type="text" name="given_amount_modal_input" id="given_amount_input"></div>
                    <div class="half fix floatleft textright"><input type="text" name="change_amount_modal_input" id="change_amount_input" disabled></div>
                </div>
                <div class="bottom_buttons fix">
                    <div style="display: inline-block" class="bottom_single_button fix">
                        <button id="finalize_order_button">Submit</button>
                    </div>
                    <div style="display: inline-block" class="bottom_single_button fix">
                        <button id="finalize_order_cancel_button">Cancel</button>
                    </div>
                </div>
                <!-- <span class="close">&times;</span> -->
                <!-- <p>Some text in the Modal..</p> -->
            </div>

        </div>
        <!-- end of item modal -->

        <!-- The Notification List Modal -->
        <div id="notification_list_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_notification_list_details">
                <h1 id="modal_notification_header">
                    Notification List
                    <a href="javascript:void(0)" class="cCloseIcon" id="notification_close2">X</a>
                </h1>
                <div id="notification_list_header_holder">
                    <div class="single_row_notification_header fix" style="height: 25px;border-bottom: 1px solid #ced4da;">
                        <div class="fix single_notification_check_box">
                            <input type="checkbox" id="select_all_notification">
                        </div>
                        <div class="fix single_notification"><strong>Select All</strong></div>
                        <div class="fix single_serve_button">
                        </div>
                    </div>
                </div>


                <div id="notification_list_holder" class="fix">
                    {!! $notification_list_show !!}
                </div>
                <!-- <span class="close">&times;</span> -->
                <!-- <p>Some text in the Modal..</p> -->
                <div id="notification_close_delete_button_holder">
                    <button id="notification_remove_all">Remove</button>
                    <button id="notification_close">Cancel</button>
                </div>
            </div>

        </div>
        <!-- end of notification list modal -->


        <!-- The Notification List Modal -->
        <div id="kitchen_bar_waiter_panel_button_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_kitchen_bar_waiter_details" style="position: relative;">
                <p class="cross_button_to_close cCloseIcon" id="kitchen_bar_waiter_modal_close_button_cross">X</p>
                <h1 id="switch_panel_modal_header">kitchen_waiter_bar</h1>
                <div style="padding:30px;">

                    <a href="<?php echo $baseURL; ?>Demo_panel/switchTo/kitchen" target="_blank" style="width: 32%;display: inline-block;text-align: center;">
                        <button style="width:100%;">kitchen_panel</button>
                    </a>
                    <a href="<?php echo $baseURL; ?>Demo_panel/switchTo/waiter" target="_blank" style="width: 32%;display: inline-block;text-align: center;">
                        <button style="width:100%;">waiter_panel</button>
                    </a>
                    <a href="<?php echo $baseURL; ?>Demo_panel/switchTo/bar" target="_blank" style="width: 32%;display: inline-block;text-align: center;">
                        <button style="width:100%;">bar_panel</button>
                    </a>
                </div>

            </div>

        </div>
        <!-- end of notification list modal -->

        <!-- The KOT Modal -->
        <div id="kot_list_modal" class="modal">

            <!-- Modal content -->
            <div class="modal-content" id="modal_kot_list_details">
                <h1 id="modal_kot_header">
                    Kot
                    <a href="javascript:void(0)" style="top: 5px;right:10px;" class="alertCloseIcon" id="cancel_kot_modal2">X</a>
                </h1>
                <h2 id="kot_modal_modified_or_not">Modified</h2>
                <div id="kot_header_info" class="fix">
                    <p>Order No: <span id="kot_modal_order_number"></span></p>
                    <p>Date: <span id="kot_modal_order_date"></span></p>
                    <p>Customer: <span id="kot_modal_customer_id" style="display:none;"></span><span id="kot_modal_customer_name"></span></p>
                    <p>Table: <span id="kot_modal_table_name"></span></p>
                    <p>Waiter: <span id="kot_modal_waiter_name"></span>, Order Type: <span id="kot_modal_order_type"></span></p>
                </div>
                <div id="kot_table_content" class="fix">
                    <div class="kot_modal_table_content_header fix">
                        <div class="kot_header_row fix floatleft kot_check_column"><input type="checkbox" id="kot_check_all"></div>
                        <div style="width: 405px" class="kot_header_row fix floatleft kot_item_name_column">Item</div>
                        <div class="kot_header_row fix floatleft kot_qty_column">Qty</div>
                    </div>
                    <div id="kot_list_holder" class="fix">

                    </div>

                </div>
                <div id="kot_bottom_buttons" class="fix">
                    <button id="cancel_kot_modal">Cancel</button><button id="print_kot_modal">Print Kot</button>
                </div>

            </div>

        </div>

        <div id="bot_list_modal" class="modal">

            <!-- Modal Content -->
            <div class="modal-content" id="modal_bot_list_details">
                <h1 id="modal_bot_header">
                    <?php echo "BOT"; ?>
                    <a href="javascript:void(0)" style="top: 5px;right:10px;" class="alertCloseIcon" id="cancel_bot_modal2">X</a>
                </h1>
                <h2 id="bot_modal_modified_or_not">modified</h2>
                <div id="bot_header_info" class="fix">
                    <p>order_no: <span id="bot_modal_order_number"></span></p>
                    <p>date: <span id="bot_modal_order_date"></span></p>
                    <p>customer: <span id="bot_modal_customer_id" style="display:none;"></span><span id="bot_modal_customer_name"></span></p>
                    <p>table: <span id="bot_modal_table_name"></span></p>
                    <p>waiter: <span id="bot_modal_waiter_name"></span>, order_type: <span id="bot_modal_order_type"></span></p>
                </div>
                <div id="bot_table_content" class="fix">
                    <div class="bot_modal_table_content_header fix">
                        <div class="bot_header_row fix floatleft bot_check_column"><input type="checkbox" id="bot_check_all"></div>
                        <div style="width: 405px" class="bot_header_row fix floatleft bot_item_name_column">item</div>
                        <div class="bot_header_row fix floatleft bot_qty_column">qty</div>
                    </div>
                    <div id="bot_list_holder" class="fix">

                    </div>

                </div>
                <div id="bot_bottom_buttons" class="fix">
                    <button id="cancel_bot_modal">cancel</button><button id="print_bot_modal"><?php echo "Print BOT"; ?></button>
                </div>

            </div>

        </div>
        <!-- end of KOT modal -->

        <!--Processing Date And Time modal -->
        <!-- The Modal -->
        <div id="processing_date_time_modal" class="modal" style="padding-top:20px;">

            <!-- Modal content -->
            <div class="modal-content" id="">
                <h1>Processing Date And Time</h1>

                <div class="customer_add_modal_info_holder">
                    <div class="content">

                        <div class="left-item b">
                            <div class="customer_section fix">
                                <p class="input_level">Date <span style="color:red;">*</span></p>
                                <input type="datetime-local" class="add_customer_modal_input" id="processing_date_time_modal_input" required>
                            </div>

                        </div>

                        {{-- <div class="right-item b">
                            <div class="customer_section fix">
                                <p class="input_level">time <span style="color:red;">*</span></p>
                                <input type="time" class="add_customer_modal_input" id="processing_time" required>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="section7 fix">
                    <div class="sec7_inside" id="sec7_2"><button id="set_processing_date_time">submit</button></div>
                    <div class="sec7_inside" id="sec7_1"><button id="close_set_processing_date_time">cancel</button></div>
                </div>
                <!-- <span class="close">&times;</span> -->
                <!-- <p>Some text in the Modal..</p> -->
            </div>

        </div>
        <!-- end Processing Date And Time modal -->

        <!--delivery method modal -->
        <!-- The Modal -->
        <div id="delivery_method_modal" class="modal" style="padding-top:20px;">

            <!-- Modal content -->
            <div class="modal-content" id="">
                <h1>Delivery Method</h1>

                <div class="customer_add_modal_info_holder">
                    <div class="content">

                        <div class="left-item b">
                            <div class="customer_section fix">
                                {{-- <p class="input_level">Date <span style="color:red;">*</span></p> --}}
                                {{-- <input type="text" class="add_customer_modal_input" id="delivery_method_modal_input" required> --}}
                                <div class="form-group">
                                    <label><input type="radio" name="delivery_method" value="0">Direct</label><br>

                                    @foreach ($thirdPartyVendors as $thirdPartyVendor)
                                    <label><input type="radio" name="delivery_method" value="{{$thirdPartyVendor->thirdPartyVendorInfo->id}}">{{$thirdPartyVendor->thirdPartyVendorInfo->name}}</label><br>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="section7 fix">
                    <div class="sec7_inside" id="sec7_2"><button id="set_delivery_method">submit</button></div>
                    <div class="sec7_inside" id="sec7_1"><button id="close_delivery_method">cancel</button></div>
                </div>
                <!-- <span class="close">&times;</span> -->
                <!-- <p>Some text in the Modal..</p> -->
            </div>

        </div>
        <!-- end delivery method modal -->




        <div id="calculator_main">
            <div class="calculator">
                <input type="text" readonly>
                <div class="row">
                    <div class="key">1</div>
                    <div class="key">2</div>
                    <div class="key">3</div>
                    <div class="key last">0</div>
                </div>
                <div class="row">
                    <div class="key">4</div>
                    <div class="key">5</div>
                    <div class="key">6</div>
                    <div class="key last action instant">cl</div>
                </div>
                <div class="row">
                    <div class="key">7</div>
                    <div class="key">8</div>
                    <div class="key">9</div>
                    <div class="key last action instant">=</div>
                </div>
                <div class="row">
                    <div class="key action">+</div>
                    <div class="key action">-</div>
                    <div class="key action">x</div>
                    <div class="key last action">/</div>
                </div>
            </div>
        </div>
        <div id="modify_button_tool_tip">
            <h1 class="title" style="margin:0px;font-size: 20px;line-height: 25px;">Choose This For:</h1>
            <p style="margin:0px;margin: 0px;font-size: 14px;line-height: 16px;">1. Add New Item</p>
            <p style="margin:0px;margin: 0px;font-size: 14px;line-height: 16px;">2. Change Table</p>
            <p style="margin:0px;margin: 0px;font-size: 14px;line-height: 16px;">3. Change anything in an Order</p>
        </div>
        <div id="direct_invoice_button_tool_tip" style="display:none;position: absolute;margin-bottom: 15px;background: #fff;border-radius: 5px;box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);padding:5px;">
            <h1 class="title" style="margin:0px;font-size: 14px;line-height: 25px;">For Fast Food Restaurants</h1>
        </div>

        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/marquee.js"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/items.js"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/datable.js"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/howler.min.js"></script>

        <script src="{!! $baseURL.'assets/plugins/input-mask/jquery.inputmask.js'!!}"></script>


        <script src="{!! $baseURL.'assets/plugins/jcanvas/dist/jcanvas.js'!!}"></script>
        <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
        <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/signUp.js'!!}"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/custom.js"></script>
        <script type="text/javascript" src="<?php echo $baseURL; ?>assets/POS/js/paymentMethod.js"></script>


        <script type="text/javascript">

            function _find_reservation()
            {
                var id = $('#selected_table').val();

               // alert(id);
                $.ajax({
                    type: "GET",
                    url: "show_ajax/" + id,
                    dataType: 'JSON',
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText
                        //alert(errorMessage);
                    },
                    success: function(data) {

                        //alert(data[0].name);
                        //document.getElementById("non_food_img").src = "assets/images/food/" + data.single_data[0]['non_food_image'];
                        // $.each(data, function(i, item) {
                        //     alert(item.name);
                        // });
                        var show = '<button class="category_button" style="border-left: solid 2px #DEDEDE;">All</button>';
                        for (var i = 0; i < data.length; i++) {
                            //alert(data[i].name);
                            show += '<button class="category_button" onclick="__show_foods(\''+data[i].name+'\')" id="button_category_' + data[i].id + '"  style="border-left: solid 2px #DEDEDE;">' + data[i].name + '</button>';
                        }
                        document.getElementById("catagory_button").innerHTML = show;
                    }
                });

            }
            function show_catagory(id) {
                $.ajax({
                    type: "GET",
                    url: "show_catagory_ajax/" + id,
                    dataType: 'JSON',
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText
                        //alert(errorMessage);
                    },
                    success: function(data) {

                        //alert(data[0].name);
                        //document.getElementById("non_food_img").src = "assets/images/food/" + data.single_data[0]['non_food_image'];
                        // $.each(data, function(i, item) {
                        //     alert(item.name);
                        // });
                        var show = '<button class="category_button" style="border-left: solid 2px #DEDEDE;">All</button>';
                        for (var i = 0; i < data.length; i++) {
                            //alert(data[i].name);
                            show += '<button class="category_button" onclick="__show_foods(\''+data[i].name+'\')" id="button_category_' + data[i].id + '"  style="border-left: solid 2px #DEDEDE;">' + data[i].name + '</button>';
                        }
                        document.getElementById("catagory_button").innerHTML = show;
                    }
                });
            }



            $('#customer_phone_modal').inputmask("+19999999999");

            $('.select2').select2();
            window.customers = [<?php //echo $customer_objects;
                                ?>];

            window.items = [<?php echo $javascript_obects;
                            ?>];

            var jsonData = window.items;

            //alert(jsonData[0].category_name);
            console.log(window.items);


            function __show_foods(id)
            {
                $("#search").val(id);
                //$("#search").onkeypress();
                _serarch_auto(id);
                //alert(id);
            }

            function searchItemAndConstructGallery(searchedValue) {

                var resultObject = search(searchedValue, window.items);
                return resultObject;
            }

            function searchCustomerAddress(searchValue) {

                var resultObject = searchAddress(searchValue, window.customers);
                return resultObject;
            }
            $.datable();

            // $('#register_close').on('click', function() {

            // });

            function __reg_close()
            {
                var r = confirm("Are you sure to close register?");

                if (r == true) {
                    $.ajax({
                        url: '#',
                        method: "POST",
                        data: {
                            token: '',
                        },
                        success: function(response) {
                            swal({
                                title: 'alert',
                                text: 'register_close!!',
                                confirmButtonText: 'ok',
                                confirmButtonColor: '#b6d6f6'
                            });
                            $('#close_register_button').hide();
                            window.location.href = 'restarunt/logout';

                        },
                        error: function() {
                          //  alert("error");
                        }
                    });
                }
            }

            $('#go_to_dashboard').on('click', function() {

                <?php


                if (Auth::guard('restaurantUser')->user()->role == 'Manager') {
                ?>
                    // window.location.href = '/restaurant/home';
                    window.location.href = '/ask_me_pos/restaurant/home';
                <?php
                } else {
                ?>
                    // window.location.href = '/restaurant/login';
                    window.location.href = '/ask_me_pos/restaurant/login';
                <?php
                }
                ?>
            });

            $('#dine_in_button').on('click', function() {

                if ($(this).attr('id') == 'dine_in_button') {

                    var sub_total = parseFloat($('#sub_total_show').html()).toFixed(2);

                    var val_delivery_charge = sub_total / 100 * 10;

                    $('#delivery_charge').val(val_delivery_charge);
                }
            });

            function deleteRow(btn) {
                var rowCount = myTable.rows.length;
                //alert(rowCount);
                if (rowCount <= 8) {
                    window.alert("There is only row, that you can not delete.");
                } else {
                    var row = btn.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }

            }
            function myFunction2() {
                var table = document.getElementById("myTable");
                var rowCount = myTable.rows.length;
                var row = table.insertRow(rowCount - 6);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var cell6 = row.insertCell(5);
                var cell7 = row.insertCell(6);
                cell1.innerHTML = "<div class=\"fo_2 fix\">";
                cell2.innerHTML = "<div class=\"half fix floatleft\">Payment Method</div>";
                cell3.innerHTML = "<div class=\"half fix floatleft textright\">";
                cell4.innerHTML = "<select name=\"finalie_order_payment_method\" id=\"finalie_order_payment_method\">";
                cell5.innerHTML = "<option value="">Payment Method</option>";
                cell6.innerHTML = "<input type=\"text\" class=\"form-control\" readonly >";
                cell7.innerHTML = "<button onclick=\"deleteRow(this)\" type=\"button\" class=\"btn btn-danger\">Delete</button>";
                i++;
            }


        </script>
    </body>

    </html>
