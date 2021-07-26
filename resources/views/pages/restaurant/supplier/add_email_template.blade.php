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
                Add Email Template
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <form method="post" action="{{route('add_mail_template')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email Template Name </label>
                            <input type="text" name="template_name" class="form-control"
                            placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Email Template Body</label>
                            <textarea class="form-control" name="template_body" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Date </label>
                            <input type="datetime-local" name="date" class="form-control" "
                            placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Add Email Template
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <h3>All Email Template</h3>

                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Email Template Name</th>
                                    <th class="title text-center">Email Template Body</th>
                                    <th class="title text-center">Date</th>
                                    <th class="title text-center">Restaurant Id</th>
                                    <th class="title text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($all_email as $v_email)
                                        <td class="text-center">{{$v_email->id}}</td>
                                        <td class="text-center">{{$v_email->template_name}}</td>
                                        <td class="text-center">{{$v_email->template_body}}</td>
                                        <td class="text-center">{{$v_email->date}}</td>
                                        <td class="text-center">{{$v_email->restaurant_id}}</td>

                                        <td class="text-center">
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
                                                       href="Edit-Email/{{$v_email->id}}">Edit</a> |
                                                    <a class="dropdown-item delete-customer"
                                                       href="Delete-email/{{$v_email->id}}">Delete</a>
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

    <!-- send_text_mail_modal -->

    <!-- /send_text_mail_modal -->
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
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>

@endsection
