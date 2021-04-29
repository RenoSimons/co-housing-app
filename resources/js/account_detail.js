console.log('test')
// Show uploaded image
$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

$(function () {
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
});

// Show uploaded image name
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

// Event listeners disabled btns
$(function () {
    $('#birthInput').on('input', function () {
        console.log($(this).val().length )
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

