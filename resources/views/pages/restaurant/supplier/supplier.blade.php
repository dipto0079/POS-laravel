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
                    <div class="box-body table-responsive">
                        <h3>Supplier Due Payments</h3>
                        <a role="button" class="btn btn-info" style="float: right"
                           href="add_supplier_due">Add Supplier Due Payments
                        </a>
                        @if (session('success'))
                            <div class="alert alert-success">
                                <p style="color: red;"> {{ session('success') }}</p>
                            </div>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">

                        <table id="datatable" class="table table-striped">
                            <thead>
                            <tr>
                                <th class="title" style="width: 5%">SN</th>
                                <th class="title" style="width: 20%">Name</th>
                                <th class="title" style="width: 15%">Phone</th>
                                <th class="title" style="width: 25%">Restaurant Id</th>
                                <th class="title" style="width: 20%">User Id</th>

                                <th class="title" style="width: 15%">Total Purches Payments</th>
                                <th class="title" style="width: 15%">Total Other Payments</th>
                                <th class="title" style="width: 15%">After Paid</th>
                                <th class="title" style="width: 15%">Purches Due</th>
                                <th class="title" style="width: 15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($show_all as $v_due)
                                <td>{{$v_due->id}}</td>
                                <td>{{$v_due->name}}</td>
                                <td>{{$v_due->phone}}</td>
                                <td>{{$v_due->restaurant_id}}</td>
                                <td>{{$v_due->user_id}}</td>

                                <td>{{$v_due->Total_purches}}</td>
                                <td>{{$v_due->Total_Pay}}</td>
                                <td>{{$v_due->Total_Other_Pay}}</td>

                                @php
                                $total_payment_ = $v_due->Total_Pay + $v_due->Total_Other_Pay;
                                $purches = $v_due->Total_purches;
                                $find_due = $purches-$total_payment_;
                                $paid=$v_due->Total_purches - $v_due->Total_Pay ;
                                @endphp

                                <td>{{$find_due}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light btn-fill dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                                data-offset="-185,-75">
                                            <i class="mdi mdi-mine tiny-icon" aria-hidden="true"></i><span
                                                class="caret"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                                            <a class="dropdown-item delete-customer" role="button"
                                               href="{{route('Due_Payments_details', [$v_due->id])}}">Details</a>
                                        </div>
                                    </div>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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


    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/foodMenuCategories.js'!!}"></script>
@endsection
