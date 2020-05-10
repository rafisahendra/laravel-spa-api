require('./bootstrap');
window.Vue = require('vue');
// diatas komponen awal

import Vue from 'vue' // baris ini wajib ada di komponen file
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);
import App from './App.vue';

import router from './router/router.js';
// Vue.component('nav-bar', require('./components/Header').default); // Membuil menjadikan Tag komponen dengan Vue.component

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#id_template_spa');
