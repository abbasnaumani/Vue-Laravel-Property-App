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
                            <div class="position-relative">
                                <i class="fal fa-envelope position-absolute pl-3 pt-3 text-primary"></i>
                                <input
                                    type="email"
                                    class="pl-5 form-control form-control-lg"
                                    id="email"
                                    v-model="userEmail"
                                    placeholder="Email"
                                    @blur="v$.userEmail.$touch()"
                                />
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
                    <div class="">
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit"
                                    class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color cursor-not-allowed"
                                    v-if="v$.$invalid" disabled>
                                <i class="fa fa-fw fa-envelope mr-1"></i>Send Mail
                            </button>
                            <button v-else @click.prevent="handleSendVerificationCode"
                                    type="submit"
                                    class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color"
                            >
                                <i class="fa fa-fw fa-envelope mr-1"></i>Send Mail
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {email, required} from "@vuelidate/validators";
import {computed, ref} from "vue";
import useVuelidate from "@vuelidate/core";
import authService from "../../services/authService";

export default {
    name: "ForgotPassword",
    setup() {
        const userEmail = ref('');
        const validationRules = computed(() => {
            return {
                userEmail: {
                    required,
                    email
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {userEmail}
        );
        const handleSendVerificationCode = () => {
            authService.handleSendVerificationCode({email: userEmail.value});
        }
        return {
            v$,
            userEmail,
            handleSendVerificationCode
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
