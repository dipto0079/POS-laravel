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
                Modified Detailed Sale Report
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="box box-primary">
                       
                        <div class="box-body table-responsive">

                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 20%">Modifier Name</th>
                                    <th class="title" style="width: 15%">Menu Name</th>
                                    <th class="title" style="width: 10%">Modifier Price</th>
                                    <th class="title" style="width: 10%">Sales Id</th>
                                    <th class="title" style="width: 10%">User Id</th>
                                    <th class="title" style="width: 15%">Customer Id</th>
                                    
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    @if(isset($modify))
                                <tr>
                                    <td>{{$modify->modifier_name}}</td>
                                    <td>{{$modify->menuname}}</td>
                                    <td>{{$modify->modifier_price}}</td>
                                    <td>{{$modify->sales_id}}</td>
                                    <td>{{$modify->user_id}}</td>
                                    <td>{{$modify->customer_id}}</td>
                                </tr>
                                @endif
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


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>
@endsection
