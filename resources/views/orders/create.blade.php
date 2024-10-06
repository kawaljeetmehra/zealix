<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Zealix</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    
    <script>
    WebFont.load({
        google: {
            families: ["Public Sans:300,400,500,600,700"]
        },
        custom: {
            families: [
                "Font Awesome 5 Solid",
                "Font Awesome 5 Regular",
                "Font Awesome 5 Brands",
                "simple-line-icons",
            ],
            urls: ["{{asset('/assets/css/fonts.min.css')}}"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
    </script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="#" class="logo">
                        <img src="../assets/img/zealx logo.png" alt="navbar brand" class="navbar-brand"
                            height="80" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                <ul class="nav nav-secondary">

<!-- Inventory Management Section -->
<li class="nav-item submenu">
    <a data-bs-toggle="collapse" href="#inventory" aria-expanded="{{ request()->routeIs('products.*') ? 'true' : 'false' }}">
        <i class="fas fa-boxes"></i>
        <p>Inventory Management</p>
        <span class="caret"></span>
    </a>
    <div class="collapse {{ request()->routeIs('products.*') ? 'show' : '' }}" id="inventory">
        <ul class="nav nav-collapse">
            <!-- Product Sub-section -->
            <li class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}">
                <i class="fas fa-box"></i>
            
                <p>Product</p>
                </a>
            </li>
            <!-- Stock Assign Sub-section -->
        <li class="{{ request()->routeIs('products.stockAssign') ? 'active' : '' }}">
            <a href="{{ route('products.stockAssign') }}">
                <i class="fas fa-clipboard-list"></i>
                <p>Stock Assign</p>
            </a>
        </li>

        <!-- Stock Admin Sub-section -->
        <li class="{{ request()->routeIs('stockAdmin') ? 'active' : '' }}">
            <a href="{{ route('stockAdmin') }}">
                <i class="fas fa-user-shield"></i>
                <p>Stock Admin</p>
            </a>
        </li>

        <!-- Stock Distributor Sub-section -->
        <li class="{{ request()->routeIs('stockDistributor') ? 'active' : '' }}">
            <a href="{{ route('stockDistributor') }}">
                <i class="fas fa-truck"></i>
                <p>Stock Distributor</p>
            </a>
        </li>

        <!-- Expired Stock Admin Sub-section -->
        <li class="{{ request()->routeIs('expirestockAdmin') ? 'active' : '' }}">
            <a href="{{ route('expirestockAdmin') }}">
                <i class="fas fa-times-circle"></i>
                <p>Expired Stock Admin</p>
            </a>
        </li>

        <!-- Expired Stock Distributor Sub-section -->
        <li class="{{ request()->routeIs('expirestockDistributor') ? 'active' : '' }}">
            <a href="{{ route('expirestockDistributor') }}">
                <i class="fas fa-exclamation-triangle"></i>
                <p>Expired Stock Distributor</p>
            </a>
        </li>
        </ul>
    </div>
</li>

<!-- Orders Management Section -->
<li class="nav-item submenu">
    <a data-bs-toggle="collapse" href="#orders" aria-expanded="{{ request()->routeIs('orders.*') ? 'true' : 'false' }}">
        <i class="fas fa-shopping-cart"></i>
        <p>Orders Management</p>
        <span class="caret"></span>
    </a>
    <div class="collapse {{ request()->routeIs('orders.*') ? 'show' : '' }}" id="orders">
        <ul class="nav nav-collapse">
            <!-- Order Sub-section -->
            <li class="{{ request()->routeIs('orders.index') ? 'active' : '' }}">
                <a href="{{ route('orders.index') }}">
                <i class="fas fa-receipt"></i>
                <p>Order</p>
                   
                </a>
            </li>
            <li class="{{ request()->routeIs('orderstatus.index') ? 'active' : '' }}">
    <a href="{{ route('orderstatus.index') }}">
        <i class="fas fa-list-alt"></i>
        <p>Order Status</p>
    </a>
</li>
        </ul>
    </div>
</li>

</ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <div class="main-panel">
        <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="../index.html" class="logo">
                            <img src="../assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-envelope"></i>
                                </a>
                                <ul class="dropdown-menu messages-notif-box animated fadeIn"
                                    aria-labelledby="messageDropdown">
                                    <li>
                                        <div class="dropdown-title d-flex justify-content-between align-items-center">
                                            Messages
                                            <a href="#" class="small">Mark all as read</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="message-notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="../assets/img/jm_denis.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jimmy Denis</span>
                                                        <span class="block"> How are you ? </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="../assets/img/chadengle.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Chad</span>
                                                        <span class="block"> Ok, Thanks ! </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="../assets/img/mlane.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Jhon Doe</span>
                                                        <span class="block">
                                                            Ready for the meeting today...
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="../assets/img/talha.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="subject">Talha</span>
                                                        <span class="block"> Hi, Apa Kabar ? </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all messages<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="notification">4</span>
                                </a>
                                <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                    <li>
                                        <div class="dropdown-title">
                                            You have 4 new notification
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notif-scroll scrollbar-outer">
                                            <div class="notif-center">
                                                <a href="#">
                                                    <div class="notif-icon notif-primary">
                                                        <i class="fa fa-user-plus"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> New user registered </span>
                                                        <span class="time">5 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-success">
                                                        <i class="fa fa-comment"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Rahmad commented on Admin
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-img">
                                                        <img src="../assets/img/profile2.jpg" alt="Img Profile" />
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block">
                                                            Reza send messages to you
                                                        </span>
                                                        <span class="time">12 minutes ago</span>
                                                    </div>
                                                </a>
                                                <a href="#">
                                                    <div class="notif-icon notif-danger">
                                                        <i class="fa fa-heart"></i>
                                                    </div>
                                                    <div class="notif-content">
                                                        <span class="block"> Farrah liked Admin </span>
                                                        <span class="time">17 minutes ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="see-all" href="javascript:void(0);">See all notifications<i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item topbar-icon dropdown hidden-caret">
                                <a class="nav-link" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <i class="fas fa-layer-group"></i>
                                </a>
                                <div class="dropdown-menu quick-actions animated fadeIn">
                                    <div class="quick-actions-header">
                                        <span class="title mb-1">Quick Actions</span>
                                        <span class="subtitle op-7">Shortcuts</span>
                                    </div>
                                    <div class="quick-actions-scroll scrollbar-outer">
                                        <div class="quick-actions-items">
                                            <div class="row m-0">
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-danger rounded-circle">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </div>
                                                        <span class="text">Calendar</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-warning rounded-circle">
                                                            <i class="fas fa-map"></i>
                                                        </div>
                                                        <span class="text">Maps</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-info rounded-circle">
                                                            <i class="fas fa-file-excel"></i>
                                                        </div>
                                                        <span class="text">Reports</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-success rounded-circle">
                                                            <i class="fas fa-envelope"></i>
                                                        </div>
                                                        <span class="text">Emails</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-primary rounded-circle">
                                                            <i class="fas fa-file-invoice-dollar"></i>
                                                        </div>
                                                        <span class="text">Invoice</span>
                                                    </div>
                                                </a>
                                                <a class="col-6 col-md-4 p-0" href="#">
                                                    <div class="quick-actions-item">
                                                        <div class="avatar-item bg-secondary rounded-circle">
                                                            <i class="fas fa-credit-card"></i>
                                                        </div>
                                                        <span class="text">Payments</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="{{asset('assets/img/profile.jpg')}}" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">Hizrian</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="../assets/img/profile.jpg" alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>Hizrian</h4>
                                                    <p class="text-muted">hello@example.com</p>
                                                    <a href="#" class="btn btn-xs btn-secondary btn-sm">View
                                                        Profile</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">My Profile</a>
                                            <a class="dropdown-item" href="#">My Balance</a>
                                            <a class="dropdown-item" href="#">Inbox</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Account Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="/">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Orders</div>
                                    <p>Order List-Add Order</p>
                                </div>
                                <div class="card-body">
                                    <!-- Form Content -->
                                    <form action="{{ route('orders.store') }}" id="orderForm" method="POST">
                                    <div id="hidden-product-inputs"></div>
                                   <h6>Customer Information</h6>
                                        @csrf
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        id="name" placeholder="Enter Name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="location">Location</label>
                                                    <input type="text" name="location" class="form-control"
                                                        id="location" placeholder="Enter location" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="contact">Contact Number</label>
                                                    <input type="number" name="contact" class="form-control"
                                                    placeholder="Enter Contact Number" id="contact" required />
                                                </div>
                                            </div>
                                           

                                        </div>
                                        


                                        <div class="row">
                                           
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        id="email" placeholder="Enter Email"required />
                                                </div>
                                        </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                <label for="distributor" class="mr-2 ">Select Distributor:</label>
        <select id="distributor" name="distributor_id" class="form-control d-inline-block" style="width: auto;">
            <option value="">-- Select Distributor --</option>
            @foreach($distributors as $distributor)
                <option value="{{ $distributor->id }}">{{ $distributor->name }}</option>
            @endforeach
        </select>
                                                </div>
                                            </div>
                                           
                                            
                                        </div>

                                    
                                        
                                       
                                        
                                </div>
                                <div class="row">
    <div class="col-md-12">
        <div class="d-flex align-items-center">
            <!-- Select Product Label -->
            <span class="select-text p-2">Select Product</span>
<a href="#" class="ms-2" data-toggle="modal" data-target="#productModal">
    <i class="fa-solid fa-circle-plus" style="color: #74C0FC; font-size: 24px;"></i>
</a>
        </div>
    </div>
</div>
<!-- Modal Structure -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Select Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Batch Number</th>
                            <th>Product Category</th>
                            <th>Product Name</th>
                            <th>Stock Count</th>
                            <th>MRP</th>
                        </tr>
                    </thead>
                    <tbody id="product-list">
                        <!-- Product list will be populated here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-round" id="add-selected-products"  data-dismiss="modal">Add Selected</button>
            </div>
        </div>
    </div>
</div>
                                <div class="table-responsive">
                                    <table id="add-row" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Cancel</th>
                                                <th>Batch Number</th>
                                                <th>Product Category</th>
                                                <th>Product Name</th>
                                                
                                                <th>Stock Count</th>
                                              <th>MRP</th>
                                            </tr>
                                        </thead>

                                        <tbody id="selected-products">
        <!-- Selected products will be populated here -->
    </tbody>

                                          
                                           
                                    </table>
                                 
                                    
</div>
<div class="row p-3">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="total-stock">Total Products</label>
            <input type="number" name="total_stock" class="form-control col-md-4 w-25" id="total-stock"  readonly/>
        </div>

        <div class="mb-3">
            <label for="total-cost">Total Cost</label>
            <input type="number" name="total_cost"  class="form-control col-md-4 w-25" id="total-cost" readonly />
        </div>
    </div>

    <div class="col-md-6 d-flex justify-content-end align-items-center">
        <div>
            <button type="submit" id="submitOrder" class="btn btn-success btn-round me-2">Submit</button>
            <button type="button" class="btn btn-danger btn-round" onclick="window.history.back();">Cancel</button>
        </div>
    </div>
    </form>

</div>

                            </div>
                           
                        </div>
                    </div>
                    
                </div>
                @include('partials.footer')
            </div>

            
        </div>
    </div>

    <!-- Core JS Files -->
    <script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui/jquery-ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery.mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/js/kaiadmin.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/printThis/printThis.js') }}"></script>
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#basic-datatables").DataTable({});
        $('.delete-form').on('submit', function(e) {
            e.preventDefault();


            var confirmed = confirm("Are you sure you want to delete this record?");

            if (confirmed) {
                this.submit();
            }
        });
        $("#multi-filter-select").DataTable({
            pageLength: 5,
            initComplete: function() {
                this.api()
                    .columns()
                    .every(function() {
                        var column = this;
                        var select = $(
                                '<select class="form-select"><option value=""></option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on("change", function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column
                                    .search(val ? "^" + val + "$" : "", true, false)
                                    .draw();
                            });

                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function(d, j) {
                                select.append(
                                    '<option value="' + d + '">' + d + "</option>"
                                );
                            });
                    });
            },
        });

        // Add Row
        $("#add-row").DataTable({
            pageLength: 5,
        });

        var action =
            '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function() {
            $("#add-row")
                .dataTable()
                .fnAddData([
                    $("#addName").val(),
                    $("#addPosition").val(),
                    $("#addOffice").val(),
                    action,
                ]);
            $("#addRowModal").modal("hide");
        });
    });
    </script>
    <script>
        $(document).ready(function() {
    // Fetch products and populate the modal when it's opened
    $('#productModal').on('show.bs.modal', function() {
    $.ajax({
        url: '/your-product-route', // Replace with your route to fetch products
        method: 'GET',
        success: function(response) {
            $('#product-list').empty(); // Clear the existing list
            response.products.forEach(function(product) {
                $('#product-list').append(`
                    <tr>
                        <td><input type="checkbox" class="product-checkbox" value="${product.id}"></td>
                        <td>${product.batch_number}</td>
                        <td>${product.category}</td>
                        <td>${product.product_name}</td>
                        <td><input type="number" class="form-control stock-input" value="${product.stock_count}" min="0"></td>
                   <td>${product.mrp}</td>
                        </tr>
                `);
            });
        },
        error: function(xhr) {
            console.error(xhr.responseText); // Handle errors if necessary
        }
    });
});

// Handle adding selected products to the main table
$('#add-selected-products').click(function() {
    let totalCost = 0; // Initialize total cost
    let totalStock = 0;
    $('#product-list .product-checkbox:checked').each(function() {
        let productId = $(this).val();
        let productRow = $(this).closest('tr');
        let batchNumber = productRow.find('td:nth-child(2)').text();
        let category = productRow.find('td:nth-child(3)').text();
        let productName = productRow.find('td:nth-child(4)').text();
        
        // Retrieve the stock count from the input field
        let stockCount = parseInt(productRow.find('td:nth-child(5)').find('input').val()) || 0; // Get stock count
        let mrp = parseFloat(productRow.find('td:nth-child(6)').text()) || 0; // Get MRP
        console.log(mrp,"data2")
        // Calculate total stock and total cost
      
        totalCost += stockCount * mrp; // Calculate total cost for this product
        totalStock ++;

        $('#selected-products').append(`
            <tr>
                <td><i class="fa-solid fa-x" style="color: #f2071f; cursor: pointer;" onclick="removeRow(this)"></i></td>
                <td>${batchNumber}</td>
                <td>${category}</td>
                <td>${productName}</td>
                <td>${stockCount}</td>
                <td>${mrp}</td>
            </tr>
        `);

        $('#hidden-product-inputs').append(`
            <input type="hidden" name="products[${productId}][batch_number]" value="${batchNumber}">
            <input type="hidden" name="products[${productId}][category]" value="${category}">
            <input type="hidden" name="products[${productId}][name]" value="${productName}">
            <input type="hidden" name="products[${productId}][stock_count]" value="${stockCount}">
            <input type="hidden" name="products[${productId}][mrp]" value="${mrp}">
        `);

    });
    
    $('#total-stock').val(totalStock); // Update total stock field
    $('#total-cost').val(totalCost.toFixed(2));

    $('#productModal').modal('hide'); // Close the modal after adding products
});

// Optional: Function to remove a row
window.removeRow = function(element) {
    $(element).closest('tr').remove();
}
window.removeRow = function(element) {
    let productRow = $(element).closest('tr');
    let stockCount = parseInt(productRow.find('td:nth-child(5)').text()) || 0; // Get stock count
     
      let mrp = parseFloat(productRow.find('td:nth-child(6)').text()) || 0; // Get MRP
   console.log(mrp);
    // Update total stock and total cost
    let currentTotalStock = parseInt($('#total-stock').val()) || 0;
    let currentTotalCost = parseFloat($('#total-cost').val()) || 0;
  

    // Subtract stock count and update total fields
  
    $('#total-cost').val((currentTotalCost - (stockCount * mrp)).toFixed(2));// Subtract cost
    $('#total-stock').val(currentTotalStock - 1); // Subtract stock count

    // Remove the row from the table
    $(element).closest('tr').remove();
};


});

        </script>
   
</body>

</html>