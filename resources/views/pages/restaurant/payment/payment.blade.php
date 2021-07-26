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
                Payment Methods
            </h1>
            <a class="btn btn-info" style="float: right" href="{{route('add-method')}}">Add Payment Methods</a>
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
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Methord</th>
                                    <th class="title text-center">Discription</th>
                                    <th class="title text-center">Added By</th>
                                    <th class="title text-center">Action</th>

                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                @foreach($allmethod as $v_method)
                                    <tr class="purchase_row">
                                        <td class="text-center">{{$v_method->id}}</td>
                                        <td class="text-center">{{$v_method->Methord}}</td>
                                        <td class="text-center">{{$v_method->Discription}}</td>
                                        <td class="text-center">{{$v_method->added_by}}</td>
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
                                                       href="Edit-Methord/{{$v_method->id}}">Edit</a> |
                                                    <a class="dropdown-item delete-customer" role="button"
                                                       href="Delete-Methord/{{$v_method->id}}">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
@endsection
