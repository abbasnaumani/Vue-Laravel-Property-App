import EventEmitter from "events";
import {ApiResponse} from "../constants";
import appApi from "../api";
import store from '~/store';
import errorHandlerService from "./errorHandlerService";
import {useToast} from "vue-toastification";

const toast = useToast();

class UserService extends EventEmitter {
    async getUserList() {
        try {
            const response = await appApi.get('/user/list');
            if (response.data.status == ApiResponse.SUCCESS) {
                toast.success(response.data.message, { // successful registration will auto Logged-in the user
                    timeout: 3500
                });
                this.emit('userListResponse', response);
            } else {
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

    async getUserMenu() {
        try {
            const response = await appApi.get('/user/menu');
            store.dispatch('actionUserMenu', response.data.data);
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message, {
                timeout: 5000
            });
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
}

const service = new UserService();
export default service;
