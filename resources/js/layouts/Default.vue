<template>
    <div id="app">
        <div v-if="isAuthenticated()">
            <AuthHeader></AuthHeader>
            <Sidebar></Sidebar>
        </div>
<!--                <slot name="top-bar" />-->
        <child></child>
<!--        <component v-bind:is="'userDashboard'"></component>-->
        <!--        <slot name="main-content" />-->
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
