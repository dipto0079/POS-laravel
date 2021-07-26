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

                        <h3>Categories </h3> @if (session('success'))
                            <div class="alert alert-success">
                            <p style="color: red;"> {{ session('success') }}</p>
                            </div>
                            @endif


                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary" href="{{route('food-menu-categories.subcreate')}}">Add Category
                                </a>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="title" style="width: 5%">SN</th>
                                        <th class="title" style="width: 20%">Name</th>
                                        <th class="title" style="width: 15%">Delay in Minute</th>
                                        <th class="title" style="width: 25%">Description</th>
                                        <!-- <th class="title" style="width: 20%">Added By</th> -->
                                        <th class="title" style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=0; @endphp
                                    @foreach($show_subcatagori as $key)
                                    @php $i=$i+1; @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$key->name}}</td>
                                        <td>{{$key->delay_time}}</td>
                                        <td>{{$key->description}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light btn-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-offset="-185,-75">
                                                    <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item edit-link" role="button" href="Add-Category/{{$key->id}}">Add Sub Category</a> |
                                                    <a class="dropdown-item edit-link" role="button" href="Edit-Category/{{$key->id}}">Edit</a> |
                                                    <a class="dropdown-item delete-customer" role="button" href="Delete-Sub-Category/{{$key->id}}">Delete</a>

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
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<script src="{!! $baseURL.'resources/assets/js/custom/restaurant/foodMenuCategories.js'!!}"></script>
@endsection
