@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Edit Gift Card
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('gift-update')}}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$all_data->id}}">
                                            <label>Card No</label>
                                            <input type="text" readonly class="form-control" name="card_no"
                                                   value="{{$all_data->card_no}}"
                                                   placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Value</label>
                                            <input type="text" class="form-control" name="g_value"
                                                   value="{{$all_data->value}}"
                                                   placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Expiry Date</label>
                                            <input type="date" name="expiry_date" class="form-control"
                                                   value="{{$all_data->expiry_date}}"
                                                   placeholder="Expiry Date">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">submit</button>
                                <a href="{{route('gift-card.index')}}" role="button" class="btn btn-primary">Back
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
    {{-- <script src="{!! $baseURL.'assets/plugins/input-mask/jquery.inputmask.js'!!}"></script> --}}
    <script>
        $(document).ready(function () {
            $('#card_no').inputmask("9999-9999-9999");  //static mask
        });
    </script>

@endsection
