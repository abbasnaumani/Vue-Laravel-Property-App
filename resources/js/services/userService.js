import EventEmitter from "events";
import {ApiResponse} from "../constants";
import appApi from "../api";
import errorHandlerService from "./errorHandlerService";
import {useToast} from "vue-toastification";

const toast = useToast();
import store from "../store";

class UserService extends EventEmitter {
    async getUserList() {
        try {
            const response = await appApi.get('/user/list');
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message);
                await store.dispatch('setUsers', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async getUserMenu() {
        try {
            const response = await appApi.get('/user/menu');
            await store.dispatch('actionUserMenu', response.data.payload);
        } catch (err) {
            console.log(err, "err err");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async handleUserChat(data){
        try {
            console.log(data,"Asdsadas");
            const response = await appApi.post('/user/chat/send/message',data);
            toast.success(response.data.message);
            // await store.dispatch('actionUserMenu', response.data.payload);
        } catch (err) {
            console.log(err, "err err");
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
}

const service = new UserService();
export default service;
