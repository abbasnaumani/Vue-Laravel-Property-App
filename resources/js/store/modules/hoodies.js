const state = {
    hoddies: null,
}
const getters = {
    getHoodies:(state) => () => {
        return state.hoddies;
    },
}
const mutations = {
    mutateHoddies(state, hoddies) {
        state.hoddies = hoddies;
    },
}
const actions = {
    actionHoddies({commit, state},hoddies){
        commit('mutateHoddies', hoddies);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
