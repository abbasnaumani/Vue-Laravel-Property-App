<?php include "header.php" ?>
<section class="top-banner border-0 mt-5">
            <div class="container py-4 position-relative z-index-2">
                <div class="row py-4 pb-3 mt-4 mb-4 d-flex flex-wrap-reverse align-items-center">
                    <div
                        class="col-md-8 order-2 order-md-1 d-flex align-self-center justify-content-md-start justify-content-sm-center justify-content-center">
                        <div class="main-heading text-lg-start">
                            <h2 class="font-weight-bold text-light mb-0">Contact</h2>
                        </div>
                    </div>
                    <div
                        class="col-md-4 order-2 order-md-1 d-flex align-self-center justify-content-md-end justify-content-sm-center justify-content-center">
                        <div class="main-links">
                            <ul class="list-unstyled text-white">
                                <li><span style="font-size:11.5px;">HOME</span> <span
                                        style="opacity: 0.6;font-size:11.5px;">>
                                        PROPERTIES</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="main-contact mt-5">
    <div class="main-contact-wrapper">
        <div class="container py-3 pb-5 mb-5">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row mb-5">
                        <div class="col-12 mb-5">
                            <div class="card border-0 contact-form-card">
                                <div class="card-body">
                                    <h4 class="font-weight-bold contact-heading">Contact us</h4>
                                    <p class="text-secondary">We help you choose your property and any other question.
                                    </p>
                                    <form class="mb-4" action="/action_page.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="text" placeholder="Name *"
                                                name="pswd">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="E-mail *"
                                                name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="phone" class="form-control" id="phone" placeholder="Phone *"
                                                name="phone">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" rows="13" id="comment"
                                                placeholder="Message *" name="text"></textarea>
                                        </div>
                                        <button type="submit"
                                        class="btn border-0 btn-primary btn-block font-weight-bold btn-color py-2">Send
                                        Messages</button>
                                    </form>
                                </div>
                            </div>
                            <hr class="solid my-5">
                            <div class="maps">
                                <h4 class="mt-5 mb-3 font-bold map-heading-contact">Location</h4>
                                <div class="map-section">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="font-weight-bold contact-info-heading">Address</h5>
                            <ul class="list-unstyled text-secondary mb-4 mt-0">
                                <li>12345 Porto Blvd.</li>
                                <li>Suite 1500</li>
                                <li>Los Angeles, California 90000</li>
                            </ul>
                            <h5 class="font-weight-bold contact-info-heading">Email</h5>
                            <ul class="list-unstyled text-secondary mb-4 mt-0">
                                <li>
                                    <a href="#">porto@portotheme.com</a>
                                </li>
                            </ul>
                            <h5 class="font-weight-bold contact-info-heading">Phone</h5>
                            <ul class="list-unstyled text-secondary mb-4 mt-0">
                                <li>
                                    <a href="">(800) 123-4567</a>
                                </li>
                            </ul>
                            <h5 class="font-weight-bold contact-info-heading">Careers & Press</h5>
                            <ul class="list-unstyled text-secondary mb-4 mt-0">
                                <li>
                                    <a href="">(800) 123-4567</a>
                                </li>
                            </ul>
                            <h5 class="font-weight-bold contact-info-heading">Follow Us</h5>
                            <ul class="list-unstyled d-flex text-secondary ">
                                <li class="py-4">
                                    <a class="d-lg-inline d-md-inline d-sm-none d-none facebook" href="#"><i
                                            class="fa fa-facebook px-1"></i></a>
                                </li>
                                <li class="py-4">
                                    <a class="d-lg-inline d-md-inline d-sm-none d-none twitter-header" href="#"><i
                                            class="fab fa-twitter p-1"></i></a>
                                </li>
                                <li class="py-4">
                                    <a class="d-lg-inline d-md-inline d-sm-none d-none instagram" href="#"><i
                                            class="fab fa-instagram p-1"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12">
                            <div id="card-crousel" class="card" style="width:100%;height:350px;">
                                <div class="card-body">
                                    <h4 class="text-white text-center">Our Agents</h4>
                                    <div id="demo" class="carousel slide mt-4" data-ride="carousel">

                                        <!-- Indicators -->
                                        <ul class="carousel-indicators detail-circle">
                                            <li data-target="#demo" data-slide-to="0" class="test-new"></li>
                                            <li data-target="#demo" data-slide-to="1" class="test-new"></li>
                                            <li data-target="#demo" data-slide-to="2" class="test-new"></li>
                                        </ul>

                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active text-center">
                                                <img style="max-width: 110px;border-radius: 100%;" id="img"
                                                    src="img-13.jpg" alt="Los Angeles" width="100%" height="100px">
                                                <h5 class="text-white mt-3">John Doe</h5>
                                                <a id="carousel-a" href="#"
                                                    class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                    123-4567</a>
                                                <a id="carousel-a" href="#"
                                                    class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                            </div>
                                            <div class="carousel-item text-center">
                                                <img style="max-width: 110px;border-radius: 100%;" src="img-11.jpg"
                                                    alt="Chicago" width="100%" height="100px">
                                                <h5 class="text-white mt-3">Janice Doe</h5>
                                                <a id="carousel-a" href="#"
                                                    class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                    123-4567</a>
                                                <a id="carousel-a" href="#"
                                                    class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                            </div>
                                            <div class="carousel-item text-center">
                                                <img style="max-width: 110px;border-radius: 100%;" src="img-12.jpg"
                                                    alt="New York" width="100%" height="100px">
                                                <h5 class="text-white mt-3">Lisa Doe</h5>
                                                <a id="carousel-a" href="#"
                                                    class="text-white d-lg-block d-md-block d-sm-block d-block">(800)
                                                    123-4567</a>
                                                <a id="carousel-a" href="#"
                                                    class="text-white d-lg-block d-md-block d-sm-block d-block">you@domain.com</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-12 mt-4">
                        <h5 class="font-weight-bold contact-info-heading">Featured Properties</h5>
                            <div class="crousal-card ">
                                <div class="card" style="width:100%;height: auto;">
                                    <div id="card" class="carousel slide" data-ride="carousel">
                                        <ul class=" carousel-indicators circle-2">
                                            <li data-target="#demo" data-slide-to="0"
                                                class="active crousal-circle-link-agents"></li>
                                            <li data-target="#demo" data-slide-to="1"
                                                class="crousal-circle-link-agents">
                                            </li>
                                            <li data-target="#demo" data-slide-to="2"
                                                class="crousal-circle-link-agents">
                                            </li>
                                        </ul>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <div class="card border-0 hover-card">
                                                    <div class="position-relative detail-h-card">
                                                        <img class="card-img-top" src="img-4.jpg"
                                                            alt="Image of a Property to sale or rent.">
                                                        <div class="card-tag position-absolute left-1">
                                                            <span class="text-white font-weight-bold">FOR SALE</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 d-flex justify-content-between align-items-baseline">
                                                        <div>
                                                            <h4
                                                                class="heading-font-weight text-dark font-weight-bold m-0 px-2">
                                                                $ 1.250.000</h4>
                                                        </div>
                                                        <div class="px-2">
                                                            <i style="color: #00a4f2; font-size: 25px;"
                                                                class="fal fa-long-arrow-right icon-hov"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4 class="font-weight-bold text-dark px-2">South Miami</h4>
                                                    <div class="d-flex justify-content-between flex-wrap pb-5">
                                                        <div class="text-secondary heading-div-weight px-2">BEDS:3</div>
                                                        <div class="text-secondary heading-div-weight">BATHS:2</div>
                                                        <div class="text-secondary heading-div-weight px-2">SQ FT:500
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="card border-0 hover-card">
                                                    <div class="position-relative detail-h-card">
                                                        <img class="card-img-top" src="img-4.jpg"
                                                            alt="Image of a Property to sale or rent.">
                                                        <div class="card-tag position-absolute left-1">
                                                            <span class="text-white font-weight-bold">FOR SALE</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 d-flex justify-content-between align-items-baseline">
                                                        <div>
                                                            <h4
                                                                class="font-weight-bold heading-font-weight text-dark m-0 px-2">
                                                                $ 1.250.000</h4>
                                                        </div>
                                                        <div class="px-2">
                                                            <i style="color: #00a4f2; font-size: 25px;"
                                                                class="fal fa-long-arrow-right icon-hov"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4 class="font-weight-bold px-2 text-dark">South Miami</h4>
                                                    <div class="d-flex justify-content-between flex-wrap pb-5">
                                                        <div class="text-secondary heading-div-weight px-2">BEDS:3</div>
                                                        <div class="text-secondary heading-div-weight">BATHS:2</div>
                                                        <div class="text-secondary heading-div-weight px-2">SQ FT:500
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <div class="card border-0 hover-card">
                                                    <div class="position-relative detail-h-card">
                                                        <img class="card-img-top" src="img-4.jpg"
                                                            alt="Image of a Property to sale or rent.">
                                                        <div class="card-tag position-absolute left-1">
                                                            <span class="text-white font-weight-bold">FOR SALE</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="mt-3 d-flex justify-content-between align-items-baseline">
                                                        <div>
                                                            <h4
                                                                class="font-weight-bold heading-font-weight text-dark m-0 px-2">
                                                                $ 1.250.000</h4>
                                                        </div>
                                                        <div class="px-2">
                                                            <i style="color: #00a4f2; font-size: 25px;"
                                                                class="fal fa-long-arrow-right icon-hov"></i>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4 class="font-weight-bold px-2 text-dark">South Miami</h4>
                                                    <div class="d-flex justify-content-between flex-wrap pb-5">
                                                        <div class="text-secondary heading-div-weight px-2">BEDS:3</div>
                                                        <div class="text-secondary heading-div-weight">BATHS:2</div>
                                                        <div class="text-secondary heading-div-weight px-2">SQ FT:500
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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