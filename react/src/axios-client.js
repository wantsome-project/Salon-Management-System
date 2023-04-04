import axios from 'axios';

const axiosClient = axios.create({
  baseURL: `${import.meta.env.VITE_API_BASE_URL}`,
  headers:{
    'Access-Control-Allow-Headers': 'content-type, Access-Control-Allow-Headers'
  }

})

axiosClient.interceptors.request.use((config) =>{
  const token = localStorage.getItem('ACCESS_TOKEN');
  console.log(config, config.headers, 'imter')
  // config.headers.Authorization = `Bearer ${token}`;
  return config;
})

axiosClient.interceptors.response.use((response) => {
  console.log(response, 'test')
  return response;
}, (error) => {
  const {response} = error;
  if (response.status === 401) {
    localStorage.removeItem('ACCESS_TOKEN')
  }
  throw error;
})


export default axiosClient;
