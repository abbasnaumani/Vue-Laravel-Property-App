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
                            <div class="main_subheader" style="margin-top: -30px;">Property Type and Location</div>

                            <div class="form-group row pt-2">
                                <label class="col-lg-3 text-right line-height-9 text-2">Purpose:</label>
                                <div class="col-lg-9">
                                    <div class="d-flex align-items-center">
                                        <div class="btn btn-primary border-right">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                                <label class="form-check-label" for="materialUnchecked">For Sale</label>
                                            </div>
                                        </div>
                                        <div class="btn btn-primary">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                                <label class="form-check-label" for="materialUnchecked">Rent</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row pt-2">
                                <label class="col-lg-3 text-right line-height-9 text-2">Property Type:</label>
                                <div class="col-lg-9">
                                    <div class="d-flex align-items-center">
                                        <div class="btn btn-primary border-right">
                                            <div class="form-check ">
                                                <input type="radio" class="form-check-input" id="" name="propertytype" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                <label class="form-check-label " for="materialUnchecked">Homes</label>
                                            </div>
                                        </div>
                                        <div class="btn btn-primary border-right">
                                            <div class="form-check ">
                                                <input type="radio" class="form-check-input" id="" name="propertytype" data-toggle="collapse" data-target=".multi-collapse01" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                                <label class="form-check-label" for="materialUnchecked">Plotes</label>
                                            </div>
                                        </div>
                                        <div class="btn btn-primary border-right">
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
                                                <div class="btn btn-primary">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios01">
                                                        <label class="form-check-label">For Sale</label>
                                                    </div>
                                                </div>
                                                <div class="btn btn-primary">
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
                                            <div class="btn btn-primary">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                    <label class="form-check-label">House</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-primary">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                    <label class="form-check-label">Flate</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-primary">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                    <label class="form-check-label">Room</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-item-center">
                                        <div class="collapse multi-collapse02 mt-3 " id="">
                                            <div class="btn btn-primary">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                    <label class="form-check-label">Office</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-primary">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                    <label class="form-check-label">Shop</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-primary">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                    <label class="form-check-label">Building</label>
                                                </div>
                                            </div>
                                            <div class="btn btn-primary">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                                    <label class="form-check-label">Other</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-9">
                <h2 class="font-weight-bold add_property">Add a Property</h2>
                <div class="main_subheader">Property Type and Location</div>
                <div class="add_property_page mt-3 d-flex justify-content-center">
                    <form action="" class="">

                        <div class="d-flex">
                            <label class="label-l">Purpose: <span class="required"></span></label>
                            <div class="form-check ml-2">
                                <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                <label class="form-check-label" for="materialUnchecked">For Sale</label>
                            </div>
                            <div class="form-check ml-2">
                                <input type="radio" class="form-check-input" id="" name="materialExampleRadios">
                                <label class="form-check-label" for="materialUnchecked">Rent</label>
                            </div>
                        </div>
                        <div class="d-flex mt-4">
                            <label class="label-l mr-2">Property Type: <span class="required"></span></label>
                            <div class="btn btn-primary">
                                <div class="form-check ">
                                    <input type="radio" class="form-check-input" id="" name="propertytype" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                    <label class="form-check-label " for="materialUnchecked">Homes</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="btn btn-primary">
                                    <div class="form-check ">
                                        <input type="radio" class="form-check-input" id="" name="propertytype" data-toggle="collapse" data-target=".multi-collapse01" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">
                                        <label class="form-check-label" for="materialUnchecked">Plotes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="btn btn-primary">
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
                                    <div class="btn btn-primary">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="" name="materialExampleRadios01">
                                            <label class="form-check-label">For Sale</label>
                                        </div>
                                    </div>
                                    <div class="btn btn-primary">
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
                                <div class="btn btn-primary">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                        <label class="form-check-label">House</label>
                                    </div>
                                </div>
                                <div class="btn btn-primary">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                        <label class="form-check-label">Flate</label>
                                    </div>
                                </div>
                                <div class="btn btn-primary">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                        <label class="form-check-label">Room</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-item-center">
                            <div class="collapse multi-collapse02 mt-3 " id="">
                                <div class="btn btn-primary">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                        <label class="form-check-label">Office</label>
                                    </div>
                                </div>
                                <div class="btn btn-primary">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                        <label class="form-check-label">Shop</label>
                                    </div>
                                </div>
                                <div class="btn btn-primary">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                        <label class="form-check-label">Building</label>
                                    </div>
                                </div>
                                <div class="btn btn-primary">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="" name="materialExampleRadios02">
                                        <label class="form-check-label">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex  mt-4">
                            <label class="label-l mr-2">City: </label>
                            <select class="form-control " id="">
                                <option>Select City</option>
                                <option>Lahore</option>
                                <option>Karachi</option>
                                <option>Islamabad</option>
                                <option>Rawalpindi</option>
                                <option>Faisalabad</option>
                            </select>
                        </div>

                        <div class="d-flex mt-3">
                            <label class="label-l mr-2">location: </label>
                            <div class="form-group">
                                <input type="text" class="form-control" id="text" placeholder="Enter Name Here *" name="pswd">
                            </div>

                        </div>
                    </form>
                </div>
                <!-- 2nd  -->
                <div class="main_subheader mt-3">Property Details</div>
                <div class="divrow">
                    <label class="label_1 mt-3">Property Title: <span class="required"></span></label>
                    <input type="text" name="title" id="title" value="" style="width:419px;">
                </div>
                <div class="divrow mt-3 d-flex">
                    <label class="label_1">Description: <span class="required"></span></label>
                    <textarea class="form-control w-50" rows="5" id="comment" placeholder="Message *" name="text"></textarea>
                </div>
                <div class="divrow mt-3">
                    <label class="label_1">All Inclusive Price: (PKR)<span class="required"></span></label>
                    <input type="text" name="title" id="title" value="" style="width:419px;">
                </div>

                <div class="divrow">
                    <label class="label l ">Land Area: <span class="required"></span> </label>
                    <input type="text" name="area" id="area" value="" style="width:228px;"> <label class="label_inline l font_s">Unit: </label>
                    <span style="width:135px">
                        <select name="unit" style="width:136px;">
                            <option value="Square Feet" selected="">Square Feet</option>
                            <option value="Square Yards">Square Yards</option>
                            <option value="Square Meters">Square Meters</option>
                            <option value="Marla">Marla</option>
                            <option value="Kanal">Kanal</option>
                        </select>
                        <input type="hidden" value="Square Feet">
                </div>
                <div class="divrow" style="display:block">
                    <label>Expires After:</label>
                    <span style="width:241px">
                        <select name="expiry_days" style="width:242px;" autocomplete="off">
                            <option value="30">1 Month</option>
                            <option value="90">3 Months</option>
                            <option value="180">6 Months</option>
                        </select>
                    </span>
                </div>
                <div class="main_subheader mt-3">Add Image</div>
            </div>
        </div>
    </div>
</section>
<?php include "footer.php" ?>