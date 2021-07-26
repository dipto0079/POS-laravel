<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Cuisine;
use App\RestaurantFloor;
use App\RestaurantFoodMenu;
use App\RestaurantSettingsCuisine;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{

    public function index()
    {
        //Session::put('delivery_option');
        $delivery_option = '';
        $cuisines = Cuisine::where('del_status', 'Live')->get();

        if (Session::has('delivery_option')) {
            $delivery_option = 1;
        } else {
            $delivery_option = 0;
        }

        //return $delivery_option;
        return view('pages.index', compact('cuisines', 'delivery_option'));
    }

    public function deliveryOption(Request $request)
    {
        //return response()->json($request);
        $delivery_option = $request->delivery_option;
        Session::put('delivery_option', $delivery_option);
        return response()->json(['success' => 'Delivery Option successfully set. You choose : ' . $delivery_option]);
    }

    //restaurant single page for public view
    public function restaurant($slug)
    {

        $delivery_option = '';
        if (Session::has('delivery_option')) {
            $delivery_option = Session::get('delivery_option');
        }
        //return $slug;
        $restaurant = Restaurant::with(['categories' => function ($query) {
            $query->with(['foodMenus' => function ($q) {
                $q->where('del_status', 'Live');
            }])->where('del_status', 'Live')->select('id', 'name', 'restaurant_id', 'description');
        },

            'shifts' => function ($query) {
                $query->with('foodMenus')->where('del_status', 'Live');
            }, 'cuisines', 'logo', 'city', 'floors'])
            ->select('id', 'name', 'email', 'address', 'city_id', 'slug')
            ->where('del_status', 'Live')
            ->where('slug', $slug)
            ->where('approval_status', 'Approve')
            ->first();


        // $sub_category = DB::table('table_sub_category')->get();
        $sub_category = DB::table('table_sub_category')->where('restaurant_id', $restaurant->id)->get();

        // $under_sub_category = DB::table('tbl_under_sub_catagory')
        // ->where()
        // ->get();
//-------- subcategory --------------------
        /**
         * 12
         * foreach $subcat as $key{
         *  <div> <a> $key->name </a>
         *
         *  $data = DB:(undersubcategory ) -> subcategory_id = $key->id
         *
         *    foreach $data as $key2{
         *
         *  $category = DB(category) -> category_id = $key2->category_id -> first()
         *
         *      <a> $category->name </a>
         *
         *      }
         *
         * </div>
         * }
         *
         */

//------------------------------


        //return $restaurant;
        //Session::put('cart');
        //return [Session::get('restaurant_id'),Session::get('cart')];
        //$cart_menus = array();
        $carts = '';
        if (Session::has('cart')) {
            $session_restaurant = Session::get('restaurant_id');
            if ($session_restaurant != $restaurant->id) {
                Session::put('cart');
            }

            $carts = Session::get('cart');
            // if ($carts) {
            //     # code...
            //     foreach ($carts as $key => $cart) {

            //         $selected_modifiers = [];
            //         $food_menu = RestaurantFoodMenu::with(['modifiers'=> function ($query){
            //                                             $query->wherePivot('del_status', 'Live');
            //                                         }])
            //                                         ->where('id', $cart['food_menu_id'])
            //                                         ->where('del_status', 'Live')
            //                                         ->select('id', 'name', 'take_away_price', 'delivery_order_price')
            //                                         ->first();

            //         $cart_menus[$key] = $food_menu;
            //         $cart_menus[$key]['qty'] = $cart['qty'];
            //         //return $food_menu->modifiers;
            //         foreach ($food_menu->modifiers as $key => $food_menu_modifier) {
            //             //return $food_menu_modifier->id;
            //             if ($cart['modifiers']) {
            //                 # code...
            //                 foreach ($cart['modifiers'] as $key => $cart_modifier) {
            //                     //return $cart_modifier;
            //                     if ($cart_modifier == $food_menu_modifier->id) {
            //                         $selected_modifiers[$key] = $food_menu_modifier;
            //                     }
            //                 }
            //             }
            //         }
            //         $cart_menus[$key]['selected_modifiers'] = $selected_modifiers;
            //     }
            // }

        } else {
            Session::put('restaurant_id', $restaurant->id);
        }

        $customer = Customer::with('addresses')->select('id', 'name', 'phone', 'email')
            ->where('id', Auth::guard('customer')->id())
            ->first();

        // return $restaurant;
        //$cart_menus = array($cart_menus);
        return view('pages.singleRestaurant', compact('restaurant', 'carts', 'delivery_option', 'sub_category', 'customer'));
    }

    //get_floor_with_tables_ajax
    public function getFloorWithTable(Request $request)
    {

        $floor = RestaurantFloor::find($request->floor_id);

        $floorTables = $floor->floorTables->where('del_status', 'Live');

        return response()->json(['floor' => $floor, 'floorTables' => $floorTables]);

    }

    //restaurant by cuisine
    public function restaurantByCuisine(Request $request)
    {
        $cuisineId = $request->cuisine;
        $cuisine = Cuisine::with('restaurants')
            ->select('id', 'name')
            ->where('id', $cuisineId)
            ->where('del_status', 'Live')
            ->first();


        foreach ($cuisine->restaurants as $key => $restaurant) {
            $restaurant->cuisines;
            $restaurant->logo;
            $restaurant->city;
        }
        // return $cuisine->restaurants;

        return view('pages.restaurantByCuisine', compact('cuisine'));
    }

    public function cuisineRestaurantByAjax(Request $request)
    {
        $cuisineId = $request->cuisineId;
        $cuisine = Cuisine::with('restaurants')
            ->select('id', 'name')
            ->where('id', $cuisineId)
            ->where('del_status', 'Live')
            ->first();

        foreach ($cuisine->restaurants as $key => $restaurant) {
            $restaurant->cuisines;
            $restaurant->logo;
            $restaurant->city;
        }

        // $restaurants = Restaurant::with(['cuisines'=>function ($query) use ($cuisineId){
        //                                 $query->where('cuisine_id',$cuisineId);
        //                             },'logo', 'city'])
        //                             ->where('del_status', 'Live')
        //                             ->limit($request->limit)
        //                             ->offset($request->start)
        //                             ->get();
        // foreach ($restaurants as $key =>$restaurant) {
        //     foreach ($restaurant->cuisines as $key => $cuisine) {
        //         $restaurant->cuisines[$key]->cuisineInfo;
        //     }
        // }


        return response()->json(['cuisine' => $cuisine]);

    }

    public function browseRestaurant()
    {
        return view('pages.browseRestaurant');
    }

    public function featuredRestaurantByAjax(Request $request)
    {

        //return $request->all();
        $restaurants = '';

        if ($request->limit) {
            //return $request->all();
            $restaurants = Restaurant::with('logo', 'city', 'cuisines')
                ->select('id', 'name', 'address', 'city_id', 'slug')
                ->where('del_status', 'Live')
                ->where('approval_status', 'Approve')
                ->where('featured_status', 'Featured')
                ->limit($request->limit)
                ->offset($request->start)
                ->get();
            foreach ($restaurants as $key => $restaurant) {
                foreach ($restaurant->cuisines as $key => $cuisine) {
                    $restaurant->cuisines[$key]->cuisineInfo;
                }
            }

        } else {

            $restaurants = Restaurant::with('logo', 'city', 'cuisines')
                ->select('id', 'name', 'address', 'city_id', 'slug')
                ->where('del_status', 'Live')
                ->where('approval_status', 'Approve')
                ->where('featured_status', 'Featured')
                ->get();
            foreach ($restaurants as $key => $restaurant) {
                foreach ($restaurant->cuisines as $key => $cuisine) {
                    $restaurant->cuisines[$key]->cuisineInfo;
                }
            }
        }


        return response()->json(['restaurants' => $restaurants]);


    }

    public function restaurantByAjax(Request $request)
    {

        $restaurants = Restaurant::with('logo', 'city', 'cuisines')
            ->select('id', 'name', 'address', 'city_id', 'slug')
            ->where('del_status', 'Live')
            ->where('approval_status', 'Approve')
            ->limit($request->limit)
            ->offset($request->start)
            ->get();
        foreach ($restaurants as $key => $restaurant) {
            foreach ($restaurant->cuisines as $key => $cuisine) {
                $restaurant->cuisines[$key]->cuisineInfo;
            }
        }
        return response()->json(['restaurants' => $restaurants]);
    }

    // get all information of a foodmenu by ajaz
    public function getFoodMenuByAjax(Request $request)
    {

        //return response()->json(['request' =>$request]);
        $food_menu_id = $request->food_menu_id;
        $food_menu = RestaurantFoodMenu::with(['modifiers' => function ($query) {
            $query->wherePivot('del_status', 'Live');
        }])
            ->where('id', $food_menu_id)
            ->where('del_status', 'Live')
            ->first();

        return response()->json(['food_menu' => $food_menu]);

    }
}
