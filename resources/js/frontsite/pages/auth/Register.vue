<template>
    <div class="container">
        <div class="card shadow-lg login-card w-100">
            <div class="card-header bg-white border-bottom-0 mt-3">
                <div class="d-flex justify-content-center align-items-center">
                    <h4 class="login-text text-4 font-weight-semi-bold letter-spacing text-uppercase">Register Form</h4>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-6">
                            <div class="card shadow-sm login-card w-100">
                                <div class="card-header bg-white border-bottom-0 mt-3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4 class="login-text text-uppercase letter-spacing">User Information</h4>
                                    </div>
                                </div>
                                <div class="card-body text-left">
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">First Name</label>
                                            <div class="position-relative">
                                                <i class="fal fa-user position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="text"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="first_name"
                                                    v-model="firstName"
                                                    placeholder="First Name"
                                                    @blur="v$.firstName.$touch()"
                                                />
                                            </div>
                                            <div class="text-left">
                                                <div v-if="v$.firstName.$dirty">
                                                    <sub v-if="v$.firstName.$error"
                                                         class="px-2 py-2 text-danger">
                                                        First Name is Required
                                                    </sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Last Name</label>
                                            <div class="position-relative">
                                                <i class="fal fa-user position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="text"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="last_name"
                                                    v-model="lastName"
                                                    placeholder="Last Name"
                                                    @blur="v$.lastName.$touch()"
                                                />
                                            </div>
                                            <div class="text-left">
                                                <div v-if="v$.lastName.$dirty">
                                                    <sub v-if="v$.lastName.$error"
                                                         class="px-2 py-2 text-danger">
                                                        Last Name is Required
                                                    </sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Email</label>
                                            <div class="position-relative">
                                                <i class="fal fa-envelope position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="email"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="email"
                                                    v-model="userEmail"
                                                    placeholder="Email"
                                                    @blur="v$.userEmail.$touch()"
                                                />
                                            </div>
                                            <div class="text-left">
                                                <div v-if="v$.userEmail.$dirty">
                                                    <sub v-if="v$.userEmail.$error"
                                                         class="px-2 py-2 text-danger">
                                                        Please enter a valid Email address
                                                    </sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Phone Number</label>
                                            <div class="position-relative">
                                                <i class="fal fa-phone-alt position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="tel"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="phone"
                                                    v-model="phoneNumber"
                                                    @blur="v$.phoneNumber.$touch()"
                                                    placeholder="Phone Number"
                                                />
                                            </div>
                                            <div class="text-left">
                                                <div v-if="v$.phoneNumber.$dirty">
                                                    <sub v-if="v$.phoneNumber.$error"
                                                         class="px-2 py-2 text-danger">
                                                        Phone Number is Required
                                                    </sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Password</label>
                                            <div class="position-relative">
                                                <i class="fal fa-lock position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="password"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="password"
                                                    v-model="password"
                                                    @blur="v$.password.$touch()"
                                                    placeholder="Password"
                                                />
                                            </div>
                                            <div class="text-left">
                                                <div v-if="v$.password.$dirty">
                                                    <sub v-if="v$.password.$error"
                                                         class="px-2 py-2 text-danger">
                                                        Password is Required (at-least 8 characters
                                                        long)
                                                    </sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="position-relative">
                                                <i class="fal fa-lock position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="password"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="password_confirmation"
                                                    v-model="confirmPassword"
                                                    @blur="v$.confirmPassword.$touch()"
                                                    placeholder="Confirm Password"
                                                />
                                            </div>
                                            <div class="text-left">
                                                <div v-if="v$.confirmPassword.$dirty">
                                                    <sub v-if="v$.confirmPassword.$error"
                                                         class="px-2 py-2 text-danger">
                                                        Please Enter confirm password same as password
                                                    </sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card shadow-sm login-card w-100">
                                <div class="card-header bg-white border-bottom-0 mt-3">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <h4 class="login-text text-uppercase letter-spacing">Agency Information</h4>
                                    </div>
                                </div>
                                <div class="card-body text-left">
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Agency Name</label>
                                            <div class="position-relative">
                                                <i class="fal fa-building position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="tel"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="agency-name"
                                                    v-model="agencyName"
                                                    @blur="v$.agencyName.$touch()"
                                                    placeholder="Agency Name"
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Agency Email</label>
                                            <div class="position-relative">
                                                <i class="fal fa-envelope position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="tel"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="agency-email"
                                                    v-model="agencyEmail"
                                                    @blur="v$.agencyEmail.$touch()"
                                                    placeholder="Agency Email"
                                                />
                                            </div>
                                            <div class="text-left">
                                                <div v-if="v$.agencyEmail.$dirty">
                                                    <sub v-if="v$.agencyEmail.$error"
                                                         class="px-2 py-2 text-danger">
                                                        Please enter a valid Agency Email address
                                                    </sub>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Agency Phone Number</label>
                                            <div class="position-relative">
                                                <i class="fal fa-phone-alt position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="tel"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="agency-phone"
                                                    v-model="agencyPhoneNumber"
                                                    @blur="v$.agencyPhoneNumber.$touch()"
                                                    placeholder="Agency Phone Number"
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Agency Address</label>
                                            <div class="position-relative">
                                                <i class="fal fa-map-marker-alt position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="tel"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="agency-address"
                                                    v-model="agencyAddress"
                                                    @blur="v$.agencyAddress.$touch()"
                                                    placeholder="Agency Address"
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
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label class="form-label">Social Links</label>
                                            <div class="position-relative">
                                                <i class="fa fa-facebook position-absolute p-3 text-primary"></i>
                                                <input
                                                    type="tel"
                                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                                    id="agency-address"
                                                    placeholder="www.facebook.com/"
                                                />
                                            </div>
                                            <!-- <div class="text-left">
                                                <div v-if="v$.agencyAddress.$dirty">
                                                    <sub v-if="v$.agencyAddress.$error"
                                                         class="px-2 py-2 text-danger">
                                                        Agency Address is Required
                                                    </sub>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group position-relative col-6">
                                            <i class="fa fa-twitter position-absolute p-3 text-primary"></i>
                                            <input
                                                type="tel"
                                                class="pl-5 form-control form-control-lg  font-italic text-3"
                                                id="agency-address"
                                                placeholder="www.twitter.com/"
                                            />
                                        </div>
                                        <div class="form-group position-relative col-6">
                                            <i class="fa fa-instagram position-absolute p-3 text-primary"></i>
                                            <input
                                                type="tel"
                                                class="pl-5 form-control form-control-lg font-italic text-3"
                                                id="agency-address"
                                                placeholder="www.instagram.com/"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-12 text-center mt-4">
                        <button
                            v-if="v$.$invalid"
                            type="submit"
                            class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color w-25 cursor-not-allowed"
                            disabled
                        >
                            <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Sign Up
                        </button>
                        <button v-else @click.prevent="handleRegistration"
                                type="submit"
                                class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color w-25"
                        >
                            <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Sign Up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref} from "vue";
