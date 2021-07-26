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
                    Supplier Due Report
                </h1>
            </div>

            
<div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sub Total</span>
                        <span class="info-box-number">$ {{$subtotal}}</span>
                    </div>
                    
                </div>
               
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-black"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Due Total</span>
                        <span class="info-box-number">$ {{$due_total}}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Grand Total</span>
                        <span class="info-box-number">{{$grand_total}}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-usd" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Paid Amount</span>
                        <span class="info-box-number">$ {{$paid_total}}</span>
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
                                <th class="title" style="width: 10%">Refference No</th>
                                <th class="title" style="width: 10%">Supplier Name</th>
                                    <th class="title" style="width: 10%">Date</th>
                                    <th class="title" style="width: 10%">subtotal</th>
                                    <th class="title" style="width: 10%">grand_total</th>
                                    <th class="title" style="width: 10%">paid</th>
                                    <th class="title" style="width: 10%">due</th>
                                <th class="title" style="width: 20%">purchase_type</th>
                                <th class="title" style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $number = 0; ?>
                                @foreach($supplierdue_name as $key)
                                    <tr>
                                    <td>{{ $number+1 }}</td>
							            <?php $number++; ?>
                                        <td>{{$key->reference_no}}</td>
                                        <td>{{$key->manager_name}}</td>
                                        <td>{{$key->date}}</td>
                                        <td>{{$key->subtotal}}</td>
                                        <td>{{$key->grand_total}}</td>
                                        <td>{{$key->paid}}</td>
                                        <td>{{$key->due}}</td>
                                        <td>{{$key->purchase_type}}</td>
                                        <td>
                                            <a class="btn btn-primary" role="button" href="Details-SupplierDueReport/{{$key->id}}">Details</a>
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
