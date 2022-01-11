const state = {
    properties: null,
    propertyParentTypes: null,
    propertyTypes: null,
    areaUnits: null,
    locations:null
}
const getters = {
    getParentTypes(state){
        return state.propertyParentTypes;
    },
    getPropertyTypes(state){
        return state.propertyTypes;
    },
    getAreaUnits(state){
        return state.areaUnits;
    },
}
const mutations = {
    mutatePropertyTypes(state, propertyTypes) {
        state.propertyTypes = propertyTypes;
    },
    mutatePropertyParentTypes(state, types) {
        state.propertyParentTypes = types;
    },
    mutateAreaUnits(state, areaUnits) {
        state.areaUnits = areaUnits;
    },
}
const actions = {
    actionPropertyTypes({commit, state},propertyTypes){
        commit('mutatePropertyTypes', propertyTypes);
    },
    actionPropertyParentTypes({commit, state},types){
        commit('mutatePropertyParentTypes', types);
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
