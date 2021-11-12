import EventEmitter from "events";
import appApi from "../api";
import {ApiResponse} from "../constants";
import store from "../store";
import errorHandlerService from "./errorHandlerService";
import {useToast} from "vue-toastification";

const toast = useToast();

class PropertyService extends EventEmitter {
    async getPropertyList() {
        try {
            const response = await appApi.get('/properties');
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message, );
                await store.dispatch('actionPropertyList', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }

}

const service = new PropertyService();
export default service;
