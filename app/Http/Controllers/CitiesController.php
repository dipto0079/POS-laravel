<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $states = State::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.city.create', compact('countries', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'country' => 'required',
            'state' => 'required'
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('cities.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = Country::find($request->country);
            $state = State::find($request->state);

            if ($country && $state) {
                $city = new City();
                $city->name = $request->name;
                $city->country = $country->name;
                $city->country_id = $request->country;
                $city->state = $state->name;
                $city->state_id = $request->state;
                $city->save();

                toastr()->success('Added successfully.');
                // redirect
                return redirect()->route('cities.index');
            } else {
                toastr()->error('Invalid country & state name found.');
                return redirect()->route('cities.create');
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
        $city = City::find($id);
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $states = State::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        return view('pages.superAdmin.settings.city.edit', compact('city', 'countries', 'states'));
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
        $rules = array(
            'name' => 'required',
            'country' => 'required',
            'state' => 'required'
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('cities.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = Country::find($request->country);
            $state = State::find($request->state);

            if ($country && $state) {
                $city = City::find($id);
                $city->name = $request->name;
                $city->country = $country->name;
                $city->country_id = $request->country;
                $city->state = $state->name;
                $city->state_id = $request->state;
                $city->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('cities.index');
            } else {
                toastr()->error('Invalid country & state name found.');
                return redirect()->route('cities.create');
            }
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
        $city = City::find($id);
        if ($city) {
            $city = City::find($id);
            $city->del_status = "Deleted";
            $city->save();

            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('cities.index');
        }
    }
}
