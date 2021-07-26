@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css"
          rel="stylesheet"/>


@endsection

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <div class="row">
                                @php if(isset($floors)){
                                @endphp
                                <form action="{{route('search-floor')}}" method="post">
                                    @csrf
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <select name="floor" class="form-control">
                                            <option value="0">Select Table</option>

                                            @foreach($floors as $key)
                                                <option value="{{$key->id}}">{{$key->name}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-success">Search</button>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>

                                    </div>
                                </form>
                                @php }
                                @endphp
                            </div>
                            <br>
                            @php
                                {{ $table_id=[]; }}

                            @endphp


                            @if(isset($dd))
                                @foreach($dd as $dd)
                                    @php $table_id[$dd->table_id] = $dd->table_id  @endphp
                                    @php $table_id[$dd->name] = $dd->name  @endphp
                                @endforeach
                            @endif

                            @php
                                if(isset($reservation_table))
                                {
                                $i=0;
                            @endphp
                            <div class="table-responsive" id="ingredient_consumption_table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Flore</th>
                                        <th>Table No</th>
                                        <th>Table Abality</th>
                                        <th>Resurvation</th>
                                        <th>Resurvation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($reservation_table as $key)
                                        @php $i=$i+1; @endphp
                                        <tr>

                                            <td>{{$i}}</td>
                                            <td>{{$key->floor_name }}</td>

                                            <td>{{$key->name }}</td>
                                            <td>{{$key->guest_count }}</td>

                                            <td><a href="Reserved-Table/{{$key->id}}">
                                                    <button class="btn form-control  @php
                                                        echo Illuminate\Support\Arr::has($table_id,$key->id)?"btn-danger":"btn-success" ; @endphp" data-toggle="tooltip" data-placement="top" title="{{$key->name}}">
                                                        @php
                                                            echo Illuminate\Support\Arr::has($table_id,$key->id)?"Booking":"Reservation" ; @endphp

                                                    </button>
                                                </a></td>

                                            <td><a href="all-table/{{$key->id}}">
                                                    <button class="btn btn-success">Reservation Views</button>
                                                </a></td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @php } @endphp
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- send_text_mail_modal -->
    <div class="modal bs-example-modal-md" id="send_text_mail_modal" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="send_text_mail_modal_button2" data-dismiss="modal"
                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Send TEXT/MAIL</h4>
                </div>
                <form id="customer_message_form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="control-label"><span class="required_star">*</span>Message
                                :</label>
                            <textarea class="form-control" id="message-text" rows="10"></textarea>
                            <input type="text" name="customers[]" id="customers" hidden>
                        </div>
                        <div class="form-group">
                            <label>Inform By</label><br>
                            <label><input type="checkbox" name="text_email[]" value="email"> Email</label><br>
                            <label><input type="checkbox" name="text_email[]" value="sms"> SMS Message</label><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" id="add_more_button" data-dismiss="modal">Add
                            More
                        </button>
                        <button type="button" class="btn btn-warning" id="send_text_mail_modal_button"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /send_text_mail_modal -->
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>

    {{-- <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script> --}}
    <script type="text/javascript"
            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/reservation.js'!!}"></script>
@endsection
