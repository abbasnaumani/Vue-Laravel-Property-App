<template>
    <div class="container py-5">
        <div class="card shadow-sm login-card w-100 text-left mt-5">
            <div class="card-header bg-white border-bottom-0 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-normal text-7 mb-0">
                        <strong class="font-weight-extra-bold">User</strong>
                        Profile
                    </h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 mt-4 mt-lg-0">
                        <div class="d-flex justify-content-center mb-4">
                            <div class="profile-image-outer-container">
                                <div class="profile-image-inner-container bg-color-primary ">
                                    <img src="/assets/images/user-profile.png" class="rounded-circle  " height="210" width="210">
<!--                                    <img :src="'/'+property.media[0].disk+'/'+property.media[0].directory+'/'+property.media[0].filename+'.'+property.media[0].extension" :alt="property.media[0].filename">-->
                                    <span class="profile-image-button bg-color-dark">
                                        <i class="fas fa-camera text-light"></i>
                                    </span>
                                </div>
                                <drop-zone v-model="dataFiles" class="form-control profile-image-input "></drop-zone>

                            </div>
                        </div>
                    </div>
                    <form class="col-lg-9">
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">First name</label>
                        <div class="col-lg-9">
                            <input
                                type="text"
                                class="form-control text-3 h-auto py-2"
                                id="first_name"
                                v-model="profileData.first_name"
                                placeholder="First Name"
                                @blur="v$.profileData.first_name.$touch()"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.profileData.first_name.$dirty">
                                    <sub v-if="v$.profileData.first_name.$error"
                                         class="px-2 py-2 text-danger">
                                        First Name is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Last name</label>
                        <div class="col-lg-9">
                            <input
                                type="text"
                                class="form-control text-3 h-auto py-2"
                                id="last_name"
                                v-model="profileData.last_name"
                                placeholder="Last Name"
                                @blur="v$.profileData.last_name.$touch()"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.profileData.last_name.$dirty">
                                    <sub v-if="v$.profileData.last_name.$error"
                                         class="px-2 py-2 text-danger">
                                        Last Name is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Email</label>
                        <div class="col-lg-9">
                            <input
                                type="email"
                                class="form-control text-3 h-auto py-2"
                                id="email"
                                v-model="profileData.user_email"
                                placeholder="Email"
                                @blur="v$.profileData.user_email.$touch()"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.profileData.user_email.$dirty">
                                    <sub v-if="v$.profileData.user_email.$error"
                                         class="px-2 py-2 text-danger">
                                        Please enter a valid Email address
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2">Phone Number</label>
                        <div class="col-lg-9">
                            <input
                                type="tel"
                                class="form-control text-3 h-auto py-2"
                                id="phone"
                                v-model="profileData.phone_number"
                                @blur="v$.profileData.phone_number.$touch()"
                                placeholder="Phone Number"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.profileData.phone_number.$dirty">
                                    <sub v-if="v$.profileData.phone_number.$error"
                                         class="px-2 py-2 text-danger">
                                        Phone Number is Required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p class="mb-0 text-info font-italic">please enter your password to update the information</p>
                    </div>
                    <div class="col-lg-6 offset-3">
                        <input
                            type="password"
                            class="form-control text-3 h-auto py-2"
                            id="password"
                            v-model="profileData.password"
                            @blur="v$.profileData.password.$touch()"
                            placeholder="Password"
                        />
                        <div class="d-flex justify-content-start">
                            <div v-if="v$.profileData.password.$dirty">
                                <sub v-if="v$.profileData.password.$error"
                                     class="px-2 py-2 text-danger">
                                    Password is Required for updating profile
                                </sub>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button
                            v-if="v$.profileData.$invalid"
                            type="submit"
                            class="mt-3 btn btn-primary btn-modern float-end cursor-not-allowed"
                            disabled
                        >
                            <i class="fa fa-cloud mr-1"></i>Save
                        </button>
                        <button v-else @click.prevent="updateUserProfile"
                                type="submit"
                                class="mt-3 btn btn-primary btn-modern float-end"
                        >
                            <i class="fa fa-cloud-in-alt mr-1"></i>Save
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="card shadow-sm login-card w-100 text-left mt-5">
            <div class="card-header bg-white border-bottom-0 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-normal text-7 mb-0">
                        <strong class="font-weight-extra-bold">Update</strong>
                        Password
                    </h2>
                </div>
                <div class="overflow-hidden pt-3">
                    <p class="mb-0">Provide your current and new password to update.</p>
                </div>
            </div>
            <div class="card-body">

                <form>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Current
                            Password</label>
                        <div class="col-lg-9">
                            <input
                                type="password"
                                class="form-control text-3 h-auto py-2"
                                id="current-password"
                                v-model="passwordData.current_password"
                                @blur="v$.passwordData.current_password.$touch()"
                                placeholder="Current Password"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.passwordData.current_password.$dirty">
                                    <sub v-if="v$.passwordData.current_password.$error"
                                         class="px-2 py-2 text-danger">
                                        Old Password is required
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">New Password</label>
                        <div class="col-lg-9">
                            <input
                                type="password"
                                class="form-control text-3 h-auto py-2"
                                id="new-password"
                                v-model="passwordData.new_password"
                                @blur="v$.passwordData.new_password.$touch()"
                                placeholder="New Password"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.passwordData.new_password.$dirty">
                                    <sub v-if="v$.passwordData.new_password.$error"
                                         class="px-2 py-2 text-danger">
                                        New Password is Required (at-least 8 characters
                                        long)
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Confirm New
                            Password</label>
                        <div class="col-lg-9">
                            <input
                                type="password"
                                class="form-control text-3 h-auto py-2"
                                id="confirm-new-password"
                                v-model="passwordData.confirm_new_password"
                                @blur="v$.passwordData.confirm_new_password.$touch()"
                                placeholder="Confirm Password"
                            />
                            <div class="d-flex justify-content-start">
                                <div v-if="v$.passwordData.confirm_new_password.$dirty">
                                    <sub v-if="v$.passwordData.confirm_new_password.$error"
                                         class="px-2 py-2 text-danger">
                                        Please Enter confirm password same as password
                                    </sub>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button
                            v-if="v$.passwordData.$invalid"
                            type="submit"
                            class="btn btn-primary btn-modern float-end cursor-not-allowed"
                            disabled
                        >
                            <i class="fa fa-cloud mr-1"></i>Save
                        </button>
                        <button v-else @click.prevent="updatePassword"
                                type="submit"
                                class="btn btn-primary btn-modern float-end"
                        >
                            <i class="fa fa-cloud-in-alt mr-1"></i>Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, ref} from "vue";
