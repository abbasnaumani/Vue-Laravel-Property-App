import EventEmitter from "events";
import appApi from "../../api";
import {ApiResponse} from "../../constants";
import errorHandlerService from "../../services/errorHandlerService";
import {useToast} from "vue-toastification";
import router from "~/frontsite/router";
import store from "~/frontsite/store";
const toast = useToast();

class AgencyService extends EventEmitter {

    async getAgencyUsersBySlug(slug) {
        try {
            console.log(slug,"slug")
            const response = await appApi.get('/'+slug+'/agency/users');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionAgencyUsersBySlug', response.data.payload);
                // return response.data.payload;
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
const service = new AgencyService();
export default service;