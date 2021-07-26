<?php

namespace App\Http\Controllers;

use App\Cuisine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuisinesController extends Controller
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
        $cuisines = Cuisine::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.cuisine.index', compact('cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superAdmin.settings.cuisine.create');
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
            'name' => 'required|unique:tbl_cuisines,name',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('cuisines.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $cuisine = new Cuisine();
            $cuisine->name = $request->name;
            $cuisine->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('cuisines.index');
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
        $cuisine = Cuisine::find($id);

        return view('pages.superAdmin.settings.cuisine.edit', compact('cuisine'));
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
            'name' => 'required|unique:tbl_cuisines,name,' . $id,
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('cuisines.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $cuisine = Cuisine::find($id);
            $cuisine->name = $request->name;
            $cuisine->save();

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('cuisines.index');
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
        $cuisine = Cuisine::find($id);
        if ($cuisine) {
            $cuisine = Cuisine::find($id);
            $cuisine->del_status = "Deleted";
            $cuisine->save();

            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('cuisines.index');
        }
    }
}
