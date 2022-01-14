import EventEmitter from "events";
import appApi from "../../api";
import {ApiResponse} from "../../constants";
import errorHandlerService from "~/frontsite/services/errorHandlerService";
import {useToast} from "vue-toastification";
import store from "~/frontsite/store";
const toast = useToast();

class AgencyService extends EventEmitter {

    async getAgencyUsersBySlug(slug) {
        try {
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
    async updateAgencyProfile(profileData){
        try {
            const response = await appApi.put('/agency/update/profile',profileData);
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionAgencyProfile', response.data.payload);
                console.log(response.data.payload,"asdjhaskhdakshdk");
                toast.success(response.data.message, );
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
    async getAgencyBySlug(slug){
        try {
            const response = await appApi.get('/agency/'+slug);
            await store.dispatch('actionAgencyBySlug', response.data.payload);

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getAllAgencies(){
        try {
            const response = await appApi.get('/agency/list');
            await store.dispatch('actionAgencies', response.data.payload);

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
