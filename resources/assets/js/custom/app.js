"use strict";

// material icon init
feather.replace()

var window_height = $(window).height();
var main_header_height = $('.main-header').height();
var user_panel_height = $('.user-panel').height();
var left_menu_height_should_be = (parseFloat(window_height)-(parseFloat(main_header_height)+parseFloat(user_panel_height))).toFixed(2);
left_menu_height_should_be = (parseFloat(left_menu_height_should_be)-parseFloat(60)).toFixed(2);
