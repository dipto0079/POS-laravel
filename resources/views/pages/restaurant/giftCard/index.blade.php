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
                Gift Cards
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
                                
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-12 text-right">
                                    <ul class="list-inline text-right">
                                        <li>
                                            <a href="{{route('gift-card.sell')}}"><button type="button" class="btn btn-block btn-primary pull-right">Sell Gift Card</button></a>
                                        </li>
                                        <li>
                                            <a href="{{route('gift-card.create')}}"><button type="button" class="btn btn-block btn-primary pull-right">Add Gift Card</button></a>
                                        </li>
                                    </ul>
                                </div>
                            </div> 
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" >Card no</th>
                                    <th class="title" >Value</th>
                                    <th class="title" >Balance</th>
                                    <th class="title" >Expiry Date</th>
                                    <th class="title" >Customer</th>
                                    <!-- <th class="title" >Added By</th> -->
                                    <th class="title" >Action</th>
                                </tr>
                                </thead>
                                <tbody>

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

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/giftCards.js'!!}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endsection
