@extends('layouts.customer.app')

<?php
$baseURL = getBaseURL()
?>
@section('title')
    <title>Ask Me Pos | {{$restaurant->name}} </title>
@endsection
@section('style')
    <link rel="stylesheet" href="{!! $baseURL.'resources/assets/css/jquery.timepicker.min.css'!!}">
    <style>
        canvas,
        img,
        figure {
        display: block;
        }

        .canvas_container {
        max-width: 800px;
        margin: 0 auto;
        }


        canvas {
        margin: 2em auto;
        max-width: 100%;
        outline: 2px solid #444;
        }

        .table-p {
        text-align: center;
        font-size: 14px;
        padding-top: 50px;
        }
    </style>
@endsection
@section('content')
<div class="parallax-mirror" style="visibility: visible; z-index: -100; position: fixed; top: -10px; left: 0px; overflow: hidden; transform: translate3d(0px, 0px, 0px); height: 590px; width: 100%;">
    <img class="parallax-slider" src="{!! $baseURL.'assets/images/b-2.jpg'!!}" style="transform: translate3d(0px, 0px, 0px); position: absolute; top: 8px; left: 0px; height: 548px; width: 100%; max-width: none;">
</div>

<div id="parallax-wrap" class="parallax-container parallax-home parallax-search" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="{!! $baseURL.'assets/images/index_background.png'!!}">
     <!--search-wrapper-->
    <div class="search-wraps center menu-header" style="padding-top:50px">

        @if ($restaurant->logo)
            <img class="logo-medium bottom15" src="{{$baseURL}}/media/restaurant/logos/{{$restaurant->logo->logo}}">
        @else
            <img class="logo-medium bottom15" src="{{$baseURL}}/assets/images/default-image-merchant.png">
        @endif
        {{-- <div class="mytable">

            <div class="mycol">
                <span class="label label-info">Order</span>
            </div>
            <div class="mycol">
                <p class="small">Minimum Order: $10.00</p>
            </div>
            <div class="mycol">
                <a href="#" data-id="{{$restaurant->id}}" title="add to your favorite restaurant" class="add_favorites fav_{{$restaurant->id}}">
                    <i class="ion-android-favorite-outline"></i>
                </a>
            </div>
        </div> <!--mytable--> --}}
        {{-- <a href="#" data-id="{{$restaurant->id}}" title="add to your favorite restaurant" class="add_favorites fav_{{$restaurant->id}}">
            <i class="ion-android-favorite-outline"></i>
        </a>  --}}
        <h1>{{$restaurant->name}}</h1>
        <p><i class="fa fa-map-marker"></i> {{$restaurant->address}},{{$restaurant->city->name}},{{$restaurant->city->state}}</p>
        <p class="small">
            @foreach ($restaurant->cuisines as $key => $restaurantCuisine)
                {{$restaurantCuisine->name}}
                @if ($key+1 < count($restaurant->cuisines))
                    ,
                @endif
            @endforeach
        </p>

        <p class="small">Email: {{$restaurant->email}}</p><!--<a style="color:#fff;" href="tel:1234567890">1234567890</a>-->
    </div>
    <!--/search-wrapper-->
    <!--section-menu-->
    <div class="sections section-menu section-grey2" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-md-8 menu-left-content">
                    <div class="tabs-wrapper" id="menu-tab-wrapper">
                        <ul id="tabs">
                            <li class="active" data-id="menu_tab"> <span>Menu</span> <i class="ion-fork"></i> </li>
                            <li class="" data-id="shift_tab"> <span>Shifts</span> <i class="ion-clock"></i> </li>
                            <li class="" data-id="reservation_tab"> <span>Reservation</span> <i class="ion-coffee"></i> </li>
                            {{-- <li class=""> <span>Opening Hours</span> <i class="ion-clock"></i> </li>
                            <li class="view-merchant-map"> <span>Map</span> <i class="ion-ios-navigate-outline"></i> </li>
                            <li class=""> <span>Information</span> <i class="ion-ios-information-outline"></i> </li>  --}}
                        </ul>

                        <ul id="tab" style="transform: none;">
                            <!--MENU-->
                            <li class="active" id="menu_left_content" style="" >
                                <div class="row" style="transform: none;">
                                    <div class="col-md-4 col-xs-4  category-list" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; top: 8px; left: 113.5px;">




{{-- <a class="btn btn-primary" data-toggle="collapse" href="#Vagitable" role="button" aria-expanded="false" aria-controls="collapseExample">
    Vagitable
</a> <br>

<div class="collapse" id="Vagitable">
    <div class="card card-body">
        Meet
    </div>
    <div class="card card-body">
        New Test
    </div>
</div>
 --}}
{{-- <a class="btn btn-primary" data-toggle="collapse" href="#vasitable" role="button" aria-expanded="false" aria-controls="collapseExample">
    vasitable
</a> <br>

<div class="collapse" id="vasitable">
    <div class="card card-body">
        vasitable
    </div>
    <div class="card card-body">
        TOFU/MUSHROOMS
    </div>
</div>
 --}}



