@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="login-box">
        <div class="content">

            <div class="bg_overlay"></div>
            <div class="logo-box">

            </div>


            <!-- /.login-logo -->
            <div class="login-box-body">
                <form method="post" action="{{ route('restaurant.doLogin') }}">
                    @csrf
                    <div class="form-group has-feedback">
                        <label>ID <span class="required_star">*</span></label>
                        <input type="text" class="form-control" name="id" value="{{old('id')}}" placeholder="ID">
                    </div>

                    @if ($errors->has('id'))
                        <div class="alert alert-error" style="padding: 5px !important;">
                            <p>{{ $errors->first('id') }}</p>
                        </div>
                    @endif

                    <div class="form-group has-feedback">
                        <label>Email <span class="required_star">*</span></label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                    </div>

                    @if ($errors->has('email'))
                        <div class="alert alert-error" style="padding: 5px !important;">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif

                    <div class="form-group has-feedback">
                        <label>Password <span class="required_star">*</span></label>
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

                    <div class="row already-have-acc-footer" align="center">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            Don't have an account? <a href="{{route('restaurant.showSignUpForm')}}">Create one</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
