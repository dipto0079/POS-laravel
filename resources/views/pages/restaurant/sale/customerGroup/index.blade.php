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
                            <h3>Customer Groups</h3>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary"
                                   href="{{route('customer-groups.create')}}">Add Customer Group
                                </a>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center" >SN</th>
                                    <th class="title text-center" >Name</th>
                                    <th class="title text-center" >Default Discount Percentage</th>
                                    <th class="title text-center" >Description</th>
                                    {{--<th class="title text-center" >Added By</th>--}}
                                    <th class="title text-center" >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($customerGroups) > 0)
                                    @foreach($customerGroups as $k=>$v)
                                        <tr>
                                            <th scope="row" class="text-center">{{$k + 1}}</th>
                                            <td class="text-center">{{$v->name}}</td>
                                            <td class="text-center">{{$v->discount_percentage}}</td>
                                            <td class="text-center">{{$v->description}}</td>
                                            {{--<td class="text-center">{{$v->creatorInfo->manager_name}}</td>--}}
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
                                                           href="{{route('customer-groups.edit', [$v->id])}}">Edit</a>
                                                        |
                                                        <a class="dropdown-item delete-customer-groups"
                                                           role="button" data-id="{{$v->id}}">Delete</a>
                                                        |
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('customer-groups.show', [$v->id])}}">Show</a>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/customerGroup.js'!!}"></script>
@endsection
