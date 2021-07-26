$(document).ready(function () {
    "use strict";
    var baseURL = getBaseURL();
    var limit = 2;
    var start = 0;
    var action = 'inactive';
    //alert(cuisineId);
    $('#restuarant-list-show').html('');

    //call this function for fetch restaurant list
    restaurantList(limit, start, cuisineId);

    function restaurantList(limit, start, cuisineId) {
        //alert('hello');
        $.ajax({
            type: "GET",
            url: baseURL +'/cuisine-restaurant-by-ajax',
            data: {
                limit : limit,
                start : start,
                cuisineId : cuisineId
            },
            dataType: "json",
            success: function (response) {
                //console.log(response);
                //return false;
                var restaurants = response.cuisine.restaurants;
                var restaurant = '';
                var restuarant_list = $('#restuarant-list-show');
                console.log(restaurants);
                
                $.each(restaurants, function (index, restaurant) { 
                    //console.log(restaurant.cuisines);
                    var logo = '';
                    var cuisines = '';

                    if (restaurant.logo == '' || restaurant.logo == null) {
                        logo = baseURL+'/assets/images/default-image-merchant.png';
                    } else {
                        logo = baseURL+'/media/restaurant/logos/'+restaurant.logo.logo;
                    }
                    $.each(restaurant.cuisines, function (index, restaurant_cuisine) { 
                         cuisines +=  restaurant_cuisine.name;
                         if (index+1 < restaurant.cuisines.length) {
                            cuisines += ', ';
                         }
                    });

                    restaurant = `<div class="infinite-item"> 
                                    <div class="inner"> 
                                        <div class="row"> 
                                            <div class="col-md-6 borderx"> 
                                                <div class="row borderx" style="padding: 10px;padding-bottom:0;"> 
                                                    <div class="col-md-3 borderx ">
                                                        <a href="${baseURL}/show-restaurant/${restaurant.slug}"> 
                                                            <img class="logo-small" src="${logo}"> 
                                                        </a> 
                                                        <div class="top10">
                                                            <ul class="services-type">
                                                                <li>Delivery <i class="green-color ion-android-checkmark-circle"></i></li>
                                                                <li>Pickup <i class="green-color ion-android-checkmark-circle"></i></li>
                                                            </ul>
                                                        </div> 
                                                    </div> <!--col--> 
                                                    <div class="col-md-9 borderx"> 
                                                        <div class="mytable">  
                                                            <div class="mycol"> 
                                                                <span class="label label-success">Open</span> 
                                                            </div> 
                                                            <div class="mycol"> 
                                                                <a href="javascript:;" data-id="925" title="add to your favorite restaurant" class="add_favorites fav_925"><i class="ion-android-favorite-outline"></i></a> 
                                                            </div> 
                                                        </div> <!--mytable--> 
                                                        <h2>${restaurant.name}</h2> 
                                                        <p class="merchant-address concat-text">${restaurant.address},${restaurant.city.name}</p> 
                                                        <p class="cuisine bold"> ${cuisines} </p> 
                                                        <ul class="services-type" style="text-align:left;">
                                                            <li style="display: inline-block;">Cash on delivery <i class="green-color ion-android-checkmark-circle"></i></li>
                                                            <li style="display: inline-block;">Credit Card <i class="green-color ion-android-checkmark-circle"></i></li>
                                                        </ul> 
                                                        <p class="top15">&nbsp;</p> 
                                                        <a href="${baseURL}/show-restaurant/${restaurant.slug}" class="sky-button rounded3 medium bottom10 inline-block"> View menu </a> 
                                                    </div> <!--col--> 
                                                </div> <!--row--> 
                                            </div> <!--col--> 
                                            <!--MAP--> 
                                            <div class="col-md-6"> 
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.6569772539447!2d90.35943976836782!3d23.759608673444557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf5ef23875bf%3A0xc2229ca5618b843b!2zMjPCsDQ1JzMxLjMiTiA5MMKwMjEnMzEuOCJF!5e0!3m2!1sen!2sbd!4v1609912804489!5m2!1sen!2sbd" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                            </div> <!--col--> 
                                        </div> <!--row--> 
                                    </div> <!--inner-->
                                </div> <!--infinite-item-->`;
                    restuarant_list.append(restaurant);
                });

                // if(response.restaurants == '')
                // {
                //     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
                //     action = 'active';
                // }
                // else
                // {
                //     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
                //     action = "inactive";
                // }
            }
        });
    }


    // if(action == 'inactive')
    // {
    //     action = 'active';
    //     restaurantList(limit, start, cuisineId);
    // }


    // $(window).scroll(function(){

    //     if($(window).scrollTop() + $(window).height() > $("#restuarant-list-show").height() && action == 'inactive')
    //         {
    //             //alert('hello1');
    //             action = 'active';
    //             start = start + limit;
    //             setTimeout(function(){
    //                 restaurantList(limit, start, cuisineId);
    //             }, 1000); 
                
    //         }
    // });
});