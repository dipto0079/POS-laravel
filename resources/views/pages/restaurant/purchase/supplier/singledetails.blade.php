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
  
                <h2>
                    Purchased Food 
                </h2>
     
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">

                        <div class="box-body table-responsive">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                </div>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center" style="width: 5%">SN</th>
                                    <th class="title text-center" style="width: 15%">Invoice No</th>
                                    <th class="title text-center">Name</th>
                                    <th class="title text-center">Date</th>
                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                     <?php $number = 0; ?>
                                    @foreach($ingredient as $key)
                                        <tr class="purchase_row">
                                            <td class="text-center">{{ $number+1 }}</td>
							                    <?php $number++; ?>
                                            <td class="text-center">{{$key->invoice_no}}</td>
                                            <td class="text-center">{{$key->name}}</td>
                                            <td class="text-center">{{$key->date}}</td>
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
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>


@endsection
