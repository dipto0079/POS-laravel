<?php

namespace App\Http\Controllers;

use App\RestaurantFoodMenuModifier;
use App\RestaurantFoodMenuModifierIngredient;
use App\RestaurantIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RestaurantFoodMenuModifiersController extends Controller
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
        $modifiers = RestaurantFoodMenuModifier::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.sale.foodMenuModifier.index', compact('modifiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.sale.foodMenuModifier.create', compact('ingredients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request->all();
        $rules = array(
            'name' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('food-menu-modifiers.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $modifier = new RestaurantFoodMenuModifier();
            $modifier->name = $request->name;
            $modifier->price = $request->price;
            $modifier->description = $request->description;
            $modifier->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $modifier->user_id = Auth::guard('restaurantUser')->id();
            $modifier->save();

            if (is_countable($request->input('ingredient_id'))) {
                for ($i = 0; $i < count($request->input('ingredient_id')); $i++) {
                    $modifierIngredient = new RestaurantFoodMenuModifierIngredient();
                    $modifierIngredient->ig_id = $request->ingredient_id[$i];
                    $modifierIngredient->consumption = $request->consumption[$i];
                    $modifierIngredient->mod_id = $modifier->id;
                    $modifierIngredient->save();
                }
            }

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('food-menu-modifiers.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuModifier::find($id)->user_id) {
            $modifier = RestaurantFoodMenuModifier::find($id);
            $food_menu_ingredients = RestaurantFoodMenuModifierIngredient::with('ingredientInfo')->where('mod_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
           
            // return $food_menu_ingredients;

            return view('pages.restaurant.sale.foodMenuModifier.show', compact('modifier', 'food_menu_ingredients'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-modifiers.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuModifier::find($id)->user_id) {
            $modifier = RestaurantFoodMenuModifier::find($id);
            $modifier_ingredients = RestaurantFoodMenuModifierIngredient::with('ingredientInfo')->where('mod_id', $id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            // return $modifier_ingredients;
            $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();

            return view('pages.restaurant.sale.foodMenuModifier.edit', compact('modifier', 'modifier_ingredients', 'ingredients'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-modifiers.index');
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
    //    return $request->all();
        $rules = array(
            'name' => 'required',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $modifier = RestaurantFoodMenuModifier::find($id);
            $modifier->name = $request->name;
            $modifier->price = $request->price;
            $modifier->description = $request->description;
            $modifier->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $modifier->user_id = Auth::guard('restaurantUser')->id();
            $modifier->save();

            if (is_countable($request->input('ingredient_id'))) {
                if(RestaurantFoodMenuModifierIngredient::where('mod_id', $id)->get()) {
                    RestaurantFoodMenuModifierIngredient::where('mod_id', $id)->update(['del_status' => 'Deleted']);
                }
                for ($i = 0; $i < count($request->input('ingredient_id')); $i++) {
                    /*if (RestaurantFoodMenuModifierIngredient::where('ig_id', '=', $request->input('ingredient_id'))->where('mod_id', '=', $id)->exists()) {
                        $modifierIngredient = RestaurantFoodMenuModifierIngredient::where('ig_id', '=', $request->input('ingredient_id'))->where('mod_id', '=', $id)->first();;
                        $modifierIngredient->ig_id = $request->ingredient_id[$i];
                        $modifierIngredient->consumption = $request->consumption[$i];
                        $modifierIngredient->mod_id = $modifier->id;
                        $modifierIngredient->save();
                    } else {
                        $modifierIngredient = new RestaurantFoodMenuModifierIngredient();
                        $modifierIngredient->ig_id = $request->ingredient_id[$i];
                        $modifierIngredient->consumption = $request->consumption[$i];
                        $modifierIngredient->mod_id = $modifier->id;
                        $modifierIngredient->save();
                    }*/
                    $modifierIngredient = new RestaurantFoodMenuModifierIngredient();
                    $modifierIngredient->ig_id = $request->ingredient_id[$i];
                    $modifierIngredient->consumption = $request->consumption[$i];
                    $modifierIngredient->mod_id = $modifier->id;
                    $modifierIngredient->save();
                }
            } else {
                if(RestaurantFoodMenuModifierIngredient::where('mod_id', $id)->get()) {
                    RestaurantFoodMenuModifierIngredient::where('mod_id', $id)->update(['del_status' => 'Deleted']);
                }
            }

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('food-menu-modifiers.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuModifier::find($id)->user_id) {
            $modifier = RestaurantFoodMenuModifier::find($id);
            if ($modifier) {
                $modifier = RestaurantFoodMenuModifier::find($id);
                $modifier->del_status = "Deleted";
                $modifier->save();

                RestaurantFoodMenuModifierIngredient::where('mod_id', $id)->update(['del_status' => 'Deleted']);

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('food-menu-modifiers.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('food-menu-modifiers.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-modifiers.index');
        }
    }
}
