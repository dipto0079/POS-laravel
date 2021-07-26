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
                Purchase Details
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-2 form-group">
                    <h3>Refernce No</h3>

                    <p style="font-size: 18px;">{{$res_purchese->reference_no}}</p>
                </div>
                <div class="col-md-2 form-group">
                    <h3>Supplier</h3>
                    <p style="font-size: 18px;">{{$res_purchese->supplier_id}}</p>
                </div>
                <div class="col-md-2 form-group">
                    <h3>Date</h3>
                    <p style="font-size: 18px;">{{$res_purchese->date}}</p>
                </div>
                <div class="col-md-2 form-group">
                    <h3>Total</h3>
                    <p style="font-size: 18px;">{{$res_purchese->grand_total}}</p>
                </div>
                <div class="col-md-2 form-group">
                    <h3>Paid</h3>
                    <p style="font-size: 18px;">{{$res_purchese->paid}}</p>
                </div>
                <div class="col-md-2 form-group">
                    <h3>Due</h3>
                    <p style="font-size: 18px;">{{$res_purchese->due}}</p>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <div class="row">
                                    <div class="col-md-2 form-group">
                                    </div>
                                    <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

                                </div>
                                <table id="datatable" class="table table-striped">
                                    <thead>
                                    <tr>
                                        {{-- <th class="title text-center">SN</th> --}}
                                        {{--<th class="title text-center" style="width: 8%">Date</th>--}}
                                        <th class="title text-center">Ingredient Id</th>
                                        <th class="title text-center">Name</th>
                                        <th class="title text-center">Purchase price</th>
                                        <th class="title text-center">Alert Quantity</th>
                                        <th class="title text-center">Unit Price</th>
                                        <th class="title text-center">Action</th>
                                     
                                    </tr>
                                    </thead>
                                    <tbody class="purchase_body">
                                        @foreach($all_res_purchese as $v_ngredients)
                                                <tr class="purchase_row">
                                                        {{--<td class="text-center">{{$v_ingredients->created_at}}</td>--}}
                                                        <td class="text-center">{{$v_ngredients->id}}</td>
                                                        <td class="text-center">{{$v_ngredients->food_name}}</td>
                                                        <td class="text-center">{{$v_ngredients->unit_price}}</td>
                                                        <td class="text-center">{{$v_ngredients->quantity_amount}}</td>
                                                        <td class="text-center">{{$v_ngredients->total}}</td>
                                                    <td class="text-center">
                                                        <a role="button" class="btn btn-primary" href="">Accept</a>
                                                    
                                                        <a role="button" class="btn btn-primary" href="{{route('purchases_modify',[$v_ngredients->id])}}">Modify</a>
                                                    
                                                        <a role="button" class="btn btn-danger" href="../purchases_single/{{$v_ngredients->id}}">Cancel</a>
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
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>


@endsection