import authService from "~/frontsite/services/authService";
import {email, minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "Register",
    components: {},
    setup() {
        const firstName = ref('');
        const lastName = ref('');
        const userEmail = ref('');
        const phoneNumber = ref('');
        const agencyName = ref('');
        const agencyEmail = ref('');
        const agencyPhoneNumber = ref('');
        const agencyAddress = ref('');
        const password = ref('');
        const confirmPassword = ref('');
        const handleRegistration = () => {
            authService.handleRegistration({
                email: userEmail.value,
                password: password.value,
                password_confirmation: confirmPassword.value,
                phone_number: phoneNumber.value,
                first_name: firstName.value,
                last_name: lastName.value,
                agency_name: agencyName.value,
                agency_email: agencyEmail.value,
                agency_phone_number: agencyPhoneNumber.value,
                agency_address: agencyAddress.value
            });
        }
        const validationRules = computed(() => {
            return {
                userEmail: {
                    required,
                    email
                },
                password: {
                    required,
                    minLength: minLength(8)
                },
                confirmPassword: {
                    required,
                    sameAsPassword: sameAs(password.value),
                },
                firstName: {
                    required
                },
                lastName: {
                    required
                },
                phoneNumber: {
                    required
                },
                agencyName: {
                    required
                },
                agencyEmail: {
                    email,
                    required
                },
                agencyPhoneNumber: {
                    required
                },
                agencyAddress: {
                    required
                }
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {
                userEmail,
                password,
                lastName,
                firstName,
                phoneNumber,
                confirmPassword,
                agencyName,
                agencyEmail,
                agencyPhoneNumber,
                agencyAddress
            }
        );
        return {
            v$,
            firstName,
            lastName,
            userEmail,
            phoneNumber,
            password,
            confirmPassword,
            agencyName,
            agencyEmail,
            agencyPhoneNumber,
            agencyAddress,
            handleRegistration
        }
    },
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
