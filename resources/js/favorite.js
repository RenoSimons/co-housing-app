$(".heart-icon").click(function(e, currentTop) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    e.preventDefault();
    var id = $(this).attr('id');

    $.ajax({
        type:'POST',
        url: "/favorite",
        data:{ id:id },

        success:function(response) {
            const id = response[0];
            const isFavorited = response[1];
            let messageText = "";

            if (isFavorited) {
                $('#'+id).attr("src", "/images/icons/heart-full.png")
                messageText = "Toegevoegd aan favorieten";
            } else {
                $('#'+id).attr("src", "/images/icons/heart-empty.png")
                messageText = "Verwijderd van favorieten";
            }

            // Show succes message
            $('.slider-box').css({'transform': 'translate(0% , 5%)'})
            $('#message-text').html(messageText);

            setTimeout(function(){
                $('.slider-box').css({'transform': 'translate(20% , 5%)'})
           }, 3000);
        }
    });
});

let currentTop = 0;
$(document).scroll( function(evt) {
    currentTop = $(this).scrollTop();
    $('.slider-box').css({'margin-top': currentTop + 'px'})
});
