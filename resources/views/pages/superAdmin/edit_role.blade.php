@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Role
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="Post" action="{{route('superAdmin.role-insert')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden"value="{{$all_data->id}}">
                                            <label>Name</label>
                                            <input  type="text"  class="form-control" name="user_name" value="{{$all_data->user_name}}"
                                                    placeholder="Name" >
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text"  class="form-control" name="description" value="{{$all_data->description}}"
                                                   placeholder="Description">
                                        </div>
                                        <input type="hidden" name="del_status" class="form-check-input" value="Live" checked>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
