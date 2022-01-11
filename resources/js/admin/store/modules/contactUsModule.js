const state = {
    contactUs: null,
}
const getters = {
    getAllContactUsData(state) {
        return state.contactUs;
    },
}
const mutations = {
    mutateContactUs(state, contactUs) {
        state.contactUs = contactUs;
    }
}
const actions = {
    actionContactUs({commit, state},contactUs){
        commit('mutateContactUs', contactUs);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
