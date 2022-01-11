const state = {
    agencyContactUsData: null,
}
const getters = {
    getContactUsDataByAgencySlug(state) {
        return state.agencyContactUsData;
    },
}
const mutations = {
    mutateContactUs(state, agencyContactUsData) {
        state.agencyContactUsData = agencyContactUsData;
    }
}
const actions = {
    actionContactUs({commit, state},agencyContactUsData){
        commit('mutateContactUs', agencyContactUsData);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
