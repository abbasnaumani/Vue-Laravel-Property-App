<template>
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Property</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <router-link class="link-fx" to="/property/add">Add</router-link>
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
                                    <div class="py-2 row">
                                        <div class="form-group col-3">
                                            <label for="title">&nbsp Property Title</label>
                                            <input id="title" class="form-control form-control-alt form-control-lg"
                                                     type="text"
                                                     v-model="title"  required
                                                     autofocus/>
                                        </div>
                                        <div class="form-group col-3">
                                            <label>&nbsp Property Type</label>
                                            <select id="property-type" class="form-control form-control-alt form-control-lg" v-model="type">
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-2">
                                            <label for="area">&nbsp Area</label>
                                            <input id="area" class="form-control form-control-alt form-control-lg"
                                                     type="text"
                                                     v-model="area" required/>
                                        </div>
                                        <div class="form-group col-1">
                                            <label for="area">&nbsp Unit</label>
                                            <select class="form-control form-control-alt form-control-lg" v-model="areaUnit">
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label>&nbsp City</label>
                                            <select id="city" class="form-control form-control-alt form-control-lg" v-model="city">
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="py-2 row">
                                        <div class="form-group col-3">
                                            <label>&nbsp Purpose</label>
                                            <select id="purpose" class="form-control form-control-alt form-control-lg" v-model="purpose">
                                                <option value="1" >For Sale</option>
                                                <option value="2" >Rent</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="price">&nbsp Price</label>
                                            <input id="price" class="form-control form-control-alt form-control-lg"
                                                     type="text"
                                                     v-model="price" required/>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="location">&nbsp Location</label>
                                            <input id="location" class="form-control form-control-alt form-control-lg"
                                                   type="text"
                                                   v-model="location" required/>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="address">&nbsp Address</label>
                                            <input id="address" class="form-control form-control-alt form-control-lg"
                                                   type="text"
                                                   v-model="address"/>
                                        </div>
                                    </div>
                                    <div class="py-2 row">
                                        <div class="form-group col-3">
                                            <label for="bedrooms">&nbsp Bedrooms</label>
                                            <input id="bedrooms" class="form-control form-control-alt form-control-lg"
                                                   type="number"
                                                   v-model="bedrooms"/>
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="bathrooms">&nbsp Bathrooms</label>
                                            <input id="bathrooms" class="form-control form-control-alt form-control-lg"
                                                   type="number"
                                                   v-model="bathrooms"/>
                                        </div>
                                        <div class="form-group col-2">
                                            <strong>&nbsp Occupancy Status</strong>
                                            <label for="occupancy-status" class="switch">
                                            <input id="occupancy-status" class="form-control form-control-alt form-control-lg"
                                                   type="checkbox"
                                                   v-model="isOccupancyStatus"/>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-2">
                                            <strong>&nbsp Installment Available</strong>
                                            <label for="installment-available" class="switch">
                                            <input id="installment-available" class="form-control form-switch form-control-alt form-control-lg"
                                                   type="checkbox"
                                                   v-model="isInstallmentAvailable"/>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-2">
                                            <strong>&nbsp Possession Available</strong>
                                            <label class="switch" for="possession-available">
                                            <input id="possession-available"
                                                   type="checkbox"
                                                   v-model="isPossessionAvailable"/>
                                                <span class="slider round"></span>
                                            </label>
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
import {computed, ref} from "vue";
export default {
    name: "AddProperty",
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
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
    background-color: #2196F3;
}

input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}
</style>
