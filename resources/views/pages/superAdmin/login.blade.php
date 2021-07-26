@extends('layouts.app')

<?php
//$baseURL = getBaseURL()
?>

@section('content')
    <div class="login-box">
        <div class="content">

            <div class="bg_overlay"></div>
            <div class="logo-box">

            </div>


            <!-- /.login-logo -->
            <div class="login-box-body">
                <form method="post" action="{{ route('superAdmin.doLogin') }}">
                    @csrf
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="username_email_phone" value="{{old('username_email_phone')}}" placeholder="Phone Number, Email Address Or Username">
                    </div>

                    @if ($errors->has('username_email_phone'))
                        <div class="alert alert-error" style="padding: 5px !important;">
                            <p>The Phone Number, Email Address Or Username field is required.</p>
                        </div>
                    @endif

                    <div class="form-group has-feedback pass">
                        <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                    </div>

                    @if ($errors->has('password'))
                        <div class="alert alert-error" style="padding: 5px !important;">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" name="submit" value="submit" class="custom-btn">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
