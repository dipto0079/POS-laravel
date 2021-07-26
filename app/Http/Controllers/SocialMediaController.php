<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
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
        $socialMediaList = SocialMedia::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.superAdmin.settings.socialMedia.index', compact('socialMediaList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.superAdmin.settings.socialMedia.create');
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
            'name' => 'required|unique:tbl_social_media,name',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('social-media.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $socialMedia = new SocialMedia;
            $socialMedia->name = $request->name;
            $socialMedia->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('social-media.index');
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
        $socialMedia = SocialMedia::find($id);
        return view('pages.superAdmin.settings.socialMedia.edit', compact('socialMedia'));
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
            'name' => 'required|unique:tbl_social_media,name,' . $id,
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('social-media.edit', [$id])
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $socialMedia = SocialMedia::find($id);
            $socialMedia->name = $request->name;
            $socialMedia->save();

            toastr()->success('Updated successfully.');
            // redirect
            return redirect()->route('social-media.index');
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
        $socialMedia = SocialMedia::find($id);
        if ($socialMedia) {
            $socialMedia = SocialMedia::find($id);
            $socialMedia->del_status = "Deleted";
            $socialMedia->save();


            toastr()->success('Deleted successfully.');
            // redirect
            return redirect()->route('social-media.index');
        }
    }
    
}
