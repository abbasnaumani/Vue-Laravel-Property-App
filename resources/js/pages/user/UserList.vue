<template>
    <main id="main-container">
        <div class="content">
            <h1>User List</h1>
        </div>
    </main>
</template>

<script>
import userService from "../../services/userService";
import {ref} from "vue";

export default {
    name: "UserList",
    setup(props) {
        let users = ref([]);
        userService.getUserList();
        userService.addListener('userListResponse', (response) => {
            users = response;
        });
        return {
            users
        }
    },
}
</script>

<style scoped>

</style>
