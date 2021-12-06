<template>
    <main id="main-container">
        <div class="content">
            <div class="row">
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
                            <div id="property-dashboard-section" class="block block-rounded">
                                <div class="block-header">
                                    <h3 class="block-title">Search Property</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <input list="browsers" name="browser" id="browser">
                                    <datalist id="browsers">
                                        <option v-for="location in locations">{{location.name}}</option>
                                    </datalist>
                                    <br>
                                    <select data-show-subtext="true" data-live-search="true"
                                            >
                                        <option v-for="location in locations">{{location.name}}</option>
                                    </select>
                                    <br>
                                    <div class="dropdown">
                                        <button @click="myFunction" class="dropbtn">Dropdown</button>
                                        <div id="myDropdown" class="dropdown-content" v-if="locations">
                                            <input type="text" placeholder="Search.." id="myInput" @keyup="filterFunction">
                                            <router-link to="" v-for="location in locations">{{location.name}}</router-link>
                                        </div>
                                        <br>
                                        <br>
                                        <Select2  v-if="options"
                                            v-model="myValue"
                                                 :options="myOptions"
                                                 :settings="{ settingOption: value, settingOption: value }"
                                                 @change="myChangeEvent($event)"
                                                 @select="mySelectEvent($event)"
                                        />
                                        <h4>Value: {{ myValue }}</h4>
<!--                                        <Select2 v-model="myValue" :options="myOptions" :settings="{ settingOption: value, settingOption: value }" @change="myChangeEvent($event)" @select="mySelectEvent($event)" />-->
<!--                                        <h4>Value: {{ myValue }}</h4>-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import {ref, computed, watchEffect} from 'vue'
import Select2 from 'vue3-select2-component';
import {getAllLocationsByCItyId} from "../../composables/country";

export default {
    name: "SearchProperty",
    components:{
        Select2
    },
    setup(){
        const locations = getAllLocationsByCItyId() (4);
        const myValue = ref('');
       function myChangeEvent(val){
            console.log(val);
        }
        function  mySelectEvent({id, text}){
            console.log({id, text})
        }
        const options = getAllLocationsByCItyId(4);
        const myOptions = ref([]);
        const model = ref();

        watchEffect(()=>{
            if(options.value){
                myOptions.value = [];
                model.value = options.value[0];
                options.value.forEach(function (option){
                    myOptions.value = [{id:option.id,text:option.name},...myOptions.value];

                })
            }
        })

        const searchInput = ref('')
        const handleSearchInput = event => {
            searchInput.value = event.target.value.toLowerCase();
        }
        const visibleOptions = computed(() => {
            const re = new RegExp(searchInput.value)
            if(options.value) {
                return options.value.filter(option => re.test(option.name.toLowerCase()))
            }else{
                return null;
            }

        })

        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
           let div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
               let txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        return{
            locations,
            myFunction,
            filterFunction,

            model,
            options,
            handleSearchInput,
            visibleOptions,

            myChangeEvent,
            mySelectEvent,
            myValue,
            myOptions
        }
    }
}
</script>

<style scoped>
.dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

#myInput {
    box-sizing: border-box;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
    border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
