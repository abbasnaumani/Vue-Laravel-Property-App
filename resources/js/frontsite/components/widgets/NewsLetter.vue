<template>
    <div class="col-12 col-sm-6 col-lg-12">
        <div class="form-card mt-4 ">
            <div class="card card-form border-0 mt-2 mb-4 py-5"
                 style="width:100%;height: 350px;">
                <div class="card-body">
                    <h4>Newsletter</h4>
                    <p>Subscribe and be the first to know about our best offers</p>
                    <form>
                        <div class="form-group">
                            <input type="text"
                                   class="form-control"
                                   placeholder="Your Name *"
                                   v-model="name"
                                   required
                                   @blur="v$.name.$touch()"
                            />
                            <div class="text-left">
                                <div v-if="v$.name.$dirty">
                                    <sub v-if="v$.name.$error"
                                         class="px-2 py-2 text-danger">
                                        Name is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email"
                                   class="form-control"
                                   placeholder="Your Email Address *"
                                   v-model="userEmail"
                                   required
                                   @blur="v$.userEmail.$touch()"
                            />
                            <div class="text-left">
                                <div v-if="v$.userEmail.$dirty">
                                    <sub v-if="v$.userEmail.$error"
                                         class="px-2 py-2 text-danger">
                                        Please enter a valid Email address
                                    </sub>
                                </div>
                            </div>
                        </div>
                        <button
                            v-if="v$.$invalid"
                            type="submit"
                            class="btn btn-color btn-primary w-100 cursor-not-allowed"
                            disabled
                        >
                            <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Submit
                        </button>
                        <button v-else @click.prevent="handleSubscription"
                                type="submit"
                                class="btn btn-color btn-primary w-100"
                        >
                            <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref} from "vue";
import subscribeService from "../../services/subscribeService";
import {ApiResponse} from "../../../constants";
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "NewsLetter",
    setup(){
        const name = ref('');
        const userEmail = ref('');
        async function handleSubscription() {
            const response = await subscribeService.handleSubscription({name: name.value, email: userEmail.value});
            if (response.status === ApiResponse.SUCCESS) {
                name.value = '';
                userEmail.value = '';
            }
        }
        const validationRules = computed(() => {
            return {
                userEmail: {
                    required,
                    email
                },
                name: {
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {
                userEmail,
                name,
            }
        );
        return{
            v$,
            name,
            userEmail,
            handleSubscription
        }
    }
}
</script>

<style scoped>

</style>
