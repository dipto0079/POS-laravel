<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OnlineCartController extends Controller
{
    public function addToCartByAjax(Request $request){
        //return response()->json($request->all());
        //Session::put('cart','');
        $restaurant_id = Session::get('restaurant_id');
        //return response()->json($restaurant_id); 
        if ($restaurant_id != $request->food_menu_restaurant_id) {
            Session::put('restaurant_id', $request->food_menu_restaurant_id);
            Session::put('cart');
        }
        //Session::put('cart', '');


        $carts = Session::get('cart');
        //return $carts;
        // Check if cart is empty
        // if ($carts != NULL){
        //     foreach($carts as $subKey => $subArray){
        //         if($subArray['food_menu_id'] == $request->food_menu_id){
        //             // Return error message
        //             return response()->json(array('error' => 'This Item already exists in your cart!'));
        //         }
        //     }
        // }
        
        //if (Session::has('cart')) {
            # code...
            // Set data to session
            $data = array('qty' => $request->food_menu_qty, 'food_menu_id' => $request->food_menu_id, 'modifiers' => $request->modifiers);
            Session::push('cart', $data);
        // }else{
        //     $data = array('qty' => $request->food_menu_qty, 'food_menu_id' => $request->food_menu_id, 'modifiers' => $request->modifiers);
        //     Session::put('cart', $data);
        // }
        //$carts = Session::get('cart');
        //return $carts;

        return response()->json(['cart'=>Session::get('cart'), 'restaurant'=> Session::get('restaurant_id')]); 


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editToCartByAjax(Request $request)
    {
        // Find the Cart & update it
        $carts = Session::get('cart', []);

        // Loop over each cart data
        foreach ($carts as &$cart) {
            // If found the intended
            if ($cart['food_menu_id'] == $request->food_menu_id) {
                // Update it's value
                $cart['qty'] = $request->food_menu_qty;
                $cart['modifiers'] = $request->modifiers;
            }
        }

        // Update cart data
        Session::put('cart',$carts);

        // return response
        //return response()->json(Session::get('cart'));
        return response()->json(['cart'=>Session::get('cart'), 'restaurant'=> Session::get('restaurant_id')]); 
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteFromCartByAjax(Request $request)
    {        
        ///return $request->all();

        // Find the cart
        $carts = Session::pull('cart'); // Second argument is a default value
        //return $carts;


        if(($key = array_search($request->food_menu_id, array_column($carts, 'food_menu_id'))) !== false) {
            // Delete it from the session
            unset($carts[$key]);
        }

        // Reset the array index
        $carts = array_values($carts);

        // Set the session again
        session()->put('cart', $carts);

        return response()->json();
    }

}
