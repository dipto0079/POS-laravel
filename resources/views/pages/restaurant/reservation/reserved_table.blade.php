@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')


@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <form action="{{route('Table-Resurved')}}" method="post">
                            @csrf

                            <input type="hidden" name="table_id" value="{{$reservation_data->id}}">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Flore<span class="required_star"></span></label>
                                        <input type="text" name="flore" class="form-control" placeholder="Name"
                                               value="{{$reservation_data->floor_name}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Name <span class="required_star">*</span></label>
                                        <select name="name" class="form-control" value="">
                                            <option value="">Select Name</option>
                                            @foreach($customers as $key)
                                                <option value="{{$key->id}}">{{$key->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div style=" text-align: end; ">
                                            <a href="{{route('customers.create')}}" ><i data-feather="plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date Start <span class="required_star">*</span></label>
                                                <input type="date" name="f_Date" class="form-control"
                                                       placeholder="Reserved Date" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Time Start<span class="required_star">*</span></label>
                                                <input type="time" name="f_time" class="form-control" placeholder="Time"
                                                       required value="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date End<span class="required_star">*</span></label>
                                                <input type="date" name="l_date" class="form-control"
                                                       placeholder="Reserved Date" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Time End<span class="required_star">*</span></label>
                                                <input type="time" name="l_time" class="form-control" placeholder="Time"
                                                       required value="">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Table Name <span class="required_star"></span></label>
                                        <input type="text" name="table_name" class="form-control" placeholder="Name"
                                               value="{{$reservation_data->name}}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Members Limet<span class="required_star"></span></label>
                                        <input type="number" name="member_limet" class="form-control"
                                               placeholder="Enter Number" value="{{$reservation_data->guest_count}}"
                                               readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Members <span class="required_star"></span></label>
                                        <input type="number" name="members" class="form-control"
                                               placeholder="Enter Number" max="{{$reservation_data->guest_count}}"
                                               required value="">
                                    </div>
                                    <input type="hidden" name="status" class="form-control"
                                           placeholder="" required value="Offline">

                                    <button type="submit" class="btn btn-success pull-right">Reserved</button>


                                </div>

                                <div class="col-md-2"></div>

                            </div>
                        </form>


                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </section>
    </div>
    <!-- send_text_mail_modal -->
    <div class="modal bs-example-modal-md" id="send_text_mail_modal" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="send_text_mail_modal_button2" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Send TEXT/MAIL</h4>
                </div>
                <form id="customer_message_form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="control-label"><span class="required_star">*</span>Message
                                :</label>
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
                        <button type="button" class="btn btn-default" id="add_more_button" data-dismiss="modal">Add
                            More
                        </button>
                        <button type="button" class="btn btn-warning" id="send_text_mail_modal_button"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /send_text_mail_modal -->
@endsection

@section('script')

@endsection
