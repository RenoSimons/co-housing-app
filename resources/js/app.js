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

export const in_production = false;

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










