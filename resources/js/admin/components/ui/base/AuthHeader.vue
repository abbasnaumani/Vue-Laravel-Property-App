<template>
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div class="d-flex align-items-center">
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button
                    type="button"
                    class="btn btn-sm btn-dual mr-2 d-lg-none"
                    data-toggle="layout"
                    data-action="sidebar_toggle"
                    @click="handleMobileMenu"
                >
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->

                <!-- Toggle Mini Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button"
                        class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block"
                        @click="handleSidebarMiniToggle"
                        data-toggle="layout"
                        data-action="sidebar_mini_toggle">
                    <i class="fa fa-fw fa-ellipsis-v"></i>
                </button>
                <!-- END Toggle Mini Sidebar -->
                <!-- Open Search Section (visible on smaller screens) -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-dual d-sm-none" data-toggle="layout"
                        data-action="header_search_on">
                    <i class="fa fa-fw fa-search"></i>
                </button>
                <!-- END Open Search Section -->

                <!-- Search Form (visible on larger screens) -->
                <form class="d-none d-sm-inline-block" action="/dashboard" method="GET">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control form-control-alt"
                               placeholder="Search.."
                               id="search-property" name="s">
                        <div class="input-group-append">
                                    <span class="input-group-text bg-body border-0">
                                        <i class="fa fa-fw fa-search"></i>
                                    </span>
                        </div>
                    </div>
                </form>
                <!-- END Search Form -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div class="d-flex align-items-center">
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block ml-2"
                     :class='{"show":profileMenuPopup}'>
                    <button
                        type="button"
                        class="btn btn-sm btn-dual d-flex align-items-center"
                        id="page-header-user-dropdown" data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        @click="handleProfileMenuPopup"
                    >
                        <img class="rounded-circle" :src=" ('/media/avatars/avatar10.jpg') "
                             alt="Header Avatar"
                             style="width: 21px;">
                        <span class="d-none d-sm-inline-block ml-2">
                            {{ profile?.first_name }}
                        </span>
                        <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ml-1 mt-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 border-0"
                         :class='{"show":profileMenuPopup}'
                         aria-labelledby="page-header-user-dropdown"
                    >
                        <div class="p-3 text-center bg-primary-dark rounded-top">
                            <img class="img-avatar img-avatar48 img-avatar-thumb"
                                 :src=" ('/media/avatars/avatar10.jpg')" alt="">
                            <p class="mt-2 mb-0 text-white font-w500">{{
                                    profile.first_name + ' ' + profile.last_name
                                }}</p>
                            <p class="mb-0 text-white-50 font-size-sm">
                                {{ profile?.roles[0]?.name }}</p>
                        </div>
                        <div class="p-2">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                               href="">
                                <span class="font-size-sm font-w500">Profile</span>
                                <span class="badge badge-pill badge-primary ml-2">1</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                               href="javascript:void(0)">
                                <span class="font-size-sm font-w500">Settings</span>
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <router-link to="/logout"
                                         class="dropdown-item d-flex align-items-center justify-content-between">
                                <span class="font-size-sm font-w500">Log Out</span>
                            </router-link>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->
                <!-- Notifications Dropdown -->
                <div class="dropdown d-inline-block ml-2"
                     :class='{"show":notificationMenuPopup}'
                >
                    <button type="button" class="btn btn-sm btn-dual"
                            @click="handleNotificationMenuPopup"
                            id="page-header-notifications-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="text-primary">•</span>
                    </button>
                    <div
                        class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm"
                        :class='{"show":notificationMenuPopup}'
                        aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-2 bg-primary-dark text-center rounded-top">
                            <h5 class="dropdown-header text-uppercase text-white">Notifications</h5>
                        </div>
                        <ul class="nav-items mb-0">
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mr-2 ml-3">
                                        <i class="fa fa-fw fa-check-circle text-success"></i>
                                    </div>
                                    <div class="media-body pr-2">
                                        <div class="font-w600">You have a new follower</div>
                                        <span class="font-w500 text-muted">15 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mr-2 ml-3">
                                        <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                    </div>
                                    <div class="media-body pr-2">
                                        <div class="font-w600">1 new sale, keep it up</div>
                                        <span class="font-w500 text-muted">22 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mr-2 ml-3">
                                        <i class="fa fa-fw fa-times-circle text-danger"></i>
                                    </div>
                                    <div class="media-body pr-2">
                                        <div class="font-w600">Update failed, restart server</div>
                                        <span class="font-w500 text-muted">26 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mr-2 ml-3">
                                        <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                    </div>
                                    <div class="media-body pr-2">
                                        <div class="font-w600">2 new sales, keep it up</div>
                                        <span class="font-w500 text-muted">33 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mr-2 ml-3">
                                        <i class="fa fa-fw fa-user-plus text-success"></i>
                                    </div>
                                    <div class="media-body pr-2">
                                        <div class="font-w600">You have a new subscriber</div>
                                        <span class="font-w500 text-muted">41 min ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="text-dark media py-2" href="javascript:void(0)">
                                    <div class="mr-2 ml-3">
                                        <i class="fa fa-fw fa-check-circle text-success"></i>
                                    </div>
                                    <div class="media-body pr-2">
                                        <div class="font-w600">You have a new follower</div>
                                        <span class="font-w500 text-muted">42 min ago</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="p-2 border-top">
                            <a class="btn btn-sm btn-light btn-block text-center"
                               href="javascript:void(0)">
                                <i class="fa fa-fw fa-arrow-down mr-1"></i> Load More..
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Notifications Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

        <!-- Header Search -->
        <div id="page-header-search" class="overlay-header bg-white">
            <div class="content-header">
                <form class="w-100" action="/dashboard" method="POST">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                            <button type="button" class="btn btn-alt-danger" data-toggle="layout"
                                    data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control" placeholder="Search or hit ESC.."
                               id="page-header-search-input" name="page-header-search-input">
                    </div>
                </form>
            </div>
        </div>
        <!-- END Header Search -->
    </header>
