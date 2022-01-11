<template>
    <section id="add_property">
        <div class="container py-2">
            <div class="card shadow-sm login-card w-100 text-left mt-5">
                <div class="card-header bg-white border-bottom-0 mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold add_property text-4 px-3">Add Property</h2>
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
                                                               @blur="v$.purpose.$touch()"
                                                               v-model="purpose"
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
                                                               v-model="purpose"
                                                               @blur="v$.purpose.$touch()"
                                                        >
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" >For Rent</label>
                                                    </div>
                                                </div>
                                                <div class="text-left">
                                                    <div v-if="v$.purpose.$dirty">
                                                        <sub v-if="v$.purpose.$error"
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
                                                            v-model="parentType"
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
                                                                v-model="subType"
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
                                                            v-model="locationId"
                                                    >
                                                        <option v-for="location in allCityLocations" :value="location.id" :selected="location.id===locationId">{{location.name}}</option>
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
                                                        v-model="address"
                                                        @blur="v$.address.$touch()"
                                                        type="text"
                                                        class="form-control"
                                                    >
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
                                                            v-model="area"
                                                            placeholder="Area"
                                                            @blur="v$.area.$touch()"
                                                        >
                                                        <div class="text-left">
                                                            <div v-if="v$.area.$dirty">
                                                                <sub v-if="v$.area.$error"
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
                                                            v-model="areaUnit"
                                                            @blur="v$.areaUnit.$touch()"
                                                        >
                                                            <option value="0">--Select Area Unit--</option>
                                                            <option v-for="unit in allAreaUnits" :value="unit.id" :selected="unit.id===areaUnit">{{unit.name}}</option>
                                                        </select>
                                                        <div class="text-left">
                                                            <div v-if="v$.areaUnit.$dirty">
                                                                <sub v-if="v$.areaUnit.$error"
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
                                    <div v-if="parentType == PropertyType.HOMES || parentType == PropertyType.COMMERCIAL">
                                        <div class="form-group row">
                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Bedrooms:</label>
                                            <div class="col-lg-9">
                                                <div class="d-flex align-items-center">
                                                    <div class="form-group w-50">
                                                        <input
                                                            v-model.number="bedrooms"
                                                            @blur="v$.bedrooms.$touch()"
                                                            type="number"
                                                            class="form-control"
                                                        >
                                                        <div class="text-left">
                                                            <div v-if="v$.bedrooms.$dirty">
                                                                <sub v-if="v$.bedrooms.$error"
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
                                                            v-model.number="bathrooms"
                                                            @blur="v$.bathrooms.$touch()"
                                                            type="number"
                                                            class="form-control"
                                                        >
                                                        <div class="text-left">
                                                            <div v-if="v$.bathrooms.$dirty">
                                                                <sub v-if="v$.bathrooms.$error"
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
                                                        v-model="isOccupancyStatus"
                                                    >
                                                        <option value="1">Vacant</option>
                                                        <option value="0">Occupied</option>
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
                                                        v-model="price"
                                                        @blur="v$.price.$touch()"
                                                        type="text"
                                                        class="form-control"
                                                    >
                                                    <div class="text-left">
                                                        <div v-if="v$.price.$dirty">
                                                            <sub v-if="v$.price.$error"
                                                                 class="px-2 py-2 text-danger">
                                                                Price is Required
                                                            </sub>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" v-if="purpose == PropertyPurpose.FOR_SALE">
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
                                                               v-model="isInstallmentAvailable"
                                                        >
                                                        <label
                                                            class="form-check-label letter-spacing font-weight-bold text-secondary text-2"
                                                        >Property on Installment</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<!--                                    <div v-if="isInstallmentAvailable">-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">-->
