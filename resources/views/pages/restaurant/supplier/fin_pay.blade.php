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
            <div class="box box-primary">

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box-body table-responsive">
                        <h3>Add Supplier Due Payments</h3>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-black"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Amount</span>
                            <span class="info-box-number">$ {{$tot}}</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="box-body">
                <div class="row">

                    <div class="col-md-4">
                        <form method="post" action="{{route('update_due')}}">
                            @csrf

                            <div class="form-group">
                                    <label>Invoice No</label>
                                <input type="hidden" name="id" value="{{$all_fin->id}}">
                                    <input type="text" name="" readonly class="form-control"
                                           placeholder="" value="{{$all_fin->invoice_no}}">
                            </div>
                            <div class="form-group">
                                <label>Payment <span class="required_star">*</span></label>

                                <select name="Pay_name" class="form-control">
                                    <option value="">Select Payment</option>
                                    @foreach($pay as $v_pay)
                                    <option value="{{$v_pay->id}}">{{$v_pay->Methord}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Due Amount <span class="required_star">*</span></label>
                                <input type="text" name="total_due" id="total_due" readonly class="form-control"
                                       placeholder="due" value="{{$all_fin->due}}">
                            </div>
                            <input type="hidden" name="supplier_id" value="{{$all_fin->supplier_id}}">
                            <div class="form-group">
                                <label>Payments Amount </label>
                                <input type="text" name="payment_amount" class="form-control" onkeyup="calculator();"
                                       id="txtquentity" placeholder="" value="">
                            </div>
                            <div class="form-group">
                                <label>Final Due </label>
                                <input type="text" name="final_due" class="form-control" readonly id="txttotal"
                                       value="">
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="" value="">
                            </div>
                            <div class="form-group">
                                <label>Note </label>
                                <input type="text" name="note" class="form-control" placeholder="" value="">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>


                    <div class="col-md-8">
                        <div class="box-body table-responsive">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                </div>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Method</th>
                                    <th class="title text-center">Amount</th>
                                    <th class="title text-center">Date</th>
                                    <th class="title text-center">Supplier Name</th>
                                    <th class="title text-center">NoTE</th>
                                </tr>
                                </thead>

                                <tbody class="purchase_body">
                                <?php $number = 0; ?>
                                @foreach($allpay as $v_pay)
                                    <tr>
                                        <td>{{ $number+1 }}</td>
                                        <?php $number++; ?>
                                        <td class="text-center">{{$v_pay->name}}</td>
                                        <td class="text-center">$ {{$v_pay->payment_amount}}</td>
                                        <td class="text-center">{{$v_pay->date}}</td>
                                        <td class="text-center">{{$v_pay->suName}}</td>
                                        <td class="text-center">{{$v_pay->note}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
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
