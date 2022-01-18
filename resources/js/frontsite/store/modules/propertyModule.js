const state = {
    properties: null,
    propertyParentTypes: null,
    propertyTypes: null,
    areaUnits: null,
    locations:null,
    searchFilters: null
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
    getPropertySearchFilters(state){
        return state.searchFilters;
    }
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
    mutateSearchFilter(state, filters) {
        state.searchFilters = filters;
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
    actionSearchFilter({commit, state},filters){
        commit('mutateSearchFilter', filters);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
