@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Company Update
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <form method="post" action="{{route('Update-Company')}}" >
                    @csrf
                    <input type="hidden" name="id" value="{{$res_use->id}}">
                    <div class="col-md-6">
                        <label>Name <span class="required_star">*</span></label>
                        <input type="text" name="name" value="{{$res_use->name}}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Email <span class="required_star">*</span></label>
                        <input type="text" readonly value="{{$res_use->email}}"
                               class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$res_use->phone}}"
                               placeholder="+40 999 999 999" class="form-control">
                    </div>
                    <div class="" >
                        <div class="col-md-12" style=" margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">
                                Update Company
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
