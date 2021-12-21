<template>
    <div class="modal fade" id="modal-block-small" tabindex="-1" aria-labelledby="modal-block-small"
         style="display: none;" aria-hidden="true"
         v-show="open" role="dialog"
         :class="{'d-block show': open}"
    >
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-transparent mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">{{ title }}</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                    v-on:click="$emit('cancel')" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm">
                        <p> Please Enter Password to update profile</p>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label line-height-9 pt-2 text-2 required">Password</label>
                        <div class="col-lg-9">
                            <input
                                type="password"
                                class="form-control text-3 h-auto py-2"
                                id="password"
                                v-model="password"
                                @blur="v$.password.$touch()"
                                placeholder="Password"
                            />
                        </div>
                        <div class="text-left">
                            <div v-if="v$.password.$dirty">
                                <sub v-if="v$.password.$error"
                                     class="px-2 py-2 text-danger">
                                    Password is Required
                                </sub>
                            </div>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-end bg-body">
                        <button v-if="cancelLabel" type="button" class="btn btn-sm btn-alt-secondary me-1"
                                v-on:click="$emit('cancel')"
                                data-dismiss="modal">{{ cancelLabel }}
                        </button>
                        <span v-if="confirmLabel">
                       <button
                           v-if="(isLoading || isConfirmButtonDisabled)"
                           disabled
                           class="btn btn-sm btn-primary"
                           :class="{'opacity-50 cursor-not-allowed pointer-events-none': (isLoading || isConfirmButtonDisabled)}">
                           {{ confirmLabel }}
                       </button>
                        <button v-else v-on:click="$emit('confirm')" type="button"
                                :class="{
                        'bg-primary':icon=='',
                        'bg-success': icon=='success' || icon=='user',
                        'bg-danger': icon=='warning',
                        'bg-warning': icon=='copy',
                        'bg-gray-700': isLoading || isConfirmButtonDisabled,
                        'cursor-wait':isLoading
                        }"
                                class="btn btn-sm btn-primary">
                    {{ confirmLabel }}
                       </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";

export default {
    name: "PasswordModal",
    props: {
        open: {
            type: Boolean,
            default: false
        },
        config: Object,
        title: String,
        confirmLabel: String,
        cancelLabel: String,
        icon: String,
        isLoading: {
            type: Boolean,
            default: false
        },
        isConfirmButtonDisabled: {
            type: Boolean,
            default: false
        },
        emits: ['confirm', 'cancel'],
        setup() {
            const password = ref('');
            return {
                password,
            }
        }
    },
}
</script>

<style scoped>
div.modal.show {
    background-color: rgba(0, 0, 0, 0.51);
}
</style>
