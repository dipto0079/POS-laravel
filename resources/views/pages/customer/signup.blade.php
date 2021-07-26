@extends('layouts.customer.app')

<?php
$baseURL = getBaseURL()
?>
@section('title')
    <title>Ask Me Pos | Find A Restaurant </title>
@endsection

@section('content')
    <div class="parallax-mirror" style="visibility: visible; z-index: -100; position: fixed; top: -10px; left: 0px; overflow: hidden; transform: translate3d(0px, 0px, 0px); height: 590px; width: 100%;">
        <img class="parallax-slider" src="{!! $baseURL.'assets/images/b-2.jpg'!!}" style="transform: translate3d(0px, 0px, 0px); position: absolute; top: 8px; left: 0px; height: 548px; width: 100%; max-width: none;">
    </div>

    <div id="parallax-wrap" class="parallax-container parallax-home parallax-search" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="{!! $baseURL.'assets/images/index_background.png'!!}">
        <div class="search-wraps advance-search" style="padding-top:50px;">
            <h1 class="home-search-text">Login & Signup</h1>
            <p class="home-search-subtext">sign up to start ordering</p>

        </div> <!--search-wrapper-->
    </div>
    <!--section--->
    <div class="sections section-grey2 section-checkout" style="transform: none;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box-grey rounded">
                        <div class="section-label bottom20">
                            <a class="section-label-a">
                                {{-- <i class="ion-android-contact i-big"></i>  --}}
                                <i class="fa fa-user i-big"></i>
                                <span class="bold" style="background:#fff;"> Log in to your account</span> <b></b>
                            </a>
                        </div>
                        <form id="forms" class="forms" method="POST" action="{{ route('customer.doLogin') }}">
                            @csrf
                            <div class="row top10">
                                <div class="col-md-12 ">
                                    <input class="grey-fields" placeholder="Mobile number or email" required="required" type="text" value="" name="email_phone" id="email_phone">
                                </div>
                            </div>
                            <!--row-->
                            <div class="row top10">
                                <div class="col-md-12 ">
                                    <input class="grey-fields" placeholder="Password" required="required" type="password" value="" name="password" id="password">
                                </div>
                            </div>
                            <!--row-->
                            <div class="row top15">
                                <div class="col-md-6">
                                    <a href="{{route('reset')}}" class="forgot-pass-link2 block orange-text text-center"> Forgot Password <i class="ion-help"></i>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" value="Login" class="theme-button medium full-width">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box-grey rounded top-line-theme">
                        <form id="form-signup" class="form-signup" method="POST" action="{{ route('customer.doSignUp') }}">
                            @csrf
                            <div class="section-label bottom20">
                                <a class="section-label-a">
                                    {{-- <i class="ion-compose  i-big green-color"></i>  --}}
                                    <i class="fa fa-edit i-big theme-color"></i>
                                    <span class="bold" style="background:#fff;"> Sign up</span>
                                    <b></b>
                                </a>
                            </div>
                            <div class="row top10">
                                <div class="col-md-12">
                                    <input class="grey-fields" placeholder="Name" required="required" type="text" value="{{old('name')}}" name="name" id="name">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger" style="padding: 5px !important; margin:5px 0px 0px 0px !important;">
                                            <p>
                                            <p>{{ $errors->first('name') }}</p></p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row top10">
                                <div class="col-md-6">
                                    <input class="grey-fields" placeholder="Phone" required="required" type="text" value="{{old('phone')}}" name="phone" id="phone">
                                    @if ($errors->has('phone'))
                                        <div class="alert alert-danger" style="padding: 5px !important; margin:5px 0px 0px 0px !important;">
                                            <p>
                                            <p>{{ $errors->first('phone') }}</p></p>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input class="grey-fields" placeholder="Email Address" required="required" type="email" value="{{old('email')}}" name="email" id="email">
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger" style="padding: 5px !important; margin:5px 0px 0px 0px !important;">
                                            <p>
                                            <p>{{ $errors->first('email') }}</p></p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row top10">
                                <div class="col-md-12">
                                    <input class="grey-fields" placeholder="Password" required="required" type="text" value="" name="password" id="password">
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" style="padding: 5px !important; margin:5px 0px 0px 0px !important;">
                                            <p>
                                            <p>{{ $errors->first('password') }}</p></p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row top10">
                                <div class="col-md-12">
                                    <input class="grey-fields" placeholder="Confirm Password" required="required" type="text" value="" name="password_confirmation" id="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="alert alert-danger" style="padding: 5px !important; margin:5px 0px 0px 0px !important;">
                                            <p>
                                            <p>{{ $errors->first('password_confirmation') }}</p></p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- <p class="text-muted"> By creating an account, you agree to receive sms from vendor. </p> --}}
                            <div class="row top10">
                                <div class="col-md-12 ">
                                    <input type="submit" value="Create Account" class="theme-button medium block full-width">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    {{-- <script src="{!! $baseURL.'resources/assets/js/custom/customer/featuredRestaurant.js'!!}"></script> --}}
    <script src="{!! $baseURL.'assets/plugins/input-mask/jquery.inputmask.js'!!}"></script>
    <script>
        $('#phone').inputmask("+19999999999");
    </script>
@endsection
