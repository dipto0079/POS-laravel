@extends('layouts.customer.app')

<?php
$baseURL = getBaseURL()
?>
@section('title')
    <title>Ask Me Pos | Restaurant by cuisine </title>
@endsection

@section('content')
<div class="parallax-mirror" style="visibility: visible; z-index: -100; position: fixed; top: -10px; left: 0px; overflow: hidden; transform: translate3d(0px, 0px, 0px); height: 590px; width: 100%;">
    <img class="parallax-slider" src="{!! $baseURL.'assets/images/browse_restaurant_background.png'!!}" style="transform: translate3d(0px, 0px, 0px); position: absolute; top: 8px; left: 0px; height: 548px; width: 100%; max-width: none;">
</div>

<div id="parallax-wrap" class="parallax-container parallax-home" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="{!! $baseURL.'assets/images/index_background.png'!!}">
    <div class="search-wraps advance-search"> 
        <h1 class="home-search-text">Restaurant by cuisine</h1> 
        <p class="home-search-subtext">choose from your favorite restaurant</p> 

    </div> <!--search-wrapper-->
</div>
<!--section-browse-->
<div class="sections section-grey2 section-browse" id="section-browse"> 
    <div class="container"> 
        <div class="tabs-wrapper"> 
            <ul id="tab"> 
                <li class=""> 
                    <div class="result-merchant infinite-container" id="restuarant-list-show">
                    </div>
                    <!--result-merchant-->
                    <div class="search-result-loader"> <i></i></div>
                    <div id="load_data_message"></div>
                    <!--search-result-loader-->
                </li>
            </ul>
        </div><!--End tabs wrapper-->
    </div><!--End container-->
</div><!--End section-browse-->
            
@endsection

@section('script')
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/customer/restaurantByCuisine.js'!!}"></script>
    <script>
        var cuisineId = {{$cuisine->id}};
        
    </script>
@endsection
