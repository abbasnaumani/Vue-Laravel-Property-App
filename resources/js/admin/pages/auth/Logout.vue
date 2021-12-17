<template>

</template>

<script>
import authService from "../../services/authService";

export default {
    name: "Logout",
    setup() {
        authService.handleLogout();
    }
}
</script>

<style scoped>

</style>
