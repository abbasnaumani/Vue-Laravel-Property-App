<template>
    <AppModal
        :open="openConfirmImageModal"
        confirmLabel="Image Property?"
        cancelLabel="Cancel"
        title="Confirm Property Images"
        icon="warning"
        modalClass="modal-lg"
        :isConfirmButtonDisabled="isConfirmButtonDisabled"
        v-on:confirm="modalConfirmPropertyImage"
        v-on:cancel="$emit('cancel')"
    >
        <div class="py-2 row">
            <div class="form-group col-10 offset-1">
                <drop-zone v-model="dataFiles" :isMultiple="true"></drop-zone>
            </div>
        </div>
        <div class="py-2 row">
            <div class="form-group w-100 px-3">
                <upload-list :items="dataFiles" :itemsProgress="fileProgress"></upload-list>
            </div>
        </div>
    </AppModal>
</template>

<script>
import AppModal from "../../../frontsite/components/ui/base/AppModal";
import DropZone from "../../../frontsite/pages/dropzone/DropZone";
import UploadList from "../../../frontsite/pages/dropzone/UploadList";
import {ref} from "vue";

export default {
    name: "PropertyImagesModal",
    components: {UploadList, DropZone, AppModal},
    props:{
        openConfirmImageModal:{
            default:false,
            type:Boolean
        }
    },
    setup(props,{emit}) {
        const confirmationMessage = ref();
        const isConfirmButtonDisabled = ref(false);
        const modalProperty = ref();
        const dataFiles = ref([]);
        const fileProgress = ref([]);
        async function modalConfirmPropertyImage() {
            emit('openConfirmImageModal', false);
            emit('handlePropertyImages', {dataFiles, fileProgress});
        }
        return {
            confirmationMessage,
            isConfirmButtonDisabled,
            modalProperty,
            dataFiles,
            fileProgress,
            modalConfirmPropertyImage

        }
    }
}
</script>

<style scoped>

</style>
