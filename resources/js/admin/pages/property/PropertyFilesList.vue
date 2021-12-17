<template>
    <ul class="list">
        <li class="card mt-3" v-for="(media,index) in mediaFiles" :key="index">
            <div class="row image-detail-item shadow-lg m-2">
                <div class="image-content position-relative col-12 col-md-2">
                    <figure v-if="media.aggregate_type=='image'" class="card-figure">
                        <img :src="'/'+media.disk+'/'+media.directory+'/'+media.filename+'.'+media.extension" :alt="media.filename"
                             height="150">
                    </figure>
                    <div class="image-text position-absolute right-10 bottom-0 m-1">
                        <span class="bg-dark text-white p-1 rounded">{{ getFileSize(media.size) }}</span>
                    </div>
                </div>
                <div class="image-detail col-12 col-md-10">
                    <div class="d-flex flex-column">
                        <div>
                            <p class="font-weight-bold">{{ media.filename }}</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Last Modified: {{ getFileDate(media.updated_at) }}</span>
                            <span>File type:{{ media.mime_type }}</span>
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
    getFileDate,
} from '../../utils/file';
export default {
    name: "PropertyFilesList",
    props: ['propertyMedia'],
    setup(){
        return{
            getFileSize,
            getFileDate
        }
    },
    computed: {
        mediaFiles() {
            if(this.propertyMedia)
                return this.propertyMedia.reverse();
        }
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
