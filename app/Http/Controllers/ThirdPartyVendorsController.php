<?php

namespace App\Http\Controllers;

use App\Country;
use App\ThirdPartyVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ThirdPartyVendorsController extends Controller
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
        $thirdPartyVendors= ThirdPartyVendor::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.thirdPartyVendor.index', compact('thirdPartyVendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.thirdPartyVendor.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $rules = array(
            'name' => 'required',
            'email' => 'required|email:rfc,dns,strict',
            'phone' => 'required',
        );

        $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
        $request->phone ? $rules['phone'] = 'required' : '';
        $request->percentage_charge ? $rules['percentage_charge'] = 'required' : '';
        $request->collect_tax ? $rules['collect_tax'] = 'required' : '';
        $request->address ? $rules['address'] = 'required' : '';
        $request->country ? $rules['country'] = 'required|numeric' : '';
        $request->state ? $rules['state'] = 'required|numeric' : '';
        $request->city ? $rules['city'] = 'required|numeric' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('third-party-vendors.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $thirdPartyVendor = new ThirdPartyVendor;
            $thirdPartyVendor->name = $request->name;
            $thirdPartyVendor->phone = $request->phone;
            $thirdPartyVendor->email = $request->email;
            $thirdPartyVendor->percentage_charge = $request->percentage_charge;
            $thirdPartyVendor->collect_tax = $request->collect_tax;
            $thirdPartyVendor->address = $request->address;
            $thirdPartyVendor->country_id = $request->country;
            $thirdPartyVendor->state_id = $request->state;
            $thirdPartyVendor->city_id = $request->city;

            // return $thirdPartyVendor;
            $thirdPartyVendor->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('third-party-vendors.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $thirdPartyVendor = ThirdPartyVendor::find($id);
        return view('pages.superAdmin.settings.thirdPartyVendor.edit', compact('countries', 'thirdPartyVendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $rules = array(
            'name' => 'required',
            'email' => 'required|email:rfc,dns,strict',
            'phone' => 'required',
        );

        $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
        $request->phone ? $rules['phone'] = 'required' : '';
        $request->percentage_charge ? $rules['percentage_charge'] = 'required' : '';
        $request->collect_tax ? $rules['collect_tax'] = 'required' : '';
        $request->address ? $rules['address'] = 'required' : '';
        $request->country ? $rules['country'] = 'required|numeric' : '';
        $request->state ? $rules['state'] = 'required|numeric' : '';
        $request->city ? $rules['city'] = 'required|numeric' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('third-party-vendors.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $thirdPartyVendor = ThirdPartyVendor::find($id);
            $thirdPartyVendor->name = $request->name;
            $thirdPartyVendor->phone = $request->phone;
            $thirdPartyVendor->email = $request->email;
            $thirdPartyVendor->percentage_charge = $request->percentage_charge;
            $thirdPartyVendor->collect_tax = $request->collect_tax;
            $thirdPartyVendor->address = $request->address;
            $thirdPartyVendor->country_id = $request->country;
            $thirdPartyVendor->state_id = $request->state;
            $thirdPartyVendor->city_id = $request->city;

            // return $thirdPartyVendor;
            $thirdPartyVendor->save();

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('third-party-vendors.index');
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
        $thirdPartyVendor = ThirdPartyVendor::find($id);
        if ($thirdPartyVendor) {
            $thirdPartyVendor = ThirdPartyVendor::find($id);
            $thirdPartyVendor->del_status = "Deleted";
            $thirdPartyVendor->save();


            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('third-party-vendors.index');
        }
    }
}
