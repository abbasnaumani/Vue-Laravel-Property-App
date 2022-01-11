import {computed} from "vue";
import store from "../store";
import contactUsService from "../services/contactUsService";

export const getAllContactUsData = () => {
    const contactUsData = computed(() => {
        return (store.getters.getAllContactUsData)
            ? store.getters.getAllContactUsData
            : null;
    });
    if (!contactUsData.value) {
        contactUsService.getAllContactUsData();
    }
    return contactUsData;
}
