import {computed} from "vue";
import store from "../store";
import contactUsService from "../services/contactUsService";

export const getContactUsDataByAgencySlug = (slug) => {
    const contactUsData = computed(() => {
        return (store.getters.getContactUsDataByAgencySlug)
            ? store.getters.getContactUsDataByAgencySlug
            : null;
    });
    if (!contactUsData.value) {
        contactUsService.getContactUsDataByAgencySlug(slug);
    }
    return contactUsData;
}
