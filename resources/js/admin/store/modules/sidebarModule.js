const state = {
    sidebarOpenCloseConfig: {
        openByUrl: true,
        openedMainMenuId: 0,
        openedSubMenuId: 0,
    },
}
const getters = {
    getSidebarOpenCloseConfig: (state) => {
        return state.sidebarOpenCloseConfig;
    },
}
const mutations = {
    mutateSidebarOpenCloseConfig(state, config) {
        state.sidebarOpenCloseConfig = config;
    },
}
const actions = {
    actionSidebarOpenCloseConfig({commit, state}, config) {
        commit('mutateSidebarOpenCloseConfig', config);
    },
}

export default {
    state,
    getters,
    actions,
    mutations
};
