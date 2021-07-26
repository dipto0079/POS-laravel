<?php

namespace App\Http\Controllers;

use App\RestaurantIngredientUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RestaurantIngredientUnitsController extends Controller
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
        $units = RestaurantIngredientUnit::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.purchase.ingredientUnit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.purchase.ingredientUnit.create');
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
            'name' => 'required|alpha',
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
            $unit = new RestaurantIngredientUnit();
            $unit->name = $request->name;
            $unit->description = $request->description;
            $unit->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $unit->user_id = Auth::guard('restaurantUser')->id();
            $unit->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('ingredient-units.index');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredientUnit::find($id)->created_by) {
            $unit = RestaurantIngredientUnit::find($id);

            return view('pages.restaurant.purchase.ingredientUnit.edit', compact('unit'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('ingredient-units.index');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredientUnit::find($id)->created_by) {
            $rules = array(
                'name' => 'required|alpha',
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
                $unit = RestaurantIngredientUnit::find($id);
                $unit->name = $request->name;
                $unit->description = $request->description;
                $unit->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $unit->user_id = Auth::guard('restaurantUser')->id();
                $unit->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('ingredient-units.index');
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
        if (Auth::guard('restaurant')->id() === RestaurantIngredientUnit::find($id)->created_by) {
            $unit = RestaurantIngredientUnit::find($id);
            if ($unit) {
                $unit = RestaurantIngredientUnit::find($id);
                $unit->del_status = "Deleted";
                $unit->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('ingredient-units.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('ingredient-units.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('ingredient-units.index');
        }
    }
}
