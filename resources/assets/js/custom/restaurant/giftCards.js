$(document).ready(function () {
    "use strict";
    var table;
    var baseURL = getBaseURL();


    fill_datatable();

    function fill_datatable()
    {
        table = $('#datatable').DataTable({

            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            processing: true,
            serverSide: true,
            ajax: {
                type:'GET',
                url: baseURL +'/restaurant/gift-card',
                data:{}
            },
            columns: [

                {data: 'card_no', name: 'Card no', orderable: true, searchable: true},
                {data: 'value', name: 'Value', orderable: true, searchable: true},
                {data: 'balance', name: 'Balance', orderable: true, searchable: true},
                {data: 'expiry_date', name: 'Expiry Date', orderable: true, searchable: true},
                {data: 'customer', name: 'Customer', orderable: true, searchable: true},
                // {data: 'added_by', name: 'Added By', orderable: true, searchable: true},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],

            dom: 'lBrtip',
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

    table.on("click","tbody tr .delete-giftCard",function(){
        Swal.fire({
            icon: 'error',
            title: 'Are you sure?',
            text: 'You want to delete.',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const id = $(this).attr("data-id");
                const requestUrl = "gift-card/" + id + "/delete";
                window.location.href = requestUrl;
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    });

    table.on("click","tbody tr .show-giftCard",function(){
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

});
