/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import router from "./router";
import {BootstrapVue, IconsPlugin} from "bootstrap-vue";
import Vuex from 'vuex';
import 'bootstrap-vue/dist/bootstrap-vue.css'
import 'bootstrap/dist/css/bootstrap.css'
import store from './store'
import axios from "axios";

require('./bootstrap');
window.Vue = require('vue');
Vue.use(router);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(Vuex);

axios.defaults.withCredentials = true;



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('default-layout', require('./components/DefaultLayout.vue').default)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('default-layout', require('./components/DefaultLayout.vue').default)
const app = new Vue({
    el: '#app',
    router,
    store,
});
