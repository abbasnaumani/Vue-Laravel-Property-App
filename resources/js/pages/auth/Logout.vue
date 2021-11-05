<template>

</template>

<script>
import authService from "../../services/authService";
import {ApiResponse} from "../../constants";
import {onBeforeUnmount, onMounted} from "vue";
import {useRouter} from "vue-router";

export default {
    name: "Logout",
    setup(){
        const router = useRouter();
        onMounted(() => {
            authService.addListener('loginSuccess',handleLogoutSuccessListner);
        });
        onBeforeUnmount(() => {
            authService.removeListener('loginSuccess',handleLogoutSuccessListner);
        });
        const handleLogoutSuccessListner = (data) =>{
            if(data.status === ApiResponse.SUCCESS_CODE){
                router.push({
                    path: '/login'
                });
            }
        }
        return{

        }
    }
}
</script>

<style scoped>

</style>
