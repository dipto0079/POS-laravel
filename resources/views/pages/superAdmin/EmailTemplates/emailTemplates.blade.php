@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Email Settings
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-8">
                        <label>Email Encryption </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>SMTP Host </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>SMTP Port </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>Email</label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>SMTP Username </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>SMTP Password </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>Email Charset </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>BCC All Emails To </label><br>
                        <input type="text" class="form-control">
                    </div><br>
                    <div class="col-md-8">
                        <label>Email Signature </label><br>
                        <input type="text" class="form-control">
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
