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
import SearchBanner from "../../components/utilities/SearchBanner";
import BottomBanner from "../../components/utilities/BottomBanner";
import DisplayProperties from "../../components/property/DisplayProperties";
import {ref} from "vue";
export default {
    name: "Properties",
    components: {DisplayProperties, BottomBanner, SearchBanner},
    props:{
        slug:String,
    },
    setup(props){
        // const searchFilters = ref();
        // function handlePropertyFilters(params){
        //     searchFilters.value = params;
        // }
        return {
            // searchFilters,
            // handlePropertyFilters
        }
    }
}
</script>

<style scoped>
.select-test{
 height: 40px !important;

}
</style>
