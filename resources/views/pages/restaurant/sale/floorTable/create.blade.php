@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>
@section('style')
    <style>
        canvas,
        img,
        figure {
        display: block;
        }

        .container {
        max-width: 800px;
        margin: 0 auto;
        }

        .controls-wrapper {
        background-color: #222;
        color: white;
        padding: 0.5em;
        font-size: 1.5em;
        position: relative;
        }

        canvas {
        margin: 2em auto;
        max-width: 100%;
        outline: 2px solid #444;
        }

    </style>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1 class="text-capitalize">
                Floor : {{$floor->name}}
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <!-- <canvas id="floor-canvas" width="600" height="300" style="border:1px solid #000000;">
                                                not showing anything
                                            </canvas> -->
                                            <div class="container">
                                                <canvas id="myCanvas" width="800" height="400" data-position="{{$floor->position_array}}" data-floor_tables={{$floorTables}}>
                                                    <p>This is fallback content for users of assistive technologies or of browsers that don't have full support for the Canvas API.</p>
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <!-- form start -->
                                        <form method="post" action="{{route('floor-tables.store')}}" id="floors_table">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h2 class="text-center">Table Details</h2>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="required_star">*</span></label>
                                                        <input tabindex="1" type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{old('name')}}" required>
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>{{ $errors->first('name') }}</p>
                                                        </div>
                                                    @endif
                                                    <!-- <div class="alert alert-error error-msg name_err_msg_contnr" style="padding: 5px !important;">
                                                        <p id="name_err_msg"></p>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Guest Count <span class="required_star">*</span></label>
                                                        <input tabindex="1" type="number" id="guest_count" name="guest_count" class="form-control" value="{{old('guest_count')}}" required>
                                                    </div>
                                                    @if ($errors->has('guest_count'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>{{ $errors->first('guest_count') }}</p>
                                                        </div>
                                                    @endif
                                                    <!-- <div class="alert alert-error error-msg guest_count_err_msg_contnr" style="padding: 5px !important;">
                                                        <p id="guest_count_err_msg"></p>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Width <span class="required_star">*</span></label>
                                                        <input tabindex="1" type="text" id="width" name="width" class="form-control" placeholder="Width" value="{{old('width')}}" required>
                                                    </div>
                                                    @if ($errors->has('width'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>{{ $errors->first('width') }}</p>
                                                        </div>
                                                    @endif
                                                    <!-- <div class="alert alert-error error-msg width_err_msg_contnr" style="padding: 5px !important;">
                                                        <p id="width_err_msg"></p>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Height <span class="required_star">*</span></label>
                                                        <input tabindex="1" type="text" id="height" name="height" class="form-control" placeholder="Height" value="{{old('height')}}" required>
                                                    </div>
                                                    @if ($errors->has('height'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>{{ $errors->first('height') }}</p>
                                                        </div>
                                                    @endif
                                                    <!-- <div class="alert alert-error error-msg height_err_msg_contnr" style="padding: 5px !important;">
                                                        <p id="height_err_msg"></p>
                                                    </div> -->
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Table Type <span class="required_star">*</span></label>
                                                        <select tabindex="2" class="form-control select2" id="table_type" name="table_type" style="width: 100%;" required>
                                                            <option value="">Select Table Type</option>
                                                            <option value="rectangular">Rectangular</option>
                                                            <option value="round">Round</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('table_type'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>{{ $errors->first('table_type') }}</p>
                                                        </div>
                                                    @endif
                                                    <!-- <div class="alert alert-error error-msg table_type_err_msg_contnr" style="padding: 5px !important;">
                                                        <p id="table_type_err_msg"></p>
                                                    </div> -->
                                                </div>

                                                {{-- this field was remove from the system --}}
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Waiter list to assign <span class="required_star">*</span></label>
                                                        <select tabindex="2" class="form-control select2" id="waiter_id" name="waiter_id" style="width: 100%;" required>
                                                            <option value="">Select Waiter</option>
                                                            @foreach($waiters as $waiter)
                                                                <option value="{{$waiter->id}}">{{$waiter->manager_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('waiter_id'))
                                                        <div class="alert alert-error" style="padding: 5px !important;">
                                                            <p>{{ $errors->first('waiter_id') }}</p>
                                                        </div>
                                                    @endif
                                                    <!-- <div class="alert alert-error error-msg waiter_err_msg_contnr" style="padding: 5px !important;">
                                                        <p id="waiter_id_err_msg"></p>
                                                    </div> -->

                                                </div> --}}

                                            </div>
                                            <div class="box-footer">
                                                <input type="hidden" name="floor_id" id="floor_id" value="{{$floor->id}}">
                                                <button type="submit" name="submit" value="submit" class="btn btn-primary">Add Table</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- general form elements -->
                                        <div class="box box-primary">
                                            <!-- /.box-header -->
                                            <div class="box-body table-responsive">
                                                <h3 class="text-capitalize">{{$floor->name}}'s Table List</h3>
                                                <table id="datatable" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th class="title" style="width: 5%">SN</th>
                                                        <th class="title" style="width: 20%">Name</th>
                                                        <th class="title" style="width: 20%">Guest count</th>
                                                        <th class="title" style="width: 25%">Table Type</th>
                                                        <th class="title" style="width: 20%">Added By</th>
                                                        <th class="title" style="width: 15%">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(count($floorTables) > 0)
                                                            @foreach($floorTables as $k=>$v)
                                                                <tr>
                                                                    <th scope="row">{{$k + 1}}</th>
                                                                    <td>{{$v->name}}</td>
                                                                    <td>{{$v->guest_count}}</td>
                                                                    <td>{{$v->table_type}}</td>
                                                                    <td>{{$v->creatorInfo->manager_name}}</td>
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
                                                                                <a class="dropdown-item edit-link delete-floors-table"
                                                                                role="button" data-id="{{$v->id}}">Delete</a>
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
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <a href="{{route('floors.index')}}" role="button" class="btn btn-primary">Back
                                </a>
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

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>


    <script src="{!! $baseURL.'assets/plugins/jcanvas/dist/jcanvas.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/floorTables.js'!!}"></script>


@endsection
