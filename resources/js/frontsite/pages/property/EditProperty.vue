<template>
    <section id="add_property" v-if="property">
        <div class="container py-2">
            <div class="card shadow-sm login-card w-100 text-left mt-5">
                <div class="card-header bg-white border-bottom-0 mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold add_property text-4 px-3">Edit Property</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-3">
                        <div class="col-lg-12">
                            <form>
                                <div class="">
                                    <div class="main_subheader" style="margin-top: -30px;">Property Type and Location</div>
                                    <div class="form-group row text-center mt-4">
                                        <label class="col-lg-3 text-lg-right text-md-left text-sm-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">Purpose:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="btn btn-check border-right">
                                                    <div class="form-check">
                                                        <input type="radio"
                                                               class="form-check-input"
                                                               :value="PropertyPurpose.FOR_SALE"
                                                               id="purpose"
                                                               name="purpose"
                                                               @blur="v$.property.purpose.$touch()"
                                                               v-model="property.purpose"
                                                        >
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" >For Sale</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio"
                                                               :value="PropertyPurpose.FOR_RENT"
                                                               class="form-check-input"
                                                               name="purpose"
                                                               v-model="property.purpose"
                                                               @blur="v$.property.purpose.$touch()"
                                                        >
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" >For Rent</label>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div v-if="v$.property.purpose.$dirty">
                                                        <sub v-if="v$.property.purpose.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Purpose is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row" v-if="parentTypes">
                                        <label class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">Property Type:</label>

                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="btn btn-check border-right" v-for="type in parentTypes">
                                                    <div class="form-check ">
                                                        <input
                                                            type="radio"
                                                            class="form-check-input"
                                                            :value="type.id"
                                                            @change="filterPropertyTypesById(type.id)"
                                                            v-model="property.property_sub_type.property_type.id"
                                                            data-toggle="collapse"
                                                            data-target=".multi-collapse01"
                                                            aria-expanded="false"
                                                            aria-controls="multiCollapseExample1 multiCollapseExample2"
                                                        >
                                                        <label
                                                            class="form-check-label letter-spacing font-weight-bold text-secondary text-2"
                                                        >{{type.name}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- drop data -->
                                            <div class="d-flex" v-if="parentSubTypes">
                                                <div class="  mt-3 " v-for="(type,key) in parentSubTypes" :key="type.id">
                                                    <div class="btn btn-check">
                                                        <div class="form-check">
                                                            <input
                                                                :value="type.id"
                                                                type="radio"
                                                                v-model="property.property_sub_type_id"
                                                                name="sub_type"
                                                                class="form-check-input"
                                                            >
                                                            <label
                                                                class="form-check-label letter-spacing font-weight-bold text-secondary text-2">
                                                                {{type.name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--                                    <div class="form-group row">-->
                                    <!--                                        <label class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">City:</label>-->
                                    <!--                                        <div class="col-lg-9">-->
                                    <!--                                            <div class="d-flex align-items-center">-->
                                    <!--                                                <select class="form-control w-50" >-->
                                    <!--                                                    <option>Select City</option>-->
                                    <!--                                                    <option>Lahore</option>-->
                                    <!--                                                    <option>Karachi</option>-->
                                    <!--                                                    <option>Islamabad</option>-->
                                    <!--                                                    <option>Rawalpindi</option>-->
                                    <!--                                                    <option>Faisalabad</option>-->
                                    <!--                                                </select>-->
                                    <!--                                            </div>-->
                                    <!--                                        </div>-->
                                    <!--                                    </div>-->
                                    <div class="form-group row" v-if="allCityLocations">
                                        <label class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">Location:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-50">
                                                    <select  class="form-control "
                                                             v-model="property.location_id"
                                                    >
                                                        <option v-for="location in allCityLocations" :value="location.id" :selected="location.id===property.location_id">{{location.name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Address:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-50">
                                                    <input
                                                        v-model="property.property_detail.address"
                                                        @blur="v$.property.property_detail.address.$touch()"
                                                        type="text"
                                                        class="form-control"
                                                    >
                                                    <div class="text-left">
                                                        <div v-if="v$.property.property_detail.address.$dirty">
                                                            <sub v-if="v$.property.property_detail.address.$error"
                                                                 class="px-2 py-2 text-danger">
                                                                Address is Required
                                                            </sub>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main_subheader">Property Space and Price</div>
                                    <div class="form-group mt-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex justify-content-end">
                                                    <label class=" text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2 pr-3">Area Size:</label>
                                                    <div class="form-group px-3">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            v-model="property.area"
                                                            placeholder="Area"
                                                            @blur="v$.property.area.$touch()"
                                                        >
                                                        <div class="text-left">
                                                            <div v-if="v$.property.area.$dirty">
                                                                <sub v-if="v$.property.area.$error"
                                                                     class="px-2 py-2 text-danger">
                                                                    Area is Required
                                                                </sub>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group d-flex justify-content-start">
                                                    <label class="text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2 pr-3">Unit:</label>
                                                    <div class="px-3 w-50" v-if="allAreaUnits">
                                                        <select
                                                            class="form-control"
                                                            v-model="property.area_unit_id"
                                                            @blur="v$.property.area_unit_id.$touch()"
                                                        >
                                                            <option value="0">--Select Area Unit--</option>
                                                            <option v-for="unit in allAreaUnits" :value="unit.id" :selected="unit.id===property.area_unit_id">{{unit.name}}</option>
                                                        </select>
                                                        <div class="text-left">
                                                            <div v-if="v$.property.area_unit_id.$dirty">
                                                                <sub v-if="v$.property.area_unit_id.$error"
                                                                     class="px-2 py-2 text-danger">
                                                                    Area Unit is Required
                                                                </sub>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="property.property_sub_type?.property_type?.id == PropertyType.HOMES || property.property_sub_type?.property_type?.id == PropertyType.COMMERCIAL">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Bedrooms:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            v-model.number="property.property_detail.bedrooms"
                                                            @blur="v$.property.property_detail.bedrooms.$touch()"
                                                            type="number"
                                                            class="form-control"
                                                        >
                                                        <div class="text-left">
                                                            <div v-if="v$.property.property_detail.bedrooms.$dirty">
                                                                <sub v-if="v$.property.property_detail.bedrooms.$error"
                                                                     class="px-2 py-2 text-danger">
                                                                    Bedroom is Required
                                                                </sub>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Bathrooms:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            v-model.number="property.property_detail.bathrooms"
                                                            @blur="v$.property.property_detail.bathrooms.$touch()"
                                                            type="number"
                                                            class="form-control"
                                                        >
                                                        <div class="text-left">
                                                            <div v-if="v$.property.property_detail.bathrooms.$dirty">
                                                                <sub v-if="v$.property.property_detail.bathrooms.$error"
                                                                     class="px-2 py-2 text-danger">
                                                                    Bathroom is Required
                                                                </sub>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Occupancy Status:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center w-50">
                                                    <select
                                                        class="form-control"
                                                        v-model="property.property_detail.is_occupancy_status"
                                                    >
                                                        <option value="1" :selected="property.property_detail.is_occupancy_status == OccupancyStatus.VACANT">Vacant</option>
                                                        <option value="0" :selected="property.property_detail.is_occupancy_status == OccupancyStatus.OCCUPIED">Occupied</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Total Price:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-50">
                                                    <input
                                                        v-model="property.price"
                                                        @blur="v$.property.price.$touch()"
                                                        type="text"
                                                        class="form-control"
                                                    >
                                                    <div class="text-left">
                                                        <div v-if="v$.property.price.$dirty">
                                                            <sub v-if="v$.property.price.$error"
                                                                 class="px-2 py-2 text-danger">
                                                                Price is Required
                                                            </sub>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" v-if="property.purpose == PropertyPurpose.FOR_SALE">
                                        <label
                                            class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2"
                                        >Installment Available:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="btn btn-check border-right">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                               class="form-check-input"
                                                               id="installment"
                                                               name="installment"
                                                               :checked="property.property_detail.is_installment_available"
                                                        >
                                                        <label
                                                            class="form-check-label letter-spacing font-weight-bold text-secondary text-2"
                                                        >Property on Installment</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-if="property.property_detail.is_installment_available">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">
                                                Advance/Initial Payment:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">
                                                No. of Remaining Installments:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">
                                                Monthly Installment:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" v-if="property.purpose == PropertyPurpose.FOR_SALE && showPossessionOnSubTypes(property.property_sub_type_id)">
                                        <label
                                            class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2"
                                        >Possession Available:</label>

                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="btn btn-check border-right">
                                                    <div class="form-check">
                                                        <input type="checkbox"
                                                               class="form-check-input"
                                                               id="possesion"
                                                               name="possession"
                                                               :checked="property.property_detail.is_possession_available"
                                                        >
                                                        <label
                                                            class="form-check-label letter-spacing font-weight-bold text-secondary text-2"
                                                        >Available</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Lising Expiry:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center w-50">
                                                    <select class="form-control" >
                                                        <option>1 Month</option>
                                                        <option>3 Month</option>
                                                        <option>6 Month</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Rental Price Details -->
                                    <div v-if="property.purpose == PropertyPurpose.FOR_RENT">
                                        <div class="main_subheader">Rental Price Details</div>

                                        <div class="form-group row mt-4">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Minimum Contract Period:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center w-25 pr-2">
                                                        <select class="form-control" >
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                            <option>11</option>
                                                            <option>12</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex align-items-center w-25">
                                                        <select class="form-control" >
                                                            <option>Month</option>
                                                            <option>Year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Monthly Rent:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Security Deposit:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Advance Rent:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main_subheader mb-4">Property Title and Description</div>
                                    <div class="col-lg-9">
                                        <div class="form-group row mt-4">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Property Tittle:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-100">
                                                        <input
                                                            v-model="property.title"
                                                            @blur="v$.property.title.$touch()"
                                                            type="text"
                                                            class="form-control"
                                                        >
                                                        <div class="text-left">
                                                            <div v-if="v$.property.title.$dirty">
                                                                <sub v-if="v$.property.title.$error"
                                                                     class="px-2 py-2 text-danger">
                                                                    Title is Required
                                                                </sub>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Description:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-100">
                                                        <QuillEditor  ref="quillEditor" @blur="handleDescriptionValidation($event)" @input="handleDescriptionValidation($event)"  toolbar="minimal" theme="snow" v-model:content="property.property_detail.description" contentType="html" :modules="modules"/>
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
                                        </div>
                                    </div>

                                    <div class="main_subheader mb-4">Add Images</div>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <button @click.prevent="openConfirmImageModal=true" class="btn btn-secondary border-0 text-white w-25 letter-uppercase">Add Images</button>
                                        </div>
                                    </div>
                                    <div class="main_subheader mt-4"></div>
                                    <div class="form-group col-12 text-center mt-3">
                                        <button v-if="v$.$invalid"
                                                disabled
                                                type="submit"
                                                class="btn btn-secondary border-0 text-white w-25 letter-uppercase cursor-not-allowed"
                                        >
                                            Add property here
                                        </button>
                                        <button v-else @click.prevent="handleAddProperty"
                                                type="submit"
                                                class="btn test-fancy border-0 text-white btn-color w-25 letter-uppercase"
                                        >
                                            Add property here
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{property}}
    <property-images-modal
        :openConfirmImageModal="openConfirmImageModal"
        @openConfirmImageModal = "openConfirmImageModal=false"
        @handlePropertyImages = "handlePropertyImages($event)"
        v-on:cancel="openConfirmImageModal=false"
    ></property-images-modal>
</template>

<script>
import BlotFormatter from "quill-blot-formatter";
import {computed, ref,watch, watchEffect} from "vue";
import {integer, minValue, required,requiredIf} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {getAreaUnits, getParentTypes, getProperty, getPropertyTypes} from "../../composables/property";
import {
    ApiResponse,
    CommercialSubType,
    HomesSubType,
    PlotsSubType,
    PropertyPurpose,
    PropertyType,
    OccupancyStatus
} from "../../../constants";
import {getAllLocationsByCItyId} from "../../composables/country";
import PropertyImagesModal from "../../components/property/PropertyImagesModal";
import {QuillEditor} from "@vueup/vue-quill";
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import propertyService from "../../services/propertyService";
import router from "~/frontsite/router";


export default {
    name: "EditProperty",
    components: { QuillEditor,PropertyImagesModal},
    props:{
        slug:String,
        propertyId:Number
    },
    setup(props){
        const modules = {
            name: 'blotFormatter',
            module: BlotFormatter,
            options: {}
        };
        const openConfirmImageModal = ref(false);
        const parentType = ref(null);
        const parentSubTypes = ref([]);
        const subType = ref(null);
        const cityId = ref(4);
        const locationId = ref(1);
        const isOccupancyStatus = ref(1);
        const isInstallmentAvailable = ref(false);
        const isPossessionAvailable = ref(false);
        const quillEditor = ref();
        const propertyTypes = getPropertyTypes();
        const parentTypes = getParentTypes();
        const allAreaUnits = getAreaUnits();
        const dataFiles = ref([]);
        const fileProgress = ref([]);
        const property = ref(null);
        getProperty(props.propertyId);
        async function getProperty(propertyId){
            property.value = await propertyService.getPropertyById(propertyId);
        }
        // const property = getProperty(props.propertyId, props.slug);
        watch(property,()=>{
            if(property.value){
                filterPropertyTypesById(property.value.property_sub_type?.property_type?.id);
            }
            // if(propertyData.value && propertyData.value.property_detail) {
            //     isInstallmentAvailable.value = propertyData.value.property_detail.is_installment_available;
            //     isOccupancyStatus.value = propertyData.value.property_detail.is_occupancy_status;
            //     isPossessionAvailable.value = propertyData.value.property_detail.is_possession_available;
            // }
            // if(propertyData.value && propertyData.value.media){
            //     propertyMedia.value = propertyData.value.media;
            // }
            // console.log(propertyData.value,"propertyData.value");
        })
        const showSubTypesArray = [HomesSubType.HOUSE,HomesSubType.FLAT,HomesSubType.FARM_HOUSE,HomesSubType.PENT_HOUSE,
            PlotsSubType.RESIDENTIAL_PLOT,PlotsSubType.COMMERCIAL_PLOT,CommercialSubType.SHOP];
        function filterPropertyTypesById(typeId){
            if(propertyTypes.value){
                parentSubTypes.value = [];
                parentSubTypes.value = propertyTypes.value.filter(function (type){
                    return type.property_type.id == typeId
                })
            }
        }
        function showPossessionOnSubTypes(subTypeId){
            return showSubTypesArray.includes(subTypeId);
        }
        // const allCities = getCities();
        const allCityLocations = getAllLocationsByCItyId(4);

        const validationRules = computed(() => {
            return {
                property:{
                    purpose: {
                        required,
                    },
                    title: {
                        required,
                    },
                    area_unit_id: {
                        required,
                        minValue: minValue(1)
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
                    property_detail:{
                        address:{
                            required
                        },bedrooms:{
                            required: requiredIf(() => {
                                return property.value?.property_sub_type?.property_type?.id.value != PropertyType.PLOTS;
                            }),
                        },bathrooms:{
                            required: requiredIf(() => {
                                return property.value?.property_sub_type?.property_type?.id.value != PropertyType.PLOTS;
                            }),
                        },
                    }

                }

            }
        });
        const v$ = useVuelidate(
            validationRules,
            {property}
        );
        const descriptionLength = ref();
        function handleDescriptionValidation(e){
            let quill = quillEditor.value.getQuill()
            descriptionLength.value = quill.getLength();
        }
        const handlePropertyImages = (data) => {
            dataFiles.value = data.dataFiles.value;
            fileProgress.value = data.fileProgress.value
        }
        const handleAddProperty =  async () => {
            // const response = await propertyService.handleAddProperty({
            //     title: title.value,
            //     property_sub_type_id: subType.value,
            //     area_unit_id: areaUnit.value,
            //     area: area.value,
            //     city_id: cityId.value,
            //     purpose: purpose.value,
            //     price: price.value,
            //     location_id: locationId.value,
            //     address: address.value,
            //     bedrooms: bedrooms.value,
            //     description: description.value,
            //     bathrooms: bathrooms.value,
            //     is_occupancy_status: isOccupancyStatus.value,
            //     is_installment_available: isInstallmentAvailable.value,
            //     is_possession_available: isPossessionAvailable.value,
            // });
            // if (response.status === ApiResponse.SUCCESS) {
            //     const addResponse = propertyService.handleImages(dataFiles, fileProgress, response.payload.property_id);
            //     const addMore = 3;
            //     propertyService.getPropertiesBySlug(props.slug, {paginateData: addMore})
            //     router.push({path:'/'+props.slug});
            //
            // }
        }

        return{
            v$,
            subType,
            parentSubTypes,
            cityId,
            locationId,
            isOccupancyStatus,
            isInstallmentAvailable,
            isPossessionAvailable,
            propertyTypes,
            allAreaUnits,
            // allCities,
            handleAddProperty,
            modules,
            handleDescriptionValidation,
            quillEditor,
            descriptionLength,
            allCityLocations,
            dataFiles,
            fileProgress,
            PropertyType,
            openConfirmImageModal,
            parentTypes,
            filterPropertyTypesById,
            parentType,
            PropertyPurpose,
            // HomesSubType,
            // PlotsSubType,
            // CommercialSubType,
            showPossessionOnSubTypes,
            handlePropertyImages,
            property,
            OccupancyStatus
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
