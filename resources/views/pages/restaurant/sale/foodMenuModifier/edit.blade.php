@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <style>
        .aligning {
            width: auto;
            float: left
        }

        .label_aligning {
            float: left;
            padding: 5px 0px 0px 3px;
        }

        .required_star {
            color: #dd4b39;
        }

        .error-msg {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Food Menu Modifier
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('food-menu-modifiers.update', [$modifier->id])}}"
                              id="modifier_form">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" id="name" name="name" class="form-control"
                                                   placeholder="Name" value="{{$modifier->name}}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('name') }}</p>
                                            </div>
                                        @endif
                                        <div class="alert alert-error error-msg name_err_msg_contnr"
                                             style="padding: 5px !important;">
                                            <p id="name_err_msg"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price <span class="required_star">*</span></label>
                                            <input tabindex="4" type="text" onfocus="this.select();" id="price"
                                                   name="price" class="form-control integerchk" placeholder="Price"
                                                   value="{{$modifier->price}}">
                                        </div>
                                        @if ($errors->has('price'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('price') }}</p>
                                            </div>
                                        @endif
                                        <div class="alert alert-error error-msg price_err_msg_contnr"
                                             style="padding: 5px !important;">
                                            <p id="price_err_msg"></p>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ingredient Consumptions</label>
                                            <select tabindex="5" class="form-control select2 select2-hidden-accessible"
                                                    name="ingredient_id" id="ingredient_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                <?php foreach ($ingredients as $ingnts) { ?>
                                                <option
                                                    value='<?php echo $ingnts->id . "|" . $ingnts->name . "|" . $ingnts->unit_name ?>'>
                                                <?php echo $ingnts->name . "(" . $ingnts->code . ")"; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        @if ($errors->has('ingredient_id'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('ingredient_id') }}</p>
                                            </div>
                                        @endif
                                        <div class="alert alert-error error-msg ingredient_err_msg_contnr"
                                             style="padding: 5px !important;">
                                            <p id="ingredient_id_err_msg"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hidden-xs hidden-sm">&nbsp;</div>
                                        <a class="btn btn-danger" style="background-color: red;margin-top: 5px;"
                                           data-toggle="modal" data-target="#noticeModal">Read me first</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="hidden-lg hidden-sm">&nbsp;</div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="table-responsive" id="ingredient_consumption_table">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Ingredient</th>
                                                    <th>Consumption</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $i = 0;
                                                if ($modifier_ingredients && !empty($modifier_ingredients)) {
                                                    foreach ($modifier_ingredients as $fmi) {

                                                        // dump($fmi);
                                                        // here  ig_id used instead of ingredient_id
                                                        $i++;
                                                        echo '<tr id="row_' . $i . '">' .
                                                            '<td style="width: 12%; padding-left: 10px;"><p>' . $i . '</p></td>' .
                                                            '<td style="width: 23%"><span style="padding-bottom: 5px;">' . (isset($fmi->ig_id) && $fmi->ig_id ? getIngredientNameById($fmi->ig_id) : '') . '</span></td>' .
                                                            '<input type="hidden" id="ingredient_id_' . $i . '" name="ingredient_id[]" value="' . $fmi->ig_id . '"/>' .
                                                            '<td style="width: 30%"><input type="text" tabindex="' . $i . '" id="consumption_' . $i . '" name="consumption[]" value="' . $fmi->consumption . '" onfocus="this.select();" class="form-control integerchk aligning" style="width: 85%;" placeholder="Consumption"/><span  class="label_aligning">' . (isset($fmi->ig_id) && $fmi->ig_id ? getUnitNameByIngredientId($fmi->ig_id) : '') . '</span></td>' .
                                                            '<td style="width: 17%"><a class="btn btn-danger btn-xs" style="margin-left: 5px; margin-top: 10px;" onclick="return deleter(' . $i . ',' . $fmi->ig_id . ');" ><i class="fa fa-trash"></i> </a></td>' .
                                                            '</tr>';
                                                    }
                                                }

                                                //$ingredient_id_container = substr($ingredient_id_container, -1);
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea tabindex="3" class="form-control" rows="2" id="description"
                                                      name="description"
                                                      placeholder="Enter">{{$modifier->description}}</textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('description') }}</p>
                                            </div>
                                        @endif
                                        <div class="alert alert-error error-msg description_err_msg_contnr"
                                             style="padding: 5px !important;">
                                            <p id="description_err_msg"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                                <a href="{{route('food-menu-modifiers.index')}}" role="button" class="btn btn-primary">Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')
    <script>

        <?php
        $ingredient_id_container = "[";
        if ($modifier_ingredients && !empty($modifier_ingredients)) {
            foreach ($modifier_ingredients as $fmi) {
                $ingredient_id_container .= '"' . $fmi->ingredient_id . '",';
            }
        }
        $ingredient_id_container = substr($ingredient_id_container, 0, -1);
        $ingredient_id_container .= "]";
        ?>

        var ingredient_id_container = <?php echo $ingredient_id_container; ?>;


        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            $(document).on('keydown', '.integerchk', function (e) {
                /*$('.integerchk').keydown(function(e) {*/
                var keys = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
                // home, end, period, and numpad decimal
                return (
                    keys == 8 ||
                    keys == 9 ||
                    keys == 13 ||
                    keys == 46 ||
                    keys == 110 ||
                    keys == 86 ||
                    keys == 190 ||
                    (keys >= 35 && keys <= 40) ||
                    (keys >= 48 && keys <= 57) ||
                    (keys >= 96 && keys <= 105));
            });

            var suffix = <?php
                if (isset($modifier_ingredients)) {
                    echo count($modifier_ingredients);
                } else {
                    echo 0;
                };
                ?>;

            var tab_index = 6;

            $('#ingredient_id').change(function () {
                var ingredient_details = $('#ingredient_id').val();
                if (ingredient_details != '') {

                    var ingredient_details_array = ingredient_details.split('|');

                    var index = ingredient_id_container.indexOf(ingredient_details_array[0]);

                    if (index > -1) {
                        swal({
                            title: "alert!",
                            text: "ingredient_already_remain",
                            confirmButtonText: 'ok',
                            confirmButtonColor: '#3c8dbc'
                        });
                        $('#ingredient_id').val('').change();
                        return false;
                    }

                    suffix++;
                    tab_index++;

                    var cart_row = '<tr id="row_' + suffix + '">' +
                        '<td style="width: 12%; padding-left: 10px;"><p>' + suffix + '</p></td>' +
                        '<td style="width: 23%"><span style="padding-bottom: 5px;">' + ingredient_details_array[1] + '</span></td>' +
                        '<input type="hidden" id="ingredient_id_' + suffix + '" name="ingredient_id[]" value="' + ingredient_details_array[0] + '"/>' +
                        '<td style="width: 30%"><input type="text" tabindex="' + tab_index + '" id="consumption_' + suffix + '" name="consumption[]" onfocus="this.select();" onkeyup="return replaceConsumption(' + suffix + ');"  class="form-control integerchk aligning" style="width: 85%;" placeholder="consumption"/><span class="label_aligning">' + ingredient_details_array[2] + '</span></td>' +
                        '<td style="width: 17%"><a class="btn btn-danger btn-xs" style="margin-left: 5px; margin-top: 10px;" onclick="return deleter(' + suffix + ',' + ingredient_details_array[0] + ');" ><i class="fa fa-trash"></i> </a></td>' +
                        '</tr>';

                    $('#ingredient_consumption_table tbody').append(cart_row);

                    ingredient_id_container.push(ingredient_details_array[0]);
                    /*
                    updateRowNo();*/
                    $('#ingredient_id').val('').change();
                    updateRowNo();
                }
            });


            // Validate form
            $("#modifier_form").submit(function () {
                var name = $("#name").val();
                var description = $("#description").val();
                var price = $("#price").val();
                var ingredientCount = $("#form-table tbody tr").length;
                var error = false;


                if (name == "") {
                    $("#name_err_msg").text("Name field is required");
                    $(".name_err_msg_contnr").show(200);
                    error = true;
                }

                if (description.length > 200) {
                    $("#description_err_msg").text("description_field_can_not_exceed");
                    $(".description_err_msg_contnr").show(200);
                    error = true;
                }

                if (price == "") {
                    $("#sale_price_err_msg").text("Price field is required");
                    $(".sale_price_err_msg_contnr").show(200);
                    error = true;
                }

                /*                if(ingredient_id_container.length == 0){
                                    $("#ingredient_id_err_msg").text("");
                                    $(".ingredient_err_msg_contnr").show(200);
                                    error = true;
                                }
                                console.log(ingredient_id_container.length);*/

                for (var n = 1; n <= ingredient_id_container.length + 1; n++) {
                    var ingredient_id = $.trim($("#ingredient_id_" + n).val());
                    var consumption = $.trim($("#consumption_" + n).val());

                    if (ingredient_id.length > 0) {
                        if (consumption == '' || isNaN(consumption)) {
                            $("#consumption_" + n).css({"border-color": "red"}).show(200);
                            error = true;
                        }
                    }
                }


                if (error == true) {
                    return false;
                }
            });


        })

        function deleter(suffix, ingredient_id) {
            swal({
                title: "alert",
                text: "are you sure?",
                confirmButtonColor: '#3c8dbc',
                cancelButtonText: 'cancel',
                confirmButtonText: 'ok',
                showCancelButton: true
            }, function () {
                $("#row_" + suffix).remove();
                var ingredient_id_container_new = [];

                for (var i = 0; i < ingredient_id_container.length; i++) {
                    if (ingredient_id_container[i] != ingredient_id) {
                        ingredient_id_container_new.push(ingredient_id_container[i]);
                    }
                }

                ingredient_id_container = ingredient_id_container_new;

                updateRowNo();
            });
        }

        function updateRowNo() {
            var numRows = $("#ingredient_consumption_table tbody tr").length;
            for (var r = 0; r < numRows; r++) {
                $("#ingredient_consumption_table tbody tr").eq(r).find("td:first p").text(r + 1);
            }
        }
    </script>
@endsection
