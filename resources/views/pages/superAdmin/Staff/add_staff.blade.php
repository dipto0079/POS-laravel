@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Staff
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <form method="post" action="{{route('superAdmin.add-staff')}}">
                    @csrf
                    <div class="col-md-6">
                        <label>Name <span class="required_star">*</span></label>
                        <input type="text" name="manager_name" class="form-control"
                               placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <label>Email <span class="required_star">*</span></label>
                        <input type="text" name="manager_email" class="form-control"
                               placeholder="Email">
                    </div>
                    <div class="col-md-6">
                        <label>Password <span class="required_star">*</span></label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Password">
                    </div>
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="text" name="manager_phone" placeholder="+40 999 999 999" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role <span class="required_star">*</span></label>
                            <select name="role_id" class="form-control">
                                <option value="">Select Role</option>
                                    @foreach($role as $v_role)
                                        <option value="{{$v_role->id}}">{{$v_role->user_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                ADD Staff
                            </button>
                            <a href="" role="button" class="btn btn-danger">Back </a>
                        </div>
                        {{--<div class="col-md-12">
                            <div>
                                <a href="" style="float: right " role="button" class="btn btn-danger">Back
                                </a>
                            </div>
                        </div>--}}
                    </div>

                </form>

        </section>

    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
@endsection
