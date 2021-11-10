import EventEmitter from 'events';
import appApi from "~/api/index";
import store from "~/store";
import errorHandlerService from '~/services/errorHandlerService';
import {useToast} from "vue-toastification";
import {ApiResponse, LocalStorageKeys} from "~/constants";
import router from "~/router";
import localStorageService from "./localStorageService";

const toast = useToast();

class AuthService extends EventEmitter {
    async handleRegistration(newUser) {
        try {
            const response = await appApi.post('/register', newUser)
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success("Login Successfully");
                await this.onLogin(response.data.token,
                    response.data.user_data);
                this.emit('loginSuccess');
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async handleLogin(email, password, rememberMe) {
        let credentials = {email, password};
        try {
            const response = await appApi.post('/login', credentials)
            if (response.data.status === ApiResponse.SUCCESS) {
                await this.onLogin(response.data.data.token,
                    response.data.data.user_data, rememberMe);
                // this.emit('loginSuccess', response);
                router.push({name: `user-dashboard`});
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }

    }

    async onLogin(token, profile, rememberMe) {
        try {
            await store.dispatch('setAuthState', {profile, token});
            localStorage.setItem(LocalStorageKeys.LOGGED_IN, "true");
        } catch (e) {
            console.log('Error on cache reset (login)', e.message)
        }
    }

    isAuthenticated() {
        const accessToken = localStorage.getItem('accessToken');
        if (!accessToken) {
            localStorage.removeItem(LocalStorageKeys.LOGGED_IN);
        }
        return (localStorage.getItem(LocalStorageKeys.LOGGED_IN) === "true");
    }

    async handleLogout() {
        try {
            const response = await appApi.post('/logout');
            if (response.data.status === ApiResponse.SUCCESS) {
                await this.onLogout();
                //this.emit('logoutSuccess');
                router.push({name: `login`});
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async onLogout() {
        try {
            await store.dispatch('clearAuthState');
            localStorage.removeItem(LocalStorageKeys.LOGGED_IN);
            localStorage.clear();
        } catch (e) {
            console.log('Error on cache reset (logout)', e.message)
        }
    }

    async handleSendVerificationCode(payload) {
        try {
            const response = await appApi.post('/send/code', payload);
            if (response.data.status === ApiResponse.SUCCESS) {
                if (payload.email) {
                    await localStorageService.setWithExpiry({
                        key: LocalStorageKeys.USER_EMAIL,
                        value: payload.email,
                        ttl: LocalStorageKeys.TTL
                    });
                }
                toast.success(response.data.message);
                router.push({
                    name: 'reset-password',
                    params: {encodedToken: response.data.data.token}
                });
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async handleUpdatePassword(data) {
        try {
            const response = await appApi.post('/reset/password', data);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message, {
                    timeout: 3500
                });
                await router.push({
                    path: '/login'
                });
            } else {
                toast.error(response.data.message, {
                    timeout: 3500
                });
            }

        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
}

const service = new AuthService();
export default service;
