<template>
        <front-header></front-header>
    <div class="main py-3" v-if="property">
        <section class="page-header border-0 mt-5">
            <div class="container py-4 position-relative z-index-2">
                <div class="row py-4 mt-5 d-flex flex-wrap-reverse">
                    <div
                        class="col-md-8 order-2 order-md-1 d-flex align-self-center justify-content-md-start justify-content-sm-center justify-content-center">
                        <div class="main-heading text-lg-start">
                            <h2 class="font-weight-bold text-light mb-0">{{property.property_detail.address}}</h2>
                            <div class="d-flex justify-content-md-start justify-content-center">
                                <p style="opacity: 0.5;" class="text-white mb-0 px-1">{{property.title}}</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-md-4 order-2 order-md-1 d-flex align-self-center justify-content-md-end justify-content-sm-center justify-content-center">
                        <div class="main-links">
                            <ul class="list-unstyled text-white">
                                <li><span style="font-size:11.5px">HOME</span> <span style="opacity: 0.6;font-size:11.5px">>
                                        PROPERTIES</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container py-4 my-5">
            <div class="row">
                <!-- row col-9  -->
                <div class="col-lg-9">
                    <!-- row in col-lg-9  -->
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="card border border-0" style="width:100%;padding-bottom: 180px;">
                                <div id="demo" class="carousel slide" data-ride="carousel">
                                    <ul class="carousel-indicators indicators">
                                        <li data-target="#demo" data-slide-to="0" class="active test-1"></li>
                                        <li data-target="#demo" data-slide-to="1" class="test-2"></li>
                                        <li data-target="#demo" data-slide-to="2" class="test-3"></li>
                                        <li data-target="#demo" data-slide-to="3" class="test-4"></li>
                                    </ul>
                                    <div class="carousel-inner carousel-hover">
                                        <div class="carousel-item active image-div">
                                            <div class="image">
