<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign Up Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Create Account</h3>
                            <div class="block-options">
                                <a class="btn-block-option font-size-sm" href="javascript:void(0)" data-toggle="modal" data-target="#one-signup-terms">View Terms</a>
                                <router-link class="btn-block-option" to="/login" data-toggle="tooltip" data-placement="left" title="Sign In">
                                    <i class="fa fa-sign-in-alt"></i>
                                </router-link>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <p class="text-muted">
                                    Please fill the following details to create a new account.
                                </p>

                                <!-- Sign Up Form -->
                                <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signup" @submit.prevent="handleRegistration" method="POST" id="register-form-id">
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="first_name" v-model="first_name" placeholder="First Name" autofocus/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-alt" id="last_name" v-model="last_name" placeholder="Last Name"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-lg form-control-alt" id="email" v-model="email" placeholder="Email"/>
                                            <small> <span class="text-danger" id="result"> </span></small>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control form-control-lg form-control-alt" id="phone" v-model="phone_number" placeholder="Phone Number"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="password" v-model="password" placeholder="Password"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-alt" id="password_confirmation" v-model="password_confirmation" placeholder="Confirm Password"/>
                                        </div>
                                        <!--                                       <div class="form-group">-->
                                        <!--                                        <div class="custom-control custom-checkbox">-->
                                        <!--                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">-->
                                        <!--                                            <label class="custom-control-label font-w400" for="signup-terms">I agree to Terms &amp; Conditions</label>-->
                                        <!--                                        </div>-->
                                        <!--                                    </div> -->
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-alt-primary">
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

export default {
    name: "Register",
    setup(props) {
        const {
            first_name,
            last_name,
            email,
            phone_number,
            password,
            password_confirmation,
            handleRegistration
        } = authLogin(props);
        return {
            first_name,
            last_name,
            email,
            phone_number,
            password,
            password_confirmation,
            handleRegistration
        }
    },
}
</script>

<style scoped>

</style>
