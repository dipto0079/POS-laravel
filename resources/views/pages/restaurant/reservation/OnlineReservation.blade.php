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
                Online Reservation
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                </div>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            @php
                                {{ $table_id=[]; }}

                            @endphp
                            @if(isset($dd))
                                @foreach($dd as $dd)
                                    @php $table_id[$dd->table_id] = $dd->table_id  @endphp

                                @endforeach
                            @endif



                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Table Id</th>
                                    <th class="title text-center">Name</th>
                                    <th class="title text-center">Booking Date</th>
                                    <th class="title text-center">End Booking Date</th>
                                    <th class="title text-center">Booking Date</th>
                                    <th class="title text-center">End Booking Time</th>
                                    <th class="title text-center">Comment</th>
                                    <th class="title text-center">customer_id</th>
                                    <th class="title text-center">Resurvation</th>

                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                @foreach($all as $v_all)
                                    <tr class="purchase_row">
                                        <td class="text-center">{{$v_all->id}}</td>
                                        <td class="text-center">{{$v_all->table_id}}</td>
                                        <td class="text-center">{{$v_all->number_of_people}}</td>
                                        <td class="text-center">{{$v_all->booking_date}}</td>
                                        <td class="text-center">{{$v_all->end_booking_date}}</td>
                                        <td class="text-center">{{$v_all->booking_time}}</td>
                                        <td class="text-center">{{$v_all->end_booking_time}}</td>
                                        <td class="text-center">{{$v_all->comment}}</td>
                                        <td class="text-center">{{$v_all->customer_id}}</td>
                                        <td><a href="#">
                                                <button class="btn form-control  @php
                                                    echo Illuminate\Support\Arr::has($table_id,$v_all->id)?"btn-danger":"btn-success" ; @endphp" data-toggle="tooltip" data-placement="top" title="">
                                                    @php
                                                        echo Illuminate\Support\Arr::has($table_id,$v_all->id)?"Booking":"Reservation" ; @endphp

                                                </button>
                                            </a></td>
                                    </tr>
                                @endforeach
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
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
@endsection
