<template>
    <main id="main-container">
        <div class="content">
            <!-- Dynamic Table Full Pagination -->
            <div id="property-dashboard-section" class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Property Record </h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter  js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">ID</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Description</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Address</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Bedrooms</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Bathrooms</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Occupancy Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Installment Available</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Possession</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Created AT</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Updated AT</th>
                        </tr>
                        </thead>
                        <tbody v-if="propertyDetails">
                        <tr>
                            <td class="font-w600 font-size-sm">{{propertyDetails.id}}</td>
                            <td class="font-w600 font-size-sm" v-html="propertyDetails.description"></td>
                            <td class="font-w600 font-size-sm">{{propertyDetails.address}} </td>
                            <td class="font-w600 font-size-sm">{{propertyDetails.bedrooms}} </td>
                            <td class="font-w600 font-size-sm">{{propertyDetails.bathrooms}} </td>
                            <td class="font-w600 font-size-sm">{{(propertyDetails.is_occupancy_status)? 'Yes' : 'No'}} </td>
                            <td class="font-w600 font-size-sm">{{propertyDetails.is_installment_available ? 'Yes' : 'No'}} </td>
                            <td class="font-w600 font-size-sm">{{propertyDetails.is_possession_available ? 'Yes' : 'No'}} </td>
                            <td class="font-w600 font-size-sm">{{propertyDetails.created_at}} </td>
                            <td class="font-w600 font-size-sm">{{propertyDetails.updated_at}} </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full Pagination -->
        </div>

    </main>
</template>

<script>
import {ref} from "vue";
import {getPropertyDetails} from "../../composables/property";

export default {
    name: "PropertyDetails",
    props:{
        propertyId:Number,
    },
    setup(props){
        const propertyDetails = getPropertyDetails(props.propertyId);
        console.log(propertyDetails,"propertyDetails");
        return{
            propertyDetails
        }
    }
}
</script>

<style scoped>

</style>
