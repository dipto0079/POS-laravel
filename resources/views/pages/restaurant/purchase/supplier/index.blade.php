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
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <h3>Suppliers</h3>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary" href="{{route('suppliers.create')}}">Add
                                    Supplier
                                </a>
                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="title text-center" id="shuvo">Select</th>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Name</th>
                                    <th class="title text-center">Contact Person</th>
                                    <th class="title text-center">Category</th>
                                    <th class="title text-center">Email</th>
                                    <th class="title text-center">Due Date</th>
                                    <th class="title text-center">Phone</th>
                                    <th class="title text-center">City</th>
                                    <th class="title text-center">State</th>
                                    <th class="title text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($suppliers) > 0)
                                    @foreach($suppliers as $k=>$v)
                                        <tr>
                                            <td class="text-center">
                                                <label>
                                                    <input type="checkbox" class="supplier" name="select_supplier[]"
                                                           value="{{$v->id}}">
                                                </label><br>
                                            </td>
                                            <th class="text-center" scope="row">{{$k + 1}}</th>
                                            <td class="text-center">{{$v->name}}</td>
                                            <td class="text-center">{{$v->contact_person}}</td>
                                            <td class="text-center">
                                                {{-- @if ($v->category_id)
                                                    {{$v->categoryInfo->name}}
                                                @endif --}}
                                                @foreach ($v->categories as $key => $supplierCategory)
                                                    {{$supplierCategory->name}}
                                                    @if ($key != count($v->categories)-1)
                                                        |
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{$v->email}}</td>
                                            <td class="text-center">{{$v->due_date}} Days</td>
                                            <td class="text-center">{{$v->phone}}</td>
                                            <td class="text-center">{{$v->city}}</td>
                                            <td class="text-center">{{$v->state}}</td>
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
                                                           href="{{route('suppliers.edit', [$v->id])}}">Edit</a> |
                                                        <a class="dropdown-item delete-supplier" role="button"
                                                           data-id="{{$v->id}}">Delete</a> |

                                                        <a class="dropdown-item edit-link" role="button"
                                                           href="{{route('supplier_details',[$v->id])}}">Details</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end" style="padding: 10px 0 30px 0">
                                <a role="button" class="btn btn-primary" id="send_mail_text">Send Text/Mail</a>
                            </div>
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
                <form id="supplier_message_form">
                    <div class="modal-body">
                        <div class="form-group" id="subject_div">
                            <label>Subject </label>
                            <input type="text" name="" id="sub_text" class="form-control" "
                                    placeholder="" value="">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label"><span class="required_star">*</span>Message
                                :</label>
                            <textarea class="form-control" id="message-text" rows="10"></textarea>
                            <input type="text" name="suppliers[]" id="suppliers" hidden>
                        </div>
                        <div class="form-group">
                            <label>Inform By</label><br>
                            <label><input type="radio" name="text_email[]" onchange="action_email(this.value)" value="Email"> Email</label><br>
                            <label><input type="radio" name="text_email[]" onclick="action_email(this.value)" value="SMS Message"> SMS
                                Message</label><br>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <div class="row">
                            <div class="col-md-7" >
                                    <select name="" class="btn btn-primary">
                                        <option value="0">Select Template</option>
                                        @foreach($text as  $v_tex)
                                        <option value="{{$v_tex->id}}">{{$v_tex->template_name}}</option>
                                        @endforeach
                                    </select>
                                <a href="{{route('add_template')}}" id="subject_btn" class="btn btn-primary">Add Email Template</a>
                            </div>
                            <div class="col-md-5">
                                <button type="button" class="btn btn-warning" id="send_text_mail_modal_button"
                                        data-dismiss="modal">Close
                                </button>
                                <button type="submit" class="btn btn-primary">Send message</button>
                            </div>
                        </div>
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
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

    <script src="{!! $baseURL.'resources/assets/js/custom/serviceWorker.js'!!}"></script>
    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/suppliers.js'!!}"></script>
    <script>
        function action_email(id) {
            //alert(id);
            if (id !='Email'){
                $('#subject_div').hide();
                $('#subject_btn').hide();

            }
            else
            {
                $('#subject_div').show();
                $('#subject_btn').show();
            }


        }
    </script>
@endsection
