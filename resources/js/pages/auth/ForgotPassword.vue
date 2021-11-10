<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-8 col-lg-6 col-xl-6">
                    <!-- Reminder Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Forgot Password here</h3>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <p class="text-muted">
                                    Please provide your account’s email and we will send you rest
                                    password link.
                                </p>
                                <div>
                                    Or click on the link for log into your account.
                                    <router-link class="btn-block-option " to="/login"
                                                 data-toggle="tooltip" data-placement="left"
                                                 title="Sign In">
                                        <p class="text-muted fs-sm fw-medium">Login</p>
                                    </router-link>
                                </div>
                                <!-- Reminder Form -->
                                <!-- jQuery Validation (.js-validation-reminder class is initialized in js/pages/op_auth_reminder.min.js which was auto compiled from _js/pages/op_auth_reminder.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form>

                                    <div class="form-group py-3">
                                        <input
                                            type="email"
                                            class="form-control form-control-lg form-control-alt"
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
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button
                                                type="submit"
                                                class="btn btn-block btn-alt-primary cursor-not-allowed"
                                                v-if="v$.$invalid"
                                                disabled
                                            >
                                                <i class="fa fa-fw fa-envelope mr-1"></i>Send Mail
                                            </button>
                                            <button v-else @click.prevent="handleForgotPassword"
                                                    type="submit"
                                                    class="btn btn-block btn-alt-primary"
                                            >
                                                <i class="fa fa-fw fa-envelope mr-1"></i>Send Mail
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
import {email, required} from "@vuelidate/validators";
import {computed, ref} from "vue";
import useVuelidate from "@vuelidate/core";
import authService from "../../services/authService";

export default {
    name: "ForgotPassword",
    setup() {
        const userEmail = ref('');
        const handleForgotPassword = async () => {
            authService.handleForgotPassword(userEmail.value);
        }
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
        return {
            v$,
            userEmail,
            handleForgotPassword
        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}
</style>
