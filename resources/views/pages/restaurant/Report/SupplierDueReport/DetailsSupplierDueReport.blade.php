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
                Supplier Due Details
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
                                    <th class="title" style="width: 15%">ReferenceNo</th>
                                    <th class="title" style="width: 15%">InvoiceNo</th>
                                    <th class="title" style="width: 15%">SupplierId</th>
                                    <th class="title" style="width: 25%">Date</th>
                                    <th class="title" style="width: 20%">SubTotal</th>
                                    <th class="title" style="width: 35%">GrandTotal</th>
                                    <th class="title" style="width: 10%">Paid</th>
                                    <th class="title" style="width: 10%">Due</th>
                                <th class="title" style="width: 25%">Purchasetype</th>
                                <th class="title" style="width: 25%">RestaurantId</th>
                                    <th class="title" style="width: 20%">UserId</th>
                                    <th class="title" style="width: 20%">DelStatus</th>
                                    <th class="title" style="width: 25%">CreatedAt</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$Details->reference_no}}</td>
                                        <td>{{$Details->invoice_no}}</td>
                                        <td>{{$Details->supplier_id}}</td>
                                        <td>{{$Details->date}}</td>
                                        <td>{{$Details->subtotal}}</td>
                                        <td>{{$Details->grand_total}}</td>
                                        <td>{{$Details->paid}}</td>
                                        <td>{{$Details->due}}</td>
                                        <td>{{$Details->purchase_type}}</td>
                                        <td>{{$Details->restaurant_id}}</td>
                                        <td>{{$Details->user_id}}</td>
                                        <td>{{$Details->del_status}}</td>
                                        <td>{{$Details->created_at}}</td>
                                    </tr>
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
