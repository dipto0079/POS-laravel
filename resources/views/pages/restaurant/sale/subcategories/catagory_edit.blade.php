@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Sub Category

                @if (session('success'))
    <div class="alert alert-success">
    <p style="color: red;"> {{ session('success') }}</p>
    </div>
@endif</h3>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('Catagory_Edit')}}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input  type="text" name="name" class="form-control"
                                                   placeholder="Name" value="{{$edit_catagory->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Delay time (in minute) <span class="required_star">*</span></label>
                                            <input type="text" name="delay_time" class="form-control"
                                                   placeholder="" value="{{$edit_catagory->delay_time}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" name="description" class="form-control"
                                                   placeholder="Description" value="{{$edit_catagory->description}}">
                                        </div>

                                           <input type="hidden" name="hidden_id" value="{{$edit_catagory->id}}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit"  class="btn btn-primary">Update
                                </button>
                                <a href="../subcategory" role="button" class="btn btn-primary">Back
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

@endsection
