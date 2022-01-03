<?php include "header.php" ?>

<style>
    .sold-box {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 0px;
        width: 0px;
        background-color: palevioletred;
        transition: width .5s, height .5s;
    }

    .card:hover>.card-interior>.sold-box {
        width: 100%;
        height: 100%;
    }

    .card:hover>.card-interior>.sold-box>span{
        display: block !important;
        color: #444444;
    }
</style>

<div class="container py-5">
    <div class="card custom-card move-svg  border-0 w-25">
        <div class="card-interior overflow-hidden position-relative">
            <div class="position-absolute sold-box h-100">
                <span class="d-none font-weight-extra-bold text-8"> Sold! </span>
            </div>
            <a href="" class="text-decoration-none card-anchor">
                <span class="custom-card-info-type text-light py-2 px-3 text-1 font-weight-bold letter-spacing text-uppercase position-absolute top-8 left-8">For
                    Sale</span>
                <div class="custom-card-info-img d-block">
                    <img src="img-3.jpg" class="img-fluid rounded">
                </div>
                <span class="custom-card-info-header d-flex justify-content-between align-items-center p-relative">
                    <strong class="text-dark text-4 px-3 letter-spacing">$ 1.250.000</strong>
                    <div class="px-3 arrow-move">
                        <svg class="svg-color" version="1.1" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="icon_131640173528885" data-filename="arrow-right.svg" width="27" height="27">
                            <polygon points="1,26 44.586,26 38.293,32.293 39.707,33.707 48.414,25 39.707,16.293 38.293,17.707 44.586,24 1,24  "></polygon>
                        </svg>
                    </div>
                </span>
                <span class="custom-card-info-content d-block">
                    <h4 class="text-dark mb-1 text-5 px-3 font-weight-bold letter-spacing">South Miami</h4>
                    <ul class="list-unstyled d-flex mb-0 px-1 py-1 justify-content-between flex-wrap">
                        <li class="mb-0 px-2">
                            <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Beds: 3</strong>
                        </li>
                        <li class="mb-0 px-2">
                            <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Baths: 2</strong>
                        </li>
                        <li class="mb-0 px-2">
                            <strong class="text-secondary text-uppercase font-weight-extra-bold text-2">Sq Ft: 500</strong>
                        </li>
                    </ul>
                </span>
            </a>
        </div>
    </div>
</div>

<?php include "footer.php" ?>