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

        $('.img-fluid').each(function(index) {
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


$('.dark-overlay').click(function() {
    console.log('clik');
    $('#carousel-modal').modal('toggle')
});

function appendCarousel(img) {
    let html = `
        <div class="carousel-item">
            <img class="d-block w-100" src="${img}">
        </div>
    `;

    $('.carousel-inner').append(html)
}

function initCarousel() {
    $('.carousel-item:first').addClass('active');
}
