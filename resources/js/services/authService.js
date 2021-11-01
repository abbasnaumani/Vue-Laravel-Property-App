import EventEmitter from 'events';
import axios from "axios";
import appApi from "../api/index";
import store from "../store";
import errorHandlerService from '../services/errorHandlerService';

const localStorageKey = "loggedIn";

class AuthService extends EventEmitter {
    async handleLogin(email, password) {
        let credentials = {email, password};
        try {
            const response = await appApi.post('/login', credentials)
            console.log('response', response);
            //this.onLogin(data.data.token,data.data.user_data);
            //this.emit('loginSuccess',data);
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }

      /*  let response = await appApi.post('/login', credentials)
        .then(data => {
            if (data.status == 200) {
                this.onLogin(data.data.token, data.data.user_data);
                this.emit('loginSuccess', data);
            }
        })
        .catch(async err => {
            const error = await errorHandlerService.errors.index(err);
            console.log("catch errors", error)
        });*/
    }

    async onLogin(token, profile) {
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
        let response = await axios.post('/logout')
        .then(data => {
            if (data.status == 200) {
                this.onLogout();
                this.emit('logoutSuccess', data);
            }
        })
        .catch(error => {
            console.log(error, "error catch")
        });
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
