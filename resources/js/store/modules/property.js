const state = {
    properties: null,
    propertyTypes: null,
    areaUnits: null,
}
const getters = {
    getPropertyList(state) {
        return state.properties;
    },
    getPropertyDetails:(state) => (propertyId) => {
        return state.properties !== null ?  state.properties.find(property => property.id == propertyId)?.property_detail : null;
    },
    getProperty:(state) => (propertyId) => {
        return state.properties !== null ?  JSON.parse(JSON.stringify(state.properties.find(property => property.id == propertyId))): null;
    },
    getPropertyTypes(state){
        return state.propertyTypes;
    },
    getAreaUnits(state){
        return state.areaUnits;
    }
}
const mutations = {
    mutatePropertyList(state, properties) {
        state.properties = properties;
    },
    mutatePropertyTypes(state, propertyTypes) {
        state.propertyTypes = propertyTypes;
    },
    mutateAreaUnits(state, areaUnits) {
        state.areaUnits = areaUnits;
    },

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
}

export default {
    state,
    getters,
    actions,
    mutations
};
