<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
        auth()->setDefaultDriver('customer');
    }

    public function detailOfAddress(Request $request){
        //return response()->json($request->all());
        $address_id = $request->address_id;
        $customerAddress = CustomerAddress::where('id', $address_id)->where('customer_id', Auth::guard('customer')->id())->where('del_status', 'Live')->first();
        if ($customerAddress) {
            
            return response()->json(['customer_address'=>$customerAddress]);
        }else {
            return response()->json(['error'=> 'Something Happend Wrong']);
        }



    }

    public function storeAddress(Request $request){
        //return $request->all();

        $rules = array(
            'country' => 'required|numeric',
            'state' => 'required|numeric',
            'city' => 'required|numeric',
            'address' => 'required'
        );

        $request->address ? $rules['address'] = 'required' : '';
        $request->apt ? $rules['apt'] = 'required' : '';
        $request->note ? $rules['note'] = 'required' : '';
        $request->country ? $rules['country'] = 'required|numeric' : '';
        $request->state ? $rules['state'] = 'required|numeric' : '';
        $request->city ? $rules['city'] = 'required|numeric' : '';
        $request->zip ? $rules['zip'] = 'required' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $customer = Customer::with('addresses')->where('id', Auth::guard('customer')->id())->where('del_status', 'Live')->first();
            $customerAddress = new CustomerAddress;
            $customerAddress->address = $request->address;
            $customerAddress->apt = $request->apt;
            $customerAddress->zip = $request->zip;
            $customerAddress->country_id = $request->country;
            $customerAddress->state_id = $request->state;
            $customerAddress->city_id = $request->city;
            $customerAddress->note = $request->note;

            if ($request->default_address == true) {
                //for set other address not default
                if ($customer->addresses) {
                    foreach ($customer->addresses as $key => $address) {
                        $address->default_address = false;
                        $address->save();
                    }
                }
                //for set this address default
                $customerAddress->default_address = $request->default_address;
            } else {
                //for set this address not default
                $customerAddress->default_address = false;
            }
            
            $customerAddress->customer_id = Auth::guard('customer')->id();
            $customerAddress->save();
            //return $customerAddress;

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('customer.profile');
        }
    }

    public function updateAddress(Request $request){
        //return $request->all();

        $rules = array(
            'zip' => 'required',
            'apt' => 'required',
            'address' => 'required'
        );

        $request->address ? $rules['address'] = 'required' : '';
        $request->apt ? $rules['apt'] = 'required' : '';
        $request->note ? $rules['note'] = 'required' : '';
        $request->country ? $rules['country'] = 'required|numeric' : '';
        $request->state ? $rules['state'] = 'required|numeric' : '';
        $request->city ? $rules['city'] = 'required|numeric' : '';
        $request->zip ? $rules['zip'] = 'required' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $customer = Customer::with('addresses')->where('id', Auth::guard('customer')->id())->where('del_status', 'Live')->first();
            $customerAddress = CustomerAddress::where('id', $request->address_id)->where('customer_id', $customer->id)->first();
            $customerAddress->address = $request->address;
            $customerAddress->apt = $request->apt;
            $customerAddress->zip = $request->zip;
            $customerAddress->country_id = $request->country;
            $customerAddress->state_id = $request->state;
            $customerAddress->city_id = $request->city;
            $customerAddress->note = $request->note;

            if ($request->default_address == true) {
                //for set other address not default
                if ($customer->addresses) {
                    foreach ($customer->addresses as $key => $address) {
                        $address->default_address = false;
                        $address->save();
                    }
                }
                //for set this address default
                $customerAddress->default_address = $request->default_address;
            } else {
                //for set this address not default
                $customerAddress->default_address = false;
            }
            
            $customerAddress->save();
            //return $customerAddress;

            return response()->json($customerAddress);
        }
    }

    public function deleteAddress(Request $request){
        //return response()->json($request->all());
        $address_id = $request->address_id;
        $customerAddress = CustomerAddress::where('id', $address_id)->where('customer_id', Auth::guard('customer')->id())->where('del_status', 'Live')->first();
        if ($customerAddress) {
            if ($customerAddress->default_address != true) {
                # code...
                $customerAddress->del_status = 'Deleted';
                $customerAddress->save();
            } else {
                return response()->json(['error'=> 'This is your Default address. Please Change it First!']);
            }
            

            return response()->json(['success'=>'Successfully Deleted', 'customer_address'=>$customerAddress]);
        }else {
            return response()->json(['error'=> 'Something Happend Wrong']);
        }



    }

}
