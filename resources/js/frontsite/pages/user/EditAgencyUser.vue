<template>
    <div class="container py-2">
        <div class="card shadow-lg login-card w-50">
            <div class="card-header bg-white border-bottom-0 mt-3">
                <div class="d-flex justify-content-center align-items-center">
                    <h4 class="login-text text-capitalize letter-spacing">Adding User to Agency</h4>
                </div>
            </div>
            <div class="card-body text-left" v-if="userData">
                <form>
                    <div class="row" >
                        <div class="form-group col">
                            <label class="form-label">First Name</label>
                            <div class="position-relative">
                                <i class="fal fa-user position-absolute p-3 text-primary"></i>
                                <input
                                    type="text"
                                    class="pl-5 form-control form-control-lg font-italic text-3"
                                    id="first_name"
                                    v-model="userData.first_name"
                                    placeholder="First Name"
                                    @blur="v$.userData.first_name.$touch()"
                                />
                            </div>
                            <div class="text-left">
                                <div v-if="v$.userData.first_name.$dirty">
                                    <sub v-if="v$.userData.first_name.$error"
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
                                    v-model="userData.last_name"
                                    placeholder="Last Name"
                                    @blur="v$.userData.last_name.$touch()"
                                />
                            </div>
                            <div class="text-left">
                                <div v-if="v$.userData.last_name.$dirty">
                                    <sub v-if="v$.userData.last_name.$error"
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
                                    v-model="userData.email"
                                    placeholder="Email"
                                    @blur="v$.userData.email.$touch()"
                                />
                            </div>
                            <div class="text-left">
                                <div v-if="v$.userData.email.$dirty">
                                    <sub v-if="v$.userData.email.$error"
                                         class="px-2 py-2 text-danger">
                                        Please enter a valid Email address
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-if="roles">
                        <div class="form-group col">
                            <label class="form-label">Assign Role</label>
                            <div class="position-relative">
                                <i class="fal fa-user position-absolute p-3 text-primary"></i>
                                <select id="assign-role"
                                        class="pl-5 form-control form-control-lg font-italic text-3"
                                        v-model="userData.roles[0].id"
                                >
                                    <option v-for="role in roles" :value="role.id" :selected="role.id===userData.roles?.[0].id">{{role.name}}</option>
                                </select>
<!--                                <div class="text-left">-->
<!--                                    <div v-if="v$.roleId.$dirty">-->
<!--                                        <sub v-if="v$.roleId.$error"-->
<!--                                             class="px-2 py-2 text-danger">-->
<!--                                            Role Assigning Required-->
<!--                                        </sub>-->
<!--                                    </div>-->
<!--                                </div>-->
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
                                    v-model="userData.phone_number"
                                    @blur="v$.userData.phone_number.$touch()"
                                    placeholder="Phone Number"
                                />
                            </div>
                            <div class="text-left">
                                <div v-if="v$.userData.phone_number.$dirty">
                                    <sub v-if="v$.userData.phone_number.$error"
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
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Update
                            </button>
                            <button v-else @click.prevent="handleUpdateAgencyUser"
                                    type="submit"
                                    class="btn btn-primary text-white btn-modern test-fancy border-0 btn-color"
                            >
                                <i class="fal fa-fw fa-sign-in-alt mr-1"></i>Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref, watch} from "vue";
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import userService from "../../services/userService";
import {getAgencyUserById, getAllRoles} from "../../composables/user";
import {UserRoles} from "../../../constants";

export default {
    name: "EditAgencyUser",
    props:{
        slug:String,
        userId:Number
    },
    setup(props){
        const rolesData = getAllRoles();
        const roles = ref();
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
        const userData = getAgencyUserById(props.userId);
        const handleUpdateAgencyUser = () => {
            userService.handleUpdateAgencyUser({
                email: userData.value.email,
                phone_number: userData.value.phone_number,
                first_name: userData.value.first_name,
                last_name: userData.value.last_name,
                role_id: userData.value.roles?.[0].id,
            },props.userId);
        }

        const validationRules = computed(() => {
            return {
                userData:{
                    email: {
                        required,
                        email
                    },
                    first_name: {
                        required
                    },
                    last_name: {
                        required
                    },
                    phone_number: {
                        required
                    },
                },

            }
        });
        const v$ = useVuelidate(
            validationRules,
            {userData}
        );
        return {
            v$,
            userData,
            handleUpdateAgencyUser,
            roles,
        }
    }
}
</script>

<style scoped>

</style>
