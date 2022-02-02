import EventEmitter from "events";
import appApi from "~/api";
import {ApiResponse} from "~/constants";
import errorHandlerService from "~/admin/services/errorHandlerService";
import {useToast} from "vue-toastification";
import router from "~/admin/router";
import store from "~/admin/store";
const toast = useToast();

class AgencyService extends EventEmitter {

    // async getAgencyUsersBySlug(slug) {
    //     try {
    //         console.log(slug,"slug")
    //         const response = await appApi.get('/'+slug+'/agency/users');
    //         if (response.data.status === ApiResponse.SUCCESS) {
    //             await store.dispatch('actionAgencyUsersBySlug', response.data.payload);
    //             // return response.data.payload;
    //         } else {
    //             toast.error(response.data.message);
    //         }
    //
    //     } catch (err) {
    //         console.log(err, "err err")
    //         toast.error(err.response.data.message);
    //         const error = await errorHandlerService.errors.index(err);
    //         console.log(error, "error catch")
    //     }
    // }
    async handleAddAgency(agencyData){
        try {
            const response = await appApi.post('/agency',agencyData);
            if (response.data.status === ApiResponse.SUCCESS) {
                toast.success(response.data.message);
                await store.dispatch('actionAgencies', response.data.payload);
                router.push({name: 'agency-list'});
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }

    async handleUpdateAgency(agencyData,agencyId){
        try {
            const response = await appApi.post('/agency/'+agencyId,agencyData);
                toast.success(response.data.message);
                await store.dispatch('actionAgencies', response.data.payload);
                router.push({name: 'agency-list'});

        } catch (err) {
            // await this.getAgencyList();
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async getAgencyList() {
        try {
            const response = await appApi.get('/agency/list');
            if (response.data.status === ApiResponse.SUCCESS) {
                await store.dispatch('actionAgencies', response.data.payload);
            } else {
                toast.error(response.data.message);
            }

        } catch (err) {
            console.log(err, "err err")
            const error = await errorHandlerService.errors.index(err);
            toast.error(error.message);
        }
    }
    async deleteAgency(agencyId){
        try {
            const response = await appApi.delete('/agency/'+agencyId);
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
    async getAgencyUsers(agencyId){
        try {
            const response = await appApi.get('/agency/'+agencyId+'/users');
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
const service = new AgencyService();
export default service;
