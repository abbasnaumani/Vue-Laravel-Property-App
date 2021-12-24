<?php include "header.php" ?>
<section class="mt-5 py-5">
<div class="container mt-5">
    <div class="row">
        <!-- Nav tabs -->
        <div class="col-lg-3 order-2 order-lg-1">
            <aside class="sidebar mt-2 mb-5">
                <h5 class="font-weight-semi-bold">Forms Styles</h5>
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Default</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Tab 01</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Tab 02</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3">Tab 03</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu4">Tab 04</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu5">Tab 05</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu6">Tab 06</a>
                    </li>
                </ul>
            </aside>
            <aside class="sidebar mt-2 mb-5">
                <h5 class="font-weight-semi-bold">Forms Examples</h5>
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home2">Tab 07</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu08">Tab 08</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu09">Tab 09</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu10">Tab 10</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu11">Tab 11</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu12">Tab 12</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu13">Tab 13</a>
                    </li>
                </ul>
            </aside>
        </div>

        <!-- Tab panes -->
        <div class="col-lg-9 order-1 order-lg-2">
            <div class="tab-content">
                <div id="home" class="container tab-pane active">
                    <h4>Default</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form class="contact-form">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Full Name</label>
                                                <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Email Address</label>
                                                <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label">City</label>
                                                <div class="custom-select-1">
                                                    <select class="form-select form-control h-auto py-2" name="city">
                                                        <option value="">Choose...</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label mb-1 text-2">Subject</label>
                                                <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label mb-1 text-2">Message</label>
                                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                                    <label class="form-check-label" for="tabContent9Checkbox">
                                                        Agree to terms and conditions
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="submit" value="Submit Form" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="container tab-pane fade">
                    <h4>Tab 01</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="2" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="container tab-pane fade">
                    <h4>Tab 02</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu3" class="container tab-pane fade">
                    <h4>Tab 03</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="2" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu4" class="container tab-pane fade">
                    <h4>Tab 04</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu5" class="container tab-pane fade">
                    <h4>Tab 05</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="2" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu6" class="container tab-pane fade">
                    <h4>Tab 06</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="home2" class="container tab-pane">
                    <h4>Tab 07</h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form class="contact-form">
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Full Name</label>
                                                <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="form-label mb-1 text-2">Email Address</label>
                                                <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label">City</label>
                                                <div class="custom-select-1">
                                                    <select class="form-select form-control h-auto py-2" name="city">
                                                        <option value="">Choose...</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label mb-1 text-2">Subject</label>
                                                <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label class="form-label mb-1 text-2">Message</label>
                                                <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                                    <label class="form-check-label" for="tabContent9Checkbox">
                                                        Agree to terms and conditions
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <input type="submit" value="Submit Form" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu08" class="container tab-pane fade">
                    <h4>Tab 08</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="2" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu09" class="container tab-pane fade">
                    <h4>Tab 09</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="men10" class="container tab-pane fade">
                    <h4>Tab 10</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="2" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu11" class="container tab-pane fade">
                    <h4>Tab 11</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu12" class="container tab-pane fade">
                    <h4>Tab 12</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="2" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="menu13" class="container tab-pane fade">
                    <h4>Tab 13</h4>
                    <div class="card">
                        <div class="card-body">
                            <form class="contact-form">
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Full Name</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="name">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="form-label mb-1 text-2">Email Address</label>
                                        <input type="email" value="" class="form-control text-3 h-auto py-2" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label">City</label>
                                        <div class="custom-select-1">
                                            <select class="form-select form-control h-auto py-2" name="city">
                                                <option value="">Choose...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Subject</label>
                                        <input type="text" class="form-control text-3 h-auto py-2" name="subject">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label class="form-label mb-1 text-2">Message</label>
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control text-3 h-auto py-2" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" name="agree" id="tabContent9Checkbox">
                                            <label class="form-check-label" for="tabContent9Checkbox">
                                                Agree to terms and conditions
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="submit" value="Submit Form" class="btn btn-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<?php include "footer.php" ?>