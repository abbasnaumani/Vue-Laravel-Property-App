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
                                    <h3 class="block-title">Agency Record </h3>
                                    <router-link class="btn btn-primary" data-validation="validation-span-id"
                                                 :to="{path:'/admin/add/agency'}">Add
                                    </router-link>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                    <table
                                        class="table table-responsive table-bordered table-striped table-vcenter  js-dataTable-buttons">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="col-1">ID</th>
                                            <th class="col-1">Name</th>
                                            <th class="col-2 d-none d-sm-table-cell">Email</th>
                                            <th class="col-2 d-none d-sm-table-cell">Phone Number</th>
                                            <th class="col-3">Address</th>
                                            <th class="col-1">Active</th>
                                            <th class="col-1">Registered on</th>
                                            <th class="col-1">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody v-if="agencies && agencies.length > 0">
                                        <tr v-for="(agency,index) in agencies" :key="index">
                                            <td class="text-center font-size-sm">{{ agency.id }}</td>
                                            <td class="font-w600 font-size-sm">{{ agency.name }}
                                            </td>
                                            <td class="d-none d-sm-table-cell font-size-sm">
                                                <em class="text-muted">{{ agency.email }}</em>
                                            </td>
                                            <td class="font-w600 font-size-sm">{{ agency.phone_number }}
                                            </td>
                                            <td class="font-w600 font-size-sm">{{ agency.address }}
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <span class="badge badge-primary">{{ (agency.is_active == 1)?  'Yes' : 'No' }}</span>
                                            </td>
                                            <td>
                                                <em class="text-muted font-size-sm">
                                                    {{(agency.created_at) ? agency.created_at : ''}} </em>
                                            </td>
                                            <td class="btn-group text-center font-w600 font-size-sm">
                                                <router-link :to="{path:'/admin/edit/agency/'+agency.id}" class="btn btn-primary "><i class="fa fa-edit"></i></router-link>
                                                <button @click="openDeleteModal(agency)" class="btn btn-danger mx-2"><i class="far fa-trash-alt"></i></button>
                                                <router-link :to="{path:'/admin/'+agency.id+'/users/'}" class="btn btn-info mx-2"><i class="far fa-eye"></i></router-link>
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
               confirmLabel="Delete Agency?"
               cancelLabel="Cancel"
               title="Confirm Delete Agency"
               icon="warning"
               :isConfirmButtonDisabled="isConfirmButtonDisabled"
               v-on:confirm="modalConfirmDelete(modalAgency)"
               v-on:cancel="openConfirmDeleteModal=false">
        <div>
            <p>Are you sure you want to delete this agency?</p><p class="mt-2 font-bold">{{modalAgency.title}}</p>
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
// import {updateUserData} from "../../composables/user";
import {ref} from "vue";
import AppModal from "../../components/ui/base/AppModal";
import {ApiResponse} from "~/constants";
import userService from "~/admin/services/userService";
import {getAgencyList} from "~/admin/composables/agency";
import {updateAgencyData} from "../../composables/agency";
import agencyService from "../../services/agencyService";

export default {
    name: "AgencyList",
    components: {AppModal},
    setup(props) {
        const openConfirmDeleteModal = ref(false);
        const openResponseModal = ref(false);
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalAgency = ref();
        const responseIcon = ref('');
        const agencies = getAgencyList();

        function openDeleteModal(agency){
            modalAgency.value = agency;
            openConfirmDeleteModal.value = true;
        }
        async function modalConfirmDelete(agency) {
            isConfirmButtonDisabled.value = true;
            let response = await agencyService.deleteAgency(agency.id);
            updateAgencyData();
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
            agencies,
            openDeleteModal,
            modalAgency,
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
