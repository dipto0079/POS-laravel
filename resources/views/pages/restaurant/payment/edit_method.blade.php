@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Payment Methods
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        <form method="Post" action="{{route('update-Methord')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$all_data->id}}">
                            <div class="form-group">
                                <label>Payment Methods Name</label>
                                <input type="text" class="form-control" name="Methord" value="{{$all_data->Methord}}">
                            </div>
                            <div class="form-group">
                                <label>Discription</label>
                                <input type="text" class="form-control" name="Discription"
                                       value="{{$all_data->Discription}}">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>
@endsection

