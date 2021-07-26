<?php

namespace App\Http\Controllers;

use App\Country;
use App\Restaurant;
use App\RestaurantCategoryForSupplier;
use App\RestaurantIngredientCategory;
use App\RestaurantSupplier;
use App\RestaurantPurchase;
use App\RestaurantIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class RestaurantSuppliersController extends Controller
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

        $suppliers = RestaurantSupplier::with('categories:id,name')
            ->join('tbl_cities', 'tbl_restaurant_suppliers.city_id', '=', 'tbl_cities.id')
            ->join('tbl_states', 'tbl_restaurant_suppliers.state_id', '=', 'tbl_states.id')
            ->where('tbl_restaurant_suppliers.restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->where('tbl_restaurant_suppliers.del_status', 'Live')
            ->orderBy('tbl_restaurant_suppliers.updated_at', 'desc')
            ->select('tbl_restaurant_suppliers.*', 'tbl_cities.name as city', 'tbl_states.name as state')->get();

        // $suppliers = DB::table('tbl_restaurant_suppliers')
        // ->join('tbl_cities', 'tbl_restaurant_suppliers.city_id', '=', 'tbl_cities.id')
        // ->join('tbl_states', 'tbl_restaurant_suppliers.state_id', '=', 'tbl_states.id')
        // ->where('tbl_restaurant_suppliers.restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
        // ->where('tbl_restaurant_suppliers.del_status', 'Live')
        // ->orderBy('tbl_restaurant_suppliers.updated_at', 'desc')
        // ->select('tbl_restaurant_suppliers.*','tbl_cities.name as city','tbl_states.name as state')->get();


        $text = DB::table('tbl_supplier_add_email_template')->get();
        return view('pages.restaurant.purchase.supplier.index', compact('suppliers', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.purchase.supplier.create', compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = array(
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'country' => 'required|numeric',
            'state' => 'required|numeric',
            'city' => 'required|numeric',
            'due_date' => 'required|numeric',
            'category' => 'required',
            'order_method' => 'required'
        );

        $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
        $request->fax ? $rules['fax'] = 'required' : '';
        $request->bank_name ? $rules['bank_name'] = 'required|regex:/^[\pL\s\-]+$/u' : '';
        $request->account_number ? $rules['account_number'] = 'required|numeric' : '';
        $request->routing_number ? $rules['routing_number'] = 'required|numeric' : '';
        $request->due_date ? $rules['due_date'] = 'required|numeric' : '';
        $request->zip ? $rules['zip'] = 'required' : '';
        $request->address ? $rules['address'] = 'required' : '';
        $request->description ? $rules['description'] = 'required' : '';
        // $request->category ? $rules['category'] = 'required|numeric' : '';
        $request->order_method ? $rules['order_method'] = 'required' : '';

        $request->country ? $rules['country'] = 'required|numeric' : '';
        $request->state ? $rules['state'] = 'required|numeric' : '';
        $request->city ? $rules['city'] = 'required|numeric' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('suppliers.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $category = RestaurantIngredientCategory::find($request->category);

            if ($category) {
                $supplier = new RestaurantSupplier();
                $supplier->name = $request->name;
                $supplier->contact_person = $request->contact_person;
                $supplier->phone = $request->phone;
                $supplier->email = $request->email;
                $supplier->due_date = $request->due_date;
                $supplier->fax = $request->fax;
                $supplier->bank_name = $request->bank_name;
                $supplier->account_number = $request->account_number;
                $supplier->routing_number = $request->routing_number;
                $supplier->zip = $request->zip;

                $supplier->address = $request->address;
                $supplier->description = $request->description;
                // $supplier->category_id = $request->category;

                $supplier->country_id = $request->country;
                $supplier->state_id = $request->state;
                $supplier->city_id = $request->city;

                $supplier->order_method = json_encode($request->order_method);
                $supplier->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $supplier->user_id = Auth::guard('restaurantUser')->id();
                $supplier->save();

                if (is_countable($request->input('category'))) {
                    for ($i = 0; $i < count($request->input('category')); $i++) {
                        $supplier_category = new RestaurantCategoryForSupplier;
                        $supplier_category->category_id = $request->category[$i];
                        $supplier_category->supplier_id = $supplier->id;
                        $supplier_category->save();
                    }
                }

                toastr()->success('Added successfully.');
                // redirect
                return redirect()->route('suppliers.index');
            } else {
                toastr()->error('Invalid category found.');
                return redirect()->route('suppliers.create');
            }
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
        if (Auth::guard('restaurant')->id() === RestaurantSupplier::find($id)->created_by) {
            $supplier = RestaurantSupplier::where('id', $id)
                ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
                ->first();

            $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();


            return view('pages.restaurant.purchase.supplier.edit', compact('supplier', 'categories', 'countries'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('suppliers.index');
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
        // return $request->all();
        if (Auth::guard('restaurant')->id() === RestaurantSupplier::find($id)->created_by) {
            $rules = array(
                'name' => 'required',
                'contact_person' => 'required',
                'phone' => 'required',
                'country' => 'required|numeric',
                'due_date' => 'required|numeric',
                'state' => 'required|numeric',
                'city' => 'required|numeric',
                'category' => 'required',
                'order_method' => 'required'
            );

            $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
            $request->fax ? $rules['fax'] = 'required' : '';
            $request->bank_name ? $rules['bank_name'] = 'required|regex:/^[\pL\s\-]+$/u' : '';
            $request->account_number ? $rules['account_number'] = 'required|numeric' : '';
            $request->routing_number ? $rules['routing_number'] = 'required|numeric' : '';
            $request->due_date ? $rules['due_date'] = 'required|numeric' : '';
            $request->address ? $rules['address'] = 'required' : '';
            $request->description ? $rules['description'] = 'required' : '';
            // $request->category_id ? $rules['category_id'] = 'required' : '';
            $request->order_method ? $rules['order_method'] = 'required' : '';
            $request->zip ? $rules['zip'] = 'required' : '';


            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $category = RestaurantIngredientCategory::find($request->category);

                if ($category) {
                    $supplier = RestaurantSupplier::find($id);
                    $supplier->name = $request->name;
                    $supplier->contact_person = $request->contact_person;
                    $supplier->phone = $request->phone;
                    $supplier->email = $request->email;
                    $supplier->due_date = $request->due_date;
                    $supplier->fax = $request->fax;
                    $supplier->bank_name = $request->bank_name;
                    $supplier->account_number = $request->account_number;
                    $supplier->routing_number = $request->routing_number;
                    $supplier->address = $request->address;
                    $supplier->description = $request->description;
                    // $supplier->category_id = $request->category;

                    $supplier->zip = $request->zip;

                    $supplier->country_id = $request->country;
                    $supplier->state_id = $request->state;
                    $supplier->city_id = $request->city;


                    $supplier->order_method = json_encode($request->order_method);
                    $supplier->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                    $supplier->user_id = Auth::guard('restaurantUser')->id();
                    $supplier->save();

                    if (is_countable($request->input('category'))) {
                        if (RestaurantCategoryForSupplier::where('supplier_id', $supplier->id)->get()) {
                            RestaurantCategoryForSupplier::where('supplier_id', $supplier->id)->delete();
                        }
                        for ($i = 0; $i < count($request->input('category')); $i++) {
                            $menu_shift = new RestaurantCategoryForSupplier;
                            $menu_shift->category_id = $request->category[$i];
                            $menu_shift->supplier_id = $supplier->id;
                            $menu_shift->save();
                        }
                    }

                    toastr()->success('Updated successfully.');
                    // redirect
                    return redirect()->route('suppliers.index');
                } else {
                    toastr()->error('Invalid category found.');
                    return redirect()->back();
                }
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('suppliers.index');
        }
    }

    /**
     * send tet/mail to multiple supplier
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendTextMail(Request $request)
    {

        $suppliers_id = $request->suppliers_id;
        $message = $request->message;

        return ['success' => $suppliers_id, 'message' => $message];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurant')->id() === RestaurantSupplier::find($id)->created_by) {
            $supplier = RestaurantSupplier::find($id);
            if ($supplier) {
                $supplier = RestaurantSupplier::find($id);
                $supplier->del_status = "Deleted";
                $supplier->save();

                RestaurantCategoryForSupplier::where('supplier_id', $supplier->id)->update(['del_status' => 'Deleted']);


                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('suppliers.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('suppliers.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('suppliers.index');
        }
    }


    public function detailsAll($id)
    {

        $res_id = Auth::guard('restaurant')->id();
        $supplier = RestaurantSupplier::where('id', $id)
            ->first();

        
        // $supplier = RestaurantSupplier::where('id', $id)
        //                                     ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
        //                                     ->first();

        // $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')
        //     ->user()->restaurant_id)->where('del_status', 'Live')
        //     ->orderBy('updated_at', 'desc')->get();

        $purchases = RestaurantPurchase::where('supplier_id', $id)
            ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
            ->get();


        //  $purchases = RestaurantPurchase::where('supplier_id', $id)
        //      ->join('tbl_restaurant_ingredients','tbl_restaurant_purchases.restaurant_id','tbl_restaurant_ingredients.restaurant_id')
        //      ->select('tbl_restaurant_purchases.*','tbl_restaurant_ingredients.name as food')
        //      ->where('tbl_restaurant_purchases.restaurant_id', Auth::guard('restaurantUser')
        //      ->user()->restaurant_id)->where('tbl_restaurant_purchases.del_status', 'Live')
        //      ->get();

            

            $total_paid = RestaurantPurchase::where('supplier_id', $id)
            ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
            ->sum('paid');

            $total_due = RestaurantPurchase::where('supplier_id', $id)
            ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
            ->sum('due');

            $grand_total = RestaurantPurchase::where('supplier_id', $id)
            ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
            ->sum('grand_total');

            $sub_total = RestaurantPurchase::where('supplier_id', $id)
            ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
            ->sum('subtotal');

        return view('pages.restaurant.purchase.supplier.details', compact('supplier', 'purchases','total_paid','total_due','grand_total','sub_total'));



        //return view('pages.restaurant.purchase.supplier.details');

    }

    public function supplierdelete($id)
    {
        //dd('asce');
        $delete=DB::table('tbl_restaurant_purchases')->where('id',$id)->delete();
        if ($delete) {
            toastr()->success('Deleted successfully.');
            return redirect()->back();
        } else {
            toastr()->error('Unable to delete.');
            return redirect()->back();
        }

    }

    public function supplier_food($id)
    {
         $ingredient = DB::table('tbl_restaurant_purchases')
             ->join('tbl_restaurant_purchase_ingredients','tbl_restaurant_purchases.id','=','tbl_restaurant_purchase_ingredients.purchase_id')
             ->join('tbl_restaurant_ingredients','tbl_restaurant_purchase_ingredients.ingredient_id','=','tbl_restaurant_ingredients.id')
             ->select('tbl_restaurant_purchases.*','tbl_restaurant_purchase_ingredients.*','tbl_restaurant_ingredients.name')
             ->where('tbl_restaurant_purchases.id',$id)
            ->where('tbl_restaurant_purchases.del_status', '=', 'Live')
            ->get();

            return response()->json($ingredient);
            // echo json_encode($packeges);

            // return view('pages.restaurant.purchase.supplier.details', compact('ingredient'));

    }

    public function EmailTemplate()
    {
        $all_email = DB::table('tbl_supplier_add_email_template')
            ->get();
        return view('pages.restaurant.supplier.add_email_template', compact('all_email'));
    }

    public function AddEmailTemplate(Request $request)
    {
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'template_name' => $request->template_name,
            'template_body' => $request->template_body,
            'date' => $request->date,
            'restaurant_id' => $add_by,
        );
        DB::table('tbl_supplier_add_email_template')->insert($data);
        return redirect('restaurant/purchase/suppliers');
    }

    public function deletemail($id)
    {
        DB::table('tbl_supplier_add_email_template')
            ->where('id', $id)->delete();
        return back();
    }

    public function editemail($id)
    {
        $e_email = DB::table('tbl_supplier_add_email_template')
            ->where('id', $id)
            ->first();
        return view('pages.restaurant.supplier.edit_email_template', compact('e_email'));
    }

    public function updatemail(Request $request)
    {
        $id = $request->id;
        $data = array(
            'template_name' => $request->template_name,
            'template_body' => $request->template_body,
            'date' => $request->date,
        );
        DB::table('tbl_supplier_add_email_template')
            ->where('id', $id)
            ->update($data);
        return redirect('restaurant/purchase/add_template');
    }

    public function paymentgateway(){

        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $all_data = DB::table('tbl_payment_gateway')->where('restaurant_id', '=', $add_by)->count();

        if($all_data != false)
        {
            $alldata = DB::table('tbl_payment_gateway')
                ->where('restaurant_id', '=', $add_by)
                ->first();
            return view('pages.restaurant.payment_gateway.payment_gateway',compact('alldata'));
        }
        else
        {
            $new = array(
                'restaurant_id' => $add_by,
            );
            DB::table('tbl_payment_gateway')->insert($new);

            $alldata = DB::table('tbl_payment_gateway')
                ->where('restaurant_id', '=', $add_by)
                ->first();
            return view('pages.restaurant.payment_gateway.payment_gateway',compact('alldata'));
        }
    }
    public function addpaymentgateway(Request $request){
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'usb' => $request->usb,
            'paypal_username' => $request->paypal_username,
            'paypal_password' =>$request->paypal_password,
            'paypal_sinature' => $request->paypal_sinature,
            'paypal_email' => $request->paypal_email,
            'stripe_secret' => $request->stripe_secret,
            'payumoney_key' => $request->payumoney_key,
            'payumoney_salt' => $request->payumoney_salt,
            'paystack_secret_key' => $request->paystack_secret_key,
            'rezorpay_key_id' => $request->rezorpay_key_id,
            'rezorpay_key_secret' => $request->rezorpay_key_secret,
            //'created_at' => date('y-m-d'),
            //'updated_at' => $request->updated_at,

            'restaurant_id' => $add_by,
        );
        DB::table('tbl_payment_gateway')->update($data);
        return back();
    }

    public function activepaymentgateway(Request $request){

        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $usb_status=$request->usb_status;
        $papal_status=$request->paypal_status;
        $stripe_status=$request->stripe_status;
        $payumoney_status=$request->payumoney_status;
        $paystack_status=$request->paystack_status;
        $rezorpay_status=$request->rezorpay_status;
        if($usb_status!=false)
        {
            $usb=1;
        }
        else
        {
            $usb=0;
        }
        if($papal_status!=false)
        {
            $papal_status=1;
        }
        else
        {
            $papal_status=0;
        }
        if($stripe_status!=false)
        {
            $stripe_status=1;
        }
        else
        {
            $stripe_status=0;
        }
        if($payumoney_status!=false)
        {
            $payumoney_status=1;
        }
        else
        {
            $payumoney_status=0;
        }
        if($paystack_status!=false)
        {
            $paystack_status=1;
        }
        else
        {
            $paystack_status=0;
        }
        if($rezorpay_status!=false)
        {
            $rezorpay_status=1;
        }
        else
        {
            $rezorpay_status=0;
        }


        $data = array(
            'usb_status' => $usb,
            'paypal_status' => $papal_status,
            'stripe_status' => $stripe_status,
            'payumoney_status' => $payumoney_status,
            'paystack_status' => $paystack_status,
            'rezorpay_status' => $rezorpay_status,

            'restaurant_id' => $add_by,
            //'paypal_status' => $papal

        );
        DB::table('tbl_payment_gateway')->update($data);
        return back();
    }

}
