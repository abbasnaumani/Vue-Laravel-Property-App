const state = {
    agencyBySlug: null,
    agencies: null,
    agencyUsersBySlug: null,
    currentAgencySlug: null,
    defaultAgencySlug: 'kode-studio',
}
const getters = {
    getAllAgencies(state)  { // get all agencies
        return state.agencies;
    },
    getAgencyUsersBySlug:(state) => (slug) => {
        return state.agencyUsersBySlug;
    },
    getCurrentAgencySlug(state){
        return state.currentAgencySlug;
    },
    getDefaultAgencySlug(state){
        return state.defaultAgencySlug;
    },
    getAgencyBySlug:(state) => (slug) =>{ // get specific agency by slug
        return state.agencyBySlug
    }
}
const mutations = {
    mutateAgencyUsersBySlug(state, agencyUsers) {
        state.agencyUsersBySlug = agencyUsers;
    },
    mutateCurrentAgencySlug(state, slug) {
        state.currentAgencySlug = slug;
    },
    mutateAgencies(state, agencies) {
        state.agencies = agencies;
    },
    mutateAgencyBySlug(state, agency) {
        state.agencyBySlug = agency;
    },
}
const actions = {
    actionAgencyUsersBySlug({commit, state},agencyUsers){
        commit('mutateAgencyUsersBySlug', agencyUsers);
    },
    actionCurrentAgencySlug({commit, state},slug){
        commit('mutateCurrentAgencySlug', slug);
    },
    actionAgencies({commit, state},agencies){
        commit('mutateAgencies', agencies);
    },
    actionAgencyBySlug({commit, state},agency){
        commit('mutateAgencyBySlug', agency);
    },
}
export default {
    state,
    getters,
    actions,
    mutations
};
