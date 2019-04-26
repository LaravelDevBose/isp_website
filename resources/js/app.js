

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'

import router from './Router/router'


Vue.component('AppMaster', require('./components/AppMaster').default);

window.basePath = document.head.querySelector('meta[name="root"]');

const app = new Vue({
    el: '#app',
    router,
    base: __dirname,
    created: function() {
        console.log('starting');
    }
}).$mount('#app');
