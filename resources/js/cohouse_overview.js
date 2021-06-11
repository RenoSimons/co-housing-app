import {check} from './detect_mobile.js';

if(check) {
    $('.sizing-icons').hide();
    $('.card').removeClass('w-30');
    $('.card').addClass('w-49');
}

$('.sizing-icons').click(function() {
    if( $('.card').hasClass('w-49') ) {
        $('.card').removeClass('w-49');
        $('.card').addClass('w-30');
        $('#icon-big').removeClass('hidden');
        $('#icon-small').addClass('hidden');
        $('.smaller , .card-title ').addClass('small-view');
    } else {
        $('.card').removeClass('w-30');
        $('.card').addClass('w-49');
        $('#icon-small').removeClass('hidden');
        $('#icon-big').addClass('hidden');
        $('.smaller , .card-title ').removeClass('small-view');
    }
});

$('#icon-collapse').click(function() {
    if ($('#icon-collapse').hasClass('uncollapsed')) {

        $('#icon-collapse').css('transform', 'rotate(180deg)')
        $('#icon-collapse').removeClass('uncollapsed')
        
        setTimeout(function(){ 
            $('.collapser').css({'display':'block'})
        }, 500);
         
    } else {
        $('#icon-collapse').css('transform', 'rotate(360deg)')
        $('#icon-collapse').addClass('uncollapsed')
        $('.collapser').fadeOut(500)

        setTimeout(function(){ 
            $('.collapser').css({'display':'none'}) 
        }, 500);
    }
})

