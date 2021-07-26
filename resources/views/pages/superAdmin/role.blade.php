@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
            <section class="content-header">
                <h1>
                Role
                </h1>
            </section>
            <section class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            @foreach($all_rople as $v_data)
                            <div class="col-md-2">
                                <label><input type="radio" style="cursor: pointer"  onclick="showPermision({{$v_data->id}})" name="radio" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>{{$v_data->user_name}}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="content-header">
                <h1>
                 Permissions
                </h1>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Ordering Food</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Edit Oder</a></li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Operation</a></li>
                                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Payment</a></li>
                                <li role="presentation"><a href="#admin" aria-controls="settings" role="tab" data-toggle="tab">Admin</a></li>
                                <li role="presentation"><a href="#report" aria-controls="settings" role="tab" data-toggle="tab">Report</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Dine in</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>To Go</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Pickup</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Delivery</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Open Food</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Note</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Moble Order</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Multi Order</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Open Table</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Modify In Kitcjen Item Option</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Ressend In Kitchen Item</label>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile">2</div>
                                <div role="tabpanel" class="tab-pane" id="messages">3</div>
                                <div role="tabpanel" class="tab-pane" id="settings">4</div>
                                <div role="tabpanel" class="tab-pane" id="admin">5</div>
                                <div role="tabpanel" class="tab-pane" id="report">
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Register Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer"  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Daily Summaery Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Food Sale Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Daily Sale Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Detailed Sale Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Consumption Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Inventory Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Low Inventory Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" name="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Profit Loss Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Kitchen Performance Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" name="checkbox" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Attendance Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer"  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Supplier Ledger</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Supplier Due Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Customer Due Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Customer Ledger</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Purchase Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Expense Report</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><input type="checkbox" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Waste Report</label>
                                    </div>
                                </div>
                                </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" style="float: right " class="btn btn-primary">
                                ADD Permissions
                        </button>
                    </div>
                    <div class="col-md-1">
                        <div>
                            <a href="" style="float: right " role="button" class="btn btn-danger">Back
                            </a>
                        </div>
                    </div>
                </div>
            </section>
    </div>
@endsection

@section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
        <script src="{!! $baseURL.'resources/assets/js/custom/admin/dashboard.js'!!}"></script>
    <script>
        function  showPermision(id)
        {
            alert(id);
        }
    </script>
@endsection
