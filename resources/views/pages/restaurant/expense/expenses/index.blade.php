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
                Expenses
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
                                <div class="col-md-2 form-group">
                                    <select tabindex="1" id="filter_expense" name="filter_expense" class="form-control select2" style="width: 100%;">
                                        <option value="date" selected> Filter By Date</option>
                                        <option value="category">Category</option>
                                        <option value="responsible person">Responsible Person</option>
                                    </select>
                                </div>
                                <form id="filter_expense_form" method="get" action="{{route('expenses.index')}}">
                                    <div class="col-md-2 form-group">
                                        <input class="form-control" type="date" name="filter_by_date" id="filter_by_date" value="">
                                        <select id="filter_by_category" name="filter_by_category" class="form-control select2 hide" style="width: 100%;">
                                            <option value="" selected>Select</option>
                                            @foreach ($expenseItems as $expenseItem)
                                                <option value="{{$expenseItem->id}}">{{$expenseItem->name}}</option>
                                            @endforeach
                                        </select>
                                        <select id="filter_by_employee" name="filter_by_employee" class="form-control select2 hide" style="width: 100%;">
                                            <option value="" selected>Select</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{$employee->id}}" @if ($employee->id == old('employee_id')) selected @endif>{{$employee->manager_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" id="filter_expense_submit" class="btn btn-block btn-primary pull-left">Submit</button>
                                    </div>

                                </form>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                <div class="col-md-5 text-right">
                                    <ul class="list-inline text-right">

                                        <li>
                                            <a href="{{route('expenses.create')}}"><button type="button" class="btn btn-block btn-primary pull-right">Add Expense</button></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center" >SN</th>
                                    <th class="title text-center" >Date</th>
                                    <th class="title text-center" >Amount</th>
                                    <th class="title text-center" >Category</th>
                                    {{--<th class="title text-center" >Responsible Person</th>--}}
                                    <th class="title text-center" >Note</th>
                                   {{-- <th class="title text-center" >Added By</th>--}}
                                    <th class="title text-center" >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if (count($expenses)> 0)
                                        @foreach($expenses as $k=>$v)
                                            <tr class="expense_row">
                                                <th scope="row">{{$k + 1}}</th>
                                                <td class="text-center">{{$v->date}}</td>
                                                <td class="text-center">{{$v->amount}}</td>
                                                <td class="text-center">{{$v->expenseItem->name}}</td>
                                                {{--<td class="text-center">{{$v->employee->manager_name}}</td>--}}
                                                <td class="text-center">{{$v->note}}</td>
                                              {{--  <td class="text-center">{{$v->creatorInfo->manager_name}}</td>--}}
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
                                                            href="{{route('expenses.edit', [$v->id])}}">Edit</a>
                                                            |
                                                            <a class="dropdown-item edit-link delete-expense"
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
        </section>
    </div>
@endsection

@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/expenses.js'!!}"></script>
@endsection
