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
                                    <router-link class="btn-block-option" to="/login" data-toggle="tooltip" data-placement="left" title="Sign In">
                                        <p class="text-muted">Login</p>
                                    </router-link>
                                </div>

                                <!-- Sign Up Form -->
                                <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form>
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control form-control-lg form-control-alt"
                                                id="first_name"
                                                v-model="first_name"
                                                placeholder="First Name"
                                                autofocus
                                                @blur="$v.first_name.$touch()"
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="$v.first_name.$dirty">
                                                <sub v-if="$v.first_name.$error"
                                                     class= "px-2 py-2 text-danger">
                                                    First Name is Required
                                                </sub>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control form-control-lg form-control-alt"
                                                id="last_name"
                                                v-model="last_name"
                                                placeholder="Last Name"
                                                @blur="$v.last_name.$touch()"
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="$v.last_name.$dirty">
                                                <sub v-if="$v.last_name.$error"
                                                     class= "px-2 py-2 text-danger">
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
                                                @blur="$v.userEmail.$touch()"
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="$v.userEmail.$dirty">
                                                <sub v-if="$v.userEmail.$error"
                                                     class= "px-2 py-2 text-danger">
                                                    Please enter a valid Email address
                                                </sub>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="tel"
                                                class="form-control form-control-lg form-control-alt"
                                                id="phone"
                                                v-model="phone_number"
                                                @blur="$v.phone_number.$touch()"
                                                placeholder="Phone Number"
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="$v.phone_number.$dirty">
                                                <sub v-if="$v.phone_number.$error"
                                                     class= "px-2 py-2 text-danger">
                                                    Phone Number is Required
                                                </sub>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control form-control-lg form-control-alt"
                                                id="password"
                                                v-model="password"
                                                @blur="$v.password.$touch()"
                                                placeholder="Password"
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="$v.password.$dirty">
                                                <sub v-if="$v.password.$error"
                                                     class= "px-2 py-2 text-danger">
                                                    Password is Required (at-least 8 characters long)
                                                </sub>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                class="form-control form-control-lg form-control-alt"
                                                id="password_confirmation"
                                                v-model="password_confirmation"
                                                @blur="$v.password_confirmation.$touch()"
                                                placeholder="Confirm Password"
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="$v.password_confirmation.$dirty">
                                                <sub v-if="$v.password_confirmation.$error"
                                                     class= "px-2 py-2 text-danger">
                                                    Please Enter confirm password same as password
                                                </sub>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-alt-primary cursor-not-allowed"  v-if="$v.$invalid" disabled>
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
import {authLogin} from "../../composables/auth";
import {email, minLength, required, sameAs} from "@vuelidate/validators";
import {computed} from "vue";
import useVuelidate from "@vuelidate/core";

export default {
    name: "Register",
    setup(props) {
        const {
            first_name,
            last_name,
            userEmail,
            phone_number,
            password,
            password_confirmation,
            handleRegistration
        } = authLogin(props);
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
                password_confirmation: {
                    required,
                    sameAsPassword: sameAs(password.value),
                },
                first_name:{
                    required
                },
                last_name:{
                    required
                },
                phone_number:{
                    required
                }
            }
        });
        const $v = useVuelidate(
            validationRules,
            {userEmail, password,last_name,first_name,phone_number,password_confirmation}
        );
        return {
            $v,
            first_name,
            last_name,
            userEmail,
            phone_number,
            password,
            password_confirmation,
            handleRegistration
        }
    },

}
</script>

<style scoped>
.cursor-not-allowed{
    cursor: not-allowed;
}
</style>
