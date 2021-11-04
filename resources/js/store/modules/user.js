const state = {
    userMenu: null,
}
const getters = {
    getUserMenu(state) {
        return state.userMenu;
    }
}
const mutations = {
    mutateUserMenu(state, userMenu) {
        state.userMenu = userMenu;
    }
}
const actions = {
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
