// require('./bootstrap');

// import Vue from 'vue'
// import VueRouter from 'vue-router'
// Vue.use(VueRouter)

// import routes from './router'

// Vue.component('navigation', require('./components/Navigation').default);
// const app = new Vue({
//     el: '#app',
//     router: new VueRouter(routes),
// });



require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';

Vue.component('navigation', require('./components/Navigation').default);

Vue.use(VueAxios, axios);
import routes from './router'

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
