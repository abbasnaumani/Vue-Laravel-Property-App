<template>
    <div id="page-container"
         class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow side-trans-enabled">
        <div v-if="isAuthenticated">
            <AuthHeader></AuthHeader>
            <sidebar/>
        </div>
        <child/>
    </div>

</template>


<script>
import AuthHeader from "../components/ui/base/AuthHeader";
import Sidebar from "../components/ui/base/Sidebar";
import store from "../store";
import {computed} from "vue";

export default {
    name: "Default",
    components: {Sidebar, AuthHeader},
    setup() {
        const isAuthenticated = computed(() => {
            return store.getters.isAuthenticated ? store.getters.isAuthenticated : null;
        });
        return {
            isAuthenticated
        }
    }
}
</script>
<style scoped>
</style>
