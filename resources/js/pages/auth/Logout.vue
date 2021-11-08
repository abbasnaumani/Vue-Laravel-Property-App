<template>

</template>

<script>
import authService from "../../services/authService";
import {ApiResponse} from "../../constants";
import {onBeforeUnmount, onMounted} from "vue";
import {useRouter} from "vue-router";
import {authLogin} from "../../composables/auth";

export default {
    name: "Logout",
    setup(props) {
        const router = useRouter();
        onMounted(() => {
            authService.addListener('logoutSuccess', handleLogoutSuccessListner);
        });
        onBeforeUnmount(() => {
            authService.removeListener('logoutSuccess', handleLogoutSuccessListner);
        });
        const handleLogoutSuccessListner = (data) => {
            console.log('logpour', data, ApiResponse.SUCCESS_CODE)
            if (data.status === ApiResponse.SUCCESS_CODE) {
                router.push({
                    path: '/login'
                });
            }
        }
        const {
            handleLogout
        } = authLogin(props);
        handleLogout();
        return {
            handleLogout
        }

    }
}
</script>

<style scoped>

</style>
