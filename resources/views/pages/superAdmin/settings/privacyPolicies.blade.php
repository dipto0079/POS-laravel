@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Privacy Policy
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('privacyPolicies.update', [$privacyPolicy->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Privacy Policy <span class="required_star">*</span></label>
                                            <textarea name="privacy_policy"
                                                      id="privacy_policy">{!! $privacyPolicy->privacy_policies !!}</textarea>
                                        </div>

                                        @if ($errors->has('privacy_policy'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('privacy_policy') }}</p>
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
    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/privacyPolicies.js'!!}"></script>
@endsection
