<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Cuisine;
use App\Restaurant;
use App\RestaurantSettingsCuisine;
use App\RestaurantSettingsLogo;
use App\RestaurantSettingsSocialLink;
use App\RestaurantSettingsTax;
use App\RestaurantSettingsTaxField;
use App\RestaurantSettingsThirdPartyVendor;
use App\RestaurantUser;
use App\SocialMedia;
use App\State;
use App\ThirdPartyVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class RestaurantSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function showSettings()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $states = State::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $cities = City::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $cuisines = Cuisine::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        $socialMediaList = SocialMedia::where('del_status', 'Live')->orderBy('name', 'asc')->get();
        $thirdPartyVendors = ThirdPartyVendor::where('del_status', 'Live')->orderBy('name', 'asc')->get();

        $restaurantUser = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->first();
        $restaurantId = $restaurantUser->restaurant_id;
        $restaurant = Restaurant::with('country', 'city', 'state', 'socialLinks')->where('id', $restaurantId)->first();
//        return $restaurant;

        $logo = RestaurantSettingsLogo::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();
        // $socialLinks = RestaurantSettingsSocialLink::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();
        $tax = RestaurantSettingsTax::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();
        if ($tax) {
            $taxFields = RestaurantSettingsTaxField::where('tax_id', $tax->id)->get();
//            return $taxFields;
        } else {
            $taxFields = [];
        }

        return view('pages.restaurant.settings', compact('restaurant', 'cuisines', 'countries', 'states', 'cities', 'logo', 'socialMediaList', 'thirdPartyVendors', 'tax', 'taxFields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateSettings(Request $request)
    {
        
        // return $request->all();
        $rules = array(
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns,strict|unique:tbl_restaurants,email,' . Auth::guard('restaurantUser')->user()->restaurant_id,
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'collect_tax' => 'required'
        );

        if ($request->hasFile('logo')) {
            $rules['logo'] = 'image|mimes:jpeg,png,jpg';
        }

        // if ($request->fb_username || $request->twitter_username || $request->insta_username || $request->youtube_username) {
        //     $socialLinks = RestaurantSettingsSocialLink::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();

        //     if ($socialLinks) {
        //         if ($request->fb_username && !$socialLinks->facebook_password) {
        //             $rules['fb_password'] = 'required';
        //         }
        //         if ($request->twitter_username && !$socialLinks->twitter_password) {
        //             $rules['twitter_password'] = 'required';
        //         }
        //         if ($request->insta_username && !$socialLinks->instagram_password) {
        //             $rules['insta_password'] = 'required';
        //         }
        //         if ($request->youtube_username && !$socialLinks->youtube_password) {
        //             $rules['youtube_password'] = 'required';
        //         }
        //     } else {
        //         if ($request->fb_username) {
        //             $rules['fb_password'] = 'required';
        //         }
        //         if ($request->twitter_username) {
        //             $rules['twitter_password'] = 'required';
        //         }
        //         if ($request->insta_username) {
        //             $rules['insta_password'] = 'required';
        //         }
        //         if ($request->insta_username) {
        //             $rules['youtube_password'] = 'required';
        //         }
        //     }
        // }

        if ($request->collect_tax === "Yes") {
            $rules['tax_registration_no'] = 'required';
        }

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store

            if (Restaurant::where('restaurant_id', $request->restaurant_id)->exists()) {

                $restaurant = Restaurant::where('restaurant_id', $request->restaurant_id)->first();
                $restaurant->name = $request->name;
                $restaurant->phone = $request->phone;
                $restaurant->email = $request->email;
                $restaurant->country_id = $request->country;
                $restaurant->state_id = $request->state;
                $restaurant->city_id = $request->city;
                $restaurant->address = $request->address;
                $restaurant->save();

                //logo
                if ($request->hasFile('logo')) {
                    $path = base_path('media/restaurant/logos');

                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }

                    $image = $request->file('logo');
                    $filename = $image->getClientOriginalName();
                    $logoNameToStore = time() . "_" . $filename;
                    $image->move(base_path('\media\restaurant\logos'), $logoNameToStore);

                    if (RestaurantSettingsLogo::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->exists()) {
                        $logo = RestaurantSettingsLogo::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();
                        $logo->logo = $logoNameToStore;
                        $logo->save();
                    } else {
                        $logo = new RestaurantSettingsLogo();
                        $logo->logo = $logoNameToStore;
                        $logo->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                        $logo->user_id = Auth::guard('restaurantUser')->id();
                        $logo->save();
                    }
                }

                // return [$logo,$path];

                //tax
                if ($request->collect_tax === "Yes" || $request->collect_tax === "No") {
                    if ($request->collect_tax === "Yes") {
                        if (RestaurantSettingsTax::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->exists()) {
                            $tax = RestaurantSettingsTax::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();
                            $tax->collect_tax = $request->collect_tax;
                            $tax->reg_no = $request->tax_registration_no;
                            $tax->save();
                        } else {
                            $tax = new RestaurantSettingsTax();
                            $tax->collect_tax = $request->collect_tax;
                            $tax->reg_no = $request->tax_registration_no;
                            $tax->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                            $tax->user_id = Auth::guard('restaurantUser')->id();
                            $tax->save();
                        }

                        if (isset($request->taxes) && isset($request->rates)) {
                            RestaurantSettingsTaxField::where('tax_id', $tax->id)->delete();
                            for ($i = 0; $i < count($request->input('taxes')); $i++) {
                                $taxField = new RestaurantSettingsTaxField();
                                $taxField->tax_id = $tax->id;
                                $taxField->name = $request->taxes[$i];
                                $taxField->rate = $request->rates[$i];
                                $taxField->save();
                                //  return $taxField;
                            }
                        }
                    } else {
                        if (RestaurantSettingsTax::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->exists()) {
                            $tax = RestaurantSettingsTax::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();
                            $tax->collect_tax = $request->collect_tax;
                            $tax->reg_no = null;
                            $tax->save();
                        }

                        if (RestaurantSettingsTaxField::where('tax_id', $tax->id)->exists()) {
                            RestaurantSettingsTaxField::where('tax_id', $tax->id)->delete();
                        }
                    }
                }

                //social links
                if (isset($request->user_names) && isset($request->passwords) && isset($request->social_media)) {
                    RestaurantSettingsSocialLink::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->delete();

                    for ($i = 0; $i < count($request->input('social_media')); $i++) {
                        $socialLink = new RestaurantSettingsSocialLink;
                        $socialLink->social_media_id = $request->social_media[$i];
                        $socialLink->username = $request->user_names[$i];
                        $socialLink->password = str_rot13($request->passwords[$i]);
                        $socialLink->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                        $socialLink->user_id = Auth::guard('restaurantUser')->id();
                        $socialLink->save();
                    }
                }

                // if ($request->fb_username || $request->twitter_username || $request->insta_username || $request->youtube_username) {
                //     $socialLinks = RestaurantSettingsSocialLink::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();

                //     if ($socialLinks) {
                //         if ($request->fb_username && !$request->fb_password) {
                //             $socialLinks->facebook_username = $request->fb_username;
                //         } elseif ($request->fb_username && $request->fb_password) {
                //             $socialLinks->facebook_username = $request->fb_username;
                //             $socialLinks->facebook_password = bcrypt($request->fb_password);
                //         }

                //         if ($request->twitter_username && !$request->twitter_password) {
                //             $socialLinks->twitter_username = $request->twitter_username;
                //         } elseif ($request->twitter_username && $request->twitter_password) {
                //             $socialLinks->twitter_username = $request->twitter_username;
                //             $socialLinks->twitter_password = bcrypt($request->twitter_password);
                //         }

                //         if ($request->insta_username && !$request->insta_password) {
                //             $socialLinks->instagram_username = $request->insta_username;
                //         } elseif ($request->insta_username && $request->insta_password) {
                //             $socialLinks->instagram_username = $request->insta_username;
                //             $socialLinks->instagram_password = bcrypt($request->insta_password);
                //         }

                //         if ($request->youtube_username && !$request->youtube_password) {
                //             $socialLinks->youtube_username = $request->youtube_username;
                //         } elseif ($request->youtube_username && $request->youtube_password) {
                //             $socialLinks->youtube_username = $request->youtube_username;
                //             $socialLinks->youtube_password = bcrypt($request->youtube_password);
                //         }

                //         $socialLinks->save();
                //     } else {
                //         $newSocialLinks = new RestaurantSettingsSocialLink();

                //         if ($request->fb_username && $request->fb_password) {
                //             $newSocialLinks->facebook_username = $request->fb_username;
                //             $newSocialLinks->facebook_password = bcrypt($request->fb_password);
                //         }

                //         if ($request->twitter_username && $request->twitter_password) {
                //             $newSocialLinks->twitter_username = $request->twitter_username;
                //             $newSocialLinks->twitter_password = bcrypt($request->twitter_password);
                //         }

                //         if ($request->insta_username && $request->insta_password) {
                //             $newSocialLinks->instagram_username = $request->insta_username;
                //             $newSocialLinks->instagram_password = bcrypt($request->insta_password);
                //         }

                //         if ($request->youtube_username && $request->youtube_password) {
                //             $newSocialLinks->youtube_username = $request->youtube_username;
                //             $newSocialLinks->youtube_password = bcrypt($request->youtube_password);
                //         }


                //         $newSocialLinks->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                //         $newSocialLinks->user_id = Auth::guard('restaurantUser')->id();
                //         $newSocialLinks->save();
                //     }
                // }

                toastr()->success('Updated successfully');
                // redirect
                return redirect()->back();
            } else {
                toastr()->error('Invalid restaurant found');
                // redirect
                return redirect()->back();
            }
        }
    }

    //add third party vendors
    public function addThirdPartyVendor(Request $request){
        // return $request->all();

        if (isset($request->third_party_vendors)) {
            $restaurantThirdPartyVendors = RestaurantSettingsThirdPartyVendor::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->get();

            for ($i = 0; $i < count($request->third_party_vendors); $i++) {

                //check for availability
                $status = false;

                foreach ($restaurantThirdPartyVendors as $key => $restaurantThirdPartyVendor) {
                    if ($restaurantThirdPartyVendor->third_party_vendors_id == $request->third_party_vendors[$i]) {
                        $status = true;
                        
                    }
                }

                if ($status == false) {
                    $socialLink = new RestaurantSettingsThirdPartyVendor;
                    $socialLink->third_party_vendors_id = $request->third_party_vendors[$i];
                    $socialLink->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                    $socialLink->user_id = Auth::guard('restaurantUser')->id();
                    $socialLink->save();
                }

            }
        }

        return response()->json(['success'=> 'created successfully'], 200);


    }

    //change-third-party-vendor-availability-by-ajax
    public function changeThirdPartyVendorAvailabilityByAjax(Request $request){

        // return $request->all();
        $restaurant_third_party_vendor_id = $request->restaurant_third_party_vendor_id;
        $availability = $request->availability;
        $restaurantThirdPartyVendor = RestaurantSettingsThirdPartyVendor::where('id', $restaurant_third_party_vendor_id)->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->first();

        if ($availability == 'Yes') {
            $restaurantThirdPartyVendor->availability = 'No';
        } else {
            $restaurantThirdPartyVendor->availability = 'Yes';
        }

        $restaurantThirdPartyVendor->save();
        return response()->json($restaurantThirdPartyVendor);

    }

    //add Cuisine

    public function addCuisine(Request $request){
        //return $request->all();

        if (isset($request->cuisines)) {
            RestaurantSettingsCuisine::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->delete();
            for ($i = 0; $i < count($request->cuisines); $i++) {
                $restaurantCuisine = new RestaurantSettingsCuisine;
                $restaurantCuisine->cuisine_id = $request->cuisines[$i];
                $restaurantCuisine->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $restaurantCuisine->user_id = Auth::guard('restaurantUser')->id();
                $restaurantCuisine->save();
            }
        }

        return response()->json(['success'=> 'Added successfully'], 200);


    }



}
