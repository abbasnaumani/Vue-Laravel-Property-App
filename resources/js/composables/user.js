import {computed} from "vue";
import store from "../store";
import userService from "../services/userService";

export const getUserList = () => {
    const users = computed(() => {
        return (store.getters.getUserList)
            ? store.getters.getUserList
            : null;
    });
    if (!users.value) {
        userService.getUserList();
    }
    return users;

}
