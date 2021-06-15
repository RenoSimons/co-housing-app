/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


 require('./bootstrap');


window.Vue = require('vue').default;
import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);

import PrivateMessageComponent from './components/PrivateMessageComponent';
import PrivateChatComponent from './components/PrivateChatComponent';


const app = new Vue({
    el: '#app',
    components: {PrivateMessageComponent, PrivateChatComponent}
});

//Change href forms for production or develop over js

export const in_production = true;

window.addEventListener('load', function () {
    $('.search-form').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/cohousings/filterhouses' : '/cohousings/filterhouses') )
    $('#filter-houses').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/cohousings/filterhouses' : '/cohousings/filterhouses') )
    $('#login-form-1').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/login' : '/login') )
    $('#login-form-2').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/login' : '/login') )
    $('#register-form-1').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/register' : '/register') )
    $('#register-form-2').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/register' : '/register') )
    $('#publish-post').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/publishpost' : '/publishpost') )
    $('#publish-post2').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/publish' : '/publish') )
    $('#person-filter-1').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/personen/filter' : '/personen/filter') )
    $('#store1').attr('action', (in_production ? 'https://co-housing-app-3i8mx.ondigitalocean.app/store' : '/store') )
    
  })


require('./nav');
require('./showResponseMsg');
require('./button_behaviour');
require('./favorite');
require('./cohouse_overview');
require('./offerHouse');
require('./detect_mobile');
require('./co_house_detail');
require('./myposts');
require('./accountOverview');
require('./particles');
require('./landing');










