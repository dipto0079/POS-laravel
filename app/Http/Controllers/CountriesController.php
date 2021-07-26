<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\False_;

class CountriesController extends Controller
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
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superAdmin.settings.country.create');
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
            'name' => 'required|unique:tbl_countries,name',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('countries.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = new Country();
            $country->name = $request->name;
            $country->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('countries.index');
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
        $country = Country::find($id);

        return view('pages.superAdmin.settings.country.edit', compact('country'));
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
            'name' => 'required|unique:tbl_countries,name,' . $id,
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('countries.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $country = Country::find($id);
            $country->name = $request->name;
            $country->save();

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('countries.index');
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
        $country = Country::find($id);
        if ($country) {
            $country = Country::find($id);
            $country->del_status = "Deleted";
            $country->save();


            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('countries.index');
        }
    }
    public function csvadd(Request $request){

//        $f = $_FILES['filecvs']['name'];
//
//        if($_FILES['filecvs']['size'] > 0){
//            $myfile= fopen($f,'r');
//
//            while (($a = fgetcsv($myfile,100,","))!==FALSE){
//                    echo $myfile;
//            }
//        }
//        $handle = fopen($_FILES['filename']['tmp_name'], "r");
//        $headers = fgetcsv($handle, 1000, ",");
//        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
//        {
//            $data[0];
//            $data[1];
//        }
//        fclose($handle);





//        $myfile= fopen($f,'r');
//        while($row = fgetcsv($myfile)){
//            var_dump($row);


//        echo $_FILES['filecvs']['tmp_name'];
    }
}
