<template>
    <div class="block block-rounded">
        <h3 class="block-title">User Record </h3>
        <button class="btn btn-primary"
        >Add
        </button>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter  js-dataTable-buttons">
                <thead>
                <tr>
                    <th class="text-center" style="width: 80px;">ID</th>
                    <th>Name</th>
                    <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Access</th>
                    <th style="width: 15%;">Registered</th>
                    <th style="width: 15%;">opertaion</th>
                </tr>
                </thead>
                <tbody v-if="users.users">
                <tr v-for="(user,index) in users.users" :key="index">
                    <td class="text-center font-size-sm">{{user.id}}</td>
                    <td class="font-w600 font-size-sm">{{user.first_name}} {{user.last_name}}</td>
                    <td class="d-none d-sm-table-cell font-size-sm">
                        <em class="text-muted">{{user.email}}</em>
                    </td>
                    <td class="d-none d-sm-table-cell">
                        <span class="badge badge-primary">{{user.roles[0].name || ''}}</span>
                    </td>
                    <td>
                        <!--                        <em class="text-muted font-size-sm">{{(isset($user->created_at)?$user->created_at->format('d-->
                        <!--                            M'):'')}}</em>-->
                    </td>
                    <!--                    <td>-->
                    <!--                        <button class="btn btn-info" onclick="commonAjaxModel('edit/user/modal',{{$user->id}})"><i-->
                    <!--                            class="fa fa-edit"></i></button>-->
                    <!--                        <button class="btn btn-danger" onclick="commonAjaxModel('delete/user/modal',{{$user->id}})"><i-->
                    <!--                            class="fa fa-trash" aria-hidden="true"></i></button>-->
                    <!--                        <a class="btn btn-info" href="{{ route('admin.user.profile',user.id)   }}"><i-->
                    <!--                            class="fas fa-user"></i></a>-->

                    <!--                    </td>-->
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import {getUserList} from "../../composables/user";
import {ref} from "vue";

export default {
    name: "UserList",
    setup(props) {
        let users = ref([]);
        users.value = getUserList();
        return {
            users
        }
    },
}
</script>

<style scoped>

</style>
