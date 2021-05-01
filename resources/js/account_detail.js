

// Event listeners disabled btns
$(function () {
    $('#birthInput').on('input', function () {
        if( $(this).val().length > 0) {
            $('#save-birth').removeAttr("disabled");
        } else {
            $('#save-birth').attr("disabled", "true");
        }
        
    });
});

$(function () {
    $('#intro-form').on('input', function () {
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

