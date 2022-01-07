import EventEmitter from "events";
import appApi from "../../api";
import errorHandlerService from "~/frontsite/services/errorHandlerService";
import {useToast} from "vue-toastification";

const toast = useToast();
import store from "../store";

class CountryService extends EventEmitter {
    async getCities() {
        try {
            const response = await appApi.get('/country/cities');
                await store.dispatch('actionCities', response.data.payload);
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async getAllLocationsByCItyId(cityId) {
        try {
            const response = await appApi.get('/country/'+cityId+'/locations');
                await store.dispatch('actionLocationsByCityId', response.data.payload);
        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
}

const service = new CountryService();
export default service;
