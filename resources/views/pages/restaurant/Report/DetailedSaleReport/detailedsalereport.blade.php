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
            <div>
                <h1>
                    Detailed Sale Report
                </h1>
            </div>

            




        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">

                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                <th class="title" style="width: 5%">SN</th>
                                <th class="title" style="width: 10%">Menu Id</th>
                                <th class="title" style="width: 10%">Menu Name</th>
                                <th class="title" style="width: 10%">Qty</th>
                                <th class="title" style="width: 10%">Menu Price Without Discount</th>
                                <th class="title" style="width: 10%">Menu Price With Discount</th>
                                <th class="title" style="width: 10%">Menu Unit Price</th>
                                <th class="title" style="width: 20%">Menu Taxes</th>
                                <th class="title" style="width: 20%">Menu Discount Value</th>
                                <th class="title" style="width: 20%">Discount Type</th>
                                <th class="title" style="width: 20%">Discount Amount</th>
                                <th class="title" style="width: 20%">Cooking Status</th>
                                <th class="title" style="width: 20%">Cooking Start Time</th>
                                <th class="title" style="width: 20%">Cooking Done Time</th>
                                <th class="title" style="width: 20%">Sales Id</th>
                                <th class="title" style="width: 20%">User Id</th>
                                <th class="title" style="width: 20%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $number = 0; ?>
                                @foreach($detailes as $key)
                                    <tr>
                                    <td>{{ $number+1 }}</td>
                                        <?php $number++; ?>
                                        <td>{{$key->food_menu_id}}</td>
                                        <td>{{$key->menu_name}}</td>
                                        <td>{{$key->qty}}</td>
                                        <td>{{$key->menu_price_without_discount}}</td>
                                        <td>{{$key->menu_price_with_discount}}</td>
                                        <td>{{$key->menu_unit_price}}</td>
                                        <td> <table> <thead> <tr> 
        <th class="title" style="width: 2%; color: black">Name</th>
        <th class="title" style="width: 5%; color: black">Percentage</th>
        <th class="title" style="width: 5%; color: black">Per Unit</th>
        <th class="title" style="width: 5%; color: black">All</th>
                                    </tr> </thead> 
                                    <tbody>  
                    @php $key->menu_taxes; $new = json_decode($key->menu_taxes); @endphp
                     @php foreach($new as $menu_t){ @endphp
                                       <tr>
                        <td><?php echo $menu_t->tax_field_name;?></td>
                        <td><?php echo $menu_t->tax_field_percentage;?></td>
                        <td><?php echo $menu_t->item_vat_amount_for_unit_item;?></td>
                        <td><?php echo $menu_t->item_vat_amount_for_all_quantity;?></td>
                                       </tr>
                                        @php } @endphp
                                    </tbody>
                                </table>
                                </td>
                                        <td>{{$key->menu_discount_value}}</td>
                                        <td>{{$key->discount_type}}</td>
                                        <td>{{$key->discount_amount}}</td>
                                        <td>{{$key->cooking_status}}</td>
                                        <td>{{$key->cooking_start_time}}</td>
                                        <td>{{$key->cooking_done_time}}</td>
                                        <td>{{$key->sales_id}}</td>
                                        <td>{{$key->user_id}}</td>
                                        <td>
                                           <a class="btn btn-primary" role="button" href="Modified-details-foodsaleReport/{{$key->id}}">Details</a>
                                        </td>    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!----- eikhane resturent id niye jhamela ace. tbl_restaurant_sales_details ei table r id + tbl_restaurant_sales_details_modifiers sales_detials id mile na -------------------->
@endsection

@section('script')

 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>
@endsection
