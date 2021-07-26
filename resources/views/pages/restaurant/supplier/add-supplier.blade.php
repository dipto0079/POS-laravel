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
                        <h3>Add Supplier Due Payments</h3>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <form method="post" action="{{route('add_fin_pay.insert')}}">
                            @csrf

                            <div class="form-group">
                                <label>Select Supplier <span class="required_star">*</span></label>
                                <select name="supplier_name" class="form-control">
                                    <option value="0">Select Supplier</option>
                                    @if(isset($all_data))
                                    @foreach($all_data as $V_all)
                                        <option value="{{$V_all->id}}">{{$V_all->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>


                            {{--<div class="form-group">
                                <label>Payment <span class="required_star">*</span></label>
                                <select name="Pay_name" class="form-control">
                                    <option value="">Select Payment</option>
                                    @foreach($allmethod as $V_method)
                                        <option value="{{$V_method->id}}">{{$V_method->Methord}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Due Amount <span class="required_star">*</span></label>
                                <input type="text" name="total_due" id="total_due" readonly class="form-control"
                                       placeholder="due">
                            </div>
                            <div class="form-group">
                                <label>Payments Amount </label>
                                <input type="text" name="Payment_amount" class="form-control" onkeyup="calculator();"
                                       id="txtquentity" placeholder="" value="">
                            </div>
                            <div class="form-group">
                                <label>Final Due </label>
                                <input type="text" name="Final_due" class="form-control" readonly id="txttotal"
                                       value="">
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="" value="">
                            </div>
                            <div class="form-group">
                                <label>Note </label>
                                <input type="text" name="note" class="form-control" placeholder="" value="">
                            </div>--}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                        <table id="datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="title" style="width: 5%">SN</th>
                                <th class="title" style="width: 20%">Referenceno</th>
                                <th class="title" style="width: 20%">Invoice No</th>
                                <th class="title" style="width: 20%">Purchase Amount</th>
                                <th class="title" style="width: 20%">Payment</th>
                                <th class="title" style="width: 20%">Due</th>
                                <th class="title" style="width: 15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($Pueshes))

                            <?php $number = 0; ?>
                            @foreach($Pueshes as $v_Pueshes)
                                <tr>
                                    <td>{{ $number+1 }}</td>
                                    <?php $number++; ?>

                            <td>{{$v_Pueshes->reference_no}}</td>
                            <td>{{$v_Pueshes->invoice_no}}</td>
                            <td>$ {{$v_Pueshes->grand_total}}</td>
                            <td>$ {{$v_Pueshes->paid}}</td>
                            <td>$ {{$v_Pueshes->due}}</td>
                            <td>
                                <div class="btn-group">
                                    <div class="form-group">
                                        <a class="btn btn-primary" role="button"
                                           href="{{route('fin_pay', [$v_Pueshes->id])}}">Payment</a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>

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
    <script>
        function dueTotal(id) {
            if (id != 0) {
                //alert(id);
                $.ajax({
                    type: "GET",
                    url: "total_supplier_due/" + id,
                    dataType: 'JSON',
                    error: function (xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText;
                        alert(errorMessage);
                    },
                    success: function (data) {
                        //alert(data.result);
                        //$('#total_due').val(data.result);
                        document.getElementById('total_due').value = data.result;
                    }
                });
            }
        }
    </script>
    <script>
        function calculator() {
            var unitprice = 0.00;

            unitprice = $('#total_due').val(); //(document.getElementById('txtunit').value);

            var quantity = 0.00;

            quantity = $('#txtquentity').val(); //(document.getElementById('txtquentity').value);

            var total = 0.00;

            total = unitprice - quantity;
            $('#txttotal').val(total);
            //document.getElementById('txttotal').value = total;
        }
    </script>

@endsection
