@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>
@section('style')
    <link rel="stylesheet" href="{!! $baseURL.'resources/assets/css/jquery.timepicker.min.css'!!}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Staff Attendance
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->

                        <form method="post" action="{{route('add-Attendance')}}">
                            @csrf
                            <div class="box-footer">
                                <label style="margin-right: 10px; font-size: 20px;">PIN <span class="required_star">*</span></label>
                                <input type="text" name="pin_no" style="width: 200px; height: 100px; font-size: 40px; border: 1px solid black; border-radius: 15px;">
                            </div>
                            @php if(isset($allata)) { @endphp
                            <div class="box-footer">
                                <label style="margin-right: 10px; font-size: 20px;">IN Time</label>
                                <input type="hidden" name="in_date_time" value="">
                                <button type="button" class="btn btn-success">{{$allata->in_time}}
                                </button>
                            </div>
                            @php }
                            else{
                            @endphp

                            <div class="box-footer">
                                <label style="font-size: 20px;">IN</label>
                                <input type="hidden" name="in_date_time" value="">
                                <input type="checkbox" style="cursor: pointer" name="incheck">
                            </div>
                            @php } @endphp

                            @php if(isset($allata->out_date)) { @endphp
                            <div class="box-footer">
                                <label style="margin-right: 10px; font-size: 20px;">OUT Time</label>
                                <input type="hidden" name="out_date_time" value="">
                                <button type="button"   class="btn btn-danger">{{$allata->out_time}}
                                </button>
                            </div>
                            @php }
                            else{
                            @endphp
                            <div class="box-footer">
                                <label style="font-size: 20px;">OUT</label>

                                <input type="checkbox" style="cursor: pointer" name="outcheck">
                            </div>
                            @php } @endphp

                            <div class="box-footer">
                                <label style="margin-right: 10px; font-size: 20px;">Note</label>
                                <input type="text" name="note" style="width: 300px; height: 100px; border: 1px solid black; border-radius: 15px;">
                            </div>
                            @php if(isset($allata->out_date)) { @endphp
                            
                            @php }
                            else{
                            @endphp
                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-success">Submit
                                </button>
                            </div>
                            @php } @endphp


                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/jquery.timepicker.min.js'!!}"></script>
@endsection
