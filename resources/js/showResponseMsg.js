export function showResponseMsg(message) {
    // Show succes message
    $('#message-slider').toggleClass('hide-box');
    $('.slider-box').css({ 'transform': 'translate(0% , 5%)' })
    $('#message-text').html(message);

    setTimeout(function () {
        $('.slider-box').css({ 'transform': 'translate(40% , 5%)' })
    }, 2000);

    setTimeout(function () {
        $('#message-slider').toggleClass('hide-box');
    }, 3000);
}