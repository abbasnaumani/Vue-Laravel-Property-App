const state = {
    users: null,
    userMenu: null,
}
const getters = {
    getUserList(state) {
        return state.users;
    },
    getUserMenu(state) {
        return state.userMenu;
    }
}
const mutations = {
    setUsers(state, users) {
        state.users = users;
    },
    mutateUserMenu(state, userMenu) {
        state.userMenu = userMenu;
    }
}
const actions = {
    setUsers({commit, state},users){
        commit('setUsers', users);
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
