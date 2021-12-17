<template>
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div
                        class="container"
                        @dragover.prevent="dragOver"
                        @dragleave.prevent="dragLeave"
                        @drop.prevent="drop($event)"
                    >
                        <div class="drop" v-show="dropped == 2"></div>
                        <!-- Error Message -->
                        <div v-show="error" class="error">
                            {{ error }}
                        </div>

                        <!-- To inform user how to upload image -->
                        <div v-show="Imgs.length == 0" class="beforeUpload">
                            <input
                                type="file"
                                style="z-index: 1"
                                accept="image/*"
                                ref="uploadInput"
                                @change="previewImgs"
                                multiple
                            />
                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <title>Upload Image</title>
                                <g id="Upload_Image" data-name="Upload Image">
                                    <g id="_Group_" data-name="&lt;Group&gt;">
                                        <g id="_Group_2" data-name="&lt;Group&gt;">
                                            <g id="_Group_3" data-name="&lt;Group&gt;">
                                                <circle
                                                    id="_Path_"
                                                    data-name="&lt;Path&gt;"
                                                    cx="18.5"
                                                    cy="16.5"
                                                    r="5"
                                                    style="
                    fill: none;
                    stroke: #303c42;
                    stroke-linecap: round;
                    stroke-linejoin: round;
                  "
                                                />
                                            </g>
                                            <polyline
                                                id="_Path_2"
                                                data-name="&lt;Path&gt;"
                                                points="16.5 15.5 18.5 13.5 20.5 15.5"
                                                style="
                  fill: none;
                  stroke: #303c42;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                "
                                            />
                                            <line
                                                id="_Path_3"
                                                data-name="&lt;Path&gt;"
                                                x1="18.5"
                                                y1="13.5"
                                                x2="18.5"
                                                y2="19.5"
                                                style="
                  fill: none;
                  stroke: #303c42;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                "
                                            />
                                        </g>
                                        <g id="_Group_4" data-name="&lt;Group&gt;">
                                            <polyline
                                                id="_Path_4"
                                                data-name="&lt;Path&gt;"
                                                points="0.6 15.42 6 10.02 8.98 13"
                                                style="
                  fill: none;
                  stroke: #303c42;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                "
                                            />
                                            <polyline
                                                id="_Path_5"
                                                data-name="&lt;Path&gt;"
                                                points="17.16 11.68 12.5 7.02 7.77 11.79"
                                                style="
                  fill: none;
                  stroke: #303c42;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                "
                                            />
                                            <circle
                                                id="_Path_6"
                                                data-name="&lt;Path&gt;"
                                                cx="8"
                                                cy="6.02"
                                                r="1.5"
                                                style="
                  fill: none;
                  stroke: #303c42;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                "
                                            />
                                            <path
                                                id="_Path_7"
                                                data-name="&lt;Path&gt;"
                                                d="M19.5,11.6V4A1.5,1.5,0,0,0,18,2.5H2A1.5,1.5,0,0,0,.5,4V15A1.5,1.5,0,0,0,2,16.5H13.5"
                                                style="
                  fill: none;
                  stroke: #303c42;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                "
                                            />
                                        </g>
                                    </g>
                                </g>
                            </svg>

                            <p class="mainMessage">
                                {{
                                uploadMsg ? uploadMsg
                                : "Click to upload or drop your images here"
                                }}
                            </p>
                        </div>
                        <div class="imgsPreview" v-show="Imgs.length > 0">
                            <button type="button" class="clearButton" @click="reset">
                                {{ clearAll ? clearAll : "clear All" }}
                            </button>
                            <div class="imageHolder" v-for="(img, i) in Imgs" :key="i">
                                <img :src="img"/>
                                <span class="delete" style="color: white"
                                      @click="deleteImg(--i)">
                                    <svg
                                        class="icon"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                        />
                                    </svg>
                                </span>
                                <div class="plus" @click="append" v-if="++i == Imgs.length">+</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import {ref, onMounted, watchEffect} from "vue";

