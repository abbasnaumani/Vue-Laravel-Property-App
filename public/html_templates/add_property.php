<?php include "header.php" ?>
<section id="add_property">
    <div class="container py-5">
        <div class="card shadow-sm login-card w-100 text-left mt-5">
            <div class="card-header bg-white border-bottom-0 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="font-weight-bold add_property text-3 px-3">Add a Property</h2>
                </div>
            </div>
            <div class="card-body">
                <div class="row px-3">
                    <div class="col-lg-12">
                        <form id="user-profile" action="" method="">
                            <div class="">
                                <div class="main_subheader" style="margin-top: -30px;">Property Type and Location</div>
                                <div class="form-group row text-center mt-4">
                                    <label class="col-lg-3 text-lg-right text-md-left text-sm-left line-height-9 text-2">Purpose:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-check border-right">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                                    <label class="form-check-label" for="materialUnchecked">For Sale</label>

                                                </div>
                                            </div>
                                            <div class="btn btn-check">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                                    <label class="form-check-label" for="materialUnchecked">Rent</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left line-height-9 text-2">Property Type:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="btn btn-check border-right">
                                                <div class="form-check ">
                                                    <input type="radio" class="form-check-input" id="" name="propertytype" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                    <label class="form-check-label " for="materialUnchecked">Homes</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-check border-right">
                                                <div class="form-check ">
                                                    <input type="radio" class="form-check-input" id="" name="propertytype" data-toggle="collapse" data-target=".multi-collapse01" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                    <label class="form-check-label" for="materialUnchecked">Plotes</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-check border-right">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="propertytype" data-toggle="collapse" data-target=".multi-collapse02" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                    <label class="form-check-label" for="materialUnchecked">Commerical</label>
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
                                                            <label class="form-check-label">For Sale</label>
                                                        </div>
                                                    </div>
                                                    <div class="btn btn-check">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="" name="materialExampleRadios01">
                                                            <label class="form-check-label">Rent</label>
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
                                                        <label class="form-check-label">House</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label">Flate</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label">Room</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-item-center">
                                            <div class="collapse multi-collapse02 mt-3 " id="">
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label">Office</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label">Shop</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label">Building</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-check">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                        <label class="form-check-label">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left line-height-9 text-2">City:</label>
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
                                    <label class="col-lg-3 text-lg-right text-md-left line-height-9 text-2">Location:</label>
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
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">Property Tittle:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">Description:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group ">
                                                <textarea class="form-control" rows="5" cols="43" id="comment" name="text"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">All Inclusive Price: (PKR) </label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">Land Area:</label>
                                    <div class="col-lg-9">
                                        <div class="">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">Unit:</label>
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
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">Expires Aftar:</label>
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
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">Username:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label class="col-lg-3 text-lg-right text-md-left text-2">Password:</label>
                                    <div class="col-lg-9">
                                        <div class="d-flex align-items-center">
                                            <div class="form-group w-50">
                                                <input type="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-12 text-center">
                                    <input type="submit" value="Submit property" class="btn btn-primary btn-modern " data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container mt-3">
  
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs border-0">
        <li class="nav-item btn-check border-right">
            <a class="nav-link ml-4 border-0" data-toggle="tab" href="#home">
                <input type="radio" class="form-check-input " name="propertytype"> Homes
            </a>
        </li>
        <li class="nav-item btn-check border-right">
            <a class="nav-link ml-4 border-0" data-toggle="tab" href="#forsale">
                <input type="radio" class="form-check-input" name="propertytype"> Plotes
            </a>
        </li>
        <li class="nav-item btn-check border-right">
            <a class="nav-link ml-4 border-0" data-toggle="tab" href="#comerical">
                <input type="radio" class="form-check-input" name="propertytype"> commerical
            </a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div id="home" class="container tab-pane fade"><br>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="home">
                    <label class="form-check-label">For Sale</label>
                </div>
            </div>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="home">
                    <label class="form-check-label">Rent</label>
                </div>
            </div>
        </div>

        <div id="forsale" class="container tab-pane fade"><br>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="plotes">
                    <label class="form-check-label">House</label>
                </div>
            </div>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="plotes">
                    <label class="form-check-label">Flate</label>
                </div>
            </div>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="plotes">
                    <label class="form-check-label">Room</label>
                </div>
            </div>
        </div>

        <div id="comerical" class="container tab-pane fade"><br>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="comerical">
                    <label class="form-check-label">Office</label>
                </div>
            </div>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="comerical">
                    <label class="form-check-label">Shop</label>
                </div>
            </div>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="comerical">
                    <label class="form-check-label">Building</label>
                </div>
            </div>
            <div class="btn btn-check">
                <div class="form-check">
                    <input type="radio" class="form-check-input" id="" name="comerical">
                    <label class="form-check-label">Other</label>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>