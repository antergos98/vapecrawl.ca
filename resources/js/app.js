import Vue from 'vue';
import Vuex from 'vuex';
import VueLazyload from "vue-lazyload";
import store from './store';
require('./bootstrap');

window.Vue = Vue;
Vue.use(Vuex);
Vue.use(VueLazyload, {
    observer: true
});

Vue.component('results', require('./components/Results.vue').default);

new Vue({
    el: '#app',
    store: store
});
