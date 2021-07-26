<?php

function getBaseURL()
{
    
    // return "https://askmepos.net/";
    $root=(isset($_SERVER["HTTPS"]) ? "https://" : "http://").$_SERVER["HTTP_HOST"];
    $root.= str_replace(basename($_SERVER["SCRIPT_NAME"]), "", $_SERVER["SCRIPT_NAME"]);
    $config["base_url"] = $root;

    return $root;
    //return "http://localhost/ask_me_pos/";

}

function getRestaurantId($id)
{
    return \App\Restaurant::find($id)->restaurant_id;
}

function getUnitNameByIngredientId($id)
{
    return \App\RestaurantIngredient::with('unitInfo')->find($id)->unitInfo->name;
}

function getStateNameById($id)
{
    return \App\State::find($id)->name;
}

function getCityNameById($id)
{
    return \App\City::find($id)->name;
}

function getIngredientNameById($id)
{
    return \App\RestaurantIngredient::find($id)->name;
}

function getTotalIngredient($id) {
    return \App\RestaurantFoodMenuIngredient::where('food_menu_id', $id)->where('del_status', 'Live')->get()->count();
}


//for get the order type name
function getOrderType($id){
    $order_type_name = '';
    if ($id == 1) {
        $order_type_name = 'Dine In';
    }elseif ($id == 2) {
        $order_type_name = 'Take Away';
    }elseif ($id == 3) {
        $order_type_name = 'Delivery';
    }

    return $order_type_name;

}

//total kitchen type items
function get_total_kitchen_type_items($sale_id)
{
    return   \App\RestaurantSalesDetails::select('id')->where("sales_id", $sale_id)->get()->count(); 
}

function get_total_kitchen_type_done_items($sale_id)
{
    return   \App\RestaurantSalesDetails::select('id')->where("sales_id", $sale_id)->where("cooking_status", "Done")->get()->count(); 
}

function get_total_kitchen_type_started_cooking_items($sale_id)
{
    return   \App\RestaurantSalesDetails::select('id')->where("sales_id", $sale_id)->where("cooking_status", "Started Cooking")->get()->count(); 
}

function getLastPurchasePrice($ingredient_id) {
    $purchase_info = \App\RestaurantPurchaseIngredient::where('ingredient_id',$ingredient_id)->orderBy('id', 'DESC')->first();

    if (!empty($purchase_info)) {
        return $purchase_info->unit_price;
    } else {
        $ig_information = \App\RestaurantIngredient::where('id',$ingredient_id)->first();

        return $ig_information->purchase_price;
    }
}

function getRestaurantTableNameById($id)
{
    return \App\RestaurantFloorTable::find($id)->name;
}
