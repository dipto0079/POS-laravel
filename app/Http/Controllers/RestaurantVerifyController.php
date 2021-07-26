<?php

namespace App\Http\Controllers;

use App\RestaurantUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RestaurantVerifyController extends Controller
{
    public function restaurantVerifyEmail($token = null)
    {
        if ($token == null) {
            toastr()->error('Invalid Login attempt.');
            return redirect()->route('restaurant.showLoginForm');
        }

        $restaurant = RestaurantUser::where('email_verification_token', $token)->first();

        if ($restaurant == null) {
            toastr()->error('No restaurant is associated with this email.');
            return redirect()->route('restaurant.showLoginForm');
        } else {
            $statusMsg = null;
            if ($restaurant->email_verified) {
                $statusMsg = "Already been verified successfully. Wait for the admin approval.";
            } else {
                $restaurant->email_verified = true;
                $restaurant->email_verified_at = Carbon::now();
                $restaurant->save();

                $statusMsg = "Verified successfully. Wait for the admin approval.";
            }

            toastr()->success($statusMsg);
            return redirect()->route('restaurant.showLoginForm');
        }
    }
}
