import {computed} from "vue";
import store from "../store";
import propertyService from "../services/propertyService";

export const getUserPropertyList = () => {
    const properties = computed(() => {
        return (store.getters.getUserPropertyList)
            ? store.getters.getUserPropertyList
            : null;
    });
    if (!properties.value) {
        propertyService.getUserPropertyList();
    }
    return properties;
}
export const updatePropertyData = () => {
    propertyService.getUserPropertyList();
}
export const getPropertyDetails = (propertyId) => {
    const propertyDetails = computed(() => {
        return (store.getters.getPropertyDetails)
            ? store.getters.getPropertyDetails(propertyId)
            : null;
    });
    if (!propertyDetails.value) {
        propertyService.getUserPropertyList();
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
        propertyService.getUserPropertyList();
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
        propertyService.getUserPropertyList();
    }
    return property;
}
export const getPropertiesBySlug = (slug) => {
    const properties = computed(() => {
        return (store.getters.getPropertiesBySlug)
            ? store.getters.getPropertiesBySlug(slug)
            : null;
    })
    if (!properties.value) {
        propertyService.getPropertiesBySlug(slug);
    }
    return properties;
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
