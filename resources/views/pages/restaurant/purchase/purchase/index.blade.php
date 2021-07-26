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
                Purchases
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                </div>
                                <div class="col-md-2 form-group">
                                    <select tabindex="1" id="filter_purchase" name="filter_purchase" class="form-control select2" style="width: 100%;">
                                        <option value="date" selected> Filter By Date</option>
                                        <option value="ingredient">Ingredients</option>
                                        <option value="supplier">Supplier</option>
                                    </select>
                                </div>
                                <form id="filter_purchase_form" method="get" action="{{route('purchases.index')}}">
                                    <div class="col-md-2 form-group">
                                        <input class="form-control" type="date" name="filter_by_date" id="filter_by_date" value="">
                                        <select id="filter_by_ingredient" name="filter_by_ingredient" class="form-control select2 hide" style="width: 100%;">
                                            <option value="" selected>Select</option>
                                            @foreach ($ingredients as $ingredient)
                                                <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                            @endforeach
                                        </select>
                                        <select id="filter_by_supplier" name="filter_by_supplier" class="form-control select2 hide" style="width: 100%;">
                                            <option value="" selected>Select</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{$supplier->id}}" @if ($supplier->id == old('supplier_id')) selected @endif>{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" id="filter_purchase_submit" class="btn btn-block btn-primary pull-left">Submit</button>
                                    </div>

                                </form>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-5 text-right">
                                    <ul class="list-inline text-right">

                                        <li>
                                            <a role="button" class="btn btn-primary" href="{{route('purchases.create')}}">Add Purchase</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>


                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    {{-- <th class="title text-center">SN</th> --}}
                                    <th class="title text-center" style="width: 8%">Ref. No</th>
                                    <th class="title text-center" style="width: 8%">Invoice. No</th>
                                    <th class="title text-center">Date</th>
                                    <th class="title text-center">Supplier</th>
                                    <th class="title text-center">Ingredients</th>
                                    <th class="title text-center">G. Total</th>
                                    <th class="title text-center">Due</th>
                                    <th class="title text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                @if(count($purchases) > 0)
                                    @foreach($purchases as $k=>$v)
                                        <tr class="purchase_row">
                                            <td class="text-center">{{$v->reference_no}}</td>
                                            <td class="text-center">{{$v->invoice_no}}</td>
                                            <td class="text-center">{{$v->date}}</td>
                                            <td class="text-center">{{$v->supplierInfo->name}}</td>
                                            <td class="text-center">
                                                @foreach ($v->purchaseIngredients as $purchaseIngredient)
                                                    {{$purchaseIngredient->ingredientInfo->name}} <br>
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{$v->grand_total}}</td>
                                            <td class="text-center">{{$v->due}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-offset="-185,-75">
                                                        <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                            class="caret"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('purchases.edit', [$v->id])}}">Edit</a> |
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('purchases_details', [$v->id])}}">Details</a>|
                                                        <a class="dropdown-item delete-purchase" role="button" data-id="{{$v->id}}">Delete</a>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
@endsection
