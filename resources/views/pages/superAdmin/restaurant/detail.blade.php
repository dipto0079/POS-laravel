@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Detail of Restaurant
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-body">
                            <fieldset>
                                <legend>Restaurant Information</legend>
                                <div class="row">
                                    <!-- /.col -->
                               {{--     <div class="col-md-3">
                                        <b>ID:</b> {{$restaurant->id}}
                                    </div>--}}
                                    <div class="col-md-3">
                                        <b>Name:</b> {{$restaurant->name}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Phone:</b> {{$restaurant->phone}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Email:</b> {{$restaurant->email}}
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </fieldset>
                            <br/>
                            <fieldset>
                                <legend>Location Information</legend>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <b>Country:</b> {{$restaurant->country->name}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>State:</b> {{$restaurant->state->name}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>City:</b> {{$restaurant->city->name}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Address:</b> {{$restaurant->address}}
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Owner Information</legend>
                                <div class="row">
                                    <!-- /.col -->
                                    <div class="col-md-3">
                                        <b>Manager Name:</b> {{$restaurantUser->manager_name}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Manager Phone:</b> {{$restaurantUser->manager_phone}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Manager Email:</b> {{$restaurantUser->manager_email}}
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Fee charges</legend>
                                @foreach ($restaurant->charges as $key=> $restaurantCharge)
                                    <form action="#" class="edit_charge_form">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <select class="form-control select2" name="charge_id"  id="charge_id">
                                                    <option value="{{$restaurantCharge->charge_id}}" @if($restaurantCharge->charge_id = $restaurantCharge->charge_id)) selected @else disabled @endif>{{$restaurantCharge->chargeInfo->name}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="number" name="unit" id="unit" value="{{$restaurantCharge->unit}}" class="form-control" placeholder="Unit">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="number" name="one_time_charge" id="one_time_charge" value="{{$restaurantCharge->one_time_charge}}" class="form-control" placeholder="One time charge">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="number" name="monthly_charge" id="monthly_charge" value="{{$restaurantCharge->monthly_charge}}" class="form-control" placeholder="Monthly charge">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <input type="number" name="annual_charge" id="annual_charge" value="{{$restaurantCharge->annual_charge}}" class="form-control" placeholder="Annual charge">
                                                <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{$restaurant->id}}" class="form-control">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <button class="btn btn-warning">Edit and Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                @endforeach
                                <form id="add_charge_form" action="" method="post">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <select class="form-control select2" name="charge_id"  id="charge_id">
                                                @foreach ($charges as $charge)
                                                    <option value="{{$charge->id}}" @foreach ($restaurant->charges as $item) @if($item->charge_id == $charge->id ) disabled @endif @endforeach>{{$charge->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="number" name="unit" id="unit" value="" class="form-control" placeholder="Unit" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="number" name="one_time_charge" id="one_time_charge" value="" class="form-control" placeholder="One time charge" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="number" name="monthly_charge" id="monthly_charge" value="" class="form-control" placeholder="Monthly charge" required>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="number" name="annual_charge" id="annual_charge" value="" class="form-control" placeholder="Annual charge" required>
                                            <input type="hidden" name="restaurant_id" id="restaurant_id" value="{{$restaurant->id}}" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary">Add And Save</button>
                                        </div>
                                    </div>
                                </form>

                                {{-- <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" selected>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"selected>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"selected>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"selected>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"selected>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"selected>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"selected>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"selected>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"selected>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"selected>Payroll</option>
                                            <option value="12"disabled>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <select class="form-control select2" name="charge"  id="">
                                            <option value="1" disabled>POS Charges</option>
                                            <option value="2" disabled>POS Server</option>
                                            <option value="3"disabled>POS Ordering Pads</option>
                                            <option value="4"disabled>Kitchen Printers</option>
                                            <option value="5"disabled>Social Marketing</option>
                                            <option value="6"disabled>Reservation System</option>
                                            <option value="7"disabled>Online Ordering</option>
                                            <option value="8"disabled>Website</option>
                                            <option value="9"disabled>Training</option>
                                            <option value="10"disabled>Bookkeeping</option>
                                            <option value="11"disabled>Payroll</option>
                                            <option value="12"selected>Support</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="unit" value="" class="form-control" placeholder="Unit">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="one_time_charge" value="" class="form-control" placeholder="One time charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="monthly_charge" value="" class="form-control" placeholder="Monthly charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" name="annual_charge" value="" class="form-control" placeholder="Annual charge">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <button class="btn btn-primary">save</button>
                                    </div>
                                </div> --}}
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/state.js'!!}"></script>

    <script type="text/javascript">
        $(function () {
            var baseURL = getBaseURL();
            $('#add_charge_form').on('submit', function (event) {
                event.preventDefault();
                var form_value = $( this ).serializeArray();

                var charge_id       = form_value[0].value;
                var unit            =  form_value[1].value;
                var one_time_charge =   form_value[2].value;
                var monthly_charge  = form_value[3].value;
                var annual_charge   =  form_value[4].value;
                var restaurant_id   = form_value[5].value;

                $.ajax({
                    type: 'POST',
                    url: baseURL +'/SuperAdmin/add-restaurant-charge-by-ajax',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        'charge_id'       : charge_id,
                        'unit'            : unit,
                        'one_time_charge' : one_time_charge,
                        'monthly_charge'  : monthly_charge,
                        'annual_charge'   : annual_charge,
                        'restaurant_id'   : restaurant_id
                    },
                    dataType: "json",
                    success: function(data){
                            
                        
                        if (data.exist) {
                            toastr.success(data.exist);
                        }else if(data.errors){
                            $.each(data.errors, function ( index, error) {
                                toastr.error(error);
                            })
                            console.log(data);
                        }else{
                            toastr.success('Successfully Added');
                            location.reload();
                        }
                        
                        
                    }
                });


            });

            $('.edit_charge_form').on('submit', function (event) {
                event.preventDefault();
                var form_value = $( this ).serializeArray();
                var charge_id       = form_value[0].value;
                var unit            =  form_value[1].value;
                var one_time_charge =   form_value[2].value;
                var monthly_charge  = form_value[3].value;
                var annual_charge   =  form_value[4].value;
                var restaurant_id   = form_value[5].value;
                
                $.ajax({
                    type: 'POST',
                    url: baseURL +'/SuperAdmin/edit-restaurant-charge-by-ajax',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        'charge_id'       : charge_id,
                        'unit'            : unit,
                        'one_time_charge' : one_time_charge,
                        'monthly_charge'  : monthly_charge,
                        'annual_charge'   : annual_charge,
                        'restaurant_id'   : restaurant_id
                    },
                    dataType: "json",
                    success: function(data){
                            
                        
                        if (data.not_found) {
                            toastr.success(data.not_found);
                        }else if(data.errors){
                            $.each(data.errors, function ( index, error) {
                                toastr.error(error);
                            })
                            console.log(data);
                        }else{
                            toastr.success('Successfully Updated');
                            location.reload();
                        }
                        
                        
                    }
                });
            });
        });
    </script>
@endsection
