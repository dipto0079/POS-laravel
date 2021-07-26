<?php

namespace App\Http\Controllers;

use App\City;
use App\Classes\ServiceWorker;
use App\Country;
use App\Mail\RestaurantVerificationEmail;
use App\PrivacyPolicy;
use App\Restaurant;
use App\RestaurantUser;
use App\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class RestaurantAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
        $this->serviceWorker = new ServiceWorker();
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function showSignUpForm()
    {
        $id = $this->serviceWorker->random_strings(6);
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $states = State::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $cities = City::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $privacyPolicy = PrivacyPolicy::first();
//        return view('pages.restaurant.signUp', compact('id', 'countries', 'states', 'cities', 'privacyPolicy'));
        return view('pages.restaurant.signUp', compact('id', 'countries', 'privacyPolicy'));
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function showLoginForm()
    {
        return view('pages.restaurant.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function doSignUp(Request $request)
    {
        $rules = array(
            'restaurant_id' => 'required|unique:tbl_restaurants,restaurant_id',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns,strict|unique:tbl_restaurants,email',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'manager_name' => 'required',
            'manager_phone' => 'required',
            'manager_email' => 'required|email:rfc,dns,strict|unique:tbl_restaurant_users,manager_email',
            'manager_password' => 'required|min:6|max:12'
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = Country::find($request->country);
            $state = State::find($request->state);
            $city = City::find($request->city);

            if ($country && $state && $city) {
                $restaurant = new Restaurant;
                $restaurant->restaurant_id = $request->restaurant_id;
                $restaurant->name = $request->name;
                $restaurant->phone = $request->phone;
                $restaurant->email = $request->email;
                $restaurant->country_id = $request->country;
                $restaurant->state_id = $request->state;
                $restaurant->city_id = $request->city;
                $restaurant->address = $request->address;
                $restaurant->slug = Str::slug($request->name, '-');
                $restaurant->save();

                $restaurantUser = new RestaurantUser;
                $restaurantUser->manager_name = $request->manager_name;
                $restaurantUser->manager_phone = $request->manager_phone;
                $restaurantUser->manager_email = $request->manager_email;
                $restaurantUser->password = bcrypt($request->manager_password);
                $restaurantUser->email_verification_token = Str::random(32);
                $restaurantUser->restaurant_id = $restaurant->id;
                $restaurantUser->save();

                Mail::to($restaurantUser->manager_email)->send(new RestaurantVerificationEmail($restaurantUser));

                toastr()->success('Signed up successfully. Please check your email to activate the account.');
                // redirect
                return redirect()->route('restaurant.showLoginForm');
            } else {
                toastr()->error('Invalid country, state or city name found.');
                return redirect()->back();
            }
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function doLogin(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'email' => 'required|email:rfc,dns,strict',
           'password' => 'required'
       ]);

       $primaryCredential = ['restaurant_id' => $request->id];
        $secondaryCredentials = ['manager_email' => $request->email, 'password' => $request->password];
        //return $secondaryCredentials;

        if (Restaurant::where('restaurant_id', '=', $request->id)->exists()) {
            // Restaurant found
            if (Auth::guard('restaurantUser')->attempt($secondaryCredentials)) {
                if (Auth::guard('restaurantUser')->user()->email_verified && Restaurant::where('restaurant_id', '=', $request->id)->where('approval_status', '=','Approve')->where('del_status', '=','Live')->exists()) {
                    toastr()->success('Login success.');
                    return redirect()->route('restaurant.home');
                } else {
                    if (!Auth::guard('restaurantUser')->user()->email_verified) {
                        toastr()->error('Account not verified. Please verify your account to login.');
                        Auth::guard('restaurantUser')->logout();
                        return redirect()->route('restaurant.showLoginForm')->withInput();
                    }if (Restaurant::where('restaurant_id', '=', $request->id)->first()->approval_status === 'Disapprove') {
                        toastr()->error('Your account not approved yet. Wait for the approval to login.');
                        Auth::guard('restaurantUser')->logout();
                        return redirect()->route('restaurant.showLoginForm')->withInput();
                    }if (Restaurant::where('restaurant_id', '=', $request->id)->first()->del_status === 'Deleted') {
                        toastr()->error('Your account has been deleted.');
                        Auth::guard('restaurantUser')->logout();
                        return redirect()->route('restaurant.showLoginForm')->withInput();
                    }else {
                        toastr()->error('Something wrong with Your account.');
                        Auth::guard('restaurantUser')->logout();
                        return redirect()->route('restaurant.showLoginForm')->withInput();
                    }
                }
            } else {
                toastr()->error('Invalid credentials!'.$request->id);
                Auth::guard('restaurant')->logout();
                return redirect()->route('restaurant.showLoginForm')->withInput();
            }
        } else {
            toastr()->error('Invalid credentials!');
            return redirect()->route('restaurant.showLoginForm')->withInput();
        }
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::guard('restaurantUser')->logout();
        toastr()->success('Logout successfully.');
        return redirect()->route('restaurant.showLoginForm');
    }
}
