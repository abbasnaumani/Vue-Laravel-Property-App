
const state = {
    cities: null,
    locations: null,
}
const getters = {
    getCities(state) {
        return state.cities;
    },
    getAllLocationsByCItyId:(state) => (cityId) =>{
        return state.locations !== null ?  JSON.parse(JSON.stringify(state.locations.filter(location => location.city_id == cityId))): null;
    },
}
const mutations = {
    mutateCities(state, cities) {
        state.cities = cities;
    },
    mutateLocationsByCityId(state, locations) {
        state.locations = locations;
    }
}
const actions = {
    actionCities({commit, state},cities){
        commit('mutateCities', cities);
    },
    actionLocationsByCityId({commit, state},locations){
        commit('mutateLocationsByCityId', locations);
    }
}

export default {
    state,
    getters,
    actions,
    mutations
};
