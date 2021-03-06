import {LocalStorageKeys} from "../../constants";

const state = {
    profile: JSON.parse(localStorage.getItem(LocalStorageKeys.PROFILE)) || null,
    accessToken: localStorage.getItem(LocalStorageKeys.ACCESS_TOKEN) || null,
}
const getters = {
    isAuthenticated(state) {
        return state.accessToken;
    },
    getProfile(state) {
        return state.profile;
    },
    getUserName(state) {
        if (state.profile) {
            return state.profile.first_name + ' ' + state.profile.last_name;
        }
        return null;
    },
    getAccessToken(state) {
        return state.accessToken;
    },
    getRoleIds(state) {
        return state.profile.roles.map(element => parseInt(element.id));
    },
}
const mutations = {
    mutateAuthState(state, {user, token}) {
        state.profile = user;
        state.accessToken = token;
    },
    clearAuthState(state) {
        state.profile = null;
        state.accessToken = null;
    },
}
const actions = {
    actionAuthState({commit}, {user, token}) {
        commit('mutateAuthState', {user, token});
        localStorage.setItem(LocalStorageKeys.PROFILE, JSON.stringify(user));
        localStorage.setItem(LocalStorageKeys.ACCESS_TOKEN, token);
    },
    actionClearAuthState({commit}) {
        commit('clearAuthState');
        localStorage.removeItem(LocalStorageKeys.PROFILE);
        localStorage.removeItem(LocalStorageKeys.ACCESS_TOKEN);
        localStorage.clear();
    }
}
export default {
    state,
    getters,
    actions,
    mutations
};
