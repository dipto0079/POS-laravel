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
                    <h2 class="top-left-header"> Stock </h2>
                </div>
            </div>
            <hr style="border: 1px solid #3c8dbc;">
            <div class="row">
                <form action="">
                    @csrf
                    <input type="hidden" name="hiddentIngredientID" id="hiddentIngredientID" value="<?= isset($ingredient_id) ? $ingredient_id : '' ?>">
                    <div class="col-md-2">
                        <div class="form-group"> 
                            <select class="form-control select2 category_id" name="category_id" id="category_id" style="width: 100%;">
                                <option value="">Category</option>
                                <?php foreach ($ingredientCategories as $value) { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->name ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group"> 
                            <select class="form-control select2" name="ingredient_id" id="ingredient_id" style="width: 100%;">
                                <option value="">Ingredient</option>
                                <?php foreach ($ingredients as $value) { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo $value->name . "(" . $value->code . ")" ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <select class="form-control select2" name="food_id" id="food_id" style="width: 100%;">
                                <option value="">Food Menu</option>
                                <?php foreach ($foodMenus as $value) { ?>
                                    <option value="<?php echo $value->id ?>"><?php echo substr(ucwords(strtolower($value->name)), 0, 18) . "(" . $value->code . ")" ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="submit" value="submit" class="btn btn-block btn-primary pull-left">Submit</button>
                    </div>
                    <div class="hidden-lg"><span style="color:transparent">space</span></div>
                    <div class="col-md-2">
                        <a href="{{route('stock-alertlist')}}" class="btn btn-block btn-primary pull-left"><span style="color:red">{{$alertCount}}</span> Ingredients Alert </a>
                    </div>
                    <div class="hidden-lg"><br><br></div>
                    <div class="col-md-3">
                        <strong id="stockValue"></strong>
                        <a class="top" title="" data-placement="top" data-toggle="tooltip" style="cursor:pointer" data-original-title="Calculated based on last purchase price and Ingredient with negative Stock Qty/Amount is not considered"><i data-feather="help-circle"></i></a>
                    </div>
                </form>
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
                                        $alertCount = 0;
                                        $totalTK = 0;
                                        if (!empty($stock) && isset($stock)):
                                            foreach ($stock as $key => $value):
                                                $totalStock = $value->total_purchase - $value->total_consumption - $value->total_modifiers_consumption - $value->total_waste + $value->total_consumption_plus - $value->total_consumption_minus;
                                                $totalTK = $totalStock * getLastPurchasePrice($value->id);
                                                if ($totalStock >= 0) {
                                                    $grandTotal = $grandTotal + $totalStock * getLastPurchasePrice($value->id);
                                                }
                                                $key++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?= $key ?></td>
                                                    <td class="text-center"><?= $value->name . "(" . $value->code . ")" ?></td>
                                                    <td class="text-center"><?= $value->category_name ?></td>
                                                    <td class="text-center"><span style="<?= ($totalStock <= $value->alert_quantity) ? 'color:red' : '' ?>"><?= ($totalStock) ? $totalStock : '0.0' ?><?= " " . $value->unit_name ?></span></td>
                                                    <td class="text-center"><?= $value->alert_quantity . " " . $value->unit_name ?></td>
                                                </tr>
                                                <?php
                                            endforeach;
                                        endif;
                                        
                                    @endphp
                                </tbody>
                            </table>
                            <input type="hidden" value="<?= number_format($grandTotal, 2) ?>" id="grandTotal" name="grandTotal">
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

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/stock.js'!!}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            $('#stockValue').html('Stock Value: $ '+ $('#grandTotal').val());

        });
    </script>
@endsection