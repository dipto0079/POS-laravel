<?php

namespace App\Http\Controllers;

use App\RestaurantIngredient;
use App\RestaurantStockAdjustment;
use App\RestaurantStockAdjustmentIngredient;
use App\RestaurantUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RestaurantStockAdjustmentsController extends Controller
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
        $stockAdjustments = RestaurantStockAdjustment::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        return view('pages.restaurant.stockAdjustment.index', compact('stockAdjustments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastId = RestaurantStockAdjustment::select('reference_no')->orderBy('created_at', 'desc')->first();
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
        
        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get(); 

        return view('pages.restaurant.stockAdjustment.create', compact('nextId', 'employees', 'ingredients'));
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
            'reference_no' => 'required',
            'employee_id' => 'required|numeric',
            'ingredient_id' => 'required',
            'consumption_amount' => 'required',
            'consumption_status' => 'required',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('stock-adjustment.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $stockAdjustment = new RestaurantStockAdjustment;
            $stockAdjustment->reference_no = $request->reference_no;
            $stockAdjustment->date = $request->date;
            $stockAdjustment->note = $request->note;
            $stockAdjustment->employee_id = $request->employee_id;
            $stockAdjustment->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $stockAdjustment->user_id = Auth::guard('restaurantUser')->id();
            $stockAdjustment->save();

            for ($i = 0; $i < count($request->input('ingredient_id')); $i++) {
                $stockAdjustmentIngredient = new RestaurantStockAdjustmentIngredient;
                $stockAdjustmentIngredient->ingredient_id = $request->ingredient_id[$i];
                $stockAdjustmentIngredient->consumption_amount = $request->consumption_amount[$i];
                $stockAdjustmentIngredient->consumption_status = $request->consumption_status[$i];
                $stockAdjustmentIngredient->stock_adjustment_id	 = $stockAdjustment->id;
                $stockAdjustmentIngredient->restaurant_id = $stockAdjustment->restaurant_id;

                $stockAdjustmentIngredient->save();

                // if ($stockAdjustmentIngredient->save()) {
                //     $ingredients = RestaurantIngredient::find($stockAdjustmentIngredient->ingredient_id);
                //     $ingredients->current_stock = $ingredients->current_stock + $stockAdjustmentIngredient->quantity_amount;
                //     $ingredients->save();
                // }

            }

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('stock-adjustment.index');
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
        $stockAdjustment = RestaurantStockAdjustment::with('stockAdjustmentIngredients')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $id)->where('del_status', 'Live')->first();

        
        return view('pages.restaurant.stockAdjustment.show', compact('stockAdjustment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stockAdjustment = RestaurantStockAdjustment::with('stockAdjustmentIngredients')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('id', $id)->where('del_status', 'Live')->first();

        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $ingredients = RestaurantIngredient::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->with('creatorInfo', 'categoryInfo', 'unitInfo')->orderBy('updated_at', 'desc')->get(); 
        // return $stockAdjustment;
        return view('pages.restaurant.stockAdjustment.edit', compact('stockAdjustment', 'employees', 'ingredients'));
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
            'reference_no' => 'required',
            'employee_id' => 'required|numeric',
            'ingredient_id' => 'required',
            'consumption_amount' => 'required',
            'consumption_status' => 'required',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('stock-adjustment.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            // return $request->all();
            
            if (Auth::guard('restaurantUser')->id() == RestaurantStockAdjustment::find($id)->user_id) {
                $stockAdjustment = RestaurantStockAdjustment::find($id);
                
                if ($stockAdjustment) {
                    $stockAdjustment->date                = $request->date;
                    $stockAdjustment->note                = $request->note;
                    $stockAdjustment->employee_id         = $request->employee_id;
                    $stockAdjustment->save();

                    RestaurantStockAdjustmentIngredient::where('stock_adjustment_id', $id)->delete();

                    if ($request->ingredient_id) {
                        foreach ($request->ingredient_id as $key => $ingredient) {
                            
                            $stockAdjustmentIngredient = new RestaurantStockAdjustmentIngredient;
                            $stockAdjustmentIngredient->ingredient_id = $request->ingredient_id[$key];
                            $stockAdjustmentIngredient->consumption_amount = $request->consumption_amount[$key];
                            $stockAdjustmentIngredient->consumption_status = $request->consumption_status[$key];
                            $stockAdjustmentIngredient->stock_adjustment_id	 = $stockAdjustment->id;
                            $stockAdjustmentIngredient->restaurant_id = $stockAdjustment->restaurant_id;

                            $stockAdjustmentIngredient->save();
                        }
                    }
                    toastr()->success('Updated  successfully.');
                    // redirect
                    return redirect()->route('stock-adjustment.index');
                    
                } else {
                    toastr()->error('Unable to Updated.');
                    // redirect
                    return redirect()->route('stock-adjustment.index');
                }
            } else {
                toastr()->error('You are not allowed to Edit this resource because this is not belongs to you.');
                // redirect
                return redirect()->route('stock-adjustment.index');
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

        if (Auth::guard('restaurantUser')->id() == RestaurantStockAdjustment::find($id)->user_id) {
            $stockAdjustment = RestaurantStockAdjustment::find($id);
            if ($stockAdjustment) {
                $stockAdjustment->del_status = "Deleted";
                $stockAdjustment->save();

                foreach ($stockAdjustment->stockAdjustmentIngredients as $stockAdjustmentIngredient) {
                    $stockAdjustmentIngredient->del_status = "Deleted";
                    $stockAdjustmentIngredient->save();
                }

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('stock-adjustment.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('stock-adjustment.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('stock-adjustment.index');
        }
    }
}
