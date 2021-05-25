let stateNumber = 1;
let counter = 1;

let test = false;

// Form validation
$('#b1').click(function () {
  stateNumber -= 1;
  toggleView(stateNumber)
});

$('#b2').click(function () {
  toggleView(stateNumber)
  counter += 1;

  // First page
  if (stateNumber == 1) {
    if ($('#intro-form1').val().length > 0 && $('#intro-form2').val().length > 0 && $('#intro-form3').val().length > 0) {
      $('#intro-form1, #intro-form2, #intro-form3').removeClass('red-border');
      stateNumber += 1;
      toggleView(stateNumber)
    } else {
      if ($('#intro-form1').val().length == 0) {
        $('#intro-form1').addClass('red-border');
        $('#intro-form1').attr('placeholder', 'Dit is een verplicht veld');
      }
      if ($('#intro-form2').val().length == 0) {
        $('#intro-form2').addClass('red-border');
        $('#intro-form2').attr('placeholder', 'Dit is een verplicht veld');
      }
      if ($('#intro-form3').val().length == 0) {
        $('#intro-form3').addClass('red-border');
        $('#intro-form3').attr('placeholder', 'Dit is een verplicht veld');
      }
    }
  }
});

$('#b21').click(function () {
  // Second page
  if (stateNumber == 2) {
    counter += 1;

    if ($('#budget-field').val().length > 0 && $('#surface-field').val().length > 0 && $('#city-field').val().length > 0 && $('#date-field').val().length > 0) {
      stateNumber += 1;
      toggleView(stateNumber)
    } else {
 
      if (counter > 4) {
        counter = 4;
      }

      if (counter > 2) {
        if ($('#budget-field').val().length == 0) {
          $('#budget-field').addClass('red-border');
          $('#budget-field').attr('placeholder', 'Dit is een verplicht veld');
        }

        if ($('#surface-field').val().length == 0) {
          $('#surface-field').addClass('red-border');
          $('#surface-field').attr('placeholder', 'Dit is een verplicht veld');
        }

        if ($('#city-field').val().length == 0) {
          $('#city-field').addClass('red-border');
          $('#city-field').attr('placeholder', 'Dit is een verplicht veld');
        }

        if ($('#date-field').val().length == 0) {
          $('#date-field').addClass('red-border');
          $('#date-field').attr('placeholder', 'Dit is een verplicht veld');
        }
      }
    }
  }
});

$('#b3').click(function () {
  
});

function toggleView(stateNumber) {
  // Toggle form views
  switch (stateNumber) {
    case 1:
      $('#b2 , #section1').removeClass('hidden');
      $('#b1, #section2, #b21').addClass('hidden');
      $('#circle2').removeClass('dark')
      break;
    case 2:
      $('#b1, #section2, #b21').removeClass('hidden');
      $('#section1 , #section3, #b3, #b2').addClass('hidden');
      $('#circle2').addClass('dark');
      $('#circle3').removeClass('dark');
      break;
    case 3:
      $('#b21, #section2').addClass('hidden');
      $('#section3 , #b3').removeClass('hidden');
      $('#circle3').addClass('dark');
      break;
    default:
      
  }
}

// Text input leters remaining
let maxLength1 = 200;
let maxLength2 = 500;
let maxLength3 = 500;

$('#intro-form1').keyup(function() {
  let length = $(this).val().length;
  length = maxLength1-length;
  $('#chars-left1').text(length + ' letters over...');
  $('#chars-left2, #chars-left3').addClass('hidden')
  $('#chars-left1').removeClass('hidden');

  if(length > 0) {
    $('#intro-form1').removeClass('red-border');
  }
});

$('#intro-form2').keyup(function() {
    let length = $(this).val().length;
    length = maxLength2-length;
    $('#chars-left2').text(length + ' letters over...');
    $('#chars-left1, #chars-left3').addClass('hidden')
    $('#chars-left2').removeClass('hidden');

    if(length > 0) {
      $('#intro-form2').removeClass('red-border');
    }
});

  $('#intro-form3').keyup(function() {
    let length = $(this).val().length;
    length = maxLength3-length;
    $('#chars-left3').text(length + ' letters over...');
    $('#chars-left1').text(length + ' letters over...');
    $('#chars-left1, #chars-left2').addClass('hidden')
    $('#chars-left3').removeClass('hidden');

    if(length > 0) {
      $('#intro-form3').removeClass('red-border');
    }
});

// Detect input
$('#budget-field, #surface-field , #city-field ,#date-field').keyup(function() {
  $(this).removeClass('red-border');
});

    
    
