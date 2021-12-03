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
    return properties;
}
export const updatePropertyData = () => {
    propertyService.getPropertyList();
}
export const getPropertyDetails = (propertyId) => {
    const propertyDetails = computed(() => {
        return (store.getters.getPropertyDetails)
            ? store.getters.getPropertyDetails(propertyId)
            : null;
    });
    if (!propertyDetails.value) {
        propertyService.getPropertyList();
    }
    return propertyDetails;
}
export const getPropertyMedia = (propertyId) => {
    const propertyDetails = computed(() => {
        return (store.getters.getPropertyMedia)
            ? store.getters.getPropertyMedia(propertyId)
            : null;
    });
    if (!propertyDetails.value) {
        propertyService.getPropertyList();
    }
    return propertyDetails;
}
export const getProperty = (propertyId) => {
    const property = computed(() => {
        return (store.getters.getProperty)
            ? store.getters.getProperty(propertyId)
            : null;
    })
    if (!property.value) {
        propertyService.getPropertyList();
    }
    return property;
}
export const getPropertyTypes = () => {
    const propertyTypes = computed(() => {
        return (store.getters.getPropertyTypes)
            ? store.getters.getPropertyTypes
            : null;
    });
    if (!propertyTypes.value) {
        propertyService.getPropertyTypes();
    }
    return propertyTypes;
}
export const getAreaUnits = () => {
    const areaUnits = computed(() => {
        return (store.getters.getAreaUnits)
            ? store.getters.getAreaUnits
            : null;
    });
    if (!areaUnits.value) {
        propertyService.getAreaUnits();
    }
    return areaUnits;
}
// extra for checking searchable select box
export const getLocationsByCityId =  (cityId) => {
    const locations = computed(() => {
        return (store.getters.getLocationsByCityId)
            ? store.getters.getLocationsByCityId(cityId)
            : null;
    });
    if (!locations.value) {
        propertyService.getLocationsByCityId(cityId);
    }

    return locations;
}
