@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Supplier
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('suppliers.store')}}">
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
                                            <label>Contact Person <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="contact_person" class="form-control"
                                                   placeholder="Contact Person" value="{{old('contact_person')}}">
                                        </div>

                                        @if ($errors->has('contact_person'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('contact_person') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Phone <span class="required_star">*</span></label>
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
                                            <label>Fax</label>
                                            <input tabindex="1" type="text" name="fax" class="form-control"
                                                   placeholder="Fax" value="{{old('fax')}}">
                                        </div>

                                        @if ($errors->has('fax'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('fax') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input tabindex="1" type="text" name="bank_name" class="form-control" value="{{old('bank_name')}}">
                                        </div>

                                        @if ($errors->has('bank_name'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('bank_name') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input tabindex="1" type="text" name="account_number" class="form-control" value="{{old('account_number')}}">
                                        </div>

                                        @if ($errors->has('account_number'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('account_number') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Routing Number</label>
                                            <input tabindex="1" type="text" name="routing_number" class="form-control"
                                                   value="{{old('routing_number')}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Due Date</label>
                                            <input tabindex="1" type="text" name="due_date" class="form-control"
                                                   value="{{old('routing_number')}}">
                                        </div>

                                        @if ($errors->has('routing_number'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('routing_number') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Country <span class="required_star">*</span></label>
                                            <select tabindex="1" class="form-control select2" name="country"
                                                    style="Routing Numberwidth: 100%;" id="country">
                                                <option value="">Select a Country</option>
                                                @if(count($countries) > 0)
                                                    @foreach($countries as $k=>$v)
                                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if ($errors->has('country'))
                                                <div class="alert alert-error" style="padding: 5px !important;">
                                                    <p>{{ $errors->first('country') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>State <span class="required_star">*</span></label>
                                            <select tabindex="1" class="form-control select2" name="state"
                                                    style="width: 100%;" id="state">
                                                <option value="">Select a State</option>
                                            </select>
                                            @if ($errors->has('state'))
                                                <div class="alert alert-error" style="padding: 5px !important;">
                                                    <p>{{ $errors->first('state') }}</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>City <span class="required_star">*</span></label>
                                            <select tabindex="1" class="form-control select2" name="city" id="city"
                                                    style="width: 100%;">
                                                <option value="">Select a City</option>
                                            </select>
                                            @if ($errors->has('city'))
                                                <div class="alert alert-error" style="padding: 5px !important;">
                                                    <p>{{ $errors->first('city') }}</p>
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
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="10"></textarea>
                                        </div>

                                        @if ($errors->has('description'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('description') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Category <span class="required_star">*</span></label>
                                            <select tabindex="2" class="form-control select2" name="category[]" multiple="multiple"
                                                    style="width: 100%;">
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $k=>$v)
                                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        @if ($errors->has('category'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('category') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Order Method</label><br>
                                            <label><input type="checkbox" name="order_method[]" value="Email"> Email</label><br>
                                            <label><input type="checkbox" name="order_method[]" value="SMS Message"> SMS Message</label><br>
                                            <label><input type="checkbox" name="order_method[]" value="Fax"> Fax</label><br>
                                        </div>
                                        @if ($errors->has('order_method'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('order_method') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                                <a href="{{route('suppliers.index')}}" role="button" class="btn btn-primary">Back
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
    {{--    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="{!! $baseURL.'assets/bower_components/select2/dist/js/select2.full.min.js'!!}"></script>--}}
    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/state.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/signUp.js'!!}"></script>

@endsection
