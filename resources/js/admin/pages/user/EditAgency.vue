<template>
    <main id="main-container">
        <div class="content">
            <div id="agency-user-dashboard-section" class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Add New User </h3>
                </div>
                <div class="block-content block-content-full"  v-if="agencyData">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <form>
                                <div class="py-3">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-alt"
                                            id="first_name"
                                            v-model="agencyData.name"
                                            placeholder="Agency Name"
                                            @blur="v$.agencyData.name.$touch()"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyData.name.$dirty">
                                            <sub v-if="v$.agencyData.name.$error"
                                                 class="px-2 py-2 text-danger">
                                                Agency Name is Required
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="email"
                                            class="form-control form-control-lg form-control-alt"
                                            id="email"
                                            v-model="agencyData.email"
                                            placeholder="Email"
                                            @blur="v$.agencyData.email.$touch()"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyData.email.$dirty">
                                            <sub v-if="v$.agencyData.email.$error"
                                                 class="px-2 py-2 text-danger">
                                                Please enter a valid Email address
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="phone"
                                            v-model="agencyData.phone_number"
                                            @blur="v$.agencyData.phone_number.$touch()"
                                            placeholder="Phone Number"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyData.phone_number.$dirty">
                                            <sub v-if="v$.agencyData.phone_number.$error"
                                                 class="px-2 py-2 text-danger">
                                                Agency Phone Number is Required
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="slug"
                                            v-model="agencyData.slug"
                                            @blur="v$.agencyData.slug.$touch()"
                                            placeholder="Slug"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyData.slug.$dirty">
                                            <sub v-if="v$.agencyData.slug.$error"
                                                 class="px-2 py-2 text-danger">
                                                Agency Slug is Required
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="address"
                                            v-model="agencyData.address"
                                            @blur="v$.agencyData.address.$touch()"
                                            placeholder="Address"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyData.address.$dirty">
                                            <sub v-if="v$.agencyData.address.$error"
                                                 class="px-2 py-2 text-danger">
                                                Agency Address is Required
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="agency-facebook-url"
                                            value="www.facebook.com/"
                                            placeholder="User Name"
                                            disabled
                                        />
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="facebook"
                                            v-model="agencyData.facebook"
                                            placeholder="www.facebook.com/"
                                        />
                                    </div>
                                    <div class="form-group d-flex">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="agency-twitter-url"
                                            value="www.twitter.com/"
                                            placeholder="User Name"
                                            disabled
                                        />
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="twitter"
                                            v-model="agencyData.twitter"
                                            placeholder="www.twitter.com/"
                                        />
                                    </div>
                                    <div class="form-group d-flex">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="agency-insta-url"
                                            value="www.instagram.com/"
                                            placeholder="User Name"
                                            disabled
                                        />
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="insta"
                                            v-model="agencyData.instagram"
                                            placeholder="www.instagram.com/"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-xl-5">
                                        <button
                                            v-if="v$.$invalid"
                                            type="submit"
                                            class="btn btn-block btn-alt-primary cursor-not-allowed"
                                            disabled
                                        >
                                            <i class="fa fa-fw fa-paper-plane mr-1"></i>Submit
                                        </button>
                                        <button v-else @click.prevent="handleUpdateAgency"
                                                type="submit"
                                                class="btn btn-block btn-alt-primary"
                                        >
                                            <i class="fa fa-fw fa-paper-plane mr-1"></i>Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import {computed, ref} from "vue";
import agencyService from "../../services/agencyService";
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {getAgencyById} from "../../composables/agency";

export default {
    name: "EditAgency",
    props:{
        agencyId: Number
    },
    setup(props){
        const agencyData = getAgencyById(props.agencyId);
        const handleUpdateAgency = () => {
            agencyService.handleUpdateAgency({
                agency_email: agencyData.value.email,
                agency_phone_number: agencyData.value.phone_number,
                agency_name: agencyData.value.name,
                agency_address:agencyData.value.address,
                agency_slug:agencyData.value.slug,
                agency_facebook:agencyData.value.facebook,
                agency_twitter:agencyData.value.twitter,
                agency_instagram:agencyData.value.instagram,
            },props.agencyId);
        }

        const validationRules = computed(() => {
            return {
                agencyData:{
                    name: {
                        required,
                    },
                    email: {
                        required,
                        email
                    },
                    phone_number: {
                        required
                    },
                    address: {
                        required
                    },
                    slug: {
                        required
                    },
                }

            }
        });
        const v$ = useVuelidate(
            validationRules,
            {agencyData}
        );
        return {
            v$,
            agencyData,
            handleUpdateAgency,
        }
    }
}
</script>

<style scoped>

</style>
