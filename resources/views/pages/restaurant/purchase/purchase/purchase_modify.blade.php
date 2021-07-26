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
                Purchase Modify
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="POST" action="{{route('update.modify_update')}}">
                            @csrf
                            @php $myid = $purchase->id; @endphp
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Purchase price</label>
                                            <input type="hidden" name="purches_id" value="{{$myid}}"/>
                                            <input type="text" name="unit_price" id="txtunit" class="form-control" readonly value="{{$purchase->unit_price}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Alert Quantity</label>
                                            <input type="text" name="quantity_amount"  onkeyup="calculator();" id="txtquentity" class="form-control" value="{{$purchase->quantity_amount}}">
                                        </div>

                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="text" name="total" readonly id="txttotal" class="form-control" value="{{$purchase->total}}">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Submit</label><br>
                                        <button type="submit"  class="btn btn-primary">Submit
                                        </button>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Back</label>
                                        <a href=""role="button" class="btn btn-primary">Back
                                        </a>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                        </form>
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

<script>
    function  calculator()
    {
        var unitprice = 0.00;

        unitprice =  $('#txtunit').val(); //(document.getElementById('txtunit').value);

        var quantity = 0.00;

        quantity =  $('#txtquentity').val(); //(document.getElementById('txtquentity').value);

        var total = 0.00;

        total = unitprice * quantity;
        $('#txttotal').val(total);
        //document.getElementById('txttotal').value = total;
    }
</script>
@endsection
