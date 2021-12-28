<template>
    <vue-element-loading
        class="relative"
        :active="getLoaderState"
        background-color="rgba(255, 255, 255, 0.6)"
        text="Loading..."
        spinner="spinner"
        color="#3B4654"
        size="128"
        is-full-screen
    />
    <div id="page-container"
         :class='{
        "sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow side-trans-enabled":isAuthenticated,
        "sidebar-o-xs":mobileMenuToggle,
        "sidebar-mini":sidebarMiniToggle
    }'>
        <div v-if="isAuthenticated">
            <auth-header
                @emitMobileMenuToggle="handleMobileMenuToggle"
                @handleSidebarMiniToggle="handleSidebarMiniToggle"
            />
            <sidebar
                :sidebarOpenCloseConfig="sidebarOpenCloseConfig"
                @emitMobileMenuToggle="handleMobileMenuToggle"
            />
        </div>
        <child/>
    </div>
</template>

<script>
import AuthHeader from "~/admin/components/ui/base/AuthHeader";
import Sidebar from "~/admin/components/ui/base/Sidebar";
import store from "~/admin/store";
import {computed, ref, watch} from "vue";

export default {
    name: "Default",
    components: {Sidebar, AuthHeader},
    setup() {
        const mobileMenuToggle = ref(false);
        const sidebarMiniToggle = ref(false);
        const sidebarOpenCloseConfig = computed(() => {
            return store.getters.getSidebarOpenCloseConfig ? store.getters.getSidebarOpenCloseConfig
                : null;
        });
        watch(sidebarOpenCloseConfig, () => {
            handleMobileMenuToggle();
        })
        const handleMobileMenuToggle = () => {
            mobileMenuToggle.value = !mobileMenuToggle.value;
        }
        const isAuthenticated = computed(() => {
            return store.getters.isAuthenticated ? store.getters.isAuthenticated : null;
        });
        const getLoaderState = computed(() => {
            return store.getters.getLoaderState ? store.getters.getLoaderState : null;
        });
        const handleSidebarMiniToggle = () => {
            sidebarMiniToggle.value = !sidebarMiniToggle.value;
        }
        return {
            isAuthenticated,
            getLoaderState,
            mobileMenuToggle,
            handleMobileMenuToggle,
            sidebarOpenCloseConfig,
            sidebarMiniToggle,
            handleSidebarMiniToggle
        }
    }
}
</script>

<style scoped>
</style>
