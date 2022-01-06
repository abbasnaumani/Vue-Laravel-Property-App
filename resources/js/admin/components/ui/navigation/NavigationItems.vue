<template>
    <ul :class="classes" v-if="menu" >
        <template v-for="item in menu" :key="item.id">
            <li class="nav-main-item "
                :class="{ 'open' : item.id===openItemId || sidebarOpenCloseConfig?.openedMainMenuId===item.id || item.is_open && sidebarOpenCloseConfig?.openByUrl}"
            >

                <navigation-item
                    :menuItem="item"
                    v-if="!subMenu[item.id]"
                    :opned="item.id===openItemId" :sidebarOpenCloseConfig="sidebarOpenCloseConfig"
                />
                <a
                    class="nav-main-link nav-main-link-submenu"
                    @click="handleOpenItem(item.id)"
                    v-if="subMenu[item.id]" href="#">
                    <i class="nav-main-link-icon si si-bulb"></i>
                    <span class="nav-main-link-name">{{ item.name }}</span>
                </a>
                <navigation-items :classes="'nav-main-submenu'" :menu="subMenu[item.id]"
                                  :subMenu="subMenu" v-if="subMenu[item.id]"/>
            </li>
        </template>
    </ul>
</template>

<script>
import NavigationItem from "./NavigationItem";
import {ref} from "vue";

export default {
    name: "NavigationItems",
    components: {NavigationItem},
    props: {
        classes: String,
        menu: Object,
        subMenu: Object,
        sidebarOpenCloseConfig: Object,
    },
    setup() {
        const openItemId = ref(0);
        const handleOpenItem = (itemId) => {
            openItemId.value = openItemId.value === itemId ? 0 : itemId;
        }
        return {
            handleOpenItem,
            openItemId,
        }
    },
}
</script>

<style scoped>
</style>
