<template>
    <vue-element-loading
        class="relative"
        :active="isLoading"
        background-color="rgba(255, 255, 255, 0.6)"
        text="Logging out..."
        spinner="spinner"
        color="blue"
        size="128"
        is-full-screen
        />
</template>

<script>

import VueElementLoading from 'vue-element-loading'
import authService from "../../services/authService";
import {ApiResponse} from "../../constants";
import {useRouter} from "vue-router";
import {useToast} from "vue-toastification";
import {ref} from "vue";

export default {
    name: "Logout",
    components: {
        VueElementLoading
    },
    setup(props) {
        const router = useRouter();
        const isLoading = ref(false);
        const toast = useToast();
        handleLogout();
        async function handleLogout() {
            isLoading.value = true;
            let response = await authService.handleLogout();
            if (response.data.status !== ApiResponse.SUCCESS) {
                toast.error(response.data.message, {
                    timeout: 3500
                });
            } else {
                console.log("saddique")
                router.push({
                    path: '/login'
                });
               await authService.onLogout();
                isLoading.value = false;
            }
        }
        return {
            isLoading,
        }

    }
}
</script>

<style scoped>

</style>
