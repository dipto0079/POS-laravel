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
                Add Expense Category
            </h1>
            @if (session('success'))
                            <div class="alert alert-success">
                            <p style="color: red;"> {{ session('success') }}</p>
                            </div>
            @endif
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="Post" action="{{route('expenses.expenses_add_category')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input  type="text" name="name" class="form-control"
                                                    placeholder="category" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="category_description" class="form-control"
                                                    placeholder="Description">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="del_status" class="form-check-input" value="on" checked>
                                                            Live
                                                    </label>
                                                </div>

                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" id="addSupplier">
                                                    Submit
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">

                                <h3>All Expense Category </h3>


                                    <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                        <a role="button" class="btn btn-primary" href="{{route('food-menu-categories.subcreate')}}">Add Sub Category
                                        </a>
                                    </div>
                                    <table id="datatable" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="title" style="width: 5%">SN</th>
                                                <th class="title" style="width: 20%">Name</th>
                                                <th class="title" style="width: 15%">Delay in Minute</th>
                                                <th class="title" style="width: 25%">Description</th>
                                                <th class="title" style="width: 20%">Added By</th>
                                                <th class="title" style="width: 15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($all_data as $key)
                                                    <tr>
                                                        <td>{{$key->id}}</td>
                                                        <td>{{$key->name}}</td>
                                                        <td>{{$key->description}}</td>
                                                        <td>{{$key->user_id}}</td>
                                                        <td>{{$key->restaurant_id}}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-light btn-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-offset="-185,-75">
                                                                    <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span class="caret"></span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                                    <a class="dropdown-item edit-link" role="button" href="Edit-Expence/{{$key->id}}">Edit</a> |
                                                                    <a class="dropdown-item delete-customer"href="Delete-Expence/{{$key->id}}">Delete</a>

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

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script src="{!! $baseURL.'resources/assets/js/custom/restaurant/foodMenuCategories.js'!!}"></script>

@endsection
