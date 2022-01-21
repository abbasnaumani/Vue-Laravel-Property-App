<template>
    <div class="row" v-if="properties">
        <div class="col-12 col-sm-6 col-md-4 pb-4 mb-1" v-for="property in properties.data">
            <div class="card custom-card move-svg  border-0">
                <div class="card-interior overflow-hidden position-relative z-index-1">
                    <router-link :to="{path:'/'+slug+'/'+property.id+'/detail'}" class="text-decoration-none card-anchor">
                        <span class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold letter-spacing text-uppercase position-absolute top-8 left-8"
                            v-if="property.purpose == PropertyPurpose.FOR_SALE">For Sale</span>
                        <span class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold letter-spacing text-uppercase position-absolute top-8 left-8" v-else>For
                                        Rent</span>
                        <div class="custom-card-info-img d-block" v-if="property.media[0]">
                            <img :src="'/'+property.media[0].disk+'/'+property.media[0].directory+'/'+property.media[0].filename+'.'+property.media[0].extension" :alt="property.media[0].filename" class="img-fluid rounded">
                        </div>
                        <div class="custom-card-info-img d-block" v-else>
                            <img src="/assets/images/img-3.jpg" class="img-fluid rounded">
                        </div>
                        <span class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                            <strong
                                class="text-dark text-4 px-3 letter-spacing">{{
                                    property.price
                                }}</strong>
                            <div class="px-3 arrow-move">
                                <svg class="svg-color" version="1.1" viewBox="0 0 50 50"
                                     xmlns="http://www.w3.org/2000/svg"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"
                                     id="icon_131640173528885" data-filename="arrow-right.svg"
                                     width="27" height="27">
                                    <polygon
                                        points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  "></polygon>
                                </svg>
                            </div>
                        </span>
                        <span class="custom-card-info-content d-block">
                            <h4 class="text-dark mb-1 text-5 px-3 font-weight-bold letter-spacing">{{
                                    property.title
                                }}</h4>
                            <ul class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap"><li class="mb-0 px-2">
                                <strong
                                    class="text-secondary text-uppercase font-weight-extra-bold text-2">Beds: {{
                                        property.property_detail.bedrooms
                                    }}</strong>
                            </li>
                                <li class="mb-0 px-2">
                                    <strong
                                        class="text-secondary text-uppercase font-weight-extra-bold text-2">Baths: {{
                                            property.property_detail.bathrooms
                                        }}</strong>
                                </li>
                                <li class="mb-0 px-2">
                                    <strong
                                        class="text-secondary text-uppercase font-weight-extra-bold text-2">{{
                                            property.area + ' ' + property.area_unit.name
                                        }}</strong>
                                </li>
                            </ul>
                        </span>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
       <div v-else class="no-record-found text-5 text-center">No Record found</div>
    <div class="row d-flex justify-content-center">
        <div class="col-8 col-lg-4 col-md-6">
            <div>
                <a class="btn border-0 btn-block test-fancy text-white text-center btn-color py-3"
                   href="javascript:void(0)"
                   @click.prevent="getPropertiesBySlug(properties.current_page,properties.per_page)">
                    <span class="text-3 font-weight-bold">View More</span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import {ref, watch, watchEffect} from "vue";
import propertyService from "../../services/propertyService";
import {PropertyPurpose} from "../../../constants";
import store from "../../store";

export default {
    name: "DisplayProperties",
    props: {
        slug: String,
    },
    setup(props) {
        let properties = ref([]);
        watch(() => store.getters.getPropertySearchFilters, (newSlug, oldSlug) => {
            getPropertiesBySlug()
        },{
            deep:true,
            immediate:true
        });
        // watchEffect(()=>{
        //     getPropertiesBySlug()
        // })
        // getPropertiesBySlug()

        async function getPropertiesBySlug(currentPage, perPage) {
            const addMore = 3;
            properties.value = await propertyService.getPropertiesBySlug(props.slug,{currentPage, perPage, addMore});
                // await store.dispatch('actionSearchFilter', null);

        }

        return {
            PropertyPurpose,
            properties,
            getPropertiesBySlug
        }
    }
}
</script>

<style scoped>

</style>
