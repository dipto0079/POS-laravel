<?php

namespace App\Http\Controllers;

use App\RestaurantFoodMenu;
use App\RestaurantFoodMenuIngredient;
use App\RestaurantIngredient;
use App\RestaurantUser;
use App\RestaurantWaste;
use App\RestaurantWasteIngredient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RestaurantWastesController extends Controller
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
        $wastes = RestaurantWaste::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        return view('pages.restaurant.waste.index', compact('wastes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastId = RestaurantWaste::select('reference_no')->orderBy('created_at', 'desc')->first();
        $nextId = "000001";

        if ($lastId) {
            $lastId = $lastId->reference_no;
            $idNum = (int)$lastId;
            $nextId = $idNum + 1;
            $nextId = (string)$nextId;

            switch (strlen($nextId)) {
                case 1:
                    $nextId = "00000" . $nextId;
                    break;
                case 2:
                    $nextId = "0000" . $nextId;
                    break;
                case 3:
                    $nextId = "000" . $nextId;
                    break;
                case 4:
                    $nextId = "00" . $nextId;
                    break;
                case 5:
                    $nextId = "0" . $nextId;
                    break;
                default:
                    $nextId = $nextId;
            }
        }

        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')
                    ->user()->restaurant_id)
                    ->where('del_status', 'Live')
                    ->orderBy('updated_at', 'desc')
                    ->get();
        $food_menus = RestaurantFoodMenu::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        $ingredients = DB::table('tbl_restaurant_ingredients')
                        ->leftJoin('tbl_restaurant_purchase_ingredients', 'tbl_restaurant_purchase_ingredients.ingredient_id', '=', 'tbl_restaurant_ingredients.id')
                        ->leftJoin('tbl_restaurant_ingredient_units', 'tbl_restaurant_ingredient_units.id', '=', 'tbl_restaurant_ingredients.unit_id')
                        ->orderBy('tbl_restaurant_ingredients.name', 'ASC')
                        ->select('tbl_restaurant_ingredients.id', 'tbl_restaurant_ingredients.name as name', 'tbl_restaurant_ingredients.code', 'tbl_restaurant_purchase_ingredients.unit_price as purchase_price', 'tbl_restaurant_ingredient_units.name as unit_name')
                        ->where('tbl_restaurant_purchase_ingredients.del_status', 'Live')
                        ->where('tbl_restaurant_ingredients.restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                        ->get();

        // return $ingredients;

        return view('pages.restaurant.waste.create', compact('nextId', 'employees', 'ingredients', 'food_menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $rules = array(
            'total_loss' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'employee_id' => 'required|numeric',
            'date'          => 'required|date',
           /* 'ingredient_id' => 'required',*/
            'total_loss' => 'required|numeric'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('wastes.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            // return $request->all();

            $waste = new RestaurantWaste;
            $waste->reference_no        = $request->reference_no;
            $waste->date                = $request->date;
            $waste->total_loss          = $request->total_loss;
            $waste->note                = $request->note;
            $waste->employee_id         = $request->employee_id;
            $waste->food_menu_id        = $request->food_menu_id;
            $waste->food_menu_waste_qty = $request->food_menu_waste_qty ? $request->food_menu_waste_qty : null;
            $waste->user_id             = Auth::guard('restaurantUser')->id();
            $waste->restaurant_id       = Auth::guard('restaurantUser')->user()->restaurant_id;
            $waste->save();

            // return [$waste, $request->all()];

            if ($request->ingredient_id) {
                foreach ($request->ingredient_id as $key => $ingredient) {

                    $wasteIngredient = new RestaurantWasteIngredient;
                    $wasteIngredient->ingredient_id         =   $request->ingredient_id[$key];
                    $wasteIngredient->waste_amount          =   $request->waste_amount[$key];
                    $wasteIngredient->last_purchase_price   =   $request->last_purchase_price[$key];
                    $wasteIngredient->loss_amount           =   $request->loss_amount[$key];
                    $wasteIngredient->waste_id              =   $waste->id;
                    $wasteIngredient->restaurant_id         =   $waste->restaurant_id;
                    $wasteIngredient->save();
                }
            }
            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('wastes.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $waste = RestaurantWaste::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $id)->where('del_status', 'Live')->first();

        // return $waste;
        return view('pages.restaurant.waste.show', compact('waste'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $waste = RestaurantWaste::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $id)->where('del_status', 'Live')->first();

        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $food_menus = RestaurantFoodMenu::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        $ingredients = DB::table('tbl_restaurant_ingredients')
                        ->leftJoin('tbl_restaurant_purchase_ingredients', 'tbl_restaurant_purchase_ingredients.ingredient_id', '=', 'tbl_restaurant_ingredients.id')
                        ->leftJoin('tbl_restaurant_ingredient_units', 'tbl_restaurant_ingredient_units.id', '=', 'tbl_restaurant_ingredients.unit_id')
                        ->orderBy('tbl_restaurant_ingredients.name', 'ASC')
                        ->select('tbl_restaurant_ingredients.id', 'tbl_restaurant_ingredients.name as name', 'tbl_restaurant_ingredients.code', 'tbl_restaurant_purchase_ingredients.unit_price as purchase_price', 'tbl_restaurant_ingredient_units.name as unit_name')
                        ->where('tbl_restaurant_purchase_ingredients.del_status', 'Live')
                        ->where('tbl_restaurant_ingredients.restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                        ->get();
        // return $waste;
        return view('pages.restaurant.waste.edit', compact('waste', 'employees', 'food_menus', 'ingredients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $rules = array(
            'total_loss' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'employee_id' => 'required|numeric',
            'date'          => 'required|date',
            'ingredient_id' => 'required',
            'total_loss' => 'required|numeric'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('wastes.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            // return $request->all();

            if (Auth::guard('restaurantUser')->id() == RestaurantWaste::find($id)->user_id) {
                $waste = RestaurantWaste::find($id);

                if ($waste) {
                    $waste->date                = $request->date;
                    $waste->total_loss          = $request->total_loss;
                    $waste->note                = $request->note;
                    $waste->employee_id         = $request->employee_id;
                    $waste->food_menu_id        = $request->food_menu_id ? $request->food_menu_id : null;
                    $waste->food_menu_waste_qty = $request->food_menu_waste_qty ? $request->food_menu_waste_qty : null;
                    $waste->save();

                    // return [$waste, $request->all()];
                    RestaurantWasteIngredient::where('waste_id', $id)->delete();

                    if ($request->ingredient_id) {
                        foreach ($request->ingredient_id as $key => $ingredient) {

                            $wasteIngredient = new RestaurantWasteIngredient;
                            $wasteIngredient->ingredient_id         =   $request->ingredient_id[$key];
                            $wasteIngredient->waste_amount          =   $request->waste_amount[$key];
                            $wasteIngredient->last_purchase_price   =   $request->last_purchase_price[$key];
                            $wasteIngredient->loss_amount           =   $request->loss_amount[$key];
                            $wasteIngredient->waste_id              =   $waste->id;
                            $wasteIngredient->restaurant_id         =   $waste->restaurant_id;
                            $wasteIngredient->save();
                        }
                    }
                    toastr()->success('Updated  successfully.');
                    // redirect
                    return redirect()->route('wastes.index');

                } else {
                    toastr()->error('Unable to Updated.');
                    // redirect
                    return redirect()->route('wastes.index');
                }
            } else {
                toastr()->error('You are not allowed to Edit this resource because this is not belongs to you.');
                // redirect
                return redirect()->route('wastes.index');
            }
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
        if (Auth::guard('restaurantUser')->id() == RestaurantWaste::find($id)->user_id) {
            $waste = RestaurantWaste::find($id);
            if ($waste) {
                $waste->del_status = "Deleted";
                $waste->save();

                foreach ($waste->wasteIngredients as $wasteIngredient) {
                    $wasteIngredient->del_status = "Deleted";
                    $wasteIngredient->save();
                }

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('wastes.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('wastes.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('wastes.index');
        }
    }

    // get food menus ingredients by ajax

    public function getFoodMenusIngredientsByAjax(Request $request){

        $food_menus_ingredients = RestaurantFoodMenuIngredient::where('food_menu_id', $request->id)->where('del_status', 'Live')->orderBy('updated_at', 'asc')->get();

        foreach ($food_menus_ingredients as $key => $food_menus_ingredient) {
            $food_menus_ingredients[$key]->ingredientInfo =  RestaurantIngredient::with('unitInfo:id,name')->where('id', $food_menus_ingredient->ing_id)->where('del_status', 'Live')->first();
        }
        return response()->json($food_menus_ingredients);
    }



}
