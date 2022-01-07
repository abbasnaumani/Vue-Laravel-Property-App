<template>
    <carousel></carousel>
    <!-- Card -->
    <section class="main">
        <div class="main-wrapper">
            <div class="container-fluid py-5">
                <div class="container pb-4 py-1">
                    <div class="row">
                        <!-- main col-9  -->
                        <div class="col-lg-9">
                            <h2 class="mb-4 font-weight-bold letter-spacing">
                                Listing for <span class="text-blue-heading">Sale</span> or <span
                                class="text-blue-heading">Rent</span>
                            </h2>
                            <display-properties :slug="slug"></display-properties>
                             <!-- new row in col-9 -->
                            <div class="row">
                                <div class="col-12 mt-5">
                                    <hr class="w-100">
                                </div>
                            </div>
                            <!-- new row in col-9 -->
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h2 class="font-weight-bold letter-spacing">Exclusive Locations</h2>
                                </div>
                            </div>
                            <!-- new row in col-9  -->
                            <div class="row mt-1 mb-4">
                                <div class="col-md-4">
                                    <div class="card img-fluid mt-3" style="width:500px;">
                                        <img class="card-img-top" src="/assets/images/img-14.jpg" alt="Card image" style="width:100%">
                                        <div class="card-img-overlay card-hover align-items-center justify-content-center d-flex">
                                            <h4 class="text-white text-center fon">
                                                Palm Beach
                                                <br>
                                                <span class="text-white">
                                                <a href="#" class="btn card-button-info rounded-0 custom-card-info-type  text-white font-weight-bold">91 Properties</a>
                                            </span>
                                            </h4>
                                            <div class="animated-box position-absolute"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card img-fluid mt-3" style="width:500px">
                                        <img class="card-img-top" src="/assets/images/img-15.jpg" alt="Card image" style="width:100%">
                                        <div class="card-img-overlay card-hover align-items-center justify-content-center d-flex">
                                            <h4 class="text-white text-center fon">
                                                Ficher Island
                                                <br>
                                                <span class="text-white p-2">
                                                <a href="#" class="btn card-button-info rounded-0 custom-card-info-type text-white font-weight-bold">211 Properties</a>
                                            </span>
                                            </h4>
                                            <div class="animated-box position-absolute"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card img-fluid mt-3" style="width:500px">
                                        <img class="card-img-top" src="/assets/images/img-16.jpg" alt="Card image" style="width:100%">
                                        <div class="card-img-overlay card-hover align-items-center justify-content-center d-flex">
                                            <h4 class="text-white  text-center fon">
                                                South Miami
                                                <br>
                                                <span class="text-white p-2">
                                                <a href="#" class="btn card-button-info rounded-0 custom-card-info-type text-white font-weight-bold">231 Properties</a>
                                            </span>
                                            </h4>
                                            <div class="animated-box position-absolute"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- main col-3  -->
                        <div class="col-lg-3">
                            <h4 id="heading-font-weight" class="mt-2 font-weight-bold mb-4 letter-spacing">Special Offers</h4>
                            <div class="row">
                                <!-- 1st div  -->
                                <div class="col-12 col-sm-6 col-lg-12 mt-0 mb-lg-2 mb-md-4 mb-sm-4 mb-4">
                                    <div class="card img-fluid" style="width:100%;height: 300px;">
                                        <img class="card-img-top brightness" src="/assets/images/img-9.jpg" alt="Card image" style="width:100%;height: 324px;">
                                        <div class="card-img-overlay align-items-center justify-content-center d-flex flex-column">

                                            <h4 class="text-white font-weight-bold text-5 d-block mb-1 text-center">
                                                Amazing Houses

                                                Collection
                                            </h4>
                                            <strong class="text-white font-weight-bold text-uppercase text-3 d-block mb-1 text-center">From
                                                $100.000</strong>
                                            <a class="btn btn-color border-0 test-fancy text-center text-white py-2" href="#">
                                                <span class="text-3 px-3 font-weight-semi-bold">View More</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- 2nd div  -->
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card img-fluid mt-lg-4 mt-md-0 mt-sm-0 mt-4 mb-lg-2 mb-md-4 mb-sm-4 mb-4" style="width:100%;height: 300px;">
                                        <img class="card-img-top brightness" src="/assets/images/img-10.jpg" alt="Card image" style="width:100%;height: 324px;">
                                        <div class="card-img-overlay d-flex justify-content-between  flex-column">
                                            <h3 class="text-white font-weight-bold text-5 d-block mb-1">
                                                Exclusive
                                                Condominiun
                                                <strong class="text-white font-weight-light text-uppercase text-3 d-block mb-1">Miami
                                                    beach</strong>
                                            </h3>
                                            <div>
                                                <a class="btn btn-color text-center border-0 test-fancy text-white py-2" href="#">
                                                    <span class="text-3 px-3 font-weight-semi-bold">View More</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- agents on carousel  -->
                                <agents-carousel :slug="slug"></agents-carousel>
                                <!-- News Letter for subscribe  -->
                                <news-letter :slug="slug"></news-letter>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Card End -->
</template>

<script>

import Carousel from "../components/utilities/Carousel";

import NewsLetter from "../components/widgets/NewsLetter";
import AgentsCarousel from "../components/widgets/AgentsCarousel";
import Footer from "../components/ui/base/Footer";
import DisplayProperties from "../components/property/DisplayProperties";
export default {
    name: "Main",
    components: {DisplayProperties, Footer, AgentsCarousel, NewsLetter, Carousel},
    props:{
      slug:String,
    },
    setup(){
        return{
        }
    }
}
</script>

<style scoped>

</style>
