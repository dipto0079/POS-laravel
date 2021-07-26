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

        <h1>Confirm Order</h1>
        <p class="small">choose your payment </p>

    </div>
    <!--/search-wrapper-->
    <!--section-menu-->
    <div class="sections section-menu section-grey2" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-md-6 menu-left-content" >
                    <div class="tabs-wrapper" id="menu-tab-wrapper">
                        <ul id="tabs">
                            <li class="active" data-id="menu_tab"> <span>Address</span> </li>
                        </ul>
                        <ul id="tab" style="transform: none;">
                            <!--MENU-->
                            <li class="active" id="menu_left_content" style="" >
                                <div class="row" style="transform: none;">
                                    <div class="col-md-12 col-xs-12 " id="menu-list-wrapper">
                                        <div class="menu-1 box-grey rounded" style="margin-top:0;">
                                            {{-- <button type="button" class="btn theme-button mb-3" data-toggle="modal" data-target="#newAddressModal">Add New</button> --}}
                                            <div class="menu-cat">
                                                @foreach ($customer->addresses->where('del_status','Live') as $key => $address)
                                                    <div id="address_box_{{$address->id}}" class="items-row box-grey address-box @if($address->default_address) top-line-theme @endif">
                                                        {{-- <div class="custom-control custom-radio">
                                                            <input type="radio" id="address-{{$address->id}}" name="address" class="custom-control-input" @if($address->default_address) checked @endif>
                                                            <label class="custom-control-label" for="address-{{$address->id}}">Address {{$key+1}}</label>
                                                          </div> --}}
                                                          {{-- <p class="small">Address {{$key+1}}</p> --}}
                                                        <div class="row">
                                                            <div class="col-md-3 col-xs-6">
                                                                Address:
                                                            </div>
                                                            <div class="col-md-9 col-xs-6">
                                                                {{$address->address}}
                                                            </div>
                                                        </div> <!--row-->
                                                        <div class="row">
                                                            <div class="col-md-4 col-xs-6">
                                                                Apt: &nbsp;{{$address->apt}}
                                                            </div>
                                                            <div class="col-md-6 col-xs-6">
                                                                Zip Code: {{$address->zip}}
                                                            </div>
                                                        </div> <!--row-->
                                                        <div class="row">
                                                            <div class="col-md-3 col-xs-6">
                                                                Country:
                                                            </div>
                                                            <div class="col-md-9 col-xs-6">
                                                                {{$address->city->name}}, {{$address->state->name}}, {{$address->country->name}}
                                                            </div>
                                                        </div> <!--row-->
                                                        @if ($address->note)
                                                            <div class="row">
                                                                <div class="col-md-3 col-xs-6">
                                                                    Note:
                                                                </div>
                                                                <div class="col-md-9 col-xs-6">
                                                                    {{$address->note}}
                                                                </div>
                                                            </div> <!--row-->
                                                        @endif
                                                    </div> <!--row-->
                                                    {{-- <hr> --}}
                                                @endforeach
                                            </div> <!--menu-cat-->
                                        </div> <!--menu-1-->
                                    </div> <!--col-->
                                </div> <!--row-->
                            </li>
                            <!--END MENU-->

                        </ul>
                    </div>
                </div>
                <div id="menu-right-content" class="col-md-6  menu-right-content " style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <div class="" style="padding-top: 0px; padding-bottom: 1px; position: static;">
                        <!--DELIVERY INFO-->
                        <div class="box-grey rounded relative">
                            <form action="{{route('customer.placedOnlineOrder')}}" method="post">
                                @csrf
                                <div class="star-float"></div>
                                <div class="inner center">
                                    <button type="button" class="close modal-close-btn" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <p class="bold">Delivery Information</p>
                                    @foreach ($customer->addresses->where('del_status','Live') as $key => $address)

                                        <input type="radio" class="address_id" data-address_id="{{$address->id}}" id="address-{{$address->id}}" name="address_id" value="{{$address->id}}" @if($address->default_address) checked @endif>
                                        <label for="address-{{$address->id}}">Address {{$key+1}}</label>

                                    @endforeach
                                </div>
                                <!--END DELIVERY INFO-->
                                <!--DELIVERY OPTIONS-->
                                <div class="inner line-top relative delivery-option center">
                                    <i class="order-icon delivery-option-icon"></i>
                                    <p class="bold">Delivery Options</p>
                                    <select class="grey-fields" name="order_type" id="order_type">
                                        <option value="3" @if ($order_type == 3) selected @else disabled @endif>Delivery</option>
                                        <option value="2" @if ($order_type == 2) selected @else disabled @endif>Dine-In</option>
                                        <option value="4" @if ($order_type == 4) selected @else disabled @endif>Take Away</option>
                                    </select>
                                    <input type="text" name="delivery_date" id="delivery_date" autocomplete="off" class="grey-fields datepicker" placeholder="delivery_date" value="{{$delivery_date}}" readonly>

                                    <div class="delivery_asap_wrap">
                                        <input type="text" name="delivery_time" id="delivery_time" class="grey-fields" placeholder="delivery_time" value="{{$delivery_time}}" readonly>
                                        <input type="checkbox" name="delivery_asap" id="asap" value="1" @if ($delivery_asap == 1) checked @endif >
                                        <label for="asap">Delivery ASAP?</label>
                                    </div><!-- delivery_asap_wrap-->
                                    {{-- <a href="javascript:;" class="theme-button medium checkout" style="pointer-events: none;">Checkout</a> --}}
                                </div> <!--inner-->
                                <!--END DELIVERY OPTIONS-->
                                <!--CART-->
                                <div class="inner line-top relative">
                                    <i class="order-icon your-order-icon"></i> <p class="bold center">Your Order</p>
                                    <span id="restaurant" data-restaurant_id="{{$restaurant_id}}"></span>
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
                                                        <div class="a">{{$cart['qty']}}</div>
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
                                                                {{-- <a href="#" class="edit_item" data-food_menu_id="{{$food_menu->id}}" rel="1">
                                                                    <i class="ion-compose"></i>
                                                                </a>
                                                                <a href="#" class="delete_item" data-food_menu_id="{{$food_menu->id}}" rel="1">
                                                                    <i class="ion-trash-a"></i>
                                                                </a> --}}
                                                            </div>
                                                            <div class="d">${{$item_total}}</div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    @php
                                                        $sub_total = $sub_total + $item_total;
                                                    @endphp
                                               @endforeach


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
                                                <input type="hidden" value="{{$restaurant_id}}" name="restaurant_id">
                                            </div>
                                        @else
                                            <div class="center">No Item added yet!</div>

                                        @endif
                                    </div> <!--VOUCHER STARTS HERE--> <!--VOUCHER STARTS HERE--> <!--MAX AND MIN ORDR-->
                                    <a href="javascript:;" class="clear-cart" style="display: none;">[Clear Order]</a>
                                </div> <!--inner-->
                                <!--END CART-->

                                <div class="inner line-top relative delivery-option center">
                                    <input type="checkbox" name="restaurant_subscription" id="restaurant_subscription" value="1">
                                    <label for="restaurant_subscription">Sign me up to receive dining offers and news from this restaurant by email.</label>
                                    <br>
                                    {{-- <a type="submit" class="btn theme-button medium checkout">Checkout</a> --}}
                                    @if ($carts)
                                        @if (Auth::guard('customer')->check())
                                            <button type="submit" class="btn theme-button medium checkout"> Confirm</button>

                                        @else
                                            <button type="button" class="btn theme-button medium checkout" data-toggle="modal" data-target="#loginModal">
                                                Confirm
                                            </button>
                                        @endif
                                    @else
                                        <button type="submit" class="btn theme-button medium checkout" disabled>Confirm</button>
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
@endsection

@section('script')

    <script src="{!! $baseURL.'resources/assets/js/jquery.timepicker.min.js'!!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/theia-sticky-sidebar.min.js"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/customer/singleRestaurant.js'!!}"></script>
    <script>
        $(document).ready(function () {
            $('.address_id').change(function (e) {
                e.preventDefault();
                var address_id = $(this).data('address_id');
                $('.address-box').removeClass('top-line-theme');
                $("#address_box_"+address_id).addClass('top-line-theme');

            });
        });

    </script>
@endsection
