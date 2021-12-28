<template>
    <section class="top-banner border-0 mt-5">
        <div class="container py-4 position-relative z-index-2 py-3">
            <div class="row py-4 d-flex flex-wrap-reverse align-items-center">
                <div class="col-md-8 order-2 order-md-1 d-flex align-self-center py-4 mt-2 justify-content-md-start justify-content-sm-center justify-content-center">
                    <div class="main-heading text-lg-start">
                        <h2 class="font-weight-extra-bold letter-spacing text-light mb-0">Page Name</h2>
                    </div>
                </div>
                <div class="col-md-4 order-2 order-md-1 d-flex align-self-center py-4 mt-2 justify-content-md-end justify-content-sm-center justify-content-center">
                    <div class="main-links">
                        <ul class="list-unstyled text-white">
                            <li><span style="font-size:11.5px;">HOME</span> <span style="opacity: 0.6;font-size:11.5px;">>
                                Page Name</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main-contact mt-5">
        <div class="main-contact-wrapper">
            <div class="container py-3 pb-5 mb-5">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row mb-5">
                            <div class="col-12 mb-5">
                                <div class="card border-0 contact-form-card">
                                    <div class="card-body">
                                        <h4 class="font-weight-bold contact-heading">Contact us</h4>
                                        <p class="text-secondary">We help you choose your property and any other question.
                                        </p>
                                        <form class="mb-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="text" placeholder="Name *"
                                                       v-model="name"
                                                       @blur="v$.name.$touch()"
                                                >
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
                                                <input type="email" class="form-control" id="userEmail" placeholder="E-mail *"
                                                       v-model="userEmail" @blur="v$.userEmail.$touch()">
                                                <div class="text-left">
                                                    <div v-if="v$.userEmail.$dirty">
                                                        <sub v-if="v$.userEmail.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Please enter a valid Email address
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control" id="phone" placeholder="Phone *"
                                                       v-model="phone_number" @blur="v$.phone_number.$touch()">
                                                <div class="text-left">
                                                    <div v-if="v$.phone_number.$dirty">
                                                        <sub v-if="v$.phone_number.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Phone Number is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                             <textarea class="form-control" rows="13" id="comment" placeholder="Message *"
                                                       v-model="message" @blur="v$.message.$touch()"></textarea>
                                                <div class="text-left">
                                                    <div v-if="v$.message.$dirty">
                                                        <sub v-if="v$.message.$error"
                                                             class="px-2 py-2 text-danger">
                                                            Message is Required
                                                        </sub>
                                                    </div>
                                                </div>
                                            </div>
                                            <button
                                                v-if="v$.$invalid"
                                                type="submit"
                                                class="btn test-fancy border-0 text-white btn-color w-100 cursor-not-allowed"
                                                disabled
                                            >
                                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Send Message
                                            </button>
                                            <button v-else @click.prevent="handleContactUs"
                                                    type="submit"
                                                    class="btn test-fancy border-0 text-white btn-color w-100"
                                            >
                                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Send Message
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <hr class="solid my-5">
                                <div class="maps">
                                    <h4 class="mt-5 mb-3 font-bold map-heading-contact">Location</h4>
                                    <div class="map-section">
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="font-weight-bold contact-info-heading">Address</h5>
                                <ul class="list-unstyled text-secondary mb-4 mt-0">
                                    <li>12345 Porto Blvd.</li>
                                    <li>Suite 1500</li>
                                    <li>Los Angeles, California 90000</li>
                                </ul>
                                <h5 class="font-weight-bold contact-info-heading">Email</h5>
                                <ul class="list-unstyled text-secondary mb-4 mt-0">
                                    <li>
                                        <a href="#">porto@portotheme.com</a>
                                    </li>
                                </ul>
                                <h5 class="font-weight-bold contact-info-heading">Phone</h5>
                                <ul class="list-unstyled text-secondary mb-4 mt-0">
                                    <li>
                                        <a href="">(800) 123-4567</a>
                                    </li>
                                </ul>
                                <h5 class="font-weight-bold contact-info-heading">Careers & Press</h5>
                                <ul class="list-unstyled text-secondary mb-4 mt-0">
                                    <li>
                                        <a href="">(800) 123-4567</a>
                                    </li>
                                </ul>
                                <h5 class="font-weight-bold contact-info-heading">Follow Us</h5>
                                <ul class="list-unstyled d-flex text-secondary ">
                                    <li class="py-4">
                                        <a class="d-lg-inline d-md-inline d-sm-none d-none facebook" href="#"><i class="fa fa-facebook px-1"></i></a>
                                    </li>
                                    <li class="py-4">
                                        <a class="d-lg-inline d-md-inline d-sm-none d-none twitter-header" href="#"><i class="fab fa-twitter p-1"></i></a>
                                    </li>
                                    <li class="py-4">
                                        <a class="d-lg-inline d-md-inline d-sm-none d-none instagram" href="#"><i class="fab fa-instagram p-1"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12">
                                <div id="card-crousel" class="card" style="width:100%;height:350px;">
                                    <div class="card-body">
                                        <h4 class="text-white text-center font-weight-bold letter-spacing">Our Agents</h4>
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
                                                    <img style="max-width: 110px;border-radius: 100%;" id="img" src="/assets/images/img-13.jpg" alt="Los Angeles" width="100%" height="100px">
                                                    <h5 class="text-white mt-3">John Doe</h5>
                                                    <a id="carousel-a" href="#" class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                        123-4567</a>
                                                    <a id="carousel-a" href="#" class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                                </div>
                                                <div class="carousel-item text-center">
                                                    <img style="max-width: 110px;border-radius: 100%;" src="/assets/images/img-11.jpg" alt="Chicago" width="100%" height="100px">
                                                    <h5 class="text-white mt-3">Janice Doe</h5>
                                                    <a id="carousel-a" href="#" class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                        123-4567</a>
                                                    <a id="carousel-a" href="#" class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                                </div>
                                                <div class="carousel-item text-center">
                                                    <img style="max-width: 110px;border-radius: 100%;" src="/assets/images/img-12.jpg" alt="New York" width="100%" height="100px">
                                                    <h5 class="text-white mt-3">Lisa Doe</h5>
                                                    <a id="carousel-a" href="#" class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                        123-4567</a>
                                                    <a id="carousel-a" href="#" class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-12 mt-md-4 mt-3">
                                <h4 class="font-weight-bold letter-spacing">Featured Properties</h4>
                                <div class="crousal-card ">
                                    <div class="card border-0" style="width:100%;height: auto;">
                                        <div id="card" class="carousel slide" data-ride="carousel">
                                            <ul class="carousel-indicators circle-2">
                                                <li data-target="#demo" data-slide-to="0" class="active crousal-circle-link-agents"></li>
                                                <li data-target="#demo" data-slide-to="1" class="crousal-circle-link-agents">
                                                </li>
                                                <li data-target="#demo" data-slide-to="2" class="crousal-circle-link-agents">
                                                </li>
                                            </ul>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="card custom-card move-svg  border-0">
                                                        <div class="card-interior overflow-hidden position-relative z-index-1">
                                                            <a href="" class="text-decoration-none card-anchor">
                                                            <span class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold letter-spacing text-uppercase position-absolute top-8 left-8">For
                                                                Sale</span>
                                                                <div class="custom-card-info-img d-block">
                                                                    <img src="/assets/images/img-4.jpg" class="img-fluid rounded">
                                                                </div>
                                                                <span class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                                                                <strong class="text-dark text-4 px-3 letter-spacing">$
                                                                    1.250.000</strong>
                                                                <div class="px-3 arrow-move">
                                                                    <svg class="svg-color" version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="icon_131640173528885" data-filename="arrow-right.svg" width="27" height="27">
                                                                        <polygon points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  ">
                                                                        </polygon>
                                                                    </svg>
                                                                </div>
                                                            </span>
                                                                <span class="custom-card-info-content d-block">
                                                                <h4 class="text-dark mb-1 text-5 px-3 font-weight-bold letter-spacing">
                                                                    South Miami</h4>
                                                                <ul class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap">
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Beds:
                                                                            3</strong>
                                                                    </li>
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Baths:
                                                                            2</strong>
                                                                    </li>
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Sq
                                                                            Ft: 500</strong>
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="card custom-card move-svg  border-0">
                                                        <div class="card-interior overflow-hidden position-relative z-index-1">
                                                            <a href="" class="text-decoration-none card-anchor">
                                                            <span class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold letter-spacing text-uppercase position-absolute top-8 left-8">For
                                                                Sale</span>
                                                                <div class="custom-card-info-img d-block">
                                                                    <img src="/assets/images/img-4.jpg" class="img-fluid rounded">
                                                                </div>
                                                                <span class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                                                                <strong class="text-dark text-4 px-3 letter-spacing">$
                                                                    1.250.000</strong>
                                                                <div class="px-3 arrow-move">
                                                                    <svg class="svg-color" version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="icon_131640173528885" data-filename="arrow-right.svg" width="27" height="27">
                                                                        <polygon points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  ">
                                                                        </polygon>
                                                                    </svg>
                                                                </div>
                                                            </span>
                                                                <span class="custom-card-info-content d-block">
                                                                <h4 class="text-dark mb-1 text-5 px-3 font-weight-bold letter-spacing">
                                                                    South Miami</h4>
                                                                <ul class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap">
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Beds:
                                                                            3</strong>
                                                                    </li>
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Baths:
                                                                            2</strong>
                                                                    </li>
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Sq
                                                                            Ft: 500</strong>
                                                                    </li>
                                                                </ul>
                                                            </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="card custom-card move-svg  border-0">
                                                        <div class="card-interior overflow-hidden position-relative z-index-1">
                                                            <a href="" class="text-decoration-none card-anchor">
                                                            <span class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold letter-spacing text-uppercase position-absolute top-8 left-8">For
                                                                Sale</span>
                                                                <div class="custom-card-info-img d-block">
                                                                    <img src="/assets/images/img-4.jpg" class="img-fluid rounded">
                                                                </div>
                                                                <span class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                                                                <strong class="text-dark text-4 px-3 letter-spacing">$
                                                                    1.250.000</strong>
                                                                <div class="px-3 arrow-move">
                                                                    <svg class="svg-color" version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="icon_131640173528885" data-filename="arrow-right.svg" width="27" height="27">
                                                                        <polygon points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  ">
                                                                        </polygon>
                                                                    </svg>
                                                                </div>
                                                            </span>
                                                                <span class="custom-card-info-content d-block">
                                                                <h4 class="text-dark mb-1 text-5 px-3 font-weight-bold letter-spacing">
                                                                    South Miami</h4>
                                                                <ul class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap">
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Beds:
                                                                            3</strong>
                                                                    </li>
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Baths:
                                                                            2</strong>
                                                                    </li>
                                                                    <li class="mb-3 px-2">
                                                                        <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Sq
                                                                            Ft: 500</strong>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {computed, ref} from "vue";
import contactUsService from "../services/contactUsService";
import {ApiResponse} from "../../constants";
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "ContactUs",
    setup(){
        const name = ref('');
        const userEmail = ref('');
        const phone_number = ref('');
        const message = ref('');
        async function handleContactUs(){
            const response = await contactUsService.handleContactUs({
                name: name.value,
                email: userEmail.value,
                phone_number:phone_number.value,
                message:message.value
            });
            if (response.status === ApiResponse.SUCCESS) {
                name.value = '';
                userEmail.value = '';
                phone_number.value = '';
                message.value = '';
                v$.value.$reset();
            }
        }
        const validationRules = computed(() => {
            return {
                userEmail: {
                    required,
                    email
                },
                phone_number: {
                    required,
                },
                name: {
                    required
                },
                message: {
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {
                userEmail,
                phone_number,
                name,
                message
            }
        );
        return{
            v$,
            handleContactUs,
            name,
            userEmail,
            phone_number,
            message
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
