@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Restaurant
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="login-box-body ">
                        <!-- /.box-header -->
                        <form method="post" action="{{route('add-rs')}}">
                            @csrf
                            <fieldset>
                                <legend>Restaurant Information</legend>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <label>ID <span class="required_star">*</span></label>
                                        <input type="text" name="restaurant_id" value="{{$id}}"  class="form-control" placeholder="ID"
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
                                        <input type="text" name="name" class="form-control"
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
                                        <input type="text" name="phone" class="form-control"
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
                                        <input type="email" name="email" class="form-control"
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
                                        <input type="text" name="address" class="form-control"
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
                                        <input type="text" name="manager_name"
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
                                        <input type="text" name="manager_phone"
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
                                        <input type="email" name="manager_email"
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
                                        <input type="password" name="manager_password"
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

                            <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-12">
                                    <button type="submit" name="submit"  class="custom-btn disabled-btn-bg" >Add Restaurant
                                    </button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/signUp.js'!!}"></script>
@endsection
