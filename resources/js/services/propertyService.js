import EventEmitter from "events";
import appApi from "../api";
import {ApiResponse} from "../constants";
import store from "../store";
import errorHandlerService from "./errorHandlerService";
import {useToast} from "vue-toastification";
import router from "~/router";

const toast = useToast();

class PropertyService extends EventEmitter {
    async getPropertyList() {
        try {
            const response = await appApi.get('/properties');
            if (response.data.status === ApiResponse.SUCCESS) {
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
    async getPropertyTypes() {
        try {
            const response = await appApi.get('/property/types');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionPropertyTypes', response.data.payload);
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
    async getAreaUnits(){
        try {
            const response = await appApi.get('/property/area/unit');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionAreaUnits', response.data.payload);
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
    async handleAddProperty(newProperty){
        try {
            const response = await appApi.post('/properties',newProperty);
            console.log(response,"response");
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionPropertyList', response.data.payload);
                 router.push({name: 'property-dashboard'});
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
    async deleteProperty(propertyId){
        try {
            const response = await appApi.delete('/properties/'+propertyId);
            if (response.data.status === ApiResponse.SUCCESS) {
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
    async handleUpdateProperty(dataToUpdate,propertyId){
        try {
            const response = await appApi.put('/properties/'+propertyId,dataToUpdate);
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionPropertyList', response.data.payload);
                router.push({name: 'property-dashboard'});
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
    async  getLocationsByCityId(cityId){
        try {
            const response = await appApi.get('/property/locations/'+cityId);
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionGetLocationsByCityId', response.data.payload);
                return response.data.payload;
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
