<template>
    <router-link :to="'/admin/'+menuItem.route" @click="handleOpenNavigationItem(menuItem)"
                 class="nav-main-link"
                 :class="{ 'active' : opened || (sidebarOpenCloseConfig?.openByUrl && menuItem.is_open)}">
        <i class="nav-main-link-icon si si-cursor"></i>
        <span class="nav-main-link-name">{{ menuItem.name }}</span>
    </router-link>
</template>

<script>
import sidebarService from "~/admin/services/sidebarService";

export default {
    name: "NavigationItem",
    props: {
        menuItem: Object,
        opened: Boolean,
        sidebarOpenCloseConfig: Object,
    },
    setup() {
        const handleOpenNavigationItem = (navigationItem) => {
            sidebarService.openNavigationItem(navigationItem);
        }
        return {
            handleOpenNavigationItem
        }
    }
}
</script>

<style scoped>
</style>
