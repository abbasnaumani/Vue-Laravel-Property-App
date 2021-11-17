<template>
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <upload-single-composition
                        @changed="handleImages"
                        v-model="dataFiles"
                        :max="1"
                        maxError="Max files exceed"
                        uploadMsg="upload product images"
                        fileError="images files only accepted"
                        clearAll="remove all images"
                    ></upload-single-composition>

                    <UploadImages
                        @changed="handleImages"
                        :max="3"
                        maxError="Max files exceed1"
                        uploadMsg="upload product images1"
                        fileError="images files only accepted1"
                        clearAll="remove all images"
                    ></UploadImages>
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
                        <upload-composition
                            @changed="handleImages"
                            :max="3"
                            maxError="Max files exceed"
                            uploadMsg="upload product images"
                            fileError="images files only accepted"
                            clearAll="remove all images"
                        ></upload-composition>
                        <div class="block-content block-content-full">
                            <p>Details can be here...</p>
                            <a class="btn" @click="toggleShow">set avatar</a>
                            <my-upload field="img"
                                       langType="en"
                                       @crop-success="cropSuccess"
                                       @crop-upload-success="cropUploadSuccess"
                                       @crop-upload-fail="cropUploadFail"
                                       v-model="show"
                                       :width="300"
                                       :height="300"
                                       url="/upload"
                                       :params="params"
                                       :headers="headers"
                                       img-format="png"></my-upload>
                            <img :src="imgDataUrl">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import myUpload from 'vue-image-crop-upload';
import UploadImages from "vue-upload-drop-images"
import {ref} from 'vue';
import appApi from "~/api/index";
import {ApiResponse} from "../../constants";
import {useToast} from "vue-toastification";
import errorHandlerService from "../../services/errorHandlerService";
import UploadComposition from "../UploadComposition";
import UploadSingleComposition from "../UploadSingleComposition";

export default {
    name: "UserDashboard",
    components: {
        UploadSingleComposition,
        UploadComposition,
        myUpload,
        UploadImages
    },
    setup() {
        const toast = useToast()
        const show = ref(false);
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

        // #######################3
        const handleImages = async (files) => {
            try {
                var formData = new FormData();
                formData.append("image", files[0],'test.png');
                const response = await appApi.post('/uploads', formData, {
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
            } catch (err) {
                console.log(err, "catch error");
                const error = await errorHandlerService.errors.index(err);
                toast.error(error.message);
            }
            //axios.post('upload_file', file, )
            /*
              [
                {
                    "name": "Screenshot from 2021-02-23 12-36-33.png",
                    "size": 319775,
                    "type": "image/png",
                    "lastModified": 1614080193596
                    ...
                },
                ...
                ]
             */
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
            dataFiles
        }

    },
}
</script>

<style scoped>
</style>
