<template>
    <section class="top-banner border-0 mt-5">
        <div class="container-fluid py-5">
            <div class="container position-relative z-index-2 mt-5 py-2 pb-0 mb-0">
                <div class="row d-flex flex-wrap-reverse">
                    <div
                        class="col-md-8 order-2 order-md-1 mb-0 mt-3 d-flex align-self-center justify-content-md-start justify-content-sm-center justify-content-center">
                        <div class="main-heading text-md-start text-center">
                            <h3 class="heading-font text-light mb-0 letter-spacing">Search properties for sale in Pakistan</h3>
                        </div>
                    </div>
                    <div
                        class="col-md-4 order-2 order-md-1 mb-0 mt-3 d-flex align-self-center justify-content-md-end justify-content-sm-center justify-content-center">
                        <div class="main-links">
                            <ul class="list-unstyled text-white">
                                <li><span style="font-size:11.5px;">HOME</span> <span
                                    style="opacity: 0.6;font-size:11.5px;">>
                                        PROPERTIES</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <form class="form-style-3 pb-5 py-0 mt-0" action="demo-real-estate-properties.html" method="POST">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="">
                                <select
                                    class="select-properites py-3 px-1 btn-block rounded"
                                    v-model="typeId"
                                    id="property-type">
                                    <option value="0"> Property Type</option>
                                    <option v-for="propertyType in propertyTypes" :value="propertyType.id" :selected="propertyType.id===typeId">{{propertyType.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="px-3">
                                <Select2
                                    v-model="locationId"
                                    :options="myOptions"
                                    :settings="{ settingOption: value, settingOption: value }"
                                    @change="myChangeEvent($event)"
                                    @select="mySelectEvent($event)"
                                />
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="">
                                <select class="select-properites py-3 px-1 btn-block rounded"
                                        v-model="beds" id="beds">
                                    <option value="0">Min Beds</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="">
                                <select class="select-properites py-3 px-1 btn-block rounded" v-model="minPrice"
                                        id="min-price">
                                    <option value="0">Min Price</option>
                                    <option value="150000">$150,000</option>
                                    <option value="200000">$200,000</option>
                                    <option value="250000">$250,000</option>
                                    <option value="300000">$300,000</option>
                                    <option value="350000">$350,000</option>
                                    <option value="400000">$400,000</option>
                                    <option value="450000">$450,000</option>
                                    <option value="550000">$500,000</option>
                                    <option value="550000">$550,000</option>
                                    <option value="600000">$600,000</option>
                                    <option value="650000">$650,000</option>
                                    <option value="700000">$700,000</option>
                                    <option value="750000">$750,000</option>
                                    <option value="800000">$800,000</option>
                                    <option value="850000">$850,000</option>
                                    <option value="900000">$900,000</option>
                                    <option value="950000">$950,000</option>
                                    <option value="1000000">$1,000,000</option>
                                    <option value="1250000">$1,250,000</option>
                                    <option value="1500000">$1,500,000</option>
                                    <option value="1750000">$1,750,000</option>
                                    <option value="2000000">$2,000,000</option>
                                    <option value="2500000">$2,500,000</option>
                                    <option value="2500000">$2,500,000</option>
                                    <option value="2750000">$2,750,000</option>
                                    <option value="3000000">$3,000,000</option>
                                    <option value="3250000">$3,250,000</option>
                                    <option value="3500000">$3,500,000</option>
                                    <option value="3750000">$3,750,000</option>
                                    <option value="4000000">$4,000,000</option>
                                    <option value="4250000">$4,250,000</option>
                                    <option value="4500000">$4,500,000</option>
                                    <option value="4750000">$4,750,000</option>
                                    <option value="5000000">$5,000,000</option>
                                    <option value="6000000">$6,000,000</option>
                                    <option value="7000000">$7,000,000</option>
                                    <option value="8000000">$8,000,000</option>
                                    <option value="9000000">$9,000,000</option>
                                    <option value="8000000">$8,000,000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="">
                                <select class="select-properites py-3 px-1 btn-block rounded" v-model="maxPrice"
                                        id="max-price">
                                    <option value="0">Max Price</option>
                                    <option value="150000">$150,000</option>
                                    <option value="200000">$200,000</option>
                                    <option value="250000">$250,000</option>
                                    <option value="300000">$300,000</option>
                                    <option value="350000">$350,000</option>
                                    <option value="400000">$400,000</option>
                                    <option value="450000">$450,000</option>
                                    <option value="550000">$500,000</option>
                                    <option value="550000">$550,000</option>
                                    <option value="600000">$600,000</option>
                                    <option value="650000">$650,000</option>
                                    <option value="700000">$700,000</option>
                                    <option value="750000">$750,000</option>
                                    <option value="800000">$800,000</option>
                                    <option value="850000">$850,000</option>
                                    <option value="900000">$900,000</option>
                                    <option value="950000">$950,000</option>
                                    <option value="1000000">$1,000,000</option>
                                    <option value="1250000">$1,250,000</option>
                                    <option value="1500000">$1,500,000</option>
                                    <option value="1750000">$1,750,000</option>
                                    <option value="2000000">$2,000,000</option>
                                    <option value="2500000">$2,500,000</option>
                                    <option value="2500000">$2,500,000</option>
                                    <option value="2750000">$2,750,000</option>
                                    <option value="3000000">$3,000,000</option>
                                    <option value="3250000">$3,250,000</option>
                                    <option value="3500000">$3,500,000</option>
                                    <option value="3750000">$3,750,000</option>
                                    <option value="4000000">$4,000,000</option>
                                    <option value="4250000">$4,250,000</option>
                                    <option value="4500000">$4,500,000</option>
                                    <option value="4750000">$4,750,000</option>
                                    <option value="5000000">$5,000,000</option>
                                    <option value="6000000">$6,000,000</option>
                                    <option value="7000000">$7,000,000</option>
                                    <option value="8000000">$8,000,000</option>
                                    <option value="9000000">$9,000,000</option>
                                    <option value="8000000">$8,000,000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="select-button">
                                <button @click.prevent="searchPropertyByFilter" class="btn border-0 btn-block test-fancy text-white text-center btn-color py-3">
                                    Search Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</template>

<script>
import {getAllLocationsByCItyId} from "../../composables/country";
import {ref, watchEffect} from "vue";
import {getPropertyTypes} from "../../composables/property";
import Select2 from "vue3-select2-component";
import store from "../../store";

export default {
    name: "SearchBanner",
    components:{Select2},
    setup(props,{emit}){
        const options = getAllLocationsByCItyId(4);
        const locationId = ref(0);
        const typeId = ref(0);
        const beds = ref(0);
        const minPrice = ref(0);
        const maxPrice = ref(0);
        const myOptions = ref([]);
        const model = ref();
        const propertyTypes = getPropertyTypes();

        watchEffect(()=>{
            if(options.value){
                myOptions.value = [{id:0,text:'Location'}];
                model.value = options.value[0];
                options.value.forEach(function (option){
                    myOptions.value = [{id:option.id,text:option.name},...myOptions.value];

                })
            }
        });
        async function searchPropertyByFilter(){
           await store.dispatch('actionSearchFilter',{locationId, typeId, beds, minPrice, maxPrice})
            // emit('handlePropertyFilters', {locationId, typeId, beds, minPrice, maxPrice});
        }
        function myChangeEvent(val) {
            console.log(val);
        }

        function mySelectEvent({id, text}) {
            console.log({id, text})
        }
        return{
            options,
            locationId,
            typeId,
            beds,
            myOptions,
            model,
            propertyTypes,
            myChangeEvent,
            mySelectEvent,
            minPrice,
            maxPrice,
            searchPropertyByFilter
        }
    }
}
</script>

<style >
.select2-container .select2-selection--single{
    width: 120px !important;
    height: 45px !important;
}
</style>
