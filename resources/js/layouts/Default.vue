<template>
        <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow side-trans-enabled">
            <div v-if="isAuthenticated()">
                <auth-header/>
                <sidebar/>
            </div>
            <child/>
        </div>
</template>


<script>
import Login from "../pages/auth/Login";
import AuthHeader from "../components/ui/base/AuthHeader";
import Sidebar from "../components/ui/base/Sidebar";
import Child from "../components/utilities/Child";
import auth from "../services/authService";

export default {
    name: "Default",
    components: {Child, Sidebar, AuthHeader, Login},
    setup(props) {
        function  isAuthenticated(){
            return auth.isAuthenticated()
        }
        return {
            isAuthenticated
        }
    }

}
</script>

<style scoped>

</style>
