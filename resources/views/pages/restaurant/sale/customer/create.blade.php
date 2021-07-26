@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Customer
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('customers.store')}}">
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
                                            <input tabindex="1" type="text" name="phone" id="phone" class="form-control"
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

                                        <div class="form-group">
                                            <label>Apt.</label>
                                            <input tabindex="1" type="text" name="apt" class="form-control"
                                                   placeholder="Apt." value="{{old('apt')}}">
                                        </div>

                                        @if ($errors->has('apt'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('apt') }}</p>
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

                                        <div class="form-group">
                                            <label>Zip</label>
                                            <input tabindex="1" type="text" name="zip" class="form-control"
                                                   placeholder="Zip" value="{{old('zip')}}">
                                        </div>

                                        @if ($errors->has('zip'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('zip') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Code</label>
                                            <input tabindex="1" type="text" name="code" class="form-control"
                                                   placeholder="Code" value="{{old('code')}}">
                                        </div>

                                        @if ($errors->has('code'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('code') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea name="note" class="form-control" rows="10"></textarea>
                                        </div>

                                        @if ($errors->has('note'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('note') }}</p>
                                            </div>
                                        @endif

                                        

                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Customer Groups</label>
                                        <select tabindex="1" class="form-control select2" name="customer_group"
                                                style="width: 100%;" id="customer_group">
                                            <option value="">Select a Customer Group</option>
                                            @if(count($customerGroups) > 0)
                                                @foreach($customerGroups as $k=>$v)
                                                    <option value="{{$v->id}}">{{$v->name}}({{$v->discount_percentage}}%)</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('customer_group'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>
                                                <p>{{ $errors->first('customer_group') }}</p></p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                                <a href="{{route('customers.index')}}" role="button" class="btn btn-primary">Back
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
    <script src="{!! $baseURL.'assets/plugins/input-mask/jquery.inputmask.js'!!}"></script>
    <script>
        $('#phone').inputmask("+19999999999");
    </script>

@endsection
