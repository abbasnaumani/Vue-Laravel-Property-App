const state = {
    loaderState: false,
}
const getters = {
    getLoaderState(state) {
        return state.loaderState;
    },
}
const mutations = {
    mutateLoaderState(state, loaderState) {
        state.loaderState = loaderState;
    },
}
const actions = {
    actionLoaderState({commit}, loaderState) {
        commit('mutateLoaderState', loaderState);
    }
}
export default {
    state,
    getters,
    actions,
    mutations
};
