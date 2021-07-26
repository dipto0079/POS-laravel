@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Category  @if (session('success'))
    <div class="alert alert-success">
    <p style="color: red;"> {{ session('success') }}</p>
    </div>
@endif

            </h1>

        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('food-menu-SubCatagory.insert')}}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input  type="text" name="name" class="form-control"
                                                   placeholder="Name" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Delay time (in minute) <span class="required_star">*</span></label>
                                            <input type="text" name="delay_time" class="form-control"
                                                   placeholder="" value="">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input type="text" name="description" class="form-control"
                                                   placeholder="Description" value="">
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit"  class="btn btn-primary">submit
                                </button>
                                <a href="../sale/subcategory" role="button" class="btn btn-primary">Back
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
