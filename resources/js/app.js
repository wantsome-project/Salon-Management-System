/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from "vue";
import VueRouter from "vue-router";
import {BootstrapVue, IconsPlugin} from "bootstrap-vue";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

require('./bootstrap');
window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
const routes = [
    { path: '/', component: require('./components/Home.vue').default},
    { path: '/service_types', component: require('./components/ServicesComponent.vue').default},
    { path: '/user', component: require('./components/ExampleComponent.vue').default}
];
const router = new VueRouter({routes});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('home', require('./components/Home.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
