<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerOnlineOrder;
use App\CustomerOnlineOrderDeliveryAddress;
use App\CustomerOnlineOrderDetails;
use App\CustomerOnlineOrderDetailsModifiers;
use App\CustomerRestaurantSubscription;
use App\Mail\CustomerRestaurantSubscriptionMail;
use App\Restaurant;
use App\RestaurantFoodMenu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerOnlineOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        auth()->setDefaultDriver('customer');
    }


    //checkout page
    public function checkout(Request $request){

        $delivery_date  = $request->delivery_date;
        $delivery_time  = $request->delivery_time;
        $delivery_asap  = $request->delivery_asap;
        $restaurant_id  = $request->restaurant_id;
        $order_type     = $request->order_type;
        $carts = Session::get('cart');
        $delivery_option = '';

        if (Session::has('delivery_option')) {
            $delivery_option = Session::get('delivery_option');
        }
        $customer = Customer::with('addresses')->select('id', 'name', 'phone', 'email')

            ->where('id', Auth::guard('customer')->id())

            ->first();

        return view('pages.customer.checkout', compact('carts', 'delivery_date', 'delivery_time', 'delivery_option', 'restaurant_id', 'order_type', 'delivery_asap', 'customer'));
    }


    //for store Customer Online order
    public function placedOnlineOrder(Request $request){
        //return response()->json([$request->all(),'carts' =>Session::get('cart')]);
        //return Carbon::parse($request->delivery_date);
        //return $request->all();

        $delivery_option = '';
        if (Session::has('delivery_option')) {
            $delivery_option = Session::get('delivery_option');
        }

        if (Session::has('cart')) {
            $carts = Session::get('cart');
            if ($carts) {

                $sub_total = 0;
                $vat_tax = 0;
                $total = 0;


                //for save order start
                $order = new CustomerOnlineOrder;
                $order->customer_id = Auth::guard('customer')->id();

                if ($request->restaurant_subscription) {
                    $customer = Customer::where('id', Auth::guard('customer')->id())->first();
                    $restaurant = Restaurant::select('name')->where('id',$request->restaurant_id)->first();
                    $subscription_check = CustomerRestaurantSubscription::where('customer_id', $customer->id)
                                                                          ->where('restaurant_id', $request->restaurant_id)
                                                                          ->where('subscribe', true)
                                                                          ->exists();
                    if (!$subscription_check) {
                        $subscription = new CustomerRestaurantSubscription;
                        $subscription->customer_id = $customer->id;
                        $subscription->restaurant_id = $request->restaurant_id;
                        $subscription->subscribe = true;
                        $subscription->save();

                        //Mail::to($customer->email)->send(new MessageByMail($customer));
                        Mail::to($customer->email)->send(new CustomerRestaurantSubscriptionMail($restaurant));


                    }


                }


                $order->total_items = count($carts);
                //$order->sub_total = trim($order->sub_total);done

                //$order->vat= (trim($order->total_vat)=="NaN" || trim($order->total_vat)=="" )?NULL:trim($order->total_vat);

                //$order->total_payable = trim($order->total_payable); done

                //$order->total_item_discount_amount = trim($order->total_item_discount_amount);
                //$order->sub_total_with_discount = trim($order->sub_total_with_discount);
                //$order->sub_total_discount_amount = trim($order->sub_total_discount_amount);
                //$order->total_discount_amount = trim($order->total_discount_amount);
                //$order->delivery_charge = trim($order->delivery_charge);
                //$order->sub_total_discount_value = trim($order->sub_total_discount_value);
                //$order->sub_total_discount_type = trim($order->sub_total_discount_type);
                $order->sale_date = date('Y-m-d');
                $order->sale_time = date("H:i:s");
                $order->delivery_date = Carbon::parse($request->delivery_date)->toDateString();
                $order->delivery_time = Carbon::parse($request->delivery_time)->toTimeString();

                $order->order_status = 1;
                //$order->sale_vat_objects = json_encode($order->sale_vat_objects);
                $order->order_type = $request->order_type;
                $order->restaurant_id = $request->restaurant_id;
                //return $order;
                $order->save();
                //for save order end

                foreach ($carts as $key => $cart) {

                    $item_total = 0;
                    $discount = 0;
                    $selected_modifiers = [];
                    $item_unit_price = 0;
                    $food_menu = RestaurantFoodMenu::with(['modifiers'=> function ($query){
                                                        $query->wherePivot('del_status', 'Live');
                                                    }])
                                                    ->where('id', $cart['food_menu_id'])
                                                    ->where('del_status', 'Live')
                                                    ->select('id', 'name', 'take_away_price', 'delivery_order_price')
                                                    ->first();

                    if ($delivery_option == 'delivery') {

                        $item_unit_price = $food_menu->delivery_order_price;

                    }else if($delivery_option == 'pickup') {

                        $item_unit_price = $food_menu->take_away_price;

                    } else {

                        $item_unit_price = $food_menu->delivery_order_price;

                    }


                    //add item price with quantity
                    $item_total = $item_total + ($item_unit_price * $cart['qty']);
                    //for item save start

                    $item_data = new CustomerOnlineOrderDetails;
                    $item_data->food_menu_id = $food_menu->id;
                    $item_data->menu_name = $food_menu->name;
                    $item_data->qty = $cart['qty'];

                    $item_data->menu_price_without_discount = $item_unit_price * $cart['qty'];
                    $item_data->menu_price_with_discount = $item_unit_price * $cart['qty'] - $discount;
                    $item_data->menu_unit_price = $item_unit_price;
                    //$item_data->menu_taxes = json_encode($food_menu->item_vat);
                    $item_data->menu_discount_value = 0;
                    //$item_data->discount_type = $food_menu->discount_type;
                    //$item_data->menu_note = $food_menu->item_note;
                    //$item_data->discount_amount = $food_menu->item_discount_amount;
                    $item_data->online_order_id = $order->id;
                    $item_data->customer_id = $order->customer_id;
                    $item_data->restaurant_id = $order->restaurant_id;

                    $item_data->save();
                    //for item save end

                    foreach ($food_menu->modifiers as $key => $food_menu_modifier) {
                        if ($cart['modifiers']) {
                            # code...
                            foreach ($cart['modifiers'] as $key => $cart_modifier) {
                                if ($cart_modifier == $food_menu_modifier->id) {

                                    $selected_modifiers[$key] = $food_menu_modifier;

                                    //item modifier save start
                                    $modifier_data = new CustomerOnlineOrderDetailsModifiers;
                                    $modifier_data->modifier_id =$food_menu_modifier->id;
                                    $modifier_data->modifier_price = $food_menu_modifier->price;
                                    $modifier_data->food_menu_id = $food_menu->id;
                                    $modifier_data->online_order_id = $order->id;
                                    $modifier_data->online_order_details_id = $item_data->id;
                                    $modifier_data->restaurant_id = $order->restaurant_id;
                                    $modifier_data->customer_id = $order->customer_id;

                                    $modifier_data->save();
                                    //item modifier save end

                                    //for add modifier price
                                    $item_total = $item_total + ($food_menu_modifier->price * $cart['qty']);
                                    //return response()->json(['order'=> $order,'item_data' =>$item_data, 'modifier_data' => $modifier_data]);
                                }
                            }
                        }
                        // return response()->json(['order'=> $order,'item_data' =>$item_data, 'modifier_data' => $modifier_data]);
                    }

                    //sub total for after add item total
                    $sub_total = $sub_total + $item_total;
                }

                //total
                $total = $total + $sub_total + $vat_tax;

                $order->sub_total = $sub_total;
                $order->total_payable = $total;
                $order->online_order_no =  str_pad($order->id, 6, '0', STR_PAD_LEFT);
                $order->save();

                if ($order->order_type == 3) {
                    $delivery_address = new CustomerOnlineOrderDeliveryAddress;
                    $delivery_address->customer_id = $order->customer_id;
                    $delivery_address->online_order_id = $order->id;
                    $delivery_address->customer_address_id = $request->address_id;
                    $delivery_address->save();
                }

            }

        }
        Session::put('cart');
        // return redirect()->route('customer.orderSuccess');
        return Redirect::route('customer.orderSuccess', $order->id);
        //return Redirect::route('customer.orderSuccess')->with( ['order' => $order] );
        //return response()->json(['online_order'=>$order]);
    }

    //success view
    public function orderSuccess($id){

        $order = CustomerOnlineOrder::where('id', $id)->first();
        return view('pages.customer.successOrder', compact('order'));
    }

}
