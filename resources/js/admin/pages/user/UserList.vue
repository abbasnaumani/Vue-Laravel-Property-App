<template>
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Summary Overview</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option"
                                        data-toggle="block-option" data-action="state_toggle"
                                        data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div id="property-dashboard-section" class="block block-rounded">
                                <div class="block-header">
                                    <h3 class="block-title">User Record </h3>
                                    <router-link class="btn btn-primary" data-validation="validation-span-id"
                                                 to="/admin/user/add">Add
                                    </router-link>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                    <table
                                        class="table table-bordered table-striped table-vcenter  js-dataTable-buttons">
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
                                        <tbody v-if="users">
                                        <tr v-for="(user,index) in users" :key="index">
                                            <td class="text-center font-size-sm">{{ user.id }}</td>
                                            <td class="font-w600 font-size-sm">{{ user.first_name }}
                                                {{ user.last_name }}
                                            </td>
                                            <td class="d-none d-sm-table-cell font-size-sm">
                                                <em class="text-muted">{{ user.email }}</em>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <span class="badge badge-primary">{{ user.roles[0].name || '' }}</span>
                                            </td>
                                            <td>
                                                <em class="text-muted font-size-sm">
                                                        {{(user.created_at) ? user.created_at : ''}} </em>
                                            </td>
                                            <td class="btn-group text-center font-w600 font-size-sm">
                                                <router-link :to="{path:'/admin/user/edit/'+user.id}" class="btn btn-primary "><i class="fa fa-edit"></i></router-link>
                                                <button @click="openDeleteModal(user)" class="btn btn-danger mx-2"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <app-modal :open="openConfirmDeleteModal"
               confirmLabel="Delete Property?"
               cancelLabel="Cancel"
               title="Confirm Delete Property"
               icon="warning"
               :isConfirmButtonDisabled="isConfirmButtonDisabled"
               v-on:confirm="modalConfirmDelete(modalUser)"
               v-on:cancel="openConfirmDeleteModal=false">
        <div>
            <p>Are you sure you want to delete this property?</p><p class="mt-2 font-bold">{{modalUser.title}}</p>
        </div>
    </app-modal>
    <app-modal :open="openResponseModal"
               confirmLabel="OK"
               title="Results"
               :description="confirmationMessage"
               :icon="responseIcon"
               v-on:confirm="openResponseModal=false">
    </app-modal>

</template>

<script>
import {getAgencyUsersList,updateUserData} from "../../composables/user";
import {ref} from "vue";
import AppModal from "../../components/ui/base/AppModal";
import {ApiResponse} from "../../constants";
import userService from "../../services/userService";

export default {
    name: "UserList",
    components: {AppModal},
    setup(props) {
        const openConfirmDeleteModal = ref(false);
        const openResponseModal = ref(false);
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalUser = ref();
        const responseIcon = ref('');
        const users = getAgencyUsersList();
        // userService.getUserList();
        // userService.addListener('userListResponse', (response) => {
        //     users = response;
        // });
        function openDeleteModal(user){
            modalUser.value = user;
            openConfirmDeleteModal.value = true;
        }
        async function modalConfirmDelete(user) {
            isConfirmButtonDisabled.value = true;
            let response = await userService.deleteUser(user.id);
            updateUserData();
            showResponseModal(response);
        }
        function showResponseModal({message, status}) {
            openConfirmDeleteModal.value = false;
            isConfirmButtonDisabled.value = false;
            confirmationMessage.value = message ?? '';
            openResponseModal.value = true;
            responseIcon.value = status === ApiResponse.SUCCESS ? 'success' : 'warning';
        }
        return {
            users,
            openDeleteModal,
            modalUser,
            modalConfirmDelete,
            openConfirmDeleteModal,
            responseIcon,
            confirmationMessage,
            openResponseModal,
            isConfirmButtonDisabled
        }
    },
}
</script>

<style scoped>

</style>
