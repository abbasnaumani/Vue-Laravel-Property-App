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
export const getAgencyBySlug = (slug) => {
    const agency = computed(() => {
        return (store.getters.getAgencyBySlug)
            ? store.getters.getAgencyBySlug(slug)
            : null;
    });
    if (!agency.value) {
        agencyService.getAgencyBySlug(slug);
    }
    return agency;

}
export const getCurrentAgency = () => {
    return computed(()=> {
        return store.getters.getCurrentAgency;
    })
}
export const getAllAgencies = () => {
    const agencies = computed(() => {
        return (store.getters.getAllAgencies)
            ? store.getters.getAllAgencies
            : null;
    });
    if (!agencies.value) {
        agencyService.getAllAgencies();
    }
    return agencies;

}
