@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Sell Gift Card
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('gift-card.sell-store')}}">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Card No <span class="required_star">*</span></label>
                                            <select tabindex="3" class="form-control gift-card select2" name="gift_card_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach ($giftCards as $giftCard)
                                                    @if (!$giftCard->sellInfo)
                                                        <option value="{{$giftCard->id}}" @if ($giftCard->id == old('gift_card_id')) selected @endif>{{$giftCard->card_no}}</option>                                                        
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        @if ($errors->has('gift_card_id'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('gift_card_id') }}</p>
                                            </div>
                                        @endif

                                        
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input tabindex="1" type="text" name="gift_card_price" class="form-control"
                                                   placeholder="Gift Card Price" value="{{old('gift_card_price')}}">
                                        </div>

                                        @if ($errors->has('gift_card_price'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('gift_card_price') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Customer</label>
                                            <select tabindex="3" class="form-control select2" name="customer_id" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{$customer->id}}" @if ($customer->id == old('customer_id')) selected @endif>{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @if ($errors->has('customer_id'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('customer_id') }}</p>
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        $('.gift-card').inputmask("9999-9999-9999");
    });
</script>
@endsection
