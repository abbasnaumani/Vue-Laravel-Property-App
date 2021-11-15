<template>
    <main id="main-container">
        <div class="content">
            <div class="row">
                <handy-uploader
                    :documentAttachment.sync="handyAttachments"
                    :fileUploaderType= "'simple'"
                    :maxFileSize= "10240"
                    :imageCompressor= "true"
                    :imageCompressLevel= "0.8"
                    :maxFileCount= "10"
                    :badgeCounter= "true"
                    :thumb= "false"
                    :changeFileName="true"
                    :addFileDescription="true"
                    :addFileTag="true"
                    :tags= "['Tag 1', 'Tag 2', 'Tag 3', 'Tag 4']"
                >
                </handy-uploader>
                <div class="col-12">
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
import handyUploader from 'handy-uploader/src/components/handyUploader';
import {ref} from 'vue';

export default {
    name: "UserDashboard",
    setup() {
        const show = ref(false);
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
        const handyAttachments = ref([]);
        return {
            show,
            headers,
            imgDataUrl,
            params,
            toggleShow,
            cropSuccess,
            cropUploadSuccess,
            cropUploadFail,
            handyAttachments
        }

    },

    components: {
        myUpload,
        handyUploader
    },
}
</script>

<style scoped>
</style>
