$(document).ready(function () {
    "use strict";
    var baseURL = getBaseURL();

    //call this function for fetch featuredRestaurant
    featuredRestaurant();

    function featuredRestaurant() {
        $.ajax({
            type: "GET",
            url: baseURL +'/featured-restaurant-by-ajax',
            data: {

            },
            dataType: "json",
            success: function (response) {
                var restaurants = response.restaurants;
                var restaurant = '';
                var featured_restaurants = $('#featured_restaurant');
                //console.log(restaurant);
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
                    //it's for used in before restaurant name
                    // <div class="row"> 
        
                    //     <div class="col-sm-3 merchantopentag"> 
                    //         <span class="label label-danger">Closed</span> 
                    //     </div> 
                    //     <div class="col-sm-2 merchantopentag"> 
                    //         <a href="javascript:;" data-id="1319" title="add to your favorite restaurant" class="add_favorites fav_1319">
                    //             <i class="ion-android-favorite-outline"></i>
                    //         </a> 
                    //     </div> 
                    // </div> 

                    restaurant = `<div class="col-lg-5 col-md-12 col-sm-12 border-light ">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3"> 
                                                <a href="${baseURL}/show-restaurant/${restaurant.slug}"> 
                                                    <img class="logo-small" src="${logo}"> 
                                                </a> 
                                            </div> <!--col--> 
                                            <div class="col-md-9 col-sm-9">
                                                 
                                                <a href="${baseURL}/show-restaurant/${restaurant.slug}"> 
                                                    <h4 class="concat-text">${restaurant.name}</h4> 
                                                </a> 
                                                <p class="concat-text"> ${cuisines} </p> 
                                                <p class="concat-text">${restaurant.address},${restaurant.city.name}</p> 
                                                <ul class="services-type">
                                                    <li>Delivery <i class="green-color ion-android-checkmark-circle"></i></li>
                                                    <li>Pickup <i class="green-color ion-android-checkmark-circle"></i></li>
                                                </ul> 
                                            </div> <!--col--> 
                                        </div> 
                                    </div> <!--col-6--> 
                                    <div class="col-lg-1"></div>`;
                    featured_restaurants.append(restaurant);
                });
            }
        });
    }
});