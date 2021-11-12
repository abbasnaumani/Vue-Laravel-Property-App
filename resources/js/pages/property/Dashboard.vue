<template>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    User
                    <!-- <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Tables transformed with dynamic features.</small> -->
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Property</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <router-link class="link-fx" to="/property">Dashboard</router-link>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table Full Pagination -->
        <div id="property-dashboard-section" class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Property Record </h3>
                <button class="btn btn-primary" data-validation="validation-span-id"
                        id="validation-span-id">Add
                </button>
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
                    <tbody v-if="properties.properties">
                        <tr v-for="property in properties.properties" :key="property.id">
                            <td class="font-w600 font-size-sm">{{property.id}}</td>
                            <td class="font-w600 font-size-sm">{{property.title}}</td>
                            <td class="font-w600 font-size-sm">{{property.user.first_name}} {{property.user.last_name}}</td>
                            <td class="font-w600 font-size-sm">{{property.property_sub_type.name}}</td>
                            <td class="font-w600 font-size-sm">{{property.area}} {{property.area_unit.name}}</td>
                            <td class="font-w600 font-size-sm">{{property.city.name}}</td>
                            <td class="font-w600 font-size-sm">{{property.purpose}}</td>
                            <td class="font-w600 font-size-sm">{{property.price}}</td>
                            <td class="font-w600 font-size-sm">{{property.location}}</td>
                            <td class="font-w600 font-size-sm">
                                <button>EDIT</button>
                                <button>DELETE</button>
                                <button>INFO</button>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
</template>

<script>
import {getPropertyList} from "../../composables/property";
import {ref} from "vue";

export default {
    name: "Dashboard",
    setup(props){
        const properties = ref([]);
        properties.value = getPropertyList();
        console.log(properties.value,"properties.value");
        return{
            properties
        }
    }
}
</script>

<style scoped>

</style>
