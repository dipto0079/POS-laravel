<?php

namespace App\Http\Controllers;

use App\RestaurantIngredientCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class RestaurantIngredientCategoriesController extends Controller
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
        $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo')->orderBy('updated_at', 'desc')->get();
//        return $categories;
        return view('pages.restaurant.purchase.ingredientCategory.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.purchase.ingredientCategory.create');
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
        );

        $request->description ? $rules['description'] = 'required' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('ingredient-categories.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $category = new RestaurantIngredientCategory();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $category->user_id = Auth::guard('restaurantUser')->id();
            $category->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('ingredient-categories.index');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredientCategory::find($id)->created_by) {
            $category = RestaurantIngredientCategory::find($id);

            return view('pages.restaurant.purchase.ingredientCategory.edit', compact('category'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('ingredient-categories.index');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredientCategory::find($id)->created_by) {
            //        return $request->all();
            $rules = array(
                'name' => 'required',
            );

            $request->description ? $rules['description'] = 'required' : '';

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $category = RestaurantIngredientCategory::find($id);
                $category->name = $request->name;
                $category->description = $request->description;
                $category->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $category->user_id = Auth::guard('restaurantUser')->id();
                $category->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('ingredient-categories.index');
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('ingredient-categories.index');
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

        DB::table('tbl_restaurant_ingredient_categories')->where('id', $id)->delete();
        toastr()->success('Deleted successfully.');
        return back();

//        if (Auth::guard('restaurant')->id() === RestaurantIngredientCategory::find($id)->created_by) {
//            $category = RestaurantIngredientCategory::find($id);
//            if ($category) {
//                $category = RestaurantIngredientCategory::find($id);
//                $category->del_status = "Deleted";
//                $category->delete();
//
//                toastr()->success('Deleted successfully.');
//                // redirect
//                return redirect()->route('ingredient-categories.index');
//            } else {
//                toastr()->error('Unable to delete.');
//                // redirect
//                return redirect()->route('ingredient-categories.index');
//            }
//        } else {
//            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
//            // redirect
//            return redirect()->route('ingredient-categories.index');
//        }
    }
}
