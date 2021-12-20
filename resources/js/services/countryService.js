import EventEmitter from "events";
import {ApiResponse} from "../constants";
import appApi from "../api";
import errorHandlerService from "../common/services/errorHandlerService";
import {useToast} from "vue-toastification";

const toast = useToast();
import store from "../store";

class CountryService extends EventEmitter {
    async getCities() {
        try {
            const response = await appApi.get('/country/cities');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionCities', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async getAllLocationsByCItyId(cityId) {
        try {
            const response = await appApi.get('/country/'+cityId+'/locations');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionLocationsByCityId', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
}

const service = new CountryService();
export default service;
