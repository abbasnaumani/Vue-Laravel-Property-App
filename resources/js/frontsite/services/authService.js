import EventEmitter from 'events';
import appApi from "~/api/index";
import store from "~/frontsite/store";
import errorHandlerService from '~/frontsite/services/errorHandlerService';
import {useToast} from "vue-toastification";
import {ApiResponse, LocalStorageKeys} from "~/constants";
import router from "~/frontsite/router";
import localStorageService from "~/services/localStorageService";
import {UserRoles} from "~/constants";

const toast = useToast();

class AuthService extends EventEmitter {
    async handleRegistration(newUser) {
        try {
            const response = await appApi.post('/register', newUser);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success("Registration Completed!");
                await store.dispatch('actionAuthState', response.data.payload);
                if(response.data.payload.user.roles[0].id !== UserRoles.SUPER_ADMIN)
                    router.push({path: '/'+response.data.payload.user.agencies[0].slug});
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
            const response = await appApi.post('/login', credentials);
            if (response.data.status === ApiResponse.SUCCESS) {
                console.log(response.data,"login success");
                await store.dispatch('actionAuthState', response.data.payload);
                await store.dispatch('actionAgencyBySlug', response.data.payload.user.agencies[0]);
                if(response.data.payload.user.roles[0].id !== UserRoles.SUPER_ADMIN)
                router.push({path: '/'+response.data.payload.user.agencies[0].slug});
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }

    }

    isAuthenticated() {
        const accessToken = store.getters.getAccessToken;
        if (!accessToken) {
            return false;
        }
        return true;
    }

    async handleLogout() {
        try {
            const response = await appApi.post('/logout');
            if (response.data.status === ApiResponse.SUCCESS) {
                await this.onLogout();
            } else {
                toast.error(response.data.message);
            }
        } catch (err) {
            console.log(err, "catch error");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    user() {
        return store.getters['getProfile'];
    }

    async onLogout() {
        await store.dispatch('actionClearAuthState');
        router.push({name: `main-login`});
    }
    verifyRoleIdsAccess(userRoleIds) {
        const roles = store.getters['getRoleIds'];
        return roles.some(v => userRoleIds.indexOf(v) >= 0);
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
                    params: {encodedToken: response.data.payload.token}
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
