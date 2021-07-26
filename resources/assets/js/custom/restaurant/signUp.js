"use strict";

function getStatesByCountry(id) {
    let baseURL = getBaseURL()
    const requestUrl = baseURL + "/api/restaurant/get-states/" + id + "/country";

    $.ajax({
        type: "GET",
        url: requestUrl,
        success: function (response) {
            // console.log(response)
            if (response.success) {
                console.log(response)
                placeStatesToSelect2(response.data)
            }
        }
    });
}

function getCitiesByState(id) {
    let baseURL = getBaseURL()
    const requestUrl = baseURL + "/api/restaurant/get-cities/" + id + "/state";

    $.ajax({
        type: "GET",
        url: requestUrl,
        success: function (response) {
            // console.log(response)
            if (response.success) {
                console.log(response)
                placeCitiesToSelect2(response.data)
            }
        }
    });
}

function placeStatesToSelect2(states) {
    states.map((element) => {
        let newOption = new Option(element.name, element.id, false, false);
        $('#state').append(newOption).trigger('change');
        //$('#editCustomer1 #state').append(newOption).trigger('change');
    })
}

function placeCitiesToSelect2(cities) {
    cities.map((element) => {
        let newOption = new Option(element.name, element.id, false, false);
        $('#city').append(newOption).trigger('change');
    })
}

$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    $('#ppCheckBox').click(function() {
        if ($(this).is(':checked')) {
            $('#sign-up-button').removeAttr('disabled');
            $('#sign-up-button').removeClass('disabled-btn-bg');
        } else {
            $('#sign-up-button').attr('disabled', 'disabled');
            $('#sign-up-button').addClass('disabled-btn-bg');
        }
    });

    $('a[href$="#ppModal"]').on("click", function () {
        $('#ppModal').modal('show');
    });

    $('#country').on('change', function () {
        if ($('#country').val()) {
            $('#state').html('').select2({data: [{id: '', text: 'Select a State'}]});
            getStatesByCountry($('#country').val())
        }
    })

    $('#state').on('change', function () {
        if ($('#state').val()) {
            $('#city').html('').select2({data: [{id: '', text: 'Select a City'}]});
            getCitiesByState($('#state').val())
        }
    })


})
