const state = {
    profile: JSON.parse(localStorage.getItem('profile')) || null,
    accessToken: localStorage.getItem('accessToken') || null,
}
const getters = {
    isAuthenticated(state){
        return state.accessToken;
    },
    getProfile(state) {
        return state.profile;
    },
    // getUserFullname(state) {
    //     if (state.profile) {
    //         return state.profile.first_name + ' ' + state.profile.last_name;
    //     }
    //     return null;
    // },
    getAccessToken(state) {
        return state.accessToken;
    },
    // getRoleIds(state) {
    //     return state.profile.roles.map(element => parseInt(element.id));
    // },
}
const mutations = {
    setAuthState(state, {profile, token}) {
        localStorage.setItem('profile', JSON.stringify(profile));
        localStorage.setItem('accessToken', token);
        state.profile = profile;
        state.accessToken = token;
    },
    setProfile(state, profile) {
        localStorage.setItem('profile', JSON.stringify(profile));
        state.profile = profile;
    },
    clearAuthState(state) {
        state.profile = null;
        state.accessToken = null;
    },
}
const actions = {

    async setAuthState({dispatch,commit},{profile, token}){
        commit('setAuthState',{profile, token});
    },
    setProfile({commit, state},profile){
        commit('setProfile', profile);
    },
    clearAuthState({commit, state}) {
        commit('clearAuthState');
    },
    // logout ({ commit }) {
    //     localStorage.removeItem('token')
    //     return axios.post('logout').then(() => {
    //         commit('setToken',null)
    //         commit('setUserData',null)
    //     })
    //     commit('clearUserData')
    // }
}
export default {
    state,
    getters,
    actions,
    mutations
};
