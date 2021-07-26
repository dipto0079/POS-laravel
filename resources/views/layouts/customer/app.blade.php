<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('og_property')
    {{-- Title --}}
    @yield('title')
    <!-- Bootstrap v4.5.0 -->
    <link rel="stylesheet" href="{!! $baseURL.'resources/assets/css/bootstrap.min.css'!!}">
    <!-- jQuery v3.5.1 -->
    <script src="{!! $baseURL.'resources/assets/js/jquery.js'!!}"></script>
    <!-- Bootstrap v4.5.0 -->
    <script src="{!! $baseURL.'resources/assets/js/bootstrap.min.js'!!}"></script>

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/datepicker/datepicker.css'!!}">

    <!-- bootstrap datepicker -->
    <script src="{!! $baseURL.'assets/bower_components/datepicker/bootstrap-datepicker.js'!!}"></script>
    
    
    <script src="{!! $baseURL.'resources/assets/js/sweetalert2.js'!!}"></script>
    <!-- Select2 -->
    <script src="{!! $baseURL.'assets/bower_components/select2/dist/js/select2.full.min.js'!!}"></script>
    <!-- Select2 -->
    <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/select2/dist/css/select2.min.css'!!}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/font-awesome/css/font-awesome.min.css'!!}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{!! $baseURL.'assets/bower_components/Ionicons/css/ionicons.min.css'!!}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! $baseURL.'assets/images/favicon.ico'!!}" type="image/x-icon">

    <!-- Favicon -->
    <link rel="icon" href="{!! $baseURL.'assets/images/favicon.ico'!!}" type="image/x-icon">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    @yield('style')

    <link rel="stylesheet" href="{!! $baseURL.'resources/assets/css/custom/customer/global.css'!!}">
    

    @toastr_css
</head>
<body>
    @include('layouts.customer.header')
    @yield('content')
    @include('layouts.customer.footer')


    <script src="{!! $baseURL.'resources/assets/js/custom/customer/global.js'!!}"></script>
    @yield('script')
    
</body>
@toastr_js
@toastr_render
</html>