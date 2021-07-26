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
            <div>
                <h1>
                    Wastes Report
                </h1>
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Loss</span>
                        <span class="info-box-number">$ {{$loss}} </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

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
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 5%">Reference No</th>
                                    <th class="title" style="width: 25%">Food Menu Waste Qty</th>
                                    <th class="title" style="width: 25%">Food Menu Id</th>
                                    <th class="title" style="width: 5%">Total Loss</th>
                                    <th class="title" style="width: 25%">User Id</th>
                                    <th class="title" style="width: 25%">Date</th>
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wastes as $v_all)
                                    <tr>
                                        <td>{{$v_all->id}}</td>
                                        <td>{{$v_all->reference_no}}</td>
                                        <td>{{$v_all->food_menu_waste_qty}}</td>
                                        <td>{{$v_all->food_menu_id}}</td>
                                        <td>$ {{$v_all->total_loss}}</td>
                                        <td>{{$v_all->manager_name}}</td>
                                        <td>{{date('d-m-Y', strtotime($v_all->date))}}</td>
                                        <td>
                                            <a class="btn btn-primary" role="button" href="Details-WasteReport/{{$v_all->id}}">Details</a>
                                        </td>
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
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>
@endsection
