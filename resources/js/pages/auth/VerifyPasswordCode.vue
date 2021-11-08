<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Reminder Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Reset Password</h3>
                            <div class="block-options">
                                <router-link class="btn-block-option" to="/login" data-toggle="tooltip"
                                             data-placement="left" title="Sign In">
                                    <i class="fa fa-sign-in-alt"></i>
                                </router-link>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <p class="text-muted">
                                    Please provide your account’s email and we will send you your password.
                                </p>

                                <!-- Reminder Form -->
                                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form>
                                    <!--                                        <x-input type="hidden" class="form-control form-control-lg form-control-alt"-->
                                    <!--                                                 id="password" name="token" value="{{$request->token}}"-->
                                    <!--                                                 placeholder="Password"/>-->
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            class="form-control form-control-lg form-control-alt"
                                            id="password"
                                            v-model="verificationCode"
                                            @blur="$v.verificationCode.$touch()"
                                            placeholder="Password"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="$v.verificationCode.$dirty">
                                            <sub v-if="$v.verificationCode.$error"
                                                 class= "px-2 py-2 text-danger">
                                                Verification Code is Required (at-least 8 characters long)
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
                                                <i class="fa fa-fw fa-lock mr-1"></i>Verify Password
                                            </button>
                                            <button v-else @click.prevent="handleVerificationCode"
                                                    type="submit"
                                                    class="btn btn-block btn-alt-primary"
                                            >
                                                <i class="fa fa-fw fa-lock mr-1"></i>Verify Password
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
import {required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "VerifyPasswordCode",
    setup(props){
        const {
            verificationCode,
            handleVerificationCode
        } = authLogin(props);
        const validationRules = computed(() => {
            return {
                verificationCode: {
                    required,
                },
            }
        });
        const $v = useVuelidate(
            validationRules,
            {verificationCode}
        );
        return{
            $v,
            verificationCode,
            handleVerificationCode
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed{
    cursor: not-allowed;
}
</style>
