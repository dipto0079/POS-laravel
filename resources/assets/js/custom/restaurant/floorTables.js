
$(document).ready(function () {
    "use strict";
    var baseURL = getBaseURL();

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

    $('.delete-floors-table').on('click', function () {
        
        Swal.fire({
            icon: 'error',
            title: 'Are you sure?',
            text: 'You want to delete.',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            showLoaderOnConfirm: true,
            preConfirm: () => {
                const id = $(this).attr("data-id");
                const requestUrl = baseURL+"/restaurant/sale/floor-tables/" + id + "/delete";
                window.location.href = requestUrl;
            },
            allowOutsideClick: () => !Swal.isLoading()
        });
    });

        // Store the canvas object into a variable
        var $myCanvas       = $('#myCanvas');
        var $floorTable     = $('#floorTable');
        var $position_array = $('#myCanvas').data('position');
        var $floor_tables   = $('#myCanvas').data('floor_tables'); 
        var baseURL = getBaseURL();

        
          
        //Current line color
        var lineColor = '#333';
    
        //for draw floor design
        drawFloor($position_array); 
        //for draw table
        drawTables($floor_tables);
    
        // function for draw tables
        function drawTables(floor_tables){
            $.each(floor_tables, function( key, floor_table ) {
    
                if (floor_table.table_type == 'rectangular') {
                    ractangularTable(floor_table.width, floor_table.height, floor_table.guest_count, floor_table.id, floor_table.position, floor_table.name);
                }else if(floor_table.table_type == 'round'){
                    roundTable(floor_table.width, floor_table.height, floor_table.guest_count, floor_table.id, floor_table.position, floor_table.name);
                }
            });
        }
    
        //for change position
    
        function changePosition(x, y, id){
            var position = {x: x, y:y};
    
            $.ajax({
                type: 'GET',
                // url:'{{route("floor-tables.index")}}',
                url: baseURL +'/restaurant/sale/floor-tables',
                data: {
                    'position': JSON.stringify(position),
                    'table_id'  : id
                },
                dataType: "json",
                success: function(data){
                    
                        if (data.success) {
                            toastr.success(data.success);
                            // location.reload();
                        }
                }
            });
    
        }
    
    
        //function for draw floor
        function drawFloor(positionArray){
            var $p = $myCanvas;
            $.each( positionArray, function( key, value ) {
    
                if ( key < positionArray.length -1 ) {
                    $p.drawLine({
                        strokeStyle: lineColor,
                        strokeWidth: 8,
                        rounded: true,
                        strokeJoin: 'round',
                        strokeCap: 'round',
                        layer: true,
                        x1: positionArray[key].x,
                        y1: positionArray[key].y,
                        x2: positionArray[key+1].x,
                        y2: positionArray[key+1].y
                    })
                }
                
            });
            
        }
    
        //submit the floors_table for add table to the floor
        $('#floors_table').on('submit', function(e){
            e.preventDefault();
    
            var name = $("#name").val();
            var guest_count = $("#guest_count").val();
            var width = $("#width").val();
            var height = $("#height").val();
            var table_type = $("#table_type").val();
            var waiter_id = $("#waiter_id").val();
            var floor_id = $("#floor_id").val();
            var error = false;
    
    
            if(name==""){
                $("#name_err_msg").text("Name field required");
                $(".name_err_msg_contnr").show(200);
                error = true;
            }
            if(guest_count==""){
                $("#guest_count_err_msg").text("guest_count field required");
                $(".guest_count_err_msg_contnr").show(200);
                error = true;
            }
            if(width==""){
                $("#width_err_msg").text("width field required");
                $(".width_err_msg_contnr").show(200);
                error = true;
            }
            if(height==""){
                $("#height_err_msg").text("height field required");
                $(".height_err_msg_contnr").show(200);
                error = true;
            }
            if(table_type==""){
                $("#table_type_err_msg").text("table_type field required");
                $(".table_type_err_msg_contnr").show(200);
                error = true;
            }
            //this field was remove from the system
            // if(waiter_id==""){
            //     $("#waiter_id_err_msg").text("waiter_id field required");
            //     $(".waiter_id_err_msg_contnr").show(200);
            //     error = true;
            // }
            // if(error == true){
            //     return false;
            // }
    
            if (error ==false) {
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: {
                        '_token'     : $('input[name=_token]').val(),
                        'name'       : name,
                        'guest_count': guest_count,
                        'width'      : width,
                        'height'     : height,
                        'table_type' : table_type,
                        'waiter_id'  : waiter_id,
                        'floor_id'   : floor_id
                    },
                    success: function(data){
    
                        if (data.success) {
                            toastr.success(data.success);
        
                            if (data.floorTable.table_type == 'rectangular') {
                                ractangularTable(data.floorTable.width, data.floorTable.height, data.floorTable.guest_count, data.floorTable.id);
                            }else if(data.floorTable.table_type == 'round'){
                                roundTable(data.floorTable.width, data.floorTable.height, data.floorTable.guest_count, data.floorTable.id);
                            }
        
                            $('#floors_table').trigger("reset");
                            location.reload();
                        }
    
                    }
                });
            }
        })
    
        function ractangularTable(width, height, guest_count, id, position, name){
            if (position == null) {
                position = {"x":200, "y":200};
            }else{
                position = JSON.parse(position);
            }
    
            $myCanvas.drawRect({
                groups: [id],
                dragGroups: [id],
                fillStyle: '#989898',
                strokeStyle: lineColor,
                layer: true,
                draggable: true,
                x: position.x, y: position.y,
                fromCenter: true,
                width: width,
                height: height,
                dragstart: function() {
                    // code to run when dragging starts
                },
                drag: function(layer) {
                    // code to run as layer is being dragged
                },
                dragstop: function(layer) {
    
                   return changePosition(layer.x, layer.y, id);
                    
                }
            }).drawText({
                layer: true,
                groups: [id],
                dragGroups: [id],
                fillStyle: '#fffff',
                bringToFront: true,
                strokeWidth: 2,
                x: position.x, y: position.y,
                fontSize: '12pt',
                fontFamily: 'Verdana, sans-serif',
                text: name
              })
    
            //for draw seat
            var angle_defference = 360/guest_count;
            var radius = width-((width*42)/100);
            if (height > width) {
                radius = height-((height*40)/100);
            };
    
            for (var i = 0; i < guest_count; i++) {
                var angle = i* angle_defference
                angle = angle * ( Math.PI / 180 ); // Convert from Degrees to Radians
                const new_x = position.x + radius * Math.cos(angle);
                const new_y = position.y + radius * Math.sin(angle);
                
                //for draw seat
                $myCanvas.drawArc({
                    layer: true,
                    groups: [id],
                    dragGroups: [id],
                    draggable: true,
                    fillStyle: 'yellow',
                    x: new_x, y: new_y,
                    radius: 5
                });
            }
            
    
    
        };
    
    
        function roundTable(width, height, guest_count, id, position, name){
            if (position == null) {
                position = {"x":150, "y":150};
            }else{
                position = JSON.parse(position);
            }
            $myCanvas.drawEllipse({
                fillStyle: '#989898',
                strokeStyle: lineColor,
                groups: [id],
                dragGroups: [id],
                layer: true,
                draggable: true,
                fromCenter: true,
                x: position.x, y: position.y,
                width: width,
                height: height,
                dragstart: function() {
                    // code to run when dragging starts
                },
                drag: function(layer) {
                    // code to run as layer is being dragged
                },
                dragstop: function(layer) {
                    return changePosition(layer.x, layer.y, id);
                }
            }).drawText({
                layer: true,
                groups: [id],
                dragGroups: [id],
                fillStyle: '#fffff',
                bringToFront: true,
                strokeWidth: 2,
                x: position.x, y: position.y,
                fontSize: '12pt',
                fontFamily: 'Verdana, sans-serif',
                text: name
              })
    
            //for draw seat
            var angle_defference = 360/guest_count;
            var radius = width-((width*40)/100);
            if (height > width) {
                radius = height-((height*50)/100);
            };
    
            for (var i = 0; i < guest_count; i++) {
                var angle = i* angle_defference
                angle = angle * ( Math.PI / 180 ); // Convert from Degrees to Radians
                const new_x = position.x + radius * Math.cos(angle);
                const new_y = position.y + radius * Math.sin(angle);
                
                //for draw seat
                $myCanvas.drawArc({
                    layer: true,
                    groups: [id],
                    dragGroups: [id],
                    draggable: true,
                    fillStyle: 'yellow',
                    x: new_x, y: new_y,
                    radius: 5
                });
            }
    
    
        };

});