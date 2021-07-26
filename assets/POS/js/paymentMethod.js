$(document).ready(function(){
    "use strict";

    $('#finalie_order_payment_method').on('change', function () {

        var payment_method = $('#finalie_order_payment_method').val();
        if (payment_method == "3" || payment_method == "gift card") {
              $('#gift_card').removeClass('hide');
              $('#payment_gift_card_no_modal_input').inputmask("9999-9999-9999");

              $('#payment_gift_card_no_modal_input').focus();
              $('#payment_gift_card_no_modal_input').css('border', '1px solid red');
              $('#finalize_order_button').attr('disabled', 'disabled');
        }else{

            $('#gift_card').addClass('hide');
            $('#finalize_order_button').removeAttr("disabled");
        }

    });
    $('#payment_gift_card_no_modal_input').keyup(function(e){
      //if the letter is not digit then display error and don't type anything
      if (e.which != 110 && !(e.which < 106 && e.which > 95) && e.which != 190 && e.which != 16 && e.which != 53 && e.which != 8 && e.which != 13 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        
        $(this).val('');
        
        $('#finalize_order_button').attr('disabled', 'disabled');
      }
    });
    
    $('#payment_gift_card_no_modal_input').keypress(function(e){

      if(e.keyCode == 13){

          var card_no = $('#payment_gift_card_no_modal_input').val();
          var sale_id = '';
          var paid_amount = '';
          var payment_method_type = '';

          $('#gift_card_checking_response').html('');

          if ($('.holder .order_details > .single_order[data-selected=selected]').length > 0) {
            sale_id = $('.holder .order_details .single_order[data-selected=selected]').attr('id').substr(6);
            payment_method_type = $('#finalie_order_payment_method').val();
            paid_amount = $('#pay_amount_invoice_input').val();
          } else {
            swal({
              title: warning + "!",
              text: 'Please select open order',
              confirmButtonText: ok,
              confirmButtonColor: '#b6d6f6'
            })
          }



          $.ajax({
            type: "GET",
            url: base_url + "restaurant/gift-card-check-by-ajax",
            data: {
              card_no : card_no,
              sale_id : sale_id,
              paid_amount : paid_amount,
              payment_method_type : payment_method_type
            },
            dataType: "Json",
            success: function (response) {

              // console.log(response);
              if(response.error){
                $('#gift_card_checking_response').append("Note: "+ response.error);
              }
              if (response.success) {
                $('#gift_card_checking_response').append("Gift Card: "+ response.success.giftCard.card_no + '<br> Balance: '+response.success.balance);
                $('#finalize_order_button').removeAttr("disabled");
              }
            }
          });

      }

    });

    

});