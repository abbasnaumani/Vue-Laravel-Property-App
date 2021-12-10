import {computed} from "vue";
import store from "../store";
import userService from "../services/userService";
import agencyService from "../services/agencyService";

export const getAgencyUsersBySlug = (slug) => {
    const agencyUsers = computed(() => {
        return (store.getters.getAgencyUsersBySlug)
            ? store.getters.getAgencyUsersBySlug(slug)
            : null;
    });
    if (!agencyUsers.value) {
        agencyService.getAgencyUsersBySlug(slug);
    }
    return agencyUsers;

}
