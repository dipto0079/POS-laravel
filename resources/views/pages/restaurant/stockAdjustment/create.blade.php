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
                Add Stock Adjustment
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
                        <form method="post" action="{{route('stock-adjustment.store')}}" id="consumption_form">
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
                                        <label>Ingredients <span class="required_star">*</span></label>
                                        <select tabindex="4" class="form-control select2" name="ingredient_id" id="ingredient_id" style="width: 100%;">
                                            <option value="">select</option>
                                            <?php
                                            $ignoreID = array();
                                            foreach ($ingredients as $ingnts) {
                                                if (!in_array($ingnts->id, $ignoreID)) {
                                                    $ignoreID[] = $ingnts->id;
                                                    ?>
                                                    <option value="<?php echo $ingnts->id . "|" . $ingnts->name . " (" . $ingnts->code . ")|" . $ingnts->unitInfo->name . "|" . getLastPurchasePrice($ingnts->id) ?>" ><?php echo $ingnts->name . " (" . $ingnts->code . ")" ?></option>
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
                                <div class="col-md-3">
                                    <div class="hidden-xs hidden-sm">&nbsp;</div>
                                    <a class="btn btn-danger" style="background-color: red;margin-top: 5px;" data-toggle="modal" data-target="#noticeModal">Read me first</a>
                                </div>
                                <div class="clearfix"></div>
                                <div class="hidden-lg hidden-sm">&nbsp;</div>
                            </div>
        
        
        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive" id="consumption_cart">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th width="10%">Sn</th>
                                                    <th width="25%">Ingredient(Code)</th>
                                                    <th width="25%">Quantity/Amount	</th>
                                                    <th width="25%">Consumption Status	</th>
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
                                <a href="{{route('stock-adjustment.index')}}"><button type="button" class="btn btn-primary">Back</button></a> 
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
                                            <strong style="margin-left: 39%">Notice</strong><br>
                                            notice_text_1
                                        </p>
                                    </div>
                                    <div class="col-md-12 hidden-xs hidden-sm">
                                        <p class="foodMenuCartNotice">
                                            <strong style="margin-left: 43%">Notice</strong><br>
                                            notice_text_1
                                        </p>
                                    </div>
                                    <div class="col-md-12 hidden-xs hidden-lg">
                                        <p class="foodMenuCartNotice">
                                            <strong style="margin-left: 43%">Notice</strong><br>
                                            notice_text_1
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="foodMenuCartInfo">
                                            <!-- Please mention the consumption in the unit shown at right. <br>
                                             eg: 5Kg, 0.20Kg, 3L, 0.50L, 1Pcs etc
                                             <br>
                                             <br>-->
                                            <a style="font-weight: bold;" href="https://www.convert-me.com/en/convert/" target="_blank">Click here</a> notice_text_2  
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
        </section>

    </div>
@endsection

@section('script')

<script>
    var ingredient_id_container = []; 

    $(function () { 
 
        //Initialize Select2 Elements
        $('.select2').select2(); 

        var suffix = <?php if (isset($consumption_ingredients)) { echo count($consumption_ingredients);} else { echo 0; } ?>; 
         
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
                        text: "Ingredient Already Remain",
                        confirmButtonText:'Ok',
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
                    '<td style="width: 15%"><input type="text" data-countID="'+suffix+'" id="consumption_amount_' + suffix + '" name="consumption_amount[]" onfocus="this.select();" class="form-control integerchk aligning" placeholder="Consumption Amount" onkeyup="return calculateAll();"/><span class="label_aligning"> ' + ingredient_details_array[2] + '</span></td>'+
                    '<td><select tabindex="4" class="form-control select2" name="consumption_status[]" id="consumption_status_' + suffix + '" style="width: 100%;"><option value="">select</option><option value="Plus">Plus</option><option value="Minus">Minus</option></select></td>'+
                    '<td><a class="btn btn-danger btn-xs" style="margin-left: 5px; margin-top: 10px;" onclick="return deleter(' + suffix + ',' + ingredient_details_array[0] +');" ><i class="fa fa-trash"></i> </a></td>'+
                    '</tr>';

                $('#suffix_hidden_field').val(suffix);  

                $('#consumption_cart tbody').append(cart_row);

                ingredient_id_container.push(ingredient_details_array[0]);

                $('#ingredient_id').val('').change();
                calculateAll();

            }
        }); 
        
         
        // Validate form
        $("#consumption_form").submit(function(){
            var date = $("#date").val();
            var employee_id = $("#employee_id").val();
            var note = $("#note").val(); 
            var ingredientCount = $("#consumption_cart tbody tr").length;
            var error = false;

            if(employee_id==""){ 
                $("#employee_id_err_msg").text("Responsible person field required");
                $(".employee_id_err_msg_contnr").show(200);
                error = true;
            } 

            if(date==""){ 
                $("#date_err_msg").text("Date field required");
                $(".date_err_msg_contnr").show(200);
                error = true;
            } 

            if(ingredientCount < 1){ 
                $("#ingredient_id_err_msg").text("At least 1 Ingredient is required.");
                $(".ingredient_id_err_msg_contnr").show(200)
                error = true;
            } 

            if(note.length>200){
                $("#note_err_msg").text("The Note field cannot exceed 200 characters in length.");
                $(".note_err_msg_contnr").show(200);
                error = true;
            }
            $(".integerchk").each(function () {
                var n = $(this).attr("data-countID");
                var consumption_amount = $.trim($("#consumption_amount_"+n).val());
                if(consumption_amount == '' || isNaN(consumption_amount)){
                    $("#consumption_amount_"+n).css({"border-color":"red"}).show(200).delay(2000,function(){
                        $("#consumption_amount_"+n).css({"border-color":"#d2d6de"});
                    });
                    error = true;
                }

                var consumption_status = $.trim($("#consumption_status_"+n).val());
                if(consumption_status == ''){
                    $("#consumption_status_"+n).css({"border-color":"red"}).show(200).delay(2000,function(){
                        $("#consumption_status_"+n).css({"border-color":"#d2d6de"});
                    });
                    error = true;
                }
            });
            if(error == true){
                return false;
            } 
        });

    })  

    function calculateAll(){
        var total_loss = 0;
        var i = 1;
        $(".rowCount").each(function () {
            var id = $(this).attr("data-id");
            var consumption_amount=$("#consumption_amount_"+id).val();
            var temp = "#sl_"+id;
            $(temp).html(i);
            i++;
            if (typeof(consumption_amount) !== "undefined" && consumption_amount !== null) {

                var last_purchase_price = $("#last_purchase_price_"+id).val();

                if($.trim(consumption_amount) == "" || $.isNumeric(consumption_amount) == false){
                    consumption_amount=0;
                }
                if($.trim(last_purchase_price) == "" || $.isNumeric(last_purchase_price) == false){
                    last_purchase_price=0;
                }  
                 
                var loss_amount = parseFloat($.trim(consumption_amount)) * parseFloat($.trim(last_purchase_price));

                $("#loss_amount_"+id).val(loss_amount.toFixed(2));
                total_loss += parseFloat($.trim($("#loss_amount_" + id).val()));

            }
        });

        $("#total_loss").val(total_loss); 
  
    }

    function deleter(suffix, ingredient_id){
        swal({
            title: "alert!",
            text: "Are you sure?",
            confirmButtonColor: '#3c8dbc',
            cancelButtonText:'Cancel',
            confirmButtonText:'OK',
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
        var numRows=$("#consumption_cart tbody tr").length;
        for(var r=0;r<numRows;r++){
            $("#consumption_cart tbody tr").eq(r).find("td:first p").text(r+1);
        }
    }
</script>

@endsection
