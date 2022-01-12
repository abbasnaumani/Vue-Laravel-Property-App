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
export const getAgencyUserById = (userId) => {
    const user = computed(() => {
        return (store.getters.getAgencyUserById)
            ? store.getters.getAgencyUserById(userId)
            : null;
    });
    if (!user.value) {
        userService.getAgencyUsersList();
    }
    return user;
}
export const updateUserData = () => {  // not use
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
