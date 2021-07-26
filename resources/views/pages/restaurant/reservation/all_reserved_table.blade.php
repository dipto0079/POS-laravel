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
        @if(Session::has('msg'))
            <section class="alert alert-error Erorr Message">
                <h1>
                    {{ Session::get('msg') }}
                </h1>
            </section>

        @endif

        <section class="content-header">
            <h1>
                Reservation All
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
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center">ID</th>

                                    <th class="title text-center">Table Id</th>
                                    <th class="title text-center">Customer Name</th>
                                    <th class="title text-center">Date Start</th>
                                    <th class="title text-center">Date End</th>
                                    <th class="title text-center">Start Time</th>
                                    <th class="title text-center">End Time</th>
                                    <th class="title text-center">Guest Count</th>
                                    <th class="title text-center">TableName</th>
                                    <th class="title text-center">Flore</th>
                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                @foreach($all as $v_all)
                                    <tr class="purchase_row">
                                        <td class="text-center">{{$v_all->id}}</td>

                                        <td class="text-center">{{$v_all->table_id}}</td>
                                        <td class="text-center">{{$v_all->name}}</td>
                                        <td class="text-center">{{$v_all->date_start}}</td>
                                        <td class="text-center">{{$v_all->date_end}}</td>
                                        <td class="text-center">{{$v_all->start_time}}</td>
                                        <td class="text-center">{{$v_all->ebd_time}}</td>
                                        <td class="text-center">{{$v_all->guest_count}}</td>
                                        <td class="text-center">{{$v_all->table_name}}</td>
                                        <td class="text-center">{{$v_all->flore}}</td>
                                    </tr>

                                {{--<td class="text-center">
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
                                </td>--}}

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


    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
@endsection
