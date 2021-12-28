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
                    <button type="submit" class="btn fancy-2 btn-color w-25">
                        <div class="svg-wrapper-1">
                            <div class="svg-wrapper">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                </svg>
                            </div>
                        </div>
                        <span class="mt-0">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "footer.php" ?>