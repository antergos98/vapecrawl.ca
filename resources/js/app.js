import Vue from 'vue';
import Vuex from 'vuex';
import VueLazyload from "vue-lazyload";
import store from './store';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.Vue = Vue;

Vue.config.productionTip = false

Vue.use(Vuex);
Vue.use(VueLazyload, {
    observer: true,
    observerOptions: {
        rootMargin: '50px',
        threshold: 0.1
    }
});

Vue.component('results', require('./components/Results.vue').default);

new Vue({
    el: '#app',
    store: store
});
