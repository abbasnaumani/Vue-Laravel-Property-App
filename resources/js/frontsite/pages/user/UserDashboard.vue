<template>
    <section class="main-dashboard">
        <div class="main-dashboard-wrapper">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12">
                        <div class="main-dashboard-heading text-center">
                            <h2 class="text-uppercase text-white py-3 letter-spacing">Property dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="row py-2">
                    <div class="col-12">
                        <ul class="nav nav-tabs list-unstyled d-flex align-items-center">
                            <li class="nav-item px-1 mt-3 mb-3"><a href="#dashboard" class="dashboard-links d-block nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                Dashboard
                            </a></li>
                            <li class="nav-item px-1 mt-3 mb-3"><a href="#Property-Management" class="dashboard-links d-block nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                Property Management
                            </a></li>
                            <li class="nav-item px-1 mt-3 mb-3"><a href="" class="dashboard-links d-block nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                Message Center
                            </a></li>
                            <li class="nav-item px-1 mt-3 mb-3 "><a href="" class="dashboard-links d-block nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                My Account & Profiles
                            </a></li>
                            <li class="nav-item px-1 mt-3 mb-3"><a href="" class="dashboard-links d-block nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                Reports
                            </a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div id="dashboard" class="container mt-4 tab-pane ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="further-links d-flex flex-wrap align-items-center justify-content-between border border-top-0 border-right-0 border-left-0 border-bottom-1">
                                            <div class="main-links-tab1 mb-4">
                                                <ul class="list-unstyled d-flex flex-wrap mb-0">
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fas fa-shopping-cart"></i><span class="px-2 text-2">Cart</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fas fa-file-invoice"></i><span class="px-2 text-2">Billing</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fal fa-envelope"></i><span class="px-2 text-2">Email Alert</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="far fa-comment-alt"></i><span class="px-2 text-2">Blog</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fas fa-dollar-sign"></i><span class="px-2 text-2">Advertise</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="main-buttons mb-4">
                                                <a href="#" class="btn test-fancy border-0 px-2 mt-3"> <i class="fas fa-search px-1"></i><span class="px-1">Inventory Search</span></a>
                                                <a href="#" class="btn test-fancy border-0 mt-3"><i class="fas fa-plus px-1"></i><span class="px-1">Post Listing</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs list-unstyled">
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#premium" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                Premium Listing (5)
                                            </a></li>
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#Super-Hot" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                Super Hot CR (0)
                                            </a></li>
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#Hot" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                Hot CR (0)
                                            </a></li>
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#CR" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                Refresh CR (0)
                                            </a></li>
                                        </ul>
                                        <div class="tab-content mt-3 border border-1">
                                            <div id="premium" class="container tab-pane active mt-2 mb-2">
                                                <div class="content-1">
                                                    <table class="table d-inline table-striped">
                                                        <tr class="text-4 font-weight-bold">
                                                            <td>Total Quota</td>
                                                            <td>Quota Used:</td>
                                                            <td>Available</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="Super-Hot" class="container tab-pane mt-2 mb-2">
                                                <div class="content-2">
                                                    <table class="table d-inline table-striped">
                                                        <tr class="text-4 font-weight-bold">
                                                            <td>Total Credits</td>
                                                            <td>Currently Super Hot</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>0</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="Hot" class="container tab-pane mt-2 mb-2">
                                                <div class="content-3">
                                                    <table class="table d-inline table-striped">
                                                        <tr class="text-4 font-weight-bold">
                                                            <td>Total Credits</td>
                                                            <td>Currently Hot</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>0</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="CR" class="container tab-pane mt-2 mb-2">
                                                <div class="content-4">
                                                    <table class="table d-inline table-striped">
                                                        <tr class="text-4 font-weight-bold">
                                                            <td>Total</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                        </tr>
                                                    </table>
                                                    <p class="text-dark text-4 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, exercitationem ipsam natus doloribus culpa minus sed laudantium voluptas nisi tenetur!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <h2 class="letter-spacing">Your Performance (last 30 days)</h2>
                                    <div class="col-12">
                                        <ul class="nav nav-tabs list-unstyled">
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#Views" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                Property Views
                                            </a></li>
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#Visits" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                Property Visits
                                            </a></li>
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#CTR" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                CTR
                                            </a></li>
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#Emails" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                Emails Received
                                            </a></li>
                                        </ul>
                                        <div class="tab-content mt-3 border border-1">
                                            <div id="Views" class="container tab-pane active mt-2 mb-2">
                                                <div class="content-5 text-center">
                                                    <h3 class="py-5">Graph of Property Views</h3>
                                                </div>
                                            </div>
                                            <div id="Visits" class="container tab-pane mt-2 mb-2">
                                                <div class="content-6 text-center">
                                                    <h3 class="py-5">Graph of Property Visits</h3>
                                                </div>
                                            </div>
                                            <div id="CTR" class="container tab-pane mt-2 mb-2">
                                                <div class="content-7 text-center">
                                                    <h3 class="py-5">Graph of CTR</h3>
                                                </div>
                                            </div>
                                            <div id="Emails" class="container tab-pane mt-2 mb-2">
                                                <div class="content-8 text-center">
                                                    <h3 class="py-5">Graph of Emails Received</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs list-unstyled">
                                            <li class="nav-item px-2 mb-1  py-2"><a href="#Listings" class="dashboard-links nav-item px-2 py-2 text-center text-3 rounded" data-toggle="tab">
                                                My Recent Listings
                                            </a></li>
                                        </ul>
                                        <div class="tab-content mt-3 border border-1">
                                            <div id="Listings" class="container tab-pane active mt-2 mb-2">
                                                <div class="content-9 text-center">
                                                    <h3 class="py-5">NO listing Found</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="Property-Management" class="container tab-pane active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="further-links d-flex flex-wrap align-items-center justify-content-between border border-top-0 border-right-0 border-left-0 border-bottom-1">
                                            <div class="main-links-tab1 mb-4">
                                                <ul class="list-unstyled d-flex flex-wrap mb-0">
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fas fa-shopping-cart"></i><span class="px-2 text-2">Cart</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fas fa-file-invoice"></i><span class="px-2 text-2">Billing</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fal fa-envelope"></i><span class="px-2 text-2">Email Alert</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="far fa-comment-alt"></i><span class="px-2 text-2">Blog</span></a></li>
                                                    <li class="px-2 mt-3"><a href="#" class="border border-1 py-2 px-3 text-dark text-decoration-none dash-links">
                                                        <i style="font-size: 13px;color: #7e1373;" class="fas fa-dollar-sign"></i><span class="px-2 text-2">Advertise</span></a></li>
                                                </ul>
                                            </div>
                                            <div class="main-buttons mb-4">
                                                <a href="#" class="btn test-fancy border-0 px-2 mt-3"> <i class="fas fa-search px-1"></i><span class="px-1">Inventory Search</span></a>
                                                <a href="#" class="btn test-fancy border-0 mt-3"><i class="fas fa-plus px-1"></i><span class="px-1">Post Listing</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <div class="col-lg-3">
                                        <div class="sidebar-management border border-1">
                                            <ul class="nav nav-tabs flex-column">
                                                <li class="nav-item py-1  border border-top-0 border-right-0 border-left-0 border-bottom-1 bg-dark dash-icon">
                                                    <a class="text-white text-4 dash-links font-weight-bold px-3" data-toggle="tab" href="#">Tools</a>
                                                </li>
                                                <li class="nav-item py-1  border border-top-0 border-right-0 border-left-0 border-bottom-1 dash-icon">
                                                    <i class="fas fa-angle-right move-arrow px-2"></i><a class="text-dark text-4 dash-links" data-toggle="tab" href="#Inventory-Search">Inventory Search</a>
                                                </li>
                                                <li class="nav-item py-1  border border-top-0 border-right-0 border-left-0 border-bottom-1 dash-icon">
                                                    <i class="fas fa-angle-right move-arrow px-2"></i><a class="text-dark text-4 dash-links" data-toggle="tab" href="#Post-New">Post New Listing</a>
                                                </li>
                                                <li class="nav-item py-1  border border-top-0 border-right-0 border-left-0 border-bottom-1 dash-icon">
                                                    <i class="fas fa-angle-right move-arrow px-2"></i><a class="text-dark text-4 dash-links" data-toggle="tab" href="#">Zone Details</a>
                                                </li>
                                                <li class="nav-item py-1  border border-top-0 border-right-0 border-left-0 border-bottom-1 dash-icon">
                                                    <i class="fas fa-angle-right move-arrow px-2"></i><a class="text-dark text-4 dash-links" data-toggle="tab" href="#">Listing Policy</a>
                                                </li>
                                                <li class="nav-item py-1  border border-top-0 border-right-0 border-left-0 border-bottom-1 bg-dark dash-icon">
                                                    <a class="text-white text-4 dash-links font-weight-bold px-3" href="#">Listings</a>
                                                </li>
                                                <li class="nav-item py-1  border border-top-0 border-right-0 border-left-0 border-bottom-1 dash-icon">
                                                    <div id="accordion">
                                                        <i class="fas fa-angle-right move-arrow px-2"></i>
                                                        <a class="text-dark text-4 dash-links" data-toggle="collapse" href="#active-dropdown">
                                                            Active
                                                        </a>
                                                        <div id="active-dropdown" class="collapse" data-parent="#accordion">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <ul class="nav nav-tabs flex-column mb-0">
                                                                            <li class="nav-item">
                                                                                <a class="text-dark dash-links nav-link" data-toggle="tab" href="#active-dropdown1">Link 1</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="text-dark dash-links nav-link" data-toggle="tab" href="#active-dropdown2">Link 2</a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a class="text-dark dash-links nav-link" data-toggle="tab" href="#active-dropdown3">Link 2</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="tab-content ">
                                            <div id="Inventory-Search" class="container tab-pane active">
                                                <div>
                                                    <h2>Content of Inventory Search</h2>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                </div>
                                            </div>
                                            <div id="Post-New" class="container tab-pane">
                                                <div>
                                                    <h2>Content of Post new Listing</h2>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                </div>
                                            </div>
                                            <div id="active-dropdown1" class="container tab-pane">
                                                <div>
                                                    <h2>Content of active-link</h2>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                </div>
                                            </div>
                                            <div id="active-dropdown2" class="container tab-pane">
                                                <div>
                                                    <h2>Content of active-link-2</h2>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                </div>
                                            </div>
                                            <div id="active-dropdown3" class="container tab-pane">
                                                <div>
                                                    <h2>Content of active-link-3</h2>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                    <P class="text-4">
                                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum architecto sequi, vero aliquam molestias, numquam pariatur iusto sit ducimus, cupiditate aspernatur incidunt harum voluptatum quas at debitis dolor fugiat! Velit.
                                                        Magni praesentium doloremque temporibus quae vel culpa dolores alias eligendi minus! Blanditiis dicta velit, quae at asperiores molestiae eaque amet ipsum ut labore totam quidem! Culpa unde ipsum doloribus beatae.
                                                        Beatae totam asperiores ut nostrum non recusandae dolores odio voluptatibus. Distinctio, vel. Vel omnis voluptatum dolores natus harum, voluptatibus quo molestiae velit praesentium dignissimos modi repellendus doloremque eveniet, aliquid recusandae.
                                                    </P>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import {ref} from 'vue';

export default {
    name: "UserDashboard",
    props:{
        slug:String
    } ,
    setup(props) {
        return{

        }
    },
}
</script>

<style scoped>
</style>
