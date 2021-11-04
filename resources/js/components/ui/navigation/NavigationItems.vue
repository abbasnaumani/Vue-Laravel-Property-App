<template>
    <ul :class="classes">
        <li class="nav-main-item" v-for="item in menu">
            <navigation-item :menuItem="item" v-if="!subMenu[item.id]"/>
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
               v-if="subMenu[item.id]"
               aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon si si-bulb"></i>
                <span class="nav-main-link-name">{{ item.name }}</span>
            </a>
            <navigation-items :classes="'nav-main-submenu'" :menu="subMenu[item.id]"
                              :subMenu="subMenu" v-if="subMenu[item.id]"/>
        </li>
    </ul>
</template>

<script>
import NavigationItem from "./NavigationItem";

export default {
    name: "NavigationItems",
    components: {NavigationItem},
    props: {
        classes: String,
        menu: Object,
        subMenu: Object,
    },
    setup(props) {
        const checkSubMenu = (data) => {
            return props.subMenu[data] ? props.subMenu[data] : null;
        }
        return {checkSubMenu}
    },
}
</script>

<style scoped>

</style>
