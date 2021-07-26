@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit City
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('cities.update', [$city->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{$city->name}}">
                                        </div>

                                        @if ($errors->has('name'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('name') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Country <span class="required_star">*</span></label>
                                            <select tabindex="2" class="form-control select2" name="country"
                                                    style="width: 100%;">
                                                <option value="">Select</option>
                                                @if(count($countries) > 0)
                                                    @foreach($countries as $k=>$v)
                                                        <option value="{{$v->id}}"
                                                                @if($v->id === $city->country_id) selected @endif>{{$v->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        @if ($errors->has('country'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('country') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>State <span class="required_star">*</span></label>
                                            <select tabindex="2" class="form-control select2" name="state"
                                                    style="width: 100%;">
                                                <option value="">Select</option>
                                                @if(count($states) > 0)
                                                    @foreach($states as $k=>$v)
                                                        <option value="{{$v->id}}"
                                                                @if($v->id === $city->state_id) selected @endif>{{$v->name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        @if ($errors->has('state'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('state') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{!! $baseURL.'assets/bower_components/select2/dist/js/select2.full.min.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/state.js'!!}"></script>
@endsection
