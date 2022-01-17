<template>
    <main id="main-container">
        <div class="content">
            <div id="agency-user-dashboard-section" class="block block-rounded">
                <div class="block-header">
                    <h3 class="block-title">Add New User </h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <form>
                                <div class="py-3">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-alt"
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
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-alt"
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
                                    <div class="form-group">
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
                                    <div class="form-group" v-if="roles">
                                        <label>&nbsp Assign Role</label>
                                        <select id="assign-role"
                                                class="form-control form-control-lg form-control-alt"
                                                v-model="role_id"
                                        >
                                            <option v-for="role in roles" :value="role.id" :selected="role.id===role_id">{{role.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
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
                                <div class="form-group row">
                                    <div class="col-md-6 col-xl-5">
                                        <button
                                            v-if="v$.$invalid"
                                            type="submit"
                                            class="btn btn-block btn-alt-primary cursor-not-allowed"
                                            disabled
                                        >
                                            <i class="fa fa-fw fa-paper-plane mr-1"></i>Submit
                                        </button>
                                        <button v-else @click.prevent="handleAddAgencyUser"
                                                type="submit"
                                                class="btn btn-block btn-alt-primary"
                                        >
                                            <i class="fa fa-fw fa-paper-plane mr-1"></i>Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import {computed, ref,watch} from "vue";
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import userService from "../../services/userService";
import {getAllRoles} from "../../composables/user";
import {UserRoles} from "../../../constants";

export default {
    name: "AddAgencyUser",
    props:{
      agencyId: Number
    },
    setup(props){
        const firstName = ref('');
        const lastName = ref('');
        const userEmail = ref('');
        const phoneNumber = ref('');
        const role_id = ref(3);
        const roles = ref();
        const rolesData = getAllRoles();
        watch(rolesData,()=>{
            if(rolesData.value) {
                roles.value = rolesData.value.filter(function (role) {
                    return role.id !== UserRoles.SUPER_ADMIN;
                })
            }
        },{
            deep:true,
            immediate:true
        });
        const handleAddAgencyUser = () => {
            userService.handleAddAgencyUser({
                email: userEmail.value,
                phone_number: phoneNumber.value,
                first_name: firstName.value,
                last_name: lastName.value,
                role_id: role_id.value,
                agency_id: props.agencyId,
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
                role_id: {
                    required
                },
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {userEmail, lastName, firstName, phoneNumber,role_id}
        );
        return {
            v$,
            firstName,
            lastName,
            userEmail,
            phoneNumber,
            handleAddAgencyUser,
            roles,
            role_id
        }
    }
}
</script>

<style scoped>

</style>
