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

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="row">
                                <div class="col-md-3">
                                    <h2 class="top-left-header">Sales</h2>
                                </div>
                                <div class="col-md-2 form-group">
                                    <select tabindex="1" id="filter_sales" name="filter_sales" class="form-control select2" style="width: 100%;">
                                        <option value="date" selected> Filter By Date</option>
                                        <option value="order type">Order Type</option>
                                        <option value="total paid">Total Paid</option>
                                        <option value="payment method">Payment Method</option>
                                    </select>
                                </div>
                                <form method="Get" action="{{route('sales.index')}}" id="filter_sales_form">
                                    <div class="col-md-2 form-group">
                                        <input class="form-control" type="date" name="filter_by_date" id="filter_by_date" value="">
                                        <input class="form-control hide" type="text" name="filter_by_total_paid" id="filter_by_total_paid" value="total paid" disabled hidden>
                                        <select id="filter_by_order_type" name="filter_by_order_type" class="form-control select2 hide" style="width: 100%;">
                                            <option value="" selected>Select Order Type</option>
                                            <option value="1">Dine In</option>
                                            <option value="2">Take Away</option>
                                            <option value="3">Delivery</option>
                                        </select>
                                        <select id="filter_by_payment" name="filter_by_payment" class="form-control select2 hide" style="width: 100%;">
                                            <option value="" selected>Select Payment Method</option>
                                            <option value="1">Card</option>
                                            <option value="2">Paypal</option>
                                            <option value="3">Gift Card</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" id="filter_sales_submit" class="btn btn-block btn-primary pull-left">Submit</button>
                                    </div>
                                
                                </form>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-5 text-right">
                                    <ul class="list-inline text-right">
                                        
                                        <li>
                                            <a href="{{route('pos.index')}}"><button type="button" class="btn btn-block btn-primary pull-right">Add Sale</button></a>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" >Ref. no</th>
                                    <th class="title" >Order Type</th>
                                    <th class="title" >Date</th>
                                    <th class="title" >Customer</th>
                                    <th class="title" >Total Payable</th>
                                    <th class="title" >Payment Method</th>
                                    <th class="title" >Added By</th>
                                    <th class="title" >Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                {{-- <tbody>
                                    @if (count($sales)> 0)
                                        @foreach($sales as $k=>$v)
                                            <tr>
                                                <th scope="row">{{$k + 1}}</th>
                                                <td class="text-center">{{$v->sale_no}}</td>
                                                <td class="text-center">{{getOrderType($v->order_type) }}</td>
                                                <td class="text-center">{{$v->sale_date}}</td>
                                                <td class="text-center">{{$v->customer->name}}</td>
                                                <td class="text-center">{{$v->total_payable}}</td>
                                                <td class="text-center">{{$v->payment_method_id}}</td>
                                                <td class="text-center">{{$v->creatorInfo->manager_name}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" data-offset="-185,-75">
                                                            <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                                class="caret"></span>
                                                        </button>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                            <a class="dropdown-item edit-link" role="button"
                                                            href="{{route('sales.show', [$v->id])}}">View
                                                                Details</a> |
                                                            <a class="dropdown-item edit-link" role="button"
                                                            href="{{route('sales.edit', [$v->id])}}">Edit</a>
                                                            |
                                                            <a class="dropdown-item edit-link delete-sales"
                                                            role="button" data-id="{{$v->id}}">Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody> --}}
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
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/sales.js'!!}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endsection
