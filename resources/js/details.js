import Vue from 'vue';

window.Vue = require('vue');

Vue.component('App', require('./vue/DetailsApp.vue').default);

const app = new Vue({
    el: '#app',
});