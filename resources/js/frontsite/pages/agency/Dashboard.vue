<template>
    <top-banner pageName="Agencies" link="agencies"></top-banner>
    <section class="main">
        <div class="main-content">
            <div class="container py-5 my-3">
                <div class="col">
                    <h2 class="mb-4 font-weight-bold letter-spacing">
                        Listing for <span class="text-blue-heading">Agencies</span>
                    </h2>
                    <div class="row" v-if="agencies">
                        <div class="col-12 col-sm-6 col-md-4 pb-4 mb-1" v-for="agency in agencies">
                            <div class="card custom-card move-svg  border-0 ">
                                <div class="card-interior overflow-hidden position-relative z-index-1">
                                    <router-link :to="{path:'/'+agency.slug}" class="text-decoration-none card-anchor">
                                        <div class="custom-card-info-img d-block">
                                            <img src="/assets/images/img-3.jpg" class="img-fluid rounded">
                                        </div>
                                       <span class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                                            <strong class="text-dark text-4 px-3 letter-spacing">{{ agency.slug }}</strong>
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
                                                    agency.name
                                                }}</h4>
                                            <ul class="list-unstyled  mb-0 px-1 py-1 d-flex flex-column align-items-center ">
                                                <li class="mb-0 px-2">
                                                    <strong
                                                        class="text-secondary text-lowercase font-weight-extra-bold text-3">{{ agency.email }}</strong>
                                                </li>
                                                <li class="mb-0 px-2">
                                                    <strong
                                                        class="text-secondary  font-weight-extra-bold text-3">{{ agency.phone_number }}</strong>
                                                </li>
                                                <li class="mb-0 px-2">
                                                    <strong
                                                        class="text-secondary text-capitalize font-weight-extra-bold text-2">{{ agency.address }}</strong>
                                                </li>
                                            </ul>
                                        </span>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {getAllAgencies} from "../../composables/agency";
import {ref} from "vue";
import TopBanner from "../../components/utilities/TopBanner";

export default {
    name: "Dashboard",
    components: {TopBanner},
    setup(props) {

        const agencies = getAllAgencies();

        return {
            agencies
        }
    }
}
</script>

<style scoped>

</style>
