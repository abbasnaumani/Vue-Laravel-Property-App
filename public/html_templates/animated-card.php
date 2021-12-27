<?php include "header.php" ?>

<style>
    .box {
        height: 40px;
        width: 40px;
        background-color: rebeccapurple;
        opacity: 0.6;
        transition: width 2s, height 2s;
    }
    /* .box:hover{
        width: 100%;
        height: 100%;
    } */

    .card-img-overlay{
        padding: 0rem !important;
    }

    .card:hover>.card-img-overlay>.box{
        width: 100%;
        height: 100%;
    }
</style>
<div class="container mt-5">
    <div class="row mt-5">
        <div class="card bg-dark text-white my-5" style="width:400px">
            <img src="img-3.jpg" class="card-img" alt="...">
            <div class="card-img-overlay align-items-center justify-content-center d-flex test-class">
                <div class="box"></div>
            </div>
        </div>
    </div>
    <!-- <div class="card img-fluid mt-3" style="width:500px">
        <img class="card-img-top" src="img-15.jpg" alt="Card image" style="width:100%">
        <div class="card-img-overlay card-hover align-items-center justify-content-center d-flex">
            <h4 class="text-white text-center fon">
                Ficher Island
                <br>
                <span class="text-white button p-2">211 Properties</span>
            </h4>
        </div>
    </div> -->
</div>
<?php include "footer.php" ?>