$(document).ready(function () {
    "use strict";
    var baseURL = getBaseURL();
    

    var table = $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
            {
                extend: 'excelHtml5', // This is Export Type
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6] // which columns you need to export [just set the index number]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }
            },
        ]
    });

    $('.delete-purchase').on('click', function () {
        
        Swal.fire({
            icon: 'error',
            title: 'Are you sure?',
            text: 'You want to delete.',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const id = $(this).attr("data-id");
                const requestUrl = "purchases/" + id + "/delete";
                window.location.href = requestUrl;
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });

    $('#filter_purchase').on('change', function () {
        var filter_purchase = $('#filter_purchase').val();

        if (filter_purchase == 'date') {
             $('#filter_by_ingredient').addClass('hide');
             $('#filter_by_supplier').addClass('hide');
             $('#filter_by_date').removeClass('hide');
             enable_filter_submit();
             
 
             
        } else if(filter_purchase == 'ingredient'){
            $('#filter_by_supplier').addClass('hide');
            $('#filter_by_date').addClass('hide');
            $('#filter_by_ingredient').removeClass('hide');
             enable_filter_submit();
             
        } else if(filter_purchase == 'supplier'){
            $('#filter_by_ingredient').addClass('hide');
            $('#filter_by_date').addClass('hide');
            $('#filter_by_supplier').removeClass('hide');
             enable_filter_submit();
             
        }

    });
 
     $('#filter_by_date').on('change', function () {
         enable_filter_submit();
     });
 
     $('#filter_by_ingredient').on('change', function () {
         enable_filter_submit();
     });

     $('#filter_by_supplier').on('change', function () {
        enable_filter_submit();
    });
 
     enable_filter_submit();
 
    function enable_filter_submit() {
        var filter_purchase = $('#filter_purchase').val();

        if (filter_purchase == '') {

            $('#filter_purchase_form').attr('disabled', 'disabled');

        }else if (filter_purchase == 'date') {

            var filter_by_date =  $('#filter_by_date').val();

            if (filter_by_date == '') {
                $('#filter_purchase_form').attr('disabled', 'disabled');
            }else{
                $('#filter_purchase_form').removeAttr('disabled');
                $('#filter_by_ingredient').val('');
                $('#filter_by_supplier').val('');

            }

        }else if (filter_purchase == 'ingredient') {

            var filter_by_ingredient =  $('#filter_by_ingredient').val();

            if (filter_by_ingredient == '') {
                $('#filter_purchase_form').attr('disabled', 'disabled');
            }else{
                $('#filter_purchase_form').removeAttr('disabled');
                $('#filter_by_date').val('');
                $('#filter_by_supplier').val('');
            }
        }else if (filter_purchase == 'supplier') {

            var filter_by_supplier =  $('#filter_by_supplier').val();

            if (filter_by_supplier == '') {
                $('#filter_purchase_form').attr('disabled', 'disabled');
            }else{
                $('#filter_purchase_form').removeAttr('disabled');
                $('#filter_by_date').val('');
                $('#filter_by_ingredient').val('');
            }
        }
         
    }

    $('#filter_purchase_form').on('submit', function (e) {
        e.preventDefault();
        var filter_by_ingredient  = $('#filter_by_ingredient').val();
        var filter_by_supplier  = $('#filter_by_supplier').val();
        var filter_by_date      = $('#filter_by_date').val();

        $.ajax({
            type: 'GET',
            url: baseURL +'/restaurant/purchase/purchases',
            data: {
                'date': filter_by_date,
                'ingredient_id': filter_by_ingredient,
                'supplier_id'  : filter_by_supplier
            },
            dataType: "json",
            success: function(data){


                if (data.purchases != '') {
                    var purchases = data.purchases;
                    
                    $('.purchase_body').html('');
                    //
                    
                    
                    $.each(purchases, function( key, purchase ) {
                        var ingredient_arr = [];
                        $.each(purchase.purchase_ingredients, function (i, purchase_ingredient) {
                            ingredient_arr.push(purchase_ingredient.name);  
                        })

                        

                        $('#datatable tbody').append(
                            "<tr class='purchase_row'>\n"+
                                "<td class='text-center'>"+purchase.reference_no+"</td>\n"+
                                "<td class='text-center'>"+purchase.date+"</td>\n"+
                                "<td class='text-center'>"+purchase.supplier_info.name+"</td>\n"+
                                "<td class='text-center'>"+ingredient_arr+"</td>\n"+
                                "<td class='text-center'>"+purchase.grand_total+"</td>\n"+
                                "<td class='text-center'>"+purchase.due+"</td>\n"+
                                "<td class='text-center'>"+purchase.creator_info.manager_name+"</td>\n"+
                                "<td class='text-center'>\n"+
                                "<div class='btn-group'>\n"+
                                    "<button type='button' class='btn btn-light btn-fill dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-offset='-185,-75'>\n"+
                                        "<i class='mdi mdi-mine tiny-icon' aria-hidden='true'></i><span class='caret'></span>\n"+
                                    "</button>\n"+
                                        "<div class='dropdown-menu dropdown-menu-right dropdown-menu-lg-left'>\n"+
                                            "<a class='dropdown-item edit-link' role='button' href='"+baseURL+"/restaurant/purchase/purchases/"+purchase.id+"/edit'>Edit</a> |\n"+
                                            "<a class='dropdown-item edit-link delete-purchase' role='button' data-id='"+purchase.id+"'>Delete</a>\n"+
                                        "</div>\n"+
                                    "</div>\n"+
                                "</td>\n"+
                        "</tr>\n");

                    });


                    
                } else {
                    toastr.warning('Nothing to show');
                }
                
            }
        });


    });




});
