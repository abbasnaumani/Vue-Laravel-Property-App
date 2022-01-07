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
    setUsers(state, users) {
        state.users = users;
    },
    mutateRoles(state, roles) {
        state.roles = roles;
    },
}
const actions = {
    setUsers({commit, state},users){
        commit('setUsers', users);
    },
    setRoles({commit, state},roles){
        commit('mutateRoles', roles);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
