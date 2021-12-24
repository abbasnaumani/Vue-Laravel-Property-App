<?php include "header.php" ?>
<section> 
    <div class="container py-5">
        <div class="row mt-lg-5">
            <div class="col-12 text-center">
                <div class="card border py-3 mb-4 image-gallery-text">
                    <span class="text-light text-uppercase font-weight-extra-bold">Amazing Houses</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="card">
                    <img class="card-img-top image img-thumbnail" src="img-4.jpg" alt="Property Image" data-toggle="modal" data-target="#galleryModal">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="card">
                    <img class="card-img-top image img-thumbnail" src="img-5.jpg" alt="Property Image" data-toggle="modal" data-target="#galleryModal">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="card">
                    <img class="card-img-top image img-thumbnail" src="img-6.jpg" alt="Property Image" data-toggle="modal" data-target="#galleryModal">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="card">
                    <img class="card-img-top image img-thumbnail" src="img-7.jpg" alt="Property Image" data-toggle="modal" data-target="#galleryModal">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="card">
                    <img class="card-img-top image img-thumbnail" src="img-8.jpg" alt="Property Image" data-toggle="modal" data-target="#galleryModal">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-3">
                <div class="card">
                    <img class="card-img-top image img-thumbnail" src="img-4.jpg" alt="Property Image" data-toggle="modal" data-target="#galleryModal">
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="d-flex mx-auto">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                    <li class="page-item bg-primary active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item "><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal fade" id="galleryModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">House Images</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php include "gallery-carousel.php" ?>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php" ?>