$(".heart-icon").click(function(e) {

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
            
            if (isFavorited) {
                $('#'+id).attr("src", "/images/icons/heart-full.png")
            } else {
                $('#'+id).attr("src", "/images/icons/heart-empty.png")
            }
        }
    });
});
