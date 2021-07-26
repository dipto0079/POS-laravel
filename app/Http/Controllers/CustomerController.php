<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Customer;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        auth()->setDefaultDriver('customer');
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function profile()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $states = State::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $cities = City::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $customer = Customer::with('addresses')->where('id', Auth::guard('customer')->user()->id)->where('del_status', 'Live')->first();
        //return $customer->addresses;
        return view('pages.customer.profile', compact('countries', 'states', 'cities', 'customer'));
    }

    public function updateProfile(Request $request){

        //return $request->all();
        $rules = array(
            'name' => 'required',
        );
        if ($request->password) {
            //return 'true';
            $rules['password'] = 'required|min:6|max:12|confirmed';
        }

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            //return $request->all();
            $customer = Customer::where('id', Auth::guard('customer')->user()->id)->where('del_status', 'Live')->first();
            $customer->name = $request->name;
            $customer->password = ($request->password) ? bcrypt($request->password) : $customer->password ;
            $customer->save();
            //return $customer;

            //Mail::to($restaurantUser->manager_email)->send(new RestaurantVerificationEmail($restaurantUser));

            toastr()->success('updated successfully. ');
            // redirect
            return redirect()->route('customer.profile');
            
        }
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function profilePicture(Request $request)
    {
        if ($request->hasFile('profile_picture')) {
            //return 'true';
            $rules['profile_picture'] = 'image|mimes:jpeg,png,jpg';
            
            $validator = Validator::make(\request()->all(), $rules);
            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                //return 'true';
                // store
                //$customer = Customer::where('id', Auth::guard('customer')->user()->id)->where('del_status', 'Live')->first();
                //$customer->profile_picture = $request->profile_picture;
                $path = base_path('media/customer/profile');

                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $image = $request->file('profile_picture');
                $filename = $image->getClientOriginalName();
                $profileNameToStore = time() . "_" . $filename;
                $image->move(base_path('\media\customer\profile'), $profileNameToStore);

                $customer = Customer::where('id', Auth::guard('customer')->user()->id)->where('del_status', 'Live')->first();

                if (Customer::where('id', Auth::guard('customer')->user()->id)->where('del_status', 'Live')->exists()) {
                    if ($customer->profile_picture) {
                        # code...
                        if(File::exists(base_path('media/customer/profile/').$customer->profile_picture)){
                            File::delete(base_path('media/customer/profile/').$customer->profile_picture);
                        }else{
                            //return [base_path('media/customer/profile/').$customer->profile_picture, $customer->profile_picture];
                            dd('File does not exists.');
                        }
                    }

                    $customer->profile_picture = $profileNameToStore;
                    $customer->save();
                } 
            }

        }
        return redirect()->route('customer.profile');
    }
}
