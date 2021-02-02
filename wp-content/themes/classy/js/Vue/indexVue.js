// Requests to our Laravel back-end
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import router from '../routerVue'

import App from './App.vue'
import FormApp from './views/FormApp'
import ResetApp from "./views/ResetApp";

//indexVue.js is detected on this page - выкл для прода
Vue.config.productionTip = true;
Vue.config.devtools = true;

// Init Vue instances
const initVueInstances = () => {
    if($('#app-account').length > 0) {
        new Vue({
            router,
            render: h => h(App)
        }).$mount('#app-account');
    }
    
    if($('#app-forms').length > 0) {
        new Vue({
            render: h => h(FormApp)
        }).$mount('#app-forms');
    }
    
    if($('#change-password').length > 0) {
        new Vue({
            render: h => h(ResetApp)
        }).$mount('#change-password');
    }
}

export default initVueInstances;