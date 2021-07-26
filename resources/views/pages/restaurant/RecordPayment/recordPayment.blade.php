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
                Record Payment
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <form method="post" action="" >
                    @csrf
                    <div class="col-md-6">
                       <label>Supplier Name <span class="required_star">*</span></label>
                            <select name="" class="form-control">
                                <option value="">Select Supplier</option>
                                @foreach($supplier as $v_sup)
                                <option value="{{$v_sup->id}}">{{$v_sup->supname}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-md-6">
                        <label>Amount Received <span class="required_star">*</span></label>
                        <input type="text" name="manager_name" class="form-control"
                               placeholder="Name">
                    </div>
                    <div class="col-md-6">
                        <label>Payment Date <span class="required_star">*</span></label>
                        <input type="datetime-local" name="manager_email" class="form-control"
                               placeholder="Email">
                    </div>

                    <div class="col-md-6">
                        <label>Transaction ID <span class="required_star">*</span></label>
                        <input type="text" name="salary" class="form-control"
                               placeholder="Salary">
                    </div>

                    <div class="col-md-6">
                        <label>Leave a note <span class="required_star">*</span></label>
                        <input type="text" name="" class="form-control"
                               placeholder="Password">
                    </div>

                    <div class="col-md-6">
                        <label>Payment Mode</label>
                        <input type="text" name="manager_phone" placeholder="" class="form-control">
                    </div>

                    <div class="">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">
                                ADD
                            </button>
                            <a href="" role="button" class="btn btn-danger">Back </a>
                        </div>
                    </div>
                </form>
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