<!------------------->




<!----------------------------------------------------->
                                {{-- @foreach($sub_category as $key)
<ul>


    <a href="#cat-{{$key->id}}" class="category-child relative goto-category" data-id="cat-{{$key->id}}" style="text-decoration: none;"> {{$key->name}}<i class="ion-ios-arrow-right"></i> </a>

    @php

    $under_sub_category = DB::table('tbl_under_sub_catagory')->where('sub_catagory_id', $key->id)->get();
     @endphp

@if(isset($under_sub_category))
<ul>
     @foreach($under_sub_category as $key2)
     <li>{{$key2->catagory_name}}</li>

        @php
$food_menu_categories = DB::table('tbl_restaurant_food_menu_categories')->where('id', $key2->sub_catagory_id)->first();
       @endphp

        <li>{{$food_menu_categories->name}}</li>

     @endforeach
       </ul>
@endif

  </ul>

@endforeach --}}
                                <!----------------------------------------------------->

<div class="category">
@foreach($sub_category as $key)
<a href="javascript:void(0);" class="category-child relative goto-category" data-toggle="collapse" data-target="#Vagitable{{$key->id}}">{{$key->name}}
@php
$under_sub_category = DB::table('tbl_under_sub_catagory')->where('catagory_id', $key->id)->get();
@endphp
@if(count($under_sub_category)>0)
<span style="float: right;">
@php echo '('.count($under_sub_category).')'; @endphp
 <i class="ion-ios-arrow-down"></i>
</span>
 @endif
</a>
<div class="collapse" id="Vagitable{{$key->id}}">


 @if(isset($under_sub_category))
     @foreach($under_sub_category as $key2)

      @php
$food_menu_categories = DB::table('tbl_restaurant_food_menu_categories')->where('id', $key->id)->where('del_status','=','Live')->first();

       @endphp

       @foreach ($restaurant->categories as $restaurantCategory)
       @if($key2->sub_catagory_id ==  $restaurantCategory->id)
                    <a href="#cat-{{$restaurantCategory->id}}" class="category-child relative goto-category" data-id="cat-{{$restaurantCategory->id}}" style="color: green; padding-left: 25px;"> {{$restaurantCategory->name}} <span>({{count($restaurantCategory->foodMenus)}})</span> <i class="ion-ios-arrow-right"></i> </a>
       @endif
                @endforeach

      {{--  <a href="#cat-{{$key->id}}" class="category-child relative goto-category" style="color: green">{{$food_menu_categories->name}}</a> --}}

       @endforeach
       @endif
