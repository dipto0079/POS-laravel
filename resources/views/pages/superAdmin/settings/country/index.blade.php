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


                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">

                                <div class="row">

                                    <div class="col-md-2">
                                        <label>Countries</label>
                                        <a role="button" class="btn btn-primary form-control"  href="{{route('countries.create')}}">Add
                                            Country
                                        </a>
                                    </div>

<div class="col-md-2"></div>
                                    <form method="post" id="upload_csv" action="{{route('countries.csv')}}" enctype="multipart/form-data" >
                                        @csrf

                                            <div class="col-md-4">
                                                <label>Import</label>
                                                <input class="form-control" name="filecvs" type="file" accept=".csv" />
                                            </div>
                                            <div class="col-md-2">
                                                <label>Save</label>
                                                <button type="submit" name="submit"  class="btn btn-primary form-control">Import CSV File</button>
                                            </div>
                                        </div>
                                    </form>

                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 50%">Name</th>
                                    <th class="title" style="width: 50%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($countries) > 0)
                                    @foreach($countries as $k=>$v)
                                        <tr>
                                            <th scope="row">{{$k + 1}}</th>
                                            <td>{{$v->name}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false" data-offset="-185,-75">
                                                        <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                            class="caret"></span>
                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left p-5">
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('countries.edit', [$v->id])}}">Edit</a> |
                                                        <a class="dropdown-item" role="button"
                                                           href="{{route('countries.delete', [$v->id])}}">Delete</a>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/countries.js'!!}"></script>
@endsection
