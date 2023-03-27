import axios from "axios";

export const register = ({ dispatch }, payload) => {
    axios.post('/register', payload).then((response) => {
        return Promise.resolve(response);
    }).catch((error) => {
        return Promise.reject(error)
    })
}
