<template>
    <div id="page-container"
         class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow side-trans-enabled">
        <div v-if="isAuthenticated">
            <AuthHeader></AuthHeader>
            <sidebar/>
        </div>
        <!--                <slot name="top-bar" />-->
        <!--        <user-dashboard></user-dashboard>-->
        <child/>
        <!--        <component v-bind:is="'userDashboard'"></component>-->
        <!--                <slot name="main-content" />-->
        <!--        <UserList></UserList>-->
        <!--        <Login></Login>-->
    </div>
</template>


<script>
import Login from "../pages/auth/Login";
import AuthHeader from "../components/ui/base/AuthHeader";
import Sidebar from "../components/ui/base/Sidebar";
import Child from "../components/utilities/Child";
import auth from "../services/authService";
import store from "../store";
import {computed} from "vue";

export default {
    name: "Default",
    components: {Child, Sidebar, AuthHeader, Login},
    setup(props) {
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