<!--                                                Advance/Initial Payment:</label>-->
<!--                                            <div class="col-lg-9">-->
<!--                                                <div class="d-flex align-items-center">-->
<!--                                                    <div class="form-group w-50">-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                        >-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">-->
<!--                                                No. of Remaining Installments:</label>-->
<!--                                            <div class="col-lg-9">-->
<!--                                                <div class="d-flex align-items-center">-->
<!--                                                    <div class="form-group w-50">-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                        >-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">-->
<!--                                                Monthly Installment:</label>-->
<!--                                            <div class="col-lg-9">-->
<!--                                                <div class="d-flex align-items-center">-->
<!--                                                    <div class="form-group w-50">-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                        >-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="form-group row" v-if="purpose == PropertyPurpose.FOR_SALE && showPossessionOnSubTypes(subType)">
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
                                                               v-model="isPossessionAvailable"
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
<!--                                    <div v-if="purpose == PropertyPurpose.FOR_RENT">-->
<!--                                        <div class="main_subheader">Rental Price Details</div>-->

<!--                                        <div class="form-group row mt-4">-->
<!--                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Minimum Contract Period:</label>-->
<!--                                            <div class="col-lg-9">-->
<!--                                                <div class="d-flex align-items-center">-->
<!--                                                    <div class="d-flex align-items-center w-25 pr-2">-->
<!--                                                        <select class="form-control" >-->
<!--                                                            <option>1</option>-->
<!--                                                            <option>2</option>-->
<!--                                                            <option>3</option>-->
<!--                                                            <option>4</option>-->
<!--                                                            <option>5</option>-->
<!--                                                            <option>6</option>-->
<!--                                                            <option>7</option>-->
<!--                                                            <option>8</option>-->
<!--                                                            <option>9</option>-->
<!--                                                            <option>10</option>-->
<!--                                                            <option>11</option>-->
<!--                                                            <option>12</option>-->
<!--                                                        </select>-->
<!--                                                    </div>-->
<!--                                                    <div class="d-flex align-items-center w-25">-->
<!--                                                        <select class="form-control" >-->
<!--                                                            <option>Month</option>-->
<!--                                                            <option>Year</option>-->
<!--                                                        </select>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Monthly Rent:</label>-->
<!--                                            <div class="col-lg-9">-->
<!--                                                <div class="d-flex align-items-center">-->
<!--                                                    <div class="form-group w-50">-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                        >-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Security Deposit:</label>-->
<!--                                            <div class="col-lg-9">-->
<!--                                                <div class="d-flex align-items-center">-->
<!--                                                    <div class="form-group w-50">-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                        >-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="form-group row">-->
<!--                                            <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Advance Rent:</label>-->
<!--                                            <div class="col-lg-9">-->
<!--                                                <div class="d-flex align-items-center">-->
<!--                                                    <div class="form-group w-50">-->
<!--                                                        <input-->
<!--                                                            type="text"-->
<!--                                                            class="form-control"-->
<!--                                                        >-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="main_subheader mb-4">Property Title and Description</div>
                                    <div class="col-lg-9">
                                        <div class="form-group row mt-4">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Property Tittle:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-100">
                                                    <input
                                                        v-model="title"
                                                        @blur="v$.title.$touch()"
                                                        type="text"
                                                        class="form-control"
                                                    >
                                                    <div class="text-left">
                                                        <div v-if="v$.title.$dirty">
                                                            <sub v-if="v$.title.$error"
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
                                                    <QuillEditor  ref="quillEditor" @blur="handleDescriptionValidation($event)" @input="handleDescriptionValidation($event)"  toolbar="minimal" theme="snow" v-model:content="description" contentType="html" :modules="modules"/>
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
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center">
                                           <button @click.prevent="openConfirmImageModal=true" class="btn btn-secondary border-0 text-white w-25 letter-uppercase">Add Images</button>
                                        </div>
                                        <div class="form-group w-100 px-3">
                                            <upload-list :items="dataFiles" :itemsProgress="fileProgress"></upload-list>
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
    <property-images-modal
        :openConfirmImageModal="openConfirmImageModal"
        @openConfirmImageModal = "openConfirmImageModal=false"
        @handlePropertyImages = "handlePropertyImages($event)"
        v-on:cancel="openConfirmImageModal=false"
    ></property-images-modal>
