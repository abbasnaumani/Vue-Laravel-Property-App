
const state = {
    cities: null,
}
const getters = {
    getCities(state) {
        return state.cities;
    },
}
const mutations = {
    mutateCities(state, cities) {
        state.cities = cities;
    }
}
const actions = {
    actionCities({commit, state},cities){
        commit('mutateCities', cities);
    }
}

export default {
    state,
    getters,
    actions,
    mutations
};
