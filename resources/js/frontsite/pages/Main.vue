<template>
    <carousel></carousel>
    <!-- Card -->
    <section class="main">
        <div class="main-wrapper">
            <div class="container-fluid">
                <div class="container py-5 my-3">
                    <!-- main-row  -->
                    <div class="row">
                        <!-- main col-9  -->
                        <div class="col-lg-9">
                            <h2 class="mb-4 font-weight-bold">
                                Listing for <span class="text-primary">Sale</span> or <span
                                class="text-primary">Rent</span>
                            </h2>
                            <!-- row in col-9  -->
                            <div class="row" v-if="properties.data">
                                <div class="col-12 col-sm-6 col-md-4 pb-4 mb-1" v-for="property in properties.data">
                                    <div class="card custom-card move-svg  border-0">
                                        <div class="card-interior overflow-hidden position-relative z-index-1">
                                            <router-link :to="{path:'/'+slug+'/'+property.id+'/detail'}" class="text-decoration-none card-anchor">
                                    <span
                                        class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold letter-spacing text-uppercase position-absolute top-8 left-8">For
                                        Sale</span>
                                                <div class="custom-card-info-img d-block">
                                                    <img src="/assets/images/img-4.jpg" class="img-fluid rounded">
                                                </div>
                                                <span
                                                    class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                                        <strong class="text-dark text-4 px-3 letter-spacing">{{property.price}}</strong>
                                        <div class="px-3 arrow-move">
                                        <svg class="svg-color" version="1.1" viewBox="0 0 50 50"
                                             xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" id="icon_131640173528885"
                                             data-filename="arrow-right.svg" width="27" height="27">
	                                     <polygon
                                             points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  "></polygon>
                                            </svg>
                                            </div>
                                    </span>
                                                <span class="custom-card-info-content d-block">
                                        <h4 class="text-dark mb-1 text-5 px-3 font-weight-bold letter-spacing">{{ property.title }}</h4>
                                        <ul
                                            class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap">
                                            <li class="mb-0 px-3">
                                                <strong class="text-secondary text-uppercase text-2">Beds: {{property.property_detail.bedrooms}}</strong>
                                            </li>
                                            <li class="mb-0 px-2">
                                                <strong class="text-secondary text-uppercase text-2">Baths: {{property.property_detail.bathrooms}}</strong>
                                            </li>
                                            <li class="mb-0 px-3">
                                                <strong class="text-secondary text-uppercase text-2">{{property.area+' '+property.area_unit_id.name}}</strong>
                                            </li>
                                        </ul>
                                    </span>
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                                <!--                                <div class="col-lg-4 col-md-6 col-sm-12 mb-5" v-for="property in properties.data">-->
                                <!--                                    &lt;!&ndash; card  &ndash;&gt;-->
                                <!--                                    -->
                                <!--                                    <router-link  :to="{path:'/'+slug+'/'+property.id+'/detail'}" class="link-card card border-0 hover-card">-->
                                <!--                                        <div class="position-relative h-card">-->
                                <!--                                            <img class="card-img-top" src="/assets/images/listing-1-thumb.jpg"-->
                                <!--                                                 alt="Image of a Property to sale or rent." height="200">-->
                                <!--                                            <div class="card-tag position-absolute left-1">-->
                                <!--                                                <span class="text-white font-weight-bold" v-if="property.purpose == PropertyPurpose.FOR_SALE">FOR SALE</span>-->
                                <!--                                                <span class="text-white font-weight-bold" v-else>FOR RENT</span>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                        <div class="py-3 d-flex justify-content-between align-items-baseline">-->
                                <!--                                            <div>-->
                                <!--                                                <h5 class="heading-font-weight text-dark">{{property.price}}</h5>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="px-2">-->
                                <!--                                                <i style="color: #00a4f2; font-size: 25px;"-->
                                <!--                                                   class="fal fa-long-arrow-right icon-hov"></i>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                        <hr>-->
                                <!--                                        <h5 class="font-weight-bold px-2 text-dark">{{ property.title }}</h5>-->
                                <!--                                        <div class="d-flex justify-content-between flex-wrap">-->
                                <!--                                            <div class="text-secondary heading-span-weight">BEDS:{{property.property_detail.bedrooms}}</div>-->
                                <!--                                            <div class="text-secondary heading-span-weight">BATHS:{{property.property_detail.bathrooms}}</div>-->
                                <!--                                            <div class="text-secondary heading-span-weight">{{property.area+' '+property.area_unit_id.name}}</div>-->
                                <!--                                        </div>-->
                                <!--                                    </router-link>-->
                                <!--                                </div>-->
                            </div>
                            <!-- new row in col-9 -->
                            <div class="row d-flex justify-content-center">
                                <div class="col-4">
                                    <div>
                                        <a class="btn btn-lg btn-blow text-white text-center font-weight-semibold border-0 p-relative text-2 text-uppercase mt-2 py-3 px-5 button-color"
                                           href="" @click.prevent="getPropertiesBySlug(properties.current_page,properties.per_page)">
                                            <span style="font-size: 15px;font-weight: 600;">View More</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- new row in col-9 -->
                            <div class="row">
                                <div class="col-12 mt-5">
                                    <hr class="w-100">
                                </div>
                            </div>
                            <!-- new row in col-9 -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h2 class="font-weight-bold">Exclusive Locations</h2>
                                </div>
                            </div>
                            <!-- new row in col-9  -->
                            <div class="row mt-1 mb-4">
                                <div class="col-md-4">
                                    <div class="card img-fluid mt-3" style="width:500px;">
                                        <img class="card-img-top" src="/assets/images/img-14.jpg" alt="Card image" style="width:100%">
                                        <div
                                            class="card-img-overlay card-hover align-items-center justify-content-center d-flex">
                                            <h4 class="text-white text-center fon">
                                                Palm Beach
                                                <br>
                                                <span class="text-white button p-2">91 Properties</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card img-fluid mt-3" style="width:500px">
                                        <img class="card-img-top" src="/assets/images/img-15.jpg" alt="Card image" style="width:100%">
                                        <div
                                            class="card-img-overlay card-hover align-items-center justify-content-center d-flex">
                                            <h4 class="text-white text-center fon">
                                                Ficher Island
                                                <br>
                                                <span class="text-white button p-2">211 Properties</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card img-fluid mt-3" style="width:500px">
                                        <img class="card-img-top" src="/assets/images/img-16.jpg" alt="Card image" style="width:100%">
                                        <div
                                            class="card-img-overlay card-hover align-items-center justify-content-center d-flex">
                                            <h4 class="text-white  text-center fon">
                                                South Miami
                                                <br>
                                                <span class="text-white button p-2">231 Properties</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main col-3  -->
                        <div class="col-lg-3">
                            <h2 id="heading-font-weight" class="mt-2 font-weight-bold mb-3">Special Offers</h2>
                            <div class="row">
                                <!-- 1st div  -->
                                <div class="col-12 col-sm-6 col-lg-12 mt-0">
                                    <div class="card img-fluid" style="width:100%;height: 326px;">
                                        <img class="card-img-top brightness" src="/assets/images/img-9.jpg" alt="Card image"
                                             style="width:100%;height: 324px;">
                                        <div
                                            class="card-img-overlay align-items-center justify-content-center d-flex flex-column">

                                            <h4 class="text-white font-weight-bold text-5 d-block mb-1 text-center">
                                                Amazing Houses

                                                Collection
                                            </h4>
                                            <strong
                                                class="text-white font-weight-bold text-uppercase text-3 d-block mb-1 text-center">From
                                                $100.000</strong>
                                            <a class="btn btn-primary btn-color text-center font-weight-semibold border-0 p-relative text-2 text-uppercase mt-1 btn-px-4 btn-py-2"
                                               href="#">
                                                View More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd div  -->
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card img-fluid mt-lg-4 mt-md-0 mt-sm-0 mt-4"
                                         style="width:100%;height: 326px;">
                                        <img class="card-img-top brightness" src="/assets/images/img-10.jpg" alt="Card image"
                                             style="width:100%;height: 324px;">
                                        <div
                                            class="card-img-overlay d-flex justify-content-between  flex-column">
                                            <h4 class="text-white font-weight-semibold text-5 d-block mb-1">
                                                Exclusive
                                                Condominiun
                                                <strong
                                                    class="text-white font-weight-light text-uppercase text-3 d-block mb-1">Miami
                                                    beach</strong>
                                            </h4>
                                            <div>
                                                <a class="btn btn-primary btn-color text-center font-weight-semibold border-0 p-relative text-2 text-uppercase mt-1 btn-px-4 btn-py-2"
                                                   href="javascript://">
                                                    View More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- agents on carousel  -->
                                <agents-carousel :slug="slug"></agents-carousel>
                                <!-- News Letter for subscribe  -->
                               <news-letter></news-letter>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Card End -->
    <front-footer></front-footer>
</template>

<script>
import FrontHeader from "../components/ui/base/Header";
import Carousel from "../components/utilities/Carousel";
import FrontFooter from "../components/ui/base/Footer";
import propertyService from "../services/propertyService";
import {ref} from "vue";
import {PropertyPurpose} from "../../constants";
import NewsLetter from "../components/widgets/NewsLetter";
import AgentsCarousel from "../components/widgets/AgentsCarousel";
export default {
    name: "Main",
    components: {AgentsCarousel, NewsLetter, FrontFooter, Carousel, FrontHeader},
    props:{
      slug:String,
    },
    setup(props){

        let properties = ref([]);
        getPropertiesBySlug()
        async function getPropertiesBySlug(currentPage,perPage) {
            const addMore = 3;
             properties.value = await propertyService.getPropertiesBySlug(props.slug, {currentPage,perPage,addMore});
        }

        return{
            PropertyPurpose,
            properties,
            getPropertiesBySlug,
        }
    }
}
</script>

<style scoped>

</style>
