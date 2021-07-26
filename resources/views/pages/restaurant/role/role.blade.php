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
                    <form method="post" action="{{route('add-permissions')}}">
                        @csrf
                        <div class="form-group">
                            @foreach($all_rople as $v_data)
                                <div class="col-md-2">
                                    <label><input type="radio" value="{{$v_data->id}}" style="cursor: pointer"
                                                  onclick="showPermision({{$v_data->id}})" name="role_name"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>{{$v_data->user_name}}
                                    </label>
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
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                                  data-toggle="tab">Ordering Food</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Edit
                                Oder</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                                                   data-toggle="tab">Operation</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab"
                                                   data-toggle="tab">Payment</a></li>
                        <li role="presentation"><a href="#admin" aria-controls="settings" role="tab" data-toggle="tab">Admin</a>
                        </li>
                        <li role="presentation"><a href="#report" aria-controls="settings" role="tab" data-toggle="tab">Report</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="dine_in"  name="dine_in"  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Dine
                                        in</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="to_go" name="to_go" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>To
                                        Go</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="pickup" name="pickup" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Pickup</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="delivery" name="delivery" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Delivery</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="open_food" name="open_food" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Open
                                        Food</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="note" name="note" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Note</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="moble_order" name="moble_order" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Moble
                                        Order</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="multi_order" name="multi_order" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Multi
                                        Order</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="open_table" name="open_table" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Open
                                        Table</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="modify_in_kitcjen_item_option" name="modify_in_kitcjen_item_option"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Modify
                                        In Kitcjen Item Option</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="ressend_in_kitchen_item" name="ressend_in_kitchen_item" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Ressend
                                        In Kitchen Item</label>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="edit_oder" name="edit_oder" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Edit
                                        Oder</label>
                                </div>
                            </div>

                            {{--Operation All--}}

                            <div role="tabpanel" class="tab-pane" id="messages">
                                <div class="col-md-6">
                                    <label>User Management</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="create_group_role" name="create_group_role"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Create
                                                Group Role</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="create_role" name="create_role" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Create
                                                Role</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_staff" name="add_staff" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                User/Staff</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="staff_list" name="staff_list" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>User/Staff
                                                List</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Contacts</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="suppliers_group" name="suppliers_group" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Suppliers
                                                Group</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="suppliers_list" name="suppliers_list" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Suppliers
                                                list</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="customer_group" name="customer_group" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Customer
                                                Group</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="customer_list" name="customer_list" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Customers
                                                List</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Products</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_ingredient_category" name="add_ingredient_category"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Ingredient Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_ingredient_category" name="list_ingredient_category"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Ingredient Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_ingredient_unit" name="list_ingredient_unit"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Ingredient Unit</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_ingredient_unit" name="add_ingredient_unit"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Ingredient Unit</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_ingredient" name="add_ingredient" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Ingredient</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="upload_ingredient_by_file" name="upload_ingredient_by_file"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Upload
                                                Ingredient by File</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_ingredient" name="list_ingredient" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Ingredient</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Purchases</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_purchases_group" name="add_purchases_group"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Purchases Group
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_purchases" name="list_purchases" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Purchases</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Floor</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_floor" name="add_floor" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Floor</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_floor" name="list_floor" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Floor</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Sale</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="pos" name="pos" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>POS</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_sale" name="list_sale" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Sale</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Food Menu</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_category" name="add_category" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_category" name="list_category" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_sub_category" name="add_sub_category"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Sub Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_sub_category" name="list_sub_category"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Sub Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_shifts" name="add_shifts" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Shifts</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_shifts" name="list_shifts" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Shifts</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_modifiers" name="add_modifiers" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Modifiers</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_modifiers" name="list_modifiers" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Modifiers</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_food_menu" name="add_food_menu" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Food Menu</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_food_menu" name="list_food_menu" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Food Menu</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane" id="settings">
                                <div class="col-md-6">
                                    <label>Settings</label> <br>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="payment_getaway" name="payment_getaway" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Payment
                                                Getaway</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="payment_method" name="payment_method" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Payment
                                                Method</label>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{--Admin All--}}


                            <div role="tabpanel" class="tab-pane" id="admin">
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="kitchen_panels" name="kitchen_panels" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Kitchen
                                        Panels</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="waiter_panels" name="waiter_panels" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Waiter
                                        Panels</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="attendance" name="attendance" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Attendance</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="stock" name="stock" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Stock</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="stock_adjustment" name="stock_adjustment" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Stock
                                        Adjustment</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="reservation" name="reservation" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Reservation</label>
                                </div>
                                <div class="col-md-6">
                                    <label>Inventory Adjustments</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_adjustments" name="add_adjustments" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Adjustments</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_inventory_adjustments" name="list_inventory_adjustments"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Inventory Adjustments</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Expanse</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="expanse_category" name="expanse_category"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Expanse
                                                Category</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="expanse" name="expanse" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Expanse</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="expanse_items" name="expanse_items" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Expanse
                                                Items</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Waste</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_waste" name="add_waste" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Waste</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_waste" name="list_waste" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Waste</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Gift Card</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="gift_card_list" name="gift_card_list" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Gift
                                                Card List</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="sell_gift_card" name="sell_gift_card" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Sell
                                                Gift Card</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_gift_card" name="add_gift_card" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Gift Card</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Settings</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="restaurant_settings" name="restaurant_settings"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Restaurant
                                                Settings</label>
                                        </div>

                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_email_template" name="add_email_template"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Email Template</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="profile_update" name="profile_update" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Profile
                                                Update</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="profile_update" name="company_update" style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Company
                                                Update</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Payment</label> <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_supplier_payment" name="add_supplier_payment"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Supplier Payment</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_supplier_payment" name="list_supplier_payment"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Supplier Due Payment</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="add_customer_payment" name="add_customer_payment"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Add
                                                Customer Payment</label>
                                        </div>
                                        <div class="col-md-12">
                                            <label><input type="checkbox" id="list_customer_payment" name="list_customer_payment"
                                                          style="cursor: pointer"
                                                          class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>List
                                                Customer Due Payment</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div role="tabpanel" class="tab-pane" id="report">
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="register_report" name="register_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Register
                                        Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="daily_summaery_report" name="daily_summaery_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Daily
                                        Summaery Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="food_sale_report" name="food_sale_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Food
                                        Sale Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="daily_sale_report" name="daily_sale_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Daily
                                        Sale Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="detailed_sale_report" name="detailed_sale_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Detailed
                                        Sale Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="consumption_report" name="consumption_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Consumption
                                        Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="inventory_report" name="inventory_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Inventory
                                        Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="low_inventory_report" name="low_inventory_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Low
                                        Inventory Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="profit_loss_report" style="cursor: pointer" name="profit_loss_report"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Profit
                                        Loss Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="kitchen_performance_report" name="kitchen_performance_report"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Kitchen
                                        Performance Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="attendance_report" style="cursor: pointer" name="attendance_report"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Attendance
                                        Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="supplier_ledher" name="supplier_ledher" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Supplier
                                        Ledger</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="supplier_due_report" name="supplier_due_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Supplier
                                        Due Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="customer_due_report" name="customer_due_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Customer
                                        Due Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="customer_ledger" name="customer_ledger" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Customer
                                        Ledger</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="prchase_report" name="prchase_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Purchase
                                        Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="expense_report" name="expense_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Expense
                                        Report</label>
                                </div>
                                <div class="col-md-6">
                                    <label><input type="checkbox" id="waste_report" name="waste_report" style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Waste
                                        Report</label>
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
                </form>
            </div>
        </section>
    </div>
