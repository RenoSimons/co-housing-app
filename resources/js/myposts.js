import { showResponseMsg } from "./showResponseMsg";
import { in_production } from "./app";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

//MY APPLICATION
$('#my-application-btn').click( function() {
    console.log('lcik')
    $('#edit-application-modal').modal('toggle');
});

let ageIsFilled = true;
let dateIsFilled = true;
let introIsFilled = true;

$('#save-edit-application').click( function(e) {
    if ($('#age-input-edit-application').val().length == 0) {
        $('#age-input-edit-application').addClass('red-border');
        $('#age-input-edit-application').attr('placeholder', 'Dit is een verplicht veld');
        ageIsFilled = false;
    }
    if ($('#date-input-edit-application').val().length == 0) {
        $('#date-input-edit-application').addClass('red-border');
        $('#date-input-edit-application').attr('placeholder', 'Dit is een verplicht veld');
        dateIsFilled = false;
    }
    if ($('#edit-intro').val().length == 0) {
        $('#edit-intro').addClass('red-border');
        $('#edit-intro').attr('placeholder', 'Dit is een verplicht veld');
        introIsFilled = false;
    }

    if (ageIsFilled && dateIsFilled && introIsFilled) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/editpost' : '/editpost'),
            data: {
                location: $('#edit-location').children("option:selected").val(),
                type_building: $('#type_building').children("option:selected").val(),
                gender: $('#edit-gender').children("option:selected").val(),
                budget: $('#edit-budget').children("option:selected").val(),
                age: $('#age-input-edit-application').val(),
                start_date: $('#date-input-edit-application').val(),
                intro: $('#edit-intro').val(),
            },

            success: function (response) {
                $('#edit-application-modal').modal('toggle');
                // Show succes message
                showResponseMsg(response);

                setTimeout(function () {
                    window.location.reload();
                }, 2000);

            }
        })
    }
})
// DELETE MY APPLICATION OR COHOUSE POST
$('.delete-btn').click( function(e) {
    if ($(this).attr('id') == 'delete-application') {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/deletepost' : '/deletepost'), 
            data: {},

            success: function (response) {
            // Show succes message
            showResponseMsg(response);

            setTimeout(function () {
                window.location.reload();
            }, 2000);

            }
        })
    } else {
        let deleteId = $(this).attr('id').replace('delete-offer', '');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/deleteoffer' : '/deleteoffer'),
            data: {
                id: deleteId
            },

            success: function (response) {
            // Show succes message
            showResponseMsg(response);

            setTimeout(function () {
                window.location.reload();
            }, 2000);

            }
        })
    }
})

// EDIT MY COHOUSE OFFER POST
function scrollOnError(position) {
    $('.modal-body').scrollTop(position)
}

let modal_id = 0;
$('.edit-btn').click( function() {
    modal_id = $(this).attr('id');
    $('#edit-house-offer-modal' + modal_id).modal('toggle');
})

let fill1 = true;
let fill2 = true;
let fill3 = true;
let fill4 = true;
let fill5 = true;
let fill6 = true;
let fill7 = true;


$('.save-btn2').click( function(e) {
    let modal_id = $(this).attr('id').replace('save-btn-','');

    if ($('#intro-form1-' + modal_id).val().length == 0) {
        $('#intro-form1-' + modal_id).addClass('red-border');
        $('#intro-form1-' + modal_id).attr('placeholder', 'Dit is een verplicht veld');
        fill1 = false;
        scrollOnError(0)
    }

    if ($('#intro-form2-' + modal_id).val().length == 0) {
        $('#intro-form2-' + modal_id).addClass('red-border');
        $('#intro-form2-' + modal_id).attr('placeholder', 'Dit is een verplicht veld');
        fill2 = false;
        scrollOnError(100)
    }

    if ($('#intro-form3-' + modal_id).val().length == 0) {
        $('#intro-form3-' + modal_id).addClass('red-border');
        $('#intro-form3-' + modal_id).attr('placeholder', 'Dit is een verplicht veld');
        fill3 = false;
        scrollOnError(250)
    }

    if ($('#city-field' + modal_id).val().length == 0) {
        $('#city-field' + modal_id).addClass('red-border');
        $('#city-field' + modal_id).attr('placeholder', 'Dit is een verplicht veld');
        fill4 = false;
        scrollOnError(400)
    }

    if ($('#surface-field').val().length == 0) {
        $('#surface-field').addClass('red-border');
        $('#surface-field').attr('placeholder', 'Dit is een verplicht veld');
        fill5 = false;
        scrollOnError(500)
    }

    if ($('#budget-field').val().length == 0) {
        $('#budget-field').addClass('red-border');
        $('#budget-field').attr('placeholder', 'Dit is een verplicht veld');
        fill6 = false;
        scrollOnError(550)
    }

    if ($('#date-input-edit-application' + modal_id).val().length == 0) {
        $('#date-input-edit-application' + modal_id).addClass('red-border');
        $('#date-input-edit-application' + modal_id).attr('placeholder', 'Dit is een verplicht veld');
        fill7 = false;
        scrollOnError(1000)
    }

    if (fill1 == true && fill2 == true && fill3 == true && fill4 == true && fill5 == true && fill6 == true && fill7 == true) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/editoffer' : '/editoffer'), 
            data: {
                //Modal id is the same as post offer id
                id: modal_id,
                title: $('#intro-form1-' + modal_id).val(),
                province: $('.fc1').children("option:selected").val(),
                street: $('#city-field' + modal_id).val(),
                lat: $('#latitude_input' + modal_id).val(),
                long: $('#longitude_input' + modal_id).val(),
                type_house: $('.fc8').children("option:selected").val(),
                surface: $('#surface-field').val(),
                budget: $('#budget-field').val(),
                housemates: $('.fc2').children("option:selected").val(),
                start_date: $('#date-input-edit-application' + modal_id).val(),
                house_description: $('#intro-form2-' + modal_id).val(),
                housemates_description: $('#intro-form3-' + modal_id).val(),
                own_toilet: $('.fc3').children("option:selected").val(),
                shared_kitchen: $('.fc4').children("option:selected").val(),
                own_bathroom: $('.fc5').children("option:selected").val(),
                pets: $('.fc5').children("option:selected").val(),
                washing_machine: $('.fc6').children("option:selected").val(),
                wifi: $('.fc7').children("option:selected").val(),
            },

            success: function (response) {
            // Show succes message
            showResponseMsg(response);

            setTimeout(function () {
                window.location.reload();
            }, 2000);

            }
        })

        $('#edit-house-offer-modal' + modal_id).modal('toggle');
    }
})

