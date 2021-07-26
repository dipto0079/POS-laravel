<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function dashboard()
    {
        $tbl_restaurants=DB::table('tbl_restaurants')
            ->count('name');

        $restaurant_users=DB::table('tbl_restaurant_users')
            ->count('manager_name');

        $restaurant_customers=DB::table('tbl_restaurant_customers')
            ->count('name');

        $restaurant_sales=DB::table('tbl_restaurant_sales')
            ->count('sale_no');

        $restaurant_suppliers=DB::table('tbl_restaurant_suppliers')
            ->count('name');

        $online_customers=DB::table('tbl_customers')
            ->count('name');

        $online_orders=DB::table('tbl_customer_online_orders')
            ->count('online_order_no');

        $customer_reservations=DB::table('tbl_customer_reservations')
            ->count('id');

        $tbl_table_resurved=DB::table('tbl_table_resurved')
            ->count('id');

        return view('pages.superAdmin.dashboard',compact('tbl_restaurants','restaurant_users','restaurant_customers','restaurant_sales','restaurant_suppliers','online_customers',
            'online_orders','customer_reservations','tbl_table_resurved'));
    }

    public function otherlist(){
        return view('pages.superAdmin.outher_list.outher_list');
    }
    public function allService(){
        return view('pages.superAdmin.all_service.all_service');
    }
    public function sale(){
        return view('pages.superAdmin.Sale.sale');
    }
    public function inventory(){
        return view('pages.superAdmin.Inventory.Inventory');
    }
    public function inventoryadjustment(){
        return view('pages.superAdmin.Inventory_adjustment.Inventory_adjustment');
    }
    public function waste(){
        return view('pages.superAdmin.Waste.waste');
    }

}
