<template>
    <div class="container py-5">
        <div class="card shadow-sm login-card w-100">
            <div class="card-header bg-white border-bottom-0 mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="login-text text-uppercase letter-spacing">Users</h4>
                    <router-link :to="{path:'/'+slug+'/add/user'}"
                                 class="float-end btn btn-primary">
                        Add
                    </router-link>
                </div>
            </div>
            <div class="card-body text-left">
                <table class="table table-responsive table-bordered table-striped table-vcenter">
					<thead>
						<tr class="text-center text-uppercase">
							<th class="col-1">Id</th>
							<th class="col-2">Name</th>
							<th class="col-2">Email</th>
							<th class="col-2">Phone Number</th>
                            <th class="col-1">Access</th>
                            <th class="col-2">Registered On</th>
                            <th class="col-2">Actions</th>
						</tr>
					</thead>
					<tbody v-if="agencyUsers && agencyUsers.length > 0">
                    	<tr class="text-center" v-for="user in agencyUsers">
							<td class="font-w600 col-1 font-size-sm">
                                {{ user.id }}
							</td>
							<td class="font-w600 col-2 font-size-sm">
                                {{ user.first_name+' '+user.last_name }}
							</td>
							<td class="font-w600 col-2 font-size-sm">
								<em class="text-muted">{{ user.email }}</em>
							</td>
							<td class="font-w600 col-2 font-size-sm">
                                {{ user.phone_number }}
							</td>
                            <td class="font-w600 col-1 font-size-sm">
                                <span class="badge badge-primary">{{ user.roles[0].name }}</span>
							</td>
                            <td class="font-w600 col-2 font-size-sm">
								<em class="text-muted">{{ user.created_at }}</em>
							</td>
                            <td class="font-w600 col-2 font-size-sm">
								<router-link v-if="true" :to="{path:'/'+slug+'/edit/user/'+user.id}" class="btn btn-primary mx-1">
									<i class="fa fa-edit"></i>
								</router-link>
<!--                                (user.roles?.[0].id !== UserRoles.SUPER_ADMIN && user.roles?.[0].id !== UserRoles.ADMIN) || isAthurized()-->
<!--                                (user.roles?.[0].id !== UserRoles.SUPER_ADMIN && user.roles?.[0].id !== auth.user().roles?.[0].id )-->
								<button v-if="user.roles?.[0].id !== UserRoles.SUPER_ADMIN && user.roles?.[0].id !== auth.user().roles?.[0].id"  @click="openDeleteModal(user)" class="btn btn-danger mx-1">
									<i class="far fa-trash-alt"></i>
								</button>
							</td>
						</tr>
					</tbody>
                    <tbody v-else>
                    <p class="d-flex justify-content-center text-center">No Record Found</p>
                    </tbody>
				</table>
            </div>
        </div>
    </div>
    <app-modal :open="openConfirmDeleteModal"
               confirmLabel="Delete Agency?"
               cancelLabel="Cancel"
               title="Confirm Delete Agency"
               icon="warning"
               :isConfirmButtonDisabled="isConfirmButtonDisabled"
               v-on:confirm="modalConfirmDelete(modalUser)"
               v-on:cancel="openConfirmDeleteModal=false">
        <div>
            <p>Are you sure you want to delete user </p><p class="mt-2 font-bold">{{modalUser.first_name+' '+modalUser.last_name}}</p>
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

import {getAgencyUsersList} from "../../composables/user";
import AppModal from "~/frontsite/components/ui/base/AppModal";
import {ref} from "vue";
import contactUsService from "../../services/contactUsService";
import {ApiResponse,UserRoles} from "../../../constants";
import userService from "../../services/userService";
import auth from "../../services/authService";

export default {
    name: "UserList",
    components: {AppModal},
    props:{
        slug:String
    },
    setup(props) {
        const openConfirmDeleteModal = ref(false);
        const openResponseModal = ref(false);
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalUser = ref('');
        const responseIcon = ref('');
        const agencyUsers = getAgencyUsersList();
        const loggedInUserId = auth.user().id;
        const isNotSuperAdmin = auth.user().roles?.[0].id !== UserRoles.SUPER_ADMIN;
        function isAthurized(){
            if (auth.user().roles?.[0].id === UserRoles.SUPER_ADMIN){
                return true
            }
        }
        function openDeleteModal(user){
            modalUser.value = user;
            openConfirmDeleteModal.value = true;
        }
        async function modalConfirmDelete(user) {
            isConfirmButtonDisabled.value = true;
            let response = await userService.deleteUser(user.id);
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
            openConfirmDeleteModal,
            openResponseModal,
            confirmationMessage,
            isConfirmButtonDisabled,
            modalUser,
            responseIcon,
            agencyUsers,
            openDeleteModal,
            modalConfirmDelete,
            UserRoles,
            auth,
            isAthurized,
            isNotSuperAdmin,
            loggedInUserId
        }
    }
}
</script>

<style scoped>

</style>
