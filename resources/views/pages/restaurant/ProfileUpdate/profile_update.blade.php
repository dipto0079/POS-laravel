@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Profile Update
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <form method="post" action="{{route('update-profile')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $res_use->id}}">
                    <div class="col-md-6">
                        <label>Name <span class="required_star">*</span></label>
                        <input type="text" name="manager_name" value="{{ $res_use->manager_name}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Email <span class="required_star">*</span></label>
                        <input type="text" readonly value="{{ $res_use->manager_email}}"
                               class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Password <span class="required_star">*</span></label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="text" name="manager_phone" value="{{$res_use->manager_phone}}"
                               placeholder="+40 999 999 999" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Role</label>
                        <input type="text" readonly name="" value="{{$res_use->role}}"
                               class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Restaurant Id</label>
                        <input type="text" readonly name="" value="{{$res_use->restaurant_id}}"
                               class="form-control">
                    </div>

                    <div class="col-md-6" style="margin-top:20px;">
                        <label for="img">Select image:</label>
                        <input type="file" name="image">
                        <img src="{{URL::to($res_use->image)}}" style="width:250px;height: 250px;float: right;">
                        <input type="hidden" name="old_image" value="{{$res_use->image}}">
                    </div>

                    <div class="">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                Update Profile
                            </button>
                            <a href="" role="button" class="btn btn-danger">Back </a>
                        </div>
                    </div>

                </form>

        </section>


    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
@endsection
