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
         :class='{"sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow side-trans-enabled":isAuthenticated}'>
        <div v-if="isAuthenticated">

        </div>
        <child/>
    </div>
</template>

<script>

import {computed} from "vue";
import store from "../store";

export default {
    name: "FrontSiteDefault",
    components: {},
    setup() {
        const isAuthenticated = computed(() => {
            return store.getters.isAuthenticated ? store.getters.isAuthenticated : null;
        });
        const getLoaderState = computed(() => {
            return store.getters.getLoaderState ? store.getters.getLoaderState : null;
        });
        return {
            isAuthenticated,
            getLoaderState
        }
    }
}
</script>

<style scoped>

</style>
