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
                    <div class="row">
                        <div class="col-md-11 form-group">
                            <h1 style="text-align: center">Inventory</h1>
                        </div>

                        {{--<form method="get" action="{{route('ingredients_src')}}">
                            @csrf--}}
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="" class="form-control">
                                        <option value="">Select category</option>
                                        @php if($catagory !=false){
                                        @endphp
                                        @foreach($catagory as $key)
                                            <option value="">{{$key->name}}</option>
                                        @endforeach
                                        @php }
                                        @endphp
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="" class="form-control">
                                        <option value="">Select sub category</option>
                                        @php if($sub_catagory !=false){
                                        @endphp
                                        @foreach($sub_catagory as $key)
                                            <option value="">{{$key->catagory_name}}</option>
                                        @endforeach
                                        @php }
                                        @endphp
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="" onchange="show_id(this.value)" class="form-control">
                                        <option value="0">Select ingredients</option>
                                        @php if($ingredients !=false){
                                        @endphp
                                        @foreach($ingredients as $key)
                                            <option value="{{$key->id}}">{{$key->name}}</option>
                                        @endforeach
                                        @php }
                                        @endphp
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <select name="" class="form-control">
                                        <option value="">Select Food Menu</option>
                                        @php if($food !=false){
                                        @endphp
                                        @foreach($food as $key)
                                            <option value="{{$key->id}}">{{$key->name}}</option>
                                        @endforeach
                                        @php }
                                        @endphp
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-info">Interested In Alert</button>
                            </div>

                            <div class="col-md-2">
                                <p style="text-align: right ">Stock Valu:$5000000</p>
                            </div>
                        {{--</form>--}}
                    </div>

                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            <table id="datatable" class="table table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th class="title text-center">SN</th>
                                    <th class="title text-center">Interested(Code)</th>
                                    <th class="title text-center">Catagory</th>
                                    <th class="title text-center">Stock Qty\ Amount</th>

                                </tr>
                                </thead>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
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


    <script src="{!! $baseURL.'resources/assets/js/custom/restaurant/kitchenPanels.js'!!}"></script>
   {{-- <script>
        $(document).ready(function(){

            fetch_customer_data();

            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('live_search.action') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>--}}

    <!-- <script>
   
        function show_id(id) {
		$.ajax({
          type: "GET",
          url: 'show_food_menue/'+id,
          dataType: 'JSON',
          error: function (xhr, status, error) {
            var errorMessage = xhr.status + ': ' + xhr.statusText;
            alert(errorMessage);
          },
          success: function (data) {
            
		$('#hidden_id').val(data.id)
		$('#title').val(data.title)
		$('#markitup2').val(data.Discription)
		$('#hidden_img').val(data.image)
		document.getElementById('img').src='storage/app/'+data.image; 


          
        
      }
      });

	}
    
    
    </script> -->

@endsection
