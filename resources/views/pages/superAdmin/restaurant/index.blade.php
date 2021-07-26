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
                            <h3>Restaurant List</h3>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 15%">Name</th>
                                    <th class="title" style="width: 10%">Country</th>
                                    <th class="title" style="width: 15%">State</th>
                                    <th class="title" style="width: 15%">City</th>
                                    <th class="title" style="width: 15%">Manager Name</th>
                                    <th class="title" style="width: 15%">Manager Phone</th>
                                    <th class="title" style="width: 15%">Manager Email</th>
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($restaurants) > 0)
                                    @foreach($restaurants as $k=>$v)
                                        <tr>
                                            <th scope="row">{{$k + 1}}</th>
                                            <td>{{$v->name}}</td>
                                            <td>{{$v->country->name}}</td>
                                            <td>{{$v->state->name}}</td>
                                            <td>{{$v->city->name}}</td>
                                            @foreach($v->restaurantUsers->where('role','Manager') as $restaurantUser)
                                                @if($restaurantUser->restaurant_id === $v->id)
                                                    <td>{{$restaurantUser->manager_name}}</td>
                                                    <td>{{$restaurantUser->manager_phone}}</td>
                                                    <td>{{$restaurantUser->manager_email}}</td>
                                                @endif
                                            @endforeach
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
                                                           href="{{route('superAdmin.restaurantList.viewDetail', [$v->id])}}">View</a>
                                                        |
                                                        @if($v->approval_status === "Approve")
                                                            <a class="dropdown-item edit-link" role="button"
                                                               href="{{route('superAdmin.restaurantList.disapprove', [$v->id])}}">Disapprove</a>
                                                            |
                                                        @else
                                                            <a class="dropdown-item edit-link" role="button"
                                                               href="{{route('superAdmin.restaurantList.approve', [$v->id])}}">Approve</a>
                                                            |
                                                        @endif
                                                        @if($v->featured_status === "Featured")
                                                            <a class="dropdown-item edit-link" role="button"
                                                               href="{{route('superAdmin.restaurantList.nonFeatured', [$v->id])}}">NotFeatured</a>
                                                            |
                                                        @else
                                                            <a class="dropdown-item edit-link" role="button"
                                                               href="{{route('superAdmin.restaurantList.featured', [$v->id])}}">Featured</a>
                                                            |
                                                        @endif
                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('superAdmin.restaurantList.delete', [$v->id])}}">Delete</a>
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
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/restaurantList.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/superAdmin/state.js'!!}"></script>


@endsection
