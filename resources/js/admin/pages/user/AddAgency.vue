<template>
    <main id="main-container">
        <div class="content">
            <div id="agency-user-dashboard-section" class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Add New User </h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <form>
                                <div class="py-3">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-alt"
                                            id="first_name"
                                            v-model="agencyName"
                                            placeholder="Agency Name"
                                            @blur="v$.agencyName.$touch()"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyName.$dirty">
                                            <sub v-if="v$.agencyName.$error"
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
                                            v-model="agencyEmail"
                                            placeholder="Email"
                                            @blur="v$.agencyEmail.$touch()"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyEmail.$dirty">
                                            <sub v-if="v$.agencyEmail.$error"
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
                                            v-model="agencyPhoneNumber"
                                            @blur="v$.agencyPhoneNumber.$touch()"
                                            placeholder="Phone Number"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyPhoneNumber.$dirty">
                                            <sub v-if="v$.agencyPhoneNumber.$error"
                                                 class="px-2 py-2 text-danger">
                                               Agency Phone Number is Required
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="address"
                                            v-model="agencyAddress"
                                            @blur="v$.agencyAddress.$touch()"
                                            placeholder="Address"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.agencyAddress.$dirty">
                                            <sub v-if="v$.agencyAddress.$error"
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
                                            v-model="agencyFacebook"
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
                                            v-model="agencyTwitter"
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
                                            v-model="agencyInstagram"
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
                                        <button v-else @click.prevent="handleAddAgency"
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

export default {
    name: "AddAgency",
    setup(){
        const agencyName = ref('');
        const agencyEmail = ref('');
        const agencyPhoneNumber = ref('');
        const agencyAddress = ref('');
        const agencyFacebook = ref('');
        const agencyTwitter = ref('');
        const agencyInstagram = ref('');
        const handleAddAgency = () => {
            agencyService.handleAddAgency({
                agency_email: agencyEmail.value,
                agency_phone_number: agencyPhoneNumber.value,
                agency_name: agencyName.value,
               agency_address:agencyAddress.value,
               agency_facebook:agencyFacebook.value,
               agency_twitter:agencyTwitter.value,
               agency_instagram:agencyInstagram.value
            });
        }

        const validationRules = computed(() => {
            return {
                agencyName: {
                    required,
                },
                agencyEmail: {
                    required,
                    email
                },
                agencyPhoneNumber: {
                    required
                },
                agencyAddress: {
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {agencyName, agencyEmail, agencyPhoneNumber, agencyAddress}
        );
        return {
            v$,
            agencyName,
            agencyEmail,
            agencyPhoneNumber,
            agencyAddress,
            handleAddAgency,
        }
    }
}
</script>

<style scoped>

</style>
