import EventEmitter from 'events';
import appApi from "../api/index";
import store from "../store";
import errorHandlerService from '../services/errorHandlerService';
import { useToast } from "vue-toastification";
import {ApiResponse} from "../constants";

const localStorageKey = "loggedIn";
const toast = useToast();

class AuthService extends EventEmitter {
    async handleRegistration(newUser){
        try {
            const response = await appApi.post('/register',newUser)
            if(response.data.status == ApiResponse.SUCCESS){
                toast.success("Login Successfully", { // successful registration will auto Logged-in the user
                    timeout: 3500
                });
                await this.onLogin(response.data.token, response.data.user_data);
                this.emit('loginSuccess',response);
            }else{
                toast.error(response.data.message, {
                    timeout: 5000
                });
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message, {
                timeout: 5000
            });
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async handleLogin(email, password,rememberMe) {
        let credentials = {email, password};
        try {
            const response = await appApi.post('/login', credentials)
            if(response.data.status == ApiResponse.SUCCESS){
                toast.success(response.data.message, {
                    timeout: 3500
                });
                await this.onLogin(response.data.data.token, response.data.data.user_data,rememberMe);
                this.emit('loginSuccess',response);
            }else{
                toast.error(response.data.message, {
                    timeout: 5000
                });
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message, {
                timeout: 5000
            });
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }

    }

    async onLogin(token, profile,rememberMe) {
        try {
            await store.dispatch('setAuthState', {profile, token});
            localStorage.setItem(localStorageKey, "true");
        } catch (e) {
            console.log('Error on cache reset (login)', e.message)
        }
    }

    isAuthenticated() {
        const accessToken = localStorage.getItem('accessToken');
        if (!accessToken) {
            localStorage.removeItem(localStorageKey);
        }
        return (localStorage.getItem(localStorageKey) === "true");
    }

    async handleLogout() {
        try {
            const response = await appApi.post('/logout')
            if(response.data.status == ApiResponse.SUCCESS){
                toast.success(response.data.message, {
                    timeout: 3500
                });
                await this.onLogout();
                this.emit('logoutSuccess', response);
            }else{
                toast.error(response.data.message, {
                    timeout: 3500
                });
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message, {
                timeout: 5000
            });
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }

    async onLogout() {
        try {
            await store.dispatch('clearAuthState');
            localStorage.removeItem(localStorageKey);
            localStorage.clear();
        } catch (e) {
            console.log('Error on cache reset (logout)', e.message)
        }
    }
}

const service = new AuthService();
export default service;
