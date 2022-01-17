<template>
    <top-banner :pageName="property ? property.title : '' " link="Property-details"> </top-banner>
    <section class="container py-4 my-5">
        <div class="row">
            <!-- row col-9  -->
            <div class="col-lg-9">
                <!-- row in col-lg-9  -->
                <div class="row" v-if="property">
                    <div class="col-lg-7">
                        <div class="card border border-0" style="width: 100%; padding-bottom: 180px">
                            <div id="demo" class="carousel slide" data-ride="carousel">
                                <div class="row mt-3 carousel-indicators indicators" >
                                        <div class="col-4 p-0" v-for="(media,index) in property.media">
                                            <a href="" data-target="#demo" :data-slide-to="index">
                                                <img :src="'/' +media.disk +'/' +media.directory +'/' +media.filename +'.' +media.extension"
                                                     :alt="media.filename" width="100" height="100">
                                            </a>
                                        </div>
<!--                                        <div class="col-4 p-0">-->
<!--                                            <a href="" data-target="#demo" data-slide-to="1">-->
<!--                                                <img src="/assets/images/img-12.jpg" alt="" width="90%" height="110">-->
<!--                                            </a>-->
<!--                                        </div>-->
<!--                                        <div class="col-4 p-0">-->
<!--                                            <a href="" data-target="#demo" data-slide-to="2">-->
<!--                                                <img src="/assets/images/img-12.jpg" alt="" width="90%" height="110">-->
<!--                                            </a>-->
<!--                                        </div>-->
                                </div>
                                <div class="carousel-inner carousel-image carousel-hover" >
                                    <div class="carousel-item active image-div">
                                        <div class="image">
                                            <!--                                                {{property.media}}-->
                                            <!--                                                <div class="row">-->
                                            <!--                                                    <div class="col-12" v-if="property.media" >-->
                                            <!--                                                        <property-files-list :propertyMedia="property.media"></property-files-list>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <img
                                                src="/assets/images/img-17.jpg"
                                                alt="kuch bhi"
                                                width="475"
                                                height="382"
                                            />
                                            <div class="overlay">
                                                <div class="text">
                                                    <i style="font-size: 28px" class="fal fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="carousel-item image-div"
                                        v-for="media in property.media"
                                    >
                                        <div class="image">
                                            <img
                                                :src="'/' +media.disk +'/' +media.directory +'/' +media.filename +'.' +media.extension"
                                                :alt="media.filename"
                                                width="475"
                                                height="382"
                                            />
                                            <div class="overlay">
                                                <div class="text">
                                                    <i style="font-size: 28px" class="fal fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev prev" href="#demo" data-slide="prev">
                                    <span
                                        class="icon-indicators rounded d-flex justify-content-center align-items-center">
                                        <i class="fas fa-angle-left icon text-white d-flex justify-content-center align-items-center"></i>
                                    </span>
                                </a>
                                <a class="carousel-control-next next" href="#demo" data-slide="next">
                                  <span
                                      class="icon-indicators rounded d-flex justify-content-center align-items-center">
                                  <i class="fas fa-angle-right icon text-white d-flex justify-content-center align-items-center"></i>
                                  </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" v-if="property">
                        <div class="border-radius">
                            <table class="table table-striped border-radius">
                                <tbody>
                                <tr class="bg-table-color text-white">
                                    <td class="font-weight-bold">Price</td>
                                    <td class="font-weight-bold">
                                        {{ property.price }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Listing ID</td>
                                    <td>#{{ property.id }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Address</td>
                                    <td>
                                        {{ property.property_detail.address }} -
                                        {{ property.location.name }} -
                                        {{ property.location.city.name }}
                                        <a style="font-size: 14px" href="#">(Map Location)</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Beds</td>
                                    <td>
                                        {{ property.property_detail.bedrooms }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Baths</td>
                                    <td>
                                        {{ property.property_detail.bathrooms }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Area</td>
                                    <td>
                                        {{ property.area + " " + property.area_unit.name }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- new row in col-lg-9  -->
                <div class="row" v-if="property">
                    <div class="col">
                        <div class="information">
                            <h5 class="mt-5 mb-2 font-weight-bold text-6 letter-spacing">
                                Description
                            </h5>
                            <p
                                class="text-secondary info-agent-text"
                                v-html="property.property_detail.description"
                            ></p>
                            <p class="text-secondary info-agent-text">
                                Ctrices posuere cubilia Curae; In eu libero ligula. Fusce eget
                                metus lorem, ac feugiat nibh adipiscing sit amet. In eu juiverra
                                leo. Vestibulum ante ipsum primis in faucibus orci.
                            </p>
                            <hr class="solid my-5"/>
                        </div>
                    </div>
                </div>
            </div>

            <!-- row col-3  -->
            <div class="col-lg-3">
                <!-- row of col-lg-3   -->
                <div class="row">
                    <agents-carousel :slug="slug"></agents-carousel>
                    <div class="col-12 col-md-6 col-lg-12 mt-md-4 mt-3">
                        <h4 class="font-weight-bold letter-spacing">Featured Properties</h4>
                        <div class="crousal-card">
                            <div class="card border-0" style="width: 100%; height: auto">
                                <div id="card" class="carousel slide" data-ride="carousel">
                                    <ul class="carousel-indicators circle-2">
                                        <li
                                            data-target="#demo"
                                            data-slide-to="0"
                                            class="active crousal-circle-link-agents"
                                        ></li>
                                        <li
                                            data-target="#demo"
                                            data-slide-to="1"
                                            class="crousal-circle-link-agents"
                                        ></li>
                                        <li
                                            data-target="#demo"
                                            data-slide-to="2"
                                            class="crousal-circle-link-agents"
                                        ></li>
                                    </ul>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="card custom-card move-svg border-0">
                                                <div
                                                    class="
                            card-interior
                            overflow-hidden
                            position-relative
                            z-index-1
                          "
                                                >
                                                    <a href="" class="text-decoration-none card-anchor">
                            <span
                                class="
                                custom-card-info-type
                                text-light
                                py-2
                                px-3
                                text-1
                                font-weight-bold
                                letter-spacing
                                text-uppercase
                                position-absolute
                                top-8
                                left-8
                              "
                            >For Sale</span
                            >
                                                        <div class="custom-card-info-img d-block">
                                                            <img
                                                                src="/assets/images/img-4.jpg"
                                                                class="img-fluid rounded"
                                                            />
                                                        </div>
                                                        <span
                                                            class="
                                custom-card-info-header
                                d-flex
                                justify-content-between
                                align-items-center
                                p-relative
                              "
                                                        >
                              <strong
                                  class="text-dark text-4 px-3 letter-spacing"
                              >$ 1.250.000</strong
                              >
                              <div class="px-3 arrow-move">
                                <svg
                                    class="svg-color"
                                    version="1.1"
                                    viewBox="0 0 50 50"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="icon_131640173528885"
                                    data-filename="arrow-right.svg"
                                    width="27"
                                    height="27"
                                >
                                  <polygon
                                      points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  "
                                  ></polygon>
                                </svg>
                              </div>
                            </span>
                                                        <span class="custom-card-info-content d-block">
                              <h4
                                  class="
                                  text-dark
                                  mb-1
                                  text-5
                                  px-3
                                  font-weight-bold
                                  letter-spacing
                                "
                              >
                                South Miami
                              </h4>
                              <ul
                                  class="
                                  list-unstyled
                                  d-flex
                                  mb-0
                                  px-1
                                  py-1
                                  justify-content-between
                                  flex-wrap
                                "
                              >
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Beds: 3</strong
                                  >
                                </li>
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Baths: 2</strong
                                  >
                                </li>
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Sq Ft: 500</strong
                                  >
                                </li>
                              </ul>
                            </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card custom-card move-svg border-0">
                                                <div
                                                    class="
                            card-interior
                            overflow-hidden
                            position-relative
                            z-index-1
                          "
                                                >
                                                    <a href="" class="text-decoration-none card-anchor">
                            <span
                                class="
                                custom-card-info-type
                                text-light
                                py-2
                                px-3
                                text-1
                                font-weight-bold
                                letter-spacing
                                text-uppercase
                                position-absolute
                                top-8
                                left-8
                              "
                            >For Sale</span
                            >
                                                        <div class="custom-card-info-img d-block">
                                                            <img
                                                                src="/assets/images/img-4.jpg"
                                                                class="img-fluid rounded"
                                                            />
                                                        </div>
                                                        <span
                                                            class="
                                custom-card-info-header
                                d-flex
                                justify-content-between
                                align-items-center
                                p-relative
                              "
                                                        >
                              <strong
                                  class="text-dark text-4 px-3 letter-spacing"
                              >$ 1.250.000</strong
                              >
                              <div class="px-3 arrow-move">
                                <svg
                                    class="svg-color"
                                    version="1.1"
                                    viewBox="0 0 50 50"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="icon_131640173528885"
                                    data-filename="arrow-right.svg"
                                    width="27"
                                    height="27"
                                >
                                  <polygon
                                      points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  "
                                  ></polygon>
                                </svg>
                              </div>
                            </span>
                                                        <span class="custom-card-info-content d-block">
                              <h4
                                  class="
                                  text-dark
                                  mb-1
                                  text-5
                                  px-3
                                  font-weight-bold
                                  letter-spacing
                                "
                              >
                                South Miami
                              </h4>
                              <ul
                                  class="
                                  list-unstyled
                                  d-flex
                                  mb-0
                                  px-1
                                  py-1
                                  justify-content-between
                                  flex-wrap
                                "
                              >
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Beds: 3</strong
                                  >
                                </li>
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Baths: 2</strong
                                  >
                                </li>
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Sq Ft: 500</strong
                                  >
                                </li>
                              </ul>
                            </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="card custom-card move-svg border-0">
                                                <div
                                                    class="
                            card-interior
                            overflow-hidden
                            position-relative
                            z-index-1
                          "
                                                >
                                                    <a href="" class="text-decoration-none card-anchor">
                            <span
                                class="
                                custom-card-info-type
                                text-light
                                py-2
                                px-3
                                text-1
                                font-weight-bold
                                letter-spacing
                                text-uppercase
                                position-absolute
                                top-8
                                left-8
                              "
                            >For Sale</span
                            >
                                                        <div class="custom-card-info-img d-block">
                                                            <img
                                                                src="/assets/images/img-4.jpg"
                                                                class="img-fluid rounded"
                                                            />
                                                        </div>
                                                        <span
                                                            class="
                                custom-card-info-header
                                d-flex
                                justify-content-between
                                align-items-center
                                p-relative
                              "
                                                        >
                              <strong
                                  class="text-dark text-4 px-3 letter-spacing"
                              >$ 1.250.000</strong
                              >
                              <div class="px-3 arrow-move">
                                <svg
                                    class="svg-color"
                                    version="1.1"
                                    viewBox="0 0 50 50"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    id="icon_131640173528885"
                                    data-filename="arrow-right.svg"
                                    width="27"
                                    height="27"
                                >
                                  <polygon
                                      points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  "
                                  ></polygon>
                                </svg>
                              </div>
                            </span>
                                                        <span class="custom-card-info-content d-block">
                              <h4
                                  class="
                                  text-dark
                                  mb-1
                                  text-5
                                  px-3
                                  font-weight-bold
                                  letter-spacing
                                "
                              >
                                South Miami
                              </h4>
                              <ul
                                  class="
                                  list-unstyled
                                  d-flex
                                  mb-0
                                  px-1
                                  py-1
                                  justify-content-between
                                  flex-wrap
                                "
                              >
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Beds: 3</strong
                                  >
                                </li>
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Baths: 2</strong
                                  >
                                </li>
                                <li class="mb-3 px-2">
                                  <strong
                                      class="
                                      text-secondary text-uppercase
                                      font-weight-extra-bold
                                      text-2
                                    "
                                  >Sq Ft: 500</strong
                                  >
                                </li>
                              </ul>
                            </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <contact-us :slug="slug"></contact-us>
                </div>
            </div>
        </div>
    </section>
    <bottom-banner></bottom-banner>
</template>

<script>
import {computed, ref} from "vue";
import propertyService from "../../services/propertyService";
// import PropertyFilesList from "../../property/PropertyFilesList";
import ContactUs from "../../components/widgets/ContactUs";
import BottomBanner from '../../components/utilities/BottomBanner.vue';
import AgentsCarousel from "../../components/widgets/AgentsCarousel";
import TopBanner from '../../components/utilities/TopBanner.vue';

export default {
    name: "PropertyDetail",
    components: {AgentsCarousel, ContactUs, BottomBanner, TopBanner},
    props: {
        slug: String,
        propertyId: Number,
    },
    setup(props) {
        let property = ref();
        getPropertyById();

        async function getPropertyById() {
            property.value = await propertyService.getPropertyById(props.propertyId);
        }

        return {
            property,
        };
    },
};
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
