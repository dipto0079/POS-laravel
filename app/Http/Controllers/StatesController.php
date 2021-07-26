<?php

namespace App\Http\Controllers;

use App\Country;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class StatesController extends Controller
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
        $states = State::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.state.create', compact('countries'));
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
            'country' => 'required'
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('states.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = Country::find($request->country);

            if ($country) {
                $state = new State();
                $state->name = $request->name;
                $state->country = $country->name;
                $state->country_id = $request->country;
                $state->save();

                toastr()->success('Added successfully.');
                // redirect
                return redirect()->route('states.index')->with('success', 'Added successfully.');
            } else {
                toastr()->error('Invalid country name found.');
                return redirect()->route('states.create')->with('error', 'Invalid country name found.');
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
        $state = State::find($id);
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

        return view('pages.superAdmin.settings.state.edit', compact('state', 'countries'));
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
            'country' => 'required'
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('states.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = Country::find($request->country);
            if ($country) {
                $state = State::find($id);
                $state->name = $request->name;
                $state->country = $country->name;
                $state->country_id = $request->country;
                $state->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('states.index');
            } else {
                toastr()->error('Invalid country name found.');
                return redirect()->route('states.create');
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
        $state = State::find($id);
        if ($state) {
                $state = State::find($id);
            $state->del_status = "Deleted";
            $state->save();

            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('states.index');
        }
    }
}
