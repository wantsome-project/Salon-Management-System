// axios
import axios from 'axios'
import router from "./router";
import store from "./store";

const domain = ''

export default axios.create({
    domain
    // You can add your headers here
})

axios.interceptors.response.use(undefined, function (error) {
    if (error) {
        const originalRequest = error.config;
        if (error.response.status === 401 && !originalRequest._retry) {

            originalRequest._retry = true;
            store.dispatch('LogOut')
            return router.push('/login')
        }
    }
})
