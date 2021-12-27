<template>
    <router-link :to="'/admin/'+menuItem.route"
                 class="nav-main-link active">
        <i class="nav-main-link-icon si si-cursor"></i>
        <span class="nav-main-link-name">{{ menuItem.name }}</span>
    </router-link>
</template>

<script>
export default {
    name: "NavigationItem",
    props: {
        menuItem: Object,
    },
}
</script>

<style scoped>
</style>
