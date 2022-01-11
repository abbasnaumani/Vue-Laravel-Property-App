<template>
    <div class="container py-2">
        <div class="card shadow-lg login-card w-50">
            <div class="card-header bg-white border-bottom-0 mt-3">
                <div class="d-flex justify-content-center align-items-center">
                    <h4 class="login-text text-capitalize letter-spacing">Adding User to Agency</h4>
                </div>
            </div>
            <div class="card-body text-left">
                <form>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label">First Name</label>
                            <div class="position-relative">
                                <i class="fal fa-user position-absolute p-3 text-primary"></i>
                                <input
                                    type="text"
                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                    id="first_name"
                                    v-model="firstName"
                                    placeholder="First Name"
                                    @blur="v$.firstName.$touch()"
                                />
                            </div>
                            <div class="text-left">
                                <div v-if="v$.firstName.$dirty">
                                    <sub v-if="v$.firstName.$error"
                                         class="px-2 py-2 text-danger">
                                        First Name is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label">Last Name</label>
                            <div class="position-relative">
                                <i class="fal fa-user position-absolute p-3 text-primary"></i>
                                <input
                                    type="text"
                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                    id="last_name"
                                    v-model="lastName"
                                    placeholder="Last Name"
                                    @blur="v$.lastName.$touch()"
                                />
                            </div>
                            <div class="text-left">
                                <div v-if="v$.lastName.$dirty">
                                    <sub v-if="v$.lastName.$error"
                                         class="px-2 py-2 text-danger">
                                        Last Name is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label">Email</label>
                            <div class="position-relative">
                                <i class="fal fa-envelope position-absolute p-3 text-primary"></i>
                                <input
                                    type="email"
                                    class="pl-5 form-control form-control-lg font-italic text-3"
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label">Email</label>
                            <div class="position-relative">
                                <i class="fal fa-user position-absolute p-3 text-primary"></i>
                                <select id="assign-role"
                                        class="pl-5 form-control form-control-lg font-italic text-3"
                                        v-model="roleId"
                                >
                                    <option v-for="role in roles" :value="role.id" :selected="role.id===roleId">{{role.name}}</option>
                                </select>
                                <div class="text-left">
                                    <div v-if="v$.roleId.$dirty">
                                        <sub v-if="v$.roleId.$error"
                                             class="px-2 py-2 text-danger">
                                            Role Assigning Required
                                        </sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label">Phone Number</label>
                            <div class="position-relative">
                                <i class="fal fa-phone-alt position-absolute p-3 text-primary"></i>
                                <input
                                    type="tel"
                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                    id="phone"
                                    v-model="phoneNumber"
                                    @blur="v$.phoneNumber.$touch()"
                                    placeholder="Phone Number"
                                />
                            </div>
                            <div class="text-left">
                                <div v-if="v$.phoneNumber.$dirty">
                                    <sub v-if="v$.phoneNumber.$error"
                                         class="px-2 py-2 text-danger">
                                        Phone Number is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group d-flex justify-content-end">
                            <button type="submit"
                                    class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color cursor-not-allowed"
                                    v-if="v$.$invalid" disabled>
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Submit
                            </button>
                            <button v-else @click.prevent="handleAddAgencyUser"
                                    type="submit"
                                    class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color"
                            >
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Submit
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
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import userService from "../../services/userService";
import {getAllRoles} from "../../composables/user";
import auth from "../../services/authService";

export default {
    name: "AddAgencyUser",
    props:{
        slug:String
    },
    setup(props){
        const firstName = ref('');
        const lastName = ref('');
        const userEmail = ref('');
        const phoneNumber = ref('');
        const roleId = ref(3);
        const roles = getAllRoles();
        const handleAddAgencyUser = () => {
            userService.handleAddAgencyUser({
                email: userEmail.value,
                phone_number: phoneNumber.value,
                first_name: firstName.value,
                last_name: lastName.value,
                role_id: roleId.value,
                agency_id: auth.user()?.agencies?.[0].id
            });
        }

        const validationRules = computed(() => {
            return {
                userEmail: {
                    required,
                    email
                },
                firstName: {
                    required
                },
                lastName: {
                    required
                },
                phoneNumber: {
                    required
                },
                roleId: {
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {userEmail, lastName, firstName, phoneNumber,roleId}
        );
        return {
            v$,
            firstName,
            lastName,
            userEmail,
            phoneNumber,
            handleAddAgencyUser,
            roles,
            roleId
        }
    }
}
</script>

<style scoped>

</style>
