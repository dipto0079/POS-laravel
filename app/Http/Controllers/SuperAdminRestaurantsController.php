<?php

namespace App\Http\Controllers;

use App\Charge;
use App\Restaurant;
use App\RestaurantSettingsCharge;
use App\RestaurantUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SuperAdminRestaurantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restaurantList()
    {
        $restaurants = Restaurant::with('city', 'state', 'restaurantUsers')->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        //return $restaurants;
        return view('pages.superAdmin.restaurant.index', compact('restaurants'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function viewDetail($id)
    {
        $charges = Charge::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $restaurant = Restaurant::find($id);
        $restaurantUser = RestaurantUser::where('restaurant_id', $id)->first();
        return view('pages.superAdmin.restaurant.detail', compact('restaurant', 'restaurantUser', 'charges'));
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function approve($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            $restaurant = Restaurant::find($id);
            $restaurant->approval_status = "Approve";
            $restaurant->save();

            toastr()->success('Approved successfully.');
            // redirect
            return redirect()->route('superAdmin.restaurantList');
        }
    }

    /**
     * Disapprove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function disapprove($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            $restaurant = Restaurant::find($id);
            $restaurant->approval_status = "Disapprove";
            $restaurant->save();

            toastr()->success('Disapproved successfully.');
            // redirect
            return redirect()->route('superAdmin.restaurantList')->with('success', 'Disapproved successfully.');
        }
    }

        /**
     * Approve the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function featured($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            $restaurant = Restaurant::find($id);
            $restaurant->featured_status = "Featured";
            $restaurant->save();

            toastr()->success('Featured successfully.');
            // redirect
            return redirect()->route('superAdmin.restaurantList');
        }
    }

    /**
     * Disapprove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function nonFeatured($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            $restaurant = Restaurant::find($id);
            $restaurant->featured_status = "Non Featured";
            $restaurant->save();

            toastr()->success('Non Featured successfully.');
            // redirect
            return redirect()->route('superAdmin.restaurantList')->with('success', 'Non Featured successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $restaurant = Restaurant::find($id);
        if ($restaurant) {
            $restaurant = Restaurant::find($id);
            $restaurant->del_status = "Deleted";
            $restaurant->save();

            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('superAdmin.restaurantList')->with('success', 'Deleted successfully.');
        }
    }

    //add-restaurant-charge-by-ajax
    public function addRestaurantChargeByAjax(Request $request){
        // return $request->all();

        $charge_id       = $request->charge_id;
        $unit            =  $request->unit;
        $one_time_charge =  $request->one_time_charge;
        $monthly_charge  = $request->monthly_charge;
        $annual_charge   =  $request->annual_charge;
        $restaurant_id   = $request->restaurant_id;

        $rules = array(
            'charge_id' => 'required',
            'unit' => 'required',
            'one_time_charge' => 'required',
            'monthly_charge' => 'required',
            'annual_charge' => 'required',
            'restaurant_id' => 'required',
        );

        $request->one_time_charge ? $rules['one_time_charge'] = 'required' : '';
        $request->monthly_charge ? $rules['monthly_charge'] = 'required' : '';
        $request->restaurant_id ? $rules['restaurant_id'] = 'required' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the sign up
        if ($validator->fails()) {
            return response()->json([
                'success' => false, 'errors' => $validator->getMessageBag()->toArray()
            ]);
        } else {

            $restaurantCharge = RestaurantSettingsCharge::where('restaurant_id', $restaurant_id)->where('charge_id', $charge_id)->first();
            if ($restaurantCharge) {
                return response()->json(['exist'=>'already exist']);
            } else {
    
                $restaurantCharge = new RestaurantSettingsCharge;
                $restaurantCharge->charge_id = $charge_id;
                $restaurantCharge->unit = $unit;
                $restaurantCharge->one_time_charge = $one_time_charge;
                $restaurantCharge->monthly_charge = $monthly_charge;
                $restaurantCharge->annual_charge = $annual_charge;
                $restaurantCharge->restaurant_id = $restaurant_id;
                $restaurantCharge->save();
    
                return response()->json($restaurantCharge);
            }
        }

    }

    //add-restaurant-charge-by-ajax
    public function editRestaurantChargeByAjax(Request $request){
        // return $request->all();

        $charge_id       = $request->charge_id;
        $unit            =  $request->unit;
        $one_time_charge =  $request->one_time_charge;
        $monthly_charge  = $request->monthly_charge;
        $annual_charge   =  $request->annual_charge;
        $restaurant_id   = $request->restaurant_id;

        $rules = array(
            'charge_id' => 'required',
            'unit' => 'required',
            'one_time_charge' => 'required',
            'monthly_charge' => 'required',
            'annual_charge' => 'required',
            'restaurant_id' => 'required',
        );

        $request->one_time_charge ? $rules['one_time_charge'] = 'required' : '';
        $request->monthly_charge ? $rules['monthly_charge'] = 'required' : '';
        $request->restaurant_id ? $rules['restaurant_id'] = 'required' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the sign up
        if ($validator->fails()) {
            return response()->json([
                'success' => false, 'errors' => $validator->getMessageBag()->toArray()
            ]);
        } else {

            $restaurantCharge = RestaurantSettingsCharge::where('restaurant_id', $restaurant_id)->where('charge_id', $charge_id)->first();
            if ($restaurantCharge) {

                $restaurantCharge->unit = $unit;
                $restaurantCharge->one_time_charge = $one_time_charge;
                $restaurantCharge->monthly_charge = $monthly_charge;
                $restaurantCharge->annual_charge = $annual_charge;
                $restaurantCharge->save();
    
                return response()->json($restaurantCharge);

            } else {
                
                return response()->json(['not_found'=>'Somthing went Wrong']);
            }
        }

        

        


    }



}
