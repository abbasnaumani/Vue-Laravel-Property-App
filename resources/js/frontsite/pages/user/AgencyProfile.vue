<template>
    <div class="container py-5" v-if="auth.user().roles[0].id == UserRoles.AGENCY_ADMIN">
        <div class="card shadow-sm login-card w-100 text-left mt-5">
            <div class="card-header bg-white border-bottom-0 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-normal text-7 mb-0">
                        <strong class="font-weight-extra-bold">Agency</strong>
                        Profile
                    </h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 mt-4 mt-lg-0">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="profile-image-outer-container">
                                <div class="profile-image-inner-container bg-color-primary">
                                    <img src="/assets/images/user-profile.png" class="rounded-circle" height="210" width="210">
                                    <span class="profile-image-button bg-color-dark">
                                    <i class="fas fa-camera text-light"></i>
                                </span>
                                </div>
                                <input type="file" id="file" class="form-control profile-image-input">
                            </div>
                        </div>
                    </div>
                    <form class="col-lg-9">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Agency name</label>
                            <div class="col-lg-9">
                                <input
                                    type="tel"
                                    class="form-control text-3 h-auto py-2"
                                    id="agency-name"
                                    v-model="agencyData.agency_name"
                                    @blur="v$.agencyData.agency_name.$touch()"
                                    placeholder="Agency Name"
                                />
                                <div class="d-flex justify-content-start">
                                    <div v-if="v$.agencyData.agency_name.$dirty">
                                        <sub v-if="v$.agencyData.agency_name.$error"
                                             class="px-2 py-2 text-danger">
                                            Agency Name is Required
                                        </sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Agency Slug</label>
                            <div class="col-lg-9">
                                <input
                                    type="tel"
                                    class="form-control text-3 h-auto py-2"
                                    id="agency-slug"
                                    v-model="agencyData.agency_slug"
                                    @blur="v$.agencyData.agency_slug.$touch()"
                                    placeholder="Agency Name"
                                />
                                <div class="d-flex justify-content-start">
                                    <div v-if="v$.agencyData.agency_slug.$dirty">
                                        <sub v-if="v$.agencyData.agency_slug.$error"
                                             class="px-2 py-2 text-danger">
                                            Agency Slug is Required
                                        </sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Agency Email</label>
                            <div class="col-lg-9">
                                <input
                                    type="tel"
                                    class="form-control text-3 h-auto py-2"
                                    id="agency-email"
                                    v-model="agencyData.agency_email"
                                    @blur="v$.agencyData.agency_email.$touch()"
                                    placeholder="Agency Email"
                                />
                                <div class="d-flex justify-content-start">
                                    <div v-if="v$.agencyData.agency_email.$dirty">
                                        <sub v-if="v$.agencyData.agency_email.$error"
                                             class="px-2 py-2 text-danger">
                                            Please enter a valid Agency Email address
                                        </sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2">Agency Phone Number</label>
                            <div class="col-lg-9">
                                <input
                                    type="tel"
                                    class="form-control text-3 h-auto py-2"
                                    id="agency-phone"
                                    v-model="agencyData.agency_phone_number"
                                    @blur="v$.agencyData.agency_phone_number.$touch()"
                                    placeholder="Agency Phone Number"
                                />
                                <div class="d-flex justify-content-start">
                                    <div v-if="v$.agencyData.agency_phone_number.$dirty">
                                        <sub v-if="v$.agencyData.agency_phone_number.$error"
                                             class="px-2 py-2 text-danger">
                                            Agency Phone Number is Required
                                        </sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2">Agency Address</label>
                            <div class="col-lg-9">
                                <input
                                    type="tel"
                                    class="form-control text-3 h-auto py-2"
                                    id="agency-address"
                                    v-model="agencyData.agency_address"
                                    @blur="v$.agencyData.agency_address.$touch()"
                                    placeholder="Agency Address"
                                />
                                <div class="d-flex justify-content-start">
                                    <div v-if="v$.agencyData.agency_address.$dirty">
                                        <sub v-if="v$.agencyData.agency_address.$error"
                                             class="px-2 py-2 text-danger">
                                            Agency Address is Required
                                        </sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2">Agency Facebook</label>
                            <div class="col-lg-9">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-3">
                                            <i class="fa fa-facebook position-absolute text-primary"></i>
                                            <p class="font-italic pl-3 pt-3">www.facebook.com/ </p>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="pl-2 form-control form-control-lg font-italic text-3"
                                        id="agency-facebook"
                                        v-model="agencyFacebook"
                                        placeholder="username"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2">Agency Twitter</label>
                            <div class="col-lg-9">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-3">
                                            <i class="fa fa-twitter position-absolute text-primary"></i>
                                            <p class="font-italic pl-3 pt-3">www.twitter.com/ </p>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="pl-2 form-control form-control-lg font-italic text-3"
                                        id="agency-twitter"
                                        v-model="agencyTwitter"
                                        placeholder="username"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2">Agency Instagram</label>
                            <div class="col-lg-9">
                                <div class="input-group input-group-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-3">
                                            <i class="fa fa-instagram position-absolute text-primary"></i>
                                            <p class="font-italic pl-3 pt-3">www.instagram.com/ </p>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="pl-2 form-control form-control-lg font-italic text-3"
                                        id="agency-insta"
                                        v-model="agencyInstagram"
                                        placeholder="username"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p class="mb-0 text-info font-italic">please enter your password to update the information</p>
                        </div>
                        <div class="col-lg-6 offset-3">
                            <input
                                type="password"
                                class="form-control text-3 h-auto py-2"
                                id="password"
                                v-model="agencyData.password"
                                @blur="v$.agencyData.password.$touch()"
                                placeholder="Password"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.agencyData.password.$dirty">
                                    <sub v-if="v$.agencyData.password.$error"
                                         class="px-2 py-2 text-danger">
                                        Password is Required for updating profile
                                    </sub>
                                </div>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button
                                v-if="v$.agencyData.$invalid"
                                type="submit"
                                class="mt-3 btn btn-primary btn-modern float-end cursor-not-allowed"
                                disabled
                            >
                                <i class="fa fa-cloud mr-1"></i>Save
                            </button>
                            <button v-else @click.prevent="updateAgencyProfile"
                                    type="submit"
                                    class="mt-3 btn btn-primary btn-modern float-end"
                            >
                                <i class="fa fa-cloud-in-alt mr-1"></i>Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref} from "vue";
