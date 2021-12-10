const state = {
    agencyUsersBySlug: null,
}
const getters = {
    getAgencyUsersBySlug:(state) => (slug) => {
        return state.agencyUsersBySlug;
    },
}
const mutations = {
    mutateAgencyUsersBySlug(state, agencyUsers) {
        state.agencyUsersBySlug = agencyUsers;
    },
}
const actions = {
    actionAgencyUsersBySlug({commit, state},agencyUsers){
        commit('mutateAgencyUsersBySlug', agencyUsers);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