</template>

<script>
import BlotFormatter from "quill-blot-formatter";
import {computed, ref, watch} from "vue";
import {integer, minValue, required,requiredIf} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {getAreaUnits, getParentTypes, getPropertyTypes} from "../../composables/property";
import {
    ApiResponse,
    CommercialSubType,
    HomesSubType,
    PlotsSubType,
    PropertyPurpose,
    PropertyType
} from "../../../constants";
import {getAllLocationsByCItyId} from "../../composables/country";
import PropertyImagesModal from "../../components/property/PropertyImagesModal";
import {QuillEditor} from "@vueup/vue-quill";
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import propertyService from "../../services/propertyService";
import router from "~/frontsite/router";
import UploadList from "../../../frontsite/pages/dropzone/UploadList";

export default {
    name: "AddProperty",
    components: {UploadList, QuillEditor,PropertyImagesModal},
    props:{
      slug:String
    },
    setup(props){
        const modules = {
            name: 'blotFormatter',
            module: BlotFormatter,
            options: {}
        };
        const openConfirmImageModal = ref(false);
        const parentType = ref(null);
        const title = ref('');
        const parentSubTypes = ref([]);
        const subType = ref(null);
        const area = ref('');
        const areaUnit = ref(0);
        const cityId = ref(4);
        const purpose = ref();
        const price = ref();
        const locationId = ref(1);
        const description = ref('');
        const address = ref('');
        const bedrooms = ref(0);
        const bathrooms = ref(0);
        const isOccupancyStatus = ref(1);
        const isInstallmentAvailable = ref(false);
        const isPossessionAvailable = ref(false);
        const quillEditor = ref();
        const propertyTypes = getPropertyTypes();
        const parentTypes = getParentTypes();
        const allAreaUnits = getAreaUnits();
        const dataFiles = ref([]);
        const fileProgress = ref([]);

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
                purpose: {
                    required,
                },
                title: {
                    required,
                },
                area: {
                    required,
                    minValue: minValue(1)
                },
                areaUnit: {
                    required,
                    minValue: minValue(1)
                },
                price:{
                    required,
                    integer,
                    minValue: minValue(1)
                },
                address:{
                    required
                },bedrooms:{
                    required: requiredIf(() => {
                        return parentType.value != PropertyType.PLOTS;
                    }),
                },bathrooms:{
                    required: requiredIf(() => {
                        return parentType.value != PropertyType.PLOTS;
                    }),
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {purpose,title, area, price,locationId, address,areaUnit,bedrooms,
                bathrooms}
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
            const response = await propertyService.handleAddProperty({
                title: title.value,
                property_sub_type_id: subType.value,
                area_unit_id: areaUnit.value,
                area: area.value,
                city_id: cityId.value,
                purpose: purpose.value,
                price: price.value,
                location_id: locationId.value,
                address: address.value,
                bedrooms: bedrooms.value,
                description: description.value,
                bathrooms: bathrooms.value,
                is_occupancy_status: isOccupancyStatus.value,
                is_installment_available: isInstallmentAvailable.value,
                is_possession_available: isPossessionAvailable.value,
            });
            if (response.status === ApiResponse.SUCCESS) {
               const addResponse = propertyService.handleImages(dataFiles, fileProgress, response.payload.property_id);
               const addMore = 3;
               propertyService.getPropertiesBySlug(props.slug, {paginateData: addMore})
                router.push({path:'/'+props.slug});

            }
        }

        return{
            v$,
            title,
            subType,
            parentSubTypes,
            areaUnit,
            area,
            cityId,
            purpose,
            price,
            locationId,
            address,
            bedrooms,
            bathrooms,
            isOccupancyStatus,
            isInstallmentAvailable,
            isPossessionAvailable,
            propertyTypes,
            allAreaUnits,
            // allCities,
            description,
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
            handlePropertyImages

        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
