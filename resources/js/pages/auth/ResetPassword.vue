<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8 col-xl-6">
                    <!-- Reminder Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Reset Password</h3>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <p class="text-muted">
                                    Please provide 6 digit code that we have send on your email.
                                </p>
                                <form>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-alt"
                                            id="verification-code"
                                            v-model="verificationCode"
                                            @blur="v$.verificationCode.$touch()"
                                            placeholder="Verification Code"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.verificationCode.$dirty">
                                            <sub v-if="v$.verificationCode.$error"
                                                 class="px-2 py-2 text-danger">
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
                                            @blur="v$.password.$touch()"
                                            placeholder="Password"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.password.$dirty">
                                            <sub v-if="v$.password.$error"
                                                 class="px-2 py-2 text-danger">
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
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-6 col-xl-5">
                                            <button
                                                type="submit"
                                                class="btn btn-block btn-alt-primary cursor-not-allowed"
                                                v-if="v$.$invalid"
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
                                        <div class="col-sm-6 col-md-6 col-xl-5 text-center mt-1">
                                            <a title="Not received code?"
                                               @click.prevent="handleResendVerificationCode"
                                               class="block-link-shadow" style="cursor: pointer;">
                                                Resend Code
                                            </a>
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
import {computed, ref} from "vue";
import {minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import authService from "../../services/authService";
import {LocalStorageKeys} from "../../constants";
import localStorageService from "../../services/localStorageService";

export default {
    name: "ResetPassword",
    props: {
        encodedToken: String,
    },
    setup(props) {
        const verificationCode = ref('');
        const password = ref('');
        const confirmPassword = ref('');
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
        const v$ = useVuelidate(
            validationRules,
            {verificationCode, password, confirmPassword}
        );
        const handleResendVerificationCode = async () => {
            await authService.handleSendVerificationCode({
                email: await localStorageService.getWithExpiry(LocalStorageKeys.USER_EMAIL),
                token: props.encodedToken
            });
        }
        const handleUpdatePassword = () => {
            authService.handleUpdatePassword({
                verificationCode: verificationCode.value,
                encodedToken: props.encodedToken,
                password: password.value,
                password_confirmation: confirmPassword.value
            });
        }
        return {
            v$,
            password,
            confirmPassword,
            verificationCode,
            handleResendVerificationCode,
            handleUpdatePassword
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
