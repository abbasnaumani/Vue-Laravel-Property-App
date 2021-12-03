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
                    <div>File progress:{{ file.progress || 0 }}</div>
                    <div>File progress:{{ itemsProgress[index] || 0 }}</div>
                </div>
            </div>
        </li>
        <li class="card" v-for="(media,index) in mediaFiles" :key="index">
            <figure v-if="media.aggregate_type=='image'" class="card-figure">
                <img :src="'/'+media.disk+'/'+media.directory+'/'+media.filename+'.'+media.extension"  :alt="media.filename"
                     width="200" height="200"
                     class="card-image">
                <figcaption class="card-caption">{{ getFileSize(media.size) }}</figcaption>
            </figure>
            <div class="card-body">
                <h4 class="title">{{ getFileName(media.filename) }}</h4>
                <div class="flex justify-content-between secondary:text bottom:margin-2">
                    <div>Last Modified: {{ getFileDate(media.updated_at) }}</div>
                    <div>File type:{{ media.mime_type }}</div>
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
    props: ['items','itemsProgress','propertyMedia'],
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
        },
        mediaFiles() {
            console.log("propertyMedia", this);
            if(this.propertyMedia)
            return this.propertyMedia.reverse();
        }
    }
}
</script>

<style scoped>

</style>
