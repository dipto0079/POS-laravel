@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>
@section('style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <style type="text/css">
        .top-left-header{
            margin-top: 0px !important;
        }
        #stockValue a svg{
            stroke: #00c0ef;
            width: 22px;
            position: relative;
            top: 7px;
            left: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="top-left-header">Alert Stock </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <a href="{{route('stock.index')}}" class="btn btn-block btn-primary pull-left"><strong>Back</strong></a>
                </div>
                <div class="hidden-lg"><span style="font-size: 4px;color:transparent">hidden text</span></div>
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
                                        <th class="title text-center" >SN</th>
                                        <th class="title text-center" >Ingredient(Code)</th>
                                        <th class="title text-center" >Category</th>
                                        <th class="title text-center" >Stock Qty/Amount</th>
                                        <th class="title text-center" >Alert Qty/Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalStock = 0;
                                        $grandTotal = 0;
                                        $totalTK = 0;
                                        $i = 1;
                                        if (!empty($alertStock) && isset($alertStock)):
                                            foreach ($alertStock as $key => $value):
                                                $totalStock = $value->total_purchase - $value->total_consumption - $value->total_modifiers_consumption - $value->total_waste + $value->total_consumption_plus - $value->total_consumption_minus;
                                                $totalTK = $totalStock * getLastPurchasePrice($value->id);
                                                if ($totalStock <= $value->alert_quantity):
                                                    if ($totalStock >= 0) {
                                                        $grandTotal = $grandTotal + $totalStock * getLastPurchasePrice($value->id);
                                                    }
                                                    $key++;
                                                    ?>
                                                    <tr>
                                                        <td class="text-center" style="text-align: center"><?= $i ?></td>
                                                        <td class="text-center"><?= $value->name . "(" . $value->code . ")" ?></td>
                                                        <td class="text-center"><?= $value->category_name ?></td>
                                                        <td class="text-center"><span style="<?= ($totalStock <= $value->alert_quantity) ? 'color:red' : '' ?>"><?= ($totalStock) ? $totalStock : '0.0' ?><?= " " . $value->unit_name ?></span></td>
                                                        <td class="text-center"><?= $value->alert_quantity . " " . $value->unit_name ?></td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                endif;
                                            endforeach;
                                        endif;
                                    @endphp
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
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>


    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/alertStock.js'!!}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endsection