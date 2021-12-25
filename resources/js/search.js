import Vue from 'vue';

window.Vue = require('vue');

Vue.component('App', require('./vue/finderApp.vue').default);

const app = new Vue({
    el: '#app'
});