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
                Waste Details
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
                                        <p class="field_value"><?php echo $waste->reference_no; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Date </h3>
                                        <p class="field_value"><?php echo $waste->date; ?></p>
                                    </div> 
                                </div>
        
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <h3>Responsible Person</h3>
                                        <p class="field_value">{{$waste->employee->manager_name}}</p>
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
                                                    <th width="10%">SN</th>
                                                    <th width="25%">Ingredient(Code)</th>
                                                    <th width="25%">Quantity/Amount</th>
                                                    <th width="25%">Loss Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        
                                                <?php
                                                $i = 0;
                                                if ($waste->wasteIngredients && !empty($waste->wasteIngredients)) {
                                                    foreach ($waste->wasteIngredients as $wasteIngredient) {
                                                        $i++;
                                                        echo '<tr id="row_' . $i . '">' .
                                                        '<td style="width: 10%; padding-left: 10px;"><p>' . $i . '</p></td>' .
                                                        '<td style="width: 20%"><span style="padding-bottom: 5px;">' . $wasteIngredient->ingredientInfo->name . ' (' . $wasteIngredient->ingredientInfo->code . ')</span></td>' .
                                                        '<td style="width: 15%">' . $wasteIngredient->waste_amount . $wasteIngredient->ingredientInfo->unitInfo->name . '</td>' .
                                                        '<td style="width: 15%">$' . $wasteIngredient->loss_amount . '<span"></span></td>' .
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
                                        <h3>Total Loss</h3>
                                        <p class="field_value"> $ <?php echo $waste->total_loss; ?>
                                            <a class="top" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Calculated based on Last Purchase Price. In case of no purchase, master price is considered."><i class="fa fa-question fa-lg form_question"></i></a></p>
                                    </div>   
                                </div>  
                            </div>
        
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <h3>Note</h3>
                                        <p class="field_value"><?php echo $waste->note; ?></p>
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                        <div class="box-footer">
                            <a href="{{route('wastes.edit', [$waste->id])}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            <a href="{{route('wastes.index')}}"><button type="button" class="btn btn-primary">Back</button></a>
                        </div>
                    </div> 
                </div>
            </div> 
        </section>
    </div>
@endsection

@section('script')

@endsection
