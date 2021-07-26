@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Staff Attendance All
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">

                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center" >SN</th>
                                    <th class="title text-center" >Staff Id</th>
                                    <th class="title text-center" >Pin No</th>
                                    <th class="title text-center" >In Date</th>
                                    <th class="title text-center" >In Time</th>
                                    <th class="title text-center" >Out Date</th>
                                    <th class="title text-center" >Out Time</th>
                                    <th class="title text-center" >Update Time</th>
                                    <th class="title text-center" >Count Total</th>
                                    <th class="title text-center" >Note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (count($alldata)> 0)
                                    @php

                                    @endphp
                                    @foreach($alldata as $k=>$v)
                                        <tr>

                                            <th scope="row">{{$k + 1}}</th>
                                            <td class="text-center">{{$v->staff_id}}</td>
                                            <td class="text-center">{{$v->pin_no}}</td>
                                            <td class="text-center">{{$v->in_date}}</td>
                                             <td class="text-center">{{$v->in_time}}</td>
                                            <td class="text-center">{{$v->out_date}}</td>
                                            <td class="text-center">{{$v->out_time}}</td>
                                            <td class="text-center">{{$v->update_time}} </td>
                                            <td class="text-center">{{$v->count_total}} m</td>
                                            <td class="text-center">{{$v->note}}</td>
                                        </tr>

{{--                                        @php--}}
{{--                                            $v->in_time;--}}
{{--                                     $in_time_at = date('d-m-Y', strtotime($v));--}}
{{--                                                $v->out_time;--}}
{{--                                       $out_time_at = date('d-m-Y', strtotime($v));--}}

{{--                                            $date1 = strtotime($in_time_at);--}}
{{--                                                  $date2 = strtotime($out_time_at);--}}

{{--                                                  $ajker=round(abs($date2 - $date1) / (60*60*24),0);--}}

{{--                                        @endphp--}}


                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/attendances.js'!!}"></script>
@endsection