export default {
    name: "UploadComposition",
    props: {
        max: Number,
        uploadMsg: String,
        maxError: String,
        fileError: String,
        clearAll: String,
    },
    setup(props, {emit}) {
        const uploadInput = ref(null);
        const error = ref("");
        const dropped = ref(0);
        const files = ref([]);
        const Imgs = ref([]);
        const dragOver = () => {
            dropped.value = 2;
        }
        const dragLeave = () => {
            dropped.value = 0;
        }
        const drop = (e) => {
            let status = true;
            let filesArray = Array.from(e.dataTransfer.files)
            if (e && filesArray) {
                filesArray.forEach((file) => {
                    if (file.type.startsWith("image") === false) {
                        status = false;
                    }
                });
                if (status == true) {
                    if (
                        props.max &&
                        filesArray.length + files.value.length > props.max
                    ) {
                        error.value = props.maxError
                            ? props.maxError
                            : `Maximum files is` + props.max;
                    } else {
                        files.value.push(...filesArray);
                        previewImgs();
                    }
                } else {
                    error.value = props.fileError
                        ? props.fileError
                        : `Unsupported file type`;
                }
            }
            dropped.value = 0;
        }
        const append = () => {
            uploadInput.value.click();
        }
        const readAsDataURL = (file) => {
            return new Promise(function (resolve, reject) {
                let fr = new FileReader();
                fr.onload = function () {
                    resolve(fr.result);
                };
                fr.onerror = function () {
                    reject(fr);
                };
                fr.readAsDataURL(file);
            });
        }
        const deleteImg = (index) => {
            Imgs.value.splice(index, 1);
            files.value.splice(index, 1);
            emit("changed", files.value);
            uploadInput.value = null;
        }
        const previewImgs = (event) => {
            if (
                props.max &&
                event &&
                event.currentTarget.files.length + files.value.length > props.max
            ) {
                error.value = props.maxError
                    ? props.maxError
                    : `Maximum files is` + props.max;
                return;
            }
            if (dropped.value == 0) {
                files.value.push(...event.currentTarget.files);
            }
            error.value = "";
            emit("changed", files.value);
            let readers = [];
            if (!files.value.length) {
                return;
            }
            for (let i = 0; i < files.value.length; i++) {
                readers.push(readAsDataURL(files.value[i]));
            }
            Promise.all(readers).then((values) => {
                Imgs.value = values;
                console.log(values,'++++++++++++++++++++++++++++')
            });
        }
        const reset = () => {
            uploadInput.value = null;
            Imgs.value = [];
            files.value = [];
            emit("changed", files.value);
        }

        return {
            error,
            files,
            dropped,
            Imgs,
            dragOver,
            dragLeave,
            drop,
            append,
            readAsDataURL,
            deleteImg,
            previewImgs,
            reset,
            uploadInput
        }
    },
}
</script>

<style scoped>
.container {
    width: 100%;
    height: 100%;
    background: #f7fafc;
    border: 0.5px solid #a3a8b1;
    border-radius: 10px;
    padding: 30px;
    position: relative;
}

.drop {
    width: 100%;
    height: 100%;
    top: 0;
    border-radius: 10px;
    position: absolute;
    background-color: #f4f6ff;
    left: 0;
    border: 3px dashed #a3a8b1;
}

.error {
    text-align: center;
    color: red;
    font-size: 15px;
}

.beforeUpload {
    position: relative;
    text-align: center;
}

.beforeUpload input {
    width: 100%;
    margin: auto;
    height: 100%;
    opacity: 0;
    position: absolute;
    background: red;
    display: block;
}

.beforeUpload input:hover {
    cursor: pointer;
}

.beforeUpload .icon {
    width: 150px;
    margin: auto;
    display: block;
}

.imgsPreview .imageHolder {
    width: 150px;
    height: 150px;
    background: #fff;
    position: relative;
    border-radius: 10px;
    margin: 5px 5px;
    display: inline-block;
}

.imgsPreview .imageHolder img {
    object-fit: cover;
    width: 100%;
    height: 100%;
}

.imgsPreview .imageHolder .delete {
    position: absolute;
    top: 4px;
    right: 4px;
    width: 29px;
    height: 29px;
    color: #fff;
    background: red;
    border-radius: 50%;
}

.imgsPreview .imageHolder .delete:hover {
    cursor: pointer;
}


.imgsPreview .imageHolder .plus {
    color: #2d3748;
    background: #f7fafc;
    border-radius: 50%;
    font-size: 21pt;
    height: 30px;
    width: 30px;
    text-align: center;
    border: 1px dashed;
    line-height: 23px;
    position: absolute;
    right: -42px;
    bottom: 43%;
}

.plus:hover {
    cursor: pointer;
}

.clearButton {
    color: #2d3748;
    position: absolute;
    top: 7px;
    right: 7px;
    background: none;
    border: none;
    cursor: pointer;
}
</style>