</div>
@endforeach


                {{-- @foreach ($restaurant->categories as $restaurantCategory)
                    <a href="#cat-{{$restaurantCategory->id}}" class="category-child relative goto-category" data-id="cat-{{$restaurantCategory->id}}"> {{$restaurantCategory->name}} <span>({{count($restaurantCategory->foodMenus)}})</span> <i class="ion-ios-arrow-right"></i> </a>
                @endforeach --}}

                                            </div>
                                        </div>
                                    </div> <!--col-->


                                    <div class="col-md-8 col-xs-8 " id="menu-list-wrapper">
                                        @foreach ($restaurant->categories as $restaurantCategoryForMenu)
                                            @if (count($restaurantCategoryForMenu->foodMenus) > 0)
                                            <section id="cat-{{$restaurantCategoryForMenu->id}}">
                                                <div class="menu-1 box-grey rounded" style="margin-top:0;">
                                                    <div class="menu-cat cat-{{$restaurantCategoryForMenu->id}}">
                                                        <a href="#">
                                                            <span class="bold">
                                                                <i class="ion-ios-arrow-thin-right"></i>
                                                                {{$restaurantCategoryForMenu->name}}
                                                            </span> <b></b>
                                                        </a>
                                                        <p class="small">
                                                            {{$restaurantCategoryForMenu->description}}
                                                        </p>

                                                        @foreach ($restaurantCategoryForMenu->foodMenus as $restaurantFoodMenu)
                                                            <div class="items-row ">
                                                            {{-- <p class="small"> {{$restaurantFoodMenu->description}} </p>  --}}
                                                                <div class="row even">
                                                                    <div class="col-md-7 col-xs-7 "> {{$restaurantFoodMenu->name}}  <!--<p>Amazing striking favors</p>--> </div>
                                                                    <div class="col-md-3 col-xs-3 food-price-wrap ">
                                                                        T &nbsp;&nbsp;${{$restaurantFoodMenu->take_away_price}} <br>
                                                                        DI ${{$restaurantFoodMenu->dine_in_price}}<br>

                                                                        DL ${{$restaurantFoodMenu->delivery_order_price}}
                                                                    </div>
                                                                    <div class="col-md-1 col-xs-1 relative food-price-wrap ">
                                                                        <a href="#" class="dsktop menu-item" rel="344" data-food_menu_id="{{$restaurantFoodMenu->id}}" data-name="{{$restaurantFoodMenu->name}}" data-category_id="{{$restaurantCategoryForMenu->id}}">
                                                                            <i class="fa fa-plus-circle fa-2x theme-color bold"></i>
                                                                        </a>
                                                                        <a href="#" class="mbile menu-item" rel="344" data-food_menu_id="{{$restaurantFoodMenu->id}}" data-category_id="{{$restaurantCategoryForMenu->id}}">
                                                                            <i class="fa fa-plus-circle theme-color bold"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div> <!--menu-cat-->
                                                </div> <!--menu-1-->
                                            </section>
                                            @endif
                                        @endforeach
                                        {{-- <div class="menu-1 box-grey rounded" style="margin-top:0;">
                                            <div class="menu-cat cat-1058 ">
                                                <a href="javascript:;"> <span class="bold"> <i class="ion-ios-arrow-thin-right"></i> Signature Burgers </span> <b></b> </a>
                                                <div class="items-row ">
                                                    <p class="small"> Extremely Mouth Watering Deluxe Burger </p>
                                                    <div class="row even">
                                                        <div class="col-md-7 col-xs-7 "> French Triple Mustard Cheeseburger <!--<p>Amazing striking favors</p>--> </div>
                                                        <div class="col-md-3 col-xs-3 food-price-wrap "> small $8.00 </div>
                                                        <div class="col-md-1 col-xs-1 relative food-price-wrap ">
                                                            <a href="javascript:;" class="dsktop menu-item " rel="344" data-single="1" data-category_id="1058"> <i class="ion-ios-plus-outline green-color bold"></i> </a>
                                                            <a href="javascript:;" class="mbile menu-item " rel="344" data-single="1" data-category_id="1058"> <i class="ion-ios-plus-outline green-color bold"></i> </a>
                                                        </div>
                                                    </div> <!--row-->
                                                </div>
                                            </div> <!--menu-cat-->
                                        </div> <!--menu-1-->  --}}
                                    </div> <!--col-->
                                </div> <!--row-->
                            </li>
                            <!--END MENU-->
                            <!--SHIFT-->
                            <li class="" id="shift_left_content" style="display:none;" >
                                <div class="row" style="transform: none;">
                                    <div class="col-md-4 col-xs-4  category-list" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                                        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; top: 8px; left: 113.5px;">
                                            <div class="category shift">
                                                {{-- <a href="javascript:;" class="category-child relative goto-category" data-id="cat-1058"> Signature Burgers <span>(1)</span> <i class="ion-ios-arrow-right"></i> </a> --}}
                                                @foreach ($restaurant->shifts as $restaurantShift)
                                                    <a href="#shift-{{$restaurantShift->id}}" class="category-child relative goto-category shift-child" data-id="shift-{{$restaurantShift->id}}"> {{$restaurantShift->name}} <span>({{count($restaurantShift->foodMenus)}})</span> <i class="ion-ios-arrow-right"></i> </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div> <!--col-->
                                    <div class="col-md-8 col-xs-8 " id="menu-list-wrapper">
                                        @foreach ($restaurant->shifts as $restaurantShiftForMenu)
                                            @if (count($restaurantShiftForMenu->foodMenus) > 0)
                                            <section id="shift-{{$restaurantShiftForMenu->id}}">
                                                <div class="menu-1 box-grey rounded" style="margin-top:0;">
                                                    <div class="menu-cat cat-{{$restaurantShiftForMenu->id}}">
                                                        <a href="#">
                                                            <span class="bold">
                                                                <i class="ion-ios-arrow-thin-right"></i>
                                                                {{$restaurantShiftForMenu->name}}
                                                            </span> <b></b>
                                                        </a>

                                                        @foreach ($restaurantShiftForMenu->foodMenus as $restaurantFoodMenu)
                                                            <div class="items-row ">
                                                            {{-- <p class="small"> {{$restaurantFoodMenu->description}} </p>  --}}
                                                                <div class="row even">
                                                                    <div class="col-md-7 col-xs-7 "> {{$restaurantFoodMenu->name}}  <!--<p>Amazing striking favors</p>--> </div>
                                                                    <div class="col-md-3 col-xs-3 food-price-wrap ">
                                                                        T &nbsp;&nbsp;${{$restaurantFoodMenu->take_away_price}} <br>
                                                                        DI ${{$restaurantFoodMenu->dine_in_price}} <br>
                                                                        DL ${{$restaurantFoodMenu->delivery_order_price}}
                                                                    </div>
                                                                    <div class="col-md-1 col-xs-1 relative food-price-wrap ">
                                                                        <a href="#" class="dsktop menu-item" rel="344" data-food_menu_id="{{$restaurantFoodMenu->id}}" data-category_id="{{$restaurantCategoryForMenu->id}}">
                                                                            <i class="fa fa-plus-circle fa-2x theme-color bold"></i>
                                                                        </a>
                                                                        <a href="#" class="mbile menu-item" rel="344" data-food_menu_id="{{$restaurantFoodMenu->id}}" data-category_id="{{$restaurantCategoryForMenu->id}}">
                                                                            <i class="fa fa-plus-circle theme-color bold"></i>
                                                                        </a>
                                                                    </div>
                                                                </div> <!--row-->
                                                            </div>
                                                        @endforeach

                                                    </div> <!--menu-cat-->
                                                </div> <!--menu-1-->
                                            </section>
                                            @endif
                                        @endforeach
                                    </div> <!--col-->
                                </div> <!--row-->
                            </li>
                            <!--END SHIFT-->

                            <!-- Reservation -->
                            <li class="" id="reservation_left_content" style="display:none;" >
                                <div class="box-grey rounded" style="margin-top:0;">
                                    <div class="section-label">
                                        <a class="section-label-a">
                                            <span class="bold" style="background:#fff;"> Floor and Table Information</span>
                                            <b></b>
                                        </a>
                                    </div>
                                    <div class="row top10">
                                        <div class="col-md-3"> Floor Plans</div>
                                        <div class="col-md-3">
                                            <select class="grey-fields select2" name="select_floor" id="select_floor">
                                                <option value="">Select floor</option>
                                                @foreach ($restaurant->floors as $floor)
                                                    <option value="{{$floor->id}}">{{$floor->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> <!--row-->
                                    {{-- for showing floor and table --}}
                                    <div class="row top10">
                                        <div class="col-md-12">
                                            <div id="canvas_container" class="canvas_container">
                                                <canvas id="floor_design" width="800" height="400" >
                                                    <p>This is fallback content for users of assistive technologies or of browsers that don't have full support for the Canvas API.</p>
                                                </canvas>
                                            </div>
                                        </div>

                                    </div> <!--row-->

                                    <form class="forms has-validation-callback" id="frm-book" action="{{route('table.reservation')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$restaurant->id}}" name="restaurant_id" id="restaurant_id-id">
                                        <div class="section-label">
                                            <a class="section-label-a">
                                                <span class="bold" style="background:#fff;"> Booking Information</span>
                                                <b></b>
                                            </a>
                                        </div>
                                        {{-- <div class="row top10">
                                            <div class="col-md-3 "> Select tables </div>
                                            <div class="col-md-3">
                                                <select class="grey-fields select2" name="selected_tables[]" id="selected_tables" multiple="multiple" required="required">
                                                    @foreach ($restaurant->floors as $floor)
                                                        <optgroup label="{{$floor->name}}">
                                                            @foreach ($floor->floorTables->where('del_status', 'Live') as $table)
                                                                <option value="{{$table->id}}">{{$table->name}}(seat: {{$table->guest_count}})</option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>  --}}

                                        <div class="row top10">
                                            <div class="col-md-3 "> Number of people </div>
                                            <div class="col-md-3 ">
                                                <input class="grey-inputs" required="required" type="number" min="1" value="" name="number_of_people">
                                            </div>
                                        </div> <!--row-->
                                        <div class="row top10">
                                            <div class="col-md-3 ">Start Date Of Booking </div>
                                            <div class="col-md-3 ">
                                                <input class="datepicker grey-inputs" required="required" data-id="booking_datee" type="text" value="" name="booking_date" id="booking_datee">
                                            </div>
                                        </div>
                                        <div class="row top10">
                                            <div class="col-md-3 ">Start Time Of Booking </div>
                                            <div class="col-md-3 ">
                                                <input class="grey-inputs" required="required" data-id="booking_time" type="text" value="" name="booking_time" id="booking_time" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="row top10">
                                            <div class="col-md-3 ">End Date Of Booking </div>
                                            <div class="col-md-3 ">
                                                <input class="datepicker grey-inputs" required="required" data-id="booking_date" type="text" value="" name="end_booking_date" id="booking_date">
                                            </div>
                                        </div><!--row-->
                                        <div class="row top10">
                                            <div class="col-md-3 ">End Time Of Booking </div>
                                            <div class="col-md-3 ">
                                                <input class="grey-inputs" required="required" data-id="end_booking_time" type="text" value="" name="end_booking_time" id="end_booking_time" autocomplete="off">
                                            </div>
                                        </div>
                                        <!--row-->
                                        <div class="row top10">
                                            <div class="col-md-3 "> Comment </div>
                                            <div class="col-md-3 ">
                                                <textarea name="comment" id="comment" cols="50" rows="5"></textarea>
                                            </div>
                                        </div> <!--row-->
                                        <div class="section-label">
                                            <a class="section-label-a">
                                                <span class="bold" style="background:#fff;"></span>
                                                <b></b>
                                            </a>
                                        </div>

                                        <div class="row top10">
                                            <div class="col-md-10">
                                                <input type="checkbox" name="restaurant_subscription" id="restaurant_subscription" value="1">
                                                <label for="restaurant_subscription">Sign me up to receive dining offers and news from this restaurant by email.</label>
                                                <br>

                                                @if (Auth::guard('customer')->check())
                                                    <input type="submit" value="Book Table" class="rounded book-table-button green-button inline">
                                                @else
                                                    <button type="button" class="btn theme-button medium checkout" data-toggle="modal" data-target="#loginModal">
                                                        Book Table
                                                    </button>
                                                @endif
                                            </div>
                                        </div><!-- row-->
                                    </form>
                                </div> <!--end box-->
                            </li> <!-- END Reservation -->


                            {{-- <!--OPENING HOURS-->
                            <li class="" >
                                <div class="box-grey rounded merchant-opening-hours" style="margin-top:0;">
                                    <div class="section-label bottom20">
                                        <a class="section-label-a"> <span class="bold" style="background:#fff;"> Opening Hours</span> <b></b> </a>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-3 "><i class="green-color ion-ios-plus-empty"></i> saturday</div>
                                        <div class="col-md-6 col-xs-6 ">11:00 - 12:00&nbsp;&nbsp; / 13:00 - 22:00</div>
                                        <div class="col-md-3 col-xs-3"></div>
                                    </div>
                                </div> <!--box-grey-->
                            </li> <!--END OPENING HOURS-->
                            <!--MERCHANT MAP-->
                            <li class="" >
                                <div class="box-grey rounded" style="margin-top:0;">

                                </div> <!--box-grey-->
                                <div class="direction_output" id="direction_output" style="display: none;"></div>
                            </li> <!--END MERCHANT MAP-->
                            <!--INFORMATION-->
                            <li class="">
                                <div class="box-grey rounded " style="margin-top:0;"> </div>
                            </li> <!--END INFORMATION-->  --}}
                        </ul>
                    </div>
                </div>
                <div id="menu-right-content" class="col-md-4  menu-right-content " style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                        <!--DELIVERY INFO-->
                        <div class="box-grey rounded relative">
                            <form action="{{route('customer.checkout')}}" method="post">
                                @csrf
                                <div class="star-float"></div>
                                <div class="inner center">
                                    <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <p class="bold">Delivery Information</p>
                                    {{-- <p> Distance: 8.6 miles </p>
                                    <p class="delivery-fee-wrap"> Delivery Est: 30 minutes</p>
                                    <p class="delivery-fee-wrap"> Delivery Distance Covered: 10 miles </p>
                                    <p class="delivery-fee-wrap"> Delivery Fee: $5.00 </p>  --}}
                                    @if($customer)
                                    @foreach ($customer->addresses->where('del_status','Live') as $key => $address)

                                        <input type="radio" class="address_id" data-address_id="{{$address->id}}" id="address-{{$address->id}}" name="address_id" value="{{$address->id}}" @if($address->default_address) checked @endif>
                                        <label for="address-{{$address->id}}">Address {{$key+1}}</label>

                                    @endforeach
                                    @else
                                    <a class="nav-link" href="{{route('customer.showSignUpForm')}}">To Delivered Your Location Please Log In</a>
                                    @endif

                                    {{--<a href="javascript:;" class="top10 green-color change-address block text-center"> [Change Your Address here] </a>--}}

                                </div>
                                <!--END DELIVERY INFO-->
                                <!--DELIVERY OPTIONS-->

                                <div class="inner line-top relative delivery-option center">
                                    <i class="order-icon delivery-option-icon"></i>
                                    <p class="bold">Delivery Options</p>

                                    <select class="grey-fields" name="order_type" id="delivery_option">
                                        <option value="3" @if ($delivery_option == 'delivery') selected @endif>Delivery</option>
                                        <option value="2" @if ($delivery_option == 'dine_in') selected @endif>Dine-In</option>
                                        <option value="4" @if ($delivery_option == 'take_away') selected @endif>Take Away</option>
                                    </select>
                                    <input type="text" name="delivery_date" id="delivery_date" autocomplete="off" class="grey-fields datepicker" placeholder="delivery_date" value="{{old('delivery_date')}}">

                                    <div class="delivery_asap_wrap">
                                        <input type="text" name="delivery_time" id="delivery_time" class="grey-fields" placeholder="delivery_time" value="{{old('delivery_time')}}">
                                        <input type="checkbox" name="delivery_asap" id="asap" value="1" checked >
                                        <label for="asap">Delivery ASAP?</label>
                                    </div><!-- delivery_asap_wrap-->
                                    {{-- <a href="javascript:;" class="theme-button medium checkout" style="pointer-events: none;">Checkout</a> --}}
                                </div> <!--inner-->
                                <!--END DELIVERY OPTIONS-->
                                <!--CART-->
                                <div class="inner line-top relative">
                                    <i class="order-icon your-order-icon"></i> <p class="bold center">Your Order</p>
                                    <span id="restaurant" data-restaurant_id="{{$restaurant->id}}"></span>
                                    <div class="item-order-wrap">

                                        @php
                                            $sub_total = 0;
                                            $vat_tax = 0;
                                            $total = 0;
                                            //dd($cart_menus0);
                                        @endphp
                                        @if ($carts)
                                                @foreach ($carts as $key => $cart)
                                                    @php
                                                        $item_total = 0;
                                                        $item_unit_price = 0;
                                                        $modifiers = '';

                                                        $food_menu = App\RestaurantFoodMenu::with(['modifiers'=> function ($query){
                                                                                            $query->wherePivot('del_status', 'Live');
                                                                                        }])
                                                                                        ->where('id', $cart['food_menu_id'])
                                                                                        ->where('del_status', 'Live')
                                                                                        ->select('id', 'name', 'take_away_price', 'delivery_order_price')
                                                                                        ->first();

                                                        if ($delivery_option == 'delivery') {

                                                            $item_unit_price = $food_menu->delivery_order_price;

                                                        }else if($delivery_option == 'pickup') {

                                                            $item_unit_price = $food_menu->take_away_price;

                                                        } else {

                                                            $item_unit_price = $food_menu->delivery_order_price;

                                                        }

                                                        $item_total = $item_total + ($item_unit_price * $cart['qty']);
                                                        //dd($food_menu);
                                                    @endphp
                                                    <div class="item-order-list item-row">
                                                        <div class="a" id="item_qty" data-qty="{{$cart['qty']}}">{{$cart['qty']}}</div>
                                                        <div class="b">{{$food_menu->name}}
                                                            <p class="uk-text-small d-inline">
                                                                <span class="base-price d-inline">${{$item_unit_price}}</span>
                                                            </p><br>
                                                            <span class="small">
                                                                @foreach ($food_menu->modifiers as $key => $food_menu_modifier)
                                                                    @if ($cart['modifiers'])
                                                                        @foreach ($cart['modifiers'] as $key => $cart_modifier)
                                                                            @if ($cart_modifier == $food_menu_modifier->id)

                                                                                +{{$food_menu_modifier->name}} <br>
                                                                                @php
                                                                                    if ($modifiers == '') {
                                                                                        $modifiers .= $food_menu_modifier->id;
                                                                                    } else {
                                                                                        $modifiers = $modifiers.','.$food_menu_modifier->id;
                                                                                    }

                                                                                    $item_total = $item_total + ($food_menu_modifier->price * $cart['qty']);

                                                                                @endphp
                                                                            @endif
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach

                                                            </span>
                                                        </div>
                                                        <div class="manage">
                                                            <div class="c">
                                                                <a href="#" class="edit_item" data-food_menu_id="{{$food_menu->id}}" data-modifiers="{{$modifiers}}">
                                                                    <i class="ion-compose"></i>
                                                                </a>
                                                                <a href="#" class="delete_item" id="delete_item" data-food_menu_id="{{$food_menu->id}}">
                                                                    <i class="ion-trash-a"></i>
                                                                </a>
                                                            </div>
                                                            <div class="d">${{$item_total}}</div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    @php
                                                        $sub_total = $sub_total + $item_total;
                                                    @endphp
                                               @endforeach

                                            {{-- @foreach ($cart_menus as $key => $item)
                                                @php
                                                    dd($cart_menus[$key+1]);
                                                    $item_total = 0;
                                                    $item_total = $item->delivery_order_price;
                                                @endphp
                                                <div class="item-order-list item-row">
                                                    <div class="a">{{$item->qty}}</div>
                                                    <div class="b">{{$item->name}}
                                                        <p class="uk-text-small d-inline">
                                                            <span class="base-price d-inline">${{$item->delivery_order_price}}</span>
                                                        </p><br>
                                                        <span class="small">
                                                            @if ($item->selected_modifiers)
                                                                @foreach ($item->selected_modifiers as $key => $selected_modifier)
                                                                    @php
                                                                        $item_total = $item_total + $selected_modifier->price;
                                                                        $sub_total = $sub_total + $item_total;
                                                                    @endphp
                                                                    +{{$selected_modifier->name}} <br>
                                                                @endforeach
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="manage">
                                                        <div class="c">
                                                            <a href="javascript:;" class="edit_item" data-row="0" rel="1">
                                                                <i class="ion-compose"></i>
                                                            </a>
                                                            <a href="javascript:;" class="delete_item" data-row="0" rel="1">
                                                                <i class="ion-trash-a"></i>
                                                            </a>
                                                        </div>
                                                        <div class="d">${{$item_total}}</div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                            @endforeach --}}

                                            <div class="summary-wrap">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 text-right ">Sub Total</div>
                                                    <div class="col-md-6 col-xs-6 text-right cart_subtotal">${{$sub_total}}</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 text-right ">Delivery Fee</div>
                                                    <div class="col-md-6 col-xs-6 text-right ">$0.00</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 text-right ">Tax</div>
                                                    <div class="col-md-6 col-xs-6 text-right ">${{$vat_tax}}</div>
                                                </div>
                                                <div class="row cart_total_wrap bold">
                                                    @php
                                                        $total = $total + $sub_total + $vat_tax;
                                                    @endphp
                                                    <div class="col-md-6 col-xs-6  text-right">Total</div>
                                                    <div class="col-md-6 col-xs-6  text-right cart_total">${{$total}}</div>
                                                </div>
                                                {{-- <input type="hidden" value="1" name="subtotal_order" id="subtotal_order">
                                                <input type="hidden" value="1" name="subtotal_order2" id="subtotal_order2">
                                                <input type="hidden" value="2.15" name="subtotal_extra_charge" id="subtotal_extra_charge"> --}}
                                                <input type="hidden" value="{{$restaurant->id}}" name="restaurant_id">
                                            </div>
                                            {{-- @php
                                                dd($modifiers);
                                            @endphp --}}
                                        @else
                                            <div class="center">No Item added yet!</div>

                                        @endif
                                    </div> <!--VOUCHER STARTS HERE--> <!--VOUCHER STARTS HERE--> <!--MAX AND MIN ORDR-->
                                    <a href="javascript:;" class="clear-cart" style="display: none;">[Clear Order]</a>
                                </div> <!--inner-->
                                <!--END CART-->

                                <div class="inner line-top relative delivery-option center">
                                    {{-- <a type="submit" class="btn theme-button medium checkout">Checkout</a> --}}
                                    @if ($carts)
                                        @if (Auth::guard('customer')->check())
                                            <button type="submit" class="btn theme-button medium checkout">Checkout</button>

                                        @else
                                            <button type="button" class="btn theme-button medium checkout" data-toggle="modal" data-target="#loginModal">
                                                Checkout
                                            </button>
                                        @endif
                                    @else
                                        <button type="submit" class="btn theme-button medium checkout" disabled>Checkout</button>
                                    @endif

                                </div>
                            </form>

                        </div> <!-- box-grey-->
                    </div> <!--end theiaStickySidebar-->
                </div>

            </div>
        </div>
    </div>
    <!--/section-menu-->
</div>

<!--Food menu Modal for add to cart -->
<div class="modal fade" id="foodMenuModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="foodMenuLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="foodMenuLabel">Menu Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="add_food_menu_to_cart" method="POST" action="#">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <img id="food_menu_image" class="logo-medium bottom15" src="{{$baseURL}}/assets/images/image_thumb.png">
                    </div>
                    <div class="col-md-9 col sm 12">
                        <h5 id="food_menu_name">Popover in a modal</h5>
                        <p class="small" id="food_menu_description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, expedita ipsa.
                            Temporibus iusto ullam nobis mollitia eum atque laborum quia voluptatum facilis architecto beatae, ipsa totam ea. Officiis, enim a.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">

                        <h5>Price:</h5>
                        <p class="small">Take Away: $<span id="take_away_price">{{$restaurantFoodMenu->take_away_price}}</span></p>
                        <p class="small">Dine In: $<span id="take_away_price">{{$restaurantFoodMenu->dine_in_price}}</span></p>
                        <p class="small">Delivery: $<span id="delivery_price">{{$restaurantFoodMenu->delivery_order_price}}</span></p>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-sm-6" >
                        <h5>Quantity:</h5>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                <i class="fa fa-minus"></i>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" id="food_menu_qty" class="form-control input-number text-center" value="1" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h5>Modifiers:</h5>
                        <div id="food_menu_modifiers">
                            <a href="#" class="btn btn-light modifier unselected">
                                <span class="small">$60</span><br>
                                <span class="small">food menu modifier</span>
                            </a>
                            <a href="#" class="btn btn-light modifier unselected">
                                <span class="small">$60</span><br>
                                <span class="small">food menu modifier</span>
                            </a>
                            <a href="#" class="btn btn-light modifier unselected">
                                <span class="small">$60</span><br>
                                <span class="small">food menu modifier</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="" id="food_menu_id" value="" hidden>
                    <input type="text" name="" id="food_menu_restaurant_id" value="{{$restaurant->id}}" hidden>
                </div>
                <button type="submit" class="btn theme-button">Add To Cart</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div> --}}
      </div>
    </div>
