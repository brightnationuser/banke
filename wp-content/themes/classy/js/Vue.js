// Requests to our Laravel back-end
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import Forms from './components/Forms';

//Vue.js is detected on this page - выкл для прода
Vue.config.productionTip = true;
Vue.config.devtools = true;

// Init global components
Vue.component('forms', Forms);

// Init Vue instances
const initVueInstances = () => {
    // Статус бронирований
    $(document).ready(() => {
        if($('#app-forms').length > 0) {
        
            new Vue({
                el: '#app-forms',
                components: { Forms }
            });
        }
    })
}

export default initVueInstances;