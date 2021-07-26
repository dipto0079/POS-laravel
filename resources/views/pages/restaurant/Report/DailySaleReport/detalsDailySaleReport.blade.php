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
                Daily Sale Report Details
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
                                    <th class="title" style="width: 5%">customer_id</th>
                                    <th class="title" style="width: 20%">sale_no</th>
                                    <th class="title" style="width: 25%">total_items</th>
                                    <th class="title" style="width: 25%">sub_total</th>
                                    <th class="title" style="width: 25%">paid_amount</th>
                                    <th class="title" style="width: 25%">due_total</th>
                                    <th class="title" style="width: 25%">disc</th>
                                    <th class="title" style="width: 25%">disc_actual</th>
                                    <th class="title" style="width: 25%">vat</th>
                                    <th class="title" style="width: 25%">total_payable</th>
                                    <th class="title" style="width: 20%">payment_method_id</th>
                                    <th class="title" style="width: 15%">close_time</th>
                                    <th class="title" style="width: 15%">table_id</th>
                                    <th class="title" style="width: 15%">total_item_discount_amount</th>
                                    <th class="title" style="width: 15%">sub_total_with_discount</th>
                                    <th class="title" style="width: 15%">sub_total_discount_amount</th>
                                    <th class="title" style="width: 15%">total_others_discount</th>
                                    <th class="title" style="width: 15%">total_discount_amount</th>
                                    <th class="title" style="width: 15%">delivery_charge</th>
                                    <th class="title" style="width: 15%">sub_total_discount_value</th>
                                    <th class="title" style="width: 15%">sub_total_discount_type</th>
                                    <th class="title" style="width: 15%">sale_date</th>
                                    <th class="title" style="width: 15%">order_time</th>
                                    <th class="title" style="width: 15%">processing_date_time</th>
                                    <th class="title" style="width: 15%">cooking_start_time</th>
                                    <th class="title" style="width: 15%">cooking_done_time</th>
                                    <th class="title" style="width: 15%">modified</th>
                                    <th class="title" style="width: 15%">user_id</th>
                                    <th class="title" style="width: 15%">waiter_id</th>
                                    <th class="title" style="width: 15%">restaurant_id</th>
                                    <th class="title" style="width: 15%">created_at</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{{$Details->id}}</td>
                                    <td>{{$Details->customer_id}}</td>
                                    <td>{{$Details->sale_no}}</td>
                                    <td>{{$Details->total_items}}</td>
                                    <td>{{$Details->sub_total}}</td>
                                    <td>{{$Details->paid_amount}}</td>
                                    <td>{{$Details->due_total}}</td>
                                    <td>{{$Details->disc}}</td>
                                    <td>{{$Details->disc_actual}}</td>
                                    <td>{{$Details->vat}}</td>
                                    <td>{{$Details->total_payable}}</td>
                                    <td>{{$Details->payment_method_id}}</td>
                                    <td>{{$Details->close_time}}</td>
                                    <td>{{$Details->table_id}}</td>
                                    <td>{{$Details->total_item_discount_amount}}</td>
                                    <td>{{$Details->sub_total_with_discount}}</td>
                                    <td>{{$Details->sub_total_discount_amount}}</td>
                                    <td>{{$Details->total_others_discount}}</td>
                                    <td>{{$Details->total_discount_amount}}</td>
                                    <td>{{$Details->delivery_charge}}</td>
                                    <td>{{$Details->sub_total_discount_value}}</td>
                                    <td>{{$Details->sub_total_discount_type}}</td>
                                    <td>{{$Details->sale_date}}</td>
                                    <td>{{$Details->order_time}}</td>
                                    <td>{{$Details->processing_date_time}}</td>
                                    <td>{{$Details->cooking_start_time}}</td>
                                    <td>{{$Details->cooking_done_time}}</td>
                                    <td>{{$Details->modified}}</td>
                                    <td>{{$Details->user_id}}</td>
                                    <td>{{$Details->waiter_id}}</td>
                                    <td>{{$Details->restaurant_id}}</td>
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


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>
@endsection
