<?php
$baseURL = getBaseURL();
?>
@php


    $res_id = Auth::guard('restaurantUser')->user()->role_id;

    $status = array(
    "dine_in"=>1,
    "to_go"=>1,
    "pickup"=>1,
    "delivery"=>1,
    "open_food"=>1,
    "note"=>1,
    "moble_order"=>1,
    "multi_order"=>1,
    "open_table"=>1,
    "modify_in_kitcjen_item_option"=>1,
    "ressend_in_kitchen_item"=>1,
    "edit_oder"=>1,
    "create_group_role"=>1,
    "create_role"=>1,
    "add_staff"=>1,
    "staff_list"=>1,
    "suppliers_group"=>1,
    "suppliers_list"=>1,
    "customer_group"=>1,
    "customer_list"=>1,
    "add_ingredient_category"=>1,
    "list_ingredient_category"=>1,
    "list_ingredient_unit"=>1,
    "add_ingredient_unit"=>1,
    "add_ingredient"=>1,
    "upload_ingredient_by_file"=>1,
    "list_ingredient"=>1,
    "add_purchases_group"=>1,
    "list_purchases"=>1,
    "add_floor"=>1,
    "list_floor"=>1,
    "pos"=>1,
    "list_sale"=>1,
    "add_category"=>1,
    "list_category"=>1,
    "add_sub_category"=>1,
    "list_sub_category"=>1,
    "add_shifts"=>1,
    "list_shifts"=>1,
    "add_modifiers"=>1,
    "list_modifiers"=>1,
    "add_food_menu"=>1,
    "list_food_menu"=>1,
    "payment_getaway"=>1,
    "payment_method"=>1,
    "kitchen_panels"=>1,
    "waiter_panels"=>1,
    "attendance"=>1,
    "stock"=>1,
    "stock_adjustment"=>1,
    "reservation"=>1,
    "add_adjustments"=>1,
    "list_inventory_adjustments"=>1,
    "expanse_category"=>1,
    "expanse"=>1,
    "expanse_items"=>1,
    "add_waste"=>1,
    "list_waste"=>1,
    "gift_card_list"=>1,
    "sell_gift_card"=>1,
    "add_gift_card"=>1,
    "restaurant_settings"=>1,
    "add_email_template"=>1,
    "profile_update"=>1,
    "add_supplier_payment"=>1,
    "list_supplier_payment"=>1,
    "add_customer_payment"=>1,
    "list_customer_payment"=>1,
    "register_report"=>1,
    "daily_summaery_report"=>1,
    "food_sale_report"=>1,
    "daily_sale_report"=>1,
    "detailed_sale_report"=>1,
    "consumption_report"=>1,
    "inventory_report"=>1,
    "low_inventory_report"=>1,
    "profit_loss_report"=>1,
    "kitchen_performance_report"=>1,
    "attendance_report"=>1,
    "supplier_ledher"=>1,
    "supplier_due_report"=>1,
    "customer_due_report"=>1,
    "customer_ledger"=>1,
    "prchase_report"=>1,
    "expense_report"=>1,

    "waste_report"=>1);


    if($res_id!=0)
    {
    $allrole=DB::table('tbl_super_admins_role')
    ->where('id',$res_id)
    ->first();

    $permission = json_decode($allrole->permissions);

    //echo $permission->add_staff;


    $status = array(
    "dine_in"=>$permission->dine_in,
    "to_go"=>$permission->to_go,
    "pickup"=>$permission->pickup,
    "delivery"=>$permission->delivery,
    "open_food"=>$permission->open_food,
    "note"=>$permission->note,
    "moble_order"=>$permission->moble_order,
    "multi_order"=>$permission->multi_order,
    "open_table"=>$permission->open_table,
    "modify_in_kitcjen_item_option"=>$permission->modify_in_kitcjen_item_option,
    "ressend_in_kitchen_item"=>$permission->ressend_in_kitchen_item,
    "edit_oder"=>$permission->edit_oder,
    "create_group_role"=>$permission->create_group_role,
    "create_role"=>$permission->create_role,
    "add_staff"=>$permission->add_staff,
    "staff_list"=>$permission->staff_list,
    "suppliers_group"=>$permission->suppliers_group,
    "suppliers_list"=>$permission->suppliers_list,
    "customer_group"=>$permission->customer_group,
    "customer_list"=>$permission->customer_list,
    "add_ingredient_category"=>$permission->add_ingredient_category,
    "list_ingredient_category"=>$permission->list_ingredient_category,
    "list_ingredient_unit"=>$permission->list_ingredient_unit,
    "add_ingredient_unit"=>$permission->add_ingredient_unit,
    "add_ingredient"=>$permission->add_ingredient,
    "upload_ingredient_by_file"=>$permission->upload_ingredient_by_file,
    "list_ingredient"=>$permission->list_ingredient,
    "add_purchases_group"=>$permission->add_purchases_group,
    "list_purchases"=>$permission->list_purchases,
    "add_floor"=>$permission->add_floor,
    "list_floor"=>$permission->list_floor,
    "pos"=>$permission->pos,
    "list_sale"=>$permission->list_sale,
    "add_category"=>$permission->add_category,
    "list_category"=>$permission->list_category,
    "add_sub_category"=>$permission->add_sub_category,
    "list_sub_category"=>$permission->list_sub_category,
    "add_shifts"=>$permission->add_shifts,
    "list_shifts"=>$permission->list_shifts,
    "add_modifiers"=>$permission->add_modifiers,
    "list_modifiers"=>$permission->list_modifiers,
    "add_food_menu"=>$permission->add_food_menu,
    "list_food_menu"=>$permission->list_food_menu,
    "payment_getaway"=>$permission->payment_getaway,
    "payment_method"=>$permission->payment_method,
    "kitchen_panels"=>$permission->kitchen_panels,
    "waiter_panels"=>$permission->waiter_panels,
    "attendance"=>$permission->attendance,
    "stock"=>$permission->stock,
    "stock_adjustment"=>$permission->stock_adjustment,
    "reservation"=>$permission->reservation,
    "add_adjustments"=>$permission->add_adjustments,
    "list_inventory_adjustments"=>$permission->list_inventory_adjustments,
    "expanse_category"=>$permission->expanse_category,
    "expanse"=>$permission->expanse,
    "expanse_items"=>$permission->expanse_items,
    "add_waste"=>$permission->add_waste,
    "list_waste"=>$permission->list_waste,
    "gift_card_list"=>$permission->gift_card_list,
    "sell_gift_card"=>$permission->sell_gift_card,
    "add_gift_card"=>$permission->add_gift_card,
    "restaurant_settings"=>$permission->restaurant_settings,
    "add_email_template"=>$permission->add_email_template,
    "profile_update"=>$permission->profile_update,
    "add_supplier_payment"=>$permission->add_supplier_payment,
    "list_supplier_payment"=>$permission->list_supplier_payment,
    "add_customer_payment"=>$permission->add_customer_payment,
    "list_customer_payment"=>$permission->list_customer_payment,
    "register_report"=>$permission->register_report,
    "daily_summaery_report"=>$permission->daily_summaery_report,
    "food_sale_report"=>$permission->food_sale_report,
    "daily_sale_report"=>$permission->daily_sale_report,
    "detailed_sale_report"=>$permission->detailed_sale_report,
    "consumption_report"=>$permission->consumption_report,
    "inventory_report"=>$permission->inventory_report,
    "low_inventory_report"=>$permission->low_inventory_report,
    "profit_loss_report"=>$permission->profit_loss_report,
    "kitchen_performance_report"=>$permission->kitchen_performance_report,
    "attendance_report"=>$permission->attendance_report,
    "supplier_ledher"=>$permission->supplier_ledher,
    "supplier_due_report"=>$permission->supplier_due_report,
    "customer_due_report"=>$permission->customer_due_report,
    "customer_ledger"=>$permission->customer_ledger,
    "prchase_report"=>$permission->prchase_report,
    "expense_report"=>$permission->expense_report,

    "waste_report"=>$permission->waste_report
    );


    }

