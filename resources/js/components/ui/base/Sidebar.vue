<template>
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="font-w600 text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
                <span class="smini-hide font-size-h5 tracking-wider">
                <img :src=" ('/assets/images/ks-logo.png') " alt="tag" width="120">
                    <!-- One<span class="font-w400">UI</span> -->
            </span>
            </a>
            <!-- END Logo -->

            <!-- Extra -->
            <div>
                <!-- Options -->
                <div class="dropdown d-inline-block ml-2">
                    <a class="btn btn-sm btn-dual" id="sidebar-themes-dropdown"
                       data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="si si-drop"></i>
                    </a>
                </div>
                <!-- END Options -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none btn btn-sm btn-dual ml-1" data-toggle="layout"
                   data-action="sidebar_close"
                   href="javascript:void(0)">
                    <i class="fa fa-fw fa-times"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Extra -->
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side" v-if="userMenu">
                <navigation-items :classes="'nav-main'" :menu="userMenu.main_menu"
                                  :subMenu="userMenu.sub_menu"/>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
</template>

<script>
import {computed} from "vue";
import store from '~/store';
import userService from "../../../services/userService";
import NavigationItems from "../navigation/NavigationItems";

export default {
    name: "Sidebar",
    components: {NavigationItems},
    setup(props) {
        const userMenu = computed(() => {
            return store.getters.getUserMenu ? store.getters.getUserMenu : null;
        });
        if (!userMenu.value) {
            userService.getUserMenu();
        }
        // const getUserMenu = () => {
        //     const userMenu = computed(() => {
        //         return store.getters.getUserMenu ? store.getters.getUserMenu : null;
        //     });
        //     if (!userMenu.value) {
        //         userService.getUserMenu();
        //     }
        //     return userMenu;
        // };
        return {userMenu}
    },
}
</script>

<style scoped>

</style>
