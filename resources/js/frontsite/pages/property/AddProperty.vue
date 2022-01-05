<template>
    <section id="add_property">
        <div class="container py-2">
            <div class="card shadow-sm login-card w-100 text-left mt-5">
                <div class="card-header bg-white border-bottom-0 mt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="font-weight-bold add_property text-4 px-3">Add a Property</h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row px-3">
                        <div class="col-lg-12">
                            <form id="user-profile" action="" method="">
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
                                                               v-model="purpose"
                                                        >
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" >For Sale</label>
<!--                                                        <div class="text-left">-->
<!--                                                            <div v-if="v$.purpose.$dirty">-->
<!--                                                                <sub v-if="v$.purpose.$error"-->
<!--                                                                     class="px-2 py-2 text-danger">-->
<!--                                                                    Purpose is Required-->
<!--                                                                </sub>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio"
                                                               :value="PropertyPurpose.FOR_RENT"
                                                               class="form-check-input"
                                                               name="purpose"
                                                               v-model="purpose"
                                                        >
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" >For Rent</label>
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
                                                            for="materialUnchecked"
                                                        >{{type.name}}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- drop data -->
                                            <div class="d-flex" v-if="subTypes">
                                                <div class="  mt-3 " v-for="(type,key) in subTypes" :key="type.id">
                                                    <div class="btn btn-check">
                                                        <div class="form-check">
                                                            <input
                                                                :value="type.id"
                                                                type="radio"
                                                                class="form-check-input"
                                                                name="sub_type"
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
                                    <div class="main_subheader">Property Space and Price</div>
                                    <div class="form-group mt-4">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="d-flex justify-content-end">
                                                    <label class=" text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2 pr-3">Area Size:</label>                                                    
                                                    <div class="form-group px-3">
                                                        <input type="text" class="form-control">
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
                                                        >
                                                            <option v-for="unit in allAreaUnits" :value="unit.id" :selected="unit.id===areaUnit">{{unit.name}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Expires Aftar:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="d-flex align-items-center w-50">
                                                    <select class="form-control" >
                                                        <option>Vacant</option>
                                                        <option>Occupied</option>
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
                                    <div class="form-group row">
                                        <label class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">Installment Available:</label>

                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="btn btn-check border-right">
                                                    <div class="form-check">
                                                        <input type="radio"
                                                               class="form-check-input"
                                                               id="installment"
                                                               name="installment"
                                                        >
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" >Property on Installment</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Advance/Initial Payment:</label>
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
                                    
                                    <div class="main_subheader mb-4">Property Title and Description</div>
                                    <div class="col-lg-9">
                                        <div class="form-group row mt-4">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Property Tittle:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-50">
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
                                                    <QuillEditor ref="quillEditor" @blur="handleDescriptionValidation($event)" @input="handleDescriptionValidation($event)"  toolbar="minimal" theme="snow" v-model:content="description" contentType="html" :modules="modules"/>
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
                                    <div class="main_subheader mt-4">Contact Details</div>
                                    <div class="form-group row pt-4">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Username:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-50">
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Password:</label>
                                        <div class="col-lg-9">
                                            <div class="d-flex align-items-center">
                                                <div class="form-group w-50">
                                                    <input type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 text-center mt-3">
                                        <button type="submit" class="btn test-fancy border-0 text-white btn-color w-25 letter-uppercase">
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
    <property-images-modal :openConfirmImageModal="openConfirmImageModal"></property-images-modal>
</template>

<script>
import BlotFormatter from "quill-blot-formatter";
import {computed, ref, watch} from "vue";
import {integer, minValue, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {getAreaUnits, getParentTypes, getPropertyTypes} from "../../composables/property";
import {PropertyPurpose, PropertyType} from "../../../constants";
import {getAllLocationsByCItyId} from "../../composables/country";
import PropertyImagesModal from "../../components/property/PropertyImagesModal";
import {QuillEditor} from "@vueup/vue-quill";
import '@vueup/vue-quill/dist/vue-quill.snow.css';

export default {
    name: "AddProperty",
    components: { QuillEditor,PropertyImagesModal},
    setup(props){
        const modules = {
            name: 'blotFormatter',
            module: BlotFormatter,
            options: {}
        };
        const openConfirmImageModal = ref(false);
        const parentType = ref(null);
        const title = ref('');
        const subTypes = ref([]);
        const area = ref('');
        const areaUnit = ref(1);
        const city = ref(1);
        const purpose = ref();
        const price = ref();
        const locationId = ref(1);
        const description = ref('');
        const address = ref('');
        const bedrooms = ref(0);
        const bathrooms = ref(0);
        const isOccupancyStatus = ref(false);
        const isInstallmentAvailable = ref(false);
        const isPossessionAvailable = ref(false);
        const quillEditor = ref();
        const propertyTypes = getPropertyTypes();
        const parentTypes = getParentTypes();
        const allAreaUnits = getAreaUnits();

        function filterPropertyTypesById(typeId){
            if(propertyTypes.value){
                subTypes.value = [];
                subTypes.value = propertyTypes.value.filter(function (type){
                    return type.property_type.id == typeId
                })
            }
        }
        // const allCities = getCities();
        const allCityLocations = getAllLocationsByCItyId(4);
        const dataFiles = ref([]);
        const fileProgress = ref([]);
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
                price:{
                    required,
                    integer,
                    minValue: minValue(1)
                },
                address:{
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {purpose,title, area, price,locationId, address}
        );
        const descriptionLength = ref();
        function handleDescriptionValidation(e){
            let quill = quillEditor.value.getQuill()
            descriptionLength.value = quill.getLength();
        }
        // const handleAddProperty =  async () => {
        //     const response = await propertyService.handleAddProperty({
        //         title: title.value,
        //         property_sub_type_id: type.value,
        //         area_unit_id: areaUnit.value,
        //         area: area.value,
        //         city_id: city.value,
        //         purpose: purpose.value,
        //         price: price.value,
        //         location_id: location_id.value,
        //         address: address.value,
        //         bedrooms: bedrooms.value,
        //         description: description.value,
        //         bathrooms: bathrooms.value,
        //         is_occupancy_status: isOccupancyStatus.value,
        //         is_installment_available: isInstallmentAvailable.value,
        //         is_possession_available: isPossessionAvailable.value,
        //     });
        //     if (response.status === ApiResponse.SUCCESS) {
        //         propertyService.handleImages(dataFiles, fileProgress, response.payload.property_id);
        //     }
        // }

        return{
            v$,
            title,
            subTypes,
            areaUnit,
            area,
            city,
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
            // handleAddProperty,
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
            PropertyPurpose

        }
    }
}
</script>

<style scoped>

</style>
