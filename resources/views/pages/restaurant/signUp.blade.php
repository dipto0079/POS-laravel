@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="sign-up-box">
        <div class="content">

            <div class="bg_overlay"></div>
            <div class="logo-box">
                <h1>Ask Me Pos</h1>
            </div>


            <!-- /.login-logo -->
            <div class="login-box-body">
                <form method="post" action="{{ route('restaurant.doSignUp') }}">
                    @csrf
                    <fieldset>
                        <legend>Restaurant Information</legend>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-3">
                                <label>ID <span class="required_star">*</span></label>
                                <input type="text" name="restaurant_id" value="{{$id}}" class="form-control" placeholder="ID"
                                       readonly>
                                @if ($errors->has('restaurant_id'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('restaurant_id') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Name <span class="required_star">*</span></label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                       placeholder="Name">
                                @if ($errors->has('name'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('name') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Phone <span class="required_star">*</span></label>
                                <input type="text" name="phone" value="{{old('phone')}}" class="form-control"
                                       placeholder="Phone">
                                @if ($errors->has('phone'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('phone') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Email <span class="required_star">*</span></label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                       placeholder="Email">
                                @if ($errors->has('email'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('email') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <!-- /.col -->
                        </div>
                    </fieldset>
                    <br/>
                    <fieldset>
                        <legend>Location Information</legend>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-4">
                                <label>Country <span class="required_star">*</span></label>
                                <select tabindex="2" class="form-control select2" name="country"
                                        style="width: 100%;" id="country">
                                    <option value="">Select a Country</option>
                                    @if(count($countries) > 0)
                                        @foreach($countries as $k=>$v)
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('country'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('country') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label>State <span class="required_star">*</span></label>
                                <select tabindex="2" class="form-control select2" name="state"
                                        style="width: 100%;" id="state">
                                    <option value="">Select a State</option>
                                    {{--@if(count($states) > 0)
                                        @foreach($states as $k=>$v)
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
                                    @endif--}}
                                </select>
                                @if ($errors->has('state'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('state') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label>City <span class="required_star">*</span></label>
                                <select tabindex="2" class="form-control select2" name="city" id="city"
                                        style="width: 100%;">
                                    <option value="">Select a City</option>
                                    {{--@if(count($cities) > 0)
                                        @foreach($cities as $k=>$v)
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
                                    @endif--}}
                                </select>
                                @if ($errors->has('city'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('city') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12 address-label-mt">
                                <label>Address <span class="required_star">*</span></label>
                                <input type="text" name="address" value="{{old('address')}}" class="form-control"
                                       placeholder="Address">
                                @if ($errors->has('address'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('address') }}</p></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Owner Information</legend>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-3">
                                <label>Manager Name <span class="required_star">*</span></label>
                                <input type="text" name="manager_name" value="{{old('manager_name')}}"
                                       class="form-control" placeholder="Manager Name">
                                @if ($errors->has('manager_name'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('manager_name') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Manager Phone <span class="required_star">*</span></label>
                                <input type="text" name="manager_phone" value="{{old('manager_phone')}}"
                                       class="form-control"
                                       placeholder="Manager Phone">
                                @if ($errors->has('manager_phone'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('manager_phone') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Manager Email <span class="required_star">*</span></label>
                                <input type="email" name="manager_email" value="{{old('manager_email')}}"
                                       class="form-control"
                                       placeholder="Manager Email">
                                @if ($errors->has('manager_email'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('manager_email') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <label>Manager Password <span class="required_star">*</span></label>
                                <input type="password" name="manager_password" value="{{old('manager_password')}}"
                                       class="form-control"
                                       placeholder="Manager Password">
                                @if ($errors->has('manager_password'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>
                                        <p>{{ $errors->first('manager_password') }}</p></p>
                                    </div>
                                @endif
                            </div>
                            <!-- /.col -->
                        </div>
                    </fieldset>
                    <br>
                    <fieldset>
                        <legend>Privacy Policy</legend>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-12">
                                <input type="checkbox" class="form-check-input" id="ppCheckBox">
                                <small class="form-check-label text-muted">By Registering You Confirm That You Accept
                                    The Terms & Conditions And Privacy Policy ( <a href="#ppModal">View Privacy
                                        Policy</a> )</small>
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="ppModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="exampleModalLongTitle">Privacy Policy</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $privacyPolicy->privacy_policies !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            <button type="submit" name="submit" value="submit" class="custom-btn disabled-btn-bg" disabled
                                    id="sign-up-button">Sign up
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row already-have-acc-footer" align="center">
                        <!-- /.col -->
                        <div class="col-xs-12">
                            Already have an account? <a href="{{route('restaurant.showLoginForm')}}">Login</a>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/signUp.js'!!}"></script>
@endsection
