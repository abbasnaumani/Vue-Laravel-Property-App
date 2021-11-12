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
                    <tbody>
                        <tr>
                            <td class="font-w600 font-size-sm">2</td>
                            <td class="font-w600 font-size-sm">Saddique Main House OK</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>
                            <td class="font-w600 font-size-sm">{{}} {{}}</td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full Pagination -->
    </div>
</template>

<script>
export default {
    name: "PropertyDetails"
}
</script>

<style scoped>

</style>
