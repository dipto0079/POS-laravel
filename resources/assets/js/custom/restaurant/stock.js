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
                    columns: [0, 1, 2, 3, 4]
                }
            },
            {
                extend: 'excelHtml5', // This is Export Type
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] // which columns you need to export [just set the index number]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4]
                }
            },
        ]
    });

    

});
