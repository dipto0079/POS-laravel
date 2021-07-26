@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Expense Category
            </h1>
            @if (session('success'))
                            <div class="alert alert-success">
                            <p style="color: red;"> {{ session('success') }}</p>
                            </div>
                            @endif
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form method="Post" action="{{route('expenses.expenses_add_category')}}">
                                            @csrf
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input  type="text" name="name" class="form-control"
                                                    placeholder="category" value="{{$edit_expenses->name}}" >
                                                </div>
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" name="category_description" class="form-control"
                                                    placeholder="Description" value="{{$edit_expenses->description}}">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name="del_status" class="form-check-input" value="on" checked>
                                                            Live
                                                    </label>
                                                </div>

                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" id="addSupplier">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
