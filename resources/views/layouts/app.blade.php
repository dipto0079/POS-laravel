<!doctype html>
<html lang="en">

<?php
$baseURL = getBaseURL()
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

@if(Request::path() === "SuperAdmin/SALogin" || Request::path() === "restaurant/sign-up" || Request::path() === "restaurant/login")
    <!-- jQuery 3 -->
        <script src="{!! $baseURL.'assets/bower_components/jquery/dist/jquery.min.js'!!}"></script>
        <!-- Select2 -->
        <script src="{!! $baseURL.'assets/bower_components/select2/dist/js/select2.full.min.js'!!}"></script>
        <!-- Select2 -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/select2/dist/css/select2.min.css'!!}">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/bootstrap/dist/css/bootstrap.min.css'!!}">
        <!-- Font Awesome -->
        <link rel="stylesheet"
              href="{!! $baseURL.'assets/bower_components/font-awesome/css/font-awesome.min.css'!!}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/Ionicons/css/ionicons.min.css'!!}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/dist/css/AdminLTE.min.css'!!}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/plugins/iCheck/square/blue.css'!!}">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{!! $baseURL.'assets/images/favicon.ico'!!}" type="image/x-icon">
        <!-- Favicon -->
        <link rel="icon" href="{!! $baseURL.'assets/images/favicon.ico'!!}>" type="image/x-icon">

        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@else
    <!-- Theme style -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/dist/css/AdminLTE.css'!!}">
        <!-- jQuery 3 -->
        <script src="{!! $baseURL.'assets/bower_components/jquery/dist/jquery.min.js'!!}"></script>
        <!-- Select2 -->
        <script src="{!! $baseURL.'assets/bower_components/select2/dist/js/select2.full.min.js'!!}"></script>
        <!-- Select2 -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/select2/dist/css/select2.min.css'!!}">
        <!-- InputMask -->
        <script src="{!! $baseURL.'assets/plugins/input-mask/jquery.inputmask.js'!!}"></script>
        <script src="{!! $baseURL.'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'!!}"></script>
        <script src="{!! $baseURL.'assets/plugins/input-mask/jquery.inputmask.extensions.js'!!}"></script>
        <!-- iCheck -->
        <script src="{!! $baseURL.'assets/plugins/iCheck/icheck.min.js'!!}"></script>
        <link rel="stylesheet" href="{!! $baseURL.'assets/plugins/iCheck/all.css'!!}">

        <!-- remove from below condition || Route::is('purchases.*') -->

    @if(Request::path() === "restaurant/purchase/purchases/create" || Request::is('restaurant/*/*/*/edit') || Request::path() === "restaurant/sale/food-menu-modifiers/create" || Request::path() === "restaurant/sale/food-menu/create" || Request::path() === "restaurant/waste/wastes/create" || Request::path() === "restaurant/stock-adjustment/create" || Request::is('restaurant/*/*/edit'))
            
            <!-- Sweet alert -->
            <script src="{!! $baseURL.'assets/bower_components/sweetalert2/dist/sweetalert.min.js'!!}"></script>
            <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/sweetalert2/dist/sweetalert.min.css'!!}">
    @else
        <!-- Sweet alert 2-->
            <script src="{!! $baseURL.'resources/assets/js/sweetalert2.js'!!}"></script>
            <link rel="stylesheet" href="{!! $baseURL.'assets/POS/sweetalert2/dist/sweetalert.min.css'!!}">
    @endif

    <!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
    {{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>--}}

    <!-- Numpad -->
        <script src="{!! $baseURL.'assets/bower_components/numpad/jquery.numpad.js'!!}"></script>
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/numpad/jquery.numpad.css'!!}">
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/numpad/theme.css'!!}">
        <!--datepicker-->
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/datepicker/datepicker.css'!!}">

        <!-- bootstrap datepicker -->
        <script src="{!! $baseURL.'assets/bower_components/datepicker/bootstrap-datepicker.js'!!}"></script>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/bootstrap/dist/css/bootstrap.min.css'!!}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/font-awesome/css/font-awesome.min.css'!!}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/Ionicons/css/ionicons.min.css'!!}">

        <link rel="stylesheet" href="{!! $baseURL.'assets/dist/css/jquery.mCustomScrollbar.css'!!}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{!! $baseURL.'assets/dist/css/skins/_all-skins.css'!!}">
        <!-- iCheck -->
        <link href="{!! $baseURL.'asset/plugins/iCheck/minimal/color-scheme.css'!!}" rel="stylesheet">
        <!-- Favicon -->
        <link rel="shortcut icon" href="{!! $baseURL.'assets/images/favicon.ico'!!}" type="image/x-icon">
        <!-- Favicon -->
        <link rel="icon" href="{!! $baseURL.'assets/images/favicon.ico'!!}" type="image/x-icon">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    @endif

    <link rel="stylesheet" href="{!! $baseURL.'resources/assets/css/custom/global-style.css'!!}">

    @yield('style')

    <title>{{config('APP_NAME', 'Ask Me POS')}}</title>

    @toastr_css
</head>
<body class="@if( Request::path() === 'SuperAdmin/SALogin' || Request::path() === 'restaurant/sign-up' || Request::path() === 'restaurant/login') loginPage @else hold-transition skin-blue sidebar-mini sidebar-collapse @endif">

@if(Request::path() === "SuperAdmin/SALogin" || Request::path() === "restaurant/sign-up" || Request::path() === "restaurant/login")
    @yield('content')
@else
    @if(Auth::guest())
        @yield('content')
    @else
        <div class="wrapper">
            @if(Auth::guard('superAdmin')->user())
                @include('layouts.superAdmin.header')
                @include('layouts.superAdmin.sidebar')
            @else
                @include('layouts.restaurant.header')
                @include('layouts.restaurant.sidebar')
            @endif

            
            @yield('content')

            @include('layouts.footer')
        </div>
    @endif
@endif

<!-- Bootstrap 3.3.7 -->
<script src="{!! $baseURL.'assets/bower_components/bootstrap/dist/js/bootstrap.min.js'!!}"></script>
<!-- SlimScroll -->
<script src="{!! $baseURL.'assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'!!}"></script>
<!-- FastClick -->
<script src="{!! $baseURL.'assets/bower_components/fastclick/lib/fastclick.js'!!}"></script>
<!-- AdminLTE App -->
<script src="{!! $baseURL.'assets/dist/js/adminlte.min.js'!!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! $baseURL.'assets/dist/js/demo.js'!!}"></script>
<script type="text/javascript" src="{!! $baseURL.'assets/POS/js/jquery.cookie.js'!!}"></script>
<!-- custom scrollbar plugin -->
<script src="{!! $baseURL.'assets/dist/js/jquery.mCustomScrollbar.concat.min.js'!!}"></script>
<!-- material icon -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<script src="{!! $baseURL.'resources/assets/js/custom/app.js'!!}"></script>

@yield('script')
</body>
@toastr_js
@toastr_render
</html>
