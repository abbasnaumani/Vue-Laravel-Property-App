const state = {
    agencyUsersBySlug: null,
    agencies:null,
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
    },
    getAgencyById:(state) => (agencyId) => {
        return state.agencies !== null ?  state.agencies.find(agency => agency.id == agencyId) : null;
    }
}
const mutations = {
    mutateAgencyUsersBySlug(state, agencyUsers) {
        state.agencyUsersBySlug = agencyUsers;
    },
    mutateAgencies(state, agencies) {
        state.agencies = agencies;
    },
}
const actions = {
    actionAgencyUsersBySlug({commit, state},agencyUsers){
        commit('mutateAgencyUsersBySlug', agencyUsers);
    },
    actionAgencies({commit, state},agencies){
        commit('mutateAgencies', agencies);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
