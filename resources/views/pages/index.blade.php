@extends('layouts.customer.app')

<?php
$baseURL = getBaseURL()
?>
@section('title')
    <title>Ask Me Pos | Find A Restaurant </title>
@endsection

@section('content')

    <div class="parallax-mirror" style="visibility: visible; z-index: -100; position: fixed; top: -10px; left: 0px; overflow: hidden; transform: translate3d(0px, 0px, 0px); height: 590px; width: 100%;">
        <img class="parallax-slider" src="{!! $baseURL.'assets/images/index_background.png'!!}" style="transform: translate3d(0px, 0px, 0px); position: absolute; top: 8px; left: 0px; height: 548px; width: 100%; max-width: none;">
    </div>

    <div id="parallax-wrap" class="parallax-container parallax-home" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="{!! $baseURL.'assets/images/index_background.png'!!}">
        <div class="search-wraps advance-search"> 
            <h1 class="home-search-text">Find restaurant by name</h1> 
            <p class="home-search-subtext">Order Delivery Food Online From Local Restaurants</p> 

            <form method="GET" id="forms-search" action="#" style="padding-bottom: 40px;"> 
                <div class="search-input-wraps rounded30"> 
                    <div class="row"> 
                        <div class="col-sm-10 col-xs-10"> 
                            <div class="easy-autocomplete relative">
                                <input placeholder="Restaurant name" required="required"  class="form__input" type="text" value="" name="restaurant-name" id="restaurant-name" autocomplete="off">
                                <div class="easy-autocomplete-container" id="eac-container-restaurant-name">
                                    <ul></ul>
                                </div>
                            </div> 
                        </div> 
                        <div class="col-sm-2 col-xs-2 relative"> 
                            <button type="submit"><i class="fa fa-search"></i></button> 
                        </div> 
                    </div> 
                </div> <!--search-input-wrap--> 
            </form> 
        </div> <!--search-wrapper-->
    </div>
    <!--HOW IT WORKS SECTIONS-->
    <div class="sections section-how-it-works">
        <div class="container"> 
            <h2 class="center">How it works's</h2> 
            <p class="center">Get your favourite food in 4 simple steps</p> 
            <div class="row"> 
                <div class="col-md-3 col-sm-3 center"> 
                    <div class="steps step1-icon"> 
                        <img src="{!! $baseURL.'assets/images/step1.png'!!}"> 
                    </div> <h3>Search</h3> 
                    <p>Find all restaurants available near you</p> 
                </div> 
                <div class="col-md-3 col-sm-3 center"> 
                    <div class="steps step2-icon"> 
                        <img src="{!! $baseURL.'assets/images/step2.png'!!}"> 
                    </div> 
                    <h3>Choose</h3> 
                    <p>Browse hundreds of menus to find the food you like</p> 
                </div> 
                <div class="col-md-3 col-sm-3 center"> 
                    <div class="steps step2-icon"> 
                        <img src="{!! $baseURL.'assets/images/step3.png'!!}"> 
                    </div> 
                    <h3>Pay</h3> 
                    <p>It's quick, secure and easy</p> 
                </div> 
                <div class="col-md-3 col-sm-3 center"> 
                    <div class="steps step2-icon"> 
                        <img src="{!! $baseURL.'assets/images/step4.png'!!}"> 
                    </div> 
                    <h3>Enjoy</h3> 
                    <p>Food is prepared &amp; delivered to your door</p> 
                </div> 
            </div> 
        </div> <!--container-->
    </div>
    <!--END HOW IT WORKS SECTIONS-->

    <!--FEATURED RESTAURANT SECIONS-->
    <div class="sections section-feature-resto">
        <div class="container"> 
            <h2>Featured Restaurants</h2> 
            <div class="row" id="featured_restaurant"> 

                {{-- <div class="col-lg-5 col-md-12 col-sm-12 border-light ">
                    <div class="row">
                        <div class="col-md-3 col-sm-3"> 
                            <a href="#"> 
                                <img class="logo-small" src="{!! $baseURL.'assets/images/default-image-merchant.png'!!}"> 
                            </a> 
                        </div> <!--col--> 
                        <div class="col-md-9 col-sm-9"> 
                            <div class="row"> 
                                
                                <div class="col-sm-3 merchantopentag"> 
                                    <span class="label label-danger">Closed</span> 
                                </div> 
                                <div class="col-sm-2 merchantopentag"> 
                                    <a href="javascript:;" data-id="1319" title="add to your favorite restaurant" class="add_favorites fav_1319">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a> 
                                </div> 
                            </div> 
                            <a href="#"> 
                                <h4 class="concat-text">Victory French Restaurant</h4> 
                            </a> 
                            <p class="concat-text"> American </p> 
                            <p class="concat-text">580 Garvey Ave Monterey Park CA 91755</p> 
                            <ul class="services-type">
                                <li>Delivery <i class="green-color ion-android-checkmark-circle"></i></li>
                                <li>Pickup <i class="green-color ion-android-checkmark-circle"></i></li>
                                <li>Dinein <i class="green-color ion-android-checkmark-circle"></i></li>
                            </ul> 
                        </div> <!--col--> 
                    </div> 
                </div> <!--col-6--> 
                <div class="col-lg-1"></div>

                <div class="col-lg-5 col-md-12 col-sm-12 border-light "> 
                    <div class="row">
                        <div class="col-md-3 col-sm-3"> 
                            <a href="/kmrs/menu-nomi-homecooking"> 
                                <img class="logo-small" src="{!! $baseURL.'assets/images/default-image-merchant.png'!!}"> 
                            </a> 
                        </div> <!--col--> 
                        <div class="col-md-9 col-sm-9"> 
                            <div class="row"> 
                                
                                <div class="col-sm-3 merchantopentag"> <span class="label label-success">Open</span> </div> 
                                <div class="col-sm-2 merchantopentag"> 
                                    <a href="javascript:;" data-id="1096" title="add to your favorite restaurant" class="add_favorites fav_1096">
                                        <i class="ion-android-favorite-outline"></i>
                                    </a> 
                                </div> 
                            </div> 
                            <a href="/kmrs/menu-nomi-homecooking"> 
                                <h4 class="concat-text">Nomi Homecooking</h4> 
                            </a> 
                            <p class="concat-text"> American, Mediterranean </p> 
                            <p class="concat-text">Serimas Condo Cheras Kuala Lumpur 56100</p> 
                            <ul class="services-type">
                                <li>Dinein <i class="green-color ion-android-checkmark-circle"></i></li>
                            </ul> 
                        </div> <!--col--> 
                    </div>
                </div> <!--col-6--> 
                <div class="col-lg-1"></div>  --}}
            </div>
            
        </div><!--Container-->
    </div>
    <!--END FEATURED RESTAURANT SECIONS-->

    <!--CUISINE SECTIONS-->
    <div class="sections section-cuisine" style="background: #ededed;">
        <div class="container nopad">
            <div class="row">
                <div class="col-md-3 nopad">
                    <img src="{!! $baseURL.'assets/images/cuisine.png'!!}" class="img-cuisine">
                </div>
                <div class="col-md-9 nopad"> 
                    <h2>Browse by cuisine</h2> 
                    <p class="sub-text center">choose from your favorite cuisine</p> 
                    <div class="row"> 
                        @foreach ($cuisines as $cuisine)
                            <div class="col-md-4 col-sm-4 indent-5percent nopad"> 
                                <a href="{{route('restaurantByCuisine')}}?cuisine={{$cuisine->id}}" class="even"> {{$cuisine->name}}<span>({{count($cuisine->restaurants)}})</span> </a> 

                            </div> 
                        @endforeach
                        {{-- <div class="col-md-4 col-sm-4 indent-5percent nopad"> 
                            <a href="/kmrs/cuisine?category=2" class="odd"> Deli<span>(17)</span> </a> 
                        </div> 
                        <div class="col-md-4 col-sm-4 indent-5percent nopad"> 
                            <a href="/kmrs/cuisine?category=3" class="even"> Indian<span>(46)</span> </a> 
                        </div>  --}}
                        
                    </div> 
                </div> 
            </div>
        </div> <!--container-->
    </div>
    <!--END CUISINE SECTIONS-->

    <!--Delivery option Modal -->
    <div class="modal fade" id="deliveryOptionModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deliveryOptionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title" id="deliveryOptionLabel">Log in to your account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> --}}
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col text-center">
                        <h5 class="modal-title" id="deliveryOptionLabel">Select Which One Do You Want?</h5>
                    </div>
                    <div class="col text-center">
                        <a href="" class="btn theme-button delivery-option" data-delivery_option="delivery">DELIVERY</a>
                        <a href="" class="btn theme-button delivery-option" data-delivery_option="pickup">PICK UP</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/customer/featuredRestaurant.js'!!}"></script>
    <script>
        $(document).ready(function () {
            "use strict";

            var check_delivery_option = {{$delivery_option}};
            
            // if (check_delivery_option == true) {
            //     $('#deliveryOptionModal').modal('hide');

            // } else {
            //     $('#deliveryOptionModal').modal('toggle');

            // }


            // $('.delivery-option').click(function (e) { 
            //     e.preventDefault();
            //     var delivery_option = $(this).data('delivery_option');
            //     //alert(delivery_option);
            //     var baseURL = getBaseURL();

            //     $.ajax({
            //         type: "post",
            //         url: baseURL+'/set-delivery-option-by-ajax',
            //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //         data: {
            //             delivery_option : delivery_option
            //         },
            //         dataType: "json",
            //         success: function (response) {
            //             //console.log(response);
            //             if (response.success) {
            //                 $('#deliveryOptionModal').modal('hide');
            //                 // alert(response.success);
            //             }
            //         }
            //     });
            // });
        });
    </script>
@endsection
