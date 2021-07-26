$(document).ready(function () {
    "use strict";

    $('#datatable').DataTable({
        // select: {
        //     style: 'multi'
        // },
        // dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            {
                extend: 'excelHtml5', // This is Export Type
                exportOptions: {
                    columns: [0, 1, 2, 3] // which columns you need to export [just set the index number]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3]
                }
            },
            
        ]
    });

    $('.delete-supplier').on('click', function () {
        Swal.fire({
            icon: 'error',
            title: 'Are you sure?',
            text: 'You want to delete.',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const id = $(this).attr("data-id");
                const requestUrl = "suppliers/" + id + "/delete";
                window.location.href = requestUrl;
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });

    var suppliers_arr = [];

    $('#send_mail_text').on('click', function () {

        
        $("input:checkbox[class=supplier]:checked").each(function () {

            var supplier_id = $(this).val();
            var status = false;
            
            suppliers_arr.forEach(function(item) {
                if (item === supplier_id) {
                    status = true;                    
                }
            });

            if (status === false) {
                suppliers_arr.push(supplier_id);                
            }

        });
            
        if(suppliers_arr.length > 0){

            console.log(suppliers_arr);

            $('#send_text_mail_modal').show();
            $('#suppliers').val(suppliers_arr);
           

        }else{

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please select at least one!',
              })

        }
    });

    $('#send_text_mail_modal_button').on('click', function () {
        suppliers_arr = [];
        $('#send_text_mail_modal').hide();
        $("input:checkbox[class=supplier]:checked").each(function () {
            if ($(this).is(':checked') == true) {
                $(this).prop('checked',false);
            }
        });
        
    });
    
	$('#send_text_mail_modal_button2').on('click', function () {
        suppliers_arr = [];
        $('#send_text_mail_modal').hide();
        $("input:checkbox[class=supplier]:checked").each(function () {
            if ($(this).is(':checked') == true) {
                $(this).prop('checked',false);
            }
        });
    });

    $('#add_more_button').on('click', function () {
		$('#send_text_mail_modal').hide();
    });

    
    
    $('#supplier_message_form').on('submit', function (e) {
        e.preventDefault();
        var suppliers_id = $('#suppliers').val();
        var message = $('#message-text').val();
        var res = suppliers_id.split(",");
        var baseURL = getBaseURL();
        // console.log(res);

        if (message != '') {

            $.ajax({
                type: 'POST',
                url: baseURL +'/restaurant/purchase/suppliers/send-text-mail',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    'suppliers_id': res,
                    'message'  : message
                },
                dataType: "json",
                success: function(data){
                        
                        if (data.success) {
                            location.reload();
                            toastr.success('message send');
                            
                        }
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
