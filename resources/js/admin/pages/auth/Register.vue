<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign Up Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Create Account</h3>

                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <p class="text-muted">
                                    Please fill the following details to create a new account.
                                </p>
                                <div>
                                    Or already have an account,
                                    <router-link class="btn-block-option" to="/login"
                                                 data-toggle="tooltip" data-placement="left"
                                                 title="Sign In">
                                        <p class="text-muted">Login</p>
                                    </router-link>
                                </div>
                                <form>
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control form-control-lg form-control-alt"
                                                id="first_name"
                                                v-model="firstName"
                                                placeholder="First Name"
                                                autofocus
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
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="tel"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="tel"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="tel"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="tel"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="tel"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control form-control-lg form-control-alt"
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
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control form-control-lg form-control-alt"
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
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button
                                                v-if="v$.$invalid"
                                                type="submit"
                                                class="btn btn-block btn-alt-primary cursor-not-allowed"
                                                disabled
                                            >
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i>Sign Up
                                            </button>
                                            <button v-else @click.prevent="handleRegistration"
                                                    type="submit"
                                                    class="btn btn-block btn-alt-primary"
                                            >
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i>Sign Up
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign Up Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign Up Block -->
                </div>
            </div>
        </div>
        <div class="content content-full font-size-sm text-muted text-center">
            <strong>KodeStudio.net</strong> &copy; <span data-toggle="year-copy"></span>
        </div>
    </div>
</template>

<script>
import {email, minLength, required, sameAs} from "@vuelidate/validators";
import {computed, ref} from "vue";
import useVuelidate from "@vuelidate/core";
import authService from "../../services/authService";

export default {
    name: "Register",
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
            {userEmail, password, lastName, firstName, phoneNumber, confirmPassword, agencyName, agencyEmail, agencyPhoneNumber, agencyAddress}
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
