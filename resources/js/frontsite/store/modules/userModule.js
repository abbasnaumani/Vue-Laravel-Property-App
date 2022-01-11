const state = {
    users: null,
    roles: null,
}
const getters = {
    getAgencyUsersList(state) {
        return state.users;
    },
    getAllRoles(state){
        return state.roles
    }
}
const mutations = {
    mutateUsers(state, users) {
        state.users = users;
    },
    mutateRoles(state, roles) {
        state.roles = roles;
    },
}
const actions = {
    actionUsers({commit, state},users){
        commit('mutateUsers', users);
    },
    actionRoles({commit, state},roles){
        commit('mutateRoles', roles);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
