<template>

</template>

<script>
import authService from "~/admin/services/authService";

export default {
    name: "Logout",
    setup() {
        authService.handleLogout();
    }
}
</script>

<style scoped>

</style>
