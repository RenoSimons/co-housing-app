import {check} from './detect_mobile.js';
import { in_production } from "./app";

// Scroll down on icon click
$('#scroll-icon').click(function() {
    window.scrollTo(0, 620);
})

// Animations
let scrollPosition = 0;
let textPlayed = false;
let accAnimationPlayed = false;

$(document).scroll( function(evt) {
    scrollPosition = $(this).scrollTop();

    // Make account slide in
    function slideInAnimation() {
      $('.make-account-box, .make-account-text').css({'transform': 'translateX(0%)'})
    }

    // Nav anim
    if(scrollPosition > 860) {
      $('.navbar').addClass('dark-bg');
    } else {
      $('.navbar').removeClass('dark-bg');
    }

    // Draw white svg's

    if( scrollPosition > 380 && accAnimationPlayed == false) {
      setTimeout(function(){
        slideInAnimation()
      }, 1000);
      //Animation 1
      $('#a1p1').fadeIn(400); 
      $('#a1p2').fadeIn(400);
      $('#a1t1').addClass('visible')  

      setTimeout(function(){
        $('#a1p3').fadeIn(400); 
      }, 400);
 
      // //Animation 2
      $('#a2t1').addClass('visible')
      $('#a2p1, #a2p2, #a2p3').fadeIn(300);
      $('#a2p4').fadeIn(200);
      $('#a2p4').addClass("spinning-logo");


      // //Animation 3
      $('#a3p1').fadeIn(300); 
      $('#a3t1').addClass('visible') 
      
        setTimeout(function(){
          $('#a3p2').fadeIn(300); 
        }, 200);
        setTimeout(function(){
          $('#a3p3').fadeIn(300); 
        }, 400);
        setTimeout(function(){
          $('#a3p4').fadeIn(300); 
        }, 600);
        setTimeout(function(){
          $('#a3p5').fadeIn(300); 
        }, 800);
        setTimeout(function(){
          $('#a1t2, #a1t3, #a2t2, #a2t3, #a3t2, #a3t3').addClass('visible'); 
        }, 1000);
      
    }
});

$(document).ready(function () {
  if (window.location.pathname == '/') {
    $.ajax({
        type: 'POST',
        url: (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/getusershomepage' : '/getusershomepage'),
        data: {},

        success: function (response) {
          let totalPersons = response.length;

          if(totalPersons >= 2) {
            let person1 = response[Math.floor(Math.random() * totalPersons)];
            let person2 = response[Math.floor(Math.random() * totalPersons)];
          

            while (person1.id == person2.id) {
              person2 = response[Math.floor(Math.random() * totalPersons)];
            }

            let content = appendContent(person1, person2);

            $('#user-box-1').html(content[0]);
            $('#user-box-2').html(content[1]);
          }
        }
    })
  }

  function appendContent(person1, person2) {
    let content1 = `
                <a href="/profile/${person1.user_id}">
                  <div class="d-flex align-center justify-content-center d-lg-justify-content-start ">
                          <div class="circle-user">
                              <img class="" src="/storage/user_images/${person1.img_url}" alt="Avatar">
                          </div>
                          <div class="speech-bubble ml-4 p-2 w-50">
                          <h5>${person1.name}</h5>
                              <p class="m-0">${person1.intro.substring(0,241)}</p>
                          </div>
                      </div>
                </a>
          `
    let content2 = `
                  <a href="/profile/${person2.user_id}">
                      <div class="d-flex align-center justify-content-center d-lg-justify-content-end mt-4 mt-lg-0">
                              <div class="circle-user">
                                  <img class="" src="/storage/user_images/${person2.img_url}" alt="Avatar">
                              </div>
                              <div class="speech-bubble ml-4 p-2 w-50">
                              <h5>${person2.name}</h5>
                                  <p class="m-0">${person2.intro.substring(0,241)}...</p>
                              </div>
                        
                      </div> 
                    </a>
          `
    return ([content1, content2])
  }
});


// Particle animation
particlesJS('particles-js',
    
{
  "particles": {
    "number": {
      "value": 10,
      "density": {
        "enable": true,
        "value_area": 800
      }
    },
    "color": {
      "value": "#e13f65"
    },
    "shape": {
      "type": "image",
      "stroke": {
        "width": 0,
        "color": "#e13f65"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "../../images/icons/logo-grey.png",
        "width": 50,
        "height": 50
      }
    },
    "opacity": {
      "value": 0.5,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 15,
      "random": false,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#e13f65",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 6,
      "direction": "none",
      "random": false,
      "straight": false,
      "out_mode": "in",
      "attract": {
        "enable": true,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "bubble"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 50
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true,
  "config_demo": {
    "hide_card": false,
    "background_color": "#e13f65",
    "background_image": "",
    "background_position": "50% 50%",
    "background_repeat": "no-repeat",
    "background_size": "cover"
  }
}

);




