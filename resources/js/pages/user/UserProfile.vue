<template>
    <div class="container py-5">
        <div class="card shadow-sm login-card w-100 text-left mt-5">
            <div class="card-header bg-white border-bottom-0 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-normal text-7 mb-0">
                        <strong class="font-weight-extra-bold">User</strong>
                        Profile
                    </h2>
                </div>
                <div class="overflow-hidden pt-3">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="card-body">

                <form>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">First name</label>
                        <div class="col-lg-9">
                            <input
                                type="text"
                                class="form-control text-3 h-auto py-2"
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
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Last name</label>
                        <div class="col-lg-9">
                            <input
                                type="text"
                                class="form-control text-3 h-auto py-2"
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
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Email</label>
                        <div class="col-lg-9">
                            <input
                                type="email"
                                class="form-control text-3 h-auto py-2"
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
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2">Phone Number</label>
                        <div class="col-lg-9">
                            <input
                                type="tel"
                                class="form-control text-3 h-auto py-2"
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
<!--                    <div class="form-group row">-->
<!--                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Password</label>-->
<!--                        <div class="col-lg-9">-->
<!--                            <input-->
<!--                                type="password"-->
<!--                                class="pl-5 form-control form-control-lg form-control-alt"-->
<!--                                id="password"-->
<!--                                v-model="password"-->
<!--                                @blur="v$.password.$touch()"-->
<!--                                placeholder="Password"-->
<!--                            />-->
<!--                           -->
<!--                            <input class="form-control text-3 h-auto py-2" type="password" name="password" value="" required="">-->
<!--                        </div>-->
<!--                        <div class="text-left">-->
<!--                            <div v-if="v$.password.$dirty">-->
<!--                                <sub v-if="v$.password.$error"-->
<!--                                     class="px-2 py-2 text-danger">-->
<!--                                    Password is Required (at-least 8 characters-->
<!--                                    long)-->
<!--                                </sub>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group row">-->
<!--                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Confirm password</label>-->
<!--                        <div class="col-lg-9">-->
<!--                            <input-->
<!--                                type="password"-->
<!--                                class="pl-5 form-control form-control-lg form-control-alt"-->
<!--                                id="password_confirmation"-->
<!--                                v-model="confirmPassword"-->
<!--                                @blur="v$.confirmPassword.$touch()"-->
<!--                                placeholder="Confirm Password"-->
<!--                            />-->
<!--                            <input class="form-control text-3 h-auto py-2" type="password" name="confirmPassword" value="" required="">-->
<!--                        </div>-->
<!--                        <div class="text-left">-->
<!--                            <div v-if="v$.confirmPassword.$dirty">-->
<!--                                <sub v-if="v$.confirmPassword.$error"-->
<!--                                     class="px-2 py-2 text-danger">-->
<!--                                    Please Enter confirm password same as password-->
<!--                                </sub>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="form-group row">
                        <div class="form-group col-lg-9">

                        </div>
                        <div class="form-group col-lg-3">
                            <button
                                v-if="v$.$invalid"
                                type="submit"
                                class="btn btn-primary btn-modern float-end cursor-not-allowed"
                                disabled
                            >
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Save
                            </button>
                            <button v-else @click.prevent="UpdateProfile"
                                    type="submit"
                                    class="btn btn-primary btn-modern float-end"
                            >
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref} from "vue";
import {email, minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import userService from "~/services/userService";

export default {
    name: "UserProfile",
    setup(){
        const firstName = ref('');
        const lastName = ref('');
        const userEmail = ref('');
        const phoneNumber = ref('');
        const password = ref('');
        const handleRegistration = () => {
            userService.updateProfile({
                email: userEmail.value,
                phone_number: phoneNumber.value,
                first_name: firstName.value,
                last_name: lastName.value,
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
                firstName: {
                    required
                },
                lastName: {
                    required
                },
                phoneNumber: {
                    required
                },
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
            }
        );
        return {
            v$,
            firstName,
            lastName,
            userEmail,
            phoneNumber,
            password,
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
