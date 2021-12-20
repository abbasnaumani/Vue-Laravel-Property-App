<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <!-- Sign In Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Sign In</h3>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <div class="text-muted">
                                    Welcome, please login. Or
                                    <router-link to="/signup"
                                                 class="btn-block-option js-bs-tooltip-enabled"
                                                 data-bs-toggle="tooltip" data-bs-placement="left"
                                                 title="" data-bs-original-title="New Account">
                                        <i class="fa fa-user-plus"></i>
                                        <p class="text-muted">Create An Account</p>
                                    </router-link>
                                </div>
                                <form>
                                    <div class="py-3">
                                        <div class="form-group">
                                            <input
                                                id="email"
                                                class="form-control form-control-alt form-control-lg"
                                                type="email"
                                                v-model="userEmail"
                                                @blur="v$.userEmail.$touch()"
                                                required
                                                autofocus
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="v$.userEmail.$dirty">
                                                <sub
                                                    v-if="v$.userEmail.$invalid"
                                                    class="px-2 py-2 text-danger">
                                                    Please enter a valid Email address
                                                </sub>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input
                                                id="password"
                                                class="form-control form-control-alt form-control-lg"
                                                type="password"
                                                v-model="password"
                                                required
                                                autocomplete="current-password"
                                                @blur="v$.password.$touch()"
                                            />
                                        </div>
                                        <div class="text-left">
                                            <div v-if="v$.password.$dirty">
                                                <sub v-if="v$.password.$error"
                                                     class="px-2 py-2 text-danger">
                                                    Password is Required
                                                </sub>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="form-check col-md-6 col-xl-5">
                                                <input class="form-check-input" type="checkbox"
                                                       value="" id="login-remember"
                                                       v-model="rememberMe">
                                                <label class="form-check-label"
                                                       for="login-remember">Remember Me</label>
                                            </div>
                                            <div class="col-md-6 col-xl-5 text-right">
                                                <router-link to="/forgot/password"
                                                             class="btn-block-option font-size-sm">
                                                    <p class="text-muted">Forgot Password</p>
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit"
                                                    class="btn btn-block btn-alt-primary cursor-not-allowed"
                                                    v-if="v$.$invalid" disabled>
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i>Sign In
                                            </button>
                                            <button v-else @click.prevent="handleLogin"
                                                    type="submit"
                                                    class="btn btn-block btn-alt-primary"
                                            >
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i>Sign In
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                    <!-- END Sign In Block -->
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
import authService from "../../services/authService";
import {email, minLength, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "Login",
    props: {
        token: String,
    },
    setup() {
        const userEmail = ref('');
        const password = ref('');
        const rememberMe = ref(false);
        const handleLogin = () => {
            authService.handleLogin(userEmail.value, password.value, rememberMe.value);
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
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {userEmail, password}
        );
        return {
            v$,
            rememberMe,
            userEmail,
            password,
            handleLogin,
        }
    },
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
