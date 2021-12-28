import EventEmitter from "events";
import store from "~/admin/store";

class SidebarService extends EventEmitter {
    async openNavigationItem(navigationItem) {
        await store.dispatch('actionSidebarOpenCloseConfig', {
            openByUrl: false,
            openedMainMenuId: navigationItem?.parent_id,
            openedSubMenuId: navigationItem?.id
        });
    }
}

const service = new SidebarService();
export default service;
