<template>
    <button
        type="submit"
        class="btn btn-block btn-alt-primary cursor-not-allowed"
        v-if="v$.$invalid"
        disabled
    >
        <i class="fa fa-fw fa-lock mr-1"></i>Update Password
    </button>
</template>

<script>
export default {
    name: "Button"
}
</script>

<style scoped>

</style>
