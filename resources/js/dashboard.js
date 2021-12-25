
import Vue from 'vue';

window.Vue = require('vue');

Vue.component('App', require('./vue/listApp.vue').default);

const app = new Vue({
    el: '#app'
});