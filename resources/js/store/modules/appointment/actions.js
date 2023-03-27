import axios from 'axios';

export const addAppointment = ({ commit }, payload) => {

    return axios.post('/appointment?api=true', payload)
        .then((response) => {
            if (response) {
                return Promise.resolve(response)
            }
        })
        .catch((error) => {
            return Promise.reject(error);
        })
}
