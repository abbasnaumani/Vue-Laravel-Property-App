<template>
    <main id="main-container">
        <div class="content">
            <div id="property-dashboard-section" class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Add New Property </h3>
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
                                                       v-model="title"
                                                       @blur="v$.title.$touch()"
                                                       />
                                                <div class="text-left">
                                                    <div v-if="v$.title.$dirty">
                                                        <sub v-if="v$.title.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Title is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-3" v-if="propertyTypes">
                                                <label>&nbsp Property Type</label>
                                                <select id="property-type"
                                                        class="form-control form-control-alt form-control-lg"
                                                        v-model="type"
                                                >
                                                    <option v-for="propertyType in propertyTypes" :value="propertyType.id" :selected="propertyType.id===type">{{propertyType.name}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-1">
                                                <label for="area">&nbsp Area</label>
                                                <input id="area" class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="area" required
                                                       @blur="v$.area.$touch()"
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.area.$dirty">
                                                        <sub v-if="v$.area.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Area is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-2" v-if="allAreaUnits">
                                                <label for="area">&nbsp Unit</label>
                                                <select
                                                    class="form-control form-control-alt form-control-lg"
                                                    v-model="areaUnit"
                                                >
                                                    <option v-for="unit in allAreaUnits" :value="unit.id" :selected="unit.id===areaUnit">{{unit.name}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-3" v-if="allCities">
                                                <label>&nbsp City</label>
                                                <select id="cities"
                                                        class="form-control form-control-alt form-control-lg"
                                                        v-model="city"
                                                >
                                                    <option v-for="city in allCities" :value="city.id" :selected="city.id===city">{{city.name}}</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="py-2 row">
                                            <div class="form-group col-3">
                                                <label>&nbsp Purpose</label>
                                                <select id="purpose" class="form-control form-control-alt form-control-lg"
                                                        v-model="purpose"
                                                >
                                                    <option value="1" selected>For Sale</option>
                                                    <option value="2" >For Rent</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="price">&nbsp Price</label>
                                                <input id="price" class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="price"
                                                       @blur="v$.price.$touch()"
                                                       required
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.price.$dirty">
                                                        <sub v-if="v$.price.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Price is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-3">
                                                <label for="location">&nbsp Location</label>
                                                <input id="location" class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="location"
                                                       required
                                                       @blur="v$.location.$touch()"
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.location.$dirty">
                                                        <sub v-if="v$.location.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Location is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-3">
                                                <label for="address">&nbsp Address</label>
                                                <input id="address" class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="address"
                                                       @blur="v$.address.$touch()"
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.address.$dirty">
                                                        <sub v-if="v$.address.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Address is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="py-2 row">
                                            <div class="form-group col-3">
                                                <label for="bedrooms">&nbsp Bedrooms</label>
                                                <input id="bedrooms" class="form-control form-control-alt form-control-lg"
                                                       type="number"
                                                       v-model="bedrooms"
                                                       min="0"
                                                       oninput="validity.valid||(value=0)"
                                                />
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="bathrooms">&nbsp Bathrooms</label>
                                                <input id="bathrooms" class="form-control form-control-alt form-control-lg"
                                                       type="number"
                                                       v-model="bathrooms"
                                                       min="0"
                                                       oninput="validity.valid||(value=0)"
                                                />
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
                                        <div class="py-2 row">
                                            <div class="form-group col-10 offset-1">
                                                <label >&nbsp Description  </label>
                                                <QuillEditor toolbar="minimal" theme="snow" v-model:content="description" contentType="html" :modules="modules"/>
                                            </div>
                                        </div>
                                        <div class="form-group row my-6">
                                            <div class="col-4 offset-4">
                                                <button
                                                    v-if="v$.$invalid"
                                                    type="submit"
                                                    class="btn btn-block btn-alt-primary cursor-not-allowed"
                                                    disabled
                                                >
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i>Submit
                                                </button>
                                                <button v-else @click.prevent="handleAddProperty"
                                                        type="submit"
                                                        class="btn btn-primary"
                                                >
                                                    <i class="fa fa-fw fa-paper-plane mr-1"></i>Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import {computed, ref} from "vue";
import {integer, minValue, required, requiredIf} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {getAreaUnits, getPropertyTypes} from "../../composables/property";
import {getCities} from "../../composables/country";
import propertyService from "../../services/propertyService";
import { QuillEditor } from '@vueup/vue-quill'
import BlotFormatter from 'quill-blot-formatter'
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    name: "AddProperty",
    components: {
        QuillEditor
    },
    setup(props){
        const modules = {
            name: 'blotFormatter',
            module: BlotFormatter,
            options: {}
        };
        const title = ref('');
        const type = ref(1);
        const area = ref('');
        const areaUnit = ref(1);
        const city = ref(1);
        const purpose = ref(1);
        const price = ref('');
        const location = ref('');
        const description = ref('');
        const address = ref('');
        const bedrooms = ref(0);
        const bathrooms = ref(0);
        const isOccupancyStatus = ref(false);
        const isInstallmentAvailable = ref(false);
        const isPossessionAvailable = ref(false);

        const propertyTypes = getPropertyTypes();
        const allAreaUnits = getAreaUnits();
        const allCities = getCities();
        console.log(propertyTypes);

        const validationRules = computed(() => {
            return {
                title: {
                    required,
                },
                area: {
                    required,
                    minValue: minValue(1)
                },
                price:{
                    required,
                    integer,
                    minValue: minValue(1)
                },
                location:{
                    required
                },
                address:{
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {title, area, price,location, address}
        );
        const handleAddProperty = () => {
            propertyService.handleAddProperty({
                title: title.value,
                property_sub_type_id: type.value,
                area_unit_id: areaUnit.value,
                area: area.value,
                city_id: city.value,
                purpose: purpose.value,
                price: price.value,
                location: location.value,
                address: address.value,
                bedrooms: bedrooms.value,
                description: description.value,
                bathrooms: bathrooms.value,
                occupancy_status: isOccupancyStatus.value,
                installment_available: isInstallmentAvailable.value,
                possession_available: isPossessionAvailable.value,
            });
        }

        return{
            v$,
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
            isPossessionAvailable,
            propertyTypes,
            allAreaUnits,
            allCities,
            description,
            handleAddProperty,
            modules
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
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
