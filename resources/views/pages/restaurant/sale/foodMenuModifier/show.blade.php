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
                                        <p class=""><?php echo $modifier->name; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h3>Price</h3>
                                        <p class="">$ <?php echo $modifier->price; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h3>Description</h3>
                                        <p class=""><?php echo $modifier->description; ?></p>
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
                                                <th>ingredient</th>
                                                <th>consumption</th>
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
                                                        "<td style='width: 23%'><span style='padding-bottom: 5px;'>" . getIngredientNameById($fmi->ig_id) . "</span></td>" .
                                                        "<td style='width: 30%'>" . $fmi->consumption . " " .  getUnitNameByIngredientId($fmi->ig_id)
                                                        . "</td>" .
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
