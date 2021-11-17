import {computed} from "vue";
import store from "../store";
import countryService from "../services/countryService";

export const getCities = () => {
    const cities = computed(() => {
        return (store.getters.getCities)
            ? store.getters.getCities
            : null;
    });
    if (!cities.value) {
        countryService.getCities();
    }
    return cities;

}
