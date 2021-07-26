<?php

namespace App\Http\Controllers;

use App\Classes\Sms;
use App\Country;
use App\Mail\MessageByMail;
use App\Restaurant;
use App\RestaurantCustomer;
use App\RestaurantCustomerGroup;
use App\RestaurantSupplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Mail;

class RestaurantCustomersController extends Controller
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
    public function index(Request $request)
    {

        // return url()->current();
        if ($request->ajax()) {
            # code...
            $customers = RestaurantCustomer::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            return Datatables::of($customers)
                ->addIndexColumn()
                ->addColumn('action', function ($customer) {

                    $btn = '<div class="btn-group">
                                        <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-offset="-185,-75">
                                            <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <a class="dropdown-item edit-link" role="button"
                                            href="' . url()->current() . '/' . $customer->id . '/edit">Edit</a> |
                                            <a class="dropdown-item delete-customer" role="button" data-id="' . $customer->id . '">Delete</a> |
                                            <a class="dropdown-item edit-link" role="button"
                                            href="#">Show History</a>
                                        </div>
                                    </div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('pages.restaurant.sale.customer.index');

        // return view('pages.restaurant.sale.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $customerGroups = RestaurantCustomerGroup::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('del_status', 'Live')
            ->orderBy('discount_percentage', 'asc')
            ->orderBy('updated_at', 'desc')
            ->get();
        return view('pages.restaurant.sale.customer.create', compact('countries', 'customerGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $rules = array(
            'name' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zip' => 'required',
        );

        $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
        //$request->address ? $rules['address'] = 'required' : '';
        //$request->apt ? $rules['apt'] = 'required' : '';
        //$request->note ? $rules['note'] = 'required' : '';
        //$request->country ? $rules['country'] = 'required|numeric' : '';
        //$request->state ? $rules['state'] = 'required' : '';
        //$request->city ? $rules['city'] = 'required' : '';
        //$request->zip ? $rules['zip'] = 'required' : '';
        //$request->code ? $rules['code'] = 'required' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('customers.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $customer = new RestaurantCustomer();
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->address = $request->address;
            $customer->apt = $request->apt;
            $customer->country_id = $request->country;
            $customer->state_id = $request->state;
            $customer->city_id = $request->city;
            $customer->note = $request->note;
            $customer->zip = $request->zip;
            $customer->code = $request->code;
            $customer->customer_group_id = $request->customer_group;
            $customer->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $customer->user_id = Auth::guard('restaurantUser')->id();
            //return $customer;
            $customer->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('customers.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantCustomer::find($id)->user_id) {
            $customer = RestaurantCustomer::find($id);
            $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $customerGroups = RestaurantCustomerGroup::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                ->where('del_status', 'Live')
                ->orderBy('discount_percentage', 'asc')
                ->orderBy('updated_at', 'desc')
                ->get();

            return view('pages.restaurant.sale.customer.edit', compact('customer', 'countries', 'customerGroups'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('customers.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantCustomer::find($id)->user_id) {
            $rules = array(
                'name' => 'required',
                'phone' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zip' => 'required'
            );

            $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
            $request->address ? $rules['address'] = 'required' : '';
            $request->apt ? $rules['apt'] = 'required' : '';
            $request->note ? $rules['note'] = 'required' : '';
            //$request->country ? $rules['country'] = 'required|numeric' : '';
            //$request->state ? $rules['state'] = 'required|numeric' : '';
            //$request->city ? $rules['city'] = 'required|numeric' : '';
            //$request->zip ? $rules['zip'] = 'required' : '';
            $request->code ? $rules['code'] = 'required' : '';

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $customer = RestaurantCustomer::find($id);
                $customer->name = $request->name;
                $customer->phone = $request->phone;
                $customer->email = $request->email;
                $customer->address = $request->address;
                $customer->apt = $request->apt;
                $customer->country_id = $request->country;
                $customer->state_id = $request->state;
                $customer->city_id = $request->city;
                $customer->note = $request->note;
                $customer->zip = $request->zip;
                $customer->code = $request->code;
                $customer->customer_group_id = $request->customer_group;
                $customer->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $customer->user_id = Auth::guard('restaurantUser')->id();
                $customer->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('customers.index');
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('customers.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantCustomer::find($id)->user_id) {
            $customer = RestaurantCustomer::find($id);
            if ($customer) {
                $customer = RestaurantCustomer::find($id);
                $customer->del_status = "Deleted";
                $customer->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('customers.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('customers.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('customers.index');
        }
    }

    /**
     * send tet/mail to multiple customer
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendTextMail(Request $request)
    {


        //return $request->all();
        $customers_id   = $request->customers_id;
        $message        = $request->message;
        $text_email     = $request->text_email;
        //return $text_email;//json_encode($request->text_email);
        $customers = $customers_id;
        $errors = [];

        foreach ($customers_id as $key => $customer_id) {
            $customer = RestaurantCustomer::select('phone', 'email', 'name')->where('id', $customer_id)->where('del_status', 'Live')->first();
            if ($customer) {
                $customer['message'] = $message;

                foreach ($text_email as $key => $messageBy) {
                    if ($messageBy == 'email') {
                        # code...
                        Mail::to($customer->email)->send(new MessageByMail($customer));
                    }
                    if ($messageBy == 'sms') {
                        $sms = new Sms;
                        $client = $sms->twilioClient();
                        try {
                            // Use the client to do fun stuff like send text messages!
                            $client->messages->create($customer->phone, array('from' => Sms::PHONE_NUMBER, 'body' => $message));
                        } catch (Exception $e) {
                            $errors[] = $e->getMessage();
                        }
                    }
                }
            }
        }

        return ['success' => 'message succefully send', 'errors' => $errors, 'customers' => $customers, 'message' => $message];
    }

    /**
     * Add customer by ajax.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addCustomerByAjax(Request $request)
    {

        if ($request->customer_id) {
            # code...
            $customer = RestaurantCustomer::find($request->customer_id);
            $customer->name = $request->customer_name;
            $customer->phone = $request->customer_phone;
            $customer->email = $request->customer_email;
            $customer->address = $request->customer_delivery_address;
            $customer->apt = $request->customer_apt;
            $customer->country_id = $request->customer_country;
            $customer->state_id = $request->customer_state;
            $customer->city_id = $request->customer_city;
            $customer->note = $request->customer_note;
            $customer->zip = $request->customer_zip;
            $customer->code = $request->customer_code;
            $customer->customer_group_id = $request->customer_group;
            $customer->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $customer->user_id = Auth::guard('restaurantUser')->id();
            $customer->save();
        } else {
            # code...
            // store
            $customer = new RestaurantCustomer();
            $customer->name = $request->customer_name;
            $customer->phone = $request->customer_phone;
            $customer->email = $request->customer_email;
            $customer->address = $request->customer_delivery_address;
            $customer->apt = $request->customer_apt;
            $customer->country_id = $request->customer_country;
            $customer->state_id = $request->customer_state;
            $customer->city_id = $request->customer_city;
            $customer->note = $request->customer_note;
            $customer->zip = $request->customer_zip;
            $customer->code = $request->customer_code;
            $customer->customer_group_id = $request->customer_group;
            $customer->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $customer->user_id = Auth::guard('restaurantUser')->id();
            $customer->save();
        }


        return response()->json([$customer]);
    }

    /**
     * get all customer by ajax.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getAllCustomerByAjax()
    {
        $customers = RestaurantCustomer::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return response()->json($customers);
    }

    /**
     * getcustomer by ajax.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getCustomerByAjax(Request $request)
    {
        $customer = RestaurantCustomer::where('id', $request->customer_id)->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->first();

        return response()->json(['customer' => $customer]);
    }
}
