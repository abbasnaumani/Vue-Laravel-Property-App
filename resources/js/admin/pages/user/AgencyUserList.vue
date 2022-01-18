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
                                                 :to="{path:'/admin/'+agencyId+'/user/add'}">Add
                                    </router-link>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                    <table
                                        class="table table-responsive table-bordered table-striped table-vcenter js-dataTable-buttons">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="col-1">ID</th>
                                            <th class="col-2">Name</th>
                                            <th class="col-2">Email</th>
                                            <th class="col-1">Phone Number</th>
                                            <th class="col-2">Access</th>
                                            <th class="col-2">Registered On</th>
                                            <th colspan="2" class="col-2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody v-if="users && users.length > 0">
                                        <tr v-for="(user,index) in users" :key="index" class="text-center">
                                            <td class="font-w600 col-1 font-size-sm">{{ user.id }}</td>
                                            <td class="font-w600 col-2 font-size-sm">{{ user.first_name }}
                                                {{ user.last_name }}
                                            </td>
                                            <td class="font-w600 col-2 font-size-sm">
                                                <em class="text-muted">{{ user.email }}</em>
                                            </td>
                                            <td class="font-w600 col-1 font-size-sm">{{ user.phone_number }}
                                            </td>
                                            <td class="font-w600 col-2 font-size-sm">
                                                <span class="badge badge-primary">{{ user.roles[0].name || '' }}</span>
                                            </td>
                                            <td>
                                                <em class="text-muted col-2 font-w600 font-size-sm">
                                                    {{(user.created_at) ? user.created_at : ''}} </em>
                                            </td>
                                            <td class="mx-auto font-w600 col-2 font-size-sm">
                                                <router-link v-if="user.roles?.[0].id !== UserRoles.SUPER_ADMIN" :to="{path:'/admin/edit/user/'+user.id}" class="btn btn-primary mx-1"><i class="fa fa-edit"></i></router-link>
                                                <button v-if="loggedInUserId !== user.id && user.roles?.[0].id !== UserRoles.SUPER_ADMIN"  @click="openDeleteModal(user)" class="btn btn-danger mx-1"><i class="far fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tbody v-else class="d-flex justify-content-center mt-3">
                                        <p class="d-flex justify-content-center text-center">No Record Found</p>
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
               confirmLabel="Delete User?"
               cancelLabel="Cancel"
               title="Confirm Delete Agency User"
               icon="warning"
               :isConfirmButtonDisabled="isConfirmButtonDisabled"
               v-on:confirm="modalConfirmDelete(modalUser)"
               v-on:cancel="openConfirmDeleteModal=false">
        <div>
            <p>Are you sure you want to delete this user from agency?</p><p class="mt-2 font-bold">{{modalUser.title}}</p>
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
import {ref} from "vue";
import AppModal from "../../components/ui/base/AppModal";
import {ApiResponse} from "~/constants";
import userService from "../../services/userService";
import auth from "../../services/authService";
import {getAgencyUsersList} from "~/admin/composables/agency";
import {updateUserData} from "../../composables/user";
import {updateAgencyUsersData} from "../../composables/agency";
import {UserRoles} from "../../constants";

export default {
    name: "AgencyUserList",
    props: {
        agencyId: Number
    },
    components: {AppModal},
    setup(props) {
        const openConfirmDeleteModal = ref(false);
        const openResponseModal = ref(false);
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalUser = ref();
        const responseIcon = ref('');
        const users = getAgencyUsersList(props.agencyId);
        const loggedInUserId = auth.user().id;
        function openDeleteModal(user){
            modalUser.value = user;
            openConfirmDeleteModal.value = true;
        }
        async function modalConfirmDelete(user) {
            isConfirmButtonDisabled.value = true;
            let response = await userService.deleteUser(user.id);
            // if(response.status === ApiResponse.SUCCESS){
            //     updateAgencyUsersData(props.agencyId);
            // }
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
            isConfirmButtonDisabled,
            UserRoles,
            auth,
            loggedInUserId
        }
    },
}
</script>

<style scoped>

</style>
