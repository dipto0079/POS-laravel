<?php

namespace App\Http\Controllers;

use App\RestaurantUser;
use App\RestaurantFoodMenu;
use App\RestaurantIngredient;
use App\RestaurantIngredientCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RestaurantStockController extends Controller
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
        //

        $restaurantUserId = Auth::guard('restaurantUser')->user()->id;
        $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;


        $ingredientCategories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo')->orderBy('updated_at', 'desc')->get();

        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();

        $foodMenus = RestaurantFoodMenu::with('categoryInfo', 'creatorInfo')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();


        $sql = "SELECT i.*,(select SUM(quantity_amount) from tbl_restaurant_purchase_ingredients where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_purchase, 
                (select SUM(consumption) from tbl_restaurant_sales_consumptions_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_consumption,
                (select SUM(consumption) from tbl_restaurant_sales_cons_of_mod_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND  del_status='Live') total_modifiers_consumption,
                (select SUM(waste_amount) from tbl_restaurant_waste_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND tbl_restaurant_waste_ingredients.del_status='Live') total_waste,
                (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Plus') total_consumption_plus,
                (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Minus') total_consumption_minus,
                (select name from tbl_restaurant_ingredient_categories where id=i.category_id AND del_status='Live') category_name,
                (select name from tbl_restaurant_ingredient_units where id=i.unit_id AND del_status='Live') unit_name
                FROM tbl_restaurant_ingredients i WHERE i.del_status='Live' AND i.restaurant_id= '$restaurantId' ORDER BY i.name ASC";

        $stock = DB::select($sql);
        
        
        // $alertCount = $this->getAlertCount();
        $alertCount = 0;
        foreach ($stock as $value) {
            $totalStock = $value->total_purchase - $value->total_consumption - $value->total_modifiers_consumption - $value->total_waste + $value->total_consumption_plus - $value->total_consumption_minus;
            if ($totalStock <= $value->alert_quantity) {
                $alertCount++;
            }
        }

        return view('pages.restaurant.stock.stock', compact('ingredientCategories', 'ingredients', 'foodMenus', 'stock', 'alertCount'));

    }

    //for Ingredients alert count in the stock page 
    // public function getAlertCount(){

    //     $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;

    //     $sql  = "SELECT i.*,(select SUM(quantity_amount) from tbl_restaurant_purchase_ingredients where ingredient_id=i.id AND restaurant_id='$restaurantId' AND del_status='Live') total_purchase, 
    //         (select SUM(consumption) from tbl_restaurant_sales_consumptions_of_menus where ingredient_id=i.id AND restaurant_id='$restaurantId' AND del_status='Live') total_consumption,
    //         (select SUM(waste_amount) from tbl_restaurant_waste_ingredients where ingredient_id=i.id AND restaurant_id='$restaurantId' AND del_status='Live') total_waste,
    //         (select name from tbl_restaurant_ingredient_categories where id=i.category_id AND del_status='Live') category_name,
    //         (select name from tbl_restaurant_ingredient_units where id=i.unit_id AND del_status='Live') unit_name
    //         FROM tbl_restaurant_ingredients i WHERE del_status='Live' AND i.restaurant_id= '$restaurantId'  ORDER BY i.name ASC";
    
    //     $result = DB::select($sql);
    //     // return $result;

    //     $alertCount = 0;
    //     foreach ($result as $value) {
    //         $totalStock = $value->total_purchase - $value->total_consumption - $value->total_waste;
    //         if ($totalStock <= $value->alert_quantity) {
    //             $alertCount++;
    //         }
    //     }
    //     return $alertCount;
    // }


    //for the list of alerted ingredients

    public function getStockAlertList(){

        $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;

        $sql = "SELECT i.*,(select SUM(quantity_amount) from tbl_restaurant_purchase_ingredients where ingredient_id=i.id AND restaurant_id='$restaurantId' AND del_status='Live') total_purchase, 
            (select SUM(consumption) from tbl_restaurant_sales_consumptions_of_menus where ingredient_id=i.id AND restaurant_id='$restaurantId' AND del_status='Live') total_consumption,
            (select SUM(consumption) from tbl_restaurant_sales_cons_of_mod_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND  del_status='Live') total_modifiers_consumption,
            (select SUM(waste_amount) from tbl_restaurant_waste_ingredients where ingredient_id=i.id AND restaurant_id='$restaurantId' AND del_status='Live') total_waste,
            (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Plus') total_consumption_plus,
            (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Minus') total_consumption_minus,
            (select name from tbl_restaurant_ingredient_categories where id=i.category_id AND del_status='Live') category_name,
            (select name from tbl_restaurant_ingredient_units where id=i.unit_id AND del_status='Live') unit_name
            FROM tbl_restaurant_ingredients i WHERE del_status='Live' AND i.restaurant_id= '$restaurantId'  ORDER BY i.name ASC";
        
        $alertStock = DB::select($sql);
        return view('pages.restaurant.stock.stockAlertList', compact('alertStock'));


    }
    
}
