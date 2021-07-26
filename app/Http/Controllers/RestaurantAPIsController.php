<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;

class RestaurantAPIsController extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatesByCountry($id) {
        $states = State::select('id', 'name')->where('country_id', $id)->where('del_status', 'Live')->orderBy('name', 'asc')->get();

        if ($states) {
            return response()->json([
                'success' => true, 'msg' => 'Resource found against the request.', 'data' => $states
            ]);
        } else {
            return response()->json([
                'success' => false, 'msg' => 'No resource found against the request!'
            ]);
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCitiesByState($id) {
        $cities = City::select('id', 'name')->where('state_id', $id)->where('del_status', 'Live')->orderBy('name', 'asc')->get();

        if ($cities) {
            return response()->json([
                'success' => true, 'msg' => 'Resource found against the request.', 'data' => $cities
            ]);
        } else {
            return response()->json([
                'success' => false, 'msg' => 'No resource found against the request!'
            ]);
        }
    }
}
