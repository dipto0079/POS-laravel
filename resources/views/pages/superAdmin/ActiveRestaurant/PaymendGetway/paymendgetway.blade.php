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
                        <h3>Payment Gateway</h3>
                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <form method="post" action="{{route('res-Payment-add')}}">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="restaurant_id" value="{{$id}}">
                                <label>Active Gateway</label>
                                @if($alldata->usb_status)
                                <div class="col-md-12">
                                    <label><input type="checkbox" @php echo $alldata->usb_status=='1'?'checked':'' @endphp  readonly  name="usb_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Cash</label>
                                </div>
                                @endif

                                @if($alldata->paypal_status)
                                <div class="col-md-12">
                                    <label><input type="checkbox" @php echo $alldata->paypal_status=='1'?'checked':'' @endphp  name="paypal_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Paypal
                                        Config</label>
                                </div>
                                @endif

                                @if($alldata->stripe_status)
                                <div class="col-md-12">
                                    <label><input type="checkbox" @php echo $alldata->stripe_status=='1'?'checked':'' @endphp  name="stripe_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Stripe Config</label>
                                </div>
                                @endif
                                @if($alldata->payumoney_status)
                                <div class="col-md-12">
                                    <label><input type="checkbox" @php echo $alldata->payumoney_status=='1'?'checked':'' @endphp name="payumoney_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>PayUmoney Config</label>
                                </div>
                                @endif
                                @if($alldata->paystack_status)
                                <div class="col-md-12">
                                    <label><input type="checkbox" @php echo $alldata->paystack_status=='1'?'checked':'' @endphp name="paystack_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Paystack</label>
                                </div>
                                @endif
                                @if($alldata->rezorpay_status)
                                <div class="col-md-12">
                                    <label><input type="checkbox" @php echo $alldata->rezorpay_status=='1'?'checked':'' @endphp name="rezorpay_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Razorpay</label>
                                </div>
                                @endif
                            </div>
                            <div class="">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
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
