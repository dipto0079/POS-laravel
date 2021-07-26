@extends('layouts.customer.app')

<?php
$baseURL = getBaseURL()
?>
@section('title')
    <title>Ask Me Pos | Find A Restaurant </title>
@endsection

@section('content')
<div class="parallax-mirror" style="visibility: visible; z-index: -100; position: fixed; top: -10px; left: 0px; overflow: hidden; transform: translate3d(0px, 0px, 0px); height: 590px; width: 100%;">
    <img class="parallax-slider" src="{!! $baseURL.'assets/images/b-2.jpg'!!}" style="transform: translate3d(0px, 0px, 0px); position: absolute; top: 8px; left: 0px; height: 548px; width: 100%; max-width: none;">
</div>

<div id="parallax-wrap" class="parallax-container parallax-home parallax-search" data-parallax="scroll" data-position="top" data-bleed="10" data-image-src="{!! $baseURL.'assets/images/index_background.png'!!}">
     <!--search-wrapper-->
     <div class="search-wraps advance-search" style="padding-top:50px;"> 
        <h1 class="home-search-text">Profile</h1> 
        <p class="home-search-subtext">Manage your profile,address book, credit card and more</p> 

    </div> <!--search-wrapper-->
    <!--/search-wrapper-->
    <!--section-menu-->
    <div class="sections section-menu section-grey2" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="row" style="transform: none;">
                <div class="col-md-8 menu-left-content">
                    <div class="tabs-wrapper" id="menu-tab-wrapper">
                        <ul id="tabs"> 
                            <li class="active" data-id="profile_tab"> <span>Profile</span> <i class="fa fa-user"></i> </li> 
                            <li class="" data-id="address_tab"> <span>Address Book</span> <i class="fa fa-location-arrow"></i> </li>
                            <li class="" data-id="order_history_tab"> <span>Order History</span> <i class="fa fa-book"></i></li>

                            {{-- <li class=""> <span>Opening Hours</span> <i class="ion-clock"></i> </li>  
                            <li class="view-merchant-map"> <span>Map</span> <i class="ion-ios-navigate-outline"></i> </li> 
                            <li class=""> <span>Book a Table</span> <i class="ion-coffee"></i> </li> 
                            <li class=""> <span>Information</span> <i class="ion-ios-information-outline"></i> </li>  --}}
                        </ul>

                        <ul id="tab" style="transform: none;">
                            <!--MENU--> 
                            <li class="active" id="profile_left_content" style="" > 
                                <div class="row" style="transform: none;"> 
                                    <div class="col-md-12 col-xs-12" id="menu-list-wrapper">
                                        <div class="menu-1 box-grey rounded" style="margin-top:0;"> 
                                            <form id="form-signup" class="form-signup" method="POST" action="{{route('customer.updateProfile')}}">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="name">Name</label>
                                                        <input type="text" id="name" class="form-control" placeholder="Name" name="name" value="{{$customer->name}}">
                                                    </div>
                                                    {{-- <div class="col">
                                                        <label for="formGroupExampleInput">Example label</label>
                                                        <input type="text" id="formGroupExampleInput" class="form-control" placeholder="Last name">
                                                    </div> --}}
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="email">Email</label>
                                                        <input type="text" id="email" class="form-control" placeholder="Email" name="email" value="{{$customer->email}}" readonly>
                                                    </div>
                                                    <div class="col">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" id="phone" class="form-control" placeholder="Phone" name="phone" value="{{$customer->phone}}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <label for="password">Password</label>
                                                        <input type="text" id="password" class="form-control" name="password" placeholder="Password">
                                                        @if ($errors->has('password'))
                                                            <div class="alert alert-danger" style="margin:5px 0px 0px 0px !important;">
                                                                <p>
                                                                <p>{{ $errors->first('password') }}</p></p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col">
                                                        <label for="password_confirmation">Confirm password</label>
                                                        <input type="text" id="password_confirmation" class="form-control"  name="password_confirmation" placeholder="Confirm password">
                                                        @if ($errors->has('password_confirmation'))
                                                            <div class="alert alert-danger" style="margin:5px 0px 0px 0px !important;">
                                                                <p>
                                                                <p>{{ $errors->first('password_confirmation') }}</p></p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </form>
                                        </div> <!--menu-1--> 
                                    </div> <!--col-->
                                </div> <!--row--> 
                            </li> 
                            <!--END MENU--> 
                            <!--SHIFT--> 
                            <li class="" id="address_left_content" style="display:none;" > 
                                <div class="row" style="transform: none;"> 
                                    <div class="col-md-12 col-xs-12 " id="menu-list-wrapper">
                                        <div class="menu-1 box-grey rounded" style="margin-top:0;"> 
                                            <button type="button" class="btn theme-button mb-3" data-toggle="modal" data-target="#newAddressModal">Add New</button>
                                            <div class="menu-cat"> 
                                                @foreach ($customer->addresses->where('del_status','Live') as $key => $address)
                                                    <div id="address_box_{{$address->id}}" class="items-row box-grey @if($address->default_address) top-line-theme @endif"> 
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="small"> 
                                                                    Address {{$key+1}} 
                                                                </p> 
                                                            </div>
                                                            <div class="col-md-6 text-right">
                                                                <a class="d-inline edit-address" href="#" data-address_id="{{$address->id}}">
                                                                    <i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i>
                                                                </a>
                                                                <a class="d-inline delete-address" href="#" data-address_id="{{$address->id}}">
                                                                    <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                                                </a>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row"> 
                                                            <div class="col-md-3 col-xs-6"> 
                                                                Address: 
                                                            </div>
                                                            <div class="col-md-9 col-xs-6"> 
                                                                {{$address->address}}
                                                            </div> 
                                                        </div> <!--row--> 
                                                        <div class="row"> 
                                                            <div class="col-md-3 col-xs-6"> 
                                                                Apt: 
                                                            </div>
                                                            <div class="col-md-9 col-xs-6"> 
                                                                {{$address->apt}}
                                                            </div>  
                                                        </div> <!--row-->
                                                        <div class="row"> 
                                                            <div class="col-md-3 col-xs-6"> 
                                                                Zip Code: 
                                                            </div>
                                                            <div class="col-md-9 col-xs-6"> 
                                                                {{$address->zip}}
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
                                                        <div class="row">
                                                            <div class="col-md-3 col-xs-6"> 
                                                                Note:
                                                            </div>  
                                                            <div class="col-md-9 col-xs-6"> 
                                                                {{$address->note}}
                                                            </div> 
                                                        </div> <!--row-->
                                                    </div> <!--row--> 
                                                    {{-- <hr> --}}
                                                @endforeach
                                            </div> <!--menu-cat-->
                                        </div> <!--menu-1--> 
                                    </div> <!--col-->
                                </div> <!--row--> 
                            </li> 
                            <!--END SHIFT--> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 avatar-section"> 
                    <div class="box-grey rounded"> <!--DELIVERY INFO--> 
                        
                        <div class="avatar-wrap"> 
                            @if ($customer->profile_picture)
                                <img src="{!! $baseURL.'media/customer/profile/'.$customer->profile_picture !!}" class="img-circle"> 
                            @else
                                <img src="{!! $baseURL.'assets/images/avatar.jpg'!!}" class="img-circle"> 
                            @endif
                        </div>
                        <div class="center top10"> 
                            <form method="POST" action="{{route('customer.profilePicture')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" required>
                                    @if ($errors->has('profile_picture'))
                                        <div class="alert alert-danger" style="padding: 5px !important; margin:5px 0px 0px 0px !important;">
                                            <p>
                                            <p>{{ $errors->first('profile_picture') }}</p></p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btn_profile_picture" class="btn btn-primary hide">Save</button>
                                </div>
                            </form>
                            {{-- <a href="#" id="single_uploadfile" data-progress="single_uploadfile_progress" data-preview="avatar-wrap" style="cursor: pointer;"> Browse </a>  --}}
                        </div>
                        <!--CART--> 
                        <div class="inner line-top relative"> 
                            <div class="center">Update your profile picture</div>
                            
                        </div> <!--inner--> <!--END CART--> 
                        
                    </div> <!-- box-grey--> 
                </div>

            </div>
        </div>
    </div>
    <!--/section-menu-->

