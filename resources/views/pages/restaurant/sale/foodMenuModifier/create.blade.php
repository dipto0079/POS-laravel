@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <style>
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
                Add Food Menu Modifier
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('food-menu-modifiers.store')}}" id="food_menu_form">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" id="name" name="name" class="form-control"
                                                   placeholder="Name">
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
                                                   name="price" class="form-control integerchk" placeholder="Price">
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
                                                <option value="<?php echo $ingnts->id . "|" . $ingnts->name . "|" . $ingnts->unit_name ?>"><?php echo $ingnts->name . "(" . $ingnts->code . ")"; ?></option>
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
                                                      placeholder="Enter"></textarea>
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
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit</button>
                                <a href="{{route('food-menu-modifiers.index')}}"><button type="button" class="btn btn-primary">back</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="noticeModal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true"><i class="fa fa-2x">??</i></span></button>
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
                                        <a style="font-weight: bold;" href="https://www.convert-me.com/en/convert/"
                                           target="_blank">Click here</a> to know measurement of specific ingredient,
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
        </section>
    </div>
@endsection

@section('script')
    <script>
        var ingredient_id_container = [];

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();

            $(document).on('keydown', '.integerchk', function(e){
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

            $('#ingredient_id').change(function(){
                var ingredient_details=$('#ingredient_id').val();
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
                            confirmButtonText:'ok',
                            confirmButtonColor: '#3c8dbc'
                        });
                        $('#ingredient_id').val('').change();
                        return false;
                    }

                    suffix++;
                    tab_index++;

                    var cart_row = '<tr class="rowCount" id="row_' + suffix + '">'+
                        '<td style="width: 12%; padding-left: 10px;"><p>'+suffix+'</p></td>'+
                        '<td style="width: 23%"><span style="padding-bottom: 5px;">'+ingredient_details_array[1]+'</span></td>'+
                        '<input type="hidden" id="ingredient_id_' + suffix + '" name="ingredient_id[]" value="' + ingredient_details_array[0] + '"/>'+
                        '<td style="width: 30%"><input type="text" tabindex="'+ tab_index +'" id="consumption_' + suffix + '" name="consumption[]" onfocus="this.select();"  class="form-control integerchk aligning" style="width: 85%;" placeholder="consumption"/><span class="label_aligning">' + ingredient_details_array[2] + '</span></td>'+
                        '<td style="width: 17%"><a class="btn btn-danger btn-xs" style="margin-left: 5px; margin-top: 10px;" onclick="return deleter(' + suffix + ',' + ingredient_details_array[0] +');" ><i class="fa fa-trash"></i> </a></td>'+
                        '</tr>';

                    $('#ingredient_consumption_table tbody').append(cart_row);

                    ingredient_id_container.push(ingredient_details_array[0]);
                    /*updateRowNo();*/
                    $('#ingredient_id').val('').change();
                    updateRowNo();
                }
            });


            // Validate form
            $("#food_menu_form").submit(function(){
                var name = $("#name").val();
                var description = $("#description").val();
                var price = $("#price").val();
                var ingredientCount = $("#form-table tbody tr").length;
                var error = false;


                if(name==""){
                    $("#name_err_msg").text("Name field is required");
                    $(".name_err_msg_contnr").show(200);
                    error = true;
                }

                /*            if(name.length>18){
                    $("#name_err_msg").text("The Name field cannot exceed 18 characters in length.");
                    $(".name_err_msg_contnr").show(200);
                    error = true;
                }*/


                if(description.length>200){
                    $("#description_err_msg").text("description_field_can_not_exceed");
                    $(".description_err_msg_contnr").show(200);
                    error = true;
                }

                if(price==""){
                    $("#price_err_msg").text("Price field is required");
                    $(".price_err_msg_contnr").show(200);
                    error = true;
                }

/*                if(ingredient_id_container.length == 0){
                    $("#ingredient_id_err_msg").text("at_least_ingredient");
                    $(".ingredient_err_msg_contnr").show(200);
                    error = true;
                }*/

                for(var n = 1; n <= ingredient_id_container.length+1; n++){
                    var ingredient_id = $.trim($("#ingredient_id_"+n).val());
                    var consumption = $.trim($("#consumption_"+n).val());

                    if(ingredient_id.length > 0){
                        if(consumption == '' || isNaN(consumption)){
                            $("#consumption_"+n).css({"border-color":"red"}).show(200);
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

                if(error == true){
                    return false;
                }
            });



        })

        function deleter(suffix, ingredient_id){
            swal({
                title: "alert",
                text: "are_you_sure",
                confirmButtonColor: '#3c8dbc',
                cancelButtonText:'cancel',
                confirmButtonText:'confirm',
                showCancelButton: true
            }, function() {
                $("#row_"+suffix).remove();
                var ingredient_id_container_new = [];

                for(var i = 0; i < ingredient_id_container.length; i++){
                    if(ingredient_id_container[i] != ingredient_id){
                        ingredient_id_container_new.push(ingredient_id_container[i]);
                    }
                }

                ingredient_id_container = ingredient_id_container_new;

                updateRowNo();
            });

        }

        function updateRowNo(){
            var numRows=$("#ingredient_consumption_table tbody tr").length;
            for(var r=0;r<numRows;r++){
                $("#ingredient_consumption_table tbody tr").eq(r).find("td:first p").text(r+1);
            }
        }

    </script>
@endsection
