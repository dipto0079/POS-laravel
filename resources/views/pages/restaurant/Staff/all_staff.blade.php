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
                All Staff
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
                                    <th class="title text-center">Name</th>
                                    <th class="title text-center">Phone</th>
                                    <th class="title text-center">Email</th>
                                    <th class="title text-center">Role</th>
                                    <th class="title text-center">Staff PIN</th>
                                    <th class="title text-center">Salary</th>
                                    <th class="title text-center">Image</th>
                                    <th class="title text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                @foreach($staff as $v_staff)
                                        <tr class="purchase_row">
                                            <td class="text-center">{{$v_staff->id}}</td>
                                            <td class="text-center">{{$v_staff->manager_name}}</td>
                                            <td class="text-center">{{$v_staff->manager_phone}}</td>
                                            <td class="text-center">{{$v_staff->manager_email}}</td>
                                            <td class="text-center">{{$v_staff->roleName}}</td>
                                            <td class="text-center">{{$v_staff->pin_no}}</td>
                                            <td class="text-center">{{$v_staff->salary}}</td>
                                            <td class="text-center"><img src="{{URL::to($v_staff->image)}}" style="width:100px; height: 100px; border-radius: 50px;"></td>
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
                                                           href="Edit-staff/{{$v_staff->id}}">Edit</a> |
                                                            <a class="dropdown-item delete-customer" role="button" href="Delete-Staff/{{$v_staff->id}}">Delete</a>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
@endsection
