@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Expense
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('expenses.update',[$expense->id])}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Date <span class="required_star">*</span></label>
                                            <input tabindex="1" type="date" name="date" class="form-control"
                                                   placeholder="Date" value="{{$expense->date}}">
                                        </div>

                                        @if ($errors->has('date'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('date') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Amount <span class="required_star">*</span></label>
                                            <input tabindex="1" type="number" name="amount" class="form-control"
                                                   placeholder="Amount" value="{{$expense->amount}}">
                                        </div>

                                        @if ($errors->has('amount'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('amount') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Category <span class="required_star">*</span></label>
                                            <select tabindex="3" class="form-control select2" name="category_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach ($expenseItems as $expenseItem)
                                                    <option value="{{$expenseItem->id}}" @if ($expenseItem->id == $expense->cat_id) selected @endif>{{$expenseItem->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if ($errors->has('category_id'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('category_id') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Responsible Person <span class="required_star">*</span></label>
                                            <select tabindex="3" class="form-control select2" name="employee_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{$employee->id}}" @if ($employee->id == $expense->employee_id) selected @endif>{{$employee->manager_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if ($errors->has('employee_id'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('employee_id') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea tabindex="5" class="form-control" rows="4" name="note" placeholder="Note ...">{{$expense->note}}</textarea>

                                        </div>

                                        @if ($errors->has('note'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('note') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
                                <a href="{{route('expenses.index')}}" role="button" class="btn btn-primary">Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });
    </script>
@endsection
