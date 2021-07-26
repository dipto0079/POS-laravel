@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Supplier
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('suppliers.update', [$supplier->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{$supplier->name}}">
                                        </div>

                                        @if ($errors->has('name'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('name') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Contact Person <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="contact_person" class="form-control"
                                                   placeholder="Contact Person" value="{{$supplier->contact_person}}">
                                        </div>

                                        @if ($errors->has('contact_person'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('contact_person') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Phone <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="phone" class="form-control"
                                                   placeholder="Phone" value="{{$supplier->phone}}">
                                        </div>

                                        @if ($errors->has('phone'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('phone') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input tabindex="1" type="text" name="email" class="form-control"
                                                   placeholder="Email" value="{{$supplier->email}}">
                                        </div>

                                        @if ($errors->has('email'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('email') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Fax</label>
                                            <input tabindex="1" type="text" name="fax" class="form-control"
                                                   placeholder="Fax" value="{{$supplier->fax}}">
                                        </div>

                                        @if ($errors->has('fax'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('fax') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input tabindex="1" type="text" name="bank_name" class="form-control" value="{{$supplier->bank_name}}">
                                        </div>

                                        @if ($errors->has('bank_name'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('bank_name') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input tabindex="1" type="text" name="account_number" class="form-control" value="{{$supplier->account_number}}">
                                        </div>

                                        @if ($errors->has('account_number'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('account_number') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Routing Number</label>
                                            <input tabindex="1" type="text" name="routing_number" class="form-control"
                                                   value="{{$supplier->routing_number}}">
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
                                            <label>Country</label>
                                            <select tabindex="1" class="form-control select2" name="country"
                                                    style="width: 100%;" id="country">
                                                <option value="">Select a Country</option>
                                                @if(count($countries) > 0)
                                                    @foreach($countries as $k=>$v)
                                                        <option value="{{$v->id}}"
                                                                @if($supplier->country_id === $v->id) selected @endif>{{$v->name}}</option>
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
                                        <div class="form-group">
                                            <label>State</label>
                                            <select tabindex="1" class="form-control select2" name="state"
                                                    style="width: 100%;" id="state">
                                                <option value="">Select a State</option>
                                                @if($supplier->state_id)
                                                    <option
                                                        value="{{$supplier->state_id}}" selected>{!! getStateNameById($supplier->state_id) !!}</option>
                                                @endif
                                            </select>
                                            @if ($errors->has('state'))
                                                <div class="alert alert-error" style="padding: 5px !important;">
                                                    <p>
                                                    <p>{{ $errors->first('state') }}</p></p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>City</label>
                                            <select tabindex="1" class="form-control select2" name="city" id="city"
                                                    style="width: 100%;">
                                                <option value="">Select a City</option>
                                                @if($supplier->city_id)
                                                    <option
                                                        value="{{$supplier->city_id}}" selected>{!! getCityNameById($supplier->city_id) !!}</option>
                                                @endif
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
                                                   placeholder="Zip" value="{{$supplier->zip}}">
                                        </div>

                                        @if ($errors->has('zip'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('zip') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea name="address" class="form-control"
                                                      placeholder="Address">{{$supplier->address}}</textarea>
                                        </div>

                                        @if ($errors->has('address'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('address') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control" rows="10">{{$supplier->description}}</textarea>
                                        </div>

                                        @if ($errors->has('description'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('description') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Category</label>
                                            <select tabindex="2" class="form-control select2" name="category[]" multiple="multiple"
                                                    style="width: 100%;">
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $k=>$v)
                                                        <option value="{{$v->id}}" @foreach ($supplier->categories as $s)@if($s->id === $v->id) selected @endif @endforeach>{{$v->name}}</option>
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
                                            <label><input type="checkbox" name="order_method[]" value="Email" @if(!empty($supplier->order_method)) @if(in_array("Email", json_decode($supplier->order_method))) checked @endif @endif> Email</label><br>
                                            <label><input type="checkbox" name="order_method[]" value="SMS Message" @if(!empty($supplier->order_method)) @if(in_array("SMS Message", json_decode($supplier->order_method))) checked @endif @endif> SMS Message</label><br>
                                            <label><input type="checkbox" name="order_method[]" value="Fax" @if(!empty($supplier->order_method)) @if(in_array("Fax", json_decode($supplier->order_method))) checked @endif @endif> Fax</label><br>
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
