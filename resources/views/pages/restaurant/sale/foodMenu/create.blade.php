@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
<style type="text/css">
    .required_star {
        color: #dd4b39;
    }

    .radio_button_problem {
        margin-bottom: 19px;
    }

    .foodMenuCartInfo {
        border: 2px solid #3c8dbc;
        padding: 15px;
        border-radius: 5px;
        color: #3c8dbc;
        font-size: 14px;
        margin-top: 0px;
        text-align: justify;
    }

    .foodMenuCartNotice {
        border: 2px solid red;
        padding: 15px;
        border-radius: 5px;
        color: red;
        font-size: 14px;
        margin-top: 0px;
        text-align: justify;
    }

    .cart_container {
        /* border: 1px solid black;*/
    }

    .cart_header {
        background-color: #ecf0f5;
        padding: 5px 0px;
        margin-bottom: 5px;
    }

    .ch_content {
        font-weight: bold;
    }

    .custom_form_control {
        border-radius: 0;
        box-shadow: none;
        border-color: #d2d6de;
        width: 80%;
        height: 26px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        margin: 0px 3px 7px 0px;
    }

    .center_positition {
        text-align: center !important;
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
            Add Food Menu
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form method="post" action="{{route('food-menu.store')}}" id="food_menu_form" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name <span class="required_star">*</span></label>
                                        <input tabindex="1" type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
                                    </div>
                                    @if ($errors->has('name'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('name') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg name_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="name_err_msg"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Code</label>
                                        <input tabindex="6" type="text" name="code" class="form-control" placeholder="Code" value="{{$code}}" readonly>
                                    </div>
                                </div>
                                @if ($errors->has('code'))
                                <div class="alert alert-error" style="padding: 5px !important;">
                                    <p>{{ $errors->first('code') }}</p>
                                </div>
                                @endif
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label>Category <span class="required_star">*</span></label>
                                        <select tabindex="3" class="form-control select2" id="subcategory_id" name="subcategory_id" style="width: 100%;">
                                            <option value="0">Select</option>
                                            <?php foreach ($subcategory as $ctry) { ?>
                                                <option value="<?php echo $ctry->id ?>"><?php echo $ctry->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    @if ($errors->has('subcategory_id'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('subcategory_id') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg category_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="subcategory_id_err_msg"></p>
                                    </div>
                                    <!-- <div class="hidden-xs hidden-sm">&nbsp;</div>
<a class="btn btn-primary" href="" style="background-color: red;margin-top: 5px;">Add More Category</a> -->


                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ingredient consumptions</label>
                                        <select tabindex="5" class="form-control select2 select2-hidden-accessible" name="ingredient_id" id="ingredient_id" style="width: 100%;">
                                            <option value="">Select</option>
                                            <?php foreach ($ingredients as $ingnts) { ?>
                                                <option value="<?php echo $ingnts->id . "|" . $ingnts->name . "|" . $ingnts->unit_name ?>"><?php echo $ingnts->name . "(" . $ingnts->code . ")"; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    @if ($errors->has('ingredient_id'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('ingredient_id') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg ingredient_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="ingredient_id_err_msg"></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="hidden-xs hidden-sm">&nbsp;</div>
                                    <a class="btn btn-danger" style="background-color: red;margin-top: 5px;" data-toggle="modal" data-target="#noticeModal">Read me first</a>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sub Category <span class="required_star">*</span></label>
                                        <select tabindex="2" onchange="showsubcategoty()" class="form-control select2" id="category_id" name="category_id" style="width: 100%;">
                                            <option value="0">Select</option>
                                            <?php foreach ($categories as $ctry) { ?>
                                                <option value="<?php echo $ctry->id ?>"><?php echo $ctry->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    @if ($errors->has('category_id'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('category_id') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg category_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="category_id_err_msg"></p>
                                    </div>

                                </div>














                                <div class="clearfix"></div>
                                <div class="hidden-lg hidden-sm">&nbsp;</div>
                            </div>

                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-12">
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

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Dine In Price <span class="required_star">*</span></label>
                                        <table style="width: 100%">
                                            <tr>
                                                <td><input tabindex="4" type="text" onfocus="this.select();" id="dine_in_price" name="dine_in_price" class="form-control integerchk" onkeyup="return replacePonto();" placeholder="Dine In Price" value="{{old('dine_in_price')}}"></td>
                                                <td style="width: 11%;text-align: right"> <span class="label_aligning_total_loss">
                                                    </span></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @if ($errors->has('dine_in_price'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('dine_in_price') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg sale_price_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="dine_in_price_err_msg"></p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Take Away Price <span class="required_star">*</span></label>
                                        <table style="width: 100%">
                                            <tr>
                                                <td><input tabindex="4" type="text" onfocus="this.select();" id="take_away_price" name="take_away_price" class="form-control integerchk" onkeyup="return replacePonto();" placeholder="Take Away Price" value="{{old('take_away_price')}}"></td>
                                                <td style="width: 11%;text-align: right"> <span class="label_aligning_total_loss">
                                                    </span></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @if ($errors->has('take_away_price'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('take_away_price') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg sale_price_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="take_away_price_err_msg"></p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Delivery Order Price <span class="required_star">*</span></label>
                                        <table style="width: 100%">
                                            <tr>
                                                <td><input tabindex="4" type="text" onfocus="this.select();" id="delivery_order_price" name="delivery_order_price" class="form-control integerchk" onkeyup="return replacePonto();" placeholder="Delivery Order Price" value="{{old('delivery_order_price')}}"></td>
                                                <td style="width: 11%;text-align: right"> <span class="label_aligning_total_loss">
                                                    </span></td>
                                            </tr>
                                        </table>
                                    </div>
                                    @if ($errors->has('delivery_order_price'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('delivery_order_price') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg sale_price_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="delivery_order_price_err_msg"></p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Shift <span class="required_star">*</span></label>
                                        <select tabindex="2" class="form-control select2" id="shift_id" name="shift_id[]" multiple="multiple" style="width: 100%;">
                                            <?php foreach ($shifts as $shift) { ?>
                                                <option value="<?php echo $shift->id ?>">{{$shift->name}}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    @if ($errors->has('shift_id'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('shift_id') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg shift_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="shift_id_err_msg"></p>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Panel <span class="required_star">*</span></label>
                                        <select tabindex="2" class="form-control select2" id="panel_id" name="panel_id" style="width: 100%;">
                                            <option value="">Select</option>
                                            <?php foreach ($panels as $panel) { ?>
                                                <option value="<?php echo $panel->id ?>">{{$panel->name}}</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    @if ($errors->has('panel_id'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('panel_id') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg panel_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="panel_id_err_msg"></p>
                                    </div>

                                </div>
                                <!-- <label>Description</label>
                            <div class="form-group">
                                <label>VAT</label>
                                <select tabindex="8" class="form-control select2" name="vat_id" style="width: 100%;">
                                    <option value="">Select</option>
                                    <?php foreach ($vats as $vat) { ?>
                                    <option value="<?php echo $vat->id ?>"><?php echo $vat->name ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input tabindex="1" type="text" id="description" name="description" class="form-control" placeholder="Description" value="Description">
                                    </div>
                                    @if ($errors->has('description'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('description') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg description_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="description_err_msg"></p>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Photo </label>
                                        <input tabindex="10" type="file" name="photo" id="photo">
                                    </div>
                                    @if ($errors->has('photo'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('photo') }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Is It Veg ? <span class="required_star"> *</span></label>
                                        <select tabindex="2" class="form-control select2" id="veg_item" name="veg_item" style="width: 100%;">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('veg_item'))
                                    <div class="alert alert-error" style="padding: 5px !important;">
                                        <p>{{ $errors->first('veg_item') }}</p>
                                    </div>
                                    @endif
                                    <div class="alert alert-error error-msg veg_item_err_msg_contnr" style="padding: 5px !important;">
                                        <p id="veg_item_err_msg"></p>
                                    </div>
                                </div>


                                {{-- this field was removed from the system --}}
                                {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Is It Beverage <span class="required_star">*</span></label>
                                            <select tabindex="2" class="form-control select2" id="beverage_item" name="beverage_item" style="width: 100%;">
                                                <<option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('beverage_item'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('beverage_item') }}</p>
                            </div>
                            @endif
                            <div class="alert alert-error error-msg beverage_item_err_msg_contnr" style="padding: 5px !important;">
                                <p id="beverage_item_err_msg"></p>
                            </div>
                        </div> --}}
                </div>

                <div class="row">
                    {{-- <?php foreach ($vats as $tax_field) { ?>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><?php echo $tax_field->name; ?></label>
                                            <table style="width: 100%">
                                                <tr>
                                                    <td>
                                                        <input tabindex="1" type="hidden" name="tax_field_id[]" value="<?php echo $tax_field->id; ?>">
                                                        <input tabindex="1" type="hidden" name="tax_field_name[]" value="<?php echo $tax_field->name; ?>">
                                                        <input tabindex="1" type="text" name="tax_field_percentage[]" class="form-control integerchk" placeholder="" value="0">
                                                    </td>
                                                    <td style="width: 11%;text-align: right"> %</td>
                                                </tr>
                                            </table>


                                        </div>
                                    </div>
                                    <?php } ?> --}}

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>VAT/TAX </label>
                            <select tabindex="2" class="form-control select2" id="vat_tax" name="vat_tax" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach ($vats as $tax_field)
                                <option value="{{$tax_field->id}}">{{$tax_field->name}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>




                </div>

                <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
            <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="noticeModal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-2x">×</i></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 hidden-lg hidden-sm">
                                    <p class="foodMenuCartNotice">
                                        <strong style="margin-left: 39%">Notice</strong><br>
                                        You must enter the Quantity/Amount in the Unit showing just right after the
                                        Quantity/Amount field, otherwise Inventory will not match.
                                    </p>
                                </div>
                                <div class="col-md-12 hidden-xs hidden-sm">
                                    <p class="foodMenuCartNotice">
                                        <strong style="margin-left: 43%">Notice</strong><br>
                                        You must enter the Quantity/Amount in the Unit showing just right after the Quantity/Amount field, otherwise Inventory will not match.
                                    </p>
                                </div>
                                <div class="col-md-12 hidden-xs hidden-lg">
                                    <p class="foodMenuCartNotice">
                                        <strong style="margin-left: 43%">Notice</strong><br>
                                        You must enter the Quantity/Amount in the Unit showing just right after the Quantity/Amount field, otherwise Inventory will not match.
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <p class="foodMenuCartInfo">
                                        <a style="font-weight: bold;" href="https://www.convert-me.com/en/convert/" target="_blank">Click here</a> to know measurement of specific ingredient,
                                        something like: 1 Cup Soya Bean Oil = 240 ml, 1 Cup Wheat Flour = 100.8 g, 1
                                        Tablespoon Chopped Pepper = 10.8 g

                                        And those you can not measure in this way. Like you buy 1 packet Chaomin, then
                                        divide that by how many you can make by 1 packet. Something like you buy 1
                                        packet Chaomin, that's weight is 500 g and you can make 4 dishes. Then enter the
                                        consumption 125 g (500 g / 4 dish = 125 g)
                                        <br>
                                        <br>
                                        <br>
                                        <span style="font-weight: bold; font-style: italic;">NB: These are just example, calculate the consumption by your own.</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
                <a href="{{route('food-menu.index')}}"><button type="button" class="btn btn-primary">back</button></a>
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
    var ingredient_id_container = [];

    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2();

        $(document).on('keydown', '.integerchk', function(e) {
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

        var suffix =
            <?php
            if (isset($food_menu_ingredients)) {
                echo count($food_menu_ingredients);
            } else {
                echo 0;
            }
            ?>;

        var tab_index = 6;

        $('#ingredient_id').change(function() {
            var ingredient_details = $('#ingredient_id').val();
            if (ingredient_details != '') {
                var ingredient_details_array = ingredient_details.split('|');

                /*for(var i=1; i <= ingredient_id_container.length; i++){
                   if(ingredient_details_array[0] == ingredient_id_container[i]){
                    swal('Ingredient already remains in cart, you can change the consumption value')
                    return false;
                   }
                } */
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

                var cart_row = '<tr class="rowCount" id="row_' + suffix + '">' +
                    '<td style="width: 12%; padding-left: 10px;"><p>' + suffix + '</p></td>' +
                    '<td style="width: 23%"><span style="padding-bottom: 5px;">' + ingredient_details_array[1] + '</span></td>' +
                    '<input type="hidden" id="ingredient_id_' + suffix + '" name="ingredient_id[]" value="' + ingredient_details_array[0] + '"/>' +
                    '<td style="width: 30%"><input type="text" tabindex="' + tab_index + '" id="consumption_' + suffix + '" name="consumption[]" onfocus="this.select();"  class="form-control integerchk aligning" style="width: 85%;" placeholder="consumption"/><span class="label_aligning">' + ingredient_details_array[2] + '</span></td>' +
                    '<td style="width: 17%"><a class="btn btn-danger btn-xs" style="margin-left: 5px; margin-top: 10px;" onclick="return deleter(' + suffix + ',' + ingredient_details_array[0] + ');" ><i class="fa fa-trash"></i> </a></td>' +
                    '</tr>';

                $('#ingredient_consumption_table tbody').append(cart_row);

                ingredient_id_container.push(ingredient_details_array[0]);
                /*updateRowNo();*/
                $('#ingredient_id').val('').change();
                updateRowNo();
            }
        });


        // Validate form
        $("#food_menu_form").submit(function() {
            var name = $("#name").val();
            var category_id = $("#category_id").val();
            var shift_id = $("#shift_id").val();
            var panel_id = $("#panel_id").val();
            var veg_item = $("#veg_item").val();
            var beverage_item = $("#beverage_item").val();
            var bar_item = $("#bar_item").val();
            var description = $("#description").val();
            var dine_in_price = $("#dine_in_price").val();
            var take_away_price = $("#take_away_price").val();
            var delivery_order_price = $("#delivery_order_price").val();
            var ingredientCount = $("#form-table tbody tr").length;
            var error = false;


            if (name == "") {
                $("#name_err_msg").text("Name field required");
                $(".name_err_msg_contnr").show(200);
                error = true;
            }

            /*            if(name.length>18){
                $("#name_err_msg").text("The Name field cannot exceed 18 characters in length.");
                $(".name_err_msg_contnr").show(200);
                error = true;
            }*/

            if (category_id == "") {
                $("#category_id_err_msg").text("Category field required");
                $(".category_err_msg_contnr").show(200);
                error = true;
            }

            if (panel_id == "") {
                $("#panel_id_err_msg").text("Panel field required");
                $(".panel_err_msg_contnr").show(200);
                error = true;
            }

            if (shift_id == "") {
                $("#shift_id_err_msg").text("Shift field required");
                $(".shift_err_msg_contnr").show(200);
                error = true;
            }


            if (veg_item == "") {
                $("#veg_item_err_msg").text("Veg item field required");
                $(".veg_item_err_msg_contnr").show(200);
                error = true;
            }

            if (beverage_item == "") {
                $("#beverage_item_err_msg").text("Beverage item field required");
                $(".beverage_item_err_msg_contnr").show(200);
                error = true;
            }

            if (description.length > 200) {
                $("#description_err_msg").text("Description field can not exceed");
                $(".description_err_msg_contnr").show(200);
                error = true;
            }

            if (dine_in_price == "") {
                $("#dine_in_price_err_msg").text("Dine in price field required");
                $(".sale_price_err_msg_contnr").show(200);
                error = true;
            }

            if (take_away_price == "") {
                $("#take_away_price_err_msg").text("Take away price field required");
                $(".sale_price_err_msg_contnr").show(200);
                error = true;
            }

            if (delivery_order_price == "") {
                $("#delivery_order_price_err_msg").text("Delivery order price field required");
                $(".sale_price_err_msg_contnr").show(200);
                error = true;
            }

            /*if(ingredient_id_container.length == 0){
                    $("#ingredient_id_err_msg").text("at_least_ingredient");
                $(".ingredient_err_msg_contnr").show(200);
                error = true;
            } */

            for (var n = 1; n <= ingredient_id_container.length + 1; n++) {
                var ingredient_id = $.trim($("#ingredient_id_" + n).val());
                var consumption = $.trim($("#consumption_" + n).val());

                if (ingredient_id.length > 0) {
                    if (consumption == '' || isNaN(consumption)) {
                        $("#consumption_" + n).css({
                            "border-color": "red"
                        }).show(200);
                        error = true;
                    }
                }
            }


            /*if(description.length>200){
                $("#description").css({"border-color":"red"});
                $("#description").next("span").show(200).delay(5000).hide(200,function(){
                    $("#description").css({"border-color":"#ccc"});
                });
                error = true;
            }
            for(var n=0;n<=suffix-1;n++){
                if(deletedRow.indexOf(n)<0){
                    var consumption= $.trim($("#consumption_"+n).val());
                    if(consumption==''||isNaN(consumption)){
                        $("#consumption_"+n).css({"border-color":"red"});
                        $("#consumption_"+n).next("span").show(200).delay(5000).hide(200,function(){
                            $("#consumption_"+n).css({"border-color":"#ccc"});
                        });
                        error = true;
                    }
                }
            } */

            if (error == true) {
                return false;
            }
        });



    })

    function deleter(suffix, ingredient_id) {
        swal({
            title: "alert",
            text: "are_you_sure?",
            confirmButtonColor: '#3c8dbc',
            cancelButtonText: 'cancel',
            confirmButtonText: 'confirm',
            showCancelButton: true
        }, function() {
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