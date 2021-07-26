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
                Purchase Report
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">

                            <h3>Purchase Report</h3>

                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title" style="width: 5%">SN</th>
                                    <th class="title" style="width: 20%">Name Id</th>
                                    <th class="title" style="width: 25%">Category Id</th>
                                    <th class="title" style="width: 25%">Purchase Price</th>
                                    <th class="title" style="width: 15%">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-light btn-fill dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-offset="-185,-75">
                                                    <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span class="caret"></span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                                    <a class="dropdown-item edit-link" role="button" href="">Edit</a> |
                                                    <a class="dropdown-item delete-customer"href="">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

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
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>
@endsection
