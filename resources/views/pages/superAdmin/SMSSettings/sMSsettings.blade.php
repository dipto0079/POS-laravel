@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Sms Settings
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <h3>Twilio</h3>
                    </div>
                    <div class="col-md-8">
                        <label>Account SID</label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>Auth Token </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>Twilio Phone Number</label><br>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-8" style=" padding-top: 20px; ">
                        <h4>Active</h4>
                        <label><input type="radio" id="expense_report" name="expense_report" style="cursor: pointer"
                                      class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>No</label>
                        <label><input type="radio" id="expense_report" name="expense_report" style="cursor: pointer"
                                      class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Yes</label>
                    </div>
                    <div class="col-md-12" style=" padding-top: 20px; ">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
@endsection
