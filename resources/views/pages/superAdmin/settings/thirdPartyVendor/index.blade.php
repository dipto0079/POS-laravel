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
                            <h3>3rd Parties Vendors</h3>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary" href="{{route('third-party-vendors.create')}}">Add
                                    Third Party Vendor
                                </a>
                            </div>
                            <table id="datatable" class="table table-striped ">
                                <thead>
                                <tr>
                                    <th class="title text-center" style="width: 5%">SN</th>
                                    <th class="title text-center">Vendor Name</th>
                                    <th class="title text-center" style="width: 5%">Percentage Charge</th>
                                    <th class="title text-center" style="width: 5%">Collect Taxes</th>
                                    <th class="title text-center">Email</th>
                                    <th class="title text-center">Phone</th>
                                    <th class="title text-center">Country</th>
                                    <th class="title text-center">State</th>
                                    <th class="title text-center">City</th>
                                    <th class="title text-center" style="width: 25%">Address</th>
                                    <th class="title text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($thirdPartyVendors) > 0)
                                    @foreach($thirdPartyVendors as $k=>$v)
                                        <tr>
                                            <td scope="row">{{$k + 1}}</td>
                                            <td class="text-center">{{$v->name}}</td>
                                            <td class="text-center">{{$v->percentage_charge}}</td>
                                            <td class="text-center">{{$v->collect_tax}}</td>
                                            <td class="text-center">{{$v->email}}</td>
                                            <td class="text-center">{{$v->phone}}</td>
                                            <td class="text-center">{{$v->country->name}}</td>
                                            <td class="text-center">{{$v->state->name}}</td>
                                            <td class="text-center">{{$v->city->name}}</td>
                                            <td class="text-center">{{$v->address}}</td>

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
                                                           href="{{route('third-party-vendors.edit', [$v->id])}}">Edit</a> |
                                                        <a class="dropdown-item" role="button"
                                                           href="{{route('third-party-vendors.delete', [$v->id])}}">Delete</a>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/thirdPartyVendors.js'!!}"></script>
@endsection