</div>

<!--new Address book  Modal -->
<div class="modal fade" id="newAddressModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="newAddressLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newAddressLabel">New Address</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{route('customer.storeAddress')}}">
                @csrf
                <div class="form-group">
                    <label for="address" class="col-form-label">Address:</label>
                    <textarea name="address" class="form-control" placeholder="Address" id="address" required></textarea>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <label class="col-form-label">Apt.</label>
                        <input tabindex="1" type="text" name="apt" class="form-control" placeholder="Apt." value="{{old('apt')}}">
                    </div>
                    <div class="col">
                        <label for="zip" class="col-form-label">Zip:</label>
                        <input tabindex="1" type="text" name="zip" class="form-control" placeholder="Zip" value="" required>                
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <select tabindex="1" class="form-control select2" name="country"
                                style="width: 100%;" id="country" required>
                            <option value="">Select a Country</option>
                            @if(count($countries) > 0)
                                @foreach($countries as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col">
                        <select tabindex="1" class="form-control select2" name="state"
                                style="width: 100%;" id="state" required>
                            <option value="">Select a State</option>
                        </select>
                    </div>
                    <div class="col">
                        <select tabindex="1" class="form-control select2" name="city" id="city"
                                style="width: 100%;" required>
                            <option value="">Select a City</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea name="note" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="default_address" name="default_address" value="1" checked>
                    <label class="form-check-label" for="default_address">Set as default</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div> --}}
      </div>
    </div>
</div>

