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
                                <div class="py-3" v-if="usersData">
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            class="form-control form-control-lg form-control-alt"
                                            id="first_name"
                                            v-model="usersData.first_name"
                                            placeholder="First Name"
                                            @blur="v$.usersData.first_name.$touch()"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.usersData.first_name.$dirty">
                                            <sub v-if="v$.usersData.first_name.$error"
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
                                            v-model="usersData.last_name"
                                            placeholder="Last Name"
                                            @blur="v$.usersData.last_name.$touch()"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.usersData.last_name.$dirty">
                                            <sub v-if="v$.usersData.last_name.$error"
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
                                            v-model="usersData.email"
                                            placeholder="Email"
                                            @blur="v$.usersData.email.$touch()"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.usersData.email.$dirty">
                                            <sub v-if="v$.usersData.email.$error"
                                                 class="px-2 py-2 text-danger">
                                                Please enter a valid Email address
                                            </sub>
                                        </div>
                                    </div>
                                    <div class="form-group" v-if="roles && auth.user()?.roles?.[0].id !== usersData.roles?.[0].id">
                                        <label>&nbsp Assign Role</label>
                                        <select id="assign-role"
                                                class="form-control form-control-lg form-control-alt"
                                                v-model="roleId"
                                        >
                                            <option v-for="role in roles" :value="role.id" :selected="role.id === roleId" >{{role.name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="tel"
                                            class="form-control form-control-lg form-control-alt"
                                            id="phone"
                                            v-model="usersData.phone_number"
                                            @blur="v$.usersData.phone_number.$touch()"
                                            placeholder="Phone Number"
                                        />
                                    </div>
                                    <div class="text-left">
                                        <div v-if="v$.usersData.phone_number.$dirty">
                                            <sub v-if="v$.usersData.phone_number.$error"
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
                                        <button v-else @click.prevent="handleUpdateAgencyUser"
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
import {getAllRoles} from "../../composables/user";
import userService from "../../services/userService";
import {email, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {UserRoles} from "../../../constants";
import auth from "../../../frontsite/services/authService";


export default {
    name: "EditAgencyUser",
    props:{
        userId: Number
    },
    setup(props){

        const roleId = ref();
        const usersData = ref([]);
        const roles = ref();
        const rolesData = getAllRoles();
        getAgencyUserById(props.userId);

        watch(rolesData,()=>{
            if(rolesData.value) {
                if(auth.user()?.roles?.[0].id === UserRoles.SUPER_ADMIN) {
                    roles.value = rolesData.value.filter(function (role) {
                        return role.id !== UserRoles.SUPER_ADMIN;
                    })
                }else if (auth.user()?.roles?.[0].id === UserRoles.ADMIN){
                    roles.value = rolesData.value.filter(function (role) {
                        return role.id !== UserRoles.SUPER_ADMIN && role.id !== UserRoles.ADMIN;
                    })
                }
            }
        },{
            deep:true,
            immediate:true
        });
        async function getAgencyUserById(userId) {
            usersData.value = await userService.getAgencyUserById(userId);
            roleId.value = usersData.value.roles?.[0].id
            return usersData.value
        }

        const handleUpdateAgencyUser = () => {
            userService.handleUpdateAgencyUser({
                email: usersData.value.email,
                phone_number: usersData.value.phone_number,
                first_name: usersData.value.first_name,
                last_name: usersData.value.last_name,
                role_id: roleId.value,
            },props.userId);
        }

        const validationRules = computed(() => {
            return {
                usersData:{
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
                roleId: {
                    required
                },

            }
        });
        const v$ = useVuelidate(
            validationRules,
            {usersData,roleId}
        );
        return {
            v$,
            handleUpdateAgencyUser,
            roles,
            usersData,
            roleId,
            UserRoles,
            auth
        }
    }
}
</script>

<style scoped>

</style>
