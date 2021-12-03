<template>
    <ul class="list">
        <li class="card" v-for="(file,index) in files" :key="index">
<!--            <figure v-if="getFileType(file.type)=='image'" class="card-figure">
                <img :src="getFileImage(file)" @load="loadFileImage(file)" :alt="file.name"
                     width="200" height="200"
                     class="card-image">
                <figcaption class="card-caption">{{ getFileSize(file.size) }}</figcaption>
            </figure>-->
            <div class="card-body">
                <h4 class="title">{{ getFileName(file.name) }}</h4>
                <div class="flex justify-content-between secondary:text bottom:margin-2">
                    <div>Last Modified: {{ getFileDate(file.lastModified) }}</div>
                    <div>File type:{{ getFileType(file.type, 'format') }}</div>
                    <div>File progress:{{ file.progress || 0 }}</div>
                    <div>File progress:{{ itemsProgress[index] || 0 }}</div>
                </div>
            </div>
            <div class="image-detail-item border border-dark shadow-lg mb-4 bg-white row ">
                <div class="image-content position-relative col-sm-12 col-md-4">
                    <figure v-if="getFileType(file.type)=='image'" class="card-figure">
                        <img :src="getFileImage(file)" @load="loadFileImage(file)" :alt="file.name"
                             width="150" height="150">

                        <figcaption class="card-caption">{{ getFileSize(file.size) }}</figcaption>
                    </figure>
                    <div class="image-text position-absolute right-0 bottom-0 m-1">
                        <span class="bg-dark text-white p-1 rounded">{{ getFileSize(file.size) }}</span>
                    </div>
                </div>
                <div class="image-detail col-sm-12 col-md-8">
                    <div class="d-flex flex-column">
                        <div>
                            <p class="font-weight-bold">{{ getFileName(file.name) }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Last Modified: {{ getFileDate(file.lastModified) }}</span>
                            <span>File type:{{ getFileType(file.type, 'format') }}</span>
                            <span>File progress:{{ file.progress || 0 }}</span>
                            <span>File progress:{{ itemsProgress[index] || 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
import {
    getFileSize,
    getFileName,
    getFileType,
    getFileDate,
    getFileImage,
    loadFileImage,
    formatFileSize,
    humanFileSize
} from '../../utils/file';

export default {
    name: "UploadList",
    props: ['items','itemsProgress'],
    setup() {
        return {
            getFileSize,
            getFileName,
            getFileType,
            getFileDate,
            getFileImage,
            loadFileImage,
            formatFileSize,
            humanFileSize
        }
    },
    computed: {
        files() {
            console.log("uperuper", this);
            return this.items.reverse();
        }
    }
}
</script>

<style scoped>
.card-image{
    /*height: 100% !important;*/
    /*width: 100% !important;*/
}
.right-0 {
    right: 0;
}
.bottom-0 {
    bottom: 0;
}
.image-text {
    font-size: 13px;
}
.image-content {
    padding: 0 !important;
    height: 150px;
    width: 150px;
}
</style>
