<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerReservation;
use App\CustomerRestaurantSubscription;
use App\Mail\CustomerReservationMail;
use App\Mail\CustomerRestaurantSubscriptionMail;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\Types\Null_;
use DB;

class CustomerReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        auth()->setDefaultDriver('customer');
    }

    public function tableReservation(Request $request){
        // toastr()->success('successful.');
        // return redirect()->back();
        // return $request->all();
        //return $data = implode(',', $request->selected_tables);
        //return json_encode($request->selected_tables);
        if ($request->restaurant_id{

        }


        $customerReservation = new CustomerReservation();
        $customerReservation->table_id = ($request->selected_tables)? implode(',', $request->selected_tables): implode(',', $request->selected_tables);
        $customerReservation->number_of_people = $request->number_of_people;
        $customerReservation->booking_date = Carbon::parse($request->booking_date)->toDateString();
        $customerReservation->end_booking_date = Carbon::parse($request->end_booking_date)->toDateString();
        //$customerReservation->booking_time = $request->booking_time;
        $customerReservation->booking_time = Carbon::parse($request->booking_time)->toTimeString();
        $customerReservation->end_booking_time = Carbon::parse($request->end_booking_time)->toTimeString();
        $customerReservation->comment = ($request->comment)? $request->comment: NUll;
        $customerReservation->customer_id = Auth::guard('customer')->id();
        $customerReservation->restaurant_id = $request->restaurant_id;
        //return $customerReservation;
        $customerReservation->save();

      //  $customerReservation->DB::table('tbl_table_resurved')->insert();


        $customer = Customer::where('id', Auth::guard('customer')->id())->first();
        if ($request->restaurant_subscription) {
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
                Mail::to($customer->email)->send(new CustomerRestaurantSubscriptionMail($restaurant));
            }
        }

        Mail::to($customer->email)->send(new CustomerReservationMail($restaurant));

        toastr()->success('successful.');
        // redirect
        return redirect()->back();







    }

}
