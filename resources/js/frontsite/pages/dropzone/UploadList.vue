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
                <div class="image-detail col-12 col-md-8">
                    <div class="d-flex flex-column mt-md-4 mt-2">
                        <div>
                            <p class="font-weight-bold">{{ getFileName(file.name) }}</p>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-3 mt-lg-0 mt-2">
                                <div>Last Modified: {{ getFileDate(file.lastModified) }}</div>
                            </div>
                            <div class="col-12 col-lg-3 mt-lg-0 mt-2">
                                <div>File type:{{ getFileType(file.type, 'format') }}</div>
                            </div>
                            <div class="col-12 col-lg-3 mt-lg-0 mt-2">
                                <div>File progress:{{ file.progress || 0 }}</div>
                            </div>
                            <div class="col-12 col-lg-3 mt-lg-0 mt-2">
                                <div>File progress:{{ itemsProgress[index] || 0 }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-action col-12 col-md-2 mt-2 align-right mb-5 text-md-left text-center">
                    <button class="btn btn-danger mx-2 mt-md-5" @click.prevent="removeMedia(index)"><i class="far fa-trash-alt"></i>
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
} from '../../../utils/file';
import {useToast} from "vue-toastification";
const toast = useToast();

export default {
    name: "UploadList",
    props: ['items','itemsProgress'],
    setup(props) {
        async function removeMedia(index) {
            props.items.splice(index,1)
            toast.success("Media Deleted Successfully",)
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
            console.log("uperuper", this);
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
