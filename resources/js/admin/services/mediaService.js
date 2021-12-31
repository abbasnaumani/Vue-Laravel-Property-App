import EventEmitter from "events";
import appApi from "~/api";
import {useToast} from "vue-toastification";
import errorHandlerService from "~/admin/services/errorHandlerService";
import propertyService from "./propertyService";

const toast = useToast();

class MediaService extends EventEmitter {
    async deleteMedia(mediaId) {
        try {
            const response = await appApi.delete('/media/'+mediaId);
                toast.success(response.data.message,);
                await propertyService.getUserPropertyList();

        } catch (err) {
            console.log(err, "err err")
            toast.error(err.response.data.message);
            const error = await errorHandlerService.errors.index(err);
            console.log(error, "error catch")
        }
    }
}

const service = new MediaService();
export default service;
