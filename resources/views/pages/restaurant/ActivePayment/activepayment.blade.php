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
                Payment Active
            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="row">
                            <div class="col-md-12">

                                @if($json->usb_status)
                                    <div class="col-md-4">
                                        <label><input type="checkbox" @php echo $json->usb_status=='1'?'checked':'' @endphp  readonly  name="usb_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Cash</label>
                                    </div>
                                @endif

                                @if($json->paypal_status)
                                    <div class="col-md-4">
                                        <label><input type="checkbox" @php echo $json->paypal_status=='1'?'checked':'' @endphp readonly  name="paypal_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Paypal
                                            Config</label>
                                    </div>
                                @endif

                                @if($json->stripe_status)
                                    <div class="col-md-4">
                                        <label><input type="checkbox" @php echo $json->stripe_status=='1'?'checked':'' @endphp  readonly name="stripe_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Stripe Config</label>
                                    </div>
                                @endif
                                @if($json->payumoney_status)
                                    <div class="col-md-4">
                                        <label><input type="checkbox" @php echo $json->payumoney_status=='1'?'checked':'' @endphp readonly name="payumoney_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>PayUmoney Config</label>
                                    </div>
                                @endif
                                @if($json->paystack_status)
                                    <div class="col-md-4">
                                        <label><input type="checkbox" @php echo $json->paystack_status=='1'?'checked':'' @endphp readonly name="paystack_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Paystack</label>
                                    </div>
                                @endif
                                @if($json->rezorpay_status)
                                    <div class="col-md-4">
                                        <label><input type="checkbox" @php echo $json->rezorpay_status=='1'?'checked':'' @endphp readonly name="rezorpay_status" style="cursor: pointer" class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Razorpay</label>
                                    </div>
                                @endif
                            </div>
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
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/purchases.js'!!}"></script>
    <script>
        function showPermision(id) {
            //alert(id);
            $.ajax({
                type: "GET",
                url: "show-json/" + id,
                dataType: 'JSON',
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText;
                    alert(errorMessage);
                },
                success: function (json) {
                    if(data.length===0)
                    {

                        $('#sub_catagory').prop('checked',0);
                        $('#paypal_status').prop('checked',0);
                        $('#stripe_status').prop('checked',0);
                        $('#payumoney_status').prop('checked',0);
                        $('#dine_in').prop('checked',0);
                        $('#dine_in').prop('checked',0);


                    }
                    else {
                        $('#sub_catagory').prop('checked',data.sub_catagory);
                        $('#paypal_status').prop('checked',data.paypal_status);
                        $('#stripe_status').prop('checked',data.stripe_status);
                        $('#payumoney_status').prop('checked',data.payumoney_status);
                        $('#paystack_status').prop('checked',data.paystack_status);
                        $('#rezorpay_status').prop('checked',data.rezorpay_status);
                        console.log(json);
                        //alert('error');
                    }

                }
            });
        }

    </script>
@endsection
