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
                        <h3>Payment Getway to Restaurant</h3>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#cash" aria-controls="cash" role="tab"
                                                                  data-toggle="tab">Cash</a></li>
                        <li role="presentation"><a href="#paypal" aria-controls="paypal" role="tab" data-toggle="tab">Paypal
                                Config</a></li>
                        <li role="presentation"><a href="#stripe" aria-controls="stripe" role="tab"
                                                   data-toggle="tab">Stripe Config</a></li>
                        <li role="presentation"><a href="#payumoney" aria-controls="payumoney" role="tab"
                                                   data-toggle="tab">PayUmoney Config</a></li>
                        <li role="presentation"><a href="#paystack" aria-controls="paystack" role="tab"
                                                   data-toggle="tab">Paystack</a>
                        </li>
                        <li role="presentation"><a href="#razorpay" aria-controls="razorpay" role="tab"
                                                   data-toggle="tab">Razorpay</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div>
                        <form method="post" action="{{route('add-Payment-Restaurant')}}">
                            @csrf
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="cash">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>USB</label>
                                            <input type="text" name="usb" value="{{$alldata->usb}}" class="form-control"
                                                   placeholder="USB">
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="paypal">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Paypal Username</label>
                                            <input type="text" name="paypal_username"
                                                   value="{{$alldata->paypal_username}}" class="form-control"
                                                   placeholder="Paypal Username">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Paypal Password</label>
                                            <input type="text" name="paypal_password"
                                                   value="{{$alldata->paypal_password}}" class="form-control"
                                                   placeholder="Paypal Password">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Paypal Signature</label>
                                            <input type="text" name="paypal_sinature"
                                                   value="{{$alldata->paypal_sinature}}" class="form-control"
                                                   placeholder="Paypal Signature">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Paypal Email</label>
                                            <input type="text" name="paypal_email" value="{{$alldata->paypal_email}}"
                                                   class="form-control"
                                                   placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="stripe">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Stripe Secret Key</label>
                                            <input type="text" name="stripe_secret" value="{{$alldata->stripe_secret}}"
                                                   class="form-control"
                                                   placeholder="Stripe Secret Key">
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="payumoney">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Payumoney Key</label>
                                            <input type="text" name="payumoney_key" value="{{$alldata->payumoney_key}}"
                                                   class="form-control"
                                                   placeholder="Payumoney Key">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Payumoney Salt</label>
                                            <input type="text" name="payumoney_salt"
                                                   value="{{$alldata->payumoney_salt}}" class="form-control"
                                                   placeholder="Payumoney Salt">
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="paystack">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Paystack API Key</label>
                                            <input type="text" name="paystack_secret_key"
                                                   value="{{$alldata->paystack_secret_key}}" class="form-control"
                                                   placeholder="Paystack API Key">
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="razorpay">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Key Id</label>
                                            <input type="text" name="rezorpay_key_id"
                                                   value="{{$alldata->rezorpay_key_id}}" class="form-control"
                                                   placeholder="Key Id">
                                        </div>
                                        <div class="col-md-12">
                                            <label>Key Secret</label>
                                            <input type="text" name="rezorpay_key_secret"
                                                   value="{{$alldata->rezorpay_key_secret}}" class="form-control"
                                                   placeholder="Key Secret">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="">
                                <div class="col-md-12" style=" text-align: center">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                    <a href="" role="button" class="btn btn-danger">Back </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <form method="post" action="{{route('active-Payment-Restaurant')}}">
                            @csrf
                            <div class="row">
                                <label>Active Gateway</label>
                                <div class="col-md-12">
                                    <label><input type="checkbox"
                                                  @php echo $alldata->usb_status=='1'?'checked':'' @endphp  name="usb_status"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Cash</label>
                                </div>
                                <div class="col-md-12">
                                    <label><input type="checkbox"
                                                  @php echo $alldata->paypal_status=='1'?'checked':'' @endphp name="paypal_status"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Paypal
                                        Config</label>
                                </div>
                                <div class="col-md-12">
                                    <label><input type="checkbox"
                                                  @php echo $alldata->stripe_status=='1'?'checked':'' @endphp  name="stripe_status"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Stripe
                                        Config</label>
                                </div>
                                <div class="col-md-12">
                                    <label><input type="checkbox"
                                                  @php echo $alldata->payumoney_status=='1'?'checked':'' @endphp name="payumoney_status"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>PayUmoney
                                        Config</label>
                                </div>
                                <div class="col-md-12">
                                    <label><input type="checkbox"
                                                  @php echo $alldata->paystack_status=='1'?'checked':'' @endphp name="paystack_status"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Paystack</label>
                                </div>
                                <div class="col-md-12">
                                    <label><input type="checkbox"
                                                  @php echo $alldata->rezorpay_status=='1'?'checked':'' @endphp name="rezorpay_status"
                                                  style="cursor: pointer"
                                                  class="restaurant_third_party_vendor_availability"><span>&nbsp;&nbsp;</span>Razorpay</label>
                                </div>
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
            <br>

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
@endsection
