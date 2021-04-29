// Only on homepage a sticky nav
const currentUrl = window.location.pathname;

if (currentUrl !== "/home") {
    $('.navbar').removeClass('sticky');
}