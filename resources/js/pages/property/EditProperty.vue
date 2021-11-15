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
                            <router-link class="link-fx" to="/property/someid/edit/">Edit</router-link>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <!-- Dynamic Table Full Pagination -->
        <div id="property-dashboard-section" class="block block-rounded">
            <div class="block-header">
                <h3 class="block-title">Property Record </h3>
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-sm-10 offset-1">
                        <form>
                            <div class="card">
                                <div class="card-body">
                                    <div class="py-2">
                                        <div class="form-group">
                                            <label for="title">&nbsp Property Title</label>
                                            <input id="title" class="form-control form-control-alt form-control-lg"
                                                   type="text"
                                                   v-model="title"  required
                                                   autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">&nbsp Property Type</label>
                                            <select id="type" class="form-control form-control-alt form-control-lg" v-model="type">
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="area">&nbsp Area</label>
                                            <input id="area" class="form-control form-control-alt form-control-lg"
                                                   type="text"
                                                   v-model="area" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="area">&nbsp Unit</label>
                                            <select class="form-control form-control-alt form-control-lg" v-model="areaUnit">
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">&nbsp City</label>
                                            <select id="city" class="form-control form-control-alt form-control-lg" v-model="city">
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="py-3">
                                        <div class="form-group">
                                            <label for="purpose">&nbsp Purpose</label>
                                            <select id="purpose" class="form-control form-control-alt form-control-lg" v-model="purpose">
                                                <option value="1" >For Sale</option>
                                                <option value="2" >Rent</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">&nbsp Price</label>
                                            <input id="price" class="form-control form-control-alt form-control-lg"
                                                   type="text"
                                                   v-model="price" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="location">&nbsp Location</label>
                                            <input id="location" class="form-control form-control-alt form-control-lg"
                                                   type="text"
                                                   v-model="location" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">&nbsp Address</label>
                                            <input id="address" class="form-control form-control-alt form-control-lg"
                                                   type="text"
                                                   v-model="address" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="bedrooms">&nbsp Bedrooms</label>
                                            <input id="bedrooms" class="form-control form-control-alt form-control-lg"
                                                   type="number"
                                                   v-model="bedrooms" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="bathrooms">&nbsp Bathrooms</label>
                                            <input id="bathrooms" class="form-control form-control-alt form-control-lg"
                                                   type="number"
                                                   v-model="bathrooms" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupancy-status">&nbsp Occupancy Status</label>
                                            <input id="occupancy-status" class="form-control form-control-alt form-control-lg"
                                                   type="checkbox"
                                                   v-model="isOccupancyStatus" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="installment-available">&nbsp Installment Available</label>
                                            <input id="installment-available" class="form-control form-control-alt form-control-lg"
                                                   type="checkbox"
                                                   v-model="isInstallmentAvailable" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="possession-available">&nbsp Possession Available</label>
                                            <input id="possession-available" class="form-control form-control-alt form-control-lg"
                                                   type="checkbox"
                                                   v-model="isPossessionAvailable" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="button" class="btn btn-alt-primary mr-1" data-dismiss="modal">Cancel
                                </button>
                                <button class="btn btn-primary">
                                    <i class="fa fa-fw fa-paper-plane mr-1"></i>Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";

export default {
    name: "EditProperty",
    setup(props){
        const title = ref('');
        const type = ref('');
        const areaUnit = ref('');
        const area = ref('');
        const city = ref('');
        const purpose = ref('');
        const price = ref('');
        const location = ref('');
        const address = ref('');
        const bedrooms = ref('');
        const bathrooms = ref('');
        const isOccupancyStatus = ref('');
        const isInstallmentAvailable = ref('');
        const isPossessionAvailable = ref('');
        return{

            title,
            type,
            areaUnit,
            area,
            city,
            purpose,
            price,
            location,
            address,
            bedrooms,
            bathrooms,
            isOccupancyStatus,
            isInstallmentAvailable,
            isPossessionAvailable
        }
    }
}
</script>

<style scoped>

</style>
