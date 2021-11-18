<template>
    <ul class="list">
        <li class="card" v-for="(file,index) in files" :key="index">
            <figure v-if="getFileType(file.type)=='image'" class="card-figure">
                <img :src="getFileImage(file)" @load="loadFileImage(file)" :alt="file.name"
                     width="200" height="200"
                     class="card-image">
                <figcaption class="card-caption">{{ getFileSize(file.size) }}</figcaption>
            </figure>
            <div class="card-body">
                <h4 class="title">{{ getFileName(file.name) }}</h4>
                <div class="flex justify-content-between secondary:text bottom:margin-2">
                    <div>Last Modified: {{ getFileDate(file.lastModified) }}</div>
                    <div>File type:{{ getFileType(file.type, 'format') }}</div>
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
    props: ['items'],
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
            return this.items.reverse();
        }
    }
}
</script>

<style scoped>

</style>
