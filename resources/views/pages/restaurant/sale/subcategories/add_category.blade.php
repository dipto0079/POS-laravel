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
            Add Catagory Under {{$cat_name->name}}

            @if (session('success'))
    <div class="alert alert-success">
    <p style="color: red;"> {{ session('success') }}</p>
    </div>
@endif
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- form start -->
                    <form method="post" action="{{route('subcatagory_insert')}}">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category <span class="required_star">*</span></label>
                                        <select name="sub_catagory" class="form-control">
                                            <option value="">Select Catagory</option>
                                            @foreach($categories as $key)
                                            <option value="{{$key->id}}">{{$key->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-1">

                                    <label>Submit</label><br>
                                    <button type="submit" class="btn btn-primary">submit
                                    </button>
                                </div>
                                <div class="col-md-1">
                                    <label>Back</label>
                                    <a href="../subcategory" role="button" class="btn btn-primary">Back
                                    </a>
                                </div>
                                <input type="hidden" name="hidden_catagory_id" value="{{$catagory_id}}">
                                <input type="hidden" name="hidden_catagory_name" value="{{$cat_name->name}}">
                                <div class="col-md-3"></div>

                            </div>
                        </div>
                        <!-- /.box-body -->


                    </form>


                </div>
                <div class="box box-primary">
                    <div class="box-body table-responsive">

                        <table id="datatable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 15%">Category Name</th>
                                    <th class="title" style="width: 20%">Sub Category Name</th>


                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0; @endphp
                                @foreach($show_subcatagori as $key)
                                @php $i=$i+1; @endphp
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$key->cat_name}}</td>
                                    <td>{{$key->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light btn-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-offset="-185,-75">
                                                <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span class="caret"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">


                                                <a class="dropdown-item delete-customer" role="button" href="../Delete-Category/{{$key->id}}">Delete</a>

                                            </div>
                                        </div>
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
