<template>

</template>

<script>
import authService from "~/admin/services/authService";

export default {
    name: "Logout",
    setup() {
        console.log('Logout from admin');
        authService.handleLogout();
    }
}
</script>

<style scoped>

</style>