@endsection

@section('script')


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>

    <script>
        function showPermision(id) {
            //alert(id);
            $.ajax({
                type: "GET",
                url: "show-json/" + id,
                dataType: 'JSON',
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert(errorMessage);
                },
                success: function (data) {
                    if(data.length===0)
                    {

                        $('#dine_in').prop('checked',0);
                        $('#to_go').prop('checked',0);
                        $('#pickup').prop('checked',0);
                        $('#delivery').prop('checked',0);
                        $('#open_food').prop('checked',0);
                        $('#note').prop('checked',0);
                        $('#moble_order').prop('checked',0);
                        $('#multi_order').prop('checked',0);
                        $('#open_table').prop('checked',0);
                        $('#modify_in_kitcjen_item_option').prop('checked',0);
                        $('#ressend_in_kitchen_item').prop('checked',0);
                        $('#edit_oder').prop('checked',0);
                        $('#create_group_role').prop('checked',0);
                        $('#create_role').prop('checked',0);
                        $('#add_staff').prop('checked',0);
                        $('#staff_list').prop('checked',0);
                        $('#suppliers_group').prop('checked',0);
                        $('#suppliers_list').prop('checked',0);
                        $('#customer_group').prop('checked',0);
                        $('#customer_list').prop('checked',0);
                        $('#add_ingredient_category').prop('checked',0);
                        $('#list_ingredient_category').prop('checked',0);
                        $('#list_ingredient_unit').prop('checked',0);
                        $('#add_ingredient_unit').prop('checked',0);
                        $('#add_ingredient').prop('checked',0);
                        $('#upload_ingredient_by_file').prop('checked',0);
                        $('#list_ingredient').prop('checked',0);
                        $('#add_purchases_group').prop('checked',0);
                        $('#list_purchases').prop('checked',0);
                        $('#add_floor').prop('checked',0);
                        $('#list_floor').prop('checked',0);
                        $('#pos').prop('checked',0);
                        $('#list_sale').prop('checked',0);
                        $('#add_category').prop('checked',0);
                        $('#list_category').prop('checked',0);
                        $('#add_sub_category').prop('checked',0);
                        $('#list_sub_category').prop('checked',0);
                        $('#add_shifts').prop('checked',0);
                        $('#list_shifts').prop('checked',0);
                        $('#add_modifiers').prop('checked',0);
                        $('#list_modifiers').prop('checked',0);
                        $('#add_food_menu').prop('checked',0);
                        $('#list_food_menu').prop('checked',0);
                        $('#payment_getaway').prop('checked',0);
                        $('#payment_method').prop('checked',0);
                        $('#kitchen_panels').prop('checked',0);
                        $('#waiter_panels').prop('checked',0);
                        $('#attendance').prop('checked',0);
                        $('#stock').prop('checked',0);
                        $('#stock_adjustment').prop('checked',0);
                        $('#reservation').prop('checked',0);
                        $('#add_adjustments').prop('checked',0);
                        $('#list_inventory_adjustments').prop('checked',0);
                        $('#expanse_category').prop('checked',0);
                        $('#expanse').prop('checked',0);
                        $('#expanse_items').prop('checked',0);
                        $('#add_waste').prop('checked',0);
                        $('#list_waste').prop('checked',0);
                        $('#gift_card_list').prop('checked',0);
                        $('#sell_gift_card').prop('checked',0);
                        $('#add_gift_card').prop('checked',0);
                        $('#restaurant_settings').prop('checked',0);
                        $('#add_email_template').prop('checked',0);
                        $('#profile_update').prop('checked',0);
                        $('#add_supplier_payment').prop('checked',0);
                        $('#list_supplier_payment').prop('checked',0);
                        $('#add_customer_payment').prop('checked',0);
                        $('#list_customer_payment').prop('checked',0);
                        $('#register_report').prop('checked',0);
                        $('#daily_summaery_report').prop('checked',0);
                        $('#food_sale_report').prop('checked',0);
                        $('#daily_sale_report').prop('checked',0);
                        $('#detailed_sale_report').prop('checked',0);
                        $('#consumption_report').prop('checked',0);
                        $('#inventory_report').prop('checked',0);
                        $('#low_inventory_report').prop('checked',0);
                        $('#profit_loss_report').prop('checked',0);
                        $('#kitchen_performance_report').prop('checked',0);
                        $('#attendance_report').prop('checked',0);
                        $('#supplier_ledher').prop('checked',0);
                        $('#supplier_due_report').prop('checked',0);
                        $('#customer_due_report').prop('checked',0);
                        $('#customer_ledger').prop('checked',0);
                        $('#prchase_report').prop('checked',0);
                        $('#expense_report').prop('checked',0);
                        $('#waste_report').prop('checked',0);
                        $('#company_update').prop('checked',0);

                    }
                    else {
                        $('#dine_in').prop('checked',data.dine_in);
                        $('#to_go').prop('checked',data.to_go);
                        $('#pickup').prop('checked',data.pickup);
                        $('#delivery').prop('checked',data.delivery);
                        $('#open_food').prop('checked',data.open_food);
                        $('#note').prop('checked',data.note);
                        $('#moble_order').prop('checked',data.moble_order);
                        $('#multi_order').prop('checked',data.multi_order);
                        $('#open_table').prop('checked',data.open_table);
                        $('#modify_in_kitcjen_item_option').prop('checked',data.modify_in_kitcjen_item_option);
                        $('#ressend_in_kitchen_item').prop('checked',data.ressend_in_kitchen_item);
                        $('#edit_oder').prop('checked',data.edit_oder);
                        $('#create_group_role').prop('checked',data.create_group_role);
                        $('#create_role').prop('checked',data.create_role);
                        $('#add_staff').prop('checked',data.add_staff);
                        $('#staff_list').prop('checked',data.staff_list);
                        $('#suppliers_group').prop('checked',data.suppliers_group);
                        $('#suppliers_list').prop('checked',data.suppliers_list);
                        $('#customer_group').prop('checked',data.customer_group);
                        $('#customer_list').prop('checked',data.customer_list);
                        $('#add_ingredient_category').prop('checked',data.add_ingredient_category);
                        $('#list_ingredient_category').prop('checked',data.list_ingredient_category);
                        $('#list_ingredient_unit').prop('checked',data.list_ingredient_unit);
                        $('#add_ingredient_unit').prop('checked',data.add_ingredient_unit);
                        $('#add_ingredient').prop('checked',data.add_ingredient);
                        $('#upload_ingredient_by_file').prop('checked',data.upload_ingredient_by_file);
                        $('#list_ingredient').prop('checked',data.list_ingredient);
                        $('#add_purchases_group').prop('checked',data.add_purchases_group);
                        $('#list_purchases').prop('checked',data.list_purchases);
                        $('#add_floor').prop('checked',data.add_floor);
                        $('#list_floor').prop('checked',data.list_floor);
                        $('#pos').prop('checked',data.pos);
                        $('#list_sale').prop('checked',data.list_sale);
                        $('#add_category').prop('checked',data.add_category);
                        $('#list_category').prop('checked',data.list_category);
                        $('#add_sub_category').prop('checked',data.add_sub_category);
                        $('#list_sub_category').prop('checked',data.list_sub_category);
                        $('#add_shifts').prop('checked',data.add_shifts);
                        $('#list_shifts').prop('checked',data.list_shifts);
                        $('#add_modifiers').prop('checked',data.add_modifiers);
                        $('#list_modifiers').prop('checked',data.list_modifiers);
                        $('#add_food_menu').prop('checked',data.add_food_menu);
                        $('#list_food_menu').prop('checked',data.list_food_menu);
                        $('#payment_getaway').prop('checked',data.payment_getaway);
                        $('#payment_method').prop('checked',data.payment_method);
                        $('#kitchen_panels').prop('checked',data.kitchen_panels);
                        $('#waiter_panels').prop('checked',data.waiter_panels);
                        $('#attendance').prop('checked',data.attendance);
                        $('#stock').prop('checked',data.stock);
                        $('#stock_adjustment').prop('checked',data.stock_adjustment);
                        $('#reservation').prop('checked',data.reservation);
                        $('#add_adjustments').prop('checked',data.add_adjustments);
                        $('#list_inventory_adjustments').prop('checked',data.list_inventory_adjustments);
                        $('#expanse_category').prop('checked',data.expanse_category);
                        $('#expanse').prop('checked',data.expanse);
                        $('#expanse_items').prop('checked',data.expanse_items);
                        $('#add_waste').prop('checked',data.add_waste);
                        $('#list_waste').prop('checked',data.list_waste);
                        $('#gift_card_list').prop('checked',data.gift_card_list);
                        $('#sell_gift_card').prop('checked',data.sell_gift_card);
                        $('#add_gift_card').prop('checked',data.add_gift_card);
                        $('#restaurant_settings').prop('checked',data.restaurant_settings);
                        $('#add_email_template').prop('checked',data.add_email_template);
                        $('#profile_update').prop('checked',data.profile_update);
                        $('#add_supplier_payment').prop('checked',data.add_supplier_payment);
                        $('#list_supplier_payment').prop('checked',data.list_supplier_payment);
                        $('#add_customer_payment').prop('checked',data.add_customer_payment);
                        $('#list_customer_payment').prop('checked',data.list_customer_payment);
                        $('#register_report').prop('checked',data.register_report);
                        $('#daily_summaery_report').prop('checked',data.daily_summaery_report);
                        $('#food_sale_report').prop('checked',data.food_sale_report);
                        $('#daily_sale_report').prop('checked',data.daily_sale_report);
                        $('#detailed_sale_report').prop('checked',data.detailed_sale_report);
                        $('#consumption_report').prop('checked',data.consumption_report);
                        $('#inventory_report').prop('checked',data.inventory_report);
                        $('#low_inventory_report').prop('checked',data.low_inventory_report);
                        $('#profit_loss_report').prop('checked',data.profit_loss_report);
                        $('#kitchen_performance_report').prop('checked',data.kitchen_performance_report);
                        $('#attendance_report').prop('checked',data.attendance_report);
                        $('#supplier_ledher').prop('checked',data.supplier_ledher);
                        $('#supplier_due_report').prop('checked',data.supplier_due_report);
                        $('#customer_due_report').prop('checked',data.customer_due_report);
                        $('#customer_ledger').prop('checked',data.customer_ledger);
                        $('#prchase_report').prop('checked',data.prchase_report);
                        $('#expense_report').prop('checked',data.expense_report);
                        $('#waste_report').prop('checked',data.waste_report);
                        $('#company_update').prop('checked',data.company_update);

                        console.log(data);
                        //alert('error');
                    }

                }
            });
        }

    </script>


@endsection
