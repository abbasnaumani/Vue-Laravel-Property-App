<template>
  <div class="col-12 mt-5">
    <div class="card card-form border border-0" style="width: 100%">
      <div class="card-body">
        <h4 class="card-title font-weight-bold text-dark form-heading-detail">
          Contact Us
        </h4>
        <p class="card-text text-secondary">
          We help you choose your property and any other question
        </p>
        <form>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              id="text"
              placeholder="Name *"
              v-model="name"
              @blur="v$.name.$touch()"
            />
            <div class="text-left">
              <div v-if="v$.name.$dirty">
                <sub v-if="v$.name.$error" class="px-2 py-2 text-danger">
                  Name is Required
                </sub>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input
              type="email"
              class="form-control"
              id="userEmail"
              placeholder="E-mail *"
              v-model="userEmail"
              @blur="v$.userEmail.$touch()"
            />
            <div class="text-left">
              <div v-if="v$.userEmail.$dirty">
                <sub v-if="v$.userEmail.$error" class="px-2 py-2 text-danger">
                  Please enter a valid Email address
                </sub>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input
              type="tel"
              class="form-control"
              id="phone"
              placeholder="Phone *"
              v-model="phone_number"
              @blur="v$.phone_number.$touch()"
            />
            <div class="text-left">
              <div v-if="v$.phone_number.$dirty">
                <sub
                  v-if="v$.phone_number.$error"
                  class="px-2 py-2 text-danger"
                >
                  Phone Number is Required
                </sub>
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea
              class="form-control"
              rows="5"
              id="comment"
              placeholder="Message *"
              v-model="message"
              @blur="v$.message.$touch()"
            ></textarea>
            <div class="text-left">
              <div v-if="v$.message.$dirty">
                <sub v-if="v$.message.$error" class="px-2 py-2 text-danger">
                  Message is Required
                </sub>
              </div>
            </div>
          </div>
          <button
            v-if="v$.$invalid"
            type="submit"
            class="
              btn
              test-fancy
              border-0
              text-white
              btn-color
              w-100
              cursor-not-allowed
            "
            disabled
          >
            Send Message
          </button>
          <button
            v-else
            @click.prevent="handleContactUs"
            type="submit"
            class="btn test-fancy border-0 text-white btn-color w-100"
          >
            Send Message
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { computed, ref } from "vue";
import contactUsService from "../../services/contactUsService";
import { ApiResponse } from "../../../constants";
import { email, required } from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
  name: "ContactUs",
    props:{
      slug:String
    },
  setup(props) {
    const name = ref("");
    const userEmail = ref("");
    const phone_number = ref("");
    const message = ref("");
    async function handleContactUs() {
      const response = await contactUsService.handleContactUs({
        name: name.value,
        email: userEmail.value,
        phone_number: phone_number.value,
        message: message.value,
        slug: props.slug,
      });
      if (response.status === ApiResponse.SUCCESS) {
        name.value = "";
        userEmail.value = "";
        phone_number.value = "";
        message.value = "";
          v$.value.$reset();
      }
    }
    const validationRules = computed(() => {
      return {
        userEmail: {
          required,
          email,
        },
        phone_number: {
          required,
        },
        name: {
          required,
        },
        message: {
          required,
        },
      };
    });
    const v$ = useVuelidate(validationRules, {
      userEmail,
      phone_number,
      name,
      message,
    });

    return {
      v$,
      handleContactUs,
      name,
      userEmail,
      phone_number,
      message,
    };
  },
};
</script>

<style scoped>
.cursor-not-allowed {
  cursor: not-allowed;
}
</style>
