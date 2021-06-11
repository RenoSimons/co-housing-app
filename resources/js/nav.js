import { in_production } from "./app";

// Only on homepage a sticky nav
const currentUrl = window.location.pathname;

if (currentUrl !== "/") {
    $('.navbar').removeClass('sticky');
}

// Nav icon toggle mobile
$('.first-button').on('click', function () {
    $('.animated-icon1').toggleClass('open');
});
  

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

window.onload = function() {
    $.ajax({
        type: 'POST',
        url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/getnotificationcount' : '/getnotificationcount'),
        data: {},

        success: function (response) {
            if(response > 0) {
                $('.notification-circle').css('display', 'flex');
            }  else {
                $(".drop2").append( `<a class="dropdown-item" href="/messages">Geen nieuwe notificaties</a>`);
            }
        }
    })
};
// Toggle notification bell menu
$('#notify-belll').click(function(e) {
    if ($('.drop2').hasClass('show')) {
        $('.drop2').removeClass('show');

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/clearotifications' : 'clearnotifications'),
            data: {},

            success: function (response) {
                $('.notification-circle').css('display', 'none');
                $(".drop2").empty();
                $(".drop2").append( `<a class="dropdown-item" href="/messages">Geen nieuwe notificaties</a>`);
            }
        })

    } else {
        $('.drop2').addClass('show');

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/getnotifications' : '/getnotifications'),
            data: {},

            success: function (response) {
                response.forEach(element => {
                    let htmlElement = `<a class="dropdown-item" href="/messages">${element.message}</a>`
                    $(".drop2").append(htmlElement);
                });

            }
        })


    }

    if ( $(".drop2").children().length > 0) {
        console.log("more");
    }
    
})