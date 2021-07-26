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
                Update Attendance 
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('attendances.update', [$attendance->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ref. No</label>
                                            <input tabindex="1" type="text" id="reference_no" readonly name="reference_no" class="form-control" placeholder="reference no" value="{{$attendance->reference_no}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label>In Time <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="in_time" id="in_time" class="form-control"
                                                   placeholder="In time" value="{{$attendance->in_time}}">
                                        </div>

                                        @if ($errors->has('in_time'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('in_time') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date <span class="required_star">*</span></label>
                                            <input tabindex="1" type="date" name="date" class="form-control"
                                                   placeholder="Date" value="{{$attendance->date}}">
                                        </div>

                                        @if ($errors->has('date'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('date') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Out Time <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="out_time" id="out_time" class="form-control"
                                                   placeholder="Out time" value="{{$attendance->out_time}}" autocomplete="off">
                                        </div>

                                        @if ($errors->has('out_time'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('out_time') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Employee  <span class="required_star">*</span></label>
                                            <select tabindex="3" class="form-control select2" name="employee_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}" @if ($employee->id == $attendance->employee_id) selected @endif>{{$employee->manager_name .' | '. $employee->role .' | '. $employee->manager_phone }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        @if ($errors->has('employee_id'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('employee_id') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea tabindex="5" class="form-control" rows="4" name="note" placeholder="Note ...">{{$attendance->note}}</textarea>

                                        </div>

                                        @if ($errors->has('note'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('note') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                                <a href="{{route('attendances.index')}}" role="button" class="btn btn-primary">Back
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
    <script src="{!! $baseURL.'resources/assets/js/jquery.timepicker.min.js'!!}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            $('#in_time').timepicker({
                timeFormat: 'HH:mm:ss',
                interval: 15,  
                defaultTime: 'now',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

            $('#out_time').timepicker({
                timeFormat: 'HH:mm:ss',
                interval: 15,  
                // defaultTime: 'now',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });


    </script>
@endsection
