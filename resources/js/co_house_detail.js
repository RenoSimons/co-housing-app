import {check} from './detect_mobile.js';

// Get the images in javascript for carousel
const imagesArray = []

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const url = window.location.pathname.split('/');
const id = url[url.length - 1];

$.ajax({
    type: 'POST',
    url: "/cohousings/getimages",
    data: {
        id: id
    },

    success: function(response) {
        const images = response[0];
        let urlString = "http://" + window.location.host + "/storage/house_images/";

        let images2 = JSON.stringify(images)
        let imageString = images2.split(',');

        imageString.forEach(function(item, index) {
            let newString = item.replace(/\\/g, '').replace('{"img_urls":"[', '').replace(']"}', '').replace('"', '').replace('"', '');
            imagesArray.push(newString);
            appendCarousel(urlString + newString);
        })
        initCarousel()
        //shuffle(imagesArray);

        $('.carousel-thumbnail').each(function(index) {
            $(this).attr('src', urlString + imagesArray[index])
            console.log($(this).attr('src'))
        });

        let picsLeft = 0;

        if (check) {
            $('#box1, #box2 ,#box3').remove();
            picsLeft = imagesArray.length - 1;
            
        } else {
            picsLeft = imagesArray.length - 4;
        }

        $('#pics-left').html(picsLeft);
    }
});


function appendCarousel(img) {
    let html = `
        <div class="carousel-item" id="img${imageId}">
            <img class="d-block carousel-img w-100" src="${img}">
        </div>
    `;

    $('.carousel-inner').append(html)
    imageId += 1;
}

function initCarousel() {
    $('.carousel-item:first').addClass('active');
}

// Handle carousel image on photo click
let imageId = 1;
let activeImage = 0;

$('.dark-overlay, .image-box').click(function() {
    $('.carousel-item').removeClass('active');

    activeImage = $(this).attr('value');

    let activeImageId = "#img" + $(this).attr('value');
    $(activeImageId).addClass('active');

    $('#carousel-modal').modal('toggle');
});

// Handle the contact modal
$('.contact-btn').click(function() {
    $('#contact-modal').modal('toggle');
})

$('#submit-contact-form').click(function(e) {

    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: "/session/create",
        data: {
            poster_id: $('#poster_id').html(),
            message: $('#first_message').val()
        },

        success: function(response) {
            $('#contact-modal').modal('toggle');

            // Show succes message
            $('.slider-box').css({'transform': 'translate(0% , 5%)'})
            $('#message-text').html(response);

            setTimeout(function(){
                $('.slider-box').css({'transform': 'translate(20% , 5%)'})
           }, 3000);
        }
    })

})