</template>

<script>
import {authLogin} from "../../../composables/auth";
import {computed, ref, onMounted, onUnmounted} from "vue";
import store from "../../../store";

export default {
    name: "AuthHeader",
    setup(props, {emit}) {
        const {
            handleLogout
        } = authLogin(props);
        const profileMenuPopup = ref(false);
        const notificationMenuPopup = ref(false);
        const profile = computed(() => {
            return store.getters.getProfile ? store.getters.getProfile : null;
        });
        const roleIds = computed(() => {
            return store.getters.getRoleIds ? store.getters.getRoleIds : null;
        });
        const handleMobileMenu = () => {
            emit('emitMobileMenuToggle', true)
        }
        const handleSidebarMiniToggle = () => {
            emit('handleSidebarMiniToggle', true)
        }
        const handleProfileMenuPopup = () => {
            profileMenuPopup.value = !profileMenuPopup.value;
            notificationMenuPopup.value = false;
        }
        const handleNotificationMenuPopup = () => {
            notificationMenuPopup.value = !notificationMenuPopup.value;
        }
        const handleOutsideClick = (event) => {
            if (!event.target.closest('.dropdown, .d-inline-block, .ml-2, .show')) {
                profileMenuPopup.value = false;
            }
        }
        onMounted(() => {
            window.addEventListener("mousedown", handleOutsideClick);
        })
        onUnmounted(() => {
            window.removeEventListener("mousedown", handleOutsideClick);
        })
        return {
            handleLogout,
            profile,
            roleIds,
            handleMobileMenu,
            profileMenuPopup,
            handleProfileMenuPopup,
            notificationMenuPopup,
            handleNotificationMenuPopup,
            handleSidebarMiniToggle
        }
    },
}
</script>

<style scoped>

</style>
