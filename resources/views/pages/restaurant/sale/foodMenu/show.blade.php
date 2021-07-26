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
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h3>Name</h3>
                                        <p class=""><?php echo $food_menu_details->name; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Category</h3>
                                        <p class="">
                                            {{$food_menu_details->categoryInfo->name}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h3>Is it veg?</h3>
                                        <p class=""><?php if($food_menu_details->veg_item == "No"){ echo "No"; }else{ echo "Yes"; } ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Dine In Price</h3>
                                        <p class=""> $ <?php echo $food_menu_details->dine_in_price; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Take Away Price</h3>
                                        <p class=""> $ <?php echo $food_menu_details->take_away_price; ?></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Delivery Order Price</h3>
                                        <p class=""> $ <?php echo $food_menu_details->delivery_order_price; ?></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Photo</h3>
                                        <?php if(!empty($food_menu_details->photo)){?>
                                        <img style="margin-bottom: 5px; width: 200px; height: 200px" class="img-responsive" src="<?= getBaseURL() . "media/restaurant/photos/" . $food_menu_details->photo ?>" alt="Photo">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <h3>Description</h3>
                                        <p class=""><?php echo $food_menu_details->description; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h3>Ingredient Consumptions</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive" id="ingredient_consumption_table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Ingredient</th>
                                                <th>Consumption</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $i = 0;
                                            if ($food_menu_ingredients && !empty($food_menu_ingredients)) {
                                                foreach ($food_menu_ingredients as $fmi) {
                                                    $i++;
                                                    echo "<tr>" .
                                                        "<td style='width: 12%; padding-left: 10px;'><p>" . $i . "</p></td>" .
                                                        "<td style='width: 23%'><span style='padding-bottom: 5px;'>" . getIngredientNameById($fmi->ing_id) . "</span></td>" .
                                                        "<td style='width: 30%'>" . $fmi->consumption . " " . getUnitNameByIngredientId($fmi->ing_id) . "</td>" .
                                                        "</tr>";
                                                }
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{route('food-menu.edit', [$food_menu_details->id])}}"><button type="button" class="btn btn-primary">Edit</button></a>
                            <a href="{{route('food-menu.index')}}"><button type="button" class="btn btn-primary">Back</button></a>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/foodMenuModifiers.js'!!}"></script>
@endsection
