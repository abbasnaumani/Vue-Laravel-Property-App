const state = {
    agencyUsersBySlug: null,
    agencies:null
}
const getters = {
    getAgencyUsersBySlug:(state) => (slug) => {
        return state.agencyUsersBySlug;
    },
    getAgencyList(state) {
        return state.agencies;
    },
    getAgencyUsersListById:(state) => (agencyId) =>{
        return state.agencies !== null ?  state.agencies.find(agency => agency.id == agencyId)?.users : null;
    }
}
const mutations = {
    mutateAgencyUsersBySlug(state, agencyUsers) {
        state.agencyUsersBySlug = agencyUsers;
    },
    setAgencies(state, agencies) {
        state.agencies = agencies;
    },
}
const actions = {
    actionAgencyUsersBySlug({commit, state},agencyUsers){
        commit('mutateAgencyUsersBySlug', agencyUsers);
    },
    setAgencies({commit, state},agencies){
        commit('setAgencies', agencies);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
