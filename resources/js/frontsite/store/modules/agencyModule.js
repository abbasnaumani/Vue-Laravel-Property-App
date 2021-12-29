const state = {
    agencyUsersBySlug: null,
    currentAgencySlug: null,
    defaultAgencySlug: 'kode-studio',
}
const getters = {
    getAgencyUsersBySlug:(state) => (slug) => {
        return state.agencyUsersBySlug;
    },
    getCurrentAgencySlug(){
        return state.currentAgencySlug;
    },
    getDefaultAgencySlug(){
        return state.defaultAgencySlug;
    }
}
const mutations = {
    mutateAgencyUsersBySlug(state, agencyUsers) {
        state.agencyUsersBySlug = agencyUsers;
    },
    mutateCurrentAgencySlug(state, slug) {
        state.currentAgencySlug = slug;
    },
}
const actions = {
    actionAgencyUsersBySlug({commit, state},agencyUsers){
        commit('mutateAgencyUsersBySlug', agencyUsers);
    },
    actionCurrentAgencySlug({commit, state},slug){
        commit('mutateCurrentAgencySlug', slug);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
