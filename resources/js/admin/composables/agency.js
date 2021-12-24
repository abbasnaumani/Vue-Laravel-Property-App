import {computed} from "vue";
import store from "~/admin/store";
import agencyService from "~/admin/services/agencyService";

export const getAgencyList = () =>{
    const agencies = computed(() => {
        return (store.getters.getAgencyList)
            ? store.getters.getAgencyList
            : null;
    });
    if (!agencies.value) {
        agencyService.getAgencyList();
    }
    return agencies;
}

export const getAgencyUsersList = (agencyId) => {
    const agencies = computed(() => {
        return (store.getters.getAgencyUsersListById)
            ? store.getters.getAgencyUsersListById(agencyId)
            : null;
    });
    if (!agencies.value) {
        agencyService.getAgencyList();
    }
    return agencies;

}
export const updateAgencyUsersData = (agencyId) =>{
    agencyService.getAgencyUsers(agencyId);
}
export const updateAgencyData = () => {
    agencyService.getAgencyList();
}
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
export const getCurrentAgency = () => {
    return computed(()=> {
        return store.getters.getCurrentAgency;
    })
}
