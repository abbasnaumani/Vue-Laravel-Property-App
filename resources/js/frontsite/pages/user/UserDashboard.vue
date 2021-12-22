<template>
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <drop-zone v-model="dataFiles"></drop-zone>
                    <upload-list :items="dataFiles" :itemsProgress="fileProgress"></upload-list>
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Summary Overview</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option"
                                        data-toggle="block-option" data-action="state_toggle"
                                        data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import {ref} from 'vue';
import appApi from "~/api/index";
import {ApiResponse} from "../../../constants";
import {useToast} from "vue-toastification";
import errorHandlerService from "../../../admin/services/errorHandlerService";

import DropZone from "../dropzone/DropZone";
import UploadList from "../dropzone/UploadList";

export default {
    name: "UserDashboard",
    components: {
        UploadList,
        DropZone,
    },
    setup() {
        const toast = useToast()
        const show = ref(false);
        const fileProgress = ref([]);
        const dataFiles = ref([]);
        const imgDataUrl = ref('');
        const params = ref({
            token: '123456798',
            name: 'avatar'
        });
        const headers = ref({
            smail: '*_~'
        });
        const toggleShow = () => {
            show.value = !show.value;
        }
        /**
         * crop success
         *
         * [param] imgDataUrl
         * [param] field
         */
        const cropSuccess = (imgUrl, field) => {
            console.log('-------- crop success --------');
            imgDataUrl.value = imgUrl;
        }
        /**
         * upload success
         *
         * [param] jsonData  server api return data, already json encode
         * [param] field
         */
        const cropUploadSuccess = (jsonData, field) => {
            console.log('-------- upload success --------');
            console.log(jsonData);
            console.log('field: ' + field);
        }
        /**
         * upload fail
         *
         * [param] status    server api return error status, like 500
         * [param] field
         */
        const cropUploadFail = (status, field) => {
            console.log('-------- upload fail --------');
            console.log(status);
            console.log('field: ' + field);
        }

        // #######################
        const handleImages = async (files) => {
            try {
                for (let i = 0; i < files.length; i++) {
                    var formData = new FormData();
                    //console.log(`files`, files[i])
                    formData.append("images", files[i]);
                    const response = await appApi.post('/uploads', formData, {
                        onUploadProgress: async (progressEvent) => {
                            console.log('progressEvent', progressEvent);
                            const total = progressEvent.total;
                            const totalLength = progressEvent.lengthComputable ? total : null;
                            if (totalLength !== null) {
                                fileProgress.value[i] = Math.round(
                                    (Math.round(progressEvent.loaded * 100) / totalLength));
                            }
                        },
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    });
                    console.log('_________________________________________');
                    console.log(response);
                    if (response.data.status === ApiResponse.SUCCESS) {
                        toast.success("Image Uploaded!");
                    } else {
                        toast.error(response.data.message);
                    }
                }
            } catch (err) {
                console.log(err, "catch error");
                const error = await errorHandlerService.errors.index(err);
                toast.error(error.message);
            }
        }
        const handleNewFile = (newFile) => {
            console.log('newFile', newFile)
        }
        return {
            show,
            headers,
            imgDataUrl,
            params,
            toggleShow,
            cropSuccess,
            cropUploadSuccess,
            cropUploadFail,
            handleImages,
            dataFiles,
            fileProgress,
            handleNewFile
        }

    },
}
</script>

<style scoped>
</style>
