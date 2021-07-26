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
            <div class="row">
            <div class="col-md-6">
                <h2>
                    Supplier Details
                </h2>
            </div>
            <div class="col-md-6">
                <h3>Supplier Name</h3>
                <p style="font-size: 20px;">{{$supplier->name}}</p>
            </div>
        </div>


            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-credit-card" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Paid</span>
                        <span class="info-box-number">$ {{$total_paid}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-black"><i class="fa fa-long-arrow-down" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Due</span>
                        <span class="info-box-number">$ {{$total_due}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-usd" aria-hidden="true"></i></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sub Total</span>
                        <span class="info-box-number">$ {{$sub_total}}</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Grand Total</span>
                        <span class="info-box-number">{{$grand_total}}</span>
                    </div>
                </div>
            </div>

        </section>
        <section class="content">
            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="box-body">
                        @foreach($purchases as $v_supplier)

                        @endforeach
                        @foreach($supplier as $s_supplier)

                        @endforeach

                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <h1>Refernce No</h1>

                                        <p>{{$v_supplier->reference_no}}</p>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <h3>Supplier</h3>
                                        <p style="font-size: 18px;">{{$supplier->name}}</p>
                                    </div>

                                </div>
                        </div>
                </div>
            </div> --}}
                <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <div class="row">
                                <div class="col-md-2 form-group">
                                </div>
                                <div class="hidden-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>

                            </div>
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    {{-- <th class="title text-center">SN</th> --}}
                                    <th class="title text-center" style="width: 5%">SN</th>
                                    <th class="title text-center" style="width: 15%">Refernce No</th>
                                    <th class="title text-center">Ingredients (Code)</th>
                                    <th class="title text-center">Date</th>
                                    <th class="title text-center">Paid</th>
                                    <th class="title text-center">Due</th>
                                    <th class="title text-center">Sub Total</th>
                                    <th class="title text-center">Grand Total</th>
                                    <th class="title text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="purchase_body">
                                     <?php $number = 0; ?>
                                    @foreach($purchases as $v_supplier)
                                        <tr class="purchase_row">
                                            <td class="text-center">{{ $number+1 }}</td>
							                    <?php $number++; ?>
                                            <td class="text-center">{{$v_supplier->reference_no}}</td>
                                            <td class="text-center">{{$v_supplier->purchase_type}}</td>
                                            <td class="text-center">{{$v_supplier->date}}</td>
                                            <td class="text-center">$ {{$v_supplier->paid}}</td>
                                            <td class="text-center">$ {{$v_supplier->due}}</td>
                                            <td class="text-center">$ {{$v_supplier->subtotal}}</td>
                                            <td class="text-center">$ {{$v_supplier->grand_total}}</td>
                                            <td class="text-center">
                        {{-- <a role="button" class="btn btn-success" href="../supplier_food/{{$v_supplier->id}}">Food Name</a> --}}
                        <button type="button" onclick="showFood({{$v_supplier->id}})" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Food Name
                          </button>
                                                <a role="button" class="btn btn-primary" href="">Modify</a>
                                                <a role="button" class="btn btn-warning" href="">Payable</a>

                        <a class="btn btn-danger" href="../supplier_delete/{{$v_supplier->id}}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>

        <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Food Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- <h1 id="name" name="name"></h1> --}}

          <table id="datatable" class="table table-striped">
            <thead>
            <tr>
                <th class="title text-center" style="width: 10%">Food Name</th>
                <th class="title text-center" style="width: 10%">Date</th>
                <th class="title text-center" style="width: 10%">Referrence</th>
            </tr>
            </thead>
            <tbody class="purchase_body">
                    <tr class="purchase_row">
                        <td class="text-center" id="name"></td>
                        <td class="text-center" id="date"></td>
                        <td class="text-center" id="reference_no"></td>
                    </tr>
            </tbody>
        </table>
       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
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
function showFood(id)
{
    // $("#result").html(id+" : is found");

    $.ajax({
            type: "GET",
            url: "../supplier_food/" + id,
            dataType: 'JSON',
            error: function(xhr, status, error) {
                var errorMessage = xhr.status + ': ' + xhr.statusText
                alert(errorMessage);
            },
            success: function(data) { 
              console.log(data);
                var i=0; var show ="";
                var date="", reference_no="";
                for(i=0;i<data.length;i++)
                {
                    show+= data[i].name+" <br>";
                    date+= data[i].date+" <br>";
                    reference_no+= data[i].reference_no+" <br>";
                }
                document.getElementById("name").innerHTML = show;
                document.getElementById("date").innerHTML = date;
                document.getElementById("reference_no").innerHTML = reference_no;
                //$("#name").html(data.name);
            }
        });
}

</script>

@endsection
