<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="common.css">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=&v=weekly" async></script>
    <script>
        function initMap() {
            // The location of Uluru
            const uluru = {
                lat: -25.344,
                lng: 131.036
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: uluru,
            });
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
            });
        }
    </script>
</head>

<body>
    <section class="header-section">
        <div class="header-wrapper">
            <header class="header">
                <div class="container-fluid">
                    <div id="top-header" class="top-header">
                        <div class="container">
                            <div class="header-row d-flex align-items-center justify-content-between flex-grow-1  py-2">
                                <div class="header-column d-flex justify-content-start">
                                    <div class="top-navs d-flex justify-content-inherit align-items-center">
                                        <ul class="list-unstyled px-2 ">
                                            <li class="float-left">
                                                <i style="font-size: 15px;color: #7e1373;" class="fal fa-phone-alt"></i>
                                                <a class="text-decoration-none nav-links font-weight-semibold" href="#"><span class="px-1">(800)
                                                        123-4567</span></a>
                                            </li>
                                            <li class="float-left px-3">
                                                <i style="font-size: 15px;color: #7e1373;" class="fal fa-map-marker-alt d-lg-inline d-md-none d-sm-none d-none"></i>
                                                <a class="text-decoration-none nav-links font-weight-medium" href="#"><span class="px-1 d-lg-inline d-md-none d-sm-none d-none trext">1234 Porto
                                                        Street,Los Angeles / LA</span></a>
                                            </li>
                                            <li class="float-left px-3">
                                                <i style="font-size: 15px;color: #7e1373;" class="fal fa-envelope d-lg-inline d-md-inline d-sm-none d-none"></i>
                                                <a class="text-decoration-none nav-links font-weight-medium" href=""><span class="px-1 d-lg-inline d-md-inline d-sm-none d-none text-2">porto@portotheme.com</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="top-right-navs">
                                    <div class="right-nav-links d-flex align-items-center">
                                        <ul class="list-unstyled">
                                            <li class="float-left px-2"><a class="text-decoration-none right-navs" href="">BLOG</a></li>
                                            <li class="float-left px-2">
                                                <div class="container">
                                                    <div class="dropdown dropleft">
                                                        <i style="font-size:14px;" class="fas fa-user p-1" data-toggle="dropdown"></i>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <p class="font-weight-bold mb-0">Hassan Khalid</p>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <p class="mb-0 mt-0 header-dropdown-links px-2">My
                                                                    Account</p>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <p class="mb-0 mt-0 header-dropdown-links px-2">Manage
                                                                    Alerts</p>
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <p class="mb-0 mt-0 header-dropdown-links px-2">Log Out
                                                                </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="secondary-menu" class="secondary-menu" style="width: 100%;">
                        <div class="container">
                            <div class="d-flex align-items-center">
                                <div class="header-row d-flex align-items-center justify-content-between flex-grow-1 h-100">
                                    <div class="brand-logo px-1">
                                        <div class="web-image logo-h">
                                            <img src="ks-logo-transparent.png" alt="The logo of web-page porto" height="100%">
                                        </div>
                                    </div>
                                    <div class="secondary-nav-links">
                                        <div class="d-flex justify-content-end">
                                            <ul class="list-unstyled d-lg-flex d-md-none d-sm-none d-none m-0">
                                                <li class="px-3">
                                                    <a class="secondary-nav-li text-decoration-none active py-4 text-3" href="">Home</a>
                                                </li>
                                                <li class="px-3">
                                                    <a class="secondary-nav-li text-decoration-none py-4 text-3" href="">Properties</a>
                                                </li>
                                                <li class="px-3">
                                                    <div class="dropdown-primary">
                                                        <a class="secondary-nav-li text-decoration-none py-4 text-3" href="">About</a>
                                                        <div class="dropdown-primary-menu">
                                                            <ul class="list-unstyled">
                                                                <li class="py-2 px-2"><a class="text-dark dropdown-primary-li" href="#">Agents</a>
                                                                </li>
                                                                <li class="py-2 px-2"><a class="text-dark dropdown-primary-li" href="#">Who we
                                                                        are</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="px-3">
                                                    <a class="secondary-nav-li text-decoration-none text-3" href="">Contact</a>
                                                </li>
                                                <li class="px-3">
                                                    <a class="secondary-nav-li text-decoration-none py-4 text-3" href="">Elements</a>
                                                </li>
                                                <li class="px-3">
                                                    <div class="dropdown-mega">
                                                        <a class="secondary-nav-li text-decoration-none py-4 text-3" href="">
                                                            <i class="fas fa-search px-1"></i>
                                                            Search
                                                        </a>
                                                        <div class="dropdown-mega-menu">
                                                            <div class="d-flex align-items-center justify-content-center mt-5 mb-5">
                                                                <!-- 1st child select tag -->
                                                                <div class="px-3">
                                                                    <select class="select form-control" name="property" id="property">
                                                                        <option value="property type">Property type
                                                                        </option>
                                                                        <option value="Apartment">Apartment</option>
                                                                        <option value="Houses">Houses</option>
                                                                    </select>
                                                                </div>
                                                                <!-- 2nd child select tag -->
                                                                <div class="px-3">
                                                                    <select class="select form-control" name="Location" id="Location">
                                                                        <option value="Location">Location</option>
                                                                        <option value="Miami">Miami</option>
                                                                        <option value="New York">New York</option>
                                                                        <option value="Houston">Houston</option>
                                                                        <option value="Los Angeles">Los Angeles</option>
                                                                    </select>
                                                                </div>
                                                                <!-- 3rd child select tag -->
                                                                <div class="px-3">
                                                                    <select class="select form-control" name="beds" id="beds">
                                                                        <option value="Min Beds">Min Beds</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                    </select>
                                                                </div>
                                                                <!-- 4rd child select tag -->
                                                                <div class="px-3">
                                                                    <select class="select form-control" name="min Price" id="min price">
                                                                        <option value="Min price">Min Price</option>
                                                                        <option value="150000">$150,000</option>
                                                                        <option value="200000">$200,000</option>
                                                                        <option value="250000">$250,000</option>
                                                                        <option value="300000">$300,000</option>
                                                                        <option value="350000">$350,000</option>
                                                                        <option value="400000">$400,000</option>
                                                                        <option value="450000">$450,000</option>
                                                                        <option value="550000">$500,000</option>
                                                                        <option value="550000">$550,000</option>
                                                                        <option value="600000">$600,000</option>
                                                                        <option value="650000">$650,000</option>
                                                                        <option value="700000">$700,000</option>
                                                                        <option value="750000">$750,000</option>
                                                                        <option value="800000">$800,000</option>
                                                                        <option value="850000">$850,000</option>
                                                                        <option value="900000">$900,000</option>
                                                                        <option value="950000">$950,000</option>
                                                                        <option value="1000000">$1,000,000</option>
                                                                        <option value="1250000">$1,250,000</option>
                                                                        <option value="1500000">$1,500,000</option>
                                                                        <option value="1750000">$1,750,000</option>
                                                                        <option value="2000000">$2,000,000</option>
                                                                        <option value="2500000">$2,500,000</option>
                                                                        <option value="2500000">$2,500,000</option>
                                                                        <option value="2750000">$2,750,000</option>
                                                                        <option value="3000000">$3,000,000</option>
                                                                        <option value="3250000">$3,250,000</option>
                                                                        <option value="3500000">$3,500,000</option>
                                                                        <option value="3750000">$3,750,000</option>
                                                                        <option value="4000000">$4,000,000</option>
                                                                        <option value="4250000">$4,250,000</option>
                                                                        <option value="4500000">$4,500,000</option>
                                                                        <option value="4750000">$4,750,000</option>
                                                                        <option value="5000000">$5,000,000</option>
                                                                        <option value="6000000">$6,000,000</option>
                                                                        <option value="7000000">$7,000,000</option>
                                                                        <option value="8000000">$8,000,000</option>
                                                                        <option value="9000000">$9,000,000</option>
                                                                        <option value="8000000">$8,000,000</option>
                                                                    </select>
                                                                </div>
                                                                <!-- 5rd child select tag -->
                                                                <div class="px-3">
                                                                    <select class="select form-control" name="min Price" id="min price">
                                                                        <option value="Min price">Min Price</option>
                                                                        <option value="150000">$150,000</option>
                                                                        <option value="200000">$200,000</option>
                                                                        <option value="250000">$250,000</option>
                                                                        <option value="300000">$300,000</option>
                                                                        <option value="350000">$350,000</option>
                                                                        <option value="400000">$400,000</option>
                                                                        <option value="450000">$450,000</option>
                                                                        <option value="550000">$500,000</option>
                                                                        <option value="550000">$550,000</option>
                                                                        <option value="600000">$600,000</option>
                                                                        <option value="650000">$650,000</option>
                                                                        <option value="700000">$700,000</option>
                                                                        <option value="750000">$750,000</option>
                                                                        <option value="800000">$800,000</option>
                                                                        <option value="850000">$850,000</option>
                                                                        <option value="900000">$900,000</option>
                                                                        <option value="950000">$950,000</option>
                                                                        <option value="1000000">$1,000,000</option>
                                                                        <option value="1250000">$1,250,000</option>
                                                                        <option value="1500000">$1,500,000</option>
                                                                        <option value="1750000">$1,750,000</option>
                                                                        <option value="2000000">$2,000,000</option>
                                                                        <option value="2500000">$2,500,000</option>
                                                                        <option value="2500000">$2,500,000</option>
                                                                        <option value="2750000">$2,750,000</option>
                                                                        <option value="3000000">$3,000,000</option>
                                                                        <option value="3250000">$3,250,000</option>
                                                                        <option value="3500000">$3,500,000</option>
                                                                        <option value="3750000">$3,750,000</option>
                                                                        <option value="4000000">$4,000,000</option>
                                                                        <option value="4250000">$4,250,000</option>
                                                                        <option value="4500000">$4,500,000</option>
                                                                        <option value="4750000">$4,750,000</option>
                                                                        <option value="5000000">$5,000,000</option>
                                                                        <option value="6000000">$6,000,000</option>
                                                                        <option value="7000000">$7,000,000</option>
                                                                        <option value="8000000">$8,000,000</option>
                                                                        <option value="9000000">$9,000,000</option>
                                                                        <option value="8000000">$8,000,000</option>
                                                                    </select>
                                                                </div>
                                                                <!-- button  -->
                                                                <div class="px-3">
                                                                    <button style="background-color: #19B5FF;font-size: 15px;" type="button" class="btn text-white btn-lg">Search
                                                                        Now
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="secondary-nav-icons px-3">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <ul class="list-unstyled d-flex align-items-center m-0">
                                            <li class="py-3">
                                                <a class="d-lg-inline d-md-inline d-sm-none d-none facebook" href="#"><i class="fa fa-facebook px-1"></i></a>
                                            </li>
                                            <li class="py-3">
                                                <a class="d-lg-inline d-md-inline d-sm-none d-none twitter-header" href="#"><i class="fab fa-twitter p-1"></i></a>
                                            </li>
                                            <li class="py-3">
                                                <a class="d-lg-inline d-md-inline d-sm-none d-none instagram" href="#"><i class="fab fa-instagram p-1"></i></a>
                                            </li>
                                            <li class="d-lg-none d-md-inline d-sm-inline d-inline py-2 px-2">
                                                <button type="button" data-toggle="collapse" data-target="#accordion" class="btn btn-md test-fancy navbar-toggler-collapsed border border-0"><i class="fa fa-navicon"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 d-lg-none d-md-block d-sm-block d-block">
                                <div id="accordion" class="collapse overflow-auto scrollbar style-3">
                                    <div class="card border border-0 ">
                                        <div class="card-header card-padding">
                                            <div class="active-2 py-2">
                                                <a class="card-link px-2  text-white accordian-collapse " data-toggle="collapse" href="#collapseOne">
                                                    Home
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <a class="collapsed px-2  accordian-collapse accordian-collapse card-link" data-toggle="collapse" href="#collapseTwo">
                                                Properties
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <a class="collapsed accordian-collapse card-link" data-toggle="collapse" href="#collapseThree">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="px-2">About</div>
                                                    <div><i class="fas fa-angle-down px-2"></i></div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse " data-parent="#accordion">
                                            <div class="card-body py-1 accordion-ul">
                                                <ul class="list-unstyled ">
                                                    <li class="list-collapse py-1 border border-bottom-1 border-top-0 border-right-0 border-left-0">
                                                        <a class="accordian-list" href="#">Agents</a>
                                                    </li>
                                                    <li class="list-collapse py-1 border border-bottom-1 border-top-0 border-right-0 border-left-0">
                                                        <a class="accordian-list" href="#">Who we are</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <a class="collapsed px-2 accordian-collapse card-link" data-toggle="collapse" href="#collapsefour">
                                                Contact
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <a class="collapsed px-2 accordian-collapse card-link" data-toggle="collapse" href="#collapsefive">
                                                Elements
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <a class="collapsed accordian-collapse card-link" data-toggle="collapse" href="#collapseSix">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div>
                                                        <i class="fas fa-search px-2"></i>
                                                        <span class="">Search</span>
                                                    </div>
                                                    <div>
                                                        <i class="fas fa-angle-down px-2"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseSix" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                <div>
                                                    <select class="select px py-2" name="property" id="property">
                                                        <option value="property type">Property type</option>
                                                        <option value="Apartment">Apartment</option>
                                                        <option value="Houses">Houses</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2 ">
                                                    <select class="select px py-2" name="Location" id="Location">
                                                        <option value="Location">Location</option>
                                                        <option value="Miami">Miami</option>
                                                        <option value="New York">New York</option>
                                                        <option value="Houston">Houston</option>
                                                        <option value="Los Angeles">Los Angeles</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <select class="select px py-2" name="beds" id="beds">
                                                        <option value="Min Beds">Min Beds</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <select class="select px py-2" name="min Price" id="min price">
                                                        <option value="Min price">Min Price</option>
                                                        <option value="150000">$150,000</option>
                                                        <option value="200000">$200,000</option>
                                                        <option value="250000">$250,000</option>
                                                        <option value="300000">$300,000</option>
                                                        <option value="350000">$350,000</option>
                                                        <option value="400000">$400,000</option>
                                                        <option value="450000">$450,000</option>
                                                        <option value="550000">$500,000</option>
                                                        <option value="550000">$550,000</option>
                                                        <option value="600000">$600,000</option>
                                                        <option value="650000">$650,000</option>
                                                        <option value="700000">$700,000</option>
                                                        <option value="750000">$750,000</option>
                                                        <option value="800000">$800,000</option>
                                                        <option value="850000">$850,000</option>
                                                        <option value="900000">$900,000</option>
                                                        <option value="950000">$950,000</option>
                                                        <option value="1000000">$1,000,000</option>
                                                        <option value="1250000">$1,250,000</option>
                                                        <option value="1500000">$1,500,000</option>
                                                        <option value="1750000">$1,750,000</option>
                                                        <option value="2000000">$2,000,000</option>
                                                        <option value="2500000">$2,500,000</option>
                                                        <option value="2500000">$2,500,000</option>
                                                        <option value="2750000">$2,750,000</option>
                                                        <option value="3000000">$3,000,000</option>
                                                        <option value="3250000">$3,250,000</option>
                                                        <option value="3500000">$3,500,000</option>
                                                        <option value="3750000">$3,750,000</option>
                                                        <option value="4000000">$4,000,000</option>
                                                        <option value="4250000">$4,250,000</option>
                                                        <option value="4500000">$4,500,000</option>
                                                        <option value="4750000">$4,750,000</option>
                                                        <option value="5000000">$5,000,000</option>
                                                        <option value="6000000">$6,000,000</option>
                                                        <option value="7000000">$7,000,000</option>
                                                        <option value="8000000">$8,000,000</option>
                                                        <option value="9000000">$9,000,000</option>
                                                        <option value="8000000">$8,000,000</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <select class="select px py-2" name="min Price" id="min price">
                                                        <option value="Min price">Min Price</option>
                                                        <option value="150000">$150,000</option>
                                                        <option value="200000">$200,000</option>
                                                        <option value="250000">$250,000</option>
                                                        <option value="300000">$300,000</option>
                                                        <option value="350000">$350,000</option>
                                                        <option value="400000">$400,000</option>
                                                        <option value="450000">$450,000</option>
                                                        <option value="550000">$500,000</option>
                                                        <option value="550000">$550,000</option>
                                                        <option value="600000">$600,000</option>
                                                        <option value="650000">$650,000</option>
                                                        <option value="700000">$700,000</option>
                                                        <option value="750000">$750,000</option>
                                                        <option value="800000">$800,000</option>
                                                        <option value="850000">$850,000</option>
                                                        <option value="900000">$900,000</option>
                                                        <option value="950000">$950,000</option>
                                                        <option value="1000000">$1,000,000</option>
                                                        <option value="1250000">$1,250,000</option>
                                                        <option value="1500000">$1,500,000</option>
                                                        <option value="1750000">$1,750,000</option>
                                                        <option value="2000000">$2,000,000</option>
                                                        <option value="2500000">$2,500,000</option>
                                                        <option value="2500000">$2,500,000</option>
                                                        <option value="2750000">$2,750,000</option>
                                                        <option value="3000000">$3,000,000</option>
                                                        <option value="3250000">$3,250,000</option>
                                                        <option value="3500000">$3,500,000</option>
                                                        <option value="3750000">$3,750,000</option>
                                                        <option value="4000000">$4,000,000</option>
                                                        <option value="4250000">$4,250,000</option>
                                                        <option value="4500000">$4,500,000</option>
                                                        <option value="4750000">$4,750,000</option>
                                                        <option value="5000000">$5,000,000</option>
                                                        <option value="6000000">$6,000,000</option>
                                                        <option value="7000000">$7,000,000</option>
                                                        <option value="8000000">$8,000,000</option>
                                                        <option value="9000000">$9,000,000</option>
                                                        <option value="8000000">$8,000,000</option>
                                                    </select>
                                                </div>
                                                <div class="mt-1">
                                                    <button style="background-color: #19B5FF;" type="button" class="btn btn-primary w-100 ">Search Now
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </section>