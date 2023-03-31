import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from "../components/Home.vue";
import ServicesComponent from "../components/ServicesComponent.vue";
import ExampleComponent from "../components/ExampleComponent.vue";
import ProductsComponent from "../components/ProductsComponent.vue";
import ContactComponent from "../components/ContactComponent.vue";
import AppointmentComponent from "../components/AppointmentComponent.vue";
import RegisterComponent from "../components/RegisterComponent.vue";
import store from "../store";
import loginComponent from "../components/LoginComponent.vue";
Vue.use(VueRouter);
const routes = [
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
        meta: { requiresAuth: true },
    },
    {
        path: '/appointment',
        name: 'AppointmentComponent',
        component: AppointmentComponent,
    },
    {
        path: '/register',
        name: 'RegisterComponent',
        component: RegisterComponent,
        meta: { guest: true },
    },
    {
        path: '/login',
        name: 'LoginComponent',
        component: loginComponent,
        meta: { guest: true },
    },
    {
        path: '/user',
        name: 'User',
        component: ExampleComponent,
    }
];

const router = new VueRouter({
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.requiresAuth)) {
        if (store.getters.isAuthenticated) {
            next();
            return;
        }
        next("/login");
    } else {
        next();
    }
});
router.beforeEach((to, from, next) => {
    if (to.matched.some((record) => record.meta.guest)) {
        if (store.getters.isAuthenticated) {
            next("/contact");
            return;
        }
        next();
    } else {
        next();
    }
});

export default router;
