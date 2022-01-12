<template>
    <div class="container py-5">
        <div class="card shadow-sm login-card w-100">
            <div class="card-header bg-white border-bottom-0 mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="login-text text-capitalize letter-spacing">Contact Us Record</h4>
                </div>
            </div>
            <div class="card-body text-left">
                <table class="table table-responsive table-bordered table-striped table-vcenter">
                    <thead>
                    <tr class="text-center text-uppercase">
                        <th class="col-1">Id</th>
                        <th class="col-2">Name</th>
                        <th class="col-2">Email</th>
                        <th class="col-1">Phone Number</th>
                        <th class="col-1">Contact On</th>
                        <th class="col-3">Message</th>
                        <th class="col-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody v-if="contactUs && contactUs.length > 0">
                    <tr class="text-center" v-for="contact in contactUs">
                        <td class="font-w600 col-1 font-size-sm">
                            {{contact.id}}
                        </td>
                        <td class="font-w600 col-2 font-size-sm">
                            {{contact.name}}
                        </td>
                        <td class="font-w600 col-2 font-size-sm">
                            <em class="text-muted">{{contact.email}}</em>
                        </td>
                        <td class="font-w600 col-1 font-size-sm">
                            {{ contact.phone_number }}
                        </td>
                        <td class="font-w600 col-1 font-size-sm">
                            <em class="text-muted"> {{(contact.created_at) ? (contact.created_at)  : ''}}</em>
                        </td>
                        <td class="font-w600 col-3 font-size-sm">
                            {{ contact.message }}
                        </td>
                        <td class="font-w600 col-2 font-size-sm">
<!--                            <a href="#" class="btn btn-primary mx-1">-->
<!--                                <i class="fa fa-reply"></i>-->
<!--                            </a>-->
                            <button @click="openDeleteModal(contact)" class="btn btn-danger mx-1">
                                <i class="far fa-trash-alt"></i>
                            </button>
<!--                            <button  class="btn btn-info mx-1">-->
<!--                                <i class="far fa-eye"></i>-->
<!--                            </button>-->
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
               v-on:confirm="modalConfirmDelete(modalContactUs)"
               v-on:cancel="openConfirmDeleteModal=false">
        <div>
            <p>Are you sure you want to delete message of </p><p class="mt-2 font-bold">{{modalContactUs?.name}}</p>
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
import {computed, ref} from "vue";
import {getContactUsDataByAgencySlug} from "../../composables/contactus";
import AppModal from "~/frontsite/components/ui/base/AppModal";
import contactUsService from "../../services/contactUsService";
import {ApiResponse} from "../../../constants";

export default {
    name: "ContactUsList",
    components: {AppModal},
    props:{
        slug:String
    },
    setup(props) {
        const openConfirmDeleteModal = ref(false);
        const openResponseModal = ref(false);
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalContactUs = ref('');
        const responseIcon = ref('');
        const contactUs = getContactUsDataByAgencySlug(props.slug);

        function openDeleteModal(contact){
            modalContactUs.value = contact;
            openConfirmDeleteModal.value = true;
        }
        async function modalConfirmDelete(contact) {
            isConfirmButtonDisabled.value = true;
            let response = await contactUsService.deleteContactUsMessage(contact.id);
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
            contactUs,
            openConfirmDeleteModal,
            openResponseModal,
            confirmationMessage,
            isConfirmButtonDisabled,
            modalContactUs,
            responseIcon,
            modalConfirmDelete,
            openDeleteModal
        }
    }
}
</script>

<style scoped>

</style>
