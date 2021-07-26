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
                    Expense Report
                </h1>
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Amount</span>
                        <span class="info-box-number">$ {{$loss}}</span>
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
                                    <th class="title" style="width: 25%">Date</th>
                                    <th class="title" style="width: 25%">Amount</th>
                                    <th class="title" style="width: 25%">Category Name</th>
                                    <th class="title" style="width: 25%">Administrator</th>

                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $number = 0; ?>
                                @foreach($restaurant_expenses as $v_all)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <?php $number++; ?>
                                        <td>{{$v_all->date}}</td>
                                        <td>{{$v_all->amount}}</td>
                                        <td>{{$v_all->name}}</td>
                                        <td>{{$v_all->manager_name}}</td>
                                        <td>
                                            <a class="btn btn-primary" role="button" href="Details-Expense-Report/{{$v_all->id}}">Details</a>
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
