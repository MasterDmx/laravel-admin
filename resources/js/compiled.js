import Vue from 'vue/dist/vue';

window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.Vue = require('vue');

require('./inc/func');

import VModal from 'vue-js-modal/dist/index.nocss.js';
import MediaManager from './modules/media-manager/plugin.js';

Vue.use(VModal)
Vue.use(MediaManager)

Vue.component('media-image', require('./modules/media-fields/media-image.vue').default);

window.vm = new Vue({
    el: '#vue',
    methods: {
        openMediaManager: function (options = {}) {
            this.$MediaManager.open({});
        },
    }
});
