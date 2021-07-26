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
                Edit Floor
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


                        </form>
                        <div class="box-footer">
                            <a href="{{route('floors.update', [$floor->id])}}" role="button" class="btn btn-primary">Clear Canvas
                            </a>
                        </div>
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
