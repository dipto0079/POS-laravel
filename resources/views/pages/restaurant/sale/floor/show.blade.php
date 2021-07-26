@extends('layouts.app')

<?php
$baseURL = getBaseURL()
?>
@section('style')
    <style>
        canvas,
        img,
        figure {
        display: block;
        }

        .container {
        max-width: 800px;
        margin: 0 auto;
        }


        canvas {
        margin: 2em auto;
        max-width: 100%;
        outline: 2px solid #444;
        }

        .p {
        text-align: center;
        font-size: 14px;
        padding-top: 50px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Floor
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="#" id="floorDesign">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <!-- <canvas id="floor-canvas" width="600" height="300" style="border:1px solid #000000;">
                                                not showing anything
                                            </canvas> -->
                                            <div class="container">

                                                <canvas id="myCanvas" width="800" height="400" data-position="{{$floor->position_array}}" data-floor_tables={{$floorTables}}>
                                                    <p>This is fallback content for users of assistive technologies or of browsers that don't have full support for the Canvas API.</p>
                                                </canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <h3>Name</h3>
                                            <p class="">{{$floor->name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <h3>Description</h3>
                                            <p class="">{{$floor->description}}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <a href="{{route('floors.index')}}" role="button" class="btn btn-primary">Back
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('script')

<script src="{!! $baseURL.'assets/plugins/jcanvas/dist/jcanvas.js'!!}"></script>

<script>
$(document).ready(function () {
    "use strict";
    // Store the canvas object into a variable
    
    var $myCanvas = $('#myCanvas');
    var $position_array = $('#myCanvas').data('position');
    var $floor_tables   = $('#myCanvas').data('floor_tables'); 

    //Current line color
    var lineColor = '#333';
    var $offset = $myCanvas.offset();

    //for draw floor design
    drawFloor($position_array); 

    //for draw table
    drawTables($floor_tables);
    // function for draw tables
    function drawTables(floor_tables){
        $.each(floor_tables, function( key, floor_table ) {

            if (floor_table.table_type == 'rectangular') {
                ractangularTable(floor_table.width, floor_table.height, floor_table.guest_count, floor_table.id, floor_table.position);
            }else if(floor_table.table_type == 'round'){
                roundTable(floor_table.width, floor_table.height, floor_table.guest_count, floor_table.id, floor_table.position);
            }
        });
    }

    function ractangularTable(width, height, guest_count, id, position){
        if (position == null) {
            position = {"x":200, "y":200};
        }else{
            position = JSON.parse(position);
        }

        $myCanvas.drawRect({
            fillStyle: '#989898',
            strokeStyle: lineColor,
            layer: true,
            // draggable: true,
            x: position.x, y: position.y,
            // fromCenter: true,
            width: width,
            height: height,
            // dragstop: function(layer) {
            //    return changePosition(layer.x, layer.y, id);
            // }
        }).drawText({
            layer: true,
            fillStyle: '#fffff',
            bringToFront: true,
            strokeWidth: 2,
            x: position.x, y: position.y,
            fontSize: '12pt',
            fontFamily: 'Verdana, sans-serif',
            text: id
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

    function roundTable(width, height, guest_count, id, position){
        if (position == null) {
            position = {"x":150, "y":150};
        }else{
            position = JSON.parse(position);
        }
        $myCanvas.drawEllipse({
            fillStyle: '#989898',
            strokeStyle: lineColor,
            layer: true,
            // draggable: true,
            // fromCenter: true,
            x: position.x, y: position.y,
            width: width,
            height: height,
            // dragstop: function(layer) {
            //     return changePosition(layer.x, layer.y, id);
            // }
        }).drawText({
            layer: true,
            fillStyle: '#fffff',
            bringToFront: true,
            strokeWidth: 2,
            x: position.x, y: position.y,
            fontSize: '12pt',
            fontFamily: 'Verdana, sans-serif',
            text: id
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

    //for change position

    function changePosition(x, y, id){
        var position = {x: x, y:y};

        $.ajax({
            type: 'GET',
            url:'{{route("floor-tables.index")}}',
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
    function drawFloor(positionArrray){
        var $p = $myCanvas;
          $.each( positionArrray, function( key, value ) {

              if ( key < positionArrray.length-1) {
                  $p.drawLine({
                      strokeStyle: lineColor,
                      strokeWidth: 8,
                      rounded: true,
                      layer: true,
                      strokeJoin: 'round',
                      strokeCap: 'round',
                      x1: positionArrray[key].x,
                      y1: positionArrray[key].y,
                      x2: positionArrray[key+1].x,
                      y2: positionArrray[key+1].y
                  })
              }
          });
    }



});
    
</script>


@endsection
