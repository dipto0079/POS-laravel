"use strict";

$('#datatable').DataTable({
    dom: 'Bfrtip',
    buttons: [
        {
            extend: 'print',
            exportOptions:{
                columns:[0,1,2]
            }
        },
        {
            extend: 'excelHtml5', // This is Export Type
            exportOptions:{
                columns:[0,1,2] // which columns you need to export [just set the index number]
            }
        },
        {
            extend: 'pdfHtml5',
            exportOptions:{
                columns:[0,1,2]
            }
        },
    ]
});
