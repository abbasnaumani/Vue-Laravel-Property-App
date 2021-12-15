import {computed} from "vue";
import store from "../store";
import userService from "../services/userService";

export const getAgencyUsersList = () => {
    const users = computed(() => {
        return (store.getters.getAgencyUsersList)
            ? store.getters.getAgencyUsersList
            : null;
    });
    if (!users.value) {
        userService.getAgencyUsersList();
    }
    return users;

}
export const updateUserData = () => {
    userService.getAgencyUsersList();
}
export const getAllRoles = () => {
    const roles = computed(() => {
        return (store.getters.getAllRoles)
            ? store.getters.getAllRoles
            : null;
    });
    if (!roles.value) {
        userService.getAllRoles();
    }
    return roles;

}
