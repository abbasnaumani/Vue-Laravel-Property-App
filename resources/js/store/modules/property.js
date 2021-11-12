const state = {
    properties: null,
}
const getters = {
    getPropertyList(state) {
        return state.properties;
    },
}
const mutations = {
    mutatePropertyList(state, properties) {
        state.properties = properties;
    },
}
const actions = {
    actionPropertyList({commit, state},properties){
        commit('mutatePropertyList', properties);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
