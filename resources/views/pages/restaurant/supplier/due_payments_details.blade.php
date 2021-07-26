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
                    <div class="box-body table-responsive">
                        <h3>Supplier Due Payments</h3>
                    </div>
                    <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">

                        <table id="datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="title" style="width: 5%">SN</th>
                                <th class="title" style="width: 20%">Date</th>
                                <th class="title" style="width: 15%">Pay Name</th>
                                <th class="title" style="width: 25%">Total Due</th>
                                <th class="title" style="width: 20%">Payment Amount</th>
                                <th class="title" style="width: 20%">Final Due</th>
                                <th class="title" style="width: 15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($detalis as $v_detalis)
                                <td>{{$v_detalis->id}}</td>
                                <td>{{$v_detalis->date}}</td>
                                <td>{{$v_detalis->Pay_name}}</td>
                                <td>{{$v_detalis->total_due}}</td>
                                <td>{{$v_detalis->Payment_amount}}</td>
                                <td>{{$v_detalis->Final_due}}</td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                                data-offset="-185,-75">
                                            <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <a class="dropdown-item delete-customer" role="button"
                                               href="Delete-payment/{{$v_detalis->id}}">Delete</a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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


    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/foodMenuCategories.js'!!}"></script>
@endsection
