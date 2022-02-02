<template>
    <section class="header-section">
        <div class="header-wrapper">
            <header class="header">
                <div class="container-fluid">
                    <div id="top-header" class="top-header">
                        <div class="container">
                            <div
                                class="header-row d-flex align-items-center justify-content-between flex-grow-1  py-2">
                                <div class="header-column d-flex justify-content-start">
                                    <div
                                        class="top-navs d-flex justify-content-inherit align-items-center">
                                        <ul class="list-unstyled px-2 " v-if="agency">
                                            <li class="float-left">
                                                <i style="font-size: 15px;color: #7e1373;"
                                                   class="fal fa-phone-alt"></i>
                                                <a class="text-decoration-none nav-links font-weight-semibold"
                                                   href="#"><span class="px-1">{{ agency?.phone_number }}</span></a>
                                            </li>
                                            <li class="float-left px-3">
                                                <i style="font-size: 15px;color: #7e1373;"
                                                   class="fal fa-map-marker-alt d-lg-inline d-md-none d-sm-none d-none"></i>
                                                <a class="text-decoration-none nav-links font-weight-medium"
                                                   href="#"><span
                                                    class="px-1 d-lg-inline d-md-none d-sm-none d-none trext">{{
                                                        agency?.address
                                                    }}</span></a>
                                            </li>
                                            <li class="float-left px-3">
                                                <i style="font-size: 15px;color: #7e1373;"
                                                   class="fal fa-envelope d-lg-inline d-md-inline d-sm-none d-none"></i>
                                                <a class="text-decoration-none nav-links font-weight-medium"
                                                   href=""><span
                                                    class="px-1 d-lg-inline d-md-inline d-sm-none d-none text-2">{{
                                                        agency?.email
                                                    }}</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="top-right-navs d-flex" v-if="isAuthenticated">
                                    <router-link v-if="route.fullPath !== routeAddProperty"
                                                 class="btn btn-sm text-center" :to="{path:'/'+slug+'/add/property'}">
                                        Add Property
                                    </router-link>
                                    <div class="right-nav-links d-flex align-items-center">
                                        <ul class="list-unstyled">
                                            <li class="float-left px-2">
                                                <div class="container">
                                                    <div class="dropdown dropleft">
                                                        <i style="font-size:14px;"
                                                           class="fas fa-user p-1"
                                                           data-toggle="dropdown"></i>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <p class="font-weight-bold mb-0">{{
                                                                        profile?.first_name + ' '
                                                                        + profile?.last_name
                                                                    }}</p>
                                                            </a>
                                                            <router-link
                                                                :to="{path:'/'+slug+'/user/profile'}"
                                                                class="dropdown-item">
                                                                <p class="mb-0 mt-0 header-dropdown-links px-2">
                                                                    Profile</p>
                                                            </router-link>
                                                            <router-link
                                                                :to="{path:'/'+slug+'/user/dashboard'}"
                                                                class="dropdown-item">
                                                                <p class="mb-0 mt-0 header-dropdown-links px-2">
                                                                    Dashboard</p>
                                                            </router-link>
                                                            <router-link
                                                                v-if="profile.roles[0].id == UserRoles.AGENCY_ADMIN"
                                                                :to="{path:'/'+slug+'/agency/profile'}"
                                                                class="dropdown-item">
                                                                <p class="mb-0 mt-0 header-dropdown-links px-2">
                                                                    Agency Profile</p>
                                                            </router-link>
                                                            <router-link to="/logout"
                                                                         class="dropdown-item">
                                                                <p class="mb-0 mt-0 header-dropdown-links px-2">
                                                                    Log Out</p>
                                                            </router-link>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="top-right-navs" v-else>
                                    <div class="right-nav-links d-flex align-items-center">
                                        <ul class="list-unstyled">
                                            <li class="float-left px-2">
                                                <router-link class="text-decoration-none right-navs"
                                                             :to="{path:'/signup'}">LOGIN<span
                                                    style="font-size: 15px;">/</span>REGISTER
                                                </router-link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="secondary-menu" class="secondary-menu" style="width: 100%;"
                         :class='{"sticky":stickyHeader}' ref="stickyHeaderRef">
                        <div class="container">
                            <div class="d-flex align-items-center">
                                <div
                                    class="header-row d-flex align-items-center justify-content-between flex-grow-1 h-100">
                                    <div class="brand-logo px-1">
                                        <div class="web-image logo-h">
                                            <img src="/assets/images/ks-logo-transparent.png"
                                                 alt="The logo of web-page porto" height="100%">
                                        </div>
                                    </div>
                                    <div class="secondary-nav-links" v-if="agency">
                                        <div class="d-flex justify-content-end">
                                            <ul class="list-unstyled d-lg-flex d-md-none d-sm-none d-none m-0">
                                                <li class="px-3">
                                                    <router-link :to="{path: '/' + slug}"
                                                                 class="secondary-nav-li text-decoration-none  py-4 text-3"
                                                    >Home
                                                    </router-link>
                                                </li>
                                                <li class="px-3">
                                                    <router-link :to="{path: '/' + slug + '/properties'}"
                                                                 class="secondary-nav-li text-decoration-none py-4 text-3"
                                                    >Properties
                                                    </router-link>
                                                </li>
                                                <li class="px-3">
                                                    <div class="dropdown-primary">
                                                        <a class="secondary-nav-li text-decoration-none py-4 text-3"
                                                           href="javascript:void(0)">About</a>
                                                        <div class="dropdown-primary-menu">
                                                            <ul class="list-unstyled">
                                                                <li class="py-2 px-2">
                                                                    <router-link
                                                                        class="text-dark dropdown-primary-li"
                                                                        :to="{path: '/' + slug + '/agents/info'}">Agents
                                                                    </router-link>
                                                                </li>
                                                                <li class="py-2 px-2">
                                                                    <router-link
                                                                        class="text-dark dropdown-primary-li"
                                                                        :to="{path: '/' + slug + '/about/us'}">Who we
                                                                        are
                                                                    </router-link>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="px-3">
                                                    <router-link class="secondary-nav-li text-decoration-none text-3"
                                                                 :to="{path: '/' + slug + '/contactus'}">Contact
                                                    </router-link>
                                                </li>
                                                <li class="px-3">
                                                    <div class="dropdown-mega">
                                                        <a class=" secondary-nav-li text-decoration-none py-4 text-3"
                                                           href="javascript:void(0)"
                                                           @click.prevent="handleSearchBar">
                                                            <i class="fas fa-search px-1"></i>
                                                            Search
                                                        </a>
                                                        <div class="dropdown-mega-menu "
                                                             :class='{"d-block":stickySearchBar}'>
                                                            <div
                                                                class="d-flex align-items-center justify-content-center mt-5 mb-5">
                                                                <!-- 1st child select tag -->
                                                                <div class="px-3">
                                                                    <select
                                                                        class="select form-control"
                                                                        v-model="typeId"
                                                                        id="property-type">
                                                                        <option value="0"> Property Type</option>
                                                                        <option v-for="propertyType in propertyTypes" :value="propertyType.id" :selected="propertyType.id===typeId">{{propertyType.name}}</option>
                                                                    </select>
                                                                </div>
                                                                <!-- 2nd child select tag -->
                                                                <div class="px-3">
                                                                    <Select2
                                                                        v-model="locationId"
                                                                        :options="myOptions"
                                                                        :settings="{ settingOption: value, settingOption: value }"
                                                                        @change="myChangeEvent($event)"
                                                                        @select="mySelectEvent($event)"
                                                                    />
                                                                </div>
                                                                <div class="px-3">
                                                                    <select
                                                                        class="select form-control"
                                                                        v-model="beds" id="beds">
                                                                        <option value="0">Min
                                                                            Beds
                                                                        </option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                    </select>
                                                                </div>
                                                                <!-- 4rd child select tag -->
                                                                <div class="px-3">
                                                                    <select
                                                                        class="select form-control"
                                                                        name="min Price"
                                                                        id="min price">
                                                                        <option value="Min price">
                                                                            Min Price
                                                                        </option>
                                                                        <option value="1500000">
                                                                            $150,0000
                                                                        </option>
                                                                        <option value="2000000">
                                                                            $200,0000
                                                                        </option>
                                                                        <option value="2500000">
                                                                            $250,0000
                                                                        </option>
                                                                        <option value="3000000">
                                                                            $300,0000
                                                                        </option>
                                                                        <option value="3500000">
                                                                            $350,0000
                                                                        </option>
                                                                        <option value="4000000">
                                                                            $400,0000
                                                                        </option>
                                                                        <option value="4500000">
                                                                            $450,0000
                                                                        </option>
                                                                        <option value="5500000">
                                                                            $500,0000
                                                                        </option>
                                                                        <option value="5500000">
                                                                            $550,0000
                                                                        </option>
                                                                        <option value="6000000">
                                                                            $600,0000
                                                                        </option>
                                                                        <option value="6500000">
                                                                            $650,0000
                                                                        </option>
                                                                        <option value="7000000">
                                                                            $700,0000
                                                                        </option>
                                                                        <option value="7500000">
                                                                            $750,0000
                                                                        </option>
                                                                        <option value="8000000">
                                                                            $800,0000
                                                                        </option>
                                                                        <option value="8500000">
                                                                            $850,0000
                                                                        </option>
                                                                        <option value="9000000">
                                                                            $900,0000
                                                                        </option>
                                                                        <option value="9500000">
                                                                            $950,0000
                                                                        </option>
                                                                        <option value="10000000">
                                                                            $1,000,0000
                                                                        </option>
                                                                        <option value="12500000">
                                                                            $1,250,0000
                                                                        </option>
                                                                        <option value="15000000">
                                                                            $1,500,0000
                                                                        </option>
                                                                        <option value="17500000">
                                                                            $1,750,0000
                                                                        </option>
                                                                        <option value="20000000">
                                                                            $2,000,0000
                                                                        </option>
                                                                        <option value="25000000">
                                                                            $2,500,0000
                                                                        </option>
                                                                        <option value="25000000">
                                                                            $2,500,0000
                                                                        </option>
                                                                        <option value="27500000">
                                                                            $2,750,0000
                                                                        </option>
                                                                        <option value="30000000">
                                                                            $3,000,0000
                                                                        </option>
                                                                        <option value="32500000">
                                                                            $3,250,0000
                                                                        </option>
                                                                        <option value="35000000">
                                                                            $3,500,0000
                                                                        </option>
                                                                        <option value="37500000">
                                                                            $3,750,0000
                                                                        </option>
                                                                        <option value="40000000">
                                                                            $4,000,0000
                                                                        </option>
                                                                        <option value="42500000">
                                                                            $4,250,0000
                                                                        </option>
                                                                        <option value="45000000">
                                                                            $4,500,0000
                                                                        </option>
                                                                        <option value="47500000">
                                                                            $4,750,0000
                                                                        </option>
                                                                        <option value="50000000">
                                                                            $5,000,0000
                                                                        </option>
                                                                        <option value="60000000">
                                                                            $6,000,0000
                                                                        </option>
                                                                        <option value="70000000">
                                                                            $7,000,0000
                                                                        </option>
                                                                        <option value="80000000">
                                                                            $8,000,0000
                                                                        </option>
                                                                        <option value="90000000">
                                                                            $9,000,0000
                                                                        </option>
                                                                        <option value="80000000">
                                                                            $8,000,0000
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <!-- 5rd child select tag -->
                                                                <div class="px-3">
                                                                    <select
                                                                        class="select form-control"
                                                                        name="min Price"
                                                                        id="min price">
                                                                        <option value="Min price">
                                                                            Min Price
                                                                        </option>
                                                                        <option value="1500000">
                                                                            $150,0000
                                                                        </option>
                                                                        <option value="2000000">
                                                                            $200,0000
                                                                        </option>
                                                                        <option value="2500000">
                                                                            $250,0000
                                                                        </option>
                                                                        <option value="3000000">
                                                                            $300,0000
                                                                        </option>
                                                                        <option value="3500000">
                                                                            $350,0000
                                                                        </option>
                                                                        <option value="4000000">
                                                                            $400,0000
                                                                        </option>
                                                                        <option value="4500000">
                                                                            $450,0000
                                                                        </option>
                                                                        <option value="5500000">
                                                                            $500,0000
                                                                        </option>
                                                                        <option value="5500000">
                                                                            $550,0000
                                                                        </option>
                                                                        <option value="6000000">
                                                                            $600,0000
                                                                        </option>
                                                                        <option value="6500000">
                                                                            $650,0000
                                                                        </option>
                                                                        <option value="7000000">
                                                                            $700,0000
                                                                        </option>
                                                                        <option value="7500000">
                                                                            $750,0000
                                                                        </option>
                                                                        <option value="8000000">
                                                                            $800,0000
                                                                        </option>
                                                                        <option value="8500000">
                                                                            $850,0000
                                                                        </option>
                                                                        <option value="9000000">
                                                                            $900,0000
                                                                        </option>
                                                                        <option value="9500000">
                                                                            $950,0000
                                                                        </option>
                                                                        <option value="10000000">
                                                                            $1,000,0000
                                                                        </option>
                                                                        <option value="12500000">
                                                                            $1,250,0000
                                                                        </option>
                                                                        <option value="15000000">
                                                                            $1,500,0000
                                                                        </option>
                                                                        <option value="17500000">
                                                                            $1,750,0000
                                                                        </option>
                                                                        <option value="20000000">
                                                                            $2,000,0000
                                                                        </option>
                                                                        <option value="25000000">
                                                                            $2,500,0000
                                                                        </option>
                                                                        <option value="25000000">
                                                                            $2,500,0000
                                                                        </option>
                                                                        <option value="27050000">
                                                                            $2,750,0000
                                                                        </option>
                                                                        <option value="30000000">
                                                                            $3,000,0000
                                                                        </option>
                                                                        <option value="32500000">
                                                                            $3,250,0000
                                                                        </option>
                                                                        <option value="35000000">
                                                                            $3,500,0000
                                                                        </option>
                                                                        <option value="37500000">
                                                                            $3,750,0000
                                                                        </option>
                                                                        <option value="40000000">
                                                                            $4,000,0000
                                                                        </option>
                                                                        <option value="42500000">
                                                                            $4,250,0000
                                                                        </option>
                                                                        <option value="45000000">
                                                                            $4,500,0000
                                                                        </option>
                                                                        <option value="47500000">
                                                                            $4,750,0000
                                                                        </option>
                                                                        <option value="50000000">
                                                                            $5,000,0000
                                                                        </option>
                                                                        <option value="60000000">
                                                                            $6,000,0000
                                                                        </option>
                                                                        <option value="70000000">
                                                                            $7,000,0000
                                                                        </option>
                                                                        <option value="80000000">
                                                                            $8,000,0000
                                                                        </option>
                                                                        <option value="90000000">
                                                                            $9,000,0000
                                                                        </option>
                                                                        <option value="80000000">
                                                                            $8,000,0000
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <!-- button  -->
                                                                <div class="px-3">
                                                                    <button
                                                                        @click.prevent="searchPropertyByFilter"
                                                                        style="background-color: #19B5FF;font-size: 15px;"
                                                                        type="button"
                                                                        class="btn text-white btn-lg">
                                                                        Search
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
                                <div class="secondary-nav-icons px-3" v-if="agency">
                                    <div class="d-flex align-items-center justify-content-end" >
                                        <ul class="list-unstyled d-flex align-items-center m-0">
                                            <li class="py-3">
                                                <a :href="'https://www.facebook.com/'+agency.facebook" class="d-lg-inline d-md-inline d-sm-none d-none facebook"
                                                   ><i class="fa fa-facebook px-1"></i></a>
                                            </li>
                                            <li class="py-3">
                                                <a class="d-lg-inline d-md-inline d-sm-none d-none twitter-header"
                                                             :href="'https://www.twitter.com/'+agency.twitter"><i class="fab fa-twitter p-1"></i></a>
                                            </li>
                                            <li class="py-3">
                                                <a class="d-lg-inline d-md-inline d-sm-none d-none instagram"
                                                             :href="'https://www.instagram.com/'+agency.instagram"><i class="fab fa-instagram p-1"></i></a>
                                            </li>
                                            <li class="d-lg-none d-md-inline d-sm-inline d-inline py-2 px-2">
                                                <button type="button" data-toggle="collapse"
                                                        data-target="#accordion"
                                                        class="btn btn-md test-fancy navbar-toggler-collapsed border border-0">
                                                    <i class="fa fa-navicon"></i></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2 d-lg-none d-md-block d-sm-block d-block">
                                <div id="accordion"
                                     class="collapse overflow-auto scrollbar style-3">
                                    <div class="card border border-0 ">
                                        <div class="card-header card-padding">
                                            <div class=" py-2">
                                                <router-link :to="{path: '/' + slug}"
                                                             class="card-link px-2  accordian-collapse card-link accordian-collapse "
                                                             data-toggle="collapse"
                                                >Home
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <router-link :to="{path: '/' + slug + '/properties'}"
                                                         class="collapsed px-2  accordian-collapse accordian-collapse card-link"
                                                         data-toggle="collapse"
                                            >Properties
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <a class="collapsed accordian-collapse card-link"
                                               data-toggle="collapse" href="#collapseThree">
                                                <div
                                                    class="d-flex align-items-center justify-content-between">
                                                    <div class="px-2">About</div>
                                                    <div><i class="fas fa-angle-down px-2"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div id="collapseThree" class="collapse "
                                             data-parent="#accordion">
                                            <div class="card-body py-1 accordion-ul">
                                                <ul class="list-unstyled ">
                                                    <li class="list-collapse py-1 border border-bottom-1 border-top-0 border-right-0 border-left-0">
                                                        <router-link
                                                            class="accordian-list"
                                                            :to="{path: '/' + slug + '/agents/info'}">Agents
                                                        </router-link>

                                                    </li>
                                                    <li class="list-collapse py-1 border border-bottom-1 border-top-0 border-right-0 border-left-0">
                                                        <router-link
                                                            class="accordian-list"
                                                            :to="{path: '/' + slug + '/about/us'}">Who we
                                                            are
                                                        </router-link>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <router-link class="collapsed px-2 accordian-collapse card-link"
                                                         data-toggle="collapse"
                                                         :to="{path: '/' + slug + '/contactus'}">Contact
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="card border border-0">
                                        <div class="card-header card-padding">
                                            <a class="collapsed accordian-collapse card-link"
                                               data-toggle="collapse" href="#collapseSix">
                                                <div
                                                    class="d-flex align-items-center justify-content-between">
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
                                        <div id="collapseSix" class="collapse"
                                             data-parent="#accordion">
                                            <div class="card-body">
                                                <div>
                                                    <select class="select px py-2" name="property"
                                                            id="property">
                                                        <option value="property type">Property
                                                            type
                                                        </option>
                                                        <option value="Apartment">Apartment</option>
                                                        <option value="Houses">Houses</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2 ">
                                                    <select class="select px py-2" name="Location"
                                                            id="Location">
                                                        <option value="Location">Location</option>
                                                        <option value="Miami">Miami</option>
                                                        <option value="New York">New York</option>
                                                        <option value="Houston">Houston</option>
                                                        <option value="Los Angeles">Los Angeles
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <select class="select px py-2" name="beds"
                                                            id="beds">
                                                        <option value="Min Beds">Min Beds</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2">
                                                    <select class="select px py-2" name="min Price"
                                                            id="min price">
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
                                                    <select class="select px py-2" name="min Price"
                                                            id="min price">
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
                                                    <button style="background-color: #19B5FF;"
                                                            type="button"
                                                            class="btn btn-primary w-100 ">Search
                                                        Now
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
</template>