<!--                                                {{property.media}}-->
<!--                                                <div class="row">-->
<!--                                                    <div class="col-12" v-if="property.media" >-->
<!--                                                        <property-files-list :propertyMedia="property.media"></property-files-list>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <img src="/assets/images/img-17.jpg" alt="kuch bhi" width="475" height="382">
                                                <div class="overlay">
                                                    <div class="text"><i style="font-size: 28px;" class="fal fa-search"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item image-div"  v-for="media in property.media">
                                            <div class="image">
                                                <img :src="'/'+media.disk+'/'+media.directory+'/'+media.filename+'.'+media.extension" :alt="media.filename" width="475" height="382">
                                                <div class="overlay">
                                                    <div class="text"><i style="font-size: 28px;" class="fal fa-search"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="icon-indicators"><i class="fas fa-angle-left"></i></span>
                                    </a>
                                    <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="icon-indicators"><i class="fas fa-angle-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="border-radius">
                                <table class="table table-striped border-radius">
                                    <tbody>
                                    <tr class="bg-table-color text-white">
                                        <td class="font-weight-bold">
                                            Price
                                        </td>
                                        <td class="font-weight-bold">
                                           {{property.price}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Listing ID
                                        </td>
                                        <td>
                                            #{{property.id}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Address
                                        </td>
                                        <td>
                                            {{property.property_detail.address }} - {{ property.location.name }} - {{property.location.city.name}}
                                            <a style="font-size: 14px;" href="#">(Map Location)</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Neighborhood
                                        </td>
                                        <td>
                                            Porto Village
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Beds
                                        </td>
                                        <td>
                                           {{property.property_detail.bedrooms}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Baths
                                        </td>
                                        <td>
                                            {{property.property_detail.bathrooms}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Garages
                                        </td>
                                        <td>
                                            2
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                             Area
                                        </td>
                                        <td>
                                            {{property.area+' '+property.area_unit.name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Lot Size
                                        </td>
                                        <td>
                                            20,000
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">
                                            Year Built
                                        </td>
                                        <td>
                                            1999
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- new row in col-lg-9  -->
                    <div class="row">
                        <div class="col">
                            <div class="information">
                                <h5 class="mt-5 mb-3 font-bold">Description</h5>
                                <p class="info-text text-secondary" v-html="property.property_detail.description">

                                </p>
                                <p class="info-text text-secondary">
                                    Ctrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac
                                    feugiat nibh adipiscing sit amet. In eu juiverra leo. Vestibulum ante ipsum primis
                                    in faucibus orci.
                                </p>
                                <hr class="solid my-5">
                                <h5 class="mt-5 mb-3 font-bold">Features</h5>
                                <ul class="row list-unstyled">
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Air conditioning</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Home Theater</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Central Heating</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Laundry</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Balcony</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Storage</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Garage</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Yard</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list"> Electric Water Heater</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Deck</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Gym</span>
                                    </li>
                                    <li class="col-sm-6 col-lg-4 p-2">
                                        <i style="color:#19B5FF;" class="fas fa-check"></i>
                                        <span class="text-secondary px-2 col-list">Ocean View</span>
                                    </li>
                                </ul>
                                <hr class="solid my-5">
                                <div class="maps">
                                    <h5 class="mt-5 mb-3 font-bold">Map Location</h5>
                                    <div class="map-section">
                                        <div id="map"></div>
<!--                                        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly"-->
<!--                                                async></script>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- row col-3  -->
                <div class="col-lg-3">
                    <!-- row of col-lg-3   -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-12 mt-5 mt-lg-0">
                            <div id="card-crousel" class="card" style="width:100%;height:350px;">
                                <div class="card-body">
                                    <h4 class="text-white text-center">Our Agents</h4>
                                    <div id="demo" class="carousel slide mt-4" data-ride="carousel">

                                        <!-- Indicators -->
                                        <ul class="carousel-indicators detail-circle">
                                            <li data-target="#demo" data-slide-to="0" class="test-new"></li>
                                            <li data-target="#demo" data-slide-to="1" class="test-new"></li>
                                            <li data-target="#demo" data-slide-to="2" class="test-new"></li>
                                        </ul>

                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active text-center">
                                                <img style="max-width: 110px;border-radius: 100%;" id="img"
                                                     src="/assets/images/img-13.jpg" alt="Los Angeles" width="100%" height="100px">
                                                <h5 class="text-white mt-3">John Doe</h5>
                                                <a id="carousel-a" href="#"
                                                   class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                    123-4567</a>
                                                <a id="carousel-a" href="#"
                                                   class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                            </div>
                                            <div class="carousel-item text-center">
                                                <img style="max-width: 110px;border-radius: 100%;" src="/assets/images/img-11.jpg"
                                                     alt="Chicago" width="100%" height="100px">
                                                <h5 class="text-white mt-3">Janice Doe</h5>
                                                <a id="carousel-a" href="#"
                                                   class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                    123-4567</a>
                                                <a id="carousel-a" href="#"
                                                   class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                            </div>
                                            <div class="carousel-item text-center">
                                                <img style="max-width: 110px;border-radius: 100%;" src="/assets/images/img-12.jpg"
                                                     alt="New York" width="100%" height="100px">
                                                <h5 class="text-white mt-3">Lisa Doe</h5>
                                                <a id="carousel-a" href="#"
                                                   class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                    123-4567</a>
                                                <a id="carousel-a" href="#"
                                                   class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="crousal-card mt-5">
                                <div class="card" style="width:100%;height: auto;">
                                    <div id="card" class="carousel slide" data-ride="carousel">
                                        <ul class="carousel-indicators circle-2">
                                            <li data-target="#demo" data-slide-to="0"
                                                class="active crousal-circle-link"></li>
                                            <li data-target="#demo" data-slide-to="1"
                                                class=" crousal-circle-link"></li>
                                            <li data-target="#demo" data-slide-to="2"
                                                class=" crousal-circle-link"></li>
                                        </ul>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="card border-0 hover-card">
                                                    <div class="position-relative detail-h-card">
                                                        <img class="card-img-top" src="/assets/images/img-4.jpg"
                                                             alt="Image of a Property to sale or rent." height="250">
                                                        <div class="card-tag position-absolute left-1">
                                                            <span class="text-white font-weight-bold">FOR SALE</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 d-flex justify-content-between align-items-baseline">
                                                        <div>
                                                            <h4
                                                                class="heading-font-weight text-dark font-weight-bold m-0 px-3">
                                                                $ 1.250.000</h4>
                                                        </div>
                                                        <div class="px-2">
                                                            <i style="color: #00a4f2; font-size: 25px;"
                                                               class="fal fa-long-arrow-right icon-hov"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4 class="font-weight-bold text-dark px-3">South Miami</h4>
                                                    <div class="d-flex justify-content-between flex-wrap pb-5">
                                                        <div class="text-secondary heading-div-weight px-2">BEDS:3</div>
                                                        <div class="text-secondary heading-div-weight">BATHS:2</div>
                                                        <div class="text-secondary heading-div-weight px-2">SQ FT:500
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="card border-0 hover-card">
                                                    <div class="position-relative detail-h-card">
                                                        <img class="card-img-top" src="/assets/images/img-4.jpg"
                                                             alt="Image of a Property to sale or rent." height="200">
                                                        <div class="card-tag position-absolute left-1">
                                                            <span class="text-white font-weight-bold">FOR SALE</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 d-flex justify-content-between align-items-baseline">
                                                        <div>
                                                            <h4
                                                                class="font-weight-bold heading-font-weight text-dark m-0 px-3">
                                                                $ 1.250.000</h4>
                                                        </div>
                                                        <div class="px-2">
                                                            <i style="color: #00a4f2; font-size: 25px;"
                                                               class="fal fa-long-arrow-right icon-hov"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4 class="font-weight-bold px-3 text-dark">South Miami</h4>
                                                    <div class="d-flex justify-content-between flex-wrap pb-5">
                                                        <div class="text-secondary heading-div-weight px-2">BEDS:3</div>
                                                        <div class="text-secondary heading-div-weight">BATHS:2</div>
                                                        <div class="text-secondary heading-div-weight px-2">SQ FT:500
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="card border-0 hover-card">
                                                    <div class="position-relative detail-h-card">
                                                        <img class="card-img-top" src="/assets/images/img-4.jpg"
                                                             alt="Image of a Property to sale or rent." height="200">
                                                        <div class="card-tag position-absolute left-1">
                                                            <span class="text-white font-weight-bold">FOR SALE</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 d-flex justify-content-between align-items-baseline">
                                                        <div>
                                                            <h4
                                                                class="font-weight-bold heading-font-weight text-dark m-0 px-3">
                                                                $ 1.250.000</h4>
                                                        </div>
                                                        <div class="px-2">
                                                            <i style="color: #00a4f2; font-size: 25px;"
                                                               class="fal fa-long-arrow-right icon-hov"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4 class="font-weight-bold px-3 text-dark">South Miami</h4>
                                                    <div class="d-flex justify-content-between flex-wrap pb-5">
                                                        <div class="text-secondary heading-div-weight px-2">BEDS:3</div>
                                                        <div class="text-secondary heading-div-weight">BATHS:2</div>
                                                        <div class="text-secondary heading-div-weight px-2">SQ FT:500
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#card" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#card" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5 ">
                            <div class="card card-form" style="width:100%">
                                <div class="card-body">
                                    <h3 class="card-title font-weight-bold text-dark">Contact Us</h3>
                                    <p class="card-text">We help you choose your property and any other question</p>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="text" placeholder="Name *"
                                                   v-model="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="E-mail *"
                                                   v-model="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control" id="phone" placeholder="Phone *"
                                                   v-model="phone_number">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="5" id="comment" placeholder="Message *"
                                                      v-model="message"></textarea>
                                        </div>
                                        <button type="submit"
                                                @click.prevent="handleContactUs"
                                                class="btn border-0 btn-primary btn-block font-weight-bold btn-color py-2">Send
                                            Messages</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
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
import {getAgencyUsersBySlug} from "../../../composables/agency";
import {ref} from "vue";
import propertyService from "../../../services/propertyService";
import PropertyFilesList from "../../property/PropertyFilesList";
import {ApiResponse} from "../../../constants";
import contactUsService from "../../../services/contactUsService";
export default {
    name: "PropertyDetail",
    components: {PropertyFilesList, FrontFooter, FrontHeader},
    props:{
        slug:String,
        propertyId:Number,
    },
    setup(props){
        const name = ref('');
        const email = ref('');
        const phone_number = ref('');
        const message = ref('');
        const agencyUsers = getAgencyUsersBySlug(props.slug);
        let property = ref();
        getPropertyById()
        async function getPropertyById() {
            property.value = await propertyService.getPropertyById(props.propertyId);
        }
        async function handleContactUs(){
            const response = await contactUsService.handleContactUs({name: name.value, email: email.value,phone_number:phone_number.value,message:message.value});
            if (response.status === ApiResponse.SUCCESS) {
                name.value = '';
                email.value = '';
                phone_number.value = '';
                message.value = '';
            }
        }
        return{
            property,
            handleContactUs,
            name,
            email,
            phone_number,
            message
        }
    }
}
</script>

<style scoped>

</style>
