<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\RestaurantFoodMenuShift;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RestaurantFoodMenuShiftsController extends Controller
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
        $shifts = RestaurantFoodMenuShift::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.sale.foodMenuShift.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.sale.foodMenuShift.create');
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
            'starting_time' => 'required',
            'ending_time' => 'required'
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('food-menu-shifts.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            $startTime  = $request->starting_time;
            $endTime    = $request->ending_time;


            // $bookedShifts = RestaurantFoodMenuShift::where(function ($query) use ($startTime, $endTime) {
            //     $query->where(function ($query) use ($startTime, $endTime) {
            //         $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->where('starting_time', '>=', $startTime)
            //             ->where('ending_time', '<', $startTime);
            //     })
            //         ->orWhere(function ($query) use ($startTime, $endTime) {
            //             $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->where('starting_time', '<', $endTime)
            //                 ->where('ending_time', '>=', $endTime);
            //         });
            // })->count();


//            $bookedShifts = RestaurantFoodMenuShift::where(function ($query) use ($startTime, $endTime) {
//                $query->where(function ($query) use ($startTime, $endTime) {
//                    $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
//                            ->where('del_status', 'Live')
//                            ->where('starting_time', '>=', $startTime)
//                            ->where('ending_time', '<', $startTime);
//                })
//                    ->orWhere(function ($query) use ($startTime, $endTime) {
//                        $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
//                                ->where('del_status', 'Live')
//                                ->where('starting_time', '<', $endTime)
//                                ->where('ending_time', '>=', $endTime);
//                    });
//            })->count();

        //    return $bookedShifts;

/*            $bookedShifts = RestaurantFoodMenuShift::where(function ($query) use ($startTime, $endTime) {
                $query->where(function ($query) use ($startTime, $endTime) {
                    $query->where(function ($query) use ($startTime, $endTime) {
                        $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live');
                    })
                        ->where('starting_time', '>=', $startTime)
                        ->where('ending_time', '<', $startTime);
                })
                    ->orWhere(function ($query) use ($startTime, $endTime) {
                        $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
                            ->where('starting_time', '<', $endTime)
                            ->where('ending_time', '>=', $endTime);
                    });
            })->count();*/
            $bookedShifts =0;
            if ($bookedShifts > 0) {
                toastr()->error('Starting Time can not overlap the ending time of previous Shift and Ending Time can not overlap the starting time of next shift');
                return redirect()->back()->withInput(\request()->all());
            } else {
                // store
                $shift = new RestaurantFoodMenuShift();
                $shift->name = $request->name;
                $shift->starting_time = $request->starting_time;
                $shift->ending_time = $request->ending_time;
                $shift->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $shift->user_id = Auth::guard('restaurantUser')->id();
                $shift->save();

                toastr()->success('Added successfully.');
                // redirect
                return redirect()->route('food-menu-shifts.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuShift::find($id)->user_id) {
            $shift = RestaurantFoodMenuShift::find($id);

            return view('pages.restaurant.sale.foodMenuShift.edit', compact('shift'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-shifts.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuShift::find($id)->user_id) {
            $rules = array(
                'name' => 'required',
                'starting_time' => 'required',
                'ending_time' => 'required'
            );

            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                $startTime = $request->starting_time;
                $endTime = $request->ending_time;

                $bookedShifts = RestaurantFoodMenuShift::where(function ($query) use ($startTime, $endTime) {
                    $query->where(function ($query) use ($startTime, $endTime) {
                        $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->where('starting_time', '>=', $startTime)
                            ->where('ending_time', '<', $startTime);
                    })
                        ->orWhere(function ($query) use ($startTime, $endTime) {
                            $query->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->where('starting_time', '<', $endTime)
                                ->where('ending_time', '>=', $endTime);
                        });
                })->count();

//            return $bookedShifts;

                if ($bookedShifts > 0) {
                    toastr()->error('Starting Time can not overlap the ending time of previous Shift and Ending Time can not overlap the starting time of next shift');
                    return redirect()->back()->withInput(\request()->all());
                } else {
                    // store
                    $shift = RestaurantFoodMenuShift::find($id);
                    $shift->name = $request->name;
                    $shift->starting_time = $request->starting_time;
                    $shift->ending_time = $request->ending_time;
                    $shift->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                    $shift->user_id = Auth::guard('restaurantUser')->id();
                    $shift->save();

                    toastr()->success('Updated successfully.');
                    // redirect
                    return redirect()->route('food-menu-shifts.index');
                }
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-shifts.index');
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
        if (Auth::guard('restaurantUser')->id() == RestaurantFoodMenuShift::find($id)->user_id) {
            $shift = RestaurantFoodMenuShift::find($id);
            if ($shift) {
                $shift = RestaurantFoodMenuShift::find($id);
                $shift->del_status = "Deleted";
                $shift->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('food-menu-shifts.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('food-menu-shifts.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('food-menu-shifts.index');
        }
    }
}
