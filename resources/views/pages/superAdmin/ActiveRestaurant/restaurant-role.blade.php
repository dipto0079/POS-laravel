@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Restaurant Management
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="row">


                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">
                                {{$ingredients_name}}</span></h4>

                            <a href="#" class="btn btn-success form-control">List Ingredients</a>
                        </div>

                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">{{$restaurant_food_menus}}</span></h4>
                            <a href="#" class="btn btn-success form-control"> List Food</a>
                        </div>
                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">{{$restaurant_sales_details}}</span></h4>
                            <a href="#"  class="btn btn-success form-control">Sale Food</a>
                        </div>
                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">34,152</span></h4>
                            <a href="#" class="btn btn-success form-control">Online Order</a>
                        </div>
                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">{{$restaurant_floor_tables}}</span></h4>
                            <a href="#" class="btn btn-success form-control"> Table Details</a>
                        </div>
                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">34,152</span></h4>
                            <a href="#" class="btn btn-success form-control"> Order List</a>
                        </div>
                    </div>

                    <div class="row" style=" margin-top: 20px;">
                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #e31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">34,152</span></h4>
                            <a href="{{url('/SuperAdmin/Payment-res',$id)}}" class="btn btn-success form-control">Payment Gateway</a>
                        </div>
                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">34,152</span></h4>
                            <a href="#" class="btn btn-success form-control">Role System</a>
                        </div>
                        <div class="col-md-2">
                            <h4 class="mb-1 mt-1 form-conreol" style="border: 2px solid #E31414;padding-top: 10px;padding-bottom: 10px;text-align: center; border-radius: 50px;"><span data-plugin="counterup">$ 34,152</span></h4>
                            <a href="#" class="btn btn-success form-control"> Walet</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
@endsection
