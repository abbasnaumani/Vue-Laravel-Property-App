const state = {
    users: null,
}
const getters = {
    getUserList(state) {
        return state.users;
    },
}
const mutations = {
    setUsers(state, users) {
        state.users = users;
    },
}
const actions = {
    setUsers({commit, state},users){
        commit('setUsers', users);
    },
}
export const user = {
    state,
    getters,
    actions,
    mutations
};
