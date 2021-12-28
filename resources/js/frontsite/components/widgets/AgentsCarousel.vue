<template>
    <div class="col-12 col-sm-6 col-lg-12">
        <div class="owl-crousal mt-4">
            <div class="card card-crousel mt-2" style="width:100%;height: 330px;">
                <div class="card-body">
                    <h4 class="text-white text-center letter-spacing font-weight-bold mt-3">Our Agents</h4>
                    <div id="demo" class="carousel slide mt-4" data-ride="carousel">

                        <!-- Indicators -->
                        <ul class="carousel-indicators circle">
                            <li data-target="#demo" data-slide-to="0" class="active test">
                            </li>
                            <li data-target="#demo" data-slide-to="1" class="test"></li>
                            <li data-target="#demo" data-slide-to="2" class="test"></li>
                        </ul>

                        <!-- The slideshow -->
                        <div class="carousel-inner" v-if="agencyUsers">
                            <div class="carousel-item active text-center">
                                <img style="max-width: 110px;border-radius: 100%;" id="img" src="/assets/images/img-13.jpg" alt="Los Angeles" width="100%" height="100px">
                                <h5 class="text-white mt-3">John Doe</h5>
                                <a href="#" class="text-white carousel-a  d-lg-block d-md-block d-sm-block d-block">(800)
                                    123-4567</a>
                                <a href="#" class="text-white carousel-a d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                            </div>
                            <div class="carousel-item text-center" v-for="user in agencyUsers">
                                <img style="max-width: 110px;border-radius: 100%;" src="/assets/images/img-13.jpg" alt="Chicago" width="100%" height="100px">
                                <h5 class="text-white mt-3">{{user.first_name+' '+user.last_name}}</h5>
                                <a href="#" class="text-white carousel-a d-lg-block d-md-block d-sm-block d-block">{{user.phone_number}}</a>
                                <a href="#" class="text-white carousel-a d-lg-block d-md-block d-sm-block d-block">{{user.email}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {getAgencyUsersBySlug} from "../../composables/agency";

export default {
    name: "AgentsCarousel",
    props:{
        slug:String,
    },
    setup(props){
        const agencyUsers = getAgencyUsersBySlug(props.slug);
        return{
            agencyUsers,
        }
    }
}
</script>

<style scoped>

</style>
