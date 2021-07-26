(function ($) {
    "use strict";

    $('a[href="#"]').attr('href', 'javascript:void(0)');
    /*
    * Init Scroll Animation
    * */
    AOS.init();

    /*
    * Click to Top
    * */
    let win = $(window);
    $('#toTop').on('click', function () {
        $('body,html').animate({
            scrollTop: 0
        }, 555)
    });

    /*
    * ToTop Button Show And Hide
    * */
    win.scroll(function () {
        if (win.scrollTop() > 400) {
            $('#toTop').addClass('active');
        } else {
            $('#toTop').removeClass('active');
        }
    });
    /*
       * Date Picket
       * */
    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d',
    });

    /*
    * Set Current Date
    * */
    let d = new Date();

    $('#RegistrationDate').val(d.toLocaleDateString());
    $('#RegistrationDateHidden').val(d.toLocaleDateString());
    $('#RegistrationDate2').val(d.toLocaleDateString());
    $('#onlyDate').val(d.toLocaleDateString());


    /*
    * Time Picker
    * */
    // $('#timeZoon').timepicker({});

    /*
    * Select Js
    * */
    $('#Language').select2();
    $('#emailType').select2();
    $('#fact').select2();
    $('#dateFormat').select2();
    $('#timeZone').select2();

    /*
    * summernote
    * */
    $('#aboutUsShort').summernote({
        placeholder: 'About Us (Short)',
        tabsize: 2,
        height: 90,
        toolbar: [
            ['font', ['bold', 'underline']],
        ]
    });
    $('#aboutUsLong').summernote({
        placeholder: 'About Us (Long)',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['font', ['bold', 'underline']],
        ]
    });

    /*
    * For Data Table
    * */
    $('.dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            // 'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });

    // data table export button
    $('.dt-buttons').find('button').addClass('c-btn btn-fill opacity-hover');
    $('body').on('click', '#fact', function () {
        if ($(this).val() == 1) {
            $('.setByMe').fadeIn(333);
        } else {
            $('.setByMe').fadeOut(333);
        }
        console.log($(this).val())
    });

})(jQuery)