<!--updateAddress book  Modal -->
<div class="modal fade" id="updateAddressModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateAddressLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newAddressLabel">Update Address</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="address_update_form" method="POST" action="{{route('customer.updateAddress')}}">
                @csrf
                <div class="form-group">
                    <label for="address" class="col-form-label">Address:</label>
                    <textarea name="address" class="form-control" placeholder="Address" id="update_address" required></textarea>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <label class="col-form-label">Apt.</label>
                        <input tabindex="1" type="text" name="apt" id="update_apt" class="form-control" placeholder="Apt." value="">
                    </div>
                    <div class="col">
                        <label for="zip" class="col-form-label">Zip:</label>
                        <input tabindex="1" type="text" name="zip" id="update_zip" class="form-control" placeholder="Zip" value="" required>                
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col">
                        <select tabindex="1" class="form-control select2" name="country"
                                style="width: 100%;" id="update_country" required>
                            <option value="">Select a Country</option>
                            @if(count($countries) > 0)
                                @foreach($countries as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col">
                        <select tabindex="1" class="form-control select2" name="state"
                                style="width: 100%;" id="update_state" required>
                            <option value="">Select a State</option>
                            @if(count($states) > 0)
                                @foreach($states as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col">
                        <select tabindex="1" class="form-control select2" name="city" id="update_city"
                                style="width: 100%;" required>
                            <option value="">Select a City</option>
                            @if(count($cities) > 0)
                                @foreach($cities as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea name="note" class="form-control" rows="3" id="note"></textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="update_default_address" name="default_address" value="1" checked="checked">
                    <label class="form-check-label" for="default_address">Set as default</label>
                </div>
                <input type="hidden" id="address_id" name="address_id" value="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div> --}}
      </div>
    </div>
</div>


@endsection

@section('script')
    {{-- <script src="https://cdn.jsdelivr.net/npm/theia-sticky-sidebar@1.7.0/dist/theia-sticky-sidebar.min.js"></script> --}}
    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/signUp.js'!!}"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/customer/customerProfile.js'!!}"></script>
    <script>
        $(document).ready(function () {
            "use strict";
            var baseURL = getBaseURL();

            $('#update_default_address').change(function (e) { 
                e.preventDefault();
                var prop=false;
                if($(this).val() == 1) {
                    prop=true; 
                    $('#update_default_address').prop('checked',prop);
                    $(this).val(0);
                }else if($(this).val() == 0) {
                    prop=false; 
                    $('#update_default_address').prop('checked',prop);
                    $(this).val(1);
                }
                //alert($(this).val());
               
                
            });

            $('.edit-address').click(function (e) { 
                e.preventDefault();
                var address_id = $(this).data('address_id');
                //alert(address_id);
                
                //$('#foodMenuModal').modal('show');
                //$('#foodMenuModal').modal('hide');
                $.ajax({
                    type: "GET",
                    url: baseURL +'/customer/get-address-details-by-ajax',
                    data: {
                        address_id : address_id
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        var customer_address = response.customer_address;
                        
                        $('#updateAddressModal #update_address').html(customer_address.address);
                        $('#updateAddressModal #update_apt').val(customer_address.apt);
                        $('#updateAddressModal #update_zip').val(customer_address.zip);
                        $("#updateAddressModal #update_country").val(customer_address.country_id).trigger("change");
                        $("#updateAddressModal #update_state").val(customer_address.state_id).trigger("change");
                        $("#updateAddressModal #update_city").val(customer_address.city_id).trigger("change");
                        $('#updateAddressModal #update_note').html(customer_address.note);
                        $('#updateAddressModal #address_id').val(customer_address.id);
                        //$('#default_address').trigger(customer_address.default_address); 

                        // if(customer_address.default_address == 1) {
                        //     alert(customer_address.default_address);
                        // }else{
                        //     //alert(customer_address.default_address);
                           
                        // }
                        
                        $('#updateAddressModal').modal('toggle');

                    }
                });
                
            });
            $('#address_update_form').submit(function (e) { 
                e.preventDefault();
                
                var address = $('#updateAddressModal #update_address').html();
                var apt = $('#updateAddressModal #update_apt').val();
                var zip = $('#updateAddressModal #update_zip').val();
                var country = $("#updateAddressModal #update_country").val();
                var state = $("#updateAddressModal #update_state").val();
                var city = $("#updateAddressModal #update_city").val();
                var note = $('#updateAddressModal #update_note').html();
                var address_id = $('#updateAddressModal #address_id').val();
                var default_address = $('#updateAddressModal #update_default_address').val();
                
                alert(default_address);
                $.ajax({
                    type: "post",
                    url: baseURL +'/customer/update-address',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        address : address,
                        apt     : apt,
                        zip     : zip,
                        note    : note,
                        address_id : address_id,
                        default_address : default_address,
                        country : country,
                        state : state,
                        city : city
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        $('#updateAddressModal').modal('toggle');
                        
                    }
                });

                
            });

            $('.delete-address').click(function (e) { 
                e.preventDefault();
                var address_id = $(this).data('address_id');
                $.ajax({
                    type: "post",
                    url: baseURL+'/customer/delete-address-by-ajax',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        address_id : address_id
                    },
                    dataType: "json",
                    success: function (response) {

                        
                        if (response.success) {
                            var customer_address = response.customer_address;
                            Swal.fire({
                                icon: 'success',
                                text: response.success,
                            })

                            $('#address_box_'+customer_address.id).remove();


                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.error,
                            })
                        }
                        
                    }
                });
            });

        });

    </script>
@endsection