</div>

<!--Food menu Modal for edit to cart -->
<div class="modal fade" id="editFoodMenuModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="editFoodMenuLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editFoodMenuLabel">Menu Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="edit_food_menu_to_cart" method="POST" action="#">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <img id="e_food_menu_image" class="logo-medium bottom15" src="{{$baseURL}}/assets/images/image_thumb.png">
                    </div>
                    <div class="col-md-9 col sm 12">
                        <h5 id="e_food_menu_name">Popover in a modal</h5>
                        <p class="small" id="e_food_menu_description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, expedita ipsa.
                            Temporibus iusto ullam nobis mollitia eum atque laborum quia voluptatum facilis architecto beatae, ipsa totam ea. Officiis, enim a.
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h5>Price:</h5>
                        <p class="small">Take Away: $<span id="e_take_away_price">150</span></p>
                        <p class="small">Delivery: $<span id="e_delivery_price">100</span></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4 col-sm-6" >
                        <h5>Quantity:</h5>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                <i class="fa fa-minus"></i>
                                </button>
                            </span>
                            <input type="text" name="quant[2]" id="e_food_menu_qty" class="form-control input-number text-center" value="1" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h5>Modifiers:</h5>
                        <div id="e_food_menu_modifiers">
                            <a href="#" class="btn btn-light modifier unselected">
                                <span class="small">$60</span><br>
                                <span class="small">food menu modifier</span>
                            </a>
                            <a href="#" class="btn btn-light modifier unselected">
                                <span class="small">$60</span><br>
                                <span class="small">food menu modifier</span>
                            </a>
                            <a href="#" class="btn btn-light modifier unselected">
                                <span class="small">$60</span><br>
                                <span class="small">food menu modifier</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="" id="e_food_menu_id" value="" hidden>
                    <input type="text" name="" id="e_food_menu_restaurant_id" value="{{$restaurant->id}}" hidden>
                </div>
                <button type="submit" class="btn theme-button">Edit Cart</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div> --}}
      </div>
    </div>
