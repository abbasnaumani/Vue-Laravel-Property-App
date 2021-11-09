<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Reminder Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Reset Password</h3>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <p class="text-muted">
                                    Please provide 4 digit code that we have send on your email.
                                </p>
                                <div>
                                    Or click on the link for log into your account.
                                    <router-link class="btn-block-option " to="/login" data-toggle="tooltip" data-placement="left" title="Sign In">
                                        <p class="text-muted fs-sm fw-medium">Login</p>
                                    </router-link>
                                </div>
                                <!-- Reminder Form -->
                                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form>
                                    <!--                                        <x-input type="hidden" class="form-control form-control-lg form-control-alt"-->
                                    <!--                                                 id="password" name="token" value="{{$request->token}}"-->
                                    <!--                                                 placeholder="Password"/>-->
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-alt"
                                            id="verification-code"
                                            v-model="verificationCode"
                                            @blur="$v.verificationCode.$touch()"
                                            placeholder="Verification Code"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="$v.verificationCode.$dirty">
                                            <sub v-if="$v.verificationCode.$error"
                                                 class= "px-2 py-2 text-danger">
                                                Verification Code is Required
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
                                            v-model="confirmPassword"
                                            @blur="$v.confirmPassword.$touch()"
                                            placeholder="Confirm Password"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="$v.confirmPassword.$dirty">
                                            <sub v-if="$v.confirmPassword.$error"
                                                 class= "px-2 py-2 text-danger">
                                                Please Enter confirm password same as password
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button
                                                type="submit"
                                                class="btn btn-block btn-alt-primary cursor-not-allowed"
                                                v-if="$v.$invalid"
                                                disabled
                                            >
                                                <i class="fa fa-fw fa-lock mr-1"></i>Update Password
                                            </button>
                                            <button v-else @click.prevent="handleUpdatePassword"
                                                    type="submit"
                                                    class="btn btn-block btn-alt-primary"
                                            >
                                                <i class="fa fa-fw fa-lock mr-1"></i>Update Password
                                            </button>
                                        </div>
                                        <div class="col-md-6 col-xl-5">
                                            <button
                                                    @click.prevent="handleForgotPassword"
                                                    type="submit"
                                                    class="btn btn-block btn-alt-primary"
                                            >
                                                <i class="fa fa-fw fa-envelope mr-1"></i>Resend Email
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Reminder Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Reminder Block -->
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
import {computed} from "vue";
import {minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "ResetPassword",
    props: {
        encodedToken: String,
    },
    setup(props){
        const {
            verificationCode,
            password,
            confirmPassword,
            handleForgotPassword,
            handleUpdatePassword
        } = authLogin(props);
        const validationRules = computed(() => {
            return {
                verificationCode: {
                    required,
                },
                password: {
                    required,
                    minLength: minLength(8)
                },
                confirmPassword: {
                    required,
                    sameAsPassword: sameAs(password.value),
                },
            }
        });
        const $v = useVuelidate(
            validationRules,
            {verificationCode,password,confirmPassword}
        );
        return{
            $v,
            password,
            confirmPassword,
            verificationCode,
            handleForgotPassword,
            handleUpdatePassword
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed{
    cursor: not-allowed;
}
</style>
