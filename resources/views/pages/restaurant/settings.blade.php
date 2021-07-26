@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@php

    $social_link_option = '';

    foreach ($socialMediaList as $key => $socialMedia){
        if(empty($restaurant->socialLinks) && $key == 0 ){
            $social_link_option = '<option value="'.$socialMedia->id.'" selected>'.$socialMedia->name.'</option>'.$social_link_option;
        }else{
            $social_link_option .= '<option value="'.$socialMedia->id.'">'.$socialMedia->name.'</option>';
        }
        
    }


@endphp

@section('style')
    <style type="text/css">
        .required_star {
            color: #dd4b39;
        }

        .radio_button_problem {
            margin-bottom: 19px;
        }

        .radio_button_problem a svg {
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
            <h1>
                Restaurant Settings
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('restaurant.updateSettings')}}"
                              id="restaurant_setting_form" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <legend>Restaurant Information</legend>
                                            <div class="row">
                                                <!-- /.col -->
                                                <div class="col-md-3">
                                                    <label>ID <span class="required_star">*</span></label>
                                                    <input type="text" name="restaurant_id"
                                                           value="{{$restaurant->restaurant_id}}"
                                                           class="form-control" placeholder="ID"
                                                           readonly>
                                                    @if ($errors->has('restaurant_id'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('restaurant_id') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Name <span class="required_star">*</span></label>
                                                    <input type="text" name="name" value="{{$restaurant->name}}"
                                                           class="form-control"
                                                           placeholder="Name">
                                                    @if ($errors->has('name'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('name') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Phone <span class="required_star">*</span></label>
                                                    <input type="text" name="phone" value="{{$restaurant->phone}}"
                                                           class="form-control"
                                                           placeholder="Phone">
                                                    @if ($errors->has('phone'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('phone') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Email <span class="required_star">*</span></label>
                                                    <input type="email" name="email" value="{{$restaurant->email}}"
                                                           class="form-control"
                                                           placeholder="Email">
                                                    @if ($errors->has('email'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('email') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </fieldset>
                                        <hr/>
                                        <div class="form-group">
                                            <label>Upload Logo</label>
                                            <input type="file" name="logo" class="form-control">
                                            @if($logo)
                                                <img src="{{$baseURL."media/restaurant/logos/".($logo->logo)}}"
                                                     class="img-fluid img-thumbnail img-rounded" style="width: 100px; height: 100px;">
                                            @endif
                                        </div>

                                        @if ($errors->has('logo'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('logo') }}</p>
                                            </div>
                                        @endif

                                        <fieldset>
                                            <legend>Social Links</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table id="social_link_datatable" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 1%">SN</th>
                                                                <th style="width: 20%">user name</th>
                                                                <th style="width: 20%">password</th>
                                                                <th style="width: 20%">social media</th>
                                                                <th style="width: 10%"><span id="remove_all_social_links" style="cursor:pointer;">X</span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="social_link_table_body">
                                                            <?php
                                                                
                                                                $new_row_number = 1;
                                                                $show_social_link_row = '';
                                                                

                                                                if (isset($restaurant->socialLinks) && count($restaurant->socialLinks) > 0) {
                                                                    
                                                                    foreach ($restaurant->socialLinks as $socialLink) {

                                                                        $option =  '<option value="'.$socialLink->socialMedia->id.'" selected>'.$socialLink->socialMedia->name.'</option>';
                                                                        $show_social_link_row .= '<tr class="social_link_single_row" id="social_link_row_' . $new_row_number . '">';
                                                                        $show_social_link_row .= '<td>' . $new_row_number . '</td>';
                                                                        $show_social_link_row .= '<td><input type="text" name="user_names[]" class="form-control" value="' . $socialLink->username . '"/></td>';
                                                                        $show_social_link_row .= '<td><input type="password" name="passwords[]" class="form-control" hidden value="' . str_rot13($socialLink->password) . '" placeholder="********" required/></td>';
                                                                        $show_social_link_row .= '<td><select class="form-control" name="social_media[]">' . $option. $social_link_option.'</select></td>';
                                                                        $show_social_link_row .= '<td><span class="remove_this_social_link_row" id="remove_this_social_link_row_' . $new_row_number . '" style="cursor:pointer;">X</span></td>';
                                                                        $show_social_link_row .= '</tr>';
                                                                        $new_row_number++;
                                                                    }
                                                                }

                                                                echo $show_social_link_row;
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <button id="add_social_link" class="btn btn-primary" type="button">
                                                        Add Social Link
                                                    </button>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <hr/>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <legend>Location Information</legend>
                                            <div class="row">
                                                <div class="col-md-12 address-label-mt">
                                                    <label>Address <span class="required_star">*</span></label>
                                                    <input type="text" name="address" value="{{$restaurant->address}}"
                                                           class="form-control"
                                                           placeholder="Address">
                                                    @if ($errors->has('address'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('address') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-md-4">
                                                    <label>Country <span class="required_star">*</span></label>
                                                    <select tabindex="2" class="form-control select2" name="country"
                                                            style="width: 100%;" id="country">
                                                        <option value="">Select a Country</option>
                                                        @if(count($countries) > 0)
                                                            @foreach($countries as $k=>$v)
                                                                <option value="{{$v->id}}"
                                                                        @if($v->id === $restaurant->country_id) selected @endif>{{$v->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('country'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('country') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <label>State <span class="required_star">*</span></label>
                                                    <select tabindex="2" class="form-control select2" name="state"
                                                            style="width: 100%;" id="state">
                                                        <option value="">Select a State</option>
                                                        @if(count($states) > 0)
                                                            @foreach($states as $k=>$v)
                                                                <option value="{{$v->id}}"
                                                                        @if($v->id === $restaurant->state_id) selected @endif>{{$v->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('state'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('state') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-md-4">
                                                    <label>City <span class="required_star">*</span></label>
                                                    <select tabindex="2" class="form-control select2" name="city"
                                                            id="city"
                                                            style="width: 100%;">
                                                        <option value="">Select a City</option>
                                                        @if(count($cities) > 0)
                                                            @foreach($cities as $k=>$v)
                                                                <option value="{{$v->id}}"
                                                                        @if($v->id === $restaurant->city_id) selected @endif>{{$v->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('city'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>
                                                            <p>{{ $errors->first('city') }}</p></p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        </fieldset>
                                        <hr>
                                        <fieldset>
                                            <legend>Cuisine</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        @if (isset($restaurant->cuisines))
                                                            @foreach ($restaurant->cuisines as $key => $restaurantCuisine)
                                                            <div class="col-md-3">
                                                                <label>{{$key+1}}.</label> <span>{{$restaurantCuisine->name}}</span>
                                                            </div>
                                                            @endforeach
                                                            
                                                        @endif
                                                    </div>
                                                        

                                                    <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                                        <a role="button" class="btn btn-primary" id="add_edit_cuisine">Add/Edit Cuisine</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <hr>
                                        <fieldset>
                                            <legend>3rd Party Vendors</legend>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        @if (isset($restaurant->thirdPartyVendors))
                                                            @foreach ($restaurant->thirdPartyVendors as $restaurantThirdPartyVendor)
                                                                <label><input type="checkbox" class="restaurant_third_party_vendor_availability" name="availability" data-restaurant_third_party_vendor_id="{{$restaurantThirdPartyVendor->id}}" data-availability="{{$restaurantThirdPartyVendor->availability}}" @if ($restaurantThirdPartyVendor->availability == 'Yes') checked @endif><span>&nbsp;&nbsp;</span>{{$restaurantThirdPartyVendor->thirdPartyVendorInfo->name}}</label><br>
                                                            @endforeach
                                                            
                                                        @endif
                                                    </div>
                                                        

                                                    <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                                        <a role="button" class="btn btn-primary" id="add_third_party_vendors">Add 3rd Party Vendor</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <hr/>
                                        <fieldset>
                                            <legend>Fee Charges</legend>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="title text-center">Service</th>
                                                        <th class="title text-center">Unit</th>
                                                        <th class="title text-center">One Time Charge</th>
                                                        <th class="title text-center">Monthly charge</th>
                                                        <th class="title text-center">Annual Charge</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($restaurant->charges as $restaurantCharge)
                                                        <tr>
                                                            <td class="text-center">{{$restaurantCharge->chargeInfo->name}}</td>
                                                            <td class="text-center">{{$restaurantCharge->unit}}</td>
                                                            <td class="text-center">{{$restaurantCharge->one_time_charge}}</td>
                                                            <td class="text-center">{{$restaurantCharge->monthly_charge}}</td>
                                                            <td class="text-center">{{$restaurantCharge->annual_charge}}</td>
                                                        </tr>
                                                        
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </fieldset>
                                        <hr/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group radio_button_problem">
                                            <label>I Collect Tax <span class="required_star">*</span></label>
                                            <div class="radio">
                                                <label>
                                                    <input tabindex="5" type="radio" name="collect_tax"
                                                           id="collect_tax_yes" value="Yes" checked
                                                    @if($tax)
                                                        <?php
                                                            if ($tax->collect_tax == "Yes") {
                                                                echo "checked";
                                                            };
                                                            ?>
                                                        @endif
                                                    >Yes </label>
                                                <label>

                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                                    <input tabindex="6" type="radio" name="collect_tax"
                                                           id="collect_tax_no" value="No"
                                                    @if($tax)
                                                        <?php
                                                            if ($tax->collect_tax == "No") {
                                                                echo "checked";
                                                            };
                                                            ?>
                                                        @endif
                                                    >No
                                                </label>
                                            </div>
                                        </div>
                                        @if ($errors->has('collect_tax'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('collect_tax') }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if($tax)
                                    <div id="tax_yes_section" style="display:<?php if ($tax->collect_tax == "Yes") {
                                        echo "block;";
                                    } else {
                                        echo "none;";
                                    }?>">
                                        @else
                                            <div id="tax_yes_section" style="display:block">
                                                @endif
                                                {{--<div class="row">
                                                    <div class="col-md-6">
                                                        <button id="show_sample_invoice_with_tax" type="button" class="btn btn-primary" data-toggle="modal" data-target="#show_sample_invoice_with_tax_modal"><?php echo lang('show_invoice_sample'); ?></button>
                                                    </div>
                                                </div>--}}
                                                <br>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>My Tax Registration No <span
                                                                    class="required_star">*</span></label>
                                                            <input tabindex="1" type="text" id="tax_registration_no"
                                                                   name="tax_registration_no" class="form-control"
                                                                   placeholder="Tax registration no" @if($tax) value="{{$tax->reg_no}}" @endif>
                                                        </div>
                                                        @if ($errors->has('tax_registration_no'))
                                                            <div class="alert alert-error"
                                                                 style="padding: 5px !important;">
                                                                <p>{{ $errors->first('tax_registration_no') }}</p>
                                                            </div>
                                                        @endif
                                                        <div class="alert alert-error"
                                                             style="padding: 5px !important;display:none;"
                                                             id="tax_registration_no_error">
                                                            <p>The Tax Registration No field is required.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>My tax fields</label>
                                                            <table id="datatable" class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 1%">SN</th>
                                                                        <th style="width: 20%">Name</th>
                                                                        <th style="width: 20%">Rate</th>
                                                                        <th style="width: 10%"><span id="remove_all_taxes" style="cursor:pointer;">X</span>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tax_table_body">
                                                                    <?php
                                                                    $new_row_number = 1;
                                                                    $show_tax_row = '';
                                                                    if (isset($taxFields) && count($taxFields) > 0) {
                                                                        foreach ($taxFields as $single_tax) {
                                                                            $show_tax_row .= '<tr class="tax_single_row" id="tax_row_' . $new_row_number . '">';
                                                                            $show_tax_row .= '<td>' . $new_row_number . '</td>';
                                                                            $show_tax_row .= '<td><input type="text" name="taxes[]" class="form-control" value="' . $single_tax->name . '"/></td>';
                                                                            $show_tax_row .= '<td><input type="text" name="rates[]" class="form-control" value="' . $single_tax->rate . '" required/></td>';
                                                                            $show_tax_row .= '<td><span class="remove_this_tax_row" id="remove_this_tax_row_' . $new_row_number . '" style="cursor:pointer;">X</span></td>';
                                                                            $show_tax_row .= '</tr>';
                                                                            $new_row_number++;
                                                                        }
                                                                    }

                                                                    echo $show_tax_row;
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <button id="add_tax" class="btn btn-primary" type="button">
                                                                add more
                                                            </button>
                                                        </div>
                                                        @if ($errors->has('taxes'))
                                                            <div class="alert alert-error"
                                                                 style="padding: 5px !important;">
                                                                <p>{{ $errors->first('taxes') }}</p>
                                                            </div>
                                                        @endif
                                                        {{--<button id="show_how_tax_fields_work" type="button" class="btn btn-primary" data-toggle="modal" data-target="#show_how_tax_fields_work_modal"><?php echo lang('how_tax_fields_work'); ?></button>--}}
                                                        <a href="#" role="button" class="btn btn-primary">Customize
                                                            Receipt 
                                                        </a>
                                                        <a href="#" role="button" class="btn btn-primary">Payment
                                                            Setting
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" name="submit" value="submit" class="btn btn-primary">
                                            submit
                                        </button>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- third_party_vendor_modal -->
    <div class="modal bs-example-modal-sm" id="third_party_vendor_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="third_party_vendor_modal_button2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Third Party Vendors</h4>
                </div>
                <form id="add_third_party_vendor_form">
                    <div class="modal-body">
                        {{-- <label>Country <span class="required_star">*</span></label> --}}
                        <div class="form-group col-md-12">
                            <select tabindex="2" class="form-control select2" name="third_party_vendors[]" multiple="multiple"
                                    style="width: 100%;" id="third_party_vendors">
                                @if(count($thirdPartyVendors) > 0)
                                    @foreach($thirdPartyVendors as $k=>$v)
                                        <option value="{{$v->id}}" @foreach ($restaurant->thirdPartyVendors as $restaurantThirdPartyVendor) @if ($restaurantThirdPartyVendor->third_party_vendors_id == $v->id)
                                                selected
                                            @endif @endforeach>{{$v->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('third_party_vendor'))
                                <div class="alert alert-error" style="padding: 5px !important;">
                                    <p>
                                    <p>{{ $errors->first('third_party_vendor') }}</p></p>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Note</label><br>
                            <p>Select Third-party Vendors for those which you want to work with.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="third_party_vendor_modal_button" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /third_party_vendor_modal -->

    <!-- cuisine_modal -->
    <div class="modal bs-example-modal-sm" id="cuisine_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="cuisine_modal_button2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Cuisines</h4>
                </div>
                <form id="add_edit_cuisine_form">
                    <div class="modal-body">
                        {{-- <label>Country <span class="required_star">*</span></label> --}}
                        <div class="form-group col-md-12">
                            <select tabindex="2" class="form-control select2" name="cuisines[]" multiple="multiple"
                                    style="width: 100%;" id="cuisines">
                                @if(count($cuisines) > 0)
                                    @foreach($cuisines as $k=>$v)
                                        <option value="{{$v->id}}" @foreach ($restaurant->cuisines as $restaurantCuisine) @if ($restaurantCuisine->id == $v->id)
                                            selected
                                        @endif @endforeach>{{$v->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('cuisines'))
                                <div class="alert alert-error" style="padding: 5px !important;">
                                    <p>
                                    <p>{{ $errors->first('cuisines') }}</p></p>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Note</label><br>
                            <p>Select Cuisines for those which you want to work with.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="cuisine_modal_button" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /cuisine_modal -->

@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>

    <script type="text/javascript">
        $(function () {

            $('.select2').select2();
            var baseURL = getBaseURL();


            $("#third_party_vendors").select2({
                placeholder: "Select Vendors"
            });

            <?php //if ($outlet_information->collect_vat != "Yes") { ?>
            //$('#vat_reg_no_container').hide();
            <?php //} ?>
            $('#restaurant_setting_form').on('submit', function () {
                var error = 0;

                var outlet_name = $('#outlet_name');
                var address = $('#address');
                var phone = $('#phone');
                var collect_tax_yes = $('#collect_tax_yes');
                var collect_tax_no = $('#collect_tax_no');
                var tax_title = $('#tax_title');
                var tax_registration_no = $('#tax_registration_no');
                var tax_is_gst_yes = $('#tax_is_gst_yes');
                var tax_is_gst_no = $('#tax_is_gst_no');
                var state_code = $('#state_code');
                var pre_or_post_payment_post = $('#pre_or_post_payment_post');

                if (outlet_name.val() == "") {
                    error++;
                    $('#outlet_name_error').fadeIn();
                }
                if (address.val() == "") {
                    error++;
                    $('#address_error').fadeIn();
                }
                if (phone.val() == "") {
                    error++;
                    $('#phone_error').fadeIn();
                }
                if (!collect_tax_yes.is(':checked') && !collect_tax_no.is(':checked')) {
                    error++;
                }
                if (collect_tax_yes.is(':checked')) {
                    if (tax_title.val() == "") {
                        error++;
                        $('#tax_title_error').fadeIn();
                    }
                    if (tax_registration_no.val() == "") {
                        error++;
                        $('#tax_registration_no').fadeIn();
                    }
                    if (!tax_is_gst_yes.is(':checked') && !tax_is_gst_no.is(':checked')) {
                        error++;
                    }
                    if (tax_is_gst_yes.is(':checked')) {
                        if (state_code.val() == "") {
                            error++;
                            $('#state_code_error').fadeIn();
                        }
                    }
                }


                if (pre_or_post_payment_post.val() == "") {
                    error++;
                }
                /*console.log('Here are '+error+' errors');

                return false;*/
            });
            $(document).on('click', '.remove_this_tax_row', function () {
                var this_row = $(this);
                var this_row_id = this_row.attr('id').substr(20);
                $('#tax_row_' + this_row_id).remove();
                var j = 1;
                $('.remove_this_tax_row').each(function (i, obj) {
                    $(this).attr('id', 'remove_this_tax_row_' + j);
                    $(this).parent().parent().attr('id', 'tax_row_' + j);
                    $(this).parent().parent().find('td:first-child').text(j);
                    j++;
                });
            });
            $(document).on('click', '#remove_all_taxes', function () {
                $('.tax_single_row').remove();
            });
            $('#collect_tax_yes').on('click', function () {
                $('#tax_yes_section').fadeIn();
            });
            $('#collect_tax_no').on('click', function () {
                $('#tax_yes_section').fadeOut()
            });

            $('#tax_is_gst_yes').on('click', function () {
                $('#gst_yes_section').fadeIn();
            });
            $('#tax_is_gst_no').on('click', function () {
                $('#gst_yes_section').fadeOut()
            });
            $('#add_tax').on('click', function () {
                var table_tax_body = $('#tax_table_body');
                var tax_body_row_length = table_tax_body.find('tr').length;
                var new_row_number = tax_body_row_length + 1;
                var show_tax_row = '';
                show_tax_row += '<tr class="tax_single_row" id="tax_row_' + new_row_number + '">';
                show_tax_row += '<td>' + new_row_number + '</td>';
                show_tax_row += '<td><input type="text" name="taxes[]" class="form-control"/></td>';
                show_tax_row += '<td><input type="text" name="rates[]" class="form-control" required/></td>';
                show_tax_row += '<td><span class="remove_this_tax_row" id="remove_this_tax_row_' + new_row_number + '" style="cursor:pointer;">X</span></td>';
                show_tax_row += '</tr>';

                table_tax_body.append(show_tax_row);
            });

            $('#add_social_link').on('click', function () {
                var table_social_link_body = $('#social_link_table_body');
                var social_link_body_row_length = table_social_link_body.find('tr').length;
                var new_row_number = social_link_body_row_length + 1;
                var show_social_link_row = '';
                var option = '<?php echo $social_link_option;?>';

                show_social_link_row += '<tr class="social_link_single_row" id="social_link_row_' + new_row_number + '">';
                show_social_link_row += '<td>' + new_row_number + '</td>';
                show_social_link_row += '<td><input type="text" name="user_names[]" class="form-control" required/></td>';
                show_social_link_row += '<td><input type="password" name="passwords[]" class="form-control" required/></td>';
                show_social_link_row += '<td><select class="form-control" name="social_media[]">'+option+'</select></td>';
                show_social_link_row += '<td><span class="remove_this_social_link_row" id="remove_this_social_link_row_' + new_row_number + '" style="cursor:pointer;">X</span></td>';
                show_social_link_row += '</tr>';

                table_social_link_body.append(show_social_link_row);
            });

            $(document).on('click', '.remove_this_social_link_row', function () {
                var this_row = $(this);
                var this_row_id = this_row.attr('id').substr(28);
                alert(this_row_id+':'+this_row)
                $('#social_link_row_' + this_row_id).remove();
                var j = 1;
                $('.remove_this_social_link_row').each(function (i, obj) {
                    $(this).attr('id', 'remove_this_social_link_row' + j);
                    $(this).parent().parent().attr('id', 'social_link_row_' + j);
                    $(this).parent().parent().find('td:first-child').text(j);
                    j++;
                });
            });

            $(document).on('click', '#remove_all_social_links', function () {
                $('.social_link_single_row').remove();
            });


            $('input[type=radio][name=collect_vat]').change(function () {
                if (this.value == 'Yes') {
                    $('#vat_reg_no_container').show();
                } else if (this.value == 'No') {
                    $('#vat_reg_no_container').hide();
                }
            });

            //third party vendors
            $('#add_third_party_vendors').on('click', function () {

                $('#third_party_vendor_modal').show();

            });

            $('#third_party_vendor_modal_button').on('click', function () {

                $('#third_party_vendor_modal').hide();

            });

            $('#third_party_vendor_modal_button2').on('click', function () {

                $('#third_party_vendor_modal').hide();

            });

            $('#add_third_party_vendor_form').on('submit', function (e) {
                e.preventDefault();
                var third_party_vendors = $('#third_party_vendors').val();
                // console.log(third_party_vendors);
                

                if (third_party_vendors != '') {

                    $.ajax({
                        type: 'POST',
                        url: baseURL +'/restaurant/settings/add-third-party-vendors',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            'third_party_vendors': third_party_vendors,
                        },
                        dataType: "json",
                        success: function(data){
                                
                            console.log(data);
                                if (data.success) {
                                    // location.reload();
                                    toastr.success('Successfully added');
                                    
                                }
                        }
                    });
                    
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Select at least One!',
                    })
                }

                // console.log(supplier_id);
                
            });

            $('.restaurant_third_party_vendor_availability').on('change', function () {
                
                var restaurant_third_party_vendor_id = $(this).data('restaurant_third_party_vendor_id');
                var availability = $(this).data('availability');

                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure?',
                    text: 'You want to change it.',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        $.ajax({
                            type: 'POST',
                            url: baseURL +'/restaurant/settings/change-third-party-vendor-availability-by-ajax',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                'restaurant_third_party_vendor_id': restaurant_third_party_vendor_id,
                                'availability' :availability
                            },
                            dataType: "json",
                            success: function(data){
                                    
                                location.reload();
                                toastr.success('Successfully Updated');
                                console.log(data);
                                
                            }
                        });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                });

                        


            });

            //Cuisine
            $('#add_edit_cuisine').on('click', function () {

                $('#cuisine_modal').show();

            });

            $('#cuisine_modal_button').on('click', function () {

                
                $('#cuisine_modal').hide();

            });

            $('#cuisine_modal_button2').on('click', function () {
                
                $('#cuisine_modal').hide();

            });

            $('#add_edit_cuisine_form').on('submit', function (e) {
            e.preventDefault();
            var cuisines = $('#cuisines').val();
            //console.log(cuisines);


            if (cuisines != '') {

                $.ajax({
                    type: 'POST',
                    url: baseURL +'/restaurant/settings/add-cuisines',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        'cuisines': cuisines,
                    },
                    dataType: "json",
                    success: function(data){
                            
                        console.log(data);
                            if (data.success) {
                                toastr.success('Successfully added');
                                location.reload();
                            }
                    }
                });
                
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Select at least One!',
                })
            }

            // console.log(supplier_id);

            });


        })
    </script>
@endsection
