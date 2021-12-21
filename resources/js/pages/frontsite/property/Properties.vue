<template>
    <front-header></front-header>
    <section class="page-top-banner bg-primary border-0 mt-5">
        <div class="container-fluid py-5">
            <div class="container position-relative z-index-2 py-5 pb-0 mb-0">
                <div class="row d-flex flex-wrap-reverse">
                    <div
                        class="col-md-8 order-2 order-md-1 d-flex align-self-center justify-content-md-start justify-content-sm-center justify-content-center">
                        <div class="main-heading text-md-start text-center">
                            <h3 class="heading-font text-light mb-0">Search properties for sale in Pakistan</h3>
                        </div>
                    </div>
                    <div
                        class="col-md-4 order-2 order-md-1 d-flex align-self-center justify-content-md-end justify-content-sm-center justify-content-center">
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
                                <select class="select-properites py-3 px-1 btn-block rounded" name="property"
                                        id="property">
                                    <option value="property type">Property type
                                    </option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Houses">Houses</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="">
                                <Select2 class="select-test"  v-if="options"
                                         id="Location"
                                         v-model="location"
                                         :options="myOptions"
                                         :settings="{ settingOption: value, settingOption: value }"
                                         @change="myChangeEvent($event)"
                                         @select="mySelectEvent($event)"
                                />
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="">
                                <select class="select-properites py-3 px-1 btn-block rounded" name="beds" id="beds">
                                    <option value="Min Beds">Min Beds</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2 mb-2 mb-lg-0">
                            <div class="">
                                <select class="select-properites py-3 px-1 btn-block rounded" name="min Price"
                                        id="min-price">
                                    <option value="Min price">Min Price</option>
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
                                <select class="select-properites py-3 px-1 btn-block rounded" name="min Price"
                                        id="min price">
                                    <option value="Min price">Min Price</option>
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
                                <a href="#" class="btn btn-color text-white btn-block font-weight-bold py-3">
                                    Search Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="main">
        <div class="main-content">
            <div class="container py-5 my-3">
                <div class="col">
                    <h2 class="font-weight-bold mb-4">
                        Listing for
                        <span class="text-primary">Sale</span>
                        or
                        <span class="text-primary">Rent</span>
                    </h2>
                    {{properties}}
                    <div class="row" v-if="properties">
                        <div class="col-12 col-sm-6 col-md-3 pb-4 mb-1" v-for="property in properties">
                            <router-link :to="{path:'/'+slug+'/'+property.id+'/detail'}" class="text-decoration-none link-card" href="javascript:void(0)">
                                <div class="card border-1 hover-card">
                                    <div class="position-relative h-card">
                                        <img class="card-img-top h-image" src="/assets/images/listing-3-thumb.jpg"
                                             alt="Image of a Property to sale or rent.">
                                        <div class="card-tag position-absolute left-1">
                                            <span class="text-white font-weight-bold" v-if="property.purpose == PropertyPurpose.FOR_SALE">FOR SALE</span>
                                            <span class="text-white font-weight-bold" v-else>FOR RENT</span>
                                        </div>
                                    </div>
                                    <div class="py-3 d-flex justify-content-between align-items-baseline">
                                        <div>
                                            <h6 class="head text-dark px-2">{{property.price}}</h6>
                                        </div>
                                        <div class="px-2">
                                            <i style="color: #00a4f2; font-size: 25px;"
                                               class="fal fa-long-arrow-right icon-hov"></i>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 class="font-weight-bold px-2 text-dark">{{ property.title }}</h5>
                                    <div class="d-flex justify-content-between flex-wrap">
                                        <div class="text-secondary heading-div-weight px-2">BEDS:{{property.property_detail.bedrooms}}</div>
                                        <div class="text-secondary heading-div-weight">BATHS:{{property.property_detail.bathrooms}}</div>
                                        <div class="text-secondary heading-div-weight px-2">SQ FT:{{property.area+' '+property.area_unit_id.name}}</div>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex mx-auto pt-3">
                            <div>
                                <a class="btn btn-lg btn-blow text-white text-center font-weight-semibold
                                border-0 p-relative text-2 text-uppercase mt-2 py-3 px-5 button-color"
                                   href="javascript:void(0)" @click.prevent="getPropertiesBySlug(properties.current_page,properties.per_page)">
                                    <span style="font-size: 15px;font-weight: 600;">View More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bottom-banner border-0 margin-0 container-fluid py-4">
        <div class="container py-5 mt-4 ">
            <div class="row align-items-center">
                <div
                    class="col-lg-9 text-white d-flex justify-content-lg-start justify-content-sm-center justify-content-center">
                    <div class="text-lg-start text-center">
                        <h2>
                            For
                            <span class="font-weight-bold">Residential And Commercial</span>
                            Properties
                        </h2>
                        <div class="d-flex justify-content-lg-start justify-content-center">
                            <p class="font-weight-bold text-white mb-0 opacity-text">Our Staff is trained to find any
                                location
                                you need!</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 mt-5 mt-lg-0">
                    <div class="banner-button">
                        <a href="#"
                           class="btn btn-primary btn-block font-weight-bold py-4 anchor-button d-flex justify-content-center">
                            <div>
                                CONTACT US
                            </div>
                            <div class="px-2">
                                <i style="font-size: 16px;" class="fal fa-long-arrow-right"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <front-footer></front-footer>
</template>

<script>
import FrontHeader from "../../../components/ui/frontsite/base/FrontHeader";
import FrontFooter from "../../../components/ui/frontsite/base/FrontFooter";
import propertyService from "../../../services/propertyService";
import {ref, watchEffect} from "vue";
import {PropertyPurpose} from "../../../constants";
import Select2 from "vue3-select2-component";
import {getAllLocationsByCItyId} from "../../../composables/country";
export default {
    name: "Properties",
    components: {FrontFooter, FrontHeader,Select2},
    props:{
        slug:String,
    },
    setup(props){
        const type = ref(1);
        const location = ref(1);
        const beds = ref(1);
        const minPrice = ref(1);
        const maxPrice = ref(1);
        let properties = ref([]);
        const options = getAllLocationsByCItyId(4);
        const myOptions = ref([]);
        const model = ref();
        watchEffect(()=>{
            if(options.value){
                myOptions.value = [];
                model.value = options.value[0];
                options.value.forEach(function (option){
                    myOptions.value = [{id:option.id,text:option.name},...myOptions.value];

                })
            }
        })
        function myChangeEvent(val){
            console.log(val);
        }
        function  mySelectEvent({id, text}){
            console.log({id, text})
        }
        getPropertiesBySlug(type, location, beds, minPrice, maxPrice)
        async function getPropertiesBySlug(currentPage,perPage) {
            const addMore = 4;
            properties.value = await propertyService.getPropertiesBySlug(props.slug, {currentPage,perPage,addMore,
                type,
                location,
                beds,
                minPrice,
                maxPrice});
        }
        return {
            options,
            myOptions,
            myChangeEvent,
            mySelectEvent,
            model,
            type,
            location,
            beds,
            minPrice,
            maxPrice,
            PropertyPurpose,
            properties,
            getPropertiesBySlug
        }
    }
}
</script>

<style scoped>
.select-test{
 height: 40px !important;

}
</style>
