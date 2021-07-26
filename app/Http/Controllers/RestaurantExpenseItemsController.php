<?php

namespace App\Http\Controllers;

use App\RestaurantExpenseItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RestaurantExpenseItemsController extends Controller
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
        
        $expenseItems = RestaurantExpenseItem::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        return view('pages.restaurant.expense.expenseItem.index', compact('expenseItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.expense.expenseItem.create');
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
            'name' => 'required',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('expense-items.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $expenseItem = new RestaurantExpenseItem;
            $expenseItem->name = $request->name;
            $expenseItem->description = $request->description;
            $expenseItem->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $expenseItem->user_id = Auth::guard('restaurantUser')->id();
            $expenseItem->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('expense-items.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        if (Auth::guard('restaurantUser')->id() == RestaurantExpenseItem::find($id)->user_id) {
            $expenseItem = RestaurantExpenseItem::find($id);

            return view('pages.restaurant.expense.expenseItem.edit', compact('expenseItem'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('expense-items.index');
        }
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
        if (Auth::guard('restaurantUser')->id() == RestaurantExpenseItem::find($id)->user_id) {
            $rules = array(
                'name' => 'required',
            );

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $expenseItem = RestaurantExpenseItem::find($id);
                $expenseItem->name = $request->name;
                $expenseItem->description = $request->description;
                $expenseItem->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $expenseItem->user_id = Auth::guard('restaurantUser')->id();
                $expenseItem->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('expense-items.index');
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('expense-items.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantExpenseItem::find($id)->user_id) {
            $expenseItem = RestaurantExpenseItem::find($id);
            if ($expenseItem) {
                $expenseItem = RestaurantExpenseItem::find($id);
                $expenseItem->del_status = "Deleted";
                $expenseItem->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('expense-items.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('expense-items.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('expense-items.index');
        }
    }
    
}