import {email, minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import userService from "~/frontsite/services/userService";
import auth from "~/frontsite/services/authService";
import DropZone from "../../../admin/pages/dropzone/DropZone";
import UploadList from "../../../admin/pages/dropzone/UploadList";

export default {
    name: "UserProfile",
    components: {UploadList, DropZone},
    props:{
        slug:String
    },
    setup(props) {
        const dataFiles = ref([]);
        const fileProgress = ref([]);
        const profileData = ref({
            user_email:auth.user().email,
            phone_number:auth.user().phone_number,
            first_name:auth.user().first_name,
            last_name:auth.user().last_name,
            password:''
        });
        const passwordData = ref({
            current_password: '',
            new_password: '',
            confirm_new_password: ''
        });

        const updatePassword = () => {
            userService.updatePassword({
                password_data:passwordData.value
            });
        }
        const updateUserProfile = () => {
            userService.updateUserProfile({
                profile_data:profileData.value
            });
        }
        const validationRules = computed(() => {
            return {
               profileData:{
                   user_email: {
                       required,
                       email
                   },
                   password: {
                       required,
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
                passwordData:{
                    current_password: {
                        required,
                    },
                    new_password: {
                        required,
                        minLength: minLength(8)
                    },
                    confirm_new_password: {
                        required,
                        sameAsPassword: sameAs(passwordData.value.new_password),
                    }
                }
            }
        });
        const v$ = useVuelidate(
            validationRules,
            {
                profileData,
                passwordData
            }
        );
        return {
            v$,
            dataFiles,
            fileProgress,
            profileData,
            passwordData,
            updateUserProfile,
            updatePassword

        }
    }
}
</script>

<style scoped>
.cursor-not-allowed {
    cursor: not-allowed;
}

</style>
