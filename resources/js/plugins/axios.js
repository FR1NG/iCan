import axios from 'axios'
import { useNotificationStore } from '../stores/notification';

const myAxios = axios.create({
  baseURL: 'api'
})

myAxios.interceptors.response.use(response => {
    if (response.data?.message)
        useNotificationStore().notify({type: 'success', text: response.data?.message});
    return response;
}, error => {
    useNotificationStore().notify({type: 'error', text: error?.response?.data?.message});
    return Promise.reject(error);
});


export default myAxios;