@endphp


<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <ul class="sidebar-menu">
            <li class="header">Main Navigation</li>
        </ul>
        <div id="left_menu_to_scroll">
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">

                <li>
                    <a href="{{route('restaurant.home')}}">
                        <i data-feather="home"></i> <span>Home</span></a>
                </li>
                @php
                    $usermanagement=1;

                    $Check=0;
                    $total = 4;

                    if(!$status['create_group_role'])
                    $Check= $Check+1;

                    if(!$status['create_role'])
                    $Check = $Check+1;

                    if(!$status['add_staff'])
                    $Check = $Check+1;

                    if(!$status['staff_list'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $usermanagement=0;

                @endphp

                @if($usermanagement)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="users"></i> <span>User Management</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">

                            @if($status['create_group_role'])
                                <li><a href="{{route('add_roles')}}"><i class="fa fa-angle-double-right"></i>Create Group
                                        Role</a></li>
                            @endif

                            @if($status['create_role'])
                                <li><a href="{{route('role')}}"><i class="fa fa-angle-double-right"></i>Create Role</a>
                                </li>
                            @endif

                            @if($status['add_staff'])
                                <li><a href="{{route('restaurant.staff')}}"><i class="fa fa-angle-double-right"></i>Add
                                        User/Staff</a></li>
                            @endif

                            @if($status['staff_list'])
                                <li><a href="{{route('all-staff-restaurant')}}"><i class="fa fa-angle-double-right"></i>User/Staff
                                        List</a></li>
                            @endif
                        </ul>
                    </li>
                @endif



                @php
                    $contacts=1;
                    $Check=0;
                    $total = 4;

                    if(!$status['suppliers_group'])
                    $Check= $Check+1;

                    if(!$status['suppliers_list'])
                    $Check = $Check+1;

                    if(!$status['customer_group'])
                    $Check = $Check+1;

                    if(!$status['customer_list'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $contacts=0;

                @endphp
                @if($contacts)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="user-check"></i> <span>Contacts</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['suppliers_group'])
                                <li><a href="{{route('suppliers.create')}}"><i class="fa fa-angle-double-right"></i> Add Suppliers Group</a></li>
                            @endif
                            @if($status['suppliers_list'])
                                <li><a href="{{route('suppliers.index')}}"><i class="fa fa-angle-double-right"></i>Suppliers List</a>
                                </li>
                            @endif
                                @if($status['suppliers_list'])
                                    <li><a href="{{route('suppliers.create')}}"><i class="fa fa-angle-double-right"></i>Add Suppliers</a>
                                    </li>
                                @endif
                            @if($status['customer_group'])
                                <li><a href="{{route('customer-groups.create')}}"><i
                                            class="fa fa-angle-double-right"></i>Add Customer Group</a></li>
                            @endif
                                @if($status['customer_group'])
                                    <li><a href="{{route('customer-groups.index')}}"><i
                                                class="fa fa-angle-double-right"></i>Customer Group List</a></li>
                                @endif
                            @if($status['customer_list'])
                                <li><a href="{{route('customers.create')}}"><i class="fa fa-angle-double-right"></i>Add Customers</a>
                                </li>
                            @endif
                                @if($status['customer_list'])
                                    <li><a href="{{route('customers.index')}}"><i class="fa fa-angle-double-right"></i>Customers List</a>
                                    </li>
                                @endif
                        </ul>
                    </li>
                @endif


                @php
                    $products=1;
                    $Check=0;
                    $total = 7;

                    if(!$status['add_ingredient_category'])
                    $Check= $Check+1;

                    if(!$status['list_ingredient_category'])
                    $Check = $Check+1;

                    if(!$status['list_ingredient_unit'])
                    $Check = $Check+1;

                    if(!$status['add_ingredient_unit'])
                    $Check = $Check+1;
                    if(!$status['upload_ingredient_by_file'])
                    $Check = $Check+1;
                    if(!$status['add_ingredient'])
                    $Check = $Check+1;
                    if(!$status['list_ingredient'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $products=0;

                @endphp

                @if($products)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="package"></i> <span>Products</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['add_ingredient_category'])
                                <li><a href="{{route('ingredient-categories.create')}}"><i
                                            class="fa fa-angle-double-right"></i>Add
                                        Ingredient Category</a></li>
                            @endif
                            @if($status['list_ingredient_category'])
                                <li><a href="{{route('ingredient-categories.index')}}"><i
                                            class="fa fa-angle-double-right"></i>List
                                        Ingredient Category</a></li>
                            @endif
                            @if($status['add_ingredient_unit'])
                                <li><a href="{{route('ingredient-units.create')}}"><i class="fa fa-angle-double-right"></i>Add Ingredient Unit</a></li>
                            @endif
                            @if($status['list_ingredient_unit'])
                                <li><a href="{{route('ingredient-units.index')}}"><i
                                            class="fa fa-angle-double-right"></i>List
                                        Ingredient Unit</a></li>
                            @endif
                            @if($status['add_ingredient'])
                                <li><a href="{{route('ingredients.create')}}"><i class="fa fa-angle-double-right"></i>Add
                                        Ingredient</a></li>
                            @endif
                            @if($status['upload_ingredient_by_file'])
                                <li><a href="{{route('ingredients.upload')}}"><i class="fa fa-angle-double-right"></i>Upload
                                        Ingredient by File</a></li>
                            @endif
                            @if($status['list_ingredient'])
                                <li><a href="{{route('ingredients.index')}}"><i class="fa fa-angle-double-right"></i>List
                                        Ingredient</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


                @php
                    $food_menu=1;
                    $Check=0;
                    $total = 10;

                    if(!$status['add_category'])
                    $Check= $Check+1;

                    if(!$status['list_category'])
                    $Check = $Check+1;

                    if(!$status['add_sub_category'])
                    $Check = $Check+1;

                    if(!$status['list_sub_category'])
                    $Check = $Check+1;

                    if(!$status['add_shifts'])
                    $Check = $Check+1;

                    if(!$status['list_shifts'])
                    $Check = $Check+1;

                    if(!$status['add_modifiers'])
                    $Check = $Check+1;

                    if(!$status['list_modifiers'])
                    $Check = $Check+1;

                    if(!$status['add_food_menu'])
                    $Check = $Check+1;

                    if(!$status['list_food_menu'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $food_menu=0;

                @endphp

                @if($food_menu)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="pie-chart"></i> <span>Food Menu</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['add_category'])
                                <li><a href="{{route('food-menu-categories.subcreate')}}"><i class="fa fa-angle-double-right"></i>Add Category</a></li>
                            @endif

                            @if($status['list_category'])
                                <li><a href="{{route('food-menu-categories.subcategory')}}"><i
                                            class="fa fa-angle-double-right"></i>List Category</a></li>
                            @endif

                            @if($status['add_sub_category'])
                                <li><a href="{{route('food-menu-categories.create')}}"><i
                                            class="fa fa-angle-double-right"></i>Add Sub Category</a></li>
                            @endif

                            @if($status['list_sub_category'])
                                <li><a href="{{route('food-menu-categories.index')}}"><i
                                            class="fa fa-angle-double-right"></i>List
                                        Sub Category</a></li>
                            @endif

                            @if($status['add_shifts'])
                                <li><a href="{{route('food-menu-shifts.create')}}"><i
                                            class="fa fa-angle-double-right"></i>Add
                                        Shifts</a></li>
                            @endif

                            @if($status['list_shifts'])
                                <li><a href="{{route('food-menu-shifts.index')}}"><i
                                            class="fa fa-angle-double-right"></i>List
                                        Shifts</a></li>
                            @endif

                            @if($status['add_modifiers'])
                                <li><a href="{{route('food-menu-modifiers.create')}}"><i
                                            class="fa fa-angle-double-right"></i>Add
                                        Modifiers</a></li>
                            @endif

                            @if($status['list_modifiers'])
                                <li><a href="{{route('food-menu-modifiers.index')}}"><i
                                            class="fa fa-angle-double-right"></i>List
                                        Modifiers</a></li>
                            @endif

                            @if($status['add_food_menu'])
                                <li><a href="{{route('food-menu-categories.create')}}"><i
                                            class="fa fa-angle-double-right"></i>Add
                                        Food Menu</a></li>
                            @endif

                            @if($status['list_food_menu'])
                                <li><a href="{{route('food-menu.index')}}"><i class="fa fa-angle-double-right"></i>List
                                        Food
                                        Menu</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @php
                    $purchases=1;
                    $Check=0;
                    $total = 2;

                    if(!$status['add_purchases_group'])
                    $Check= $Check+1;

                    if(!$status['list_purchases'])
                    $Check = $Check+1;



                    if($Check==$total)
                    $purchases=0;

                @endphp



                @if($purchases)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="shopping-cart"></i> <span>Purchases</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['add_purchases_group'])
                                <li><a href="{{route('purchases.create')}}"><i class="fa fa-angle-double-right"></i>Add
                                        Purchases</a></li>
                            @endif

                            @if($status['list_purchases'])
                                <li><a href="{{route('purchases.index')}}"><i class="fa fa-angle-double-right"></i>List
                                        Purchases</a></li>
                            @endif
                        </ul>
                    </li>
                @endif



                @php
                    $floor=1;
                    $Check=0;
                    $total = 2;

                    if(!$status['add_floor'])
                    $Check= $Check+1;

                    if(!$status['list_floor'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $purchases=0;

                @endphp

                @if($floor)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="shopping-bag"></i> <span>Floor</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['add_floor'])
                                <li><a href="{{route('floors.create')}}"><i class="fa fa-angle-double-right"></i>Add
                                        Floor</a></li>
                            @endif

                            @if($status['list_floor'])
                                <li><a href="{{route('floors.index')}}"><i class="fa fa-angle-double-right"></i>List
                                        Floor</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @php
                    $sale=1;
                    $Check=0;
                    $total = 2;

                    if(!$status['pos'])
                    $Check= $Check+1;

                    if(!$status['list_sale'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $purchases=0;

                @endphp

                @if($sale)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="trending-up"></i> <span>Sale</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['pos'])
                                <li><a href="{{route('pos.index')}}"><i class="fa fa-angle-double-right"></i>POS</a>
                                </li>
                            @endif

                            @if($status['list_sale'])
                                <li><a href="{{route('sales.index')}}"><i class="fa fa-angle-double-right"></i>List
                                        Sale</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!----------------Job--------------------->
               <!--  <li class="treeview">
                        <a href="#">
                            <i data-feather="codepen"></i> <span>Job</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">

                                <li><a href=""><i class="fa fa-angle-double-right"></i>Add Job</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>View Applicant</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Add Applicant</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Interview</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Hire</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Document</a></li>
                        </ul>
                    </li>


                <li class="treeview">
                        <a href="#">
                            <i data-feather="users"></i> <span>Team</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Roster</a></li>
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Scheduling</a></li>
                        </ul>
                    </li>


                <li class="treeview">
                        <a href="#">
                            <i data-feather="clock"></i> <span>Time Sheets</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                                <li><a href=""><i class="fa fa-angle-double-right"></i>Payroll Summary</a></li>

                        </ul>
                    </li>



                <li class="treeview">
                        <a href="#">
                            <i data-feather="send"></i> <span>Message</span>
                        </a>
                    </li>



                <li class="treeview">
                        <a href="#">
                            <i data-feather="file-text"></i> <span>Report</span>
                        </a>
                    </li> -->
                <!------------------------------------->

                @if($status['kitchen_panels'])
                    <li>
                        <a href="{{route('panels.all')}}">
                            <i data-feather="archive"></i> <span>Kitchen Panels</span>
                        </a>
                    </li>
                @endif

                @if($status['waiter_panels'])
                    <li>
                        <a href="{{route('waiter-panel.index')}}">
                            <i data-feather="coffee"></i> <span>Waiter Panel</span>
                        </a>
                    </li>
                @endif


                @php
                    $inventory_adjustments=1;
                    $Check=0;
                    $total = 2;

                    if(!$status['add_adjustments'])
                    $Check= $Check+1;

                    if(!$status['list_inventory_adjustments'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $inventory_adjustments=0;

                @endphp

                @if($inventory_adjustments)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="layout"></i> <span>Inventory Adjustments</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['add_adjustments'])
                                <li><a href="{{route('add_inventoryadjustment')}}"><i
                                            class="fa fa-angle-double-right"></i>Add
                                        Adjustments</a></li>
                            @endif
                            @if($status['list_inventory_adjustments'])
                                <li><a href="{{route('inventory_adjustments')}}"><i
                                            class="fa fa-angle-double-right"></i>List
                                        Inventory Adjustments</a></li>
                            @endif

                        </ul>
                    </li>
                @endif

                @php
                    $payment=1;
                    $Check=0;
                    $total = 4;

                    if(!$status['add_supplier_payment'])
                    $Check= $Check+1;

                    if(!$status['list_supplier_payment'])
                    $Check = $Check+1;

                    if(!$status['add_customer_payment'])
                    $Check = $Check+1;

                    if(!$status['list_customer_payment'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $payment=0;
                @endphp

                @if($payment)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="dollar-sign"></i> <span>Payment</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['add_supplier_payment'])
                                <li><a href="{{route('add_supplier_due')}}"><i class="fa fa-angle-double-right"></i>Add
                                        Supplier
                                        Payment</a></li>
                            @endif
                            @if($status['list_supplier_payment'])
                                <li><a href="{{route('supplier_due')}}"><i class="fa fa-angle-double-right"></i>List
                                        Supplier
                                        Due Payment</a></li>
                            @endif
                            @if($status['add_customer_payment'])
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>Add Customer Payment</a></li>
                            @endif
                            @if($status['list_customer_payment'])
                                <li><a href="#"><i class="fa fa-angle-double-right"></i>List Customer Due Payment</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                @php
                    $expanse=1;
                    $Check=0;
                    $total = 3;

                    if(!$status['expanse'])
                    $Check= $Check+1;

                    if(!$status['expanse_category'])
                    $Check = $Check+1;

                    if(!$status['expanse_items'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $expanse=0;
                @endphp
                @if($expanse)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="shopping-bag"></i> <span>Expanse</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['expanse_category'])
                                <li><a href="{{route('expenses.add_expenses_category')}}"><i
                                            class="fa fa-angle-double-right"></i>Expanse Category</a></li>
                            @endif
                            @if($status['expanse'])
                                <li><a href="{{route('expenses.index')}}"><i
                                            class="fa fa-angle-double-right"></i>Expanse</a>
                                </li>
                            @endif
                            @if($status['expanse_items'])
                                <li><a href="{{route('expense-items.index')}}"><i class="fa fa-angle-double-right"></i>Expanse
                                        Items</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


                @php
                    $waste=1;
                    $Check=0;
                    $total = 2;

                    if(!$status['add_waste'])
                    $Check= $Check+1;

                    if(!$status['list_waste'])
                    $Check = $Check+1;


                    if($Check==$total)
                    $waste=0;
                @endphp
                @if($waste)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="trash-2"></i> <span>Waste</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['add_waste'])
                                <li><a href="{{route('wastes.create')}}"><i class="fa fa-angle-double-right"></i>Add Waste</a></li>
                            @endif
                            @if($status['list_waste'])
                                <li><a href="{{route('wastes.index')}}"><i class="fa fa-angle-double-right"></i>List
                                        Waste</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if($status['attendance'])
                   {{-- <li>
                        <a href="{{route('attendances.index')}}">
                            <i data-feather="clock"></i> <span>Attendance</span>
                        </a>
                    </li>--}}

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="clock"></i> <span>Attendance</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
{{--                                <li><a href="{{route('attendances.index')}}"><i class="fa fa-angle-double-right"></i>Attendance--}}
{{--                                        List</a>--}}
{{--                                </li>--}}
{{--                                <li><a href="{{route('attendances.create')}}"><i class="fa fa-angle-double-right"></i>Attendance ADD</a></li>--}}
                                <li><a href="{{route('Staff-Attendance')}}"><i class="fa fa-angle-double-right"></i>Staff Attendance</a></li>
                                <li><a href="{{route('Staff-Attendance-all')}}"><i class="fa fa-angle-double-right"></i>Staff Attendance All</a></li>
                        </ul>
                    </li>

                @endif

                @if($status['stock'])
                    <li>
                        <a href="{{route('stock.index')}}">
                            <i data-feather="server"></i> <span>Stock</span>
                        </a>
                    </li>
                @endif

                @if($status['stock_adjustment'])
                    <li>
                        <a href="{{route('stock-adjustment.index')}}">
                            <i data-feather="sun"></i> <span>Stock Adjustment</span>
                        </a>
                    </li>
                @endif

                @php
                    $gift_card=1;
                    $Check=0;
                    $total = 3;

                    if(!$status['gift_card_list'])
                    $Check= $Check+1;

                    if(!$status['sell_gift_card'])
                    $Check = $Check+1;

                    if(!$status['add_gift_card'])
                    $Check = $Check+1;


                    if($Check==$total)
                    $gift_card=0;
                @endphp

                @if($gift_card)

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="gift"></i> <span>Gift Card</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['gift_card_list'])
                                <li><a href="{{route('gift-card.index')}}"><i class="fa fa-angle-double-right"></i>Gift
                                        Card</a>
                                </li>
                            @endif
                            @if($status['sell_gift_card'])
                                <li><a href="{{route('gift-card.sell')}}"><i class="fa fa-angle-double-right"></i>Sell
                                        Gift
                                        Card</a>
                                </li>
                            @endif
                            @if($status['add_gift_card'])

                                <li><a href="{{route('gift-card.create')}}"><i class="fa fa-angle-double-right"></i>Add
                                        Gift
                                        Card</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @php
                    $reservation=1;
                    $Check=0;
                    $total = 2;

                    if(!$status['reservation'])
                    $Check= $Check+1;

                    if(!$status['sell_gift_card'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $reservation=0;
                @endphp
                @if($reservation)

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="book"></i> <span>Reservation</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['reservation'])
                                <li><a href="{{route('restaurant.reservation')}}"><i
                                            class="fa fa-angle-double-right"></i>Reservation</a></li>
                            @endif
                            @if($status['gift_card_list'])
                                <li><a href="{{route('Add-Reservation')}}"><i class="fa fa-angle-double-right"></i>Add
                                        Reservation</a></li>
                            @endif
                                @if($status['gift_card_list'])
                                    <li><a href="{{route('Online-Reservation')}}"><i class="fa fa-angle-double-right"></i>Online
                                            Reservation</a></li>
                                @endif
                        </ul>
                    </li>
                @endif

                @php
                    $report=1;
                    $Check=0;
                    $total = 18;

                    if(!$status['register_report'])
                    $Check= $Check+1;

                    if(!$status['daily_summaery_report'])
                    $Check = $Check+1;

                    if(!$status['food_sale_report'])
                    $Check = $Check+1;

                    if(!$status['daily_sale_report'])
                    $Check = $Check+1;

                    if(!$status['detailed_sale_report'])
                    $Check = $Check+1;

                    if(!$status['consumption_report'])
                    $Check = $Check+1;

                    if(!$status['inventory_report'])
                    $Check = $Check+1;

                    if(!$status['low_inventory_report'])
                    $Check = $Check+1;

                    if(!$status['profit_loss_report'])
                    $Check = $Check+1;

                    if(!$status['kitchen_performance_report'])
                    $Check = $Check+1;

                    if(!$status['attendance_report'])
                    $Check = $Check+1;

                    if(!$status['supplier_ledher'])
                    $Check = $Check+1;

                    if(!$status['supplier_due_report'])
                    $Check = $Check+1;

                    if(!$status['customer_due_report'])
                    $Check = $Check+1;

                    if(!$status['customer_ledger'])
                    $Check = $Check+1;

                    if(!$status['prchase_report'])
                    $Check = $Check+1;

                    if(!$status['expense_report'])
                    $Check = $Check+1;

                    if(!$status['waste_report'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $report=0;
                @endphp

                @if($report)

                    <li class="treeview">
                        <a href="">
                            <i data-feather="grid"></i> <span>Report</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['register_report'])
                                <li><a href="{{route('Register-Report')}}"><i class="fa fa-angle-double-right"></i>Register Report</a></li>
                            @endif
                            @if($status['daily_summaery_report'])
                                <li><a href="{{route('Daily-Summary-Report')}}"><i class="fa fa-angle-double-right"></i>Daily Summary Report</a></li>
                            @endif
                            @if($status['food_sale_report'])
                                <li><a href="{{route('Food-Sale-Report')}}"><i class="fa fa-angle-double-right"></i>Food Sale Report</a></li>
                            @endif
                            @if($status['daily_sale_report'])
                                <li><a href="{{route('Daily-Sale-Report')}}"><i class="fa fa-angle-double-right"></i>Daily Sale Report</a></li>
                            @endif
                            @if($status['detailed_sale_report'])
                                <li><a href="{{route('Detailed-Sale-Report')}}"><i class="fa fa-angle-double-right"></i>Detailed Sale Report</a></li>
                            @endif
                            @if($status['consumption_report'])
                                <li><a href="{{route('Consumption-Report')}}"><i class="fa fa-angle-double-right"></i>Consumption Report</a></li>
                            @endif
                            @if($status['inventory_report'])
                                <li><a href="{{route('Inventory-Report')}}"><i class="fa fa-angle-double-right"></i>Inventory Report</a></li>
                            @endif
                            @if($status['low_inventory_report'])
                                <li><a href="{{route('Low-Inventory-Report')}}"><i class="fa fa-angle-double-right"></i>Low Inventory Report</a></li>
                            @endif
                            @if($status['profit_loss_report'])
                                <li><a href="{{route('Profit-Loss-Report')}}"><i class="fa fa-angle-double-right"></i>Profit Loss Report</a></li>
                            @endif
                            @if($status['kitchen_performance_report'])
                                <li><a href="{{route('Kitchen-Performance-Report')}}"><i class="fa fa-angle-double-right"></i>Kitchen Performance Report</a>
                                </li>
                            @endif
                            @if($status['attendance_report'])
                                <li><a href="{{route('Attendance-Report')}}"><i class="fa fa-angle-double-right"></i>Attendance Report</a></li>
                            @endif
                            @if($status['supplier_ledher'])
                                <li><a href="{{route('Supplier-Ledger')}}"><i class="fa fa-angle-double-right"></i>Supplier Ledger</a></li>
                            @endif
                            @if($status['supplier_due_report'])
                                <li><a href="{{route('Supplier-Due-Report')}}"><i class="fa fa-angle-double-right"></i>Supplier Due Report</a></li>
                            @endif
                            @if($status['customer_due_report'])
                                <li><a href="{{route('Customer-Due-Report')}}"><i class="fa fa-angle-double-right"></i>Customer Due Report</a></li>
                            @endif
                            @if($status['customer_ledger'])
                                <li><a href="{{route('Customer-Ledger')}}"><i class="fa fa-angle-double-right"></i>Customer Ledger</a></li>
                            @endif
                            @if($status['prchase_report'])
                                <li><a href="{{route('Purchase-Report')}}"><i class="fa fa-angle-double-right"></i>Purchase Report</a></li>
                            @endif
                            @if($status['expense_report'])
                                <li><a href="{{route('Expense-Report')}}"><i class="fa fa-angle-double-right"></i>Expense Report</a></li>
                            @endif
                            @if($status['waste_report'])
                                <li><a href="{{route('Waste-Report')}}"><i class="fa fa-angle-double-right"></i>Waste Report</a></li>
                        </ul>
                        @endif
                    </li>
                @endif

                @php
                    $settings=1;
                    $Check=0;
                    $total = 5;

                    if(!$status['restaurant_settings'])
                    $Check= $Check+1;

                   /* if(!$status['company_update'])
                    $Check = $Check+1;*/

                    if(!$status['add_email_template'])
                    $Check = $Check+1;

                    if(!$status['profile_update'])
                    $Check = $Check+1;

                    if(!$status['payment_method'])
                    $Check = $Check+1;

                    if($Check==$total)
                    $settings=0;
                @endphp
                @if($settings)
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="settings"></i> <span>Settings</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                         </span>
                        </a>
                        <ul class="treeview-menu">
                            @if($status['restaurant_settings'])
                                <li><a href="{{route('restaurant.showSettings')}}"><i
                                            class="fa fa-angle-double-right"></i>Restaurant
                                        Settings</a></li>
                            @endif

                            @if($status['payment_method'])
                                <li><a href="{{route('payment-method')}}"><i class="fa fa-angle-double-right"></i>Payment
                                        Method</a>
                                </li>
                            @endif
                            @if($status['add_email_template'])
                                <li><a href="{{route('add_template')}}"><i class="fa fa-angle-double-right"></i>Add
                                        Email
                                        Template</a></li>
                            @endif
                            @if($status['profile_update'])
                                <li><a href="{{route('profile-update')}}"><i class="fa fa-angle-double-right"></i>Profile
                                        Update</a></li>
                            @endif

                                @if($status['profile_update'])
                                    <li><a href="{{route('Payment-Active')}}"><i class="fa fa-angle-double-right"></i>Payment Active</a></li>
                                @endif

                                @if($status['profile_update'])
                                    <li><a href="{{route('Record-Payment')}}"><i class="fa fa-angle-double-right"></i>Record Payment</a></li>
                                @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>

