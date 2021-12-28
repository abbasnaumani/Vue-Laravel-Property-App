<?php include "header.php" ?>
<div class="container">
    <div class="card shadow-sm login-card w-100">
        <div class="card-header bg-white border-bottom-0 mt-3">
            <div class="d-flex justify-content-center align-items-center">
                <h4 class="login-text text-4 font-weight-semi-bold letter-spacing text-uppercase">Register Form</h4>
            </div>
        </div>
        <div class="card-body">
            <form id="property-form" action="" method="">
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow-sm login-card w-100">
                            <div class="card-header bg-white border-bottom-0 mt-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h4 class="login-text text-uppercase letter-spacing">User Information</h4>
                                </div>
                            </div>
                            <div class="card-body text-left">
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">Username or E-mail Address</label>
                                        <div class="position-relative">
                                            <i class="fal fa-envelope position-absolute p-3 text-primary"></i>
                                            <input type="text" name="username" value="" class="form-control form-control-lg pl-5" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow-sm login-card w-100">
                            <div class="card-header bg-white border-bottom-0 mt-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <h4 class="login-text text-uppercase letter-spacing">Property Information</h4>
                                </div>
                            </div>
                            <div class="card-body text-left">
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">Username or E-mail Address</label>
                                        <div class="position-relative">
                                            <i class="fal fa-envelope position-absolute p-3 text-primary"></i>
                                            <input type="text" name="username" value="" class="form-control form-control-lg pl-5" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-12 text-center mt-4">
                    <button type="submit" class="btn text-uppercase test-fancy border-0 text-white btn-color w-25">
                        Submit
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php" ?>