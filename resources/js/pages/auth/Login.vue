<template>
    <div class="hero-static">
        <div class="content">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <!-- Sign In Block -->
                    <div class="block block-rounded block-themed mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Sign In</h3>
                            <!--                            <div class="block-options">-->
                            <!--                                @if (Route::has('password.request'))-->
                            <!--                                <a class="btn-block-option font-size-sm" href="{{ route('password.request') }}">-->
                            <!--                                    {{ __('Forgot your password?') }}-->
                            <!--                                </a>-->
                            <!--                                @endif-->
                            <!--                                -->
                            <!--                            </div>-->
                        </div>
                        <div class="block-content">
                            <div class="p-sm-3 px-lg-4 py-lg-5">
                                <h1 class="h2 mb-1">KodeStudio</h1>
                                <p class="text-muted">
                                    Welcome, please login.
                                </p>

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form method="POST" @submit.prevent="handleLogin">

                                    <div class="py-3">
                                        <div class="form-group">
                                            <input id="email" class="form-control form-control-alt form-control-lg" type="email" v-model="email"  required autofocus />
                                        </div>
                                        <div class="form-group">
                                            <input id="password" class="form-control form-control-alt form-control-lg" type="password" v-model="password" required autocomplete="current-password" />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember" />
                                                <label class="custom-control-label font-w400" for="login-remember" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6 col-xl-5">
                                            <button type="submit" class="btn btn-block btn-alt-primary">
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
import {authLogin} from '../../composables/auth';

export default {
    name: "Login",
    props: {
        token: String,
    },
    setup(props) {
        const {
            email,
            password,
            handleLogin
        } = authLogin(props);
        return {
            email,
            password,
            handleLogin
        }
    },
}
</script>

<style scoped>

</style>
