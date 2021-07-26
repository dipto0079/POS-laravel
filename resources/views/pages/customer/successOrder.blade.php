@extends('layouts.customer.app')

<?php
$baseURL = getBaseURL()
?>
@section('title')
    <title>Ask Me Pos | Find A Restaurant </title>
@endsection
@section('style')
    <link rel="stylesheet" href="{!! $baseURL.'resources/assets/css/jquery.timepicker.min.css'!!}">
@endsection
@section('content')
<div class="parallax-mirror" style="visibility: visible; z-index: -100; position: fixed; top: -10px; left: 0px; overflow: hidden; transform: translate3d(0px, 0px, 0px); height: 590px; width: 100%;">
    <img class="parallax-slider" src="{!! $baseURL.'assets/images/b-2.jpg'!!}" style="transform: translate3d(0px, 0px, 0px); position: absolute; top: 8px; left: 0px; height: 548px; width: 100%; max-width: none;">
</div>

<div id="parallax-wrap" class="parallax-container parallax-home parallax-search" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="{!! $baseURL.'assets/images/index_background.png'!!}">
     <!--search-wrapper-->
    <div class="search-wraps center menu-header" style="padding-top:50px">
        <h1>Success </h1>
        <p class="small">Take your Receipt </p>
    </div>
    <!--/search-wrapper-->
    <!--section-menu-->
    <div class="sections section-menu section-grey2" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-md-12 menu-left-content" >
                    <p class="alert alert-success">
                        Successfully Done
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--/section-menu-->
</div>
@endsection

@section('script')

    <script src="{!! $baseURL.'resources/assets/js/jquery.timepicker.min.js'!!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/theia-sticky-sidebar.min.js"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/customer/singleRestaurant.js'!!}"></script>
    <script>

        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            // $('.datepicker').datepicker('setDate',  new Date());

            // $('.datepicker').datepicker({
            //     // setDate:new Date(),
            //     autoclose: true,
            // })
            // $(".datepicker").datepicker().datepicker("setDate", new Date());



            // $('#delivery_time').timepicker({
            //     timeFormat: 'HH:mm:ss',
            //     interval: 15,
            //     defaultTime: 'now',
            //     dynamic: false,
            //     dropdown: true,
            //     scrollbar: true
            // });
        });

        $('.category-list').theiaStickySidebar();
        $('.category a').on("click",function(e){
            e.preventDefault();
            var id = $(this).attr("href"),
                topSpace = 30;
        //alert(id);
            $('html, body').animate({
            scrollTop: $(id).offset().top - topSpace
            }, 800);
        });
    </script>
@endsection