</div>



<!--Login Modal Modal -->
<div class="modal fade" id="loginModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginLabel">Log in to your account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="loginByAjaxForm" class="forms" method="POST" action="{{ route('customer.doLoginByAjax') }}">
                @csrf
                <div class="row top10">
                    <div class="col-md-12">
                        <input class="grey-fields" placeholder="Mobile number or email" required="required" type="text" value="" name="email_phone" id="email_phone" style="width: 100%">
                    </div>
                </div>
                <!--row-->
                <div class="row top10">
                    <div class="col-md-12">
                        <input class="grey-fields" placeholder="Password" required="required" type="password" value="" name="password" id="password" style="width: 100%">
                    </div>
                </div>
                <!--row-->
                <div class="row top15">
                    <div class="col-md-6">
                        <a href="#" class="forgot-pass-link2 block orange-text text-center"> Forgot Password <i class="ion-help"></i>
                        </a> <br>
                        <a href="{{route('customer.showSignUpForm')}}" class="forgot-pass-link2 block orange-text text-center"> Create Account <i class="ion-help"></i>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <input type="submit" value="Login" class="theme-button medium full-width">
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>


@endsection

@section('script')

    <script src="{!! $baseURL.'resources/assets/js/jquery.timepicker.min.js'!!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/theia-sticky-sidebar.min.js"></script>
    <script src="{!! $baseURL.'assets/plugins/jcanvas/dist/jcanvas.js'!!}"></script>

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




            $(".datepicker").datepicker().datepicker("setDate", new Date());

            $('#delivery_time').timepicker({
                //timeFormat: 'HH:mm:ss',
                timeFormat: 'h:mm p',
                interval: 15,
                defaultTime: 'now',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

            $('#booking_time').timepicker({
                //timeFormat: 'HH:mm:ss',
                timeFormat: 'h:mm p',
                interval: 60,
                defaultTime: null,
                dynamic: false,
                dropdown: true,
                //scrollbar: true
            });

            $('#end_booking_time').timepicker({
                //timeFormat: 'HH:mm:ss',
                timeFormat: 'h:mm p',
                interval: 60,
                defaultTime: null,
                dynamic: false,
                dropdown: true,
                //scrollbar: true
            });


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
