import axios from "axios";
import { useStore } from 'vuex';
const store = useStore();

const instance = axios.create({
    baseURL: "http://127.0.0.1:8000/api/"
});

instance.interceptors.request.use(
    async (config) => {
        await store.dispatch('actionLoaderState', true);
        const token = await localStorage.getItem('accessToken') || null;
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    (err) => {
        store.dispatch('actionLoaderState', false);
        console.log('API Tracker Error', err);
        return Promise.resolve(err);
    }
);

instance.interceptors.response.use((response) => {
    store.dispatch('actionLoaderState', false);
    return response;
}, (error) => {
    store.dispatch('actionLoaderState', false);
    return Promise.reject(error);
});

export default instance;
