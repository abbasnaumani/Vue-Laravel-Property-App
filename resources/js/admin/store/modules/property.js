import {getPropertyMedia} from "../../composables/property";

const state = {
    properties: null,
    propertyTypes: null,
    areaUnits: null,
    locations:null
}
const getters = {
    getUserPropertyList(state) {
        return state.properties;
    },
    getPropertyDetails:(state) => (propertyId) => {
        return state.properties !== null ?  state.properties.find(property => property.id == propertyId)?.property_detail : null;
    },
    getPropertyMedia:(state) => (propertyId) => {
        return state.properties !== null ?  state.properties.find(property => property.id == propertyId)?.media : null;
    },
    getProperty:(state) => (propertyId) => {
        return state.properties !== null ?  JSON.parse(JSON.stringify(state.properties.find(property => property.id == propertyId))): null;
    },
    getPropertiesBySlug:(state) => (slug) => {
        return state.properties !== null ?  JSON.parse(JSON.stringify(state.properties.filter(property => console.log(property,"store console.",slug)))): null;
    },
    getPropertyTypes(state){
        return state.propertyTypes;
    },
    getAreaUnits(state){
        return state.areaUnits;
    },
    getLocationsByCityId:(state) => (cityId) => {
        return state.locations !== null ?  state.locations.filter(location => location.city_id == cityId) : null;
    }
}
const mutations = {
    mutatePropertyList(state, properties) {
        state.properties = properties;
    },
    mutatePropertiesBySlug(state, properties) {
        state.properties = properties;
    },
    mutatePropertyTypes(state, propertyTypes) {
        state.propertyTypes = propertyTypes;
    },
    mutateAreaUnits(state, areaUnits) {
        state.areaUnits = areaUnits;
    },
    mutateAddProperty(state, propertyData) {
        let property = [...state.properties];
        property = [...property,propertyData];
        state.properties = [...property];
    },
    mutateLocationByCityId(state,locations){
        state.locations = locations;
    }
}
const actions = {
    actionPropertyList({commit, state},properties){
        commit('mutatePropertyList', properties);
    },
    actionPropertyTypes({commit, state},propertyTypes){
        commit('mutatePropertyTypes', propertyTypes);
    },
    actionAreaUnits({commit, state},areaUnits){
        commit('mutateAreaUnits', areaUnits);
    },
    actionAddProperty({commit, state},propertyData){
        commit('mutateAddProperty', propertyData);
    },
    actionGetLocationsByCityId({commit, state},locations){
        commit('mutateLocationByCityId', locations);
    },
    actionPropertiesBySlug({commit, state},properties){
        console.log(properties,"action store")
        commit('mutatePropertiesBySlug', properties);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
