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
                Edit Email Template
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <form method="post" action="{{route('update-Email')}}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden"name="id" value="{{$e_email->id}}">
                        <div class="form-group">
                            <label>Email Template Name </label>
                            <input type="text" name="template_name" class="form-control" placeholder="" value="{{$e_email->template_name}}">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Email Template Body</label>
                            <textarea class="form-control" value="" name="template_body" rows="10">{{$e_email->template_body}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Date </label>
                            <input type="datetime-local" name="date" class="form-control"
                            placeholder="" value="{{$e_email->date}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Update Email Template
                            </button>
                        </div>
                    </div>
                </form>
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