import {email, minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import userService from "~/frontsite/services/userService";
import auth from "~/frontsite/services/authService";
import agencyService from "../../services/agencyService";
import {UserRoles} from "../../../constants";
import router from "../../router";

export default {
    name: "AgencyProfile",
    props:{
      slug:String
    },
    setup(props) {
        if(auth.user().roles[0].id !== UserRoles.AGENCY_ADMIN){
            router.push({path:'/'+props.slug})
        }
        const agencyData = ref({
            agency_name:auth.user().agencies[0].name,
            agency_phone_number:auth.user().agencies[0].phone_number,
            agency_address:auth.user().agencies[0].address,
            agency_email:auth.user().agencies[0].email,
            agency_slug:auth.user().agencies[0].slug,
            agency_facebook:auth.user().agencies[0].facebook,
            agency_twitter:auth.user().agencies[0].twitter,
            agency_instagram:auth.user().agencies[0].instagram,
            password:''
        });

        const updateAgencyProfile = () => {
            agencyService.updateAgencyProfile({
                agency_data:agencyData.value
            });
        }
        const validationRules = computed(() => {
            return {
                agencyData:{
                    agency_name: {
                        required,
                    },
                    agency_phone_number: {
                        required,
                    },
                    agency_address: {
                        required
                    },
                    agency_email: {
                        required,
                        email
                    },
                    agency_slug: {
                        required
                    },
                    password: {
                        required
                    },
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {
                agencyData,
            }
        );
        return {
            v$,
            auth,
            agencyData,
            UserRoles,
            updateAgencyProfile,
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
