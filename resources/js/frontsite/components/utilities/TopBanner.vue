<template>
    <section class="top-banner border-0 mt-5">
        <div class="container py-4 position-relative z-index-2 py-3">
            <div class="row py-4 d-flex flex-wrap-reverse align-items-center">
                <div class="col-md-8 order-2 order-md-1 d-flex align-self-center py-4 mt-2 justify-content-md-start justify-content-sm-center justify-content-center">
                    <div class="main-heading text-lg-start">
                        <h2 class="font-weight-extra-bold letter-spacing text-light mb-0">{{ pageName }}</h2>
                    </div>
                </div>
                <div class="col-md-4 order-2 order-md-1 d-flex align-self-center py-4 mt-2 justify-content-md-end justify-content-sm-center justify-content-center">
                    <div class="main-links">
                        <ul class="list-unstyled text-white">
                            <li><span class="text-4" style="font-size:11.5px;">HOME</span> <span class="text-4" style="opacity: 0.6;font-size:11.5px;"> >
                                {{link}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "TopBanner",
    props:{
        pageName:String,
        link:String
    },
    setup(){
        return{
        }
    }
}
</script>

<style scoped>

</style>
