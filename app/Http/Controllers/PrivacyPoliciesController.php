<?php

namespace App\Http\Controllers;

use App\PrivacyPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrivacyPoliciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @return mixed
     */
    public function show()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('pages.superAdmin.settings.privacyPolicies', compact('privacyPolicy'));
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
            'privacy_policy' => 'required',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('privacyPolicies.show')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $privacyPolicy = PrivacyPolicy::find($id);

            if ($privacyPolicy) {
                $privacyPolicy->privacy_policies = $request->privacy_policy;
                $privacyPolicy->save();

                toastr()->success('Updated successfully.');
                // redirect
                return redirect()->route('privacyPolicies.show');
            } else {
                toastr()->error('Invalid resource trying to update.');
                return redirect()->route('privacyPolicies.show');
            }
        }
    }
}
