import {useToast} from "vue-toastification";
import EventEmitter from "events";
import appApi from "../../api";
import errorHandlerService from "~/frontsite/services/errorHandlerService";

const toast = useToast();

class ContactUs extends EventEmitter {
    async handleContactUs(contactUsData){
        try {
            const response = await appApi.post('/contact/us',contactUsData);
                toast.success(response.data.message);
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
