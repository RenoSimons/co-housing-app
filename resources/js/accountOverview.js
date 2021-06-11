import {showResponseMsg} from './showResponseMsg';

//Handle the save buttons state
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#toggle-profile').click(function() {
    let classNames = $(this).children().attr('class');
    let is_private_int = 1;

    if (classNames.includes('btn-success')) {
        is_private_int = 1
    } else {
        is_private_int = 0
    }

    $.ajax({
        type: 'POST',
        url: "https://co-housing-app-3i8mx.ondigitalocean.app/visibility",
        data: {
            is_private: is_private_int ,
        },

        success: function (response) {
            let message = "";
            if (response == 1) {
                message = "Je profiel is nu privé!";
            } else {
                message = "Je profiel is nu publiek!";
            }

            // Show succes message
            showResponseMsg(message);
        }
    })
})


$('#save-personal-details').click(function() {
    $.ajax({
        type: 'POST',
        url: "https://co-housing-app-3i8mx.ondigitalocean.app/updatedetails",
        data: {
            insta_link: $('#instaInput').val(),
            fb_link: $('#fbInput').val(),
            birthplace: $('#birthInput').val(),
        },

        success: function (response) {
            // Show succes message
            showResponseMsg(response);

            $('#save-personal-details').attr('disabled', 'true')

        }
    })
})


$('#save-intro').click(function() {
    $.ajax({
        type: 'POST',
        url: "https://co-housing-app-3i8mx.ondigitalocean.app/introtext",
        data: {
            intro_text: $('#intro-form4').val(),
        },

        success: function (response) {
            // Show succes message
            showResponseMsg(response);

            $('#save-intro').attr('disabled', 'true')

        }
    })
})

$('#save-hobbies').click(function() {
    $.ajax({
        type: 'POST',
        url: "https://co-housing-app-3i8mx.ondigitalocean.app/hobbies",
        data: {
            hobby_text: $('#hobby-form').val(),
        },

        success: function (response) {
            // Show succes message
            showResponseMsg(response);

            $('#save-hobbies').attr('disabled', 'true')

        }
    })
})


$('#save-status').click(function() {
    $.ajax({
        type: 'POST',
        url: "https://co-housing-app-3i8mx.ondigitalocean.app/status",
        data: {
            status: $('#status-form').val(),
        },

        success: function (response) {
            // Show succes message
            showResponseMsg(response);

            $('#save-status').attr('disabled', 'true')

        }
    })
})

// Event listeners disabled btns
$(function () {
    $('#instaInput').on('input', function () {
        if( $(this).val().length > 0) {
            $('#save-personal-details').removeAttr("disabled");
        } else {
            $('#save-personal-details').attr("disabled", "true");
        }
    });
});

$(function () {
    $('#fbInput').on('input', function () {
        if( $(this).val().length > 0) {
            $('#save-personal-details').removeAttr("disabled");
        } else {
            $('#save-personal-details').attr("disabled", "true");
        }
    });
});

$(function () {
    $('#birthInput').on('input', function () {
        if( $(this).val().length > 0) {
            $('#save-personal-details').removeAttr("disabled");
        } else {
            $('#save-personal-details').attr("disabled", "true");
        }
    });
});

$(function () {
    $('#intro-form4').on('input', function () {
        if( $(this).val().length > 0) {
            $('#save-intro').removeAttr("disabled");
        } else {
            $('#save-intro').attr("disabled", "true");
        }
    });
});

$(function () {
    $('#hobby-form').on('input', function () {
        if( $(this).val().length > 0) {
            $('#save-hobbies').removeAttr("disabled");
        } else {
            $('#save-hobbies').attr("disabled", "true");
        }
        
    });
});

$(function () {
    $('#status-form').on('change', function () {
        $('#save-status').removeAttr("disabled");    
    });
});

//Handle maximum input
let maxLength4 = 1000;
$('#intro-form4').keyup(function() {
    let length = $(this).val().length;
    length = maxLength4-length;
    $('#chars-left4').text(length + ' letters over...');
    $('#chars-left5').addClass('hidden')
    $('#chars-left4').removeClass('hidden');

    if(length > 0) {
      $('#intro-form3').removeClass('red-border');
    }
});

$('#hobby-form').keyup(function() {
    let length = $(this).val().length;
    length = maxLength4-length;
    $('#chars-left5').text(length + ' letters over...');
    $('#chars-left4').addClass('hidden')
    $('#chars-left5').removeClass('hidden');

    if(length > 0) {
      $('#intro-form3').removeClass('red-border');
    }
});
