<template>
    <li class="nav-main-item">
        <router-link :to="routePath"
                     class="nav-main-link active">
            <i class="nav-main-link-icon si si-cursor"></i>
            <span class="nav-main-link-name">{{routeName}}</span>
        </router-link>
    </li>
</template>

<script>
export default {
    name: "NavigationItem",
    props: {
        routePath: String,
        routeName: String
    },
    setup(props) {
        console.log(props.routePath, "saddique");
        return {}
    },
}
</script>

<style scoped>

</style>
