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
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <h3>Food Menus</h3>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary"
                                   href="{{route('food-menu.create')}}">Add Food Menu
                                </a>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 5%">Code</th>
                                    <th class="title" style="width: 15%">Name</th>
                                    <th class="title" style="width: 10%">Category</th>
                                    <th class="title" style="width: 10%">Dine In Price</th>
                                    <th class="title" style="width: 10%">Take Away Price</th>
                                    <th class="title" style="width: 10%">Delivery Order Price</th>
                                    <th class="title" style="width: 5%">Total Ingredients</th>                   
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($menu) > 0)
                                    @foreach($menu as $k=>$v)
                                        <tr>
                                            <th scope="row">{{$k + 1}}</th>
                                            <td>{{$v->code}}</td>
                                            <td>{{$v->name}}</td>
                                            <td>{{$v->categoryInfo->name}}</td>
                                            <td>{{$v->dine_in_price}}</td>
                                            <td>{{$v->take_away_price}}</td>
                                            <td>{{$v->delivery_order_price}}</td>
                                            <td>{!! getTotalIngredient($v->id) !!}</td>
                                            
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-offset="-185,-75">
                                                        <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                            class="caret"></span>
                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('food-menu.show', [$v->id])}}">View
                                                            Details</a> |
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('food-menu.edit', [$v->id])}}">Edit</a>
                                                        |
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('food-menu.assign-modifier', [$v->id])}}">Assign Modifier</a> |
                                                        <a class="dropdown-item delete-ingredient-unit"
                                                           role="button" data-id="{{$v->id}}">Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/foodMenu.js'!!}"></script>
@endsection
