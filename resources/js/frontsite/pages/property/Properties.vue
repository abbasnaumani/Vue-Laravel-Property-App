<template>
   <search-banner></search-banner>
    <section class="main">
        <div class="main-content">
            <div class="container py-5 my-3">
                <div class="col">
                    <h2 class="mb-4 font-weight-bold letter-spacing">
                        Listing for <span class="text-blue-heading">Sale</span> or <span
                        class="text-blue-heading">Rent</span>
                    </h2>
                    <display-properties :slug="slug"></display-properties>
                </div>
            </div>
        </div>
    </section>
   <bottom-banner></bottom-banner>
</template>

<script>
import FrontHeader from "../../components/ui/base/Header";
import FrontFooter from "../../components/ui/base/Footer";
import {ref, watchEffect} from "vue";
import Select2 from "vue3-select2-component";
import {getAllLocationsByCItyId} from "../../composables/country";
import SearchBanner from "../../components/utilities/SearchBanner";
import BottomBanner from "../../components/utilities/BottomBanner";
import DisplayProperties from "../../components/property/DisplayProperties";
export default {
    name: "Properties",
    components: {DisplayProperties, BottomBanner, SearchBanner, FrontFooter, FrontHeader,Select2},
    props:{
        slug:String,
    },
    setup(props){
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
        function myChangeEvent(val){
            console.log(val);
        }
        function  mySelectEvent({id, text}){
            console.log({id, text})
        }

        return {
            options,
            myOptions,
            myChangeEvent,
            mySelectEvent,
            model,
        }
    }
}
</script>

<style scoped>
.select-test{
 height: 40px !important;

}
</style>
