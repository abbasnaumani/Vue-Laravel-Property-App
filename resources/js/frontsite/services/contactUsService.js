import { useToast } from "vue-toastification";
import EventEmitter from "events";
import appApi from "../../api";
import errorHandlerService from "~/frontsite/services/errorHandlerService";
import store from "~/frontsite/store";

const toast = useToast();

class ContactUs extends EventEmitter {
    async handleContactUs(contactUsData) {
        try {
            const response = await appApi.post('/contact/us', contactUsData);
            toast.success(response.data.message);
            return response.data;
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async getContactUsDataByAgencySlug(slug) {
        try {
            const response = await appApi.get('/contact/us/' + slug);
            await store.dispatch('actionContactUs', response.data.payload)
            return response.data.payload;
        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
    async deleteContactUsMessage(contactUsId, slug) {
        try {
            const response = await appApi.delete('/contact/us/' + contactUsId);
            await this.getContactUsDataByAgencySlug(slug);
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