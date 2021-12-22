<template>
    <!-- Carousel -->
    <section class="crousal-section">
        <div class="main-crousal">
            <div class="slider">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active test"></li>
                        <li data-target="#demo" data-slide-to="1" class="test"></li>
                        <li data-target="#demo" data-slide-to="2" class="test"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="imggg" src="/assets/images/img-1.jpg" alt="Los Angeles" height="700" width="100%">
                            <div class="carousel-caption d-flex justify-content-start card-animation">
                                <!-- slider card  -->
                                <div class="container">
                                    <div class="d-flex justify-content-end align-items-start">
                                        <div class="card text-dark overflow z-index-1 slider-card" style="width:350px">
                                            <div class="card-header bg-white">
                                                <h4 class="py-3 font-weight-bold">$ 1.250.000</h4>
                                            </div>
                                            <div class="card-body">
                                                <div
                                                    class="bg-success text-white w-75 rotate d-flex justify-content-center align-items-center">
                                                    <span class="font-weight-bold">Featured</span>
                                                </div>
                                                <div class="py-1">
                                                    <h3 class="font-weight-bold">South Miami</h3>
                                                    <div class="py-2 d-flex flex-wrap justify-content-between">
                                                        <div class="text-secondary font-weight-bold">BEDS:2</div>
                                                        <div class="text-secondary font-weight-bold">BATHS:3</div>
                                                        <div class="text-secondary font-weight-bold">SQ
                                                            FT:500</div>
                                                    </div>
                                                </div>
                                                <div class="py-3 width">
                                                    <button type="button" class="btn btn-md btn-block btn-color">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center py-3 text-white">
                                                            <div class="px-4 font-weight-bold">
                                                                View Property
                                                            </div>
                                                            <div class="px-3 font-weight-bold">
                                                                <i class="fal fa-long-arrow-right"></i>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="imggg" src="/assets/images/img-2.jpg" alt="Chicago" height="700" width="100%">
                            <div class="carousel-caption d-flex justify-content-end align-items-start card-animation-second">
                                <!-- slider card  -->
                                <div class="container">
                                    <div class="d-flex justify-content-start align-items-start  overflow-hidden">
                                        <div class="card text-dark overflow z-index-1" style="width:350px">
                                            <div class="card-header bg-white">
                                                <h4 class="py-3 font-weight-bold">$ 1.250.000</h4>
                                            </div>
                                            <div class="card-body">
                                                <div
                                                    class="bg-success text-white w-75 rotate d-flex justify-content-center align-items-center">
                                                    <span class="font-weight-bold">Featured</span>
                                                </div>
                                                <div class="py-1">
                                                    <h3 class="font-weight-bold">South Miami</h3>
                                                    <div class="py-2 d-flex flex-wrap justify-content-between">
                                                        <div class="text-secondary font-weight-bold">BEDS:2</div>
                                                        <div class="text-secondary font-weight-bold">BATHS:3</div>
                                                        <div class="text-secondary font-weight-bold">SQ
                                                            FT:500</div>
                                                    </div>
                                                </div>
                                                <div class="py-3 width">
                                                    <button type="button" class="btn btn-md btn-block btn-color">
                                                        <div
                                                            class="d-flex justify-content-between align-items-center text-white py-3">
                                                            <div class="px-4 font-weight-bold">
                                                                View Property
                                                            </div>
                                                            <div class="px-3 font-weight-bold">
                                                                <i class="fal fa-long-arrow-right"></i>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span><i class="fas fa-angle-left icon"></i></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span><i class="fas fa-angle-right icon"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
export default {
    name: "Carousel"
}
</script>

<style scoped>

</style>
