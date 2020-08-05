import Vue from 'vue';
import Vuex from 'vuex';
import VueLazyload from "vue-lazyload";
import store from './store';

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
Vue.component('age-validation-modal', require('./components/AgeValidationModal').default);

new Vue({
    el: '#app',
    store: store
});
