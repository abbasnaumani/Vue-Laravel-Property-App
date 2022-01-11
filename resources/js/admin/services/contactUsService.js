import {useToast} from "vue-toastification";
import EventEmitter from "events";
import appApi from "~/api";
import {ApiResponse} from "~/constants";
import errorHandlerService from "~/admin/services/errorHandlerService";
import store from "../store";

const toast = useToast();

class ContactUs extends EventEmitter {
    // async handleContactUs(contactUsData){
    //     try {
    //         const response = await appApi.post('/contact/us',contactUsData);
    //         if (response.data.status === ApiResponse.SUCCESS) {
    //             return response.data;
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
    async getAllContactUsData(){
        try {
            const response = await appApi.get('/contact/us');
            await store.dispatch('actionContactUs',response.data.payload)
                return response.data;
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async deleteContactUsMessage(contactUsId){
        try {
            const response = await appApi.delete('/contact/us/'+contactUsId);
            await this.getAllContactUsData();
            return response.data;
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
}
const service = new ContactUs();
export default service;
