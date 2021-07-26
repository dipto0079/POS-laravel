<?php

namespace App\Http\Controllers;

use App\RestaurantExpense;
use App\RestaurantExpenseItem;
use App\RestaurantUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;

class RestaurantExpensesController extends Controller
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
        $expenses = RestaurantExpense::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $expenseItems = RestaurantExpenseItem::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.expense.expenses.index', compact('expenses', 'expenseItems', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenseItems = RestaurantExpenseItem::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        return view('pages.restaurant.expense.expenses.create', compact('expenseItems', 'employees'));
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
            'date' => 'required|date',
            'category_id' => 'required|numeric',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'employee_id' => 'required|numeric',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('expenses.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $expense = new RestaurantExpense;
            $expense->date = $request->date;
            $expense->amount = $request->amount;
            $expense->cat_id = $request->category_id;
            $expense->employee_id = $request->employee_id;
            $expense->note = $request->note;
            $expense->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $expense->user_id = Auth::guard('restaurantUser')->id();
            $expense->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('expenses.index');
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


        if (Auth::guard('restaurantUser')->id() == RestaurantExpense::find($id)->user_id) {

            $expense = RestaurantExpense::find($id);
            $expenseItems = RestaurantExpenseItem::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

            return view('pages.restaurant.expense.expenses.edit', compact('expense', 'expenseItems', 'employees'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('expenses.index');
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
        $rules = array(
            'date' => 'required|date',
            'category_id' => 'required|numeric',
            'amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'employee_id' => 'required|numeric',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('expenses.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $expense = RestaurantExpense::find($id);
            $expense->date = $request->date;
            $expense->amount = $request->amount;
            $expense->cat_id = $request->category_id;
            $expense->employee_id = $request->employee_id;
            $expense->note = $request->note;
            $expense->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $expense->user_id = Auth::guard('restaurantUser')->id();
            $expense->save();

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('expenses.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantExpense::find($id)->user_id) {
            $expense = RestaurantExpense::find($id);
            if ($expense) {
                $expense = RestaurantExpense::find($id);
                $expense->del_status = "Deleted";
                $expense->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('expenses.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('expenses.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('expenses.index');
        }
    }

    /**
     * filter sales by date and Payment method
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $date = $request->date;
        $category_id = $request->category_id;
        $employee_id = $request->employee_id;
        $expenses = '';

        if ($date) {

            $expenses = RestaurantExpense::with('expenseItem', 'employee', 'creatorInfo')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('date', $date)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        }else if($category_id){

            $expenses = RestaurantExpense::with('expenseItem', 'employee', 'creatorInfo')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('cat_id', $category_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        }else if($employee_id){

            $expenses = RestaurantExpense::with('expenseItem', 'employee', 'creatorInfo')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('employee_id', $employee_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        }


        return response()->json(['expenses' => $expenses]);
    }


    public function addExpensesCategorys(){

        $add_by = Auth::guard('restaurantUser')->id();
        $resturent = Auth::guard('restaurantUser')->user()->restaurant_id;

        $all_data = DB::table('tbl_restaurant_expense_items')
            ->where('restaurant_id',$resturent)
            ->get();

        return view('pages.restaurant.expense.expenses.add_expenses_category',compact("all_data"));
    }

    public function expensesAddCategorys(Request $request){
        $add_by = Auth::guard('restaurantUser')->id();
        $resturent = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'name' => $request->name,
            'description' => $request->category_description,
            'user_id' => $add_by,
            'restaurant_id'=>$resturent,
            //'del_status'=>$delay,
        );
        toastr()->success('sucessfully Insert.');
        DB::table('tbl_restaurant_expense_items')->insert($data);
        return back();

    }

    public function delete_expensesCategorys($id)
    {
        $add_by = Auth::guard('restaurantUser')->id();
        $resturent = Auth::guard('restaurantUser')->user()->restaurant_id;
        DB::table('tbl_restaurant_expense_items')->where('id', $id)->delete();
        return back()->with('deleted','Sucessfully Deleted.');
    }

    public function edit_expensesCategorys($id)
    {
        $edit_expenses = DB::table('tbl_restaurant_expense_items')
            ->where('id', $id)
            ->first();
        return view('pages.restaurant.expense.expenses.edit_expenses_category', compact('edit_expenses'));
    }

    public function subcatagory_edit(Request $request)
    {
        $id = $request->hidden_id;

        $add_by = Auth::guard('restaurantUser')->id();
        $data = array(
            'name' => $request->name,
            'description' => $request->category_description,
            'user_id' => $add_by,
            'restaurant_id'=>$resturent,

        );

        DB::table('tbl_restaurant_expense_items')
            ->where('id', $id)
            ->update($data);
        return view('pages.restaurant.expense.expenses.add_expenses_category')->with('success','sucessfully Update.');
    }


}
