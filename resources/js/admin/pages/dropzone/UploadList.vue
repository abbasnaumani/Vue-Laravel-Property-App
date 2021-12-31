<template>
    <ul class="list">
        <li class="card mt-3" v-for="(file,index) in files" :key="index">
            <div class="row image-detail-item shadow-lg m-2">
                <div class="image-content position-relative col-12 col-md-2">
                    <figure v-if="getFileType(file.type)=='image'" class="card-figure">
                        <img :src="getFileImage(file)" @load="loadFileImage(file)" :alt="file.name"
                             height="150">
                    </figure>
                    <div class="image-text position-absolute right-10 bottom-0 m-1">
                        <span class="bg-dark text-white p-1 rounded">{{ getFileSize(file.size) }}</span>
                    </div>
                </div>
                <div class="image-detail col-12 col-md-10">
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
                <div class="image-action col-12 col-md-2 mt-4" v-if="action ==='edit' ">
                    <button class="btn btn-danger mx-2" @click.prevent="removeMedia(index)"><i class="far fa-trash-alt"></i>
                    </button>
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
    props: ['items','itemsProgress','action'],
    setup(props) {
        async function removeMedia(index) {
            props.items.splice(index,1)
        }
        return {
            removeMedia,
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
            console.log("uperuper", this.items);
            return this.items.reverse();
        },
    }
}
</script>

<style scoped>
.card-image{
    /*height: 100% !important;*/
    /*width: 100% !important;*/
}
.right-10 {
    right: 10px;
}
.bottom-0 {
    bottom: 0;
}
.image-text {
    font-size: 13px;
}
.image-content {
    /*padding: 0 !important;*/
    height: 150px;
    width: 250px;
}
.image-content img {
    width: 100%;
}
</style>
