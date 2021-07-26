<?php
$baseURL = getBaseURL();
?>

<header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">AMP</span>
        <!-- logo for regular state and mobile devices -->

        <span class="logo-lg">
                        Ask Me POS
            </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li style="padding-top:15px">
                    <p style="padding:0 10px"><b>{{Auth::guard('restaurantUser')->user()->manager_name}}</b></p>
                </li>
                <li class="dropdown user user-menu">
                    <a href="{{route('restaurant.logout')}}">Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
