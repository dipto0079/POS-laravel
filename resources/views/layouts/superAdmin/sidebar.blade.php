<?php
$baseURL = getBaseURL();
?>

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
                    <a href="{{route('superAdmin.dashboard')}}">
                        <i data-feather="home"></i> <span>Home</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.other_list')}}">
                        <i data-feather="list"></i> <span>Other List</span></a>
                </li>
                <li>
                    <a href="{{route('superAdmin.All-Service')}}">
                        <i data-feather="server"></i> <span>All Service</span></a>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i data-feather="activity"></i> <span>Restaurant</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="{{route('superAdmin.active-restaurant')}}"><i class="fa fa-angle-double-right"></i>Active Restaurant</a></li>
                        <li><a href="{{route('supr-restaurant-list')}}"><i class="fa fa-angle-double-right"></i>Restaurant List</a></li>
                        <li><a href="{{route('superAdmin.add-new-restaurant')}}"><i class="fa fa-angle-double-right"></i>Add Restaurant</a></li>
                        <li><a href="{{route('superAdmin.restaurant-report')}}"><i class="fa fa-angle-double-right"></i>Restaurant Report</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="{{route('superAdmin.settings')}}">
                        <i data-feather="settings"></i> <span>Settings</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-angle-double-right"></i>Google Map API setting</a></li>
                        <li><a href="{{route('Payment-Restaurant')}}"><i class="fa fa-angle-double-right"></i>Payment Gateway Setting</a></li>
                        <li><a href="{{route('countries.index')}}"><i class="fa fa-angle-double-right"></i>Countries</a>
                        </li>
                        <li><a href="{{route('Email-Settings')}}"><i class="fa fa-angle-double-right"></i>Email Settings</a></li>
                        <li><a href="{{route('SMS-Settings')}}"><i class="fa fa-angle-double-right"></i>SMS Settings</a></li>
                        <li><a href="{{route('states.index')}}"><i class="fa fa-angle-double-right"></i>States</a></li>
                        <li><a href="{{route('cities.index')}}"><i class="fa fa-angle-double-right"></i>Cities</a></li>
                        <li><a href="{{route('cuisines.index')}}"><i class="fa fa-angle-double-right"></i>Cuisines</a>
                        </li>
                        <li><a href="{{route('privacyPolicies.show')}}"><i class="fa fa-angle-double-right"></i>Privacy
                                Policy</a></li>
                        <li><a href="{{route('social-media.index')}}"><i class="fa fa-angle-double-right"></i>Social
                                Media</a></li>
                        <li><a href="{{route('third-party-vendors.index')}}"><i class="fa fa-angle-double-right"></i>3rd
                                Parties Venders</a></li>
                        <li><a href="{{route('charges.index')}}"><i class="fa fa-angle-double-right"></i>Fee Charges</a>
                        </li>
                    </ul>
                </li>
               {{-- <li>
                    <a href="{{route('superAdmin.restaurantList')}}">
                        <i data-feather="align-center"></i> <span>Restaurant List</span></a>
                </li>--}}

                <li class="treeview">
                    <a href="">
                        <i data-feather="sliders"></i> <span>Report</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Register Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Daily Summaery Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Food Sale Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Daily Sale Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Detailed Sale Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Consumption Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Inventory Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Low Inventory Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Profit Loss Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Kitchen Performance Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Attendance Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Supplier Ledger</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Supplier Due Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Customer Due Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Customer Ledger</a></li>
                        <li><a href="{{route('charges.index')}}"><i class="fa fa-angle-double-right"></i>Purchase Report</a>
                        </li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Expense Report</a></li>
                        <li><a href=""><i class="fa fa-angle-double-right"></i>Waste Report</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
