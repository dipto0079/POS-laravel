<?php

namespace App\Http\Controllers;

use App\CustomerAddress;
use App\CustomerOnlineOrder;
use App\CustomerOnlineOrderDeliveryAddress;
use App\KitchenNotification;
use App\RestaurantFoodMenuIngredient;
use App\RestaurantFoodMenuModifierIngredient;
use App\RestaurantOrdersTable;
use App\RestaurantSale;
use App\RestaurantSalesConsumption;
use App\RestaurantSalesConsumptionsOfMenu;
use App\RestaurantSalesConsumptionsOfModifiersOfMenu;
use App\RestaurantSalesDetails;
use App\RestaurantSalesDetailsModifier;
use App\RestaurantSalesHold;
use App\RestaurantSalesHoldsDetails;
use App\RestaurantSalesHoldsDetailsModifier;
use App\RestaurantUser;
use App\Restaurant;
use App\RestaurantCustomer;
use App\RestaurantFoodMenu;
use App\RestaurantFoodMenuShift;
use App\RestaurantGiftCard;
use App\RestaurantSalesPaymentByGiftCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DataTables;


class RestaurantSaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }
    public function restraturent_id()
    {
        return  Auth::guard('restaurantUser')->user()->restaurant_id;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // return url()->current();
        // $sales = RestaurantSale::with('customer:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        // return $sales;
        // $sales = '';
        // if ($request->filter_by_date || $request->filter_by_payment) {

        //     $filter_by_date = $request->filter_by_date;
        //     $filter_by_payment = $request->filter_by_payment;


        //     if ($filter_by_date) {
        //         $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('sale_date', $filter_by_date)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        //     }else if($filter_by_payment){
        //         $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('sale_date', $filter_by_payment)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        //     }
        // } else {

        //     $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        // }
        if ($request->ajax()) {

            if ($request->filter_sales != '' && $request->filter_by_date != '') {
                $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('order_status', 3)
                    ->where('sale_date', $request->filter_by_date)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->get();

            }
            elseif ($request->filter_sales != '' && $request->filter_by_payment != '') {
                $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('order_status', 3)
                    ->where('payment_method_id', $request->filter_by_payment)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->get();

            }
            elseif ($request->filter_sales != '' && $request->filter_by_order_type != '') {
                $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('order_status', 3)
                    ->where('order_type', $request->filter_by_order_type)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->get();

            }
            elseif ($request->filter_sales != '' && $request->filter_by_total_paid != '') {

                $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('order_status', 3)
                    ->whereColumn('paid_amount','total_payable')
                    ->where('due_total', '==', 0)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->get();

            }
            else {

                $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('order_status', 3)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->get();
            }


            return Datatables::of($sales)
                ->addIndexColumn()
                ->editColumn('order_type', function ($sale) {
                    if ($sale->order_type == 1) {

                        return 'Dine In';

                    }elseif ($sale->order_type == 2) {

                        return 'Take Away';

                    }elseif ($sale->order_type == 3) {

                        return 'Delivery';

                    }

                })
                ->editColumn('customer', function ($sale) {

                    return $sale->customer->name;

                })
                ->editColumn('payment_method', function ($sale) {

                    if ($sale->payment_method_id == 1) {

                        return 'Card';

                    }elseif ($sale->payment_method_id == 2) {

                        return 'Paypal';

                    }if ($sale->payment_method_id == 3) {

                        return 'Gift Card';

                    }else {

                        return 'Others';

                    }

                })
                ->editColumn('added_by', function ($sale) {

                    return $sale->creatorInfo->manager_name;

                })
                ->addColumn('action', function($sale){

                    $btn = '<div class="btn-group">
                                        <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-offset="-185,-75">
                                            <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                class="caret"></span>
                                        </button>
                                        <div
                                            class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <a class="dropdown-item edit-link show-sale" role="button" data-print_type="1"
                                            data-id="'.$sale->id.'">View Details</a> |
                                            <a class="dropdown-item edit-link" role="button"
                                            href="'.url()->current().'/'.$sale->id.'/edit">Edit</a> |
                                            <a class="dropdown-item edit-link delete-sale"
                                            role="button" data-id="'.$sale->id.'">Delete</a>
                                        </div>
                                    </div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);


        }

        return view('pages.restaurant.sale.sales.index');

    }

    /**
     * filter sales by date and Payment method
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $filter_by_date = $request->filter_by_date;
        $filter_by_payment = $request->filter_by_payment;
        $sales = '';

        if ($filter_by_date) {
            $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('sale_date', $filter_by_date)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        }else if($filter_by_payment){
            $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('sale_date', $filter_by_payment)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        }

        return view('pages.restaurant.sale.sales.index', compact('sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filter_by_date = $request->filter_by_date;
        $filter_by_payment = $request->filter_by_payment;
        $sales = '';

        if ($filter_by_date) {
            $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('sale_date', $filter_by_date)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        }else if($filter_by_payment){
            $sales = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('sale_date', $filter_by_payment)->where('order_status', 3)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        }

        return view('pages.restaurant.sale.sales.index', compact('sales'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestaurantSale  $restaurantSale
     * @return \Illuminate\Http\Response
     */
    public function show(RestaurantSale $restaurantSale)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RestaurantSale  $restaurantSale
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantSale $restaurantSale)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestaurantSale  $restaurantSale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantSale $restaurantSale)
    {
        return 'update';
    }
    public function test()
    {

        $onlineOrder = CustomerOnlineOrder::with('items', 'customer:id,name,phone,email')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('id', 31)
            ->where('del_status', 'Live')
            ->first();
        foreach ($onlineOrder->items as $key => $itemsModifier) {
            $itemsModifier->modifiers;
            foreach ($itemsModifier->modifiers as $key => $modifier) {
                $itemsModifier->modifiers[$key]->name = $modifier->modifierName->name;
            }
        }

        //return response()->json($onlineOrder->deliveryAddress->customer_address_id);

        $customer_address = CustomerAddress::where('id', $onlineOrder->deliveryAddress->customer_address_id)->first();

        //return response()->json($customer_address);

        //return json_encode($customer_address);
        // $json_order = Json_decode($request->order);
        // $order = Json_decode($json_order);

        // return [$order];

        //$sale_id = $request->sale_id;
        //$close_order = $request->close_order;
        $panel_id_array = [];

        //for sales table
        $sales = new RestaurantSale;

        $sales->modified == 'No';
        //need to work here
        $Restaurant_customer = RestaurantCustomer::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->where('phone', $onlineOrder->customer->phone)
            ->where('phone', $onlineOrder->customer->email)
            ->first();
        if ($Restaurant_customer) {
            $sales->customer_id = $Restaurant_customer->id;
        } else {
            # code...
            $customer_address ='';
            if ($onlineOrder->deliveryAddress->customer_address_id) {

                $customer_address = CustomerAddress::where('id', $onlineOrder->deliveryAddress->customer_address_id)->first();
            }

            $new_customer = new RestaurantCustomer();
            $new_customer->name = $onlineOrder->customer->name;
            $new_customer->phone = $onlineOrder->customer->phone;
            $new_customer->email = $onlineOrder->customer->email;
            $new_customer->address = $customer_address->address;
            $new_customer->apt = $customer_address->apt;
            $new_customer->country_id = $customer_address->country_id;
            $new_customer->state_id = $customer_address->state_id;
            $new_customer->city_id = $customer_address->city_id;
            $new_customer->note = $customer_address->note;
            $new_customer->zip = $customer_address->zip;
            $new_customer->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $new_customer->user_id = Auth::guard('restaurantUser')->id();
            $new_customer->save();

            $sales->customer_id = $new_customer->id;
        }

        $sales->total_items = $onlineOrder->total_items;
        $sales->sub_total = $onlineOrder->sub_total;
        $sales->vat= (trim($onlineOrder->vat)== NULL || trim($onlineOrder->vat)=="" )?NULL:trim($onlineOrder->vat);
        $sales->total_payable = trim($onlineOrder->total_payable);
        //$sales->total_item_discount_amount = trim($onlineOrder->total_item_discount_amount);
        $sales->total_item_discount_amount = ($onlineOrder->total_item_discount_amount== NULL || $onlineOrder->total_item_discount_amount=="" )?0:$onlineOrder->total_item_discount_amount;
        //$sales->sub_total_with_discount = trim($onlineOrder->sub_total_with_discount);
        $sales->sub_total_with_discount = ($onlineOrder->sub_total_with_discount== NULL || $onlineOrder->sub_total_with_discount=="" ) ? $onlineOrder->sub_total : $onlineOrder->sub_total_with_discount;

        //$sales->sub_total_discount_amount = trim($onlineOrder->sub_total_discount_amount);
        $sales->sub_total_discount_amount = ($onlineOrder->sub_total_discount_amount== NULL || $onlineOrder->sub_total_discount_amount=="" ) ? 0 : $onlineOrder->sub_total_discount_amount;

        //$sales->total_discount_amount = trim($onlineOrder->total_discount_amount);
        $sales->total_discount_amount = ($onlineOrder->total_discount_amount== NULL || $onlineOrder->total_discount_amount=="" ) ? 0 : $onlineOrder->total_discount_amount;

        //$sales->delivery_charge = trim($onlineOrder->delivery_charge);
        $sales->delivery_charge = ($onlineOrder->delivery_charge== NULL || $onlineOrder->delivery_charge=="" ) ? 0 : $onlineOrder->delivery_charge;
        //$sales->sub_total_discount_value = trim($onlineOrder->sub_total_discount_value);
        $sales->sub_total_discount_value = ($onlineOrder->sub_total_discount_value== NULL || $onlineOrder->sub_total_discount_value=="" ) ? 0 : $onlineOrder->sub_total_discount_value;

        //$sales->sub_total_discount_type = trim($onlineOrder->sub_total_discount_type);plain
        $sales->sub_total_discount_type = ($onlineOrder->sub_total_discount_type== NULL || $onlineOrder->sub_total_discount_type=="" ) ? 'plain' : $onlineOrder->sub_total_discount_type;
        $sales->user_id = Auth::guard('restaurantUser')->id();

        //for set default as waiter
        $waiter = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('role', 'waiter')
            ->where('manager_name', 'Default Waiter')
            ->where('del_status', 'Live')
            ->select('id', 'manager_name')
            ->first();

        $sales->waiter_id = trim($waiter->id);

        $sales->sale_date = date('Y-m-d');
        $sales->order_time = date("H:i:s");
        //used delivery time as processing time
        $sales->processing_date_time = trim(Carbon::parse($onlineOrder->delivery_date)->toDateString().' '.$onlineOrder->delivery_time);
        //set sale order status as new order [1= new order]
        $sales->order_status = trim($onlineOrder->order_status);
        //$sales->sale_vat_objects = json_encode($onlineOrder->sale_vat_objects);
        $sales->sale_vat_objects = ($onlineOrder->sale_vat_objects== NULL || $onlineOrder->sale_vat_objects=="" ) ? NULL : $onlineOrder->sale_vat_objects;
        $sales->order_type = trim($onlineOrder->order_type);
        //set order from online order[2]
        $sales->order_from = 2;

        //need to work here which one is select for online order delivery method
        //check delivery type order
        // if ($onlineOrder->order_type == 3) {
        //     $sales->delivery_method_id = trim($onlineOrder->delivery_method_id);
        // }

        $sales->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $sales->save();
        $sales->sale_no = str_pad($sales->id, 6, '0', STR_PAD_LEFT);

        //no need this if that is not used once bellow
        $sales->save();

        //for sale consumptions table
        $sale_consumption = new RestaurantSalesConsumption;
        $sale_consumption->sales_id = $sales->id;
        $sale_consumption->order_status = $sales->order_status;
        $sale_consumption->user_id = Auth::guard('restaurantUser')->id();
        $sale_consumption->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $sale_consumption->save();

        if($sales->id >0 && count($onlineOrder->items)>0){

            //for sales details table
            foreach($onlineOrder->items as $item){

                // $tmp_var_111 = isset($item->p_qty) && $item->p_qty && $item->p_qty!='undefined'?$item->p_qty:0;
                // $tmp = $item->item_quantity-$tmp_var_111;
                // $tmp_var = 0;
                // if($tmp>0){
                //     $tmp_var = $tmp;
                // }

                $item_data = new RestaurantSalesDetails;
                $item_data->food_menu_id = $item->food_menu_id;
                $item_data->menu_name = $item->menu_name;
                $item_data->qty = $item->qty;
                //have to check this
                $item_data->tmp_qty = $item->qty;
                $item_data->menu_price_without_discount = $item->menu_price_without_discount;
                $item_data->menu_price_with_discount = $item->menu_price_with_discount;
                $item_data->menu_unit_price = $item->menu_unit_price;

                //need to work here menu_vat_percentage/menu_taxes
                //$item_data->menu_taxes = json_encode($item->menu_vat_percentage);
                $item_data->menu_taxes = $item->menu_vat_percentage;
                $item_data->menu_discount_value = $item->menu_discount_value;
                //$item_data->discount_type = $item->discount_type;
                $item_data->discount_type = ($item->discount_type== NULL || $item->discount_type=="" ) ? 'plain' : $item->discount_type;
                //$item_data->menu_note = $item->menu_note;
                $item_data->menu_note = ($item->menu_note== NULL || $item->menu_note=="" ) ? '' : $item->menu_note;

                //$item_data->discount_amount = $item->discount_amount;
                $item_data->discount_amount = ($item->discount_amount== NULL || $item->discount_amount=="" ) ? 0 : $item->discount_amount;
                //have to work with it
                // $item_data->item_type = ($this->Sale_model->getItemType($item->item_id)->item_type=="Bar No")?"Kitchen Item":"Bar Item";

                $item_data->cooking_status = ($item->cooking_status=="")?NULL:$item->cooking_status;
                $item_data->cooking_start_time = '1900-01-01 00:00:00';
                $item_data->cooking_done_time = '1900-01-01 00:00:00';
                $item_data->previous_id = 0;
                $item_data->sales_id = $sales->id;
                $item_data->order_status = $sales->order_status;

                $item_data->user_id = Auth::guard('restaurantUser')->id();
                $item_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

                $item_data->save();



                $item_data->previous_id = $item_data->id;
                $item_data->save();


                //for table sale consumption of menus
                $food_menu_ingredients = RestaurantFoodMenuIngredient::where('food_menu_id', $item->id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

                foreach($food_menu_ingredients as $single_ingredient){

                    $data_sale_consumptions_detail = new RestaurantSalesConsumptionsOfMenu;
                    $data_sale_consumptions_detail->ingredient_id = $single_ingredient->ing_id;
                    $data_sale_consumptions_detail->consumption = $item->qty*$single_ingredient->consumption;
                    $data_sale_consumptions_detail->sale_consumption_id = $sale_consumption->id;
                    $data_sale_consumptions_detail->sales_id = $sales->id;
                    $data_sale_consumptions_detail->order_status = $sales->order_status;
                    $data_sale_consumptions_detail->food_menu_id = $item->food_menu_id;
                    $data_sale_consumptions_detail->user_id = Auth::guard('restaurantUser')->id();
                    $data_sale_consumptions_detail->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

                    $data_sale_consumptions_detail->save();

                }

                //used $item->modifiers instant of this two
                // $modifier_id_array = ($item->modifiers_id!="")?explode(",",$item->modifiers_id):null;
                // $modifier_price_array = ($item->modifiers_price!="")?explode(",",$item->modifiers_price):null;

                if(!empty($item->modifiers)>0){
                    $i = 0;

                    //for sales details modifires

                    foreach($item->modifiers as $single_modifier){

                        $modifier_data = new RestaurantSalesDetailsModifier;
                        $modifier_data->modifier_id = $single_modifier->modifier_id;
                        $modifier_data->modifier_price = $single_modifier->modifier_price;
                        $modifier_data->food_menu_id = $item->food_menu_id;
                        $modifier_data->sales_id = $sales->id;
                        $modifier_data->order_status = $sales->order_status;
                        $modifier_data->sales_details_id = $item_data->id;
                        $modifier_data->user_id = Auth::guard('restaurantUser')->id();
                        $modifier_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                        $modifier_data->customer_id = $sales->customer_id;

                        $modifier_data->save();


                        //item's modifier ingredients
                        $modifier_ingredients = RestaurantFoodMenuModifierIngredient::where('mod_id', $single_modifier->modifier_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

                        //for sale cons of mod of menus

                        foreach($modifier_ingredients as $single_ingredient){

                            $data_sale_consumptions_detail = new RestaurantSalesConsumptionsOfModifiersOfMenu;
                            $data_sale_consumptions_detail->ingredient_id = $single_ingredient->ig_id;
                            $data_sale_consumptions_detail->consumption = $item->qty*$single_ingredient->consumption;
                            $data_sale_consumptions_detail->sale_consumption_id = $sale_consumption->id;
                            $data_sale_consumptions_detail->sales_id = $sales->id;
                            $data_sale_consumptions_detail->order_status = $sales->order_status;
                            $data_sale_consumptions_detail->food_menu_id = $item->food_menu_id;
                            $data_sale_consumptions_detail->user_id = Auth::guard('restaurantUser')->id();
                            $data_sale_consumptions_detail->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                            $data_sale_consumptions_detail->save();
                        }

                        $i++;
                    }
                }

                //for kitchen panel notification
                if ($sales->modified == 'Yes') {
                    $panel_id = RestaurantFoodMenu::select('panel_id')->where('id', $item_data->food_menu_id)->first();
                    if ($panel_id_array != '') {
                        $check = false;
                        foreach ($panel_id_array as $value) {
                            if ($value == $panel_id->panel_id) {
                                $check = true;
                            }
                        }
                        if ($check == false) {
                            array_push($panel_id_array, $panel_id->panel_id);
                        }

                    }else{
                        array_push($panel_id_array, $panel_id->panel_id);
                    }
                }

            }
        }

        //may be it's not need heare
        if ($sales->modified == 'Yes') {
            //this section sends notification to bar/kitchen panel if there is any modification
            $order_number = '';
            if($sales->order_type==1){
                $order_number = 'D '.$sales->sale_no;
            }else if($sales->order_type==2){
                $order_number = 'T '.$sales->sale_no;
            }else if($sales->order_type==3){
                $order_number = 'DL '.$sales->sale_no;
            }

            $notification_message = 'Order:'.$order_number.' has been modified';
            foreach ($panel_id_array as $panel_id) {
                $notification = new KitchenNotification;
                $notification->notification = $notification_message;
                $notification->kitchen_panel_id = $panel_id;
                $notification->sales_id = $sales->id;
                $notification->restaurant_id  = $sales->restaurant_id;
                $notification->save();
            }
            //end of send notification process
        }

        //for change online order status from neworder to accepted order
        $onlineOrder->order_status = 2;
        $onlineOrder->save();

        return response()->json([$sales]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestaurantSale  $restaurantSale
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantSale $restaurantSale)
    {
        return 'destroy';
    }


    /**
     * add_sale_by_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addSaleByAjax(Request $request)
    {
        $json_order = Json_decode($request->order);
        $order = Json_decode($json_order);

        // return [$order];

        $sale_id = $request->sale_id;
        $close_order = $request->close_order;
        $panel_id_array = [];
        //for sales table
        if (RestaurantSale::where('id',$sale_id)->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->exists()) {
            # code...
            $sales = RestaurantSale::find($sale_id);
        }else{
            $sales = new RestaurantSale;
        }
        $sales->customer_id = trim($order->customer_id);
        $sales->total_items = trim($order->total_items_in_cart);
        $sales->sub_total = trim($order->sub_total);

        $sales->vat= (trim($order->total_vat)=="NaN" || trim($order->total_vat)=="" )?NULL:trim($order->total_vat);

        $sales->total_payable = trim($order->total_payable);
        $sales->total_item_discount_amount = trim($order->total_item_discount_amount);
        $sales->sub_total_with_discount = trim($order->sub_total_with_discount);
        $sales->sub_total_discount_amount = trim($order->sub_total_discount_amount);
        //for other discount
        $sales->total_others_discount = trim($order->total_others_discount);

        $sales->total_discount_amount = trim($order->total_discount_amount);
        $sales->delivery_charge = trim($order->delivery_charge);
        $sales->sub_total_discount_value = trim($order->sub_total_discount_value);
        $sales->sub_total_discount_type = trim($order->sub_total_discount_type);
        $sales->user_id = Auth::guard('restaurantUser')->id();
        $sales->waiter_id = trim($order->waiter_id);
        $sales->sale_date = date('Y-m-d');

        $sales->order_time = date("H:i:s");
        // $sales->processing_date_time = date($order->processing_date_time);
        //$sales->processing_date_time = trim($order->processing_date_time);
        $sales->processing_date_time = (trim($order->processing_date_time)) ? trim($order->processing_date_time) : date('Y-m-d').' '.date("H:i:s");

        $sales->order_status = trim($order->order_status);
        //$sales->sale_vat_objects = json_encode($order->sale_vat_objects);
        $sales->sale_vat_objects = (json_encode($order->sale_vat_objects)==NULL || json_encode($order->sale_vat_objects)=="" )? NULL : json_encode($order->sale_vat_objects);


        $sales->order_type = trim($order->order_type);
        //check delivery type order
        if ($order->order_type == 3) {
            $sales->delivery_method_id = trim($order->delivery_method_id);
        }
        $sales->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;


        if ($sale_id > 0) {
            $sales->modified = 'Yes';

            RestaurantSalesConsumption::where('sales_id', $sale_id)->delete();
            RestaurantSalesDetails::where('sales_id', $sale_id)->delete();
            RestaurantSalesConsumptionsOfMenu::where('sales_id', $sale_id)->delete();
            RestaurantSalesDetailsModifier::where('sales_id', $sale_id)->delete();
            RestaurantSalesConsumptionsOfModifiersOfMenu::where('sales_id', $sale_id)->delete();


            $sales->sale_no = str_pad($sale_id, 6, '0', STR_PAD_LEFT);
        }else {
            $sales->save();
            $sales->sale_no = str_pad($sales->id, 6, '0', STR_PAD_LEFT);
        }

        $sales->save();

        if($sales->id >0 && count($order->orders_table)>0){
            $sales->table_id = $order->orders_table[0]->table_id;
            $sales->save();
        }

        //for sale consumptions table
        $sale_consumption = new RestaurantSalesConsumption;

        $sale_consumption->sales_id = $sales->id;
        $sale_consumption->order_status = $sales->order_status;
        $sale_consumption->user_id = Auth::guard('restaurantUser')->id();
        $sale_consumption->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $sale_consumption->save();

        if($sales->id >0 && count($order->items)>0){

            //for sales details table
            foreach($order->items as $item){
                $tmp_var_111 = isset($item->p_qty) && $item->p_qty && $item->p_qty!='undefined'?$item->p_qty:0;
                $tmp = $item->item_quantity-$tmp_var_111;
                $tmp_var = 0;
                if($tmp>0){
                    $tmp_var = $tmp;
                }

                $item_data = new RestaurantSalesDetails;
                $item_data->food_menu_id = $item->item_id;
                $item_data->menu_name = $item->item_name;
                $item_data->qty = $item->item_quantity;
                $item_data->tmp_qty = $tmp_var;
                $item_data->menu_price_without_discount = $item->item_price_without_discount;
                $item_data->menu_price_with_discount = $item->item_price_with_discount;
                $item_data->menu_unit_price = $item->item_unit_price;
                $item_data->menu_taxes = json_encode($item->item_vat);
                $item_data->menu_discount_value = $item->item_discount;
                $item_data->discount_type = $item->discount_type;
                $item_data->menu_note = $item->item_note;
                $item_data->discount_amount = $item->item_discount_amount;

                //have to work with it
                // $item_data->item_type = ($this->Sale_model->getItemType($item->item_id)->item_type=="Bar No")?"Kitchen Item":"Bar Item";

                $item_data->cooking_status = ($item->item_cooking_status=="")?NULL:$item->item_cooking_status;
                $item_data->cooking_start_time = ($item->item_cooking_start_time=="" || $item->item_cooking_start_time=="0000-00-00 00:00:00")?'1900-01-01 00:00:00':date('Y-m-d H:i:s',strtotime($item->item_cooking_start_time));
                $item_data->cooking_done_time = ($item->item_cooking_done_time=="" || $item->item_cooking_done_time=="0000-00-00 00:00:00")?'1900-01-01 00:00:00':date('Y-m-d H:i:s',strtotime($item->item_cooking_done_time));
                $item_data->previous_id = ($item->item_previous_id=="")?0:$item->item_previous_id;
                $item_data->sales_id = $sales->id;
                $item_data->order_status = $sales->order_status;

                $item_data->user_id = Auth::guard('restaurantUser')->id();
                $item_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

                $item_data->save();


                if($item->item_previous_id==""){
                    $item_data->previous_id = $item_data->id;
                    $item_data->save();
                }

                //for table sale consumption of menus
                $food_menu_ingredients = RestaurantFoodMenuIngredient::where('food_menu_id', $item->item_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

                foreach($food_menu_ingredients as $single_ingredient){

                    $data_sale_consumptions_detail = new RestaurantSalesConsumptionsOfMenu;
                    $data_sale_consumptions_detail->ingredient_id = $single_ingredient->ing_id;
                    $data_sale_consumptions_detail->consumption = $item->item_quantity*$single_ingredient->consumption;
                    $data_sale_consumptions_detail->sale_consumption_id = $sale_consumption->id;
                    $data_sale_consumptions_detail->sales_id = $sales->id;
                    $data_sale_consumptions_detail->order_status = $sales->order_status;
                    $data_sale_consumptions_detail->food_menu_id = $item->item_id;
                    $data_sale_consumptions_detail->user_id = Auth::guard('restaurantUser')->id();
                    $data_sale_consumptions_detail->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

                    $data_sale_consumptions_detail->save();

                }

                $modifier_id_array = ($item->modifiers_id!="")?explode(",",$item->modifiers_id):null;
                $modifier_price_array = ($item->modifiers_price!="")?explode(",",$item->modifiers_price):null;

                if(!empty($modifier_id_array)>0){
                    $i = 0;

                    //for sales details modifires

                    foreach($modifier_id_array as $single_modifier_id){

                        $modifier_data = new RestaurantSalesDetailsModifier;
                        $modifier_data->modifier_id =$single_modifier_id;
                        $modifier_data->modifier_price = $modifier_price_array[$i];
                        $modifier_data->food_menu_id = $item->item_id;
                        $modifier_data->sales_id = $sales->id;
                        $modifier_data->order_status = $sales->order_status;
                        $modifier_data->sales_details_id = $item_data->id;
                        $modifier_data->user_id = Auth::guard('restaurantUser')->id();
                        $modifier_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                        $modifier_data->customer_id = $order->customer_id;

                        $modifier_data->save();


                        //item's modifier ingredients
                        $modifier_ingredients = RestaurantFoodMenuModifierIngredient::where('mod_id', $single_modifier_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

                        //for sale cons of mod of menus

                        foreach($modifier_ingredients as $single_ingredient){

                            $data_sale_consumptions_detail = new RestaurantSalesConsumptionsOfModifiersOfMenu;
                            $data_sale_consumptions_detail->ingredient_id = $single_ingredient->ig_id;
                            $data_sale_consumptions_detail->consumption = $item->item_quantity*$single_ingredient->consumption;
                            $data_sale_consumptions_detail->sale_consumption_id = $sale_consumption->id;
                            $data_sale_consumptions_detail->sales_id = $sales->id;
                            $data_sale_consumptions_detail->order_status = $sales->order_status;
                            $data_sale_consumptions_detail->food_menu_id = $item->item_id;
                            $data_sale_consumptions_detail->user_id = Auth::guard('restaurantUser')->id();
                            $data_sale_consumptions_detail->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                            $data_sale_consumptions_detail->save();
                        }

                        $i++;
                    }
                }

                //for notification
                if ($sales->modified == 'Yes') {
                    $panel_id = RestaurantFoodMenu::select('panel_id')->where('id', $item_data->food_menu_id)->first();
                    if ($panel_id_array != '') {
                        $check = false;
                        foreach ($panel_id_array as $value) {
                            if ($value == $panel_id->panel_id) {
                                $check = true;
                            }
                        }
                        if ($check == false) {
                            array_push($panel_id_array, $panel_id->panel_id);
                        }

                    }else{
                        array_push($panel_id_array, $panel_id->panel_id);
                    }
                }

            }
        }

        if ($sales->modified == 'Yes') {
            //this section sends notification to bar/kitchen panel if there is any modification
            $order_number = '';
            if($sales->order_type==1){
                $order_number = 'D '.$sales->sale_no;
            }else if($sales->order_type==2){
                $order_number = 'T '.$sales->sale_no;
            }else if($sales->order_type==3){
                $order_number = 'DL '.$sales->sale_no;
            }

            $notification_message = 'Order:'.$order_number.' has been modified';
            foreach ($panel_id_array as $panel_id) {
                $notification = new KitchenNotification;
                $notification->notification = $notification_message;
                $notification->kitchen_panel_id = $panel_id;
                $notification->sales_id = $sales->id;
                $notification->restaurant_id  = $sales->restaurant_id;
                $notification->save();
            }
            //end of send notification process
        }


        return response()->json([$sales]);
    }


    public function updateOrderStatusByAjax(Request $request){
        // return $request->all();
        $sale_id = $request->sale_id;
        $close_order = $request->close_order;
        $paid_amount = $request->paid_amount;
        $due_total = $request->due_amount;
        $payment_method_type = $request->payment_method_type;
        $card_no = $request->card_no;

        $tips = $request->tips;

        $is_just_cloase = ($payment_method_type=='0')? true:false;

        $sale = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('user_id', Auth::guard('restaurantUser')->id())
            ->where('id', $sale_id)
            ->where('del_status', 'Live')
            ->first();

        if($close_order=='true'){

            //here need to chang: reserved or booked table should be relife

            // $this->Sale_model->delete_status_orders_table($sale_id);
            // $this->db->delete('tbl_orders_table', array('sale_id' => $sale_id));

            if($is_just_cloase){
                // $order_status = array('order_status' => 3,'close_time'=>date('H:i:s'));
                $sale->order_status = 3;
                $sale->close_time = date('H:i:s');

            }else{
                // $order_status = array('paid_amount' =>  $paid_amount, 'due_amount' => $due_amount, 'order_status' => 3,'payment_method_id'=>$payment_method_type,'close_time'=>date('H:i:s'));
                $sale->order_status = 3;
                $sale->paid_amount = $paid_amount;
                $sale->due_total = $due_total;
                $sale->payment_method_id = $payment_method_type;
                $sale->close_time = date('H:i:s');



                if ($payment_method_type == 3 || $payment_method_type == 'gift card') {

                    $giftCard = RestaurantGiftCard::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                        ->where('card_no',$card_no)
                        ->where('del_status', 'Live')
                        ->first();
                    //for check that paid amount is less then gift card balance
                    $giftCardCheck = $this->giftCardCheck($card_no, $sale->id, $paid_amount, $payment_method_type, $tips);

                    if($giftCardCheck == 1 && $giftCard){

                        $salePaymentByGiftCard  = new RestaurantSalesPaymentByGiftCard;
                        $salePaymentByGiftCard->sales_id  = $sale->id;
                        $salePaymentByGiftCard->paid_amount  =  $paid_amount;
                        $salePaymentByGiftCard->gift_card_id  = $giftCard->id;
                        $salePaymentByGiftCard->restaurant_id  =  $sale->restaurant_id;
                        $salePaymentByGiftCard->user_id  = Auth::guard('restaurantUser')->id();
                        $salePaymentByGiftCard->save();

                    }elseif ($giftCardCheck == 2 && $giftCard) {
                        $salePaymentByGiftCard  = new RestaurantSalesPaymentByGiftCard;
                        $salePaymentByGiftCard->sales_id  = $sale->id;
                        $salePaymentByGiftCard->paid_amount  =  $paid_amount + $tips;
                        $salePaymentByGiftCard->gift_card_id  = $giftCard->id;
                        $salePaymentByGiftCard->restaurant_id  =  $sale->restaurant_id;
                        $salePaymentByGiftCard->user_id  = Auth::guard('restaurantUser')->id();
                        $salePaymentByGiftCard->save();

                        //save tips in sale table
                        $sale->tips = $tips;
                    }
                    else{
                        return response()->json(['error' => 'Something went worng']);

                    }

                }else {
                    $sale->tips = $tips;
                }
            }

        }else{
            // $order_status = array('paid_amount' => $paid_amount,'due_amount' => $due_amount,'order_status' => 2,'payment_method_id'=>$payment_method_type);

            $sale->order_status = 2;
            $sale->paid_amount = $paid_amount;
            $sale->due_total = $due_total;
            $sale->payment_method_id = $payment_method_type;

            if ($payment_method_type == 3 || $payment_method_type == 'gift card') {

                $giftCard = RestaurantGiftCard::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                    ->where('card_no',$card_no)
                    ->where('del_status', 'Live')
                    ->first();

                //for check that paid amount is less then gift card balance
                $giftCardCheck = $this->giftCardCheck($card_no, $sale->id, $paid_amount, $payment_method_type, $tips);

                if($giftCardCheck == 1 && $giftCard){

                    $salePaymentByGiftCard  = new RestaurantSalesPaymentByGiftCard;
                    $salePaymentByGiftCard->sales_id  = $sale->id;
                    $salePaymentByGiftCard->paid_amount  =  $paid_amount;
                    $salePaymentByGiftCard->gift_card_id  = $giftCard->id;
                    $salePaymentByGiftCard->restaurant_id  =  $sale->restaurant_id;
                    $salePaymentByGiftCard->user_id  = Auth::guard('restaurantUser')->id();
                    $salePaymentByGiftCard->save();

                }elseif ($giftCardCheck == 2 && $giftCard) {
                    $salePaymentByGiftCard  = new RestaurantSalesPaymentByGiftCard;
                    $salePaymentByGiftCard->sales_id  = $sale->id;
                    $salePaymentByGiftCard->paid_amount  =  $paid_amount + $tips;
                    $salePaymentByGiftCard->gift_card_id  = $giftCard->id;
                    $salePaymentByGiftCard->restaurant_id  =  $sale->restaurant_id;
                    $salePaymentByGiftCard->user_id  = Auth::guard('restaurantUser')->id();
                    $salePaymentByGiftCard->save();

                    //save tips in sale table
                    $sale->tips = $tips;
                }
                else{
                    return response()->json(['error' => 'Something went worng']);
                }

            }else {
                $sale->tips = $tips;
            }
        }

        $sale->save();
        return json_encode($sale);
    }


    /**
     * get_new_orders_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getNewOrdersByAjax(Request $request)
    {
        //return json_encode('new orders');
        $now   = Carbon::now()->toTimeString();
        $shift = RestaurantFoodMenuShift::select('id', 'starting_time', 'ending_time')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->whereTime('starting_time', '<=', $now )->whereTime('ending_time', '>=', $now )->first();
        //$user_id = $this->session->userdata('user_id');
        //$data1 = $this->Sale_model->getNewOrders($outlet_id);
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
            $new_orders = RestaurantSale::with('customer:id,name', 'waiter:id,manager_name', 'table:id,name,floor_id')
                ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                ->where('processing_date_time', '<=', $current_date_time)
                // ->whereBetween('processing_date_time',[$st,$et])
                ->whereIn('order_status', [1, 2])
                ->where('waiter_id', Auth::guard('restaurantUser')->user()->id)
                ->where('del_status', 'Live')
                ->orderBy('updated_at', 'ASC')
                //->take(4)
                ->get();
            # code...
        } else {
            $new_orders = RestaurantSale::with('customer:id,name', 'waiter:id,manager_name', 'table:id,name,floor_id')
                ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                ->where('processing_date_time', '<=', $current_date_time)
                // ->whereBetween('processing_date_time',[$st,$et])
                ->whereIn('order_status', [1, 2])
                ->where('del_status', 'Live')
                ->orderBy('updated_at', 'ASC')
                //->take(4)
                ->get();
            # code...
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

        $new_orders = $t;

        return json_encode($new_orders);
    }


    /**
     * get_all_information_of_a_sale_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getInformationOfSaleByAjax(Request $request)
    {
        $sale_id = $request->sale_id;

        $sales = RestaurantSale::with('salesDetails', 'orderTable', 'customer:id,name', 'waiter:id,manager_name', 'table:id,name,floor_id')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->where('id', $sale_id)
            ->orderBy('updated_at', 'desc')
            ->first();
        foreach ($sales->salesDetails as $salesDetails) {
            $salesDetails->modifiers;

            foreach ($salesDetails->modifiers as $key => $modifier) {
                $salesDetails->modifiers[$key]->name = $modifier->modifierName->name;
            }
        }

        return json_encode($sales);
    }

    /**
     * cancel_particular_order_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteSingleOrderByAjax( Request $request)
    {
        $sale_id = $request->sale_id;
        if (Auth::guard('restaurantUser')->id() == RestaurantSale::find($sale_id)->user_id) {
            $sale = RestaurantSale::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                ->where('user_id', Auth::guard('restaurantUser')->id())
                ->where('id', $sale_id)
                ->where('del_status', 'Live')
                ->first();
            //for cancle order
            if ($sale) {

                RestaurantSalesConsumption::where('sales_id', $sale->id)->delete();
                RestaurantSalesDetails::where('sales_id', $sale->id)->delete();
                RestaurantSalesConsumptionsOfMenu::where('sales_id', $sale->id)->delete();
                RestaurantSalesDetailsModifier::where('sales_id', $sale->id)->delete();
                RestaurantSalesConsumptionsOfModifiersOfMenu::where('sales_id', $sale->id)->delete();
                RestaurantOrdersTable::where('sales_id', $sale->id)->delete();

                // //for cancle order's items
                // foreach ($sale->items as $key => $item) {

                //     //for cancle order's modifier
                //     foreach ($item->modifiers as $key => $modifier) {
                //         $modifier->del_status = "Deleted";
                //         $modifier->save();
                //     }

                //     $item->del_status = "Deleted";
                //     $item->save();
                // }

                // $sale->del_status = "Deleted";
                // $sale->save();
            }
            if ($sale->delete()) {
                # code...
                return json_encode(['success'=>'Order deleted successfully']);
            }else {
                return response()->json(['error'=>'Not deleted successfully']);
            }

        }

    }




    /**
     * print Bill
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printBill(Request $request, $id)
    {
        $restaurantUser = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->first();
        $restaurantId = $restaurantUser->restaurant_id;
        $restaurant = Restaurant::with('taxSettings')->where('id', $restaurantId)->first();
        // return $restaurant->taxSettings;

        $sale_id = $id;
        $sales = RestaurantSale::with('salesDetails', 'orderTable', 'customer:id,name', 'waiter:id,manager_name', 'table:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->where('id', $sale_id)
            ->orderBy('updated_at', 'desc')
            ->first();
        foreach ($sales->salesDetails as $salesDetails) {
            $salesDetails->modifiers;

            foreach ($salesDetails->modifiers as $key => $modifier) {
                $salesDetails->modifiers[$key]->name = $modifier->modifierName->name;
            }
        }

        // return $sales;
        return view('pages.restaurant.sale.sales.printBill', compact('sales', 'restaurant'));
    }



    /**
     * print Invoice
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printInvoice(Request $request, $id)
    {
        $restaurantUser = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->first();
        $restaurantId = $restaurantUser->restaurant_id;
        $restaurant = Restaurant::with('taxSettings')->where('id', $restaurantId)->first();
        // return $restaurant->taxSettings;

        $sale_id = $id;
        $sales = RestaurantSale::with('salesDetails', 'orderTable', 'customer', 'waiter:id,manager_name', 'table:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->where('id', $sale_id)
            ->orderBy('updated_at', 'desc')
            ->first();
        foreach ($sales->salesDetails as $salesDetails) {
            $salesDetails->modifiers;

            foreach ($salesDetails->modifiers as $key => $modifier) {
                $salesDetails->modifiers[$key]->name = $modifier->modifierName->name;
            }
        }

        // return $sales;
        //dd($sales);
        return view('pages.restaurant.sale.sales.printInvoice', compact('sales', 'restaurant'));
    }


    /**
     * get_new_hold_number_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getNewHoldNumberByAjax(Request $request)
    {
        $total_holds = RestaurantSalesHold::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('user_id', Auth::guard('restaurantUser')->id())
            ->where('del_status', 'Live')
            ->orderBy('updated_at', 'desc')
            ->get()->count();

        $total_holds++;
        return json_encode($total_holds);
    }

    /**
     * add_hold_by_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addHoldByAjax(Request $request)
    {
        $json_order = Json_decode($request->order);
        $order = Json_decode($json_order);

        // return [$order];
        $hold_number = $request->hold_number;
        //for holds table

        $holds = new RestaurantSalesHold();
        $holds->customer_id = trim($order->customer_id);
        $holds->total_items = trim($order->total_items_in_cart);
        $holds->sub_total = trim($order->sub_total);

        $holds->vat= (trim($order->total_vat)=="NaN" || trim($order->total_vat)=="" )?NULL:trim($order->total_vat);

        $holds->total_payable = trim($order->total_payable);
        $holds->total_item_discount_amount = trim($order->total_item_discount_amount);
        $holds->sub_total_with_discount = trim($order->sub_total_with_discount);
        $holds->sub_total_discount_amount = trim($order->sub_total_discount_amount);
        $holds->total_discount_amount = trim($order->total_discount_amount);
        $holds->delivery_charge = trim($order->delivery_charge);
        $holds->sub_total_discount_value = trim($order->sub_total_discount_value);
        $holds->sub_total_discount_type = trim($order->sub_total_discount_type);
        $holds->user_id = Auth::guard('restaurantUser')->id();
        $holds->waiter_id = trim($order->waiter_id);
        $holds->sale_date = date('Y-m-d');
        $holds->sale_time = date("H:i:s");
        $holds->order_status = trim($order->order_status);
        $holds->sale_vat_objects = json_encode($order->sale_vat_objects);
        $holds->order_type = trim($order->order_type);
        $holds->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        if($hold_number===0 || $hold_number===""){
            $hold_number = $hold_number+1;
        }
        $holds->hold_no =  str_pad($hold_number, 6, '0', STR_PAD_LEFT);
        $holds->save();

        if($holds->id >0 && count($order->items)>0){

            //for holds details table
            foreach($order->items as $item){

                $item_data = new RestaurantSalesHoldsDetails();
                $item_data->food_menu_id = $item->item_id;
                $item_data->menu_name = $item->item_name;
                $item_data->qty = $item->item_quantity;
                $item_data->menu_price_without_discount = $item->item_price_without_discount;
                $item_data->menu_price_with_discount = $item->item_price_with_discount;
                $item_data->menu_unit_price = $item->item_unit_price;
                $item_data->menu_taxes = json_encode($item->item_vat);
                $item_data->menu_discount_value = $item->item_discount;
                $item_data->discount_type = $item->discount_type;
                $item_data->menu_note = $item->item_note;
                $item_data->discount_amount = $item->item_discount_amount;
                $item_data->holds_id = $holds->id;
                $item_data->user_id = Auth::guard('restaurantUser')->id();
                $item_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

                $item_data->save();


                $modifier_id_array = ($item->modifiers_id!="")?explode(",",$item->modifiers_id):null;
                $modifier_price_array = ($item->modifiers_price!="")?explode(",",$item->modifiers_price):null;



                if(!empty($modifier_id_array)>0){
                    $i = 0;
                    //for sales hold details modifires

                    foreach($modifier_id_array as $single_modifier_id){

                        $modifier_data = new RestaurantSalesHoldsDetailsModifier();
                        $modifier_data->modifier_id =$single_modifier_id;
                        $modifier_data->modifier_price = $modifier_price_array[$i];
                        $modifier_data->food_menu_id = $item->item_id;
                        $modifier_data->holds_id = $holds->id;
                        $modifier_data->holds_details_id = $item_data->id;
                        $modifier_data->user_id = Auth::guard('restaurantUser')->id();
                        $modifier_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                        $modifier_data->customer_id = $order->customer_id;

                        $modifier_data->save();
                        $i++;
                    }
                }
            }
        }

        return response()->json([$holds]);
    }


    /**
     * get_new_hold_number_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllHoldsByAjax()
    {
        $holds = RestaurantSalesHold::with('customer:id,name', 'table:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('user_id', Auth::guard('restaurantUser')->id())
            ->where('del_status', 'Live')
            ->orderBy('updated_at', 'ASC')
            ->get();

        return json_encode($holds);
    }

    /**
     * get_single_hold_info_by_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSingleHoldInfoByAjax( Request $request)
    {
        $hold = RestaurantSalesHold::with('items', 'customer:id,name','waiter:id,manager_name', 'table:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('user_id', Auth::guard('restaurantUser')->id())
            ->where('id', $request->hold_id)
            ->where('del_status', 'Live')
            ->first();
        foreach ($hold->items as $key => $itemsModifier) {
            $itemsModifier->modifiers;
            foreach ($itemsModifier->modifiers as $key => $modifier) {
                $itemsModifier->modifiers[$key]->name = $modifier->modifierName->name;
            }
        }

        return json_encode($hold);
    }

    /**
     * delete_all_information_of_hold_by_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteSingleHoldInfoByAjax( Request $request)
    {
        $hold_id = $request->hold_id;
        if (Auth::guard('restaurantUser')->id() == RestaurantSalesHold::find($hold_id)->user_id) {
            $hold = RestaurantSalesHold::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                ->where('user_id', Auth::guard('restaurantUser')->id())
                ->where('id', $request->hold_id)
                ->where('del_status', 'Live')
                ->first();
            //for delete hold
            if ($hold) {

                //for delete items
                foreach ($hold->items as $key => $item) {

                    //for delete modifier
                    foreach ($item->modifiers as $key => $modifier) {
                        $modifier->del_status = "Deleted";
                        $modifier->save();
                    }

                    $item->del_status = "Deleted";
                    $item->save();
                }

                $hold->del_status = "Deleted";
                $hold->save();
            }

            return json_encode($hold);
        }

    }

    /**
     * delete_all_holds_with_information_by_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteAllHoldByAjax( )
    {
        $holds = RestaurantSalesHold::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('user_id', Auth::guard('restaurantUser')->id())
            ->where('del_status', 'Live')
            ->get();
        //for delete holds
        if ($holds) {
            foreach ($holds as $hold) {
                //for delete items
                foreach ($hold->items as $key => $item) {

                    //for delete modifier
                    foreach ($item->modifiers as $key => $modifier) {
                        $modifier->del_status = "Deleted";
                        $modifier->save();
                    }

                    $item->del_status = "Deleted";
                    $item->save();
                }

                $hold->del_status = "Deleted";
                $hold->save();
            }

        }

        return json_encode(1);

    }


    /**
     * get_new_hold_number_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getAllOnlineOrdersByAjax()
    {
        $onlineOrders = CustomerOnlineOrder::with('customer:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('order_status', 1)
            ->where('del_status', 'Live')
            ->orderBy('updated_at', 'ASC')
            ->get();

        return json_encode($onlineOrders);
    }


    /**
     * get_single_hold_info_by_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSingleOnlineOrderInfoByAjax( Request $request)
    {
        $onlineOrder = CustomerOnlineOrder::with('items', 'customer:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('id', $request->online_order_id)
            ->where('del_status', 'Live')
            ->first();
        foreach ($onlineOrder->items as $key => $itemsModifier) {
            $itemsModifier->modifiers;
            foreach ($itemsModifier->modifiers as $key => $modifier) {
                $itemsModifier->modifiers[$key]->name = $modifier->modifierName->name;
            }
        }

        return json_encode($onlineOrder);
    }

    /**
     * add_online_order_to_sale_by_ajax
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function addOnlineOrderToSaleByAjax(Request $request)
    {

        $onlineOrder = CustomerOnlineOrder::with('items', 'customer:id,name,phone,email')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('id', $request->online_order_id)
            ->where('del_status', 'Live')
            ->first();
        foreach ($onlineOrder->items as $key => $itemsModifier) {
            $itemsModifier->modifiers;
            foreach ($itemsModifier->modifiers as $key => $modifier) {
                $itemsModifier->modifiers[$key]->name = $modifier->modifierName->name;
            }
        }

        //return response()->json($onlineOrder->deliveryAddress->customer_address_id);

        $customer_address = CustomerAddress::where('id', $onlineOrder->deliveryAddress->customer_address_id)->first();

        //return response()->json($customer_address);

        //return json_encode($customer_address);
        // $json_order = Json_decode($request->order);
        // $order = Json_decode($json_order);

        // return [$order];

        //$sale_id = $request->sale_id;
        //$close_order = $request->close_order;
        $panel_id_array = [];

        //for sales table
        $sales = new RestaurantSale;

        $sales->modified == 'No';
        //need to work here
        $Restaurant_customer = RestaurantCustomer::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->where('phone', $onlineOrder->customer->phone)
            ->where('phone', $onlineOrder->customer->email)
            ->first();
        if ($Restaurant_customer) {
            $sales->customer_id = $Restaurant_customer->id;
        } else {
            # code...
            $customer_address ='';
            if ($onlineOrder->deliveryAddress->customer_address_id) {

                $customer_address = CustomerAddress::where('id', $onlineOrder->deliveryAddress->customer_address_id)->first();
            }

            $new_customer = new RestaurantCustomer();
            $new_customer->name = $onlineOrder->customer->name;
            $new_customer->phone = $onlineOrder->customer->phone;
            $new_customer->email = $onlineOrder->customer->email;
            $new_customer->address = $customer_address->address;
            $new_customer->apt = $customer_address->apt;
            $new_customer->country_id = $customer_address->country_id;
            $new_customer->state_id = $customer_address->state_id;
            $new_customer->city_id = $customer_address->city_id;
            $new_customer->note = $customer_address->note;
            $new_customer->zip = $customer_address->zip;
            $new_customer->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $new_customer->user_id = Auth::guard('restaurantUser')->id();
            $new_customer->save();

            $sales->customer_id = $new_customer->id;
        }

        $sales->total_items = $onlineOrder->total_items;
        $sales->sub_total = $onlineOrder->sub_total;
        $sales->vat= (trim($onlineOrder->vat)== NULL || trim($onlineOrder->vat)=="" )?NULL:trim($onlineOrder->vat);
        $sales->total_payable = trim($onlineOrder->total_payable);
        //$sales->total_item_discount_amount = trim($onlineOrder->total_item_discount_amount);
        $sales->total_item_discount_amount = ($onlineOrder->total_item_discount_amount== NULL || $onlineOrder->total_item_discount_amount=="" )?0:$onlineOrder->total_item_discount_amount;
        //$sales->sub_total_with_discount = trim($onlineOrder->sub_total_with_discount);
        $sales->sub_total_with_discount = ($onlineOrder->sub_total_with_discount== NULL || $onlineOrder->sub_total_with_discount=="" ) ? $onlineOrder->sub_total : $onlineOrder->sub_total_with_discount;

        //$sales->sub_total_discount_amount = trim($onlineOrder->sub_total_discount_amount);
        $sales->sub_total_discount_amount = ($onlineOrder->sub_total_discount_amount== NULL || $onlineOrder->sub_total_discount_amount=="" ) ? 0 : $onlineOrder->sub_total_discount_amount;

        //$sales->total_discount_amount = trim($onlineOrder->total_discount_amount);
        $sales->total_discount_amount = ($onlineOrder->total_discount_amount== NULL || $onlineOrder->total_discount_amount=="" ) ? 0 : $onlineOrder->total_discount_amount;

        //$sales->delivery_charge = trim($onlineOrder->delivery_charge);
        $sales->delivery_charge = ($onlineOrder->delivery_charge== NULL || $onlineOrder->delivery_charge=="" ) ? 0 : $onlineOrder->delivery_charge;
        //$sales->sub_total_discount_value = trim($onlineOrder->sub_total_discount_value);
        $sales->sub_total_discount_value = ($onlineOrder->sub_total_discount_value== NULL || $onlineOrder->sub_total_discount_value=="" ) ? 0 : $onlineOrder->sub_total_discount_value;

        //$sales->sub_total_discount_type = trim($onlineOrder->sub_total_discount_type);plain
        $sales->sub_total_discount_type = ($onlineOrder->sub_total_discount_type== NULL || $onlineOrder->sub_total_discount_type=="" ) ? 'plain' : $onlineOrder->sub_total_discount_type;
        $sales->user_id = Auth::guard('restaurantUser')->id();

        //for set default as waiter
        $waiter = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('role', 'waiter')
            ->where('manager_name', 'Default Waiter')
            ->where('del_status', 'Live')
            ->select('id', 'manager_name')
            ->first();

        $sales->waiter_id = trim($waiter->id);

        $sales->sale_date = date('Y-m-d');
        $sales->order_time = date("H:i:s");
        //used delivery time as processing time
        $sales->processing_date_time = trim(Carbon::parse($onlineOrder->delivery_date)->toDateString().' '.$onlineOrder->delivery_time);
        //set sale order status as new order [1= new order]
        $sales->order_status = trim($onlineOrder->order_status);
        //$sales->sale_vat_objects = json_encode($onlineOrder->sale_vat_objects);
        $sales->sale_vat_objects = ($onlineOrder->sale_vat_objects== NULL || $onlineOrder->sale_vat_objects=="" ) ? NULL : $onlineOrder->sale_vat_objects;
        $sales->order_type = trim($onlineOrder->order_type);
        //set order from online order[2]
        $sales->order_from = 2;

        //need to work here which one is select for online order delivery method
        //check delivery type order
        // if ($onlineOrder->order_type == 3) {
        //     $sales->delivery_method_id = trim($onlineOrder->delivery_method_id);
        // }

        $sales->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $sales->save();
        $sales->sale_no = str_pad($sales->id, 6, '0', STR_PAD_LEFT);

        //no need this if that is not used once bellow
        $sales->save();

        //for sale consumptions table
        $sale_consumption = new RestaurantSalesConsumption;
        $sale_consumption->sales_id = $sales->id;
        $sale_consumption->order_status = $sales->order_status;
        $sale_consumption->user_id = Auth::guard('restaurantUser')->id();
        $sale_consumption->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $sale_consumption->save();

        if($sales->id >0 && count($onlineOrder->items)>0){

            //for sales details table
            foreach($onlineOrder->items as $item){

                // $tmp_var_111 = isset($item->p_qty) && $item->p_qty && $item->p_qty!='undefined'?$item->p_qty:0;
                // $tmp = $item->item_quantity-$tmp_var_111;
                // $tmp_var = 0;
                // if($tmp>0){
                //     $tmp_var = $tmp;
                // }

                $item_data = new RestaurantSalesDetails;
                $item_data->food_menu_id = $item->food_menu_id;
                $item_data->menu_name = $item->menu_name;
                $item_data->qty = $item->qty;
                //have to check this
                $item_data->tmp_qty = $item->qty;
                $item_data->menu_price_without_discount = $item->menu_price_without_discount;
                $item_data->menu_price_with_discount = $item->menu_price_with_discount;
                $item_data->menu_unit_price = $item->menu_unit_price;

                //need to work here menu_vat_percentage/menu_taxes
                //$item_data->menu_taxes = json_encode($item->menu_vat_percentage);
                $item_data->menu_taxes = $item->menu_vat_percentage;
                $item_data->menu_discount_value = $item->menu_discount_value;
                //$item_data->discount_type = $item->discount_type;
                $item_data->discount_type = ($item->discount_type== NULL || $item->discount_type=="" ) ? 'plain' : $item->discount_type;
                //$item_data->menu_note = $item->menu_note;
                $item_data->menu_note = ($item->menu_note== NULL || $item->menu_note=="" ) ? '' : $item->menu_note;

                //$item_data->discount_amount = $item->discount_amount;
                $item_data->discount_amount = ($item->discount_amount== NULL || $item->discount_amount=="" ) ? 0 : $item->discount_amount;
                //have to work with it
                // $item_data->item_type = ($this->Sale_model->getItemType($item->item_id)->item_type=="Bar No")?"Kitchen Item":"Bar Item";

                $item_data->cooking_status = ($item->cooking_status=="")?NULL:$item->cooking_status;
                $item_data->cooking_start_time = '1900-01-01 00:00:00';
                $item_data->cooking_done_time = '1900-01-01 00:00:00';
                $item_data->previous_id = 0;
                $item_data->sales_id = $sales->id;
                $item_data->order_status = $sales->order_status;

                $item_data->user_id = Auth::guard('restaurantUser')->id();
                $item_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

                $item_data->save();



                $item_data->previous_id = $item_data->id;
                $item_data->save();


                //for table sale consumption of menus
                $food_menu_ingredients = RestaurantFoodMenuIngredient::where('food_menu_id', $item->id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

                foreach($food_menu_ingredients as $single_ingredient){

                    $data_sale_consumptions_detail = new RestaurantSalesConsumptionsOfMenu;
                    $data_sale_consumptions_detail->ingredient_id = $single_ingredient->ing_id;
                    $data_sale_consumptions_detail->consumption = $item->qty*$single_ingredient->consumption;
                    $data_sale_consumptions_detail->sale_consumption_id = $sale_consumption->id;
                    $data_sale_consumptions_detail->sales_id = $sales->id;
                    $data_sale_consumptions_detail->order_status = $sales->order_status;
                    $data_sale_consumptions_detail->food_menu_id = $item->food_menu_id;
                    $data_sale_consumptions_detail->user_id = Auth::guard('restaurantUser')->id();
                    $data_sale_consumptions_detail->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;

                    $data_sale_consumptions_detail->save();

                }

                //used $item->modifiers instant of this two
                // $modifier_id_array = ($item->modifiers_id!="")?explode(",",$item->modifiers_id):null;
                // $modifier_price_array = ($item->modifiers_price!="")?explode(",",$item->modifiers_price):null;

                if(!empty($item->modifiers)>0){
                    $i = 0;

                    //for sales details modifires

                    foreach($item->modifiers as $single_modifier){

                        $modifier_data = new RestaurantSalesDetailsModifier;
                        $modifier_data->modifier_id = $single_modifier->modifier_id;
                        $modifier_data->modifier_price = $single_modifier->modifier_price;
                        $modifier_data->food_menu_id = $item->food_menu_id;
                        $modifier_data->sales_id = $sales->id;
                        $modifier_data->order_status = $sales->order_status;
                        $modifier_data->sales_details_id = $item_data->id;
                        $modifier_data->user_id = Auth::guard('restaurantUser')->id();
                        $modifier_data->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                        $modifier_data->customer_id = $sales->customer_id;

                        $modifier_data->save();


                        //item's modifier ingredients
                        $modifier_ingredients = RestaurantFoodMenuModifierIngredient::where('mod_id', $single_modifier->modifier_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

                        //for sale cons of mod of menus

                        foreach($modifier_ingredients as $single_ingredient){

                            $data_sale_consumptions_detail = new RestaurantSalesConsumptionsOfModifiersOfMenu;
                            $data_sale_consumptions_detail->ingredient_id = $single_ingredient->ig_id;
                            $data_sale_consumptions_detail->consumption = $item->qty*$single_ingredient->consumption;
                            $data_sale_consumptions_detail->sale_consumption_id = $sale_consumption->id;
                            $data_sale_consumptions_detail->sales_id = $sales->id;
                            $data_sale_consumptions_detail->order_status = $sales->order_status;
                            $data_sale_consumptions_detail->food_menu_id = $item->food_menu_id;
                            $data_sale_consumptions_detail->user_id = Auth::guard('restaurantUser')->id();
                            $data_sale_consumptions_detail->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                            $data_sale_consumptions_detail->save();
                        }

                        $i++;
                    }
                }

                //for kitchen panel notification
                if ($sales->modified == 'Yes') {
                    $panel_id = RestaurantFoodMenu::select('panel_id')->where('id', $item_data->food_menu_id)->first();
                    if ($panel_id_array != '') {
                        $check = false;
                        foreach ($panel_id_array as $value) {
                            if ($value == $panel_id->panel_id) {
                                $check = true;
                            }
                        }
                        if ($check == false) {
                            array_push($panel_id_array, $panel_id->panel_id);
                        }

                    }else{
                        array_push($panel_id_array, $panel_id->panel_id);
                    }
                }

            }
        }

        //may be it's not need heare
        if ($sales->modified == 'Yes') {
            //this section sends notification to bar/kitchen panel if there is any modification
            $order_number = '';
            if($sales->order_type==1){
                $order_number = 'D '.$sales->sale_no;
            }else if($sales->order_type==2){
                $order_number = 'T '.$sales->sale_no;
            }else if($sales->order_type==3){
                $order_number = 'DL '.$sales->sale_no;
            }

            $notification_message = 'Order:'.$order_number.' has been modified';
            foreach ($panel_id_array as $panel_id) {
                $notification = new KitchenNotification;
                $notification->notification = $notification_message;
                $notification->kitchen_panel_id = $panel_id;
                $notification->sales_id = $sales->id;
                $notification->restaurant_id  = $sales->restaurant_id;
                $notification->save();
            }
            //end of send notification process
        }

        //for change online order status from neworder to accepted order
        $onlineOrder->order_status = 2;
        $onlineOrder->save();

        return response()->json([$sales]);
    }


    //gift card check
    public function giftCardCheck($card_no, $sale_id, $paid_amount, $payment_method_type, $tips){

        $card_no = $card_no;
        $sale_id = $sale_id;
        $paid_amount = $paid_amount;
        $payment_method_type = $payment_method_type;
        $currentDate   = Carbon::now()->toDateString();
        $usedBalance = 0;

        $giftCard = RestaurantGiftCard::with('paymentInfo')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('card_no',$card_no)
            ->where('del_status', 'Live')
            ->first();

        $sale = RestaurantSale::select('customer_id')->where('id', $sale_id)->first();

        if ($giftCard) {

            foreach ($giftCard->paymentInfo as $key => $giftCardPaymentInfo) {
                $usedBalance = $usedBalance + $giftCardPaymentInfo->paid_amount;
            }


            $giftCardBalance = $giftCard->value - $usedBalance;


            if ($giftCard->sellInfo->customer->id != $sale->customer_id) {
                return false;
            }elseif ($giftCardBalance < $paid_amount) {

                return false;
            }else if ($giftCard->expiry_date < $currentDate) {

                return false;
            }
            else if($tips){
                $total = $paid_amount+ $tips;

                if ($giftCardBalance < $total) {

                    //tips not counted
                    return 1;
                }else {
                    //tips counted
                    return 2;
                }
            }else {
                return 1;
            }
        } else {
            return false;
        }

    }

    //Register Report

    public function RegisterReport()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.RegisterReport.registerReport');
    }

    //-------Food Sale Report

    public function FoodSaleReport(){
        $res_id = $this->restraturent_id();

        $all=DB::table('tbl_restaurant_sales')
            ->join('tbl_restaurant_customers','tbl_restaurant_sales.customer_id','=','tbl_restaurant_customers.id')
            ->join('tbl_restaurant_users','tbl_restaurant_sales.user_id','=','tbl_restaurant_users.id')
            ->select('tbl_restaurant_sales.*','tbl_restaurant_customers.name as customername','tbl_restaurant_users.manager_name as usname')
            ->where('tbl_restaurant_sales.restaurant_id', $res_id)
            ->get();
        $tot=DB::table('tbl_restaurant_sales')
            ->where('restaurant_id', $res_id)
            ->sum('sub_total');

        $Due=DB::table('tbl_restaurant_sales')
            ->where('restaurant_id', $res_id)
            ->sum('due_total');

        $total_items=DB::table('tbl_restaurant_sales')
            ->where('restaurant_id', $res_id)
            ->sum('total_items');

        $paid_amount=DB::table('tbl_restaurant_sales')
            ->where('restaurant_id', $res_id)
            ->sum('paid_amount');

        return view('pages.restaurant.Report.FoodSaleReport.foodSaleReport',compact('all','tot','Due','total_items','paid_amount'));
    }

    public function DetailsfoodsaleReport($id){
        $Details=DB::table('tbl_restaurant_sales')
            ->where('id',$id)
            ->first();
        return view('pages.restaurant.Report.FoodSaleReport.DetailsfoodsaleReport',compact('Details'));
    }

    //---------Daily Summaery Report

    public function dailySaleReport(){

        $c_d= date('Y-m-d');
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $daly=DB::table('tbl_restaurant_sales')
            ->join('tbl_restaurant_customers','tbl_restaurant_sales.customer_id','=','tbl_restaurant_customers.id')
            ->join('tbl_restaurant_users','tbl_restaurant_sales.user_id','=','tbl_restaurant_users.id')
            ->select('tbl_restaurant_sales.*','tbl_restaurant_customers.name as customername','tbl_restaurant_users.manager_name as usname')
            ->where('tbl_restaurant_sales.restaurant_id', $res_id)
            ->whereDate('tbl_restaurant_sales.created_at', '=', $c_d)
            ->get();

        $tot=DB::table('tbl_restaurant_sales')
            ->whereDate('created_at', '=', $c_d)
            ->where('restaurant_id', $res_id)
            ->sum('sub_total');

        $Due=DB::table('tbl_restaurant_sales')
            ->whereDate('created_at', '=', $c_d)
            ->where('restaurant_id', $res_id)
            ->sum('due_total');

        $total_items=DB::table('tbl_restaurant_sales')
            ->whereDate('created_at', '=', $c_d)
            ->where('restaurant_id', $res_id)
            ->sum('total_items');

        $paid_amount=DB::table('tbl_restaurant_sales')
            ->whereDate('created_at', '=', $c_d)
            ->where('restaurant_id', $res_id)
            ->sum('paid_amount');

        return view('pages.restaurant.Report.DailySaleReport.dailySaleReport',compact('daly','tot','Due','total_items','paid_amount'));
    }

    public function DailySaleReportDetails($id){
        $Details=DB::table('tbl_restaurant_sales')
            ->where('id',$id)
            ->first();
        return view('pages.restaurant.Report.DailySaleReport.detalsDailySaleReport',compact('Details'));
    }

    //Detailed Sale Report

    public function DetailedSaleReport()
    {
        $res_id = $this->restraturent_id();
        $detailes=DB::table('tbl_restaurant_sales_details')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->get();

        return view('pages.restaurant.Report.DetailedSaleReport.detailedsalereport', compact('detailes'));
    }

    public function ModifieddetailsfoodsaleReport($id)
    {
        $res_id = $this->restraturent_id();
        $modify=DB::table('tbl_restaurant_sales_details_modifiers')
            ->join('tbl_restaurant_sales_details','tbl_restaurant_sales_details_modifiers.sales_details_id','tbl_restaurant_sales_details.id')

            ->join('tbl_restaurant_food_menu_modifiers','tbl_restaurant_sales_details_modifiers.modifier_id','tbl_restaurant_food_menu_modifiers.id')

            ->select('tbl_restaurant_sales_details_modifiers.*','tbl_restaurant_sales_details.menu_name as menuname','tbl_restaurant_food_menu_modifiers.name as modifier_name')
            ->where('tbl_restaurant_sales_details_modifiers.sales_details_id', $id)
            ->where('tbl_restaurant_sales_details_modifiers.del_status','=','Live')
            ->first();
        // dd($modify);
        return view('pages.restaurant.Report.DetailedSaleReport.midifieddetailedsalereport', compact('modify'));
    }

    //Daily Summary Report
    public function dailySummaryReport()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.DailySummaryReport.dailySummaryReport');
    }

    //Consumption Report
    public function consumptionReport()
    {
        $res_id = $this->restraturent_id();
        $consumption=DB::table('tbl_restaurant_sales_consumptions')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->get();
        // dd($consumption);

        return view('pages.restaurant.Report.ConsumptionReport.consumptionReport');
    }

    //Inventory Report
    public function inventoryReport()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.InventoryReport.inventoryReport');
    }

    //Supplier Due Report
    public function SupplierDueReport()
    {
        $res_id = $this->restraturent_id();
        //dd($res_id);

        $supplierdue_name=DB::table('tbl_restaurant_purchases')
            ->join('tbl_restaurant_users','tbl_restaurant_purchases.restaurant_id','tbl_restaurant_users.restaurant_id')
            ->select('tbl_restaurant_purchases.*','tbl_restaurant_users.manager_name')
            ->where('tbl_restaurant_purchases.restaurant_id', $res_id)
            ->where('tbl_restaurant_purchases.del_status','=','Live')
            ->get();

        $due_total=DB::table('tbl_restaurant_purchases')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->sum('due');

        $subtotal=DB::table('tbl_restaurant_purchases')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->sum('subtotal');

        $grand_total=DB::table('tbl_restaurant_purchases')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->sum('grand_total');

        $paid_total=DB::table('tbl_restaurant_purchases')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->sum('paid');

        return view('pages.restaurant.Report.SupplierDueReport.supplierDueReport',compact('supplierdue_name','due_total','subtotal','grand_total','paid_total'));
    }

    public function DetailsSupplierDueReport($id)
    {
        $res_id = $this->restraturent_id();
        $Details=DB::table('tbl_restaurant_purchases')->where('id',$id)->first();
        return view('pages.restaurant.Report.SupplierDueReport.DetailsSupplierDueReport',compact('Details'));
    }

    //Customer Due Report

    public function customerduereport()
    {
        $res_id = $this->restraturent_id();
        $customer_due = DB::table('tbl_customer_online_order_details')
            ->join('tbl_customer_online_orders','tbl_customer_online_order_details.online_order_id','tbl_customer_online_orders.id')
            ->join('tbl_customers','tbl_customer_online_order_details.customer_id','tbl_customers.id')
            ->select('tbl_customer_online_order_details.*','tbl_customer_online_orders.*','tbl_customers.name as customername')
            ->where('tbl_customer_online_order_details.restaurant_id', $res_id)
            ->where('tbl_customer_online_order_details.del_status','=','Live')
            ->get();
        return view('pages.restaurant.Report.CustomerDueReport.customerduereport',compact('customer_due'));
    }


    //Low Inventory

    public function lowinventoryreport()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.LowInventoryReport.lowinventoryreport');
    }

    //Profit Loss
    public function profitlossreport()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.ProfitLossReport.profitloss');
    }

    //Kitchen Performance

    public function kitchenperformancereport()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.KitchenPerformanceReport.kitchenperformancereport');
    }

    //Attendance Report

    public function attendancereport()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.AttendanceReport.attedancereport');
    }

    //Supplier Ledger

    public function supplierledger()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.SupplierLedger.supplierledger');
    }



    //Customer Ledger

    public function customerledger()
    {
        $res_id = $this->restraturent_id();
        return view('pages.restaurant.Report.CustomerLedger.customerledger');
    }









}
