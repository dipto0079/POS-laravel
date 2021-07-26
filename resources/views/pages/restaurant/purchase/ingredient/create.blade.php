@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Ingredient
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('ingredients.store')}}">
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
                                            <label>Category <span class="required_star">*</span></label>
                                            <select tabindex="2" class="form-control select2" name="category"
                                                    style="width: 100%;">
                                                <option value="">Select</option>
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
                                            <label>Unit <span class="required_star">*</span></label>
                                            <select tabindex="2" class="form-control select2" name="unit"
                                                    style="width: 100%;">
                                                <option value="">Select</option>
                                                @if(count($units) > 0)
                                                    @foreach($units as $k=>$v)
                                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        @if ($errors->has('unit'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('unit') }}</p>
                                            </div>
                                        @endif

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Purchase Price <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="purchase_price" class="form-control"
                                                   placeholder="1.00" value="{{old('purchase_price')}}">
                                        </div>

                                        @if ($errors->has('purchase_price'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('purchase_price') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Alert Quantity <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="alert_quantity" class="form-control"
                                                   placeholder="1.00" value="{{old('alert_quantity')}}">
                                        </div>

                                        @if ($errors->has('alert_quantity'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('alert_quantity') }}</p>
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
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                                <a href="{{route('ingredients.index')}}" role="button" class="btn btn-primary">Back
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
    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/state.js'!!}"></script>
@endsection
