import {computed} from "vue";
import store from "../store";
import propertyService from "../services/propertyService";

export const getPropertyList = () => {
    const properties = computed(() => {
        return (store.getters.getPropertyList)
            ? store.getters.getPropertyList
            : null;
    });
    if (!properties.value) {
        propertyService.getPropertyList();
    }
    return {properties};

}
