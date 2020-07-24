window.livewire.on('fetch:completed', (q) => {
    window.history.replaceState({q}, '', '?q=' + q);
});

// import Vue from 'vue';
// import Vuex from 'vuex';
// import VueLazyload from "vue-lazyload";
// import store from './store';
// import axios from 'axios';
// import Loading from 'vue-loading-overlay';

// window.axios = axios;
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// window.Vue = Vue;

// Vue.config.productionTip = false

// Vue.use(Vuex);
// Vue.use(VueLazyload, {
//     observer: true
// });
// Vue.use(Loading, {
//     loader: 'dots',
//     backgroundColor: '#1a202c',
//     opacity: 0.9,
//     color: '#FFF'
// });

// Vue.component('results', require('./components/Results.vue').default);
// Vue.component('age-validation-modal', require('./components/AgeValidationModal').default);

// new Vue({
//     el: '#app',
//     store: store
// });
