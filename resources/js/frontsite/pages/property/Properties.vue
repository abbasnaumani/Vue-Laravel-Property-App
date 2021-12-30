<template>
   <search-banner></search-banner>
    <section class="main">
        <div class="main-content">
            <div class="container py-5 my-3">
                <div class="col">
                    <h2 class="mb-4 font-weight-bold letter-spacing">
                        Listing for <span class="text-blue-heading">Sale</span> or <span
                        class="text-blue-heading">Rent</span>
                    </h2>
                    <div class="row" v-if="properties.data">
                        <div class="col-12 col-sm-6 col-md-3 pb-4 mb-1" v-for="property in properties.data">
                            <div class="card custom-card move-svg  border-0">
                                <div class="card-interior overflow-hidden position-relative z-index-1">
                                    <router-link :to="{path:'/'+slug+'/'+property.id+'/detail'}" class="text-decoration-none card-anchor">
                                    <span
                                        class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold
                                        letter-spacing text-uppercase position-absolute top-8 left-8" v-if="property.purpose == PropertyPurpose.FOR_SALE">For
                                        Sale</span>
                                        <span
                                            class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold
                                        letter-spacing text-uppercase position-absolute top-8 left-8" v-else>For
                                        Rent</span>
                                        <div class="custom-card-info-img d-block">
                                            <img src="/assets/images/img-3.jpg" class="img-fluid rounded">
                                        </div>
                                        <span class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                                        <strong class="text-dark text-4 px-3 letter-spacing">{{property.price}}</strong>
                                        <div class="px-3 arrow-move">
                                        <svg class="svg-color" version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="icon_131640173528885" data-filename="arrow-right.svg" width="27" height="27">
	                                     <polygon points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  "></polygon>
                                            </svg>
                                            </div>
                                    </span>
                                        <span class="custom-card-info-content d-block">
                                        <h4 class="text-dark mb-1 text-5 px-3 font-weight-bold letter-spacing">{{ property.title }}</h4>
                                        <ul
                                            class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap">
                                            <li class="mb-0 px-1">
                                                <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Beds: {{property.property_detail.bedrooms}}</strong>
                                            </li>
                                            <li class="mb-0 px-1">
                                                <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Baths: {{property.property_detail.bathrooms}}</strong>
                                            </li>
                                            <li class="mb-0 px-1">
                                                <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">{{property.area+' '+property.area_unit.name}}</strong>
                                            </li>
                                        </ul>
                                    </span>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-8 col-lg-4 col-md-6">
                            <div>
                                <a class="btn border-0 btn-block test-fancy text-white text-center btn-color py-3"
                                    href="javascript:void(0)" @click.prevent="getPropertiesBySlug(properties.current_page,properties.per_page)">
                                    <span class="text-3 font-weight-bold">View More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   <bottom-banner></bottom-banner>
</template>

<script>
import FrontHeader from "../../components/ui/base/Header";
import FrontFooter from "../../components/ui/base/Footer";
import propertyService from "../../services/propertyService";
import {ref, watchEffect} from "vue";
import {PropertyPurpose} from "../../../constants";
import Select2 from "vue3-select2-component";
import {getAllLocationsByCItyId} from "../../composables/country";
import store from "../../store";
import SearchBanner from "../../components/utilities/SearchBanner";
import BottomBanner from "../../components/utilities/BottomBanner";
export default {
    name: "Properties",
    components: {BottomBanner, SearchBanner, FrontFooter, FrontHeader,Select2},
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
        const slug = ref();
        getPropertiesBySlug(type, location, beds, minPrice, maxPrice)
        async function getPropertiesBySlug(currentPage,perPage) {
            const addMore = 4;
            slug.value = (props.slug) ? props.slug : store.getters.getDefaultAgencySlug;
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
