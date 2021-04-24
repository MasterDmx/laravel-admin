import Vue from 'vue/dist/vue';

window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');

window.vm = new Vue({
    el: '#vue',
    methods: {}
});
