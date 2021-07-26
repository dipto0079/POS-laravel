<?php

namespace App\Http\Controllers;

use App\RestaurantUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RestaurantHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function home()
    {
        $c_d= date('Y-m-d');

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $tot=DB::table('tbl_restaurant_sales')
            ->where('restaurant_id', $res_id)
            ->sum('sub_total');


        $Daily_Summaery=DB::table('tbl_restaurant_sales')
            ->whereDate('created_at', '=', $c_d)
            ->where('restaurant_id', $res_id)
            ->sum('sub_total');


        $restaurant_suppliers=DB::table('tbl_restaurant_suppliers')
            ->where('restaurant_id', $res_id)
            ->count('name');

        $restaurant_customers=DB::table('tbl_restaurant_customers')
            ->where('restaurant_id', $res_id)
            ->count('name');

        $restaurant_users=DB::table('tbl_restaurant_users')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->count('manager_name');

        $restaurant_floor_tables=DB::table('tbl_restaurant_floor_tables')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->count('name');

        $restaurant_purchases=DB::table('tbl_restaurant_purchases')
            ->where('restaurant_id', $res_id)
            ->where('del_status','=','Live')
            ->count('restaurant_id');


        return view('pages.restaurant.home',compact('tot','Daily_Summaery','restaurant_suppliers','restaurant_customers',
            'restaurant_users','restaurant_floor_tables','restaurant_purchases'));
    }

    public function staff(){
        $id = mt_rand(100000, 999999);
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $role=DB::table('tbl_super_admins_role')
            ->where('restaurant_id',$res_id)
            ->get();

        return view('pages.restaurant.Staff.add_staff',compact('role','id'));
    }
    public  function  addstaff(Request $request){

        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $validated = $request->validate([
            'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',

        ]);

        $restaurantUser = new RestaurantUser;
        $restaurantUser->manager_name = $request->manager_name;
        $restaurantUser->manager_phone = $request->manager_phone;
        $restaurantUser->pin_no = $request->pin_no;
        $restaurantUser->salary = $request->salary;
        $restaurantUser->manager_email = $request->manager_email;
        $restaurantUser->password = bcrypt($request->password);
        $restaurantUser->role_id = $request->role_id;

        $restaurantUser->restaurant_id = $add_by;

        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $restaurantUser['image']=$image_url;
        }


        toastr()->success('Staff Add');

      $restaurantUser->save();


       return redirect('restaurant/all-staff-restaurant');
    }
    public function allstaff(){
        /*$staff= RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->get();*/
        $staff = DB::table('tbl_restaurant_users')
            ->join('tbl_super_admins_role','tbl_restaurant_users.role_id','=','tbl_super_admins_role.id')
            ->where('tbl_restaurant_users.restaurant_id','=',Auth::guard('restaurantUser')->user()->restaurant_id)
            ->select('tbl_restaurant_users.*','tbl_super_admins_role.user_name as roleName')
            ->get();
       return view('pages.restaurant.Staff.all_staff', compact('staff'));
    }
    public function deletestaff($id){
        DB::table('tbl_restaurant_users')->where('id', $id)->delete();
        return back();
    }
    public function editstaff($id){
        $role=DB::table('tbl_super_admins_role')
            ->get();
        $all_data=DB::table('tbl_restaurant_users')
            ->where('id',$id)
            ->first();
        return view('pages.restaurant.Staff.edit_staff',compact('all_data','role'));
    }
    public function updatesatff(Request $request){
        $id = $request->id;
        $validated = $request->validate([
            'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);

        $data=array();
        $data['manager_name']=$request->manager_name;
        $data['manager_phone']=$request->manager_phone;
        $data['manager_email']=$request->manager_email;
        $data['password']= bcrypt($request->password);
        $data['role_id']=$request->role_id;
        $data['pin_no']=$request->pin_no;
        $data['salary']=$request->salary;
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            // unlink($request->old_image);
            DB::table('tbl_restaurant_users')->where('id',$id)->update($data);
            return redirect('restaurant/all-staff-restaurant');
        }else{
            $data['image']=$request->old_image;
            DB::table('tbl_restaurant_users')->where('id',$id)->update($data);

         return redirect('restaurant/all-staff-restaurant');
        }

    }

    //-----------------role------------------
    public function rsRole(){
        $res = Auth::guard('restaurantUser')->user()->restaurant_id;
        $all_rople=DB::table('tbl_super_admins_role')
            ->where('restaurant_id',$res)
            ->get();
      return view('pages.restaurant.role.role',compact('all_rople'));
    }
    public function rsAddrole(){
        $res = Auth::guard('restaurantUser')->user()->restaurant_id;
        $all_data=DB::table('tbl_super_admins_role')
            ->where('restaurant_id',$res)
            ->get();
        return view('pages.restaurant.role.add_role',compact('all_data'));
    }
    public function rsRoleinsert(Request $request){
        $res = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'user_name' => $request->user_name,
            'description' =>$request->description,
            'del_status' =>$request->del_status,
            'restaurant_id' => $res,
        );

        DB::table('tbl_super_admins_role')->insert($data);

        return redirect('restaurant/add_roles');
    }

    public function rsDeletRrole($id){
        DB::table('tbl_super_admins_role')->where('id', $id)->delete();
        return back()->with('deleted','Sucessfully Deleted.');
    }
    public function rsEditrole($id){
        $all_data=DB::table('tbl_super_admins_role')
            ->where('id',$id)
            ->first();
        return view('pages.restaurant.role.edit_role',compact('all_data'));
    }
    public function rsUpdaterole(Request $request){
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
    public function permissions(Request $request){

        $id = $request->role_name;

        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'dine_in' => $request->dine_in =='on'?1:0,
            'to_go' => $request->to_go =='on'?1:0,
            'pickup' => $request->pickup =='on'?1:0,
            'delivery' => $request->delivery =='on'?1:0,
            'open_food' => $request->open_food =='on'?1:0,
            'note' => $request->note =='on'?1:0,
            'moble_order' => $request->moble_order =='on'?1:0,
            'multi_order' => $request->multi_order =='on'?1:0,
            'open_table' => $request->open_table =='on'?1:0,
            'modify_in_kitcjen_item_option' => $request->modify_in_kitcjen_item_option =='on'?1:0,
            'ressend_in_kitchen_item' => $request->ressend_in_kitchen_item =='on'?1:0,
            'edit_oder' => $request->edit_oder =='on'?1:0,
            'create_group_role' => $request->create_group_role =='on'?1:0,
            'create_role' => $request->create_role =='on'?1:0,
            'add_staff' => $request->add_staff =='on'?1:0,
            'staff_list' => $request->staff_list =='on'?1:0,
            'suppliers_group' => $request->suppliers_group =='on'?1:0,
            'suppliers_list' => $request->suppliers_list =='on'?1:0,
            'customer_group' => $request->customer_group =='on'?1:0,
            'customer_list' => $request->customer_list =='on'?1:0,
            'add_ingredient_category' => $request->add_ingredient_category =='on'?1:0,
            'list_ingredient_category' => $request->list_ingredient_category =='on'?1:0,
            'list_ingredient_unit' => $request->list_ingredient_unit =='on'?1:0,
            'add_ingredient_unit' => $request->add_ingredient_unit =='on'?1:0,
            'add_ingredient' => $request->add_ingredient =='on'?1:0,
            'upload_ingredient_by_file' => $request->upload_ingredient_by_file =='on'?1:0,
            'list_ingredient' => $request->list_ingredient =='on'?1:0,
            'add_purchases_group' => $request->add_purchases_group =='on'?1:0,
            'list_purchases' => $request->list_purchases =='on'?1:0,
            'add_floor' => $request->add_floor =='on'?1:0,
            'list_floor' => $request->list_floor =='on'?1:0,
            'pos' => $request->pos =='on'?1:0,
            'list_sale' => $request->list_sale =='on'?1:0,
            'add_category' => $request->add_category =='on'?1:0,
            'list_category' => $request->list_category =='on'?1:0,
            'add_sub_category' => $request->add_sub_category =='on'?1:0,
            'list_sub_category' => $request->list_sub_category =='on'?1:0,
            'add_shifts' => $request->add_shifts =='on'?1:0,
            'list_shifts' => $request->list_shifts =='on'?1:0,
            'add_modifiers' => $request->add_modifiers =='on'?1:0,
            'list_modifiers' => $request->list_modifiers =='on'?1:0,
            'add_food_menu' => $request->add_food_menu =='on'?1:0,
            'list_food_menu' => $request->list_food_menu =='on'?1:0,
            'payment_getaway' => $request->payment_getaway =='on'?1:0,
            'payment_method' => $request->payment_method =='on'?1:0,
            'kitchen_panels' => $request->kitchen_panels =='on'?1:0,
            'waiter_panels' => $request->waiter_panels =='on'?1:0,
            'attendance' => $request->attendance =='on'?1:0,
            'stock' => $request->stock =='on'?1:0,
            'stock_adjustment' => $request->stock_adjustment =='on'?1:0,
            'reservation' => $request->reservation =='on'?1:0,
            'add_adjustments' => $request->add_adjustments =='on'?1:0,
            'list_inventory_adjustments' => $request->list_inventory_adjustments =='on'?1:0,
            'expanse_category' => $request->expanse_category =='on'?1:0,
            'expanse' => $request->expanse =='on'?1:0,
            'expanse_items' => $request->expanse_items =='on'?1:0,
            'add_waste' => $request->add_waste =='on'?1:0,
            'list_waste' => $request->list_waste =='on'?1:0,
            'gift_card_list' => $request->gift_card_list =='on'?1:0,
            'sell_gift_card' => $request->sell_gift_card =='on'?1:0,
            'add_gift_card' => $request->add_gift_card =='on'?1:0,
            'restaurant_settings' => $request->restaurant_settings =='on'?1:0,
            'add_email_template' => $request->add_email_template =='on'?1:0,
            'profile_update' => $request->profile_update =='on'?1:0,
            'add_supplier_payment' => $request->add_supplier_payment =='on'?1:0,
            'list_supplier_payment' => $request->list_supplier_payment =='on'?1:0,
            'add_customer_payment' => $request->add_customer_payment =='on'?1:0,
            'list_customer_payment' => $request->list_customer_payment =='on'?1:0,
            'register_report' => $request->register_report =='on'?1:0,
            'daily_summaery_report' => $request->daily_summaery_report =='on'?1:0,
            'food_sale_report' => $request->food_sale_report =='on'?1:0,
            'daily_sale_report' => $request->daily_sale_report =='on'?1:0,
            'detailed_sale_report' => $request->detailed_sale_report =='on'?1:0,
            'consumption_report' => $request->consumption_report =='on'?1:0,
            'inventory_report' => $request->inventory_report =='on'?1:0,
            'low_inventory_report' => $request->low_inventory_report =='on'?1:0,
            'profit_loss_report' => $request->profit_loss_report =='on'?1:0,
            'kitchen_performance_report' => $request->kitchen_performance_report =='on'?1:0,
            'attendance_report' => $request->attendance_report =='on'?1:0,
            'supplier_ledher' => $request->supplier_ledher =='on'?1:0,
            'supplier_due_report' => $request->supplier_due_report =='on'?1:0,
            'customer_due_report' => $request->customer_due_report=='on'?1:0,
            'customer_ledger' => $request->customer_ledger =='on'?1:0,
            'prchase_report' => $request->prchase_report =='on'?1:0,
            'expense_report' => $request->expense_report =='on'?1:0,
            'waste_report' => $request->waste_report =='on'?1:0,
            'restaurant_id' => $res_id,
        );

        $dd= json_encode($data);

        DB::table('tbl_super_admins_role')
            ->where('id', $id)
            ->update(array('permissions'=>$dd));

        return back();
    }
    public function showjson($id){

        $some = DB::table('tbl_super_admins_role')
            ->where('id', $id)
            ->first();

        echo ($some->permissions);

    }
    public  function profileshow(){
        $res_id = Auth::guard('restaurantUser')->user()->id;
        $res_use = DB::table('tbl_restaurant_users')
            ->where('id', $res_id)
            ->first();
    return view('pages.restaurant.ProfileUpdate.profile_update',compact('res_use'));
    }
    public  function updateprofile(Request $request){
        $id = $request->id;
        $validated = $request->validate([
            'image' => 'mimes:jpg,jpeg,png,JPG,PNG|max:4000',
        ]);

        $data=array();
        $data['manager_name']=$request->manager_name;
        $data['manager_phone']=$request->manager_phone;
        $data['password']= bcrypt($request->password);
        $image=$request->file('image');
        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/upload/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
           //dd($data);
            DB::table('tbl_restaurant_users')->where('id',$id)->update($data);
            toastr()->success('Updated successfully.');
            return back();
        }else{
            $data['image']=$request->old_image;
            DB::table('tbl_restaurant_users')->where('id',$id)->update($data);
            toastr()->success('Updated successfully.');
            return back();
           //dd($data);
        }
    }
    public function companyshow(){
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;
        $res_use = DB::table('tbl_restaurants')
            ->where('id', $res_id)
            ->first();

       return view('pages.restaurant.CompanyUpdate.companyupdate', compact('res_use'));
    }
    public function updatecompany(Request $request){
        $id = $request->id;
        $data = array(
            'name' => $request->name,
            'phone' => $request->phone,
        );
        DB::table('tbl_restaurants')
            ->where('id', $id)
            ->update($data);
        toastr()->success('Updated successfully.');
        return back();
    }

    public function PaymentActive(){
        $res_id = Auth::guard('restaurantUser')->user()->restaurant_id;

        $res_use = DB::table('tbl_restaurants')
            ->where('id', $res_id)
            ->first();

        $json = json_decode($res_use->payment_gateway);

        return view('pages.restaurant.ActivePayment.activepayment',compact('json'));
    }
}
