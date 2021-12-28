<?php include "header.php" ?>
<section id="add_property">
    <div class="container py-5">
        <div class="card shadow-sm login-card w-100 text-left mt-5">
            <div class="card-header bg-white border-bottom-0 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bold add_property text-4 px-3">Add a Property</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row px-3">
                    <div class="col-lg-12">
                        <form id="user-profile" action="" method="">
                            <div class="">
                                <div class="main_subheader" style="margin-top: -30px;">Property Type and Location</div>
                                <div class="form-group row text-center mt-4">
                                    <label class="col-lg-3 text-lg-right text-md-left text-sm-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">Purpose:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-check border-right">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                                    <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" for="materialUnchecked">For Sale</label>

                                                </div>
                                            </div>
                                            <div class="btn btn-check">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                                    <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" for="materialUnchecked">Rent</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">Property Type:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-check border-right">
                                                <div class="form-check ">
                                                    <input type="radio" class="form-check-input" id="" name="propertytype" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                    <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" for="materialUnchecked">Homes</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-check border-right">
                                                <div class="form-check ">
                                                    <input type="radio" class="form-check-input" id="" name="propertytype" data-toggle="collapse" data-target=".multi-collapse01" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                    <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" for="materialUnchecked">Plotes</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-check border-right">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="propertytype" data-toggle="collapse" data-target=".multi-collapse02" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                    <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2" for="materialUnchecked">Commerical</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- drop data -->
                                        <div class="row w-50 ">
                                            <div class="col ">
                                                <div class="collapse multi-collapse mt-3" id="">
                                                    <div class="btn btn-check">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="" name="materialExampleRadios01">
                                                            <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">For Sale</label>
                                                        </div>
                                                    </div>
                                                    <div class="btn btn-check">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="" name="materialExampleRadios01">
                                                            <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">Rent</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="collapse multi-collapse01 mt-3 " id="">
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">House</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">Flate</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">Room</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-item-center">
                                            <div class="collapse multi-collapse02 mt-3 " id="">
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">Office</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">Shop</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">Building</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label letter-spacing font-weight-bold text-secondary text-2">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">City:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <select class="form-control w-50" id="">
                                                <option>Select City</option>
                                                <option>Lahore</option>
                                                <option>Karachi</option>
                                                <option>Islamabad</option>
                                                <option>Rawalpindi</option>
                                                <option>Faisalabad</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left line-height-9 letter-spacing font-weight-bold text-secondary text-2">Location:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control" id="text" placeholder="Enter Name Here *">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main_subheader">Property Details</div>
                                <div class="form-group row mt-4">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Property Tittle:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Description:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group ">
                                                <textarea class="form-control" rows="5" cols="43" id="comment" name="text"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">All Inclusive Price: (PKR) </label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Land Area:</label>
                                    <div class="col-lg-9">
                                        <div class="">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Unit:</label>
                                    <div class="col-lg-9">
                                        <select class="form-control w-50" id="">
                                            <option>Square Feet</option>
                                            <option>Square Yards</option>
                                            <option>Square Meters</option>
                                            <option>Marla</option>
                                            <option>Kanal</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row my-4">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Expires Aftar:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center w-50">
                                                <select class="form-control" id="">
                                                    <option>1 Month</option>
                                                    <option>3 Months</option>
                                                    <option>6 Months</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main_subheader mb-4">Add Images</div>
                                <div class="col-lg-9">
                                    <div class="d-flex align-items-center">
                                        <form action="/action_page.php">
                                            <input type="file" id="myFile" name="filename">
                                        </form>
                                    </div>
                                </div>
                                <div class="main_subheader mt-4">Contact Details</div>
                                <div class="form-group row pt-4">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Username:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-lg-3 text-lg-right text-md-left letter-spacing font-weight-bold text-secondary text-2">Password:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 text-center mt-3">
                                    <button type="submit" class="btn fancy-2 btn-color w-25">
                                        <div class="svg-wrapper-1">
                                            <div class="svg-wrapper">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                                    <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <span class="mt-0">Sumbit Property</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include "footer.php" ?>