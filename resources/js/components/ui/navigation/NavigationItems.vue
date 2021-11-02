<template>
    <ul class="nav-main">
        if Child exist then call NavigationItems


        <li class="nav-main-item">
            <a class="nav-main-link active" href="http://ksps.kodestudio.net/dashboard">
                <i class="nav-main-link-icon si si-cursor"></i>
                <span class="nav-main-link-name">Dashboard</span>
            </a>
        </li>
        <li class="nav-main-item ">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon si si-bulb"></i>
                <span class="nav-main-link-name">User Section</span>
            </a>
            <ul class="nav-main-submenu">
                <li class="nav-main-item">
                    <a class="nav-main-link" href="http://ksps.kodestudio.net/user/edit/profile">
                        <i class="nav-main-link-icon si si-cursor"></i>
                        <span class="nav-main-link-name">User Profile</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
</template>

<script>
export default {
    name: "NavigationItems"
}
</script>

<style scoped>

</style>
