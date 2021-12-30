<?php include "header.php" ?>
<section class="main-gallery">
    <div class="main-gallery-wrapper">
        <div class="container py-3">
            <div class="row">
                <div class="col-12">
                    <div class="gallery-tabs">
                        <ul class="nav nav-tabs list-unstyled d-flex align-items-center justify-content-center">
                            <li class="nav-item px-1 mt-3 mb-3"><a href="#show-all" class="galery-links d-block nav-item px-2 py-2 text-center text-4 font-weight-bold rounded" data-toggle="tab">
                                    Show All
                                </a></li>
                            <li class="nav-item px-1 mt-3 mb-3"><a href="#rent" class="galery-links d-block nav-item px-2 py-2 text-center text-4 font-weight-bold rounded" data-toggle="tab">
                                    For Rent
                                </a></li>
                            <li class="nav-item px-1 mt-3 mb-3"><a href="" class="galery-links d-block nav-item px-2 py-2 text-center text-4 font-weight-bold rounded" data-toggle="tab">
                                    For Sale
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="tab-content">
                    <div id="show-all" class="container tab-pane active">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="image-div-gallery">
                                    <div class="image-zoom">
                                        <img class="test" src="img-5.jpg" alt="">
                                        <div class="overlay">
                                            <div class="info-gallery">
                                                <div class="info">
                                                    <span class="bg-danger py-3 px-3 text-2">For Sale</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="image-div-gallery">
                                    <div class="image-zoom">
                                        <img src="img-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="image-div-gallery">
                                    <div class="image-zoom">
                                        <img src="img-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="image-div-gallery">
                                    <div class="image-zoom">
                                        <img src="img-5.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="rent" class="container tab-pane">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="image-div-gallery">
                                    <div class="image-zoom">
                                        <img src="img-7.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="image-div-gallery">
                                    <div class="image-zoom">
                                        <img src="img-7.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="image-div-gallery">
                                    <div class="image-zoom">
                                        <img src="img-7.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php" ?>