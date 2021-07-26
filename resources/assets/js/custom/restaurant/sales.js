// const { filter } = require("lodash");

$(document).ready(function () {
    "use strict";
    var table;
    var baseURL = getBaseURL();


    fill_datatable();

    function fill_datatable(filter_sales = '', filter_by_date = '', filter_by_order_type = '', filter_by_total_paid = '', filter_by_payment = '')
    {
        table = $('#datatable').DataTable({
    
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            processing: true,
            serverSide: true,
            ajax: {
                type:'GET',
                url: baseURL +'/restaurant/sale/sales',
                data:{
                    filter_sales        :   filter_sales, 
                    filter_by_date      :   filter_by_date, 
                    filter_by_order_type:   filter_by_order_type,
                    filter_by_total_paid:   filter_by_total_paid,
                    filter_by_payment   :   filter_by_payment
                   }
            },
            columns: [
    
                {data: 'sale_no', name: 'Ref. no', orderable: true, searchable: true},
                {data: 'order_type', name: 'Order Type', orderable: true, searchable: true},
                {data: 'sale_date', name: 'Date', orderable: true, searchable: true},
                {data: 'customer', name: 'Customer', orderable: true, searchable: true},
                {data: 'total_payable', name: 'Total Payable', orderable: true, searchable: true},
                {data: 'payment_method', name: 'Payment Method', orderable: true, searchable: true},
                {data: 'added_by', name: 'Added By', orderable: true, searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ], 
    
            dom: 'lBfrtip',
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
    }

    table.on("click","tbody tr .delete-sale",function(){
        Swal.fire({
            icon: 'error',
            title: 'Are you sure?',
            text: 'You want to delete.',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const id = $(this).attr("data-id");
                const requestUrl = "sales/" + id + "/delete";
                window.location.href = requestUrl;
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });

    table.on("click","tbody tr .show-sale",function(){
        let newWindow = '';
        var print_type = $(this).attr("data-print_type");
        const sale_id = $(this).attr("data-id");
        if(Number(print_type) == 1){
             newWindow = open("print_invoice/" + sale_id, 'Print Invoice', 'width=450,height=550');
        }else{
             newWindow = open("print_bill/" + sale_id, 'Print Bill', 'width=450,height=550');
        }
    
        newWindow.focus();
    
        newWindow.onload = function () {
            newWindow.document.body.insertAdjacentHTML('afterbegin');
        };
    });


    $('#filter_sales').on('change', function () {

       var filter_sales = $('#filter_sales').val();

       if (filter_sales == 'date') {
           $('#filter_by_date').removeClass('hide');
           $('#filter_by_order_type').addClass('hide');
            $('#filter_by_total_paid').addClass('hide');
            $('#filter_by_payment').addClass('hide');
            enable_filter_submit();
        } 
        else if(filter_sales == 'order type'){
            $('#filter_by_order_type').removeClass('hide');
            $('#filter_by_date').addClass('hide');
            $('#filter_by_total_paid').addClass('hide');
            $('#filter_by_payment').addClass('hide');
            enable_filter_submit();   
        }
        else if(filter_sales == 'total paid'){
            $('#filter_by_total_paid').removeClass('hide');
            $('#filter_by_order_type').addClass('hide');
            $('#filter_by_payment').addClass('hide');
            $('#filter_by_date').addClass('hide');
            enable_filter_submit();   
        }
        else if(filter_sales == 'payment method'){
            $('#filter_by_payment').removeClass('hide');
            $('#filter_by_date').addClass('hide');
            $('#filter_by_order_type').addClass('hide');
            $('#filter_by_total_paid').addClass('hide');
            enable_filter_submit();   
        }
    });

    $('#filter_by_date').on('change', function () {
        enable_filter_submit();
    });

    $('#filter_by_order_type').on('change', function () {
        enable_filter_submit();
    });
    $('#filter_by_total_paid').on('change', function () {
        enable_filter_submit();
    });

    $('#filter_by_payment').on('change', function () {
        enable_filter_submit();
    });

    enable_filter_submit();

    function enable_filter_submit() {
        var filter_sales = $('#filter_sales').val();

        if (filter_sales == '') {

            $('#filter_sales_submit').attr('disabled', 'disabled');

        }
        else if (filter_sales == 'date') {

            var filter_by_date =  $('#filter_by_date').val();
            if (filter_by_date == '') {
                $('#filter_sales_submit').attr('disabled', 'disabled');
            }else{
                $('#filter_sales_submit').removeAttr('disabled');
            };

        }
        else if (filter_sales == 'order type') {

            var filter_by_order_type =  $('#filter_by_order_type').val();
            if (filter_by_order_type == '') {
                $('#filter_sales_submit').attr('disabled', 'disabled');
            }else{
                $('#filter_sales_submit').removeAttr('disabled');
            };
        }
        else if (filter_sales == 'total paid') {

            var filter_by_total_paid =  $('#filter_by_total_paid').val();
            if (filter_by_total_paid == '') {
                $('#filter_sales_submit').attr('disabled', 'disabled');
            }else{
                $('#filter_sales_submit').removeAttr('disabled');
            };
        }
        else if (filter_sales == 'payment method') {

            var filter_by_payment =  $('#filter_by_payment').val();
            if (filter_by_payment == '') {
                $('#filter_sales_submit').attr('disabled', 'disabled');
            }else{
                $('#filter_sales_submit').removeAttr('disabled');
            };
        }
        
    }
    $('#filter_sales_form').on('submit', function (e) {
        e.preventDefault();
        var filter_sales = $('#filter_sales').val();
        var filter_by_date =  $('#filter_by_date').val();
        var filter_by_order_type =  $('#filter_by_order_type').val();
        var filter_by_total_paid =  $('#filter_by_total_paid').val();
        var filter_by_payment =  $('#filter_by_payment').val();

        // alert('filter_sales:'+filter_sales);
        // alert('filter_by_date:'+filter_by_date);
        // alert('filter_by_order_type:'+filter_by_order_type);
        // alert('filter_by_total_paid:'+filter_by_total_paid);
        // alert('filter_by_payment:'+filter_by_payment);

        $('#datatable').DataTable().destroy();
        fill_datatable(filter_sales , filter_by_date , filter_by_order_type, filter_by_total_paid, filter_by_payment)

    });
    



});
