<template>
    <!--        ## Sample Navigation Items-->
    <ul class="nav-main">


        <!--        ## Sample Navigation Item-->
        {SIMPLE_NAVIGATION_ITEM}

        <!--        ## Sample Parent Navigation Item-->
        <li class="nav-main-item ">
            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
               aria-haspopup="true" aria-expanded="true" href="#">
                <i class="nav-main-link-icon si si-bulb"></i>
                <span class="nav-main-link-name">User Section</span>
            </a>
            {Navigation_ITEMS}
        </li>
    </ul>
</template>

<script>
export default {
    name: "Menu"
}
</script>

<style scoped>

</style>
