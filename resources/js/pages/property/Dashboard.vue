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
                                    <h3 class="block-title">Property Record </h3>
                                    <router-link class="btn btn-primary" data-validation="validation-span-id"
                                            to="/property/add">Add
                                    </router-link>
                                </div>
                                <div class="block-content block-content-full">
                                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                                    <table class="table table-bordered table-striped table-vcenter  js-dataTable-buttons">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width: 80px;">ID</th>
                                            <th class="text-center d-none d-sm-table-cell">Property Title</th>
                                            <th class="text-center d-none d-sm-table-cell" >Owner</th>
                                            <th class="text-center d-none d-sm-table-cell" >Property Type</th>
                                            <th class="text-center d-none d-sm-table-cell" >Area</th>
                                            <th class="text-center d-none d-sm-table-cell" >City</th>
                                            <th class="text-center d-none d-sm-table-cell" >Purpose</th>
                                            <th class="text-center d-none d-sm-table-cell" >Price</th>
                                            <th class="text-center d-none d-sm-table-cell" >Location</th>
                                            <th class="text-center" colspan="3" style="width: 15%;">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody v-if="properties">
                                            <tr v-for="property in properties" :key="property.id">
                                                <td class="font-w600 font-size-sm">{{property.id}}</td>
                                                <td class="font-w600 font-size-sm">{{property.title}}</td>
                                                <td class="font-w600 font-size-sm">{{property.user.first_name +' '+property.user.last_name}} </td>
                                                <td class="font-w600 font-size-sm">{{property.property_sub_type.name}}</td>
                                                <td class="font-w600 font-size-sm">{{property.area}} {{property.area_unit.name}}</td>
                                                <td class="font-w600 font-size-sm">{{property.location.city.name}}</td>
                                                <td class="font-w600 font-size-sm">{{property.purpose}}</td>
                                                <td class="font-w600 font-size-sm">{{property.price}}</td>
                                                <td class="font-w600 font-size-sm">{{property.location.name}}</td>
                                                <td class="btn-group text-center font-w600 font-size-sm">
                                                    <router-link :to="{path:'/property/edit/'+property.id}" class="btn btn-primary "><i class="fa fa-pencil"></i></router-link>
                                                    <button @click="openDeleteModal(property)" class="btn btn-danger mx-2"><i class="far fa-trash-alt"></i></button>
                                                    <router-link :to="{path:'/property/details/'+property.id}" class="btn btn-info mx-2"><i class="far fa-eye"></i></router-link>
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
              v-on:confirm="modalConfirmDelete(modalProperty)"
              v-on:cancel="openConfirmDeleteModal=false">
        <div>
            <p>Are you sure you want to delete this property?</p><p class="mt-2 font-bold">{{modalProperty.title}}</p>
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
import {getUserPropertyList,updatePropertyData} from "../../composables/property";
import {ref} from "vue";
import propertyService from "../../services/propertyService";
import AppModal from "../../components/ui/base/AppModal";
import {ApiResponse} from "../../constants";

export default {
    name: "Dashboard",
    components: {AppModal},
    setup(props){

        const openConfirmDeleteModal = ref(false);
        const openResponseModal = ref(false);
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalProperty = ref();
        const responseIcon = ref('');
        const properties = getUserPropertyList();
        function openDeleteModal(property){
            modalProperty.value = property;
            openConfirmDeleteModal.value = true;
        }
        async function modalConfirmDelete(property) {
            isConfirmButtonDisabled.value = true;
            let response = await propertyService.deleteProperty(property.id);
            updatePropertyData();
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
            properties,
            openDeleteModal,
            modalProperty,
            modalConfirmDelete,
            openConfirmDeleteModal,
            responseIcon,
            confirmationMessage,
            openResponseModal,
            isConfirmButtonDisabled
        }
    }
}
</script>

<style scoped>

</style>
