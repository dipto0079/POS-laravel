@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')

@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Stock Adjustment Details
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
        
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
        
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Reference No</h3>
                                        <p class="field_value"><?php echo $stockAdjustment->reference_no; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Date </h3>
                                        <p class="field_value"><?php echo $stockAdjustment->date; ?></p>
                                    </div> 
                                </div>
        
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <h3>Responsible Person</h3>
                                        <p class="field_value">{{$stockAdjustment->employee->manager_name}}</p>
                                    </div>   
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-6">  
                                    <div class="form-group"> 
                                        <h3>Ingredients </h3> 
                                    </div>   
                                </div> 
                            </div> 
        
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="table-responsive" id="waste_cart">          
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">SN</th>
                                                    <th class="text-center">Ingredient(Code)</th>
                                                    <th class="text-center">Quantity/Amount</th>
                                                    <th class="text-center">Consumption Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        
                                                <?php
                                                $i = 0;
                                                if ($stockAdjustment->stockAdjustmentIngredients && !empty($stockAdjustment->stockAdjustmentIngredients)) {
                                                    foreach ($stockAdjustment->stockAdjustmentIngredients as $stockAdjustmentIngredient) {
                                                        $i++;
                                                        echo '<tr id="row_' . $i . '">' .
                                                        '<td class="text-center"><p>' . $i . '</p></td>' .
                                                        '<td class="text-center"><span style="padding-bottom: 5px;">' . $stockAdjustmentIngredient->ingredientInfo->name . ' (' . $stockAdjustmentIngredient->ingredientInfo->code . ')</span></td>' .
                                                        '<td class="text-center">' . $stockAdjustmentIngredient->consumption_amount . $stockAdjustmentIngredient->ingredientInfo->unitInfo->name . '</td>' .
                                                        '<td class="text-center">' . $stockAdjustmentIngredient->consumption_status . '<span"></span></td>' .
                                                        '</tr>';
                                                    }
                                                }
                                                ?>
        
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
        
                            </div> 
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <h3>Note</h3>
                                        <p class="field_value"><?php echo $stockAdjustment->note; ?></p>
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="box-footer">
                            <a href="{{route('stock-adjustment.edit', [$stockAdjustment->id])}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            <a href="{{route('stock-adjustment.index')}}"><button type="button" class="btn btn-primary">Back</button></a>
                        </div>
                    </div> 
                </div>
            </div> 
        </section>
    </div>
@endsection

@section('script')

@endsection
