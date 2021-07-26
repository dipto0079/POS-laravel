@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>
@section('style')

    <style type="text/css">
        .required_star{
            color: #dd4b39;
        }

        .radio_button_problem{
            margin-bottom: 19px;
        }
        .foodMenuCartInfo{
            border: 2px solid #3c8dbc;
            padding: 15px;
            border-radius: 5px;
            color: #3c8dbc;
            font-size: 14px;
            margin-top: 0px;
            text-align: justify;
        }
        .foodMenuCartNotice{
            border: 2px solid red;
            padding: 15px;
            border-radius: 5px;
            color: red;
            font-size: 14px;
            margin-top: 0px;
            text-align: justify;
        }
        .cart_container{
            /* border: 1px solid black;*/
        }
        .cart_header{
            background-color: #ecf0f5;
            padding: 5px 0px;
            margin-bottom: 5px;
        }
        .ch_content{
            font-weight: bold;
        }
        .custom_form_control{
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
        .center_positition{
            text-align: center !important;
        }
        .error-msg{
            display:none;
        }
        .aligning{
            width: 70%; float:left;
        }
        .aligning_total_loss{
            width: 80%; float:left;
        }
        .label_aligning{
            float: left; padding: 5px 0px 0px 3px;
        }
        .label_aligning_total_loss{
            float: left; padding: 0px 0px 0px 3px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Waste
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">

                        <!-- /.box-header -->
                        <!-- form start -->
                        <form method="post" action="{{route('wastes.store')}}" id="waste_add_form">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ref. No</label>
                                            <input tabindex="1" type="text" id="reference_no" readonly name="reference_no" class="form-control" placeholder="reference no" value="{{$nextId}}" required>
                                        </div>

                                        {{-- <div class="alert alert-error error-msg name_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="name_err_msg"></p>
                                        </div> --}}
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date<span class="required_star">*</span></label>
                                            <input tabindex="3" type="date" id="date" name="date"  class="form-control" placeholder="date" value="{{old('date')}}">
                                        </div>
                                        @if ($errors->has('date'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('date') }}</p>
                                            </div>
                                        @endif

                                        <div class="alert alert-error error-msg date_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="date_err_msg"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Responsible Person <span class="required_star">*</span></label>
                                            <select tabindex="3" class="form-control select2" id="employee_id" name="employee_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}" @if ($employee->id == old('employee_id')) selected @endif>{{$employee->manager_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if ($errors->has('employee_id'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('employee_id') }}</p>
                                            </div>
                                        @endif

                                        <div class="alert alert-error error-msg employee_id_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="employee_id_err_msg"></p>
                                        </div>


                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ingredients <span class="required_star">*</span></label> (Only purchase ingredient)
                                            <select tabindex="4" class="form-control select2" name="ingredient_id" id="ingredient_id" style="width: 100%;">
                                                <option value="">select</option>
                                                <?php
                                                $ignoreID = array();
                                                foreach ($ingredients as $ingnts) {
                                                    if (!in_array($ingnts->id, $ignoreID)) {
                                                        $ignoreID[] = $ingnts->id;
                                                        ?>
                                                        <option value="<?php echo $ingnts->id . "|" . $ingnts->name . " (" . $ingnts->code . ")|" . $ingnts->unit_name . "|" . getLastPurchasePrice($ingnts->id) ?>" ><?php echo $ingnts->name . " (" . $ingnts->code . ")" ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="alert alert-error error-msg ingredient_id_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="ingredient_id_err_msg"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="display: none;visibility: hidden; ">
                                        <div class="form-group">
                                            <label>Food Menu</label>
                                            <select tabindex="4" class="form-control select2" name="food_menu_id" id="food_menu_id" style="width: 100%;">
                                                <option value="">select</option>
                                                <?php
                                                $ignoreID = array();
                                                foreach ($food_menus as $ingnts) {
                                                    if (!in_array($ingnts->id, $ignoreID)) {
                                                        $ignoreID[] = $ingnts->id;
                                                        ?>
                                                        <option value="<?php echo $ingnts->id; ?>"><?php echo $ingnts->name . " (" . $ingnts->code . ")" ?></option>
                                                    <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="alert alert-error error-msg food_menu_id_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="food_menu_id_err_msg"></p>
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <div class="hidden-xs hidden-sm">&nbsp;</div>
                                        <a class="btn btn-danger" style="background-color: red;margin-top: 5px;" data-toggle="modal" data-target="#noticeModal">Read me first</a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="hidden-lg hidden-sm">&nbsp;</div>
                                </div>
                                <div class="row" id="food_menu_waste_quantity_row" style="display:none;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Food Menu Waste Quantity</label>
                                            <input tabindex="1" type="number" id="waste_quantity" name="food_menu_waste_qty" class="form-control" placeholder="waste_quantity" value="">
                                        </div>

                                        <div class="alert alert-error error-msg waste_quantity_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="waste_quantity_err_msg"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" style="margin:25px 0px 0px 0px;" class="btn btn-danger" id="delete_all_ingredient_list">Delete</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive" id="waste_cart">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">SN</th>
                                                        <th width="25%">Ingredient(code)</th>
                                                        <th width="25%">Quantity Amount</th>
                                                        <th width="25%">Loss Amount</th>
                                                        <th width="15%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total Loss</label>
                                            <table style="width: 100%">
                                                <tr>
                                                    <td><input style="width: 100%"  class="form-control aligning_total_loss" readonly type="text" name="total_loss" id="total_loss"></td>
                                                    <td style="width: 11%;text-align: right"> <span class="label_aligning_total_loss">
                                                            <a class="top" title="" style="cursor: pointer" data-placement="top" data-toggle="tooltip" data-original-title="Calculated based on Last Purchase Price."><i class="fa fa-question fa-lg form_question"></i></a>
                                                        </span></td>
                                                </tr>
                                            </table>
                                        </div>
                                        @if ($errors->has('total_loss'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('total_loss') }}</p>
                                            </div>
                                        @endif

                                        <div class="alert alert-error error-msg total_loss_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="total_loss_err_msg"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>note</label>
                                            <textarea tabindex="3" class="form-control" rows="2" id="note" name="note" placeholder="Note ..."></textarea>
                                        </div>

                                        <div class="alert alert-error error-msg note_err_msg_contnr" style="padding: 5px !important;">
                                            <p id="note_err_msg"></p>
                                        </div>
                                    </div>

                                </div>
                                <input type="hidden" name="suffix_hidden_field" id="suffix_hidden_field"/>
                                <div class="box-footer">
                                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('wastes.index')}}"><button type="button" class="btn btn-primary">Back</button></a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
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
                                            <strong style="margin-left: 39%">notice</strong><br>
                                            notice_text_1
                                        </p>
                                    </div>
                                    <div class="col-md-12 hidden-xs hidden-sm">
                                        <p class="foodMenuCartNotice">
                                            <strong style="margin-left: 43%">notice</strong><br>
                                            notice_text_1
                                        </p>
                                    </div>
                                    <div class="col-md-12 hidden-xs hidden-lg">
                                        <p class="foodMenuCartNotice">
                                            <strong style="margin-left: 43%">notice</strong><br>
                                            notice_text_1
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="foodMenuCartInfo">
                                            <!-- Please mention the consumption in the unit shown at right. <br>
                                             eg: 5Kg, 0.20Kg, 3L, 0.50L, 1Pcs etc
                                             <br>
                                             <br>-->
                                            <a style="font-weight: bold;" href="https://www.convert-me.com/en/convert/" target="_blank">click_here</a> notice_text_2
                                            <br>
                                            <br>
                                            notice_text_3
                                            <br>
                                            <span style="font-weight: bold; font-style: italic;">notice_text_4</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="modal fade" id="food_menu_waste"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="loan_form" action="#" method="post">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">food_menu_waste</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="panel-body">

                                        <fieldset>




                                            <div class="row">



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>quantity <span class="required_star">*</span></label>
                                                        <input required class="form-control integerchk "  id="food_menu_waste_quantity" name="food_menu_waste_quantity" type="text" value="">
                                                    </div>

                                                    <div class="alert alert-error error-msg food_menu_waste_quantity_err_msg_contnr" style="padding: 5px !important;">
                                                        <p id="food_menu_waste_quantity_err_msg"></p>
                                                    </div>
                                                </div>

                                            </div><!--End Row-->
                                    </div>

                                    </fieldset>

                                </div>
                                <div class="modal-footer">
                                    <input id="food_menu_waste_button" type="button"  value="submit" class="btn btn-primary">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>

                                </div>
                        </div>

                        </form>
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

        var suffix = <?php if (isset($waste_ingredients)) { echo count($waste_ingredients); } else { echo 0; } ?>;

        $('#food_menu_id').change(function(){

            var f_menu_id=$('#food_menu_id').val();
            $('#food_menu_waste_quantity').val('');
            if (f_menu_id != '') {
                $('#waste_quantity').val('');
                $('#waste_cart tbody tr').remove();
                $('#ingredient_id').prop('disabled',true);
                $('#food_menu_waste').modal('show');
            }else{
                $('#waste_quantity').val('');
                $('#waste_cart tbody tr').remove();
                $('#ingredient_id').prop('disabled',false);
            }
            $('#food_menu_waste_quantity_row').css('display','block');
            //     alert(f_menu_id);


        });

        $('#delete_all_ingredient_list').on('click',function(){
            $('#waste_cart').find('tbody').empty();
            $('#total_loss').val('');
            $('#food_menu_waste_quantity_row').hide();
        });

        $("#food_menu_waste").on("hidden.bs.modal", function () {
            //  alert('test');
            // $('#food_menu_id').val('');
            //   $('#food_menu_id').prop('selected', false);
            // $('select#food_menu_id option').removeAttr("selected");
        });

        $('#food_menu_waste_button').click(function(){
            var id=$('#food_menu_id').val();
            var f_menu_id=$('#food_menu_id').val();
            var quantity=$('#food_menu_waste_quantity').val();
            if(quantity==""){

                $("#food_menu_waste_quantity_err_msg").text("The Quantity field is required.");
                $(".food_menu_waste_quantity_err_msg_contnr").show(200);
                error = true;
                return error;
            }

            var url ="<?php echo $baseURL; ?>";
            var currency = "$";

            if(id!=''){
                $('#waste_quantity').val(quantity);
                //    alert(f_menu_id);
                $('#food_menu_waste').modal('hide');
                //                $.ajax({
                //                    type: "POST",
                //                    url: url + "Waste/food_menu_ingredients",
                //                    data: 'id=' + id,
                //                    dataType: "json",
                //                    success: function (data) {
                //
                //                    }
                //                });

                var options = '';
                $.ajax({
                    type:"get",
                    url: '<?php echo $baseURL; ?>restaurant/waste/food_menus_ingredients_by_ajax',
                    data:{id: f_menu_id},
                    dataType:"json",
                    success: function (data) {
                        //    alert('test');
                        //    var json = $.parseJSON(data);
                        //   alert(json);

                        console.log(data);

                        $('#food_menu_waste_quantity').val('');
                        var j=0;
                        var total_loss=0;

                        $.each(data, function (i, v) {
                            var qty=0;
                            var los_amount=0;
                            qty=quantity*v.consumption;
                            // los_amount=quantity*v.consumption*v.unit_price;
                            los_amount=quantity*v.consumption*v.ingredientInfo.purchase_price;
                            total_loss=total_loss+los_amount;
                            j++;
                            i++;
                            options += '<tr class="rowCount" data-id="' + i + '" id="row_' + i + '">'+

                                '<td style="padding-left: 10px;"><p id="sl_' + i + '">'+j+'</p></td>'+
                                '<input type="hidden" id="ingredient_id_' + i + '" name="ingredient_id[]" value="' + v.ing_id + '"/>'+
                                '<td><span style="padding-bottom: 5px;">'+v.ingredientInfo.name+"("+v.ingredientInfo.code+")"+'</span></td>'+
                                '<td style="width: 15%"><input readonly  type="text" data-countID="'+i+'" id="waste_amount_' + i + '" name="waste_amount[]" onfocus="this.select();" class="form-control integerchk aligning" placeholder="Waste Amt" value=" '+qty+' " /><span class="label_aligning"> ' +v.ingredientInfo.unit_info.name+ '</span><span id="unit_consumption_ingredient_'+i+'" class="unit_consumption_ingredient" style="display:none">'+v.consumption+'</span></td>'+
                                '<input type="hidden" id="last_purchase_price_' + i + '" name="last_purchase_price[]" value="' + i + '"/>'+
                                '<td><input type="text" id="loss_amount_' + i + '" name="loss_amount[]" onfocus="this.select();" class="form-control aligning" placeholder="Loss Amt" value=" '+los_amount+' " readonly /><span class="label_aligning">'+currency+'</span><span id="unit_price_ingredient_'+i+'" class="unit_price_ingredient" style="display:none">'+v.unit_price+'</span></td>'+
                                // '<td><a class="btn btn-danger btn-xs" style="margin-left: 5px; margin-top: 10px;" onclick="return deleter(' + i + ',' + i +');" ><i class="fa fa-trash"></i> </a></td>'+
                            '</tr>';

                        });
                        $('#waste_cart tbody').append(options);
                        $("#total_loss").val(total_loss);
                    }
                });

            }
        });

        $('#waste_quantity').on('keyup',function(e){
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                $(this).val('');
            }

            var given_amount = ($(this).val()!="")?$(this).val():0;

            //check wether value is valid or not
            remove_last_two_digit_without_percentage(given_amount,$(this));

            given_amount = ($(this).val()!="")?$(this).val():0;

            total_loss = 0;
            $('.rowCount').each(function(i, obj) {
                var row_id = $(this).attr('id').substr(4);
                var unit_price = $(this).find('.unit_price_ingredient').html();
                var unit_consumption = $(this).find('.unit_consumption_ingredient').html();
                var updated_consumption = parseFloat(unit_consumption)*parseFloat(given_amount);
                var updated_price = (parseFloat(unit_price)*parseFloat(updated_consumption)).toFixed(2);
                $('#waste_amount_'+row_id).val(updated_consumption);
                $('#loss_amount_'+row_id).val(updated_price);
                total_loss = (parseFloat(total_loss)+parseFloat(updated_price)).toFixed(2);
                // console.log('updated price: '+updated_price+', updated consumption: '+updated_consumption);
            });
            $('#total_loss').val(total_loss);

        });

        $('#ingredient_id').change(function(){
            $('#food_menu_id').prop('disabled',true);

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

                var currency = "$";

                suffix++;

                var cart_row = '<tr class="rowCount" data-id="' + suffix + '" id="row_' + suffix + '">'+
                    '<td style="padding-left: 10px;"><p id="sl_' + suffix + '">'+suffix+'</p></td>'+
                    '<input type="hidden" id="ingredient_id_' + suffix + '" name="ingredient_id[]" value="' + ingredient_details_array[0] + '"/>'+
                    '<td><span style="padding-bottom: 5px;">'+ingredient_details_array[1]+'</span></td>'+
                    '<td style="width: 15%"><input required type="text" data-countID="'+suffix+'" id="waste_amount_' + suffix + '" name="waste_amount[]" onfocus="this.select();" class="form-control integerchk aligning" placeholder="wast_amt" onkeyup="return calculateAll();"/><span class="label_aligning"> ' + ingredient_details_array[2] + '</span></td>'+
                    '<input type="hidden" id="last_purchase_price_' + suffix + '" name="last_purchase_price[]" value="' + ingredient_details_array[3] + '"/>'+
                    '<td><input type="text" id="loss_amount_' + suffix + '" name="loss_amount[]" onfocus="this.select();" class="form-control aligning" placeholder="loss_amt" readonly /><span class="label_aligning">'+currency+'</span></td>'+
                    '<td><a class="btn btn-danger btn-xs" style="margin-left: 5px; margin-top: 10px;" onclick="return deleter(' + suffix + ',' + ingredient_details_array[0] +');" ><i class="fa fa-trash"></i> </a></td>'+
                    '</tr>';

                $('#suffix_hidden_field').val(suffix);

                $('#waste_cart tbody').append(cart_row);

                ingredient_id_container.push(ingredient_details_array[0]);

                $('#ingredient_id').val('').change();
                calculateAll();

            }
        });


        // Validate form
        $("#waste_add_form").submit(function(e){

            var date = $("#date").val();
            var employee_id = $("#employee_id").val();
            var note = $("#note").val();
            var ingredientCount = $("#waste_cart tbody tr").length;
            var error = false;

            if(employee_id==""){
                $("#employee_id_err_msg").text("responsible_person_field_required");
                $(".employee_id_err_msg_contnr").show(200);
                error = true;
            }

            if(date==""){
                $("#date_err_msg").text("date_field_required");
                $(".date_err_msg_contnr").show(200);
                error = true;
            }

            if(ingredientCount < 1){
                $("#ingredient_id_err_msg").text("at_least_ingredient");
                $(".ingredient_id_err_msg_contnr").show(200)
                error = true;
            }

            if(note.length>200){
                $("#note_err_msg").text("note_field_cannot");
                $(".note_err_msg_contnr").show(200);
                error = true;
            }

            $(".integerchk").each(function () {
                var n = $(this).attr("data-countID");
                var waste_amount = $.trim($("#waste_amount_"+n).val());
                if(waste_amount == '' || isNaN(waste_amount)){
                    $("#waste_amount_"+n).css({"border-color":"red"}).show(200).delay(2000,function(){
                        $("#waste_amount_"+n).css({"border-color":"#d2d6de"});
                    });
                    error = true;
                }
            });

            if(error==true){
                return error;
            }

        });

    });

    function calculateAll(){
        var total_loss = 0;
        var i = 1;
        $(".rowCount").each(function () {
            var id = $(this).attr("data-id");
            var waste_amount=$("#waste_amount_"+id).val();
            var temp = "#sl_"+id;
            $(temp).html(i);
            i++;
            if (typeof(waste_amount) !== "undefined" && waste_amount !== null) {

                var last_purchase_price = $("#last_purchase_price_"+id).val();

                if($.trim(waste_amount) == "" || $.isNumeric(waste_amount) == false){
                    waste_amount=0;
                }
                if($.trim(last_purchase_price) == "" || $.isNumeric(last_purchase_price) == false){
                    last_purchase_price=0;
                }

                var loss_amount = parseFloat($.trim(waste_amount)) * parseFloat($.trim(last_purchase_price));

                $("#loss_amount_"+id).val(loss_amount.toFixed(2));
                total_loss += parseFloat($.trim($("#loss_amount_" + id).val()));

            }
        });

        $("#total_loss").val(total_loss);

    }

    function deleter(suffix, ingredient_id){
        swal({
            title: "alert",
            text: "are_you_sure?",
            confirmButtonColor: '#3c8dbc',
            cancelButtonText:'cancel',
            confirmButtonText:'ok',
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
            calculateAll();
        });
    }

    function updateRowNo(){
        var numRows=$("#waste_cart tbody tr").length;
        for(var r=0;r<numRows;r++){
            $("#waste_cart tbody tr").eq(r).find("td:first p").text(r+1);
        }
    }
    //remove last digits if number is more than 2 digits after decimal
    function remove_last_two_digit_without_percentage(value,object_element){
        if(value.length>0 && value.indexOf('.')>0)
        {
            var percentage = false;
            var number_without_percentage = value;
            if(value.indexOf('%')>0){
                percentage = true;
                number_without_percentage = value.toString().substring(0, value.length - 1);
            }
            var number = number_without_percentage.split('.');
            if (number[1].length > 2)
            {
                var value = parseFloat(Math.floor(number_without_percentage* 100) / 100);
                add_percentage = (percentage)?'%':'';
                if(isNaN(value)){
                    object_element.val('');
                }else{
                    object_element.val(value.toString()+add_percentage);
                }

            }
        }
    }

</script>
@endsection