<script>
import {getAllLocationsByCItyId} from "../../../composables/country";
import {computed, ref, watchEffect, watch, onMounted, onUnmounted} from "vue";
import Select2 from "vue3-select2-component";
import store from "~/frontsite/store";
import {useRoute} from 'vue-router'
import {fetchAgencyBySlug, getAgencyBySlug} from "../../../composables/agency";
import {UserRoles} from "../../../../constants";
import {getPropertyTypes} from "../../../composables/property";
import router from "../../../router";

export default {
    name: "Header",
    components: {
        Select2
    },
    props: {
        isAuthenticated: String,
    },
    setup(props,{emit}) {
        const route = useRoute();
        const profile = computed(() => {
            return store.getters.getProfile ? store.getters.getProfile : null;
        });
        // const slug = computed(() => {
        //     console.log(route.params.slug,profile.value?.agencies[0].slug, 'from computed header hum1')
        //     return route.params.slug && route.params.slug !== '' ? route.params.slug
        //         : ((props.isAuthenticated) ? profile.value.agencies[0].slug
        //             : store.getters.getDefaultAgencySlug)
        // });
        const slug = ref(null);
        watch(()=>route.path,() => {
            slug.value = route.params.slug && route.params.slug !== '' ? route.params.slug
                : ((props.isAuthenticated) ? profile.value.agencies[0].slug
                    : store.getters.getDefaultAgencySlug)
            store.dispatch('actionCurrentAgencySlug', slug.value);

        },{
            deep:true,
                immediate:true
        });
        const routeAddProperty = '/' + slug.value + '/add/property';
        let agency = null;
        watch(() => slug.value, (newSlug, oldSlug) => {
            agency = getAgencyBySlug(newSlug);
            fetchAgencyBySlug(newSlug);
        },{
            deep:true,
            immediate:true
        });

        const userName = computed(() => store.getters.getUserName, {
            onTrack(e) {
                console.log('onTrack', e);
            },
            onTrigger(e) {
                console.log('onTrigger', e);
            }
        });
        const options = getAllLocationsByCItyId(4);
        const locationId = ref(0);
        const typeId = ref(0);
        const beds = ref(0);
        const myOptions = ref([]);
        const model = ref();
        const minPrice = ref(0);
        const maxPrice = ref(0);
        const stickySearchBar = ref(false);
        const propertyTypes = getPropertyTypes();
        function handleSearchBar() {
            stickySearchBar.value = !stickySearchBar.value;
        }

        watchEffect(()=>{
            if(options.value){
                myOptions.value = [{id:0,text:'Location'}];
                model.value = options.value[0];
                options.value.forEach(function (option){
                    myOptions.value = [{id:option.id,text:option.name},...myOptions.value];

                })
            }
        })
        async function searchPropertyByFilter(){
            await store.dispatch('actionSearchFilter',{location_id:locationId.value, type_id:typeId.value, beds:beds.value, min_price:minPrice.value, max_price:maxPrice.value});
            router.push('/'+slug.value+'/properties')
        }
        function myChangeEvent(val) {
            console.log(val);
        }

        function mySelectEvent({id, text}) {
            console.log({id, text})
        }

        const stickyHeaderRef = ref(null);
        const stickyHeader = ref(false);
        const handleScroll = () => {
            if (window.top.scrollY > stickyHeaderRef.value.offsetTop) {
                stickyHeader.value = true;
            } else {
                stickyHeader.value = false;
            }
        }

        onMounted(() => {
            // window.addEventListener("click", handleOutsideClick);
            window.addEventListener("scroll", handleScroll);
        });
        onUnmounted(() => {
            // window.addEventListener("click", handleOutsideClick);
            window.removeEventListener("scroll", handleScroll);
        });

        return {
            options,
            locationId,
            myOptions,
            myChangeEvent,
            mySelectEvent,
            model,
            profile,
            userName,
            stickyHeader,
            stickyHeaderRef,
            route,
            agency,
            slug,
            handleSearchBar,
            stickySearchBar,
            UserRoles,
            routeAddProperty,
            propertyTypes,
            typeId,
            beds,
            searchPropertyByFilter,
            minPrice,
            maxPrice
        }
    }
}
</script>

<style>
/*@media only screen and (max-width: 480px) {*/
/*    .vue-bs-select2 {*/
/*        width: 120px;*/
/*    }*/
/*}*/
/*@media only screen and (max-width: 768px) {*/
/*    .vue-bs-select2 {*/
/*        width: 160px;*/
/*    }*/
/*}*/
@media only screen and (min-width: 768px) {
    .vue-bs-select2 {
        width: auto;
    }
}

.cursor-pointer {
    cursor: pointer;
}
.select2-container .select2-selection--single{
    width: 200px !important;
   height: 30px !important;
}
</style>
