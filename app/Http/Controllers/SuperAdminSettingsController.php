<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminSettingsController extends Controller
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
    public function index()
    {
        return view('pages.superAdmin.settings.index');
    }

    
}
