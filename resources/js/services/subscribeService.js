import {useToast} from "vue-toastification";
import EventEmitter from "events";
import router from "~/router";
import appApi from "../api";
import {ApiResponse} from "../constants";
import errorHandlerService from "../common/services/errorHandlerService";

const toast = useToast();

class SubscribeService extends EventEmitter {
    async handleSubscription(subscriptionData){
        try {
            const response = await appApi.post('/subscribers',subscriptionData);
            if (response.data.status === ApiResponse.SUCCESS) {
                return response.data;
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
const service = new SubscribeService();
export default service;
