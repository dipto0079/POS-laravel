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
                Wastes Details
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
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 5%">Reference No</th>
                                    <th class="title" style="width: 5%">Date</th>
                                    <th class="title" style="width: 5%">Total Loss</th>
                                    <th class="title" style="width: 5%">Note</th>
                                    <th class="title" style="width: 5%">Name</th>
                                    <th class="title" style="width: 5%">Food Menu waste</th>
                                    <th class="title" style="width: 5%">Food Menu</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{{$DetailsWaste->id}}</td>
                                    <td>{{$DetailsWaste->reference_no}}</td>
                                    <td>{{$DetailsWaste->date}}</td>
                                    <td>{{$DetailsWaste->total_loss}}</td>
                                    <td>{{$DetailsWaste->note}}</td>
                                    <td>{{$DetailsWaste->manager_name}}</td>
                                    <td>{{$DetailsWaste->food_menu_waste_qty}}</td>
                                    <td>{{$DetailsWaste->food_menu_id}}</td>
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
