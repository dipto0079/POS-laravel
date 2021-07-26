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
                    Food Sale Report
                </h1>
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sub Total</span>
                        <span class="info-box-number">$ {{$tot}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-black"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Due Total</span>
                        <span class="info-box-number">$ {{$Due}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Items</span>
                        <span class="info-box-number">{{$total_items}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-usd" aria-hidden="true"></i></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Paid Amount</span>
                        <span class="info-box-number">$ {{$paid_amount}}</span>
                    </div>
                </div>
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
                                    <th class="title" style="width: 5%">Sale No</th>
                                    <th class="title" style="width: 20%">Customer Name</th>
                                    <th class="title" style="width: 25%">Total Items</th>
                                    <th class="title" style="width: 25%">Sub Total</th>
                                    <th class="title" style="width: 25%">Paid Amount</th>
                                    <th class="title" style="width: 25%">Due Amount</th>
                                    <th class="title" style="width: 25%">Order Status</th>
                                    <th class="title" style="width: 25%">Order Type</th>
                                    <th class="title" style="width: 25%">Order From</th>
                                    <!-- <th class="title" style="width: 25%">Waiter id</th> -->
                                    <th class="title" style="width: 20%">Administrator</th>
                                    <th class="title" style="width: 20%">Date</th>
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all as $v_all)
                                    <tr>
                                        <td>{{$v_all->id}}</td>
                                        <td>{{$v_all->sale_no}}</td>
                                        <td>{{$v_all->customername}}</td>
                                        <td>{{$v_all->total_items}}</td>
                                        <td>{{$v_all->sub_total}}</td>
                                        <td>{{$v_all->paid_amount}}</td>
                                        <td>{{$v_all->due_total}}</td>

                                        @if($v_all->order_status =='1')
                                            <td><a class="btn btn-alart" role="button"
                                                   data-id="{{ $v_all->order_status }}" data-toggle="modal"
                                                   data-target="#myModal" style="color:#f50808; font-weight: bolder;">New Order<a></td>
                                        @endif
                                        @if($v_all->order_status =='2')
                                            <td><a  class="btn btn-alart" role="button"
                                                   data-id="{{ $v_all->order_status }}" data-toggle="modal"
                                                   data-target="#myModal" style="color:#080ef5;font-weight: bolder;">Invoiced Order<a></td>
                                        @endif
                                        @if($v_all->order_status =='3')
                                            <td><a  class="btn btn-alart" role="button"
                                                   data-id="{{ $v_all->order_status }}" data-toggle="modal"
                                                   data-target="#myModal" style="color:#276548; font-weight: bolder;">Closed Order<a></td>
                                        @endif

                                        @if($v_all->order_type =='1')
                                            <td><a class="btn btn-alart" role="button"
                                                   data-id="{{ $v_all->order_type }}" data-toggle="modal"
                                                   data-target="#myModal" style="color:#ff0990; font-weight: bolder;">Dine In<a></td>
                                        @endif
                                        @if($v_all->order_type =='2')
                                            <td><a class="btn btn-alart" role="button"
                                                   data-id="{{ $v_all->order_type }}" data-toggle="modal"
                                                   data-target="#myModal" style="color:#009cf7; font-weight: bolder;">Take Away<a></td>
                                        @endif
                                        @if($v_all->order_type =='3')
                                            <td><a class="btn btn-alart" role="button"
                                                   data-id="{{$v_all->order_type }}" data-toggle="modal"
                                                   data-target="#myModal" style="color:#276548; font-weight: bolder;">Delivery<a></td>
                                        @endif
                                        <td>{{$v_all->order_from}}</td>
                                        <!-- <td>{{$v_all->waiter_id}}</td> -->
                                        <td>{{$v_all->usname}}</td>
                                        <td>{{date('d-m-Y', strtotime($v_all->created_at))}}


                                        </td>

                                        <td>
                                            <a class="btn btn-primary" role="button" href="Details-foodsaleReport/{{$v_all->id}}">Details</a>
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
