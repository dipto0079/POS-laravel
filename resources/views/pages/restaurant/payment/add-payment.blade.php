@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Payment Methods
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <form method="Post" action="{{route('pay-method')}}">
                            @csrf
                            <div class="form-group">
                                <label>Payment Methods Name</label>
                                <input type="text" class="form-control" name="Methord"
                                       placeholder="Enter Payment Methods Name">
                            </div>
                            <div class="form-group">
                                <label>Discription</label>
                                <input type="text" class="form-control" name="Discription"
                                       placeholder="Enter Discription">
                            </div>
                            <div class="form-group">
                                <label> Added By</label>
                                <input type="hidden" class="form-control" name="added_by" placeholder="Added By">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="" role="button" class="btn btn-danger">Back
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>--}}
    {{--    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>--}}
@endsection
