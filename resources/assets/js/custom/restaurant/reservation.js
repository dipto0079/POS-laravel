$(document).ready(function () {
    "use strict";
    var baseURL = getBaseURL();

    load_data();
    function load_data(from_date = '', to_date = '')
    {
        var table = $('#datatable').DataTable({
            columnDefs: [
                {
                   'targets': 0,
                   'checkboxes': {
                      'selectRow': true
                   }
                }
            ],
            select: {
                style: 'multi'
            },
            
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            processing: true,
            serverSide: true,
            ajax: {
                type:'GET',
                url: baseURL +'/restaurant/reservation',
                data:{from_date:from_date, to_date:to_date}
            },
            columns: [
                {data: 'customer_id', name: ''},
                {data: 'DT_RowIndex', name: 'SN'},
                {data: 'name', name: 'Name'},
                {data: 'email', name: 'email'},
                {data: 'phone', name: 'phone'},
                {data: 'booking_date', name: 'Booking Date'},
                {data: 'number_of_people', name: 'Guest'},
                {data: 'table_id', name: 'Tables'},
                //{data: 'action', name: 'action', orderable: false, searchable: false}
            ], 
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'excelHtml5', // This is Export Type
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6] // which columns you need to export [just set the index number]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 6]
                    }
                },
            ],       
        });
    }

    $('#filter_reservation_submit').click(function(){
        var from_date = $('#start_date').val();
        var to_date = $('#end_date').val();
        if(from_date != '' &&  to_date != '')
        {
         $('#datatable').DataTable().destroy();
         load_data(from_date, to_date);
        }
        else
        {
         alert('Both Date is required');
        }
    });



    // $('.delete-customer').on('click', function () {
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Are you sure?',
    //         text: 'You want to delete.',
    //         showCancelButton: true,
    //         confirmButtonText: 'Yes',
    //         showLoaderOnConfirm: true,
    //         preConfirm: () => {
    //             const id = $(this).attr("data-id");
    //             const requestUrl = "customers/" + id + "/delete";
    //             window.location.href = requestUrl;
    //         },
    //         allowOutsideClick: () => !Swal.isLoading()
    //     })
    // });


    var customers_arr = [];

    $('#send_mail_text').on('click', function () {

        var rows_selected = table.column(0).checkboxes.selected();
        $.each(rows_selected, function (index, rowId) {

            var customer_id = rowId;
            // console.log('customerid:'+customer_id);
            var status = false;
            
            customers_arr.forEach(function(item) {
                if (item === customer_id) {
                    status = true;                    
                }
            });

            if (status === false) {
                customers_arr.push(customer_id);                
            }

        });
            
        if(customers_arr.length > 0){

            // console.log(customers_arr);

            $('#send_text_mail_modal').show();
            $('#customers').val(customers_arr);
            console.log(customers_arr);
           

        }else{

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select at least one!',
              })

        }
    });

    $('#send_text_mail_modal_button').on('click', function () {
        // var rows_selected = table.column(0).checkboxes.selected();
        customers_arr = [];

        $('#send_text_mail_modal').hide();
        // $.each(rows_selected, function (index, rowId) {
        //     console.log(rows_selected);
        //     if (rows_selected.is(':checked') == true) {
        //         rows_selected.prop('checked',false);
        //     }
        // });
        
    });
    
	$('#send_text_mail_modal_button2').on('click', function () {
        // var rows_selected = table.column(0).checkboxes.selected();
        customers_arr = [];

        $('#send_text_mail_modal').hide();
        // $.each(rows_selected, function (index, rowId) {
        //     console.log(index);
        //     if ($(this).is(':checked') == true) {
        //         $(this).prop('checked',false);
        //     }
        // });
        
    });

    $('#add_more_button').on('click', function () {
		$('#send_text_mail_modal').hide();
    });

    
    
    $('#customer_message_form').on('submit', function (e) {
        e.preventDefault();
        var customers_id = $('#customers').val();
        var message = $('#message-text').val();
        var res = customers_id.split(",");
        var baseURL = getBaseURL();

        var text_email = $('input[name="text_email[]"]:checkbox:checked').map(function () {
                            return this.value; // $(this).val()
                        }).get();
        //console.log([text_email]);
        //console.log(res);
        //return false;

        if (message != '') {

            $.ajax({
                type: 'POST',
                url: baseURL +'/restaurant/reservation/send-text-mail',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    'customers_id': res,
                    'message'  : message,
                    'text_email' : text_email
                },
                dataType: "json",
                success: function(data){
                        console.log(data);
                        if (data.success) {
                            // location.reload();
                            toastr.success(data.success);
                            console.log(data.customers);
                            
                        }
                        if (data.errors) {
                            $.each(data.errors, function (indexInArray, error) { 
                                toastr.error(error);
                            });
                        }
                        $('#send_text_mail_modal').hide();
                }
            });
            
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Message Can not be empty!',
              })
        }

        // console.log(supplier_id);

        
        
    })



});
