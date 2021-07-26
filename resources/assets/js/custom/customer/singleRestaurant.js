$(document).ready(function () {
    "use strict";
    var baseURL = getBaseURL();

    $(".shift-child").click(function (e) {
        e.preventDefault();
        $('.shift-child').removeClass('active');
        $(this).addClass('active');
    });

    $(".category-child").click(function (e) {
        e.preventDefault();
        $('.category-child').removeClass('active');
        $(this).addClass('active');
    });

    $('#tabs li').click(function (e) {
        e.preventDefault();
        $('#tabs li').removeClass('active');
        $(this).addClass('active');
        var tab = $(this).data('id');

        if (tab == 'menu_tab') {
            $('#tab li').css('display', 'none');
            $('#menu_left_content').css('display', '');
        }else if(tab == 'shift_tab'){
            $('#tab li').css('display', 'none');
            $('#shift_left_content').css('display', '');
        }else if(tab == 'reservation_tab'){
            $('#tab li').css('display', 'none');
            $('#reservation_left_content').css('display', '');
            $("#selected_tables").select2({
                placeholder: "Select Tables"
            });
        }



    });

    //for food menu modal show with data
    $('.menu-item').click(function (e) {
        e.preventDefault();
        //alert($(this).data('food_menu_id'))
        var food_menu_id = $(this).data('food_menu_id');

        //$('#foodMenuModal').modal('show');
        //$('#foodMenuModal').modal('hide');
        $.ajax({
            type: "GET",
            url: baseURL +'/get-food-meny-by-ajax',
            data: {
                food_menu_id : food_menu_id
            },
            dataType: "json",
            success: function (response) {
                //console.log(response);
                var food_menu = response.food_menu;
                //console.log(food_menu);
                var image_path = '';

                if(food_menu.photo !="" && food_menu.photo !=null){
                    image_path = baseURL+'/media/restaurant/photos/'+food_menu.photo;
                }else{
                    image_path = baseURL+'/assets/images/image_thumb.png';
                }

                $('#food_menu_image').prop('src', image_path)

                $('#foodMenuModal').modal('toggle');
                $('#food_menu_name').html(food_menu.name);
                $('#food_menu_description').html(food_menu.description);
                $('#take_away_price').html(food_menu.take_away_price);
                $('#delivery_price').html(food_menu.delivery_order_price);
                $('#food_menu_modifiers').html('');
                $('#food_menu_id').val(food_menu.id);


                $.each(food_menu.modifiers, function (index, modifier) {

                    var modifier_price = '';
                    if (modifier.price != 0) {
                        modifier_price = modifier.price;
                        modifier_price = '$'+modifier_price;
                    } else {
                        modifier_price = '';
                    }

                    var modifier_html = `<a id="modifire-${modifier.id}" class="btn btn-light m-1 modifier unselected" data-modifier_id="${modifier.id}">
                                            <span class="small">${modifier_price}</span><br>
                                            <span class="small">${modifier.name}</span>
                                        </a>`;
                    $('#food_menu_modifiers').append(modifier_html);
                });


            }
        });

    });

    //for edit cart food menu modal show with data
    $('.edit_item').click(function (e) {
        e.preventDefault();
        //alert($(this).data('food_menu_id'))
        var food_menu_id = $(this).data('food_menu_id');
        var qty = $('#item_qty').data('qty');

        //console.log($(this).data('modifiers'));
        var selected_modifiers = $(this).data('modifiers').toString().split(",");
        //console.log(selected_modifiers);
        //return false;


        //$('#foodMenuModal').modal('show');
        //$('#foodMenuModal').modal('hide');
        $.ajax({
            type: "GET",
            url: baseURL +'/get-food-meny-by-ajax',
            data: {
                food_menu_id : food_menu_id
            },
            dataType: "json",
            success: function (response) {
                //console.log(response);
                var food_menu = response.food_menu;
                //console.log(food_menu);
                var image_path = '';

                if(food_menu.photo !="" && food_menu.photo !=null){
                    image_path = baseURL+'/media/restaurant/photos/'+food_menu.photo;
                }else{
                    image_path = baseURL+'/assets/images/image_thumb.png';
                }

                $('#e_food_menu_image').prop('src', image_path)

                $('#editFoodMenuModal').modal('toggle');
                $('#e_food_menu_name').html(food_menu.name);
                $('#e_food_menu_description').html(food_menu.description);
                $('#e_take_away_price').html(food_menu.take_away_price);
                $('#e_delivery_price').html(food_menu.delivery_order_price);
                $('#e_food_menu_modifiers').html('');
                $('#e_food_menu_id').val(food_menu.id);
                $('#e_food_menu_qty').val(qty);


                $.each(food_menu.modifiers, function (index, modifier) {

                    var modifier_price = '';
                    if (modifier.price != 0) {
                        modifier_price = modifier.price;
                        modifier_price = '$'+modifier_price;
                    } else {
                        modifier_price = '';
                    }


                    var selected_modifier_check = false;
                    $.each(selected_modifiers, function (indexInArray, selected_modifier) {
                        if (selected_modifier == modifier.id) {
                            selected_modifier_check = true;
                        }
                    });
                    var modifier_html = '';
                    if (selected_modifier_check == true) {

                        modifier_html = `<a id="modifire-${modifier.id}" class="btn btn-light m-1 modifier selected" data-modifier_id="${modifier.id}">
                                                <span class="small">${modifier_price}</span><br>
                                                <span class="small">${modifier.name}</span>
                                            </a>`;
                    } else {

                        modifier_html = `<a id="modifire-${modifier.id}" class="btn btn-light m-1 modifier unselected" data-modifier_id="${modifier.id}">
                                                <span class="small">${modifier_price}</span><br>
                                                <span class="small">${modifier.name}</span>
                                            </a>`;

                    }

                    $('#e_food_menu_modifiers').append(modifier_html);
                });


            }
        });

    });

    //for quantity input field with increasing and decreasing button
    $('.btn-number').click(function(e){
        e.preventDefault();

        var fieldName = $(this).attr('data-field');
        var type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        var minValue =  parseInt($(this).attr('min'));
        var maxValue =  parseInt($(this).attr('max'));
        var valueCurrent = parseInt($(this).val());

        var name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });


    //for modifier selected/unselected status in add to cart modal
    $(document).on("click", "#food_menu_modifiers .modifier", function(e){
        e.preventDefault();
        //alert($(this).data('modifier_id'));
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $(this).addClass('unselected');
        }else{
            $(this).removeClass('unselected');
            $(this).addClass('selected');
        }
    });

    //for modifier selected/unselected status in edit modal
    $(document).on("click", "#e_food_menu_modifiers .modifier", function(e){
        e.preventDefault();
        //alert($(this).data('modifier_id'));
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
            $(this).addClass('unselected');
        }else{
            $(this).removeClass('unselected');
            $(this).addClass('selected');
        }
    });


    //for reset modal when it closed (add to cart modal)
    $('#foodMenuModal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        //alert('close');
    });

    //for reset modal when it closed (edit modal)
    $('#editFoodMenuModal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        //alert('close');
    });


    //for add to cart modal form submit
    $('#add_food_menu_to_cart').submit(function (e) {
        e.preventDefault();

        var selected_modifier  =     [];
        var food_menu_id    =   $('#add_food_menu_to_cart #food_menu_id').val();
        var food_menu_qty   =  $('#add_food_menu_to_cart #food_menu_qty').val();
        var  food_menu_restaurant_id = $('#food_menu_restaurant_id').val();
        var restaurant = $('#restaurant').data('restaurant_id');
        //alert([food_menu_restaurant_id, $('#restaurant').data('restaurant_id')]);

        $('#food_menu_modifiers .modifier').each(function (index, element) {
            // element == this
            //console.log($(this).data('modifier_id'));

            if ($(element).hasClass('selected')) {
                var modifier_id = $(this).data('modifier_id')
                selected_modifier.push(modifier_id);
            }

        });

        $.ajax({
            type: "POST",
            url: baseURL +'/add-to-cart-by-ajax',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                modifiers : selected_modifier,
                food_menu_id : food_menu_id,
                food_menu_qty : food_menu_qty,
                food_menu_restaurant_id : food_menu_restaurant_id,
                restaurant : restaurant
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });

        //console.log([selected_modifier, 'food menu:'+ food_menu_id, 'qty:' + food_menu_qty]);
        //$('#foodMenuModal').modal('hide');

    });

    //for edit to cart modal form submit
    $('#edit_food_menu_to_cart').submit(function (e) {
        e.preventDefault();

        var selected_modifier  =     [];
        var food_menu_id    =   $('#edit_food_menu_to_cart #e_food_menu_id').val();
        var food_menu_qty   =  $('#edit_food_menu_to_cart #e_food_menu_qty').val();
        var  food_menu_restaurant_id = $('#e_food_menu_restaurant_id').val();
        var restaurant = $('#restaurant').data('restaurant_id');
        //alert([food_menu_restaurant_id, $('#restaurant').data('restaurant_id')]);

        $('#e_food_menu_modifiers .modifier').each(function (index, element) {
            // element == this
            //console.log($(this).data('modifier_id'));

            if ($(element).hasClass('selected')) {
                var modifier_id = $(this).data('modifier_id')
                selected_modifier.push(modifier_id);
            }

        });

        // console.log([selected_modifier, food_menu_id, food_menu_qty, food_menu_restaurant_id]);
        // return false;
        $.ajax({
            type: "POST",
            url: baseURL +'/edit-to-cart-by-ajax',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                modifiers : selected_modifier,
                food_menu_id : food_menu_id,
                food_menu_qty : food_menu_qty,
                food_menu_restaurant_id : food_menu_restaurant_id,
                restaurant : restaurant
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });

        //console.log([selected_modifier, 'food menu:'+ food_menu_id, 'qty:' + food_menu_qty]);
        //$('#foodMenuModal').modal('hide');

    });

    //for add to cart modal form submit
    $('.delete_item').on('click',function (e) {
        e.preventDefault();
        var food_menu_id    =   $(this).data('food_menu_id');


        $.ajax({
            type: "POST",
            url: baseURL +'/delete-from-cart-by-ajax',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                food_menu_id : food_menu_id,
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                location.reload();
            }
        });

    });

    //for add to cart modal form submit
    $('#loginByAjaxForm').submit(function (e) {
        e.preventDefault();
        //console.log(baseURL);
        //return;

        var email_phone    =   $('#email_phone').val();
        var password   =  $('#password').val();
        if (email_phone != '' && password != '') {
            $.ajax({
                type: "POST",
                url: baseURL +'/customer/login-by-ajax',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    email_phone : email_phone,
                    password : password,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    if (response.success) {
                        location.reload();
                    }
                    if (response.error) {
                        alert(response.error);
                    }
                }
            });
        } else {
            alert('email_phone and password required');
        }


        //console.log([selected_modifier, 'food menu:'+ food_menu_id, 'qty:' + food_menu_qty]);
        //$('#foodMenuModal').modal('hide');

    });

    //for change delivery option
    $('#delivery_option').change(function (e) {
        e.preventDefault();
        var delivery_option = '';
        var order_type = $(this).val();

        if (order_type == 2) {
            delivery_option = 'dine_in';
        }
        else if(order_type == 4){
            delivery_option = 'take_away';
        }
        else if(order_type == 3){
            delivery_option = 'delivery';
        }


        $.ajax({
            type: "post",
            url: baseURL+'/set-delivery-option-by-ajax',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                delivery_option : delivery_option
            },
            dataType: "json",
            success: function (response) {
                //console.log(response);
                if (response.success) {
                    location.reload();
                    //alert(response.success);
                }
            }
        });


    });


    $('#select_floor').on('change', function () {
        if ($(this).val() !== '') {
            $.ajax({
                url: baseURL + "/show-floor-with-tables-ajax",
                method: "GET",
                data:{
                    floor_id: $(this).val()
                },
                success: function (data) {
                    var floor = '';
                    var floor_tables = '';
                    var canvas = '';

                    floor = data.floor;
                    floor_tables = JSON.stringify(data.floorTables);

                    $('#canvas_container').html('');

                        canvas += '<canvas id="floor_design" width="800" height="400" >';
                        canvas += '</canvas>';

                    $('#canvas_container').append(canvas);

                    $('#floor_design').attr('data-position', floor.position_array );
                    $('#floor_design').attr('data-floor_tables', floor_tables );

                    floor_tables   = $('#floor_design').data('floor_tables');

                    //for draw floor design
                    drawFloor(JSON.parse(floor.position_array));
                    //for draw floor design
                    drawTables(floor_tables);

                    var table_details = floor_tables;


                },
                error: function (data) {

                    $('#canvas_container').html('');
                    var canvas = '';
                    canvas += '<canvas id="floor_design" width="800" height="400" >';
                        canvas += '</canvas>';

                    $('#canvas_container').append(canvas);
                    $('#selected_table').val(0);
                    alert(data);
                }

            });

        }else{
            $('#canvas_container').html('');
            var canvas = '';
            canvas += '<canvas id="floor_design" width="800" height="400" >';
                canvas += '</canvas>';

            $('#canvas_container').append(canvas);
            $('#selected_table').val(0);
            // $('#table').html('');
        }

    });


    	//function for draw floor
        function drawFloor(positionArrray){
            var $p = $('#floor_design');
            var lineColor = '#333';
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
        //function for draw table
        function drawTables(floor_tables){
            $.each(floor_tables, function( key, floor_table ) {

                if (floor_table.table_type == 'rectangular') {
                    ractangularTable(floor_table.width, floor_table.height, floor_table.guest_count, floor_table.id, floor_table.position, floor_table.name);
                }else if(floor_table.table_type == 'round'){
                    roundTable(floor_table.width, floor_table.height, floor_table.guest_count, floor_table.id, floor_table.position, floor_table.name);
                }
            });
        }

        // function tableSelect(id){
        // 	alert(id);
        // 	$('#selected_table').val(id);
        // }


        // for rectangle shap
        function ractangularTable(width, height, guest_count, id, position, name){

            var $p = $('#floor_design');
            var lineColor = '#333';
            if (position == null) {
                position = {"x":200, "y":200};
            }else{
                position = JSON.parse(position);
            }

            $p.drawRect({
                // fillStyle: '#989898',
                groups: [id, 'table'],
                strokeStyle: lineColor,
                layer: true,
                x: position.x, y: position.y,
                width: width,
                height: height,
                type: 'rectangle',
                click: function(layer) {
                    // Click table to select

                    $(this).animateLayerGroup('table', {
                            fillStyle: 'transparent',
                    });
                    $(this).animateLayer(layer, {
                        fillStyle: '#989898',
                    });

                    // tableSelect(id);
                    $('#selected_table').val(id);
                }

            }).drawText({
                layer: true,
                groups: [id],
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
                $p.drawArc({
                    layer: true,
                    groups: [id],
                    // dragGroups: [id],
                    // draggable: true,
                    fillStyle: 'yellow',
                    x: new_x, y: new_y,
                    radius: 5
                });
            }
        };


        // for round shap
        function roundTable(width, height, guest_count, id, position, name){
            var $p = $('#floor_design');
            var lineColor = '#333';
            if (position == null) {
                position = {"x":150, "y":150};
            }else{
                position = JSON.parse(position);
            }
            $p.drawEllipse({
                // fillStyle: '#989898',
                groups: [id, 'table'],
                strokeStyle: lineColor,
                layer: true,
                x: position.x, y: position.y,
                width: width,
                height: height,
                click: function(layer) {
                    // Click table to select
                    $(this).animateLayerGroup('table', {
                        fillStyle: 'transparent',
                    });
                    $(this).animateLayer(layer, {
                        fillStyle: '#989898',
                    });
                    $('#selected_table').val(id);
                }
            }).drawText({
                layer: true,
                groups: [id],
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
                $p.drawArc({
                    layer: true,
                    groups: [id],
                    // dragGroups: [id],
                    // draggable: true,
                    fillStyle: 'yellow',
                    x: new_x, y: new_y,
                    radius: 5
                });
            }
        };






});
