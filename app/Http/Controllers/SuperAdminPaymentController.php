<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }
    public function payment(){
       
        return view('pages.superAdmin.payment');
    }
    Public function addPayment(){
        return view('pages.superAdmin.add-payment');
      
    }

    Public function report(){
        return view('pages.superAdmin.report');
       
    }

    
}
