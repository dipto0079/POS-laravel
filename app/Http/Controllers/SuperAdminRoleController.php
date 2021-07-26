<?php
namespace App\Http\Controllers;
use App\City;
use App\Mail\RestaurantVerificationEmail;
use App\Restaurant;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\RestaurantUser;
use App\Classes\ServiceWorker;
use App\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class SuperAdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');

    }
    public function test(){
        //$this->middleware('guest', ['except' => ['logout']]);
        $this->serviceWorker = new ServiceWorker();
    }

    public function role(){
        $all_rople=DB::table('tbl_super_admins_role')
            ->get();
        return view('pages.superAdmin.role',compact('all_rople'));
    }
    public function addrole(){

        $all_data=DB::table('tbl_super_admins_role')->get();
        return view('pages.superAdmin.add_role',compact('all_data'));
    }
    public function roleinsert(Request $request){
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'user_name' => $request->user_name,
            'description' =>$request->description,
            'del_status' =>$request->del_status,
            'restaurant_id' => $add_by,
        );
       DB::table('tbl_super_admins_role')->insert($data);

       return redirect('SuperAdmin/add_role');
//        echo $add_by;
    }

    public function delete_role($id){
        DB::table('tbl_super_admins_role')->where('id', $id)->delete();
        return back()->with('deleted','Sucessfully Deleted.');
    }
    public function edit_role($id){
        $all_data=DB::table('tbl_super_admins_role')
            ->where('id',$id)
            ->first();
        return view('pages.superAdmin.edit_role',compact('all_data'));
    }
    public function updaterole(Request $request){
        $id = $request->id;
        $data = array(
            'user_name' => $request->user_name,
            'description' => $request->description,
            'del_status' =>$request-> del_status,
        );
        DB::table('tbl_super_admins_role')
            ->where('id', $id)
            ->update($data);
        return back();
    }
    public function staff(){
        $role=DB::table('tbl_super_admins_role')
            ->get();
        return view('pages.superAdmin.Staff.add_staff',compact('role'));
    }
    public  function  addstaff(Request $request){
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $restaurantUser = new RestaurantUser;
        $restaurantUser->manager_name = $request->manager_name;
        $restaurantUser->manager_phone = $request->manager_phone;
        $restaurantUser->manager_email = $request->manager_email;
        $restaurantUser->password = bcrypt($request->manager_password);
        $restaurantUser->restaurant_id = $add_by;
        $restaurantUser->save();
        return redirect('SuperAdmin/Staff');
    }

    //-----Active Restaurant -------------
    public function activerestaurant(){
        $all_res=DB::table('tbl_restaurants')
            ->get();
        //echo $all_res;
        return view('pages.superAdmin.ActiveRestaurant.activerestaurant',compact('all_res'));
    }

    function updatestatus($id)
    {

        $res = DB::table('tbl_restaurants')

            ->where('id','=',$id)
            ->first();

       if($res->approval_status == 'Disapprove'){
            $status = 'Approve';
           toastr()->success('Approve');
        }else{
            $status = 'Disapprove';
           toastr()->success('Disapprove');
        }

        $values = array('approval_status' => $status);

       DB::table('tbl_restaurants')
            ->where('id',$id)
            ->update($values);

        return back();
    }

    //------------Add New Restaurant-------------------
    public function showForm(){

        $id = mt_rand(100000, 999999);
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $states = State::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $cities = City::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.AddNewRestaurant.addNewRestaurant',compact('id', 'countries'));
    }
    public function addnewRestaurant(Request $request){
        $rules = array(
            'restaurant_id' => 'required|unique:tbl_restaurants,restaurant_id',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns,strict|unique:tbl_restaurants,email',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'manager_name' => 'required',
            'manager_phone' => 'required',
            'manager_email' => 'required|email:rfc,dns,strict|unique:tbl_restaurant_users,manager_email',
            'manager_password' => 'required|min:6|max:12'
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = Country::find($request->country);
            $state = State::find($request->state);
            $city = City::find($request->city);

            if ($country && $state && $city) {
                $restaurant = new Restaurant;
                $restaurant->restaurant_id = $request->restaurant_id;
                $restaurant->name = $request->name;
                $restaurant->phone = $request->phone;
                $restaurant->email = $request->email;
                $restaurant->country_id = $request->country;
                $restaurant->state_id = $request->state;
                $restaurant->city_id = $request->city;
                $restaurant->address = $request->address;
                $restaurant->slug = Str::slug($request->name, '-');
                $restaurant->save();

                $restaurantUser = new RestaurantUser;
                $restaurantUser->manager_name = $request->manager_name;
                $restaurantUser->manager_phone = $request->manager_phone;
                $restaurantUser->manager_email = $request->manager_email;
                $restaurantUser->password = bcrypt($request->manager_password);
                $restaurantUser->email_verification_token = Str::random(32);
                $restaurantUser->restaurant_id = $restaurant->id;
                $restaurantUser->save();

               // Mail::to($restaurantUser->manager_email)->send(new RestaurantVerificationEmail($restaurantUser));

                toastr()->success('successfully');
                // redirect
                return redirect('SuperAdmin/active-restaurant');
            } else {
                toastr()->error('Invalid country, state or city name found.');
                return redirect('SuperAdmin/active-restaurant');
            }
        }
    }
    //------------ Restaurant  List -------------------
    public function restaurantlist(){
        $all_res=DB::table('tbl_restaurants')
            ->get();
        return view('pages.superAdmin.ActiveRestaurant.RestaurantList',compact('all_res'));
    }
    public function restaurantRole($id){

       // $restaurant_ingredients=DB::table('tbl_restaurant_ingredients')->where('restaurant_id',$id)->get();
        $id=$id;

        $ingredients_name = DB::table('tbl_restaurant_ingredients')->where('restaurant_id',$id)->count('name');
        $restaurant_food_menus = DB::table('tbl_restaurant_food_menus')->where('restaurant_id',$id)->count('name');
        $restaurant_sales_details = DB::table('tbl_restaurant_sales_details')->where('restaurant_id',$id)->count('menu_name');
        $restaurant_floor_tables = DB::table('tbl_restaurant_floor_tables')->where('restaurant_id',$id)->count('name');
        return view('pages.superAdmin.ActiveRestaurant.restaurant-role',compact('ingredients_name','restaurant_food_menus','restaurant_sales_details','restaurant_floor_tables','id'));
    }

    public function paymentRes($id){
        $id=$id;
        $alldata = DB::table('tbl_superadmin_payment_gateway')->first();
       return view('pages.superAdmin.ActiveRestaurant.PaymendGetway.paymendgetway',compact('alldata','id'));
    }
    public function addpaymentRes(Request $request){
        $id = $request->restaurant_id;
        $data = array(
            'usb_status' => $request->usb_status =='on'?1:0,
            'paypal_status' => $request->paypal_status =='on'?1:0,
            'stripe_status' => $request->stripe_status =='on'?1:0,
            'payumoney_status' => $request->payumoney_status =='on'?1:0,
            'paystack_status' => $request->paystack_status =='on'?1:0,
            'rezorpay_status' => $request->rezorpay_status =='on'?1:0,
        );
        $dd = json_encode($data);

        DB::table('tbl_restaurants')
            ->where('id', $id)
            ->update(array('payment_gateway'=>$dd));

        toastr()->success('Payment Gateway Successfully Add');

        return redirect('SuperAdmin/supr-restaurant-list');
    }





    //Resturent Report
    public function restaurantreport()
    {
       $res_report=DB::table('tbl_restaurant_purchases')
       ->join('tbl_restaurants','tbl_restaurant_purchases.restaurant_id','tbl_restaurants.id')
        ->where('tbl_restaurant_purchases.del_status','=','Live')

    //    $restur_name=DB::table('tbl_restaurant_purchases')
    // ->join('tbl_restaurants','tbl_restaurant_purchases.restaurant_id','tbl_restaurants.id')
        ->select('tbl_restaurant_purchases.*','tbl_restaurants.name as res_name')->get();

       return view('pages.superAdmin.ResturentReport.resturentreport',compact('res_report'));

    }




     //--------------------Payment Getway to Restaurant-----------

    public function PaymentGetwaytoRestaurant(){
        $alldata = DB::table('tbl_superadmin_payment_gateway')
            ->first();
        $allres=DB::table('tbl_restaurants')->get();

        return view('pages.superAdmin.RestaurantPaymentGetway.restaurantPaymentGetway',compact("alldata",'allres'));
    }

    public function addPaymentGateway(Request $request){
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

        );
        //dd($data);
        DB::table('tbl_superadmin_payment_gateway')->update($data);
        return back();
    }
    public function activePaymentRestaurant(Request $request){

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

        );

        DB::table('tbl_superadmin_payment_gateway')->update($data);
        return back();
    }


    //-----------Email Settings------------
    public function EmailSettings(){

        return view('pages.superAdmin.EmailTemplates.emailTemplates');
    }




    //-----------SMS Settings------------
    public function smsSettings(){

        return view('pages.superAdmin.SMSSettings.sMSsettings');
    }




}
