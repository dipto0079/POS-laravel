@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Settings Options
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <a role="button" class="btn btn-primary" href="#">Google Map API setting
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="#">Payment Gateway Setting
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="{{route('countries.index')}}">Countries
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="{{route('states.index')}}">States
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="{{route('cities.index')}}">Cities
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="{{route('cuisines.index')}}">Cuisines
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="{{route('privacyPolicies.show')}}">Privacy Policy
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="{{route('social-media.index')}}">Social Media
                            </a>&emsp;
                            <a role="button" class="btn btn-primary" href="{{route('third-party-vendors.index')}}">3rd Parties Venders
                            </a>&emsp;
                            <br>
                            <a role="button" class="btn btn-primary" style="margin-top: 10px;" href="{{route('charges.index')}}">Fee Charges
                            </a>&emsp;
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/privacyPolicies.js'!!}"></script>
@endsection
