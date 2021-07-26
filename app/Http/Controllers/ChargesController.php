<?php

namespace App\Http\Controllers;

use App\Charge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChargesController extends Controller
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
        $charges = Charge::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.charge.index', compact('charges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superAdmin.settings.charge.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = array(
            'name' => 'required|unique:tbl_charges,name',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('charges.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $charge = new Charge;
            $charge->name = $request->name;
            $charge->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('charges.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $charge = Charge::find($id);
        return view('pages.superAdmin.settings.charge.edit', compact('charge'));
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
            'name' => 'required|unique:tbl_charges,name,' . $id,
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('charges.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $charge = Charge::find($id);
            $charge->name = $request->name;
            $charge->save();

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('charges.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $charge = Charge::find($id);
        if ($charge) {
            $charge = Charge::find($id);
            $charge->del_status = "Deleted";
            $charge->save();


            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('charges.index');
        }
    }
}
