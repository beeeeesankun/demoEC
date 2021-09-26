import Vue from 'vue';
import App from './App.vue';
import VModal from 'vue-js-modal';
import store from './store.js';

import VueAwesomeSwiper from 'vue-awesome-swiper';
import 'swiper/css/swiper.css';
Vue.use(VueAwesomeSwiper /* { default options with global component } */);

Vue.use(VModal);
Vue.component('v-modal', require('./components/modal.vue').default);

Vue.config.productionTip = true;
Vue.config.devtools = true;

new Vue({
  store,
  render: (h) => h(App),
}).$mount('#app');
