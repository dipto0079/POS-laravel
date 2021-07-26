@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <style type="text/css">
        .required_star {
            color: #dd4b39;
        }

        .radio_button_problem {
            margin-bottom: 19px;
        }

        .radio_button_problem a svg {
            stroke: #00c0ef;
            width: 22px;
            position: relative;
            top: 7px;
            left: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Third Party Vendor
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('third-party-vendors.store')}}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{old('name')}}">
                                        </div>

                                        @if ($errors->has('name'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('name') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input tabindex="1" type="text" name="phone" class="form-control"
                                                   placeholder="Phone" value="{{old('phone')}}">
                                        </div>

                                        @if ($errors->has('phone'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('phone') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input tabindex="1" type="text" name="email" class="form-control"
                                                   placeholder="Email" value="{{old('email')}}">
                                        </div>

                                        @if ($errors->has('email'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('email') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control"
                                                      placeholder="Address"></textarea>
                                        </div>

                                        @if ($errors->has('address'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('address') }}</p>
                                            </div>
                                        @endif

                                        <div class="col-md-4 form-group">
                                            <label>Country</label>
                                            <select tabindex="1" class="form-control select2" name="country"
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
                                        <div class="col-md-4 form-group">
                                            <label>State</label>
                                            <select tabindex="1" class="form-control select2" name="state"
                                                    style="width: 100%;" id="state">
                                                <option value="">Select a State</option>
                                            </select>
                                            @if ($errors->has('state'))
                                                <div class="alert alert-error" style="padding: 5px !important;">
                                                    <p>
                                                    <p>{{ $errors->first('state') }}</p></p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>City</label>
                                            <select tabindex="1" class="form-control select2" name="city" id="city"
                                                    style="width: 100%;">
                                                <option value="">Select a City</option>
                                            </select>
                                            @if ($errors->has('city'))
                                                <div class="alert alert-error" style="padding: 5px !important;">
                                                    <p>
                                                    <p>{{ $errors->first('city') }}</p></p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Percentage Charge</label>
                                            <input tabindex="1" type="number" min="0" name="percentage_charge" class="form-control"
                                                   placeholder="Percentage Charge" value="{{old('percentage_charge')}}">
                                        </div>

                                        @if ($errors->has('percentage_charge'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('percentage_charge') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group radio_button_problem">
                                            <label>Collect Taxes <span class="required_star">*</span></label>
                                            <div class="radio">
                                                <label>
                                                    <input tabindex="5" type="radio" name="collect_tax"
                                                           id="collect_tax_yes" value="Yes" checked>Yes 
                                                </label>
                                                <label>

                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                    <input tabindex="6" type="radio" name="collect_tax"
                                                           id="collect_tax_no" value="No"> No
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('collect_tax'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('collect_tax') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                                <a href="{{route('third-party-vendors.index')}}" role="button" class="btn btn-primary">Back
                                </a>
                            </div>
                        </form>
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
