$(document).ready(function(){
    function reloadPage() {
        location.reload()
    }

	$("#addSupplier").click(function(){
		var name = $('input[name=name]').val();
		var contact_person = $('input[name=contact_person]').val();
		var phone = $('input[name=phone]').val();
		var emailAddress = $('input[name=emailAddress]').val();
		var supAddress = $('textarea[name=supAddress]').val();
		var description = $('textarea[name=description]').val();
		var error = 0;
		if(name == '') {
			error = 1;
            var cl1 = ".supplier_err_msg";
            var cl2 = ".supplier_err_msg_contnr";
            $(cl1).text("The Supplier Name field is required!");
            $(cl2).show(200).delay(6000).hide(200,function(){
            });
		} else {
			$('input[name=name]').css('border', '1px solid #ccc');
		}
		if(contact_person == '') {
			error = 1;
            var cl1 = ".customer_err_msg";
            var cl2 = ".customer_err_msg_contnr";
            $(cl1).text("The Contact Person field is required!");
            $(cl2).show(200).delay(6000).hide(200,function(){
            });
		} else {
			$('input[name=contact_person]').css('border', '1px solid #ccc');
		}
		if(phone == '') {
            error = 1;
            var cl1 = ".customer_phone_err_msg";
            var cl2 = ".customer_phone_err_msg_contnr";
            $(cl1).text("The phone No field is required!");
            $(cl2).show(200).delay(6000).hide(200,function(){
            });
		} else {
			$('input[name=phone]').css('border', '1px solid #ccc');
		}
		if(error == 0) {
            var token = $("meta[name='csrf-token']").attr("content");
            let _url = window.location.href;
            let res = _url.split("/");
            let baseURL = res[0] + "//" + res[2] + "/" + res[3];
            const requestUrl = baseURL + "/restaurant/purchase/purchases/supplier/create";
            $.ajax({
                type: "POST",
                url: requestUrl,
                data: {
                    name:name,
                    contact_person:contact_person,
                    phone:phone,
                    emailAddress:emailAddress,
                    supAddress:supAddress,
                    description:description,
                    _token: token
                },
                success: function (result) {
                    // console.log(result)
                    if (result.success) {
                        $('#flash-msg').html('<div class="alert alert-success alert-dismissible fade_custom show" role="alert">\n' +
                            '                <strong style="color: black">' + result.msg + '</strong>\n' +
                            '                <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                            '                    <span aria-hidden="true">&times;</span>\n' +
                            '                </button>\n' +
                            '            </div>');
                        window.setTimeout(reloadPage, 2000)
                    }
                }
            });
		}

	});

});



/////////////////////////////////////////////////
/////////////////ADDING FIELD
///////////////////////////////////////////////



