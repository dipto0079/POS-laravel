<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Imports\RestaurantIngredientImport;
use App\RestaurantIngredient;
use App\RestaurantIngredientCategory;
use App\RestaurantIngredientUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

class RestaurantIngredientsController extends Controller
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
       
        $restaurantId = Auth::guard('restaurantUser')->user()->restaurant_id;

        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get();

        //use for show current stock
        foreach ($ingredients as $key => $ingredient) {
            # code...
            $sql = "SELECT (select SUM(quantity_amount) from tbl_restaurant_purchase_ingredients where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_purchase, 
            (select SUM(consumption) from tbl_restaurant_sales_consumptions_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND del_status='Live') total_consumption,
            (select SUM(consumption) from tbl_restaurant_sales_cons_of_mod_of_menus where ingredient_id=i.id AND restaurant_id=$restaurantId AND  del_status='Live') total_modifiers_consumption,
            (select SUM(waste_amount) from tbl_restaurant_waste_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND tbl_restaurant_waste_ingredients.del_status='Live') total_waste,
            (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Plus') total_consumption_plus,
            (select SUM(consumption_amount) from tbl_restaurant_stock_adjustment_ingredients  where ingredient_id=i.id AND restaurant_id=$restaurantId AND  tbl_restaurant_stock_adjustment_ingredients.del_status='Live' AND  tbl_restaurant_stock_adjustment_ingredients.consumption_status='Minus') total_consumption_minus,
            (select name from tbl_restaurant_ingredient_categories where id=i.category_id AND del_status='Live') category_name,
            (select name from tbl_restaurant_ingredient_units where id=i.unit_id AND del_status='Live') unit_name
            FROM tbl_restaurant_ingredients i WHERE i.del_status='Live' AND i.id='$ingredient->id' AND i.restaurant_id= '$restaurantId' ORDER BY i.name ASC";
    
            $stock = DB::select($sql);
            foreach ($stock as $value) {
                $totalStock = $value->total_purchase - $value->total_consumption - $value->total_modifiers_consumption - $value->total_waste + $value->total_consumption_plus - $value->total_consumption_minus;
                $ingredients[$key]->current_stock = $totalStock;
            }
            
    
        }
        // return $ingredients;


        return view('pages.restaurant.purchase.ingredient.index', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $units = RestaurantIngredientUnit::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.purchase.ingredient.create', compact('categories', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $rules = array(
            'name' => 'required',
            'category' => 'required|numeric',
            'unit' => 'required|numeric',
            'purchase_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'alert_quantity' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        );

        //$request->code ? $rules['code'] = 'required|unique:tbl_restaurant_ingredients,code' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('ingredients.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $category = RestaurantIngredientCategory::find($request->category);
            $unit = RestaurantIngredientUnit::find($request->unit);
            //return [$category, $unit];

            if ($category && $unit) {
                $ingredient = new RestaurantIngredient();
                $ingredient->name = $request->name;
                $ingredient->category_id = $request->category;
                $ingredient->unit_id = $request->unit;
                $ingredient->purchase_price = $request->purchase_price;
                $ingredient->alert_quantity = $request->alert_quantity;
                $ingredient->code = $request->code;
                $ingredient->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $ingredient->user_id = Auth::guard('restaurantUser')->id();
                $ingredient->save();

                toastr()->success('Added successfully.');
                // redirect
                return redirect()->route('ingredients.index');
            } else {
                toastr()->error('Invalid category & unit name found.');
                return redirect()->route('ingredients.create');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredient::find($id)->created_by) {
            $ingredient = RestaurantIngredient::find($id);
            $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $units = RestaurantIngredientUnit::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            return view('pages.restaurant.purchase.ingredient.edit', compact('ingredient', 'categories', 'units'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('ingredients.index');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredient::find($id)->created_by) {
            $rules = array(
                'name' => 'required',
                'category' => 'required|numeric',
                'unit' => 'required|numeric',
                'purchase_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'alert_quantity' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            );

            $request->code ? $rules['code'] = 'required|unique:tbl_restaurant_ingredients,code,' . $id : '';

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $category = RestaurantIngredientCategory::find($request->category);
                $unit = RestaurantIngredientCategory::find($request->unit);

                if ($category && $unit) {
                    $ingredient = RestaurantIngredient::find($id);
                    $ingredient->name = $request->name;
                    $ingredient->category_id = $request->category;
                    $ingredient->unit_id = $request->unit;
                    $ingredient->purchase_price = $request->purchase_price;
                    $ingredient->alert_quantity = $request->alert_quantity;
                    $ingredient->code = $request->code;
                    $ingredient->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                    $ingredient->user_id = Auth::guard('restaurantUser')->id();
                    $ingredient->save();

                    toastr()->success('Updated successfully.');
                    // redirect
                    return redirect()->route('ingredients.index');
                } else {
                    toastr()->error('Invalid category & unit name found.');
                    return redirect()->back();
                }
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('ingredient-units.index');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredient::find($id)->created_by) {
            $ingredient = RestaurantIngredient::find($id);
            if ($ingredient) {
                $ingredient = RestaurantIngredient::find($id);
                $ingredient->del_status = "Deleted";
                $ingredient->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('ingredients.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('ingredients.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('ingredients.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('pages.restaurant.purchase.ingredient.upload');
    }

    /**
     * Storing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $rules = array(
            'file' => 'required|mimes:xlsx,xls'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store

            if ($request->hasFile('file')) {
                if ($request->remove_all_prev_data) {

                    Schema::disableForeignKeyConstraints();
                    RestaurantIngredient::truncate();
                    Schema::enableForeignKeyConstraints();
                }

                $path = $request->file('file')->getRealPath();
                try {
                    Excel::import(new RestaurantIngredientImport, $path);

                    toastr()->success('Successfully upload.');
                    // redirect
                    return redirect()->route('ingredients.index');
                } catch (Exception $exception) {
                    toastr()->error('Unable to upload. Try again later with given instruction in the sample file.');
                    // redirect
                    return redirect()->route('ingredients.index');
                }
            }
        }
    }

    /**
     * Show a sa,ple file for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadSampleFile()
    {
        $filePath = url('/resources/assets/sampleFiles/Ingredient.xlsx');
        return redirect($filePath);
    }
}
