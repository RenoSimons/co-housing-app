// Only on homepage a sticky nav
const currentUrl = window.location.pathname;

if (currentUrl !== "/") {
    $('.navbar').removeClass('sticky');
} 