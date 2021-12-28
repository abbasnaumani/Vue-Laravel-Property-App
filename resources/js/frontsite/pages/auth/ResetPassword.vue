<template>
    <div class="container py-5">
        <div class="card shadow-lg login-card w-50">
            <div class="card-header bg-white border-bottom-0 mt-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="login-text text-uppercase letter-spacing">Forgot Password</h4>
                    <router-link to="/login"
                                 class="float-end btn">
                        (Login)
                    </router-link>
                </div>
            </div>
            <div class="card-body text-left">
                <form>
                    <div class="row">
                        <div class="form-group col">
                            <input
                                type="text"
                                class="pl-5 form-control form-control-lg"
                                id="verification-code"
                                v-model="verificationCode"
                                @blur="v$.verificationCode.$touch()"
                                placeholder="Verification Code"
                            />
                            <div class="text-left">
                                <div v-if="v$.verificationCode.$dirty">
                                    <sub v-if="v$.verificationCode.$error"
                                         class="px-2 py-2 text-danger">
                                        Verification Code is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input
                                type="password"
                                class="pl-5 form-control form-control-lg"
                                id="password"
                                v-model="password"
                                @blur="v$.password.$touch()"
                                placeholder="Password"
                            />
                            <div class="text-left">
                                <div v-if="v$.password.$dirty">
                                    <sub v-if="v$.password.$error"
                                         class="px-2 py-2 text-danger">
                                        Password is Required (at-least 8 characters long)
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input
                                type="password"
                                class="pl-5 form-control form-control-lg"
                                id="password_confirmation"
                                v-model="confirmPassword"
                                @blur="v$.confirmPassword.$touch()"
                                placeholder="Confirm Password"
                            />
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

                    <div class="form-group row">
                        <div class="col-sm-6 col-md-6 col-xl-5">
                            <button
                                type="submit"
                                class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color cursor-not-allowed"
                                v-if="v$.$invalid"
                                disabled
                            >
                                <i class="fa fa-fw fa-lock mr-1"></i>Update Password
                            </button>
                            <button v-else @click.prevent="handleUpdatePassword"
                                    type="submit"
                                    class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color"
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
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref} from "vue";
import {minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import authService from "~/frontsite/services/authService";
import {LocalStorageKeys} from "~/constants";
import localStorageService from "~/services/localStorageService";

export default {
    name: "ResetPassword",
    props: {
        encodedToken: String,
    },
    setup(props) {
        const verificationCode = ref();
        const password = ref();
        const confirmPassword = ref();
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
        const handleResendVerificationCode = () => {
            authService.handleSendVerificationCode({
                email: localStorageService.getWithExpiry(LocalStorageKeys.USER_EMAIL),
                token: props.encodedToken
            });
        }
        const handleUpdatePassword = () => {
            authService.handleUpdatePassword({
                verification_code: verificationCode.value,
                token: props.encodedToken,
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
