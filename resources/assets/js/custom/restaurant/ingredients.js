$(document).ready(function () {
    "use strict";

    $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            },
            {
                extend: 'excelHtml5', // This is Export Type
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7] // which columns you need to export [just set the index number]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                }
            },
        ]
    });

    $('.delete-ingredient').on('click', function () {
        Swal.fire({
            icon: 'error',
            title: 'Are you sure?',
            text: 'You want to delete.',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const id = $(this).attr("data-id");
                const requestUrl = "ingredients/" + id + "/delete";
                window.location.href = requestUrl;
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
    })
});
