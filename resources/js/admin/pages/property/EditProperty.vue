<template>
    <main id="main-container">
        <div class="content">
            <div id="property-dashboard-section" class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Edit Property</h3>
                </div>
                <div class="block-content block-content-full" v-if="propertyData">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="py-2 row">
                                            <div class="form-group col-6 col-lg-3 col-sm-6">
                                                <label for="title">&nbsp Property Title</label>
                                                <input id="title" class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="propertyData.title"
                                                       @blur="v$.propertyData.title.$touch()"
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.propertyData.title.$dirty">
                                                        <sub v-if="v$.propertyData.title.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Title is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-lg-3 col-sm-6" v-if="propertyTypes">
                                                <label>&nbsp Property Type</label>
                                                <select id="property-type"
                                                        class="form-control form-control-alt form-control-lg"
                                                        v-model="propertyData.property_sub_type_id"
                                                >
                                                    <option
                                                        v-for="propertyType in propertyTypes"
                                                        :value="propertyType.id"
                                                        :selected="propertyData.property_sub_type_id === propertyType.id"
                                                    >{{ propertyType.name }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-6 col-lg-1 col-sm-6">
                                                <label for="area">&nbsp Area</label>
                                                <input id="area" class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="propertyData.area" required
                                                       @blur="v$.propertyData.area.$touch()"
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.propertyData.area.$dirty">
                                                        <sub v-if="v$.propertyData.area.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Area is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-6 col-lg-2 col-sm-6" v-if="allAreaUnits">
                                                <label for="area">&nbsp Unit</label>
                                                <select
                                                    class="form-control form-control-alt form-control-lg"
                                                    v-model="propertyData.area_unit_id"
                                                >
                                                    <option v-for="unit in allAreaUnits"
                                                            :value="unit.id"
                                                            :selected="propertyData.area_unit_id === unit.id"
                                                    >{{ unit.name }}
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-6 col-lg-3 col-sm-6" v-if="allCities">
                                                <label>&nbsp City</label>
                                                <select id="cities"
                                                        class="form-control form-control-alt form-control-lg"
                                                        v-model="propertyData.city_id"
                                                >
                                                    <option v-for="city in allCities"
                                                            :value="city.id"
                                                            :selected="propertyData.location.city.id === city.id"
                                                    >{{ city.name }}
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="py-2 row">
                                            <div class="form-group col-6 col-lg-3 col-sm-6">
                                                <label>&nbsp Purpose</label>
                                                <select id="purpose"
                                                        class="form-control form-control-alt form-control-lg"
                                                        v-model="propertyData.purpose"
                                                >
                                                    <option value="1" :selected="propertyData.purpose">For Sale</option>
                                                    <option value="2" :selected="propertyData.purpose">For Rent</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-6 col-lg-3 col-sm-6">
                                                <label for="price">&nbsp Price</label>
                                                <input id="price" class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="propertyData.price"
                                                       @blur="v$.propertyData.price.$touch()"
                                                       required
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.propertyData.price.$dirty">
                                                        <sub v-if="v$.propertyData.price.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Price is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-6 col-lg-3 col-sm-6">
                                                <label >&nbsp Location</label>
                                                <select id="cities"
                                                        class="form-control form-control-alt form-control-lg"
                                                        v-model="propertyData.location_id"
                                                >
                                                    <option v-for="location in allCityLocations"
                                                            :value="location.id"
                                                            :selected="propertyData.location_id === location.id"
                                                    >{{ location.name }}
                                                    </option>

                                                </select>
                                            </div>

                                            <div class="form-group col-6 col-lg-3 col-sm-6">
                                                <label for="address">&nbsp Address</label>
                                                <input id="address"
                                                       class="form-control form-control-alt form-control-lg"
                                                       type="text"
                                                       v-model="propertyData.property_detail.address"
                                                       @blur="v$.propertyData.property_detail.address.$touch()"
                                                />
                                                <div class="text-left">
                                                    <div v-if="v$.propertyData.property_detail.address.$dirty">
                                                        <sub v-if="v$.propertyData.property_detail.address.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Address is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="py-2 row">
                                            <div class="form-group col-6 col-lg-3 col-sm-6">
                                                <label for="bedrooms">&nbsp Bedrooms</label>
                                                <input id="bedrooms"
                                                       class="form-control form-control-alt form-control-lg"
                                                       type="number"
                                                       v-model="propertyData.property_detail.bedrooms"
                                                       min="0"
                                                       oninput="validity.valid||(value=0)"
                                                />
                                            </div>
                                            <div class="form-group col-6 col-lg-3 col-sm-6">
                                                <label for="bathrooms">&nbsp Bathrooms</label>
                                                <input id="bathrooms"
                                                       class="form-control form-control-alt form-control-lg"
                                                       type="number"
                                                       v-model="propertyData.property_detail.bathrooms"
                                                       min="0"
                                                       oninput="validity.valid||(value=0)"
                                                />
                                            </div>
                                            <div class="form-group col-6 col-lg-2 col-sm-6">
                                                <strong class="d-block">&nbsp Occupancy Status</strong>
                                                <label for="occupancy-status" class="switch">
                                                    <input id="occupancy-status"
                                                           class="form-control form-control-alt form-control-lg"
                                                           type="checkbox"
                                                           @change="handleCheckBoxInput('occupancy',$event)"
                                                           :checked="propertyData.property_detail.is_occupancy_status"
                                                    />
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="form-group col-6 col-lg-2 col-sm-6">
                                                <strong class="d-block">&nbsp Installment Available</strong>
                                                <label for="installment-available" class="switch">
                                                    <input id="installment-available"
                                                           class="form-control form-switch form-control-alt form-control-lg"
                                                           type="checkbox"
                                                           @change="handleCheckBoxInput('installment',$event)"
                                                           :checked="propertyData.property_detail.is_installment_available"
                                                    />
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <div class="form-group col-6 col-lg-2 col-sm-6">
                                                <strong class="d-block">&nbsp Possession Available</strong>
                                                <label class="switch" for="possession-available">
                                                    <input id="possession-available"
                                                           type="checkbox"
                                                           @change="handleCheckBoxInput('possession',$event)"
                                                           :checked="propertyData.property_detail.is_possession_available"
                                                    />
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="py-2 row">
                                            <div class="form-group col-10 offset-1">
                                                <label >&nbsp Property Images  </label>
                                                <drop-zone v-model="dataFiles" ></drop-zone>
                                            </div>
                                        </div>
                                        <div class="py-2 row">
                                            <div class="form-group w-100 px-3">
                                                <upload-list :items="dataFiles" :itemsProgress="fileProgress"></upload-list>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12" v-if="propertyMedia" >
                                                <property-files-list action="edit" :propertyMedia="propertyMedia"></property-files-list>
                                            </div>
                                        </div>
                                        <div class="py-2 row">
                                            <div class="form-group col-10 offset-1">
                                                <label>&nbsp Description </label>
                                                <QuillEditor toolbar="minimal" theme="snow"
                                                             v-model:content="propertyData.property_detail.description"
                                                             contentType="html" :modules="modules"
                                                             ref="quillEditor"
                                                             @blur="handleDescriptionValidation($event)"
                                                             @input="handleDescriptionValidation($event)"
                                                />
                                                <div class="text-left">
                                                    <div >
                                                        <sub v-if="descriptionLength < 2"
                                                             class="px-2 py-2 text-danger">
                                                            Description is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
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
                                            <button v-else @click.prevent="handleUpdateProperty"
                                                    type="submit"
                                                    class="btn btn-primary"
                                            >
                                                <i class="fa fa-fw fa-paper-plane mr-1"></i>Submit
                                            </button>
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
import {computed, watchEffect, ref} from "vue";
import {integer, minValue, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {getAreaUnits, getProperty, getPropertyTypes} from "../../composables/property";
import {getAllLocationsByCItyId, getCities} from "../../composables/country";
import propertyService from "../../services/propertyService";
import {QuillEditor} from '@vueup/vue-quill'
import BlotFormatter from 'quill-blot-formatter'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import {ApiResponse} from "../../constants";
import DropZone from "../dropzone/DropZone";
import UploadList from "../dropzone/UploadList";
import PropertyFilesList from "./PropertyFilesList";
import auth from "../../services/authService";

export default {
    name: "EditProperty",
    components: {
        PropertyFilesList,
        UploadList,
        DropZone,
        QuillEditor
    },
    props: {
        propertyId: Number
    },
    setup(props) {
        const modules = {
            name: 'blotFormatter',
            module: BlotFormatter,
            options: {}
        };
        const dataFiles = ref([]);
        const propertyMedia = ref([]);
        const fileProgress = ref([]);

        const isOccupancyStatus = ref();
        const isInstallmentAvailable = ref();
        const isPossessionAvailable = ref();
        const propertyTypes = getPropertyTypes();
        const allAreaUnits = getAreaUnits();
        const allCityLocations = getAllLocationsByCItyId(4);

        const allCities = getCities();
        const quillEditor = ref();
        const descriptionLength = ref();
        let propertyData = ref(null);
        let property = getProperty(props.propertyId);

        watchEffect(()=>{
            if(property.value){
                propertyData.value = {...property.value};
            }
            if(propertyData.value && propertyData.value.property_detail) {
                isInstallmentAvailable.value = propertyData.value.property_detail.is_installment_available;
                isOccupancyStatus.value = propertyData.value.property_detail.is_occupancy_status;
                isPossessionAvailable.value = propertyData.value.property_detail.is_possession_available;
            }
            if(propertyData.value && propertyData.value.media){
                propertyMedia.value = propertyData.value.media;
            }
            console.log(propertyData.value,"propertyData.value");
        })
        const validationRules = computed(() => {
            return {
                propertyData: {
                    title: {
                        required,
                    },
                    area: {
                        required,
                        minValue: minValue(1)
                    },
                    price: {
                        required,
                        integer,
                        minValue: minValue(1)
                    },
                    property_detail: {
                        address: {
                            required
                        },
                    }
                }
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {propertyData}
        );

        function handleCheckBoxInput(checkBoxType,e){
            (checkBoxType === 'installment') ?  isInstallmentAvailable.value = e.target.checked :
            (checkBoxType === 'occupancy') ? isOccupancyStatus.value = e.target.checked:
            isPossessionAvailable.value = e.target.checked
        }
        function handleDescriptionValidation(e){
            let quill = quillEditor.value.getQuill()
            descriptionLength.value = quill.getLength();
        }
        const handleUpdateProperty = async () => {
            const response = await propertyService.handleUpdateProperty({
                title: propertyData.value.title,
                property_sub_type_id: propertyData.value.property_sub_type_id,
                area_unit_id: propertyData.value.area_unit_id,
                area: propertyData.value.area,
                purpose: propertyData.value.purpose,
                price: propertyData.value.price,
                location_id: propertyData.value.location_id,
                address: propertyData.value.property_detail.address,
                bedrooms: propertyData.value.property_detail.bedrooms,
                description: propertyData.value.property_detail.description,
                bathrooms: propertyData.value.property_detail.bathrooms,
                is_occupancy_status: isOccupancyStatus.value,
                is_installment_available: isInstallmentAvailable.value,
                is_possession_available: isPossessionAvailable.value,
                user_id: propertyData.value.user_id,

            }, props.propertyId);// city_id: propertyData.value.city_id,
                propertyService.handleImages(dataFiles, fileProgress, props.propertyId);

        }
        return {
            v$,
            propertyTypes,
            allAreaUnits,
            allCities,
            handleUpdateProperty,
            propertyData,
            modules,
            isOccupancyStatus,
            isInstallmentAvailable,
            isPossessionAvailable,
            handleCheckBoxInput,
            handleDescriptionValidation,
            quillEditor,
            descriptionLength,
            allCityLocations,
            dataFiles,
            fileProgress,
            propertyMedia
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
