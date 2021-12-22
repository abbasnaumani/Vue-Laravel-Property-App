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
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-5" v-for="property in properties.data">
                                    <!-- card  -->
                                    <router-link  :to="{path:'/'+slug+'/'+property.id+'/detail'}" class="link-card card border-0 hover-card">
                                        <div class="position-relative h-card">
                                            <img class="card-img-top" src="/assets/images/listing-1-thumb.jpg"
                                                 alt="Image of a Property to sale or rent." height="200">
                                            <div class="card-tag position-absolute left-1">
                                                <span class="text-white font-weight-bold" v-if="property.purpose == PropertyPurpose.FOR_SALE">FOR SALE</span>
                                                <span class="text-white font-weight-bold" v-else>FOR RENT</span>
                                            </div>
                                        </div>
                                        <div class="py-3 d-flex justify-content-between align-items-baseline">
                                            <div>
                                                <h5 class="heading-font-weight text-dark">{{property.price}}</h5>
                                            </div>
                                            <div class="px-2">
                                                <i style="color: #00a4f2; font-size: 25px;"
                                                   class="fal fa-long-arrow-right icon-hov"></i>
                                            </div>
                                        </div>
                                        <hr>
                                        <h5 class="font-weight-bold px-2 text-dark">{{ property.title }}</h5>
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <div class="text-secondary heading-span-weight">BEDS:{{property.property_detail.bedrooms}}</div>
                                            <div class="text-secondary heading-span-weight">BATHS:{{property.property_detail.bathrooms}}</div>
                                            <div class="text-secondary heading-span-weight">{{property.area+' '+property.area_unit_id.name}}</div>
                                        </div>
                                    </router-link>
                                </div>
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
                                <!-- 3rd div  -->
                                <div class="col-12 col-sm-6 col-lg-12" >
                                    <div class="owl-crousal mt-4">
                                        <div class="card card-crousel mt-2" style="width:100%;height: 345px;">
                                            <div class="card-body">
                                                <h4 class="text-white text-center">Our Agents</h4>
                                                <div id="demo" class="carousel slide mt-4" data-ride="carousel">

                                                    <!-- Indicators -->
                                                    <ul class="carousel-indicators circle">
                                                        <li data-target="#demo" data-slide-to="0" class="active test">
                                                        </li>
                                                        <li data-target="#demo" data-slide-to="1" class="test"></li>
                                                    </ul>

                                                    <!-- The slideshow -->
                                                    <div class="carousel-inner" v-if="agencyUsers">
                                                        <div class="carousel-item active text-center">
                                                            <img style="max-width: 110px;border-radius: 100%;" id="img"
                                                                 src="/assets/images/img-13.jpg" alt="Los Angeles" width="100%"
                                                                 height="100px">
                                                            <h5 class="text-white mt-3"></h5>
                                                            <a href="#"
                                                               class="text-white carousel-a  d-lg-block d-md-block d-sm-block d-block">(800)
                                                                123-4567</a>
                                                            <a href="#"
                                                               class="text-white carousel-a d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                                        </div>
                                                        <div class="carousel-item  text-center" v-for="user in agencyUsers">
                                                            <img style="max-width: 110px;border-radius: 100%;"
                                                                 src="/assets/images/img-11.jpg" alt="Chicago" width="100%"
                                                                 height="100px">
                                                            <h5 class="text-white mt-3">{{user.first_name+' '+user.last_name}}</h5>
                                                            <a href="#"
                                                               class="text-white carousel-a d-lg-block d-md-block d-sm-block d-block">{{user.phone_number}}</a>
                                                            <a href="#"
                                                               class="text-white carousel-a d-lg-block d-md-block d-sm-block d-block">{{user.email}}</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- 4th div  -->
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="form-card mt-4 ">
                                        <div class="card card-form border-0 mt-2 mb-4 py-5"
                                             style="width:100%;height: 350px;">
                                            <div class="card-body">
                                                <h4>Newsletter</h4>
                                                <p>Subscribe and be the first to know about our best offers</p>
                                                <form>
                                                    <div class="form-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               placeholder="Your Name *"
                                                               v-model="name"
                                                               required
                                                               @blur="v$.name.$touch()"
                                                        />
                                                        <div class="text-left">
                                                            <div v-if="v$.name.$dirty">
                                                                <sub v-if="v$.name.$error"
                                                                     class="px-2 py-2 text-danger">
                                                                    Name is Required
                                                                </sub>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email"
                                                               class="form-control"
                                                               placeholder="Your Email Address *"
                                                               v-model="userEmail"
                                                               required
                                                               @blur="v$.userEmail.$touch()"
                                                        />
                                                        <div class="text-left">
                                                            <div v-if="v$.userEmail.$dirty">
                                                                <sub v-if="v$.userEmail.$error"
                                                                     class="px-2 py-2 text-danger">
                                                                    Please enter a valid Email address
                                                                </sub>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button
                                                        v-if="v$.$invalid"
                                                        type="submit"
                                                        class="btn btn-color btn-primary w-100 cursor-not-allowed"
                                                        disabled
                                                    >
                                                        <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Submit
                                                    </button>
                                                    <button v-else @click.prevent="handleSubscription"
                                                            type="submit"
                                                            class="btn btn-color btn-primary w-100"
                                                    >
                                                        <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Submit
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
import FrontHeader from "../components/ui/base/FrontHeader";
import Carousel from "../components/utilities/Carousel";
import FrontFooter from "../components/ui/base/FrontFooter";
import {getPropertiesBySlug} from "../composables/property";
import propertyService from "../services/propertyService";
import {computed, ref} from "vue";
import {ApiResponse, PropertyPurpose} from "../../constants";
import {preventDefault} from "../../../../public/assets/plugins/fullcalendar";
import {getAgencyUsersBySlug} from "../composables/agency";
import subscribeService from "../services/subscribeService";
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
export default {
    name: "Main",
    components: {FrontFooter, Carousel, FrontHeader},
    props:{
      slug:String,
    },
    setup(props){

        const name = ref('');
        const userEmail = ref('');

        const agencyUsers = getAgencyUsersBySlug(props.slug);
        let properties = ref([]);
        getPropertiesBySlug()
        async function getPropertiesBySlug(currentPage,perPage) {
            const addMore = 3;
             properties.value = await propertyService.getPropertiesBySlug(props.slug, {currentPage,perPage,addMore});
        }
        async function handleSubscription() {
            const response = await subscribeService.handleSubscription({name: name.value, email: userEmail.value});
            console.log(response, "asdsad");
            if (response.status === ApiResponse.SUCCESS) {
                name.value = '';
                userEmail.value = '';
            }
        }
        const validationRules = computed(() => {
            return {
                userEmail: {
                    required,
                    email
                },
                name: {
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {
                userEmail,
                name,
            }
        );
        return{
            v$,
            PropertyPurpose,
            name,
            userEmail,
            properties,
            getPropertiesBySlug,
            agencyUsers,
            handleSubscription
        }
    }
}
</script>

<style scoped>

</style>
