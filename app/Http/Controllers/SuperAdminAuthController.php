<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function showLoginForm()
    {
        return view('pages.superAdmin.login');
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
            'username_email_phone' => 'required',
            'password' => 'required'
        ]);

        $credentialsType1 = ['user_name' => $request->username_email_phone, 'password' => $request->password];
        $credentialsType2 = ['email' => $request->username_email_phone, 'password' => $request->password];
        $credentialsType3 = ['phone_number' => $request->username_email_phone, 'password' => $request->password];

        if (Auth::guard('superAdmin')->attempt($credentialsType1)) {
            toastr()->success('Login success.');
            return redirect()->route('superAdmin.dashboard');
        } elseif (Auth::guard('superAdmin')->attempt($credentialsType2)) {
            toastr()->success('Login success.');
            return redirect()->route('superAdmin.dashboard');
        } elseif (Auth::guard('superAdmin')->attempt($credentialsType3)) {
            toastr()->success('Login success.');
            return redirect()->route('superAdmin.dashboard');
        } else {
            toastr()->error('Invalid credentials!');
            return redirect()->route('superAdmin.showLoginForm')->withInput();
        }
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::guard('superAdmin')->logout();

        toastr()->success('Logout successfully.');
        return redirect()->route('superAdmin.showLoginForm');
    }
}
