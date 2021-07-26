@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />


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
                            <h3>Customers</h3>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary" href="{{route('customers.create')}}">Add Customer
                                </a>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title">id</th>
                                    <th class="title">SN</th>
                                    <th class="title">Name</th>
                                    <th class="title">Email</th>
                                    <th class="title">Phone</th>
                                    <th class="title">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                {{-- <tbody>
                                    @if(count($customers) > 0)
                                        @foreach($customers as $k=>$v)
                                            <tr>
                                                <th scope="row">{{$k + 1}}</th>
                                                <td>{{$v->name}}</td>
                                                <td>{{$v->email}}</td>
                                                <td>{{$v->phone}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false" data-offset="-185,-75">
                                                            <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                                class="caret"></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                            <a class="dropdown-item edit-link" role="button"
                                                            href="{{route('customers.edit', [$v->id])}}">Edit</a> |
                                                            <a class="dropdown-item delete-customer" role="button" data-id="{{$v->id}}">Delete</a> |
                                                            <a class="dropdown-item edit-link" role="button"
                                                            href="#">Show History</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody> --}}
                            </table>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary" id="send_mail_text">Send Text/Mail</a>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- send_text_mail_modal -->
    <div class="modal bs-example-modal-md" id="send_text_mail_modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="send_text_mail_modal_button2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Send TEXT/MAIL</h4>
                </div>
                <form id="customer_message_form">
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label"><span class="required_star">*</span>Message :</label>
                                <textarea class="form-control" id="message-text" rows="10"></textarea>
                                <input type="text" name="customers[]" id="customers" hidden>
                            </div>
                            <div class="form-group">
                                <label>Inform By</label><br>
                                <label><input type="checkbox" name="text_email[]" value="email"> Email</label><br>
                                <label><input type="checkbox" name="text_email[]" value="sms"> SMS Message</label><br>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="add_more_button" data-dismiss="modal">Add More</button>
                        <button type="button" class="btn btn-warning" id="send_text_mail_modal_button" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /send_text_mail_modal -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    
    {{-- <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script> --}}
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/customers.js'!!}"></script>
@endsection
