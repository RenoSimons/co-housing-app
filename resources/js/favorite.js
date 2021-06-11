import { showResponseMsg } from "./showResponseMsg";
import { in_production } from "./app";

$(".heart-icon, .garbage-icon").click(function(e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    e.preventDefault();
    let id = $(this).attr('id');
    let icon = $(this).attr('class');
    let favoriteCardId = $(this).parent().parent().parent().attr('id');

    console.log(in_production )
    $.ajax({
        type:'POST',
        url: "/favorite",
        data:{ id:id },

        success:function(response) {
            const id = response[0];
            const isFavorited = response[1];
            let messageText = "";

            if (isFavorited) {
                if (icon !== 'garbage-icon') {
                    $('#' + id).attr("src", "/images/icons/heart-full.png")
                }
                messageText = "Toegevoegd aan favorieten";
            } else {
                if (icon !== 'garbage-icon') {
                    $('#' + id).attr("src", "/images/icons/heart-empty.png")
                } else {
                    $('#' + favoriteCardId).fadeOut(500);
                    
                    setTimeout(function(){
                        $('#' + favoriteCardId).remove();
                        console.log($('#favorite-section').html().length)
                        if ( $('#favorite-section').html().length < 241) {
                            const emptyFavoritesMessage = `<h1>Nog geen favorieten toegevoegd</h1>`;
                            $('#favorite-section').html(emptyFavoritesMessage)
                        }
                   }, 1000);
                }
                messageText = "Verwijderd van favorieten";
            }

            // Show succes message
            showResponseMsg(messageText);
        }
    });
});

let currentTop = 0;
$(document).scroll( function(evt) {
    currentTop = $(this).scrollTop();
    $('.slider-box').css({'margin-top': currentTop + 'px'})
});
