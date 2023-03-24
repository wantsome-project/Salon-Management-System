import Vue from 'vue';
import router from 'vue-router';
import Home from "./components/Home.vue";
import ServicesComponent from "./components/ServicesComponent.vue";
import ExampleComponent from "./components/ExampleComponent.vue";
import ProductsComponent from "./components/ProductsComponent.vue";
import ContactComponent from "./components/ContactComponent.vue";
import AppointmentComponent from "./components/AppointmentComponent.vue";
Vue.use(router);
export default new router({
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home,
        },
        {
            path: '/service-type',
            name: 'ServiceTypes',
            component: ServicesComponent,
        },
        {
            path: '/products',
            name: 'ProductsComponent',
            component: ProductsComponent,
        },
        {
            path: '/contact',
            name: 'ContactComponent',
            component: ContactComponent,
        },
        {
            path: '/appointment',
            name: 'AppointmentComponent',
            component: AppointmentComponent,
        },
        {
            path: '/user',
            name: 'User',
            component: ExampleComponent,
        }
    ],
})
