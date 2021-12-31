import Vue from 'vue';
import store from './vue/store/store';

window.Vue = require('vue');

Vue.component('App', require('./vue/ListApp.vue').default);

const app = new Vue({
    el: '#app',
    store,
});