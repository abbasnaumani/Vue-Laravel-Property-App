<template>
    <vue-element-loading
        class="relative"
        active="true"
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

export default {
    name: "Logout",
    components: {
        VueElementLoading
    },
    setup() {
        authService.handleLogout();
    }
}
</script>

<style scoped>

</style>
