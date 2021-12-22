const state = {
    users: null,
    userMenu: null,
    roles: null,
}
const getters = {
    getAgencyUsersList(state) {
        return state.users;
    },
    getUserMenu(state) {
        return state.userMenu;
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
    mutateUserMenu(state, userMenu) {
        state.userMenu = userMenu;
    }
}
const actions = {
    setUsers({commit, state},users){
        commit('setUsers', users);
    },
    setRoles({commit, state},roles){
        commit('mutateRoles', roles);
    },
    actionUserMenu({commit, state}, userMenu) {
        commit('mutateUserMenu', userMenu);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
