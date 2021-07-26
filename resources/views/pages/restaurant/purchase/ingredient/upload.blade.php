@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Upload Ingredient
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('ingredients.import')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Upload File <span class="required_star">*</span></label>
                                            <input type="file" name="file" class="form-control">
                                        </div>

                                        @if ($errors->has('file'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('file') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <input type="checkbox" name="remove_all_prev_data" value="yes">
                                            <label>Remove all previous data, before uploading new data.</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <a href="{{route('ingredients.downloadSampleFile')}}" role="button" class="btn btn-primary">Download sample file
                                </a>
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

@endsection
