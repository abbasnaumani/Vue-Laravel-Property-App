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
                                    <h3 class="block-title">Contact Us Record </h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                    <table
                                        class="table table-responsive table-bordered table-striped table-vcenter  js-dataTable-buttons">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="col-1">ID</th>
                                            <th class="col-1">Name</th>
                                            <th class="col-2">Email</th>
                                            <th class="col-1">Phone Number</th>
                                            <th class="col-3">Message</th>
                                            <th class="col-1">Contacted on</th>
                                            <th class="col-1">Agency Name</th>
                                            <th class="col-2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody v-if="contactUsData && contactUsData.length > 0">
                                        <tr v-for="(contact,index) in contactUsData" :key="index" class="text-center">
                                            <td class="font-w600 col-1 font-size-sm">{{ contact.id }}</td>
                                            <td class="font-w600 col-1 font-size-sm">{{ contact.name }}
                                            </td>
                                            <td class="font-w600 col-2 font-size-sm">
                                                <em class="text-muted">{{ contact.email }}</em>
                                            </td>
                                            <td class="font-w600 col-1 font-size-sm">{{ contact.phone_number }}
                                            </td>
                                            <td class="font-w600 col-3 font-size-sm">{{ contact.message }}
                                            </td>
                                            <td class="font-w600 col-1 font-size-sm">
                                                <em class="text-muted">
                                                    {{(contact.created_at) ? Date(contact.created_at)  : ''}} </em>
                                            </td>
                                            <td class="font-w600 col-1 font-size-sm">   <span class="badge badge-primary">{{ contact.agency?.name }}</span>
                                            </td>
                                            <td class="font-w600 col-2 font-size-sm">
                                                <router-link :to="{path:'/admin/edit/agency/'+contact.id}" class="btn btn-primary mx-1"><i class="fa fa-edit"></i></router-link>
                                                <button @click="openDeleteModal(contact)" class="btn btn-danger mx-1"><i class="far fa-trash-alt"></i></button>
                                                <button @click.prevent="showMessage(contact)" class="btn btn-info mx-1"><i class="fa fa-arrow-circle-down"></i></button>
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
               v-on:confirm="modalConfirmDelete(modalContactUs)"
               v-on:cancel="openConfirmDeleteModal=false">
        <div>
            <p>Are you sure you want to delete message of </p><p class="mt-2 font-bold">{{modalContactUs.name}}</p>
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
import AppModal from "../../components/ui/base/AppModal";
import {ref} from "vue";
import {getAllContactUsData} from "../../composables/contactus";
import agencyService from "../../services/agencyService";
import {updateAgencyData} from "../../composables/agency";
import contactUsService from "../../services/contactUsService";
import {ApiResponse} from "../../constants";
export default {
    name: "ContactUsList",
    components: {AppModal},
    setup(){
        const openConfirmDeleteModal = ref(false);
        const openResponseModal = ref(false);
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalContactUs = ref();
        const responseIcon = ref('');
        const messageBox = ref(false);
        const contactMessage = ref(null);
        const contactUsData = getAllContactUsData();

        function showMessage(contact){
            contactMessage.value = contact.message;
            messageBox.value = !messageBox.value;
        }
        function openDeleteModal(agency){
            modalContactUs.value = agency;
            openConfirmDeleteModal.value = true;
        }
        async function modalConfirmDelete(contact) {
            isConfirmButtonDisabled.value = true;
            let response = await contactUsService.deleteContactUsMessage(contact.id);
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
        return{
            openConfirmDeleteModal,
            openResponseModal,
            confirmationMessage,
            isConfirmButtonDisabled,
            modalContactUs,
            responseIcon,
            contactUsData,
            openDeleteModal,
            modalConfirmDelete,
            showMessage,
            messageBox,
            contactMessage
        }
    }
}
</script>

<style scoped>

</style>
