<template>
    <front-header></front-header>
    <div class="container mt-8">
        <div class="card-signup shadow-sm auth-card w-50 text-left">
            <div class="card-header bg-white border-bottom-0 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="auth-text text-uppercase">I'm a Returning Customer</h4>
<!--                    <a class="float-end btn" href="#">Create Account</a>-->
                    <router-link to="/signup"
                                 class="float-end btn">
                        Create An Account
                    </router-link>
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label">Username or E-mail Address</label>
                            <div class="position-relative">
                                <i class="fal fa-envelope position-absolute p-3 text-primary"></i>
                                <input
                                    class="form-control form-control-lg pl-5"
                                    id="email"
                                    type="email"
                                    v-model="userEmail"
                                    @blur="v$.userEmail.$touch()"
                                    required
                                    autofocus
                                >
                                <div class="text-left">
                                    <div v-if="v$.userEmail.$dirty">
                                        <sub
                                            v-if="v$.userEmail.$invalid"
                                            class="px-2 py-2 text-danger">
                                            Please enter a valid Email address
                                        </sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <router-link to="/forgot/password"
                                         class="float-end">
                                (Lost Password)
                            </router-link>
<!--                            <a class="float-end" href="#">(Lost Password?)</a>-->
                            <label class="form-label">Password</label>
                            <div class="position-relative">
                                <i class="fal fa-key position-absolute p-3 text-primary"></i>
                                <input
                                    id="password"
                                    type="password"
                                    v-model="password"
                                    required
                                    autocomplete="current-password"
                                    @blur="v$.password.$touch()"
                                    class="form-control form-control-lg pl-5"
                                >
                                <div class="text-left">
                                    <div v-if="v$.password.$dirty">
                                        <sub v-if="v$.password.$error"
                                             class="px-2 py-2 text-danger">
                                            Password is Required
                                        </sub>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8 col-12 text-md-left text-center">
                            <div class="d-inline-block mt-2">
                                <input type="checkbox" name="rememberme" class="" id="rememberme">
                                <label class="form-label" for="rememberme">Remember Me</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-12 text-md-right text-center">
                            <button type="submit"
                                    class="btn btn-primary btn-modern cursor-not-allowed"
                                    v-if="v$.$invalid" disabled>
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Sign In
                            </button>
                            <button v-else @click.prevent="handleLogin"
                                    type="submit"
                                    class="btn btn-primary btn-modern"
                            >
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Sign In
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
import authService from "../../../services/authService";
import {email, minLength, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import FrontHeader from "../../../components/ui/frontsite/base/FrontHeader";
export default {
    name: "Loginn",
    components: {FrontHeader},
    props: {
        token: String,
    },
    setup() {
        const userEmail = ref('abbasnaumani+1@gmail.com');
        const password = ref('12345678');
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
