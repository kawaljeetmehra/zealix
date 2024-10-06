<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Datatables - Kaiadmin Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
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
            urls: ["../assets/css/fonts.min.css"],
        },
        active: function() {
            sessionStorage.fonts = true;
        },
    });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css" />
    <style>
    /* Custom CSS goes here */
    .custom-dropdown {
  position: relative;
  display: inline-block;
  width: 100%;
}

.dropdown-selected {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #fff;
  border: 1px solid #ced4da;
  padding: 10px;
  cursor: pointer;
}

.dropdown-options {
  display: none; /* Initially hidden */
  position: absolute;
  z-index: 1;
  background: #fff;
  border: 1px solid #ced4da;
  width: 100%;
  max-height: 200px;
  overflow-y: auto;
}

.dropdown-option {
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
}

/* Adjusting icon spacing */
.dropdown-option i {
  margin-left: 5px; 
  margin-right: 5px;
}

.dropdown-option:hover {
  background: #f1f1f1;
}
    </style>
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
                                    <div class="card-title">Add Product</div>
                                </div>
                                <div class="card-body">
                                    <!-- Form Content -->
                                    <form action="{{ route('products.store') }}" method="POST">

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
                                                    <label for="productName">Product Name</label>
                                                    <input type="text" name="product_name" class="form-control"
                                                        id="productName" placeholder="Enter product name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="manufacturingDate">Manufacturing Date</label>
                                                    <input type="date" name="manufacturing_date" class="form-control"
                                                        id="manufacturingDate" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="expiryDate">Expiry Date</label>
                                                    <input type="date" name="expiry_date" class="form-control"
                                                        id="expiryDate" required />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="batchNumber">Batch Number</label>
                                                    <input type="text" name="batch_number" class="form-control"
                                                        id="batchNumber" placeholder="Enter batch number" required />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="productPackaging">Product Packaging</label>
                                                    <select name="packaging" class="form-select" id="productPackaging"
                                                        required>
                                                        <option value="Box">Box</option>
                                                        <option value="Bottle">Bottle</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="stockCount">Stock Count</label>
                                                    <input type="number" name="stock_count" class="form-control"
                                                        id="stockCount" placeholder="Enter stock count" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productCategory">Product Category</label>
                                                    <div class="custom-dropdown">
                                                        <div class="dropdown-selected" onclick="toggleDropdown()">
                                                            <span id="selectedCategory">Select Product Category</span>
                                                            <i class="fa fa-caret-down"></i>
                                                        </div>
                                                        <div class="dropdown-options" id="categoryOptions">
                                                            <div class="dropdown-option"
                                                                onclick="selectCategory('Gynecology')">
                                                                Gynecology
                                                                <i class="fa fa-edit" title="Edit"
                                                                    onclick="editCategory('Gynecology', event)"></i>
                                                                <i class="fa fa-trash" title="Delete"
                                                                    onclick="deleteCategory('Gynecology', event)"></i>
                                                            </div>
                                                            <div class="dropdown-option"
                                                                onclick="selectCategory('General Medicine')">
                                                                General Medicine
                                                                <i class="fa fa-edit" title="Edit"
                                                                    onclick="editCategory('General Medicine', event)"></i>
                                                                <i class="fa fa-trash" title="Delete"
                                                                    onclick="deleteCategory('General Medicine', event)"></i>
                                                            </div>
                                                            <div class="dropdown-option"
                                                                onclick="selectCategory('Dermatology')">
                                                                Dermatology
                                                                <i class="fa fa-edit" title="Edit"
                                                                    onclick="editCategory('Dermatology', event)"></i>
                                                                <i class="fa fa-trash" title="Delete"
                                                                    onclick="deleteCategory('Dermatology', event)"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Hidden input to store selected category -->
                                                    <input type="hidden" name="product_category"
                                                        id="productCategoryInput" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productQuantity">Product Quantity</label>
                                                    <div class="input-group">
                                                        <input type="number" name="product_quantity"
                                                            class="form-control" id="productQuantity"
                                                            placeholder="Enter quantity" required />
                                                        <select name="quantity_unit" class="form-control"
                                                            id="quantityUnit" style="width: auto;" required>
                                                            <option value="Unit">Unit</option>
                                                            <option value="ML">ML</option>
                                                            <option value="L">L</option>
                                                            <option value="Pack">Pack</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mrp">MRP of a Box/Bottles</label>
                                                    <input type="number" name="mrp" class="form-control" id="mrp"
                                                        placeholder="Enter MRP" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" class="form-control" id="description"
                                                        rows="5" placeholder="Enter product description"
                                                        required></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-action text-right">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                            <button type="button" class="btn btn-danger"
                                                onclick="window.history.back();">Cancel</button>
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

    <script>
    // Dropdown toggle function
    function toggleDropdown() {
        const dropdownOptions = document.getElementById("categoryOptions");
        dropdownOptions.style.display = dropdownOptions.style.display === "block" ? "none" : "block";
    }

    function selectCategory(category) {
        document.getElementById("selectedCategory").innerText = category;
        document.getElementById("productCategoryInput").value = category; // Set the hidden input value
        document.getElementById("categoryOptions").style.display = "none";
    }
    // Select category function


    // Edit category function (placeholder)
    function editCategory(category, event) {
        event.stopPropagation();
        alert("Editing " + category);
    }

    // Delete category function (placeholder)
    function deleteCategory(category, event) {
        event.stopPropagation();
        if (confirm("Are you sure you want to delete " + category + "?")) {
            alert(category + " deleted");
        }
    }

    // Close dropdown on click outside
    document.addEventListener('click', function(event) {
        const dropdown = document.getElementById("categoryOptions");
        if (!event.target.closest('.custom-dropdown')) {
            dropdown.style.display = 'none';
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        const manufacturingInput = document.getElementById('manufacturingDate');
        const expiryInput = document.getElementById('expiryDate');

        manufacturingInput.addEventListener('change', function() {
            const manufacturingDate = new Date(this.value);
            const expiryDate = new Date(manufacturingDate);

            // Set expiry date to the next day
            expiryDate.setDate(manufacturingDate.getDate() + 1);

            // Format the date to YYYY-MM-DD
            const year = expiryDate.getFullYear();
            const month = String(expiryDate.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
            const day = String(expiryDate.getDate()).padStart(2, '0');

            // Set the expiry date input value
            expiryInput.value = `${year}-${month}-${day}`;

            // Set minimum date for expiry date to the next day of manufacturing date
            expiryInput.setAttribute('min', `${year}-${month}-${day}`);
        });

        // Set min attribute for expiry date when the page loads
        expiryInput.setAttribute('min', expiryInput.value);
    });
    </script>
</body>

</html>