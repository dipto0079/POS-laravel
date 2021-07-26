<?php

namespace App\Http\Controllers;

use App\RestaurantCustomerGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RestaurantCustomerGroupController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerGroups = RestaurantCustomerGroup::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                    ->where('del_status', 'Live')
                                                    ->orderBy('discount_percentage', 'asc')
                                                    ->orderBy('updated_at', 'desc')
                                                    ->get();
        return view('pages.restaurant.sale.customerGroup.index', compact('customerGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.sale.customerGroup.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $rules = array(
            'name' => 'required',
            'discount_percentage' => 'required|numeric'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('customer-groups.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $customerGroup = new RestaurantCustomerGroup;
            $customerGroup->name = $request->name;
            $customerGroup->discount_percentage = $request->discount_percentage;
            $customerGroup->description = $request->description;
            $customerGroup->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $customerGroup->user_id = Auth::guard('restaurantUser')->id();
            $customerGroup->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('customer-groups.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantCustomerGroup::find($id)->user_id) {
            $customerGroup = RestaurantCustomerGroup::find($id);
            return view('pages.restaurant.sale.customerGroup.show', compact('customerGroup'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('customer-groups.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if (Auth::guard('restaurantUser')->id() == RestaurantCustomerGroup::find($id)->user_id) {
            $customerGroup = RestaurantCustomerGroup::find($id);
            return view('pages.restaurant.sale.customerGroup.edit', compact('customerGroup'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('customer-groups.index');
        }
        
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
        if (Auth::guard('restaurantUser')->id() == RestaurantCustomerGroup::find($id)->user_id) {
            $rules = array(
                'name' => 'required',
                'discount_percentage' => 'required|numeric'
            );

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $customerGroup = RestaurantCustomerGroup::find($id);
                $customerGroup->name = $request->name;
                $customerGroup->discount_percentage = $request->discount_percentage;
                $customerGroup->description = $request->description;
                $customerGroup->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $customerGroup->user_id = Auth::guard('restaurantUser')->id();
                $customerGroup->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('customer-groups.index');
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('customer-groups.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantCustomerGroup::find($id)->user_id) {
            $customerGroup = RestaurantCustomerGroup::find($id);
            if ($customerGroup) {
                $customerGroup = RestaurantCustomerGroup::find($id);
                $customerGroup->del_status = "Deleted";
                $customerGroup->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('customer-groups.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('customer-groups.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('customer-groups.index');
        }
    }
}
