let stateNumber = 1;

$('.save-btn').click(function() {
    if( $(this).attr('id') == 'b2') {
        stateNumber += 1;
        if(stateNumber > 3) {
            stateNumber = 3;
        }
        console.log(stateNumber)
    } else {
        stateNumber -= 1;
        console.log(stateNumber)
    }

    switch(stateNumber) {
        case 1:
            $('#b2 , #section1').removeClass('hidden');
            $('#b1, #section2').addClass('hidden');
          break;
        case 2:
            $('#b2').removeClass('hidden');
            $('#b1, #section2').removeClass('hidden');
            $('#section1 , #section3').addClass('hidden')
          break;
        case 3:
            $('#b2, #section2').addClass('hidden');
            $('#section3').removeClass('hidden');
            break;
        default:
          // code block
      } 
})

let maxLength1 = 200;
let maxLength2 = 500;
let maxLength3 = 500;

$('#intro-form1').keyup(function() {
  let length = $(this).val().length;
  length = maxLength1-length;
  $('#chars-left1').text(length + ' letters over...');
  $('#chars-left2, #chars-left3').addClass('hidden')
  $('#chars-left1').removeClass('hidden');
});

$('#intro-form2').keyup(function() {
    let length = $(this).val().length;
    length = maxLength2-length;
    $('#chars-left2').text(length + ' letters over...');
    $('#chars-left1, #chars-left3').addClass('hidden')
    $('#chars-left2').removeClass('hidden');
  });

  $('#intro-form3').keyup(function() {
    let length = $(this).val().length;
    length = maxLength3-length;
    $('#chars-left3').text(length + ' letters over...');
    $('#chars-left1').text(length + ' letters over...');
    $('#chars-left1, #chars-left2').addClass('hidden')
    $('#chars-left3').removeClass('hidden');
  });

    
    
