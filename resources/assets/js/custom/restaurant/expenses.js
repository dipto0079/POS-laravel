
$(document).ready(function () {
    "use strict";

    var baseURL = getBaseURL();

    function getBaseURL() {
        let _url = window.location.href;
        let res = _url.split("/");
        let baseURL = res[0] + "//" + res[2] + "/" + res[3];
    
        return baseURL;
    }

    $('#datatable').DataTable({
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

    $('.delete-expense').on('click', function () {
        Swal.fire({
            icon: 'error',
            title: 'Are you sure?',
            text: 'You want to delete.',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const id = $(this).attr("data-id");
                const requestUrl = "expenses/" + id + "/delete";
                window.location.href = requestUrl;
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });

    $('#filter_expense').on('change', function () {
        var filter_expense = $('#filter_expense').val();

        if (filter_expense == 'date') {
             $('#filter_by_category').addClass('hide');
             $('#filter_by_employee').addClass('hide');
             $('#filter_by_date').removeClass('hide');
             enable_filter_submit();
             
 
             
        } else if(filter_expense == 'category'){
            $('#filter_by_employee').addClass('hide');
            $('#filter_by_date').addClass('hide');
            $('#filter_by_category').removeClass('hide');
             enable_filter_submit();
             
        } else if(filter_expense == 'responsible person'){
            $('#filter_by_category').addClass('hide');
            $('#filter_by_date').addClass('hide');
            $('#filter_by_employee').removeClass('hide');
             enable_filter_submit();
             
        }

    });
 
     $('#filter_by_date').on('change', function () {
         enable_filter_submit();
     });
 
     $('#filter_by_category').on('change', function () {
         enable_filter_submit();
     });

     $('#filter_by_employee').on('change', function () {
        enable_filter_submit();
    });
 
     enable_filter_submit();
 
    function enable_filter_submit() {
        var filter_expense = $('#filter_expense').val();

        if (filter_expense == '') {

            $('#filter_expense_submit').attr('disabled', 'disabled');

        }else if (filter_expense == 'date') {

            var filter_by_date =  $('#filter_by_date').val();

            if (filter_by_date == '') {
                $('#filter_expense_submit').attr('disabled', 'disabled');
            }else{
                $('#filter_expense_submit').removeAttr('disabled');
                $('#filter_by_category').val('');
                $('#filter_by_employee').val('');

            }

        }else if (filter_expense == 'category') {

            var filter_by_category =  $('#filter_by_category').val();

            if (filter_by_category == '') {
                $('#filter_expense_submit').attr('disabled', 'disabled');
            }else{
                $('#filter_expense_submit').removeAttr('disabled');
                $('#filter_by_date').val('');
                $('#filter_by_employee').val('');
            }
        }else if (filter_expense == 'responsible person') {

            var filter_by_employee =  $('#filter_by_employee').val();

            if (filter_by_employee == '') {
                $('#filter_expense_submit').attr('disabled', 'disabled');
            }else{
                $('#filter_expense_submit').removeAttr('disabled');
                $('#filter_by_date').val('');
                $('#filter_by_category').val('');
            }
        }
         
    }

    $('#filter_expense_form').on('submit', function (e) {
        e.preventDefault();
        var filter_by_category  = $('#filter_by_category').val();
        var filter_by_employee  = $('#filter_by_employee').val();
        var filter_by_date      = $('#filter_by_date').val();

        $.ajax({
            type: 'GET',
            url: baseURL +'/restaurant/expense/filter',
            data: {
                'date': filter_by_date,
                'category_id': filter_by_category,
                'employee_id'  : filter_by_employee
            },
            dataType: "json",
            success: function(data){

                if (data.expenses != '') {
                    var expenses = data.expenses;
                    
                    $('.expense_row').hide();
                    // $('#expense_body').html('');
                    console.log(expenses);
                    $.each(expenses, function( key, expense ) {
                        var sn = key+1;
                        $('#datatable tbody').append(
                            "<tr class='expense_row'>\n"+
                                "<th class='text-center' scope='row'>"+sn+"</th>\n"+
                                "<td class='text-center'>"+expense.date+"</td>\n"+
                                "<td class='text-center'>"+expense.amount+"</td>\n"+
                                "<td class='text-center'>"+expense.expense_item.name+"</td>\n"+
                                "<td class='text-center'>"+expense.employee.manager_name+"</td>\n"+
                                "<td class='text-center'>"+expense.note+"</td>/n"+
                                "<td class='text-center'>"+expense.creator_info.manager_name+"</td>\n"+
                                "<td class='text-center'>\n"+
                                "<div class='btn-group'>\n"+
                                    "<button type='button' class='btn btn-light btn-fill dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-offset='-185,-75'>\n"+
                                        "<i class='mdi mdi-mine tiny-icon' aria-hidden='true'></i><span class='caret'></span>\n"+
                                    "</button>\n"+
                                        "<div class='dropdown-menu dropdown-menu-right dropdown-menu-lg-left'>\n"+
                                            "<a class='dropdown-item edit-link' role='button' href='"+baseURL+"/restaurant/expense/expenses/"+expense.id+"/edit'>Edit</a> |\n"+
                                            "<a class='dropdown-item edit-link delete-expense' role='button' data-id='"+expense.id+"'>Delete</a>\n"+
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
