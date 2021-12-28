const state = {
    sidebarOpenCloseConfig: {
        openByUrl: true,
        openedMainMenuId: 0,
        openedSubMenuId: 0,
    }
}
const getters = {
    getSidebarOpenCloseConfig: (state) => {
        return state.sidebarOpenCloseConfig;
    },
  /*  getOpenedMainMenuId: (state) => {
        return state.openedMainMenuId;
    },
    getOpenedSubMenuId: (state) => {
        return state.openedSubMenuId;
    },*/
}
const mutations = {
    mutateSidebarOpenCloseConfig(state, config) {
        state.sidebarOpenCloseConfig = config;
    },
  /*  mutateOpenedMainMenuId(state, id) {
        state.openedMainMenuId = id;
    },
    mutateOpenedSubMenuId(state, id) {
        state.openedSubMenuId = id;
    }*/
}
const actions = {
    actionSidebarOpenCloseConfig({commit, state}, config) {
        commit('mutateSidebarOpenCloseConfig', config);
    },
    /*actionOpenedMainMenuId({commit, state}, id) {
        commit('OpenedMainMenuId', id);
    },
    actionOpenedSubMenuId({commit, state}, id) {
        commit('mutateOpenedSubMenuId', id);
    },*/
}

export default {
    state,
    getters,
    actions,
    mutations
};
