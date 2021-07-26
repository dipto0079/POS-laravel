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

        .controls-wrapper {
            background-color: #222;
            color: white;
            padding: 0.5em;
            font-size: 1.5em;
            position: relative;
        }

        .line-width-value {
            display: inline-block;
            margin-right: 0.5em;
            margin-left: 0.5em;
            width: 50px;
            text-align: center;
        }

        .line-width-control {
            background-color: #444;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            height: 30px;
            margin-left: 0.3em;
            margin-right: 0.3em;
            font-size: 1em;
            font-weight: 700;
            line-height: 30px;
            text-align: center;
            width: 30px;
            transition: background-color 0.3s linear;
            user-selct: none;
        }

        .line-width-control:hover,
        .line-width-control:focus {
            background-color: #222;
        }

        .colors-btn,
        .clear-btn {
            margin-left: 1.5em;
            padding: 0.5em;
            background-color: #444;
            color: white;
            font-size: 0.7em;
            border: 1px solid white;
            border-radius: 5px;
            text-transform: uppercase;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s linear;
        }

        .clear-btn {
            border-color: #333;
            padding: 0.6em;
            font-size: 1.2em;
        }

        .colors-btn:hover,
        .colors-btn:focus,
        .clear-btn:hover,
        .clear-btn:focus {
            background-color: #222;
        }

        .colors-wrapper {
            background-color: #222;
            position: absolute;
            top: 0;
            right: 0;
            max-width: 250px;
            padding: 0.5em 1em;
            box-shadow: -2px 2px 1px rgba(0, 0, 0, 0.8);
            transform: translateY(-100px);
            visibility: hidden;
            opacity: 0;
            transition: transform 0.3s linear, visibility 0.3s linear, opacity 0.3s linear;
        }

        .colors-wrapper.is-visible {
            visibility: visible;
            opacity: 1;
            transform: translateY(0px);
        }

        .close-btn {
            display: inline-block;
            float: right;
            height: 40px;
            width: 40px;
            text-align: center;
            font-size: 20px;
            line-height: 40px;
            border-radius: 50%;
            background-color: #444;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.8);
            cursor: pointer;
            transition: box-shadow 0.3s linear, background-color 0.3s linear;
        }

        .close-btn:hover,
        .close-btn:focus {
            box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
            background-color: #111;
        }

        .color {
            width: 50px;
            height: 50px;
            display: inline-block;
            margin: 0.4em 0.4em 0.3em 0;
            border-radius: 5px;
            cursor: pointer;
            outline: 2px solid transparent;
            transition: outline-color 0.3s linear, border-radius 0.3s linear;
        }

        .color:hover,
        .color:focus,
        .color.selected {
            outline-color: white;
            border-radius: 0;
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
                Add Floor
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <!-- form start -->
                        <form method="post" action="{{route('update.floors', [$floor->id])}}" id="floorDesign">
                            @csrf
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <!-- <canvas id="floor-canvas" width="600" height="300" style="border:1px solid #000000;">
                                                not showing anything
                                            </canvas> -->
                                            <div class="container">


                                                <canvas id="myCanvas" width="800" height="400">
                                                    <p>This is fallback content for users of assistive technologies or of browsers that don't have full support for the Canvas API.</p>
                                                </canvas>
                                                @if ($errors->has('positionArray'))
                                                    <div class="alert alert-error" style="padding: 5px !important;">
                                                        <p>{{ $errors->first('positionArray') }}</p>
                                                    </div>
                                                @endif

                                                <button id="clearBtn" class="btn btn-primary" type="button">Clear Canvas</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label>Name <span class="required_star">*</span></label>
                                            <input tabindex="1" type="text" name="name" class="form-control"
                                                   value="{{$floor->name}}">
                                        </div>

                                        @if ($errors->has('name'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('name') }}</p>
                                            </div>
                                        @endif

                                        <div class="form-group">
                                            <label>Description</label>
                                            <input tabindex="1" type="text" name="description" class="form-control"
                                                   value="{{$floor->description}}">
                                        </div>

                                        @if ($errors->has('description'))
                                            <div class="alert alert-error" style="padding: 5px !important;">
                                                <p>{{ $errors->first('description') }}</p>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input tabindex="1" type="hidden" name="positionArray" id="positionArray" required>
                                <button type="submit" name="submit" value="submit" class="btn btn-primary">submit
                                </button>
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
            var $floor_canvas = $('#floor-canvas');

            var $positionArrray = [];
            var $myCanvas = $('#myCanvas');
            var $offset = $myCanvas.offset();
            //Btn to clear all canvas surface
            var $clearBtn = $('#clearBtn');

            //Shows the current line width
//   var $lineWidthLabel = $('#lineWidthLabel');
            //Increase line width control
//   var $lineWidthUp = $('#lineWidthUp');
            //Decrease line width control
//   var $lineWidthDown = $('#lineWidthDown');
            //Numeric value of line width
            // var $lineWidthVal = parseInt($lineWidthLabel.text());
            var $lineWidthVal = parseInt(8);

            //Minimum value for the line width
            var lineWidthMin = 1;
            //Max value for the line width
            var lineWidthMax = 50;
            //Current line color
            var lineColor = '#333';

            var isMouseDown = false;
            var pos = {
                x: 0,
                y: 0
            };
            var lastPos = {
                x: 0,
                y: 0
            };

            //jCanvas drawLine() method
            function paintLine(x1, y1, x2, y2, paintWidth, paintColor) {

                // console.log(x1,y1,x2,y2);
                if (x1 == 0 && y1 == 0) {
                    $myCanvas.drawLine({
                        strokeStyle: paintColor,
                        strokeWidth: paintWidth,
                        rounded: true,
                        strokeJoin: 'round',
                        strokeCap: 'round',
                        x1: x2,
                        y1: y2,
                        x2: x2,
                        y2: y2
                    })

                }else{

                    $myCanvas.drawLine({
                        strokeStyle: paintColor,
                        strokeWidth: paintWidth,
                        rounded: true,
                        strokeJoin: 'round',
                        strokeCap: 'round',
                        x1: x1,
                        y1: y1,
                        x2: x2,
                        y2: y2
                    })


                }




            }


            //use jCanvas drawLine() method
            $myCanvas.on('click', function(e) {

                lastPos.x = pos.x;
                lastPos.y = pos.y;
                pos.x = e.pageX - $offset.left;
                pos.y = e.pageY - $offset.top;

                var position = {x: pos.x, y:pos.y};
                $positionArrray.push(position);

                console.log($positionArrray);

                paintLine(lastPos.x, lastPos.y, pos.x, pos.y, $lineWidthVal, lineColor);
            });

            //Clears all canvas surface
            $clearBtn.on('click', function() {
                $positionArrray =[];
                pos = { x: 0,y: 0};
                lastPos = {x: 0,y: 0};
                $myCanvas.clearCanvas();
            });

            $('#floorDesign').on('submit', function(){
                // e.preventDefault();
                $('#positionArray').val();
                $('#positionArray').val( JSON.stringify($positionArrray));

                // alert($(this).attr('action'));
                var name = $('input[name=name]').val();
                var description = $('input[name=description]').val();
                var error = false;

                if(name==""){
                    $("#name_err_msg").text("Name field required");
                    $(".name_err_msg_contnr").show(200);
                    error = true;
                }
                // else{
                //     $.ajax({
                //         type: 'POST',
                //         url: $(this).attr('action'),
                //         data: {
                //             '_token'        : $('input[name=_token]').val(),
                //             '_method'       : $('input[name=_method]').val(),
                //             'positionArrray': JSON.stringify($positionArrray),
                //             'name'          : name,
                //             'description'   : description
                //         },
                //         success: function(data){
                //           console.log(data);
                //         }
                //     });

                // }

            })



        });

    </script>


@endsection
