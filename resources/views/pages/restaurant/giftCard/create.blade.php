@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add Gift Card
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('gift-card.store')}}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Card No <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="card_no" id="card_no" class="form-control"
                                                   placeholder="Card no" value="{{$card_no}}" readonly>
                                        </div>

                                        @if ($errors->has('card_no'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('card_no') }}</p>
                                            </div>
                                        @endif

                                        
                                        <div class="form-group">
                                            <label>Value</label>
                                            <input tabindex="1" type="text" name="value" class="form-control"
                                                   placeholder="Value" value="{{old('value')}}">
                                        </div>

                                        @if ($errors->has('value'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('value') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Expiry Date</label>
                                            <input tabindex="1" type="date" name="expiry_date" id="expiry_date" class="form-control"
                                                   placeholder="Expiry Date" value="{{old('expiry_date')}}">
                                        </div>

                                        @if ($errors->has('expiry_date'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('expiry_date') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
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
    $(document).ready(function(){
        $('#card_no').inputmask("9999-9999-9999");  //static mask 
    });
</script>

@endsection
