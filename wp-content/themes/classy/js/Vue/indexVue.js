// Requests to our Laravel back-end
import {mapState} from "vuex";

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import VueYoutube from 'vue-youtube-embed'
import App from './App.vue'
import FormApp from './FormApp'
import ResetApp from "./ResetApp";

import store from './store/index'
import router from './routerVue'
import getTranslations from "./helpers/getTranslations";

import './sass/main.scss'

import PortalVue from 'portal-vue'

Vue.use(PortalVue)
Vue.use(VueYoutube)

//indexVue.js is detected on this page - выкл для прода
Vue.config.productionTip = true;
Vue.config.devtools = true;

Vue.mixin({
    computed: {
        ...mapState({
            translations: state => state.translations
        })
    }
})

// Init Vue instances
const initVueInstances = () => {
    getTranslations()
    
    if($('#app-account').length > 0) {
        new Vue({
            router,
            store,
            render: h => h(App)
        }).$mount('#app-account');
    }
    
    if($('#app-forms').length > 0) {
        new Vue({
            router,
            store,
            render: h => h(FormApp)
        }).$mount('#app-forms');
    }
    
    if($('#change-password').length > 0) {
        new Vue({
            router,
            store,
            render: h => h(ResetApp)
        }).$mount('#change-password');
    }
}

export default initVueInstances;
