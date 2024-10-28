<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Zealix</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="{{asset('assets/img/kaiadmin/favicon.ico')}}" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts and icons -->
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



    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    .custom-dropdown {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    .dropdown-options {
        position: absolute;
        width: 42%;
        border: 1px solid #ced4da;
        border-top: none;
        max-height: 150px;
        overflow-y: auto;
        background-color: white;
        z-index: 1000;
    }

    .dropdown-options div {
        padding: 10px;
        cursor: pointer;
    }

    .dropdown-options div:hover {
        background-color: #f1f1f1;
    }

    .btn-success.rounded-circle {
        padding: 0;
        border-radius: 50%;
    }
    .modal-backdrop {
            display: none !important; /* Hides the backdrop */
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
                        <img src="{{asset('assets/img/zealx logo.png')}}" alt="navbar brand" class="navbar-brand"
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
            @include('partials.sidebar')
        </div>


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
                                                    <img src="{{asset('assets/img/profile.jpg')}}" alt="image profile"
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
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- Logout Link -->
<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Logout
</a>
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
                                    <div class="card-title">Edit Product</div>
                                </div>
                                <div class="card-body">
                                    <!-- Form Content -->
                                    <form action="{{ route('products.update', $product->id) }}" method="POST">

                                        @csrf
                                        @method('PUT')
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
                                                        id="productName" placeholder="Enter product name" required
                                                        value="{{ old('product_name', $product->product_name) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="manufacturingDate">Manufacturing Date</label>
                                                    <input type="date" name="manufacturing_date" class="form-control"
                                                        id="manufacturingDate" required
                                                        value="{{ old('manufacturing_date', $product->manufacturing_date) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="expiryDate">Expiry Date</label>
                                                    <input type="date" name="expiry_date" class="form-control"
                                                        id="expiryDate" required
                                                        value="{{ old('expiry_date', $product->expiry_date) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="batchNumber">Batch Number</label>
                                                    <input type="text" name="batch_number" class="form-control"
                                                        id="batchNumber" placeholder="Enter batch number" required
                                                        value="{{ old('batch_number', $product->batch_number) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="productPackaging">Product Packaging</label>
                                                    <div class="d-flex align-items-center">
                                                        <div class="custom-dropdown" onclick="togglePackagingDropdown()"
                                                            style="flex: 1;">
                                                            <div class="dropdown-selected" id="selectedPackaging">
                                                            {{ old('product_packaging', $product->packaging) ?: ' Select Product Packaging Here' }} 
                                                            </div>
                                                            <i class="fa fa-caret-down"></i>
                                                        </div>
                                                        <button class="btn btn-success rounded-circle ms-2"
                                                            type="button" onclick="openAddEditPackagingModal()"
                                                            style="width: 36px; height: 36px;">
                                                            <i class="fa fa-plus text-white"></i>
                                                        </button>
                                                    </div>
                                                    <div class="dropdown-options" id="packagingOptions"
                                                        style="display: none; width:297px;">
                                                        <!-- Packaging options will be dynamically loaded here -->
                                                    </div>
                                                    <input type="hidden" name="product_packaging"
                                                        id="productPackagingInput" value="{{ old('product_packaging', $product->packaging) }}" />
                                                </div>
                                            </div>


                                            <!-- Add/Edit Packaging Modal -->
                                            <div class="modal fade" id="addEditPackagingModal" tabindex="-1"
                                                aria-labelledby="packagingModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="packagingModalLabel">Add/Edit
                                                                Packaging</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" id="packagingInput" class="form-control"
                                                                placeholder="Enter Packaging Name">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="savePackaging()">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                   


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="stockCount">Stock Count</label>
                                                    <input type="number" name="stock_count" class="form-control"
                                                        id="stockCount" placeholder="Enter stock count" required
                                                        value="{{ old('stock_count', $product->stock_count) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="productCategory">Product Category</label>
                                                    <div class="d-flex align-items-center">
                                                        <div class="custom-dropdown" onclick="toggleDropdown()"
                                                            style="flex: 1;">
                                                            <div class="dropdown-selected" id="selectedCategory">
                                                            {{ old('product_category', $product->category) ?: 'Select Product Category' }}
                                                            </div>
                                                            <i class="fa fa-caret-down"></i>
                                                        </div>
                                                        <button class="btn btn-success rounded-circle ms-2"
                                                            type="button" onclick="openAddEditModal()"
                                                            style="width: 36px; height: 36px;">
                                                            <i class="fa fa-plus text-white"></i>
                                                        </button>
                                                    </div>
                                                    <div class="dropdown-options" id="categoryOptions"
                                                        style="display: none; ">
                                                        <!-- Category options will be dynamically loaded here -->
                                                    </div>
                                                    <input type="hidden" name="product_category"
                                                        id="productCategoryInput"  value="{{ old('product_category', $product->category) }}"  />
                                                </div>


                                                <!-- Add/Edit Modal -->
                                                <div class="modal fade" id="addEditModal" tabindex="-1"
                                                    aria-labelledby="modalLabel" aria-hidden="true"  data-backdrop="false">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel">Add/Edit
                                                                    Category</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text" id="categoryInput"
                                                                    class="form-control"
                                                                    placeholder="Enter Category Name">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary"
                                                                    onclick="saveCategory()">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="productQuantity">Product Quantity</label>
                                                    <div class="input-group" style="position: relative;">
                                                        <input type="number" name="product_quantity"
                                                            class="form-control" id="productQuantity"
                                                            placeholder="Enter quantity"  value="{{ old('product_quantity', $product->quantity) }}" required />
                                                        <div class="custom-dropdown" onclick="toggleUnitDropdown()"
                                                            style="flex: 1; position: relative;">
                                                            <div class="dropdown-selected" id="selectedUnit"> {{ old('product_quantity', $product->quantity_unit) ?: 'Select Unit' }}
                                                            </div>
                                                            <i class="fa fa-caret-down"></i>
                                                        </div>
                                                        <button class="btn btn-success rounded-circle ms-2"
                                                            type="button" onclick="openAddEditUnitModal()"
                                                            style="width: 36px; height: 36px;">
                                                            <i class="fa fa-plus text-white"></i>
                                                        </button>
                                                       
                                                    </div>
                                                    <div class="dropdown-options" id="unitOptions"
                                                        style="display: none; margin-left:250px; width: 242px; height: auto;">
                                                        <!-- Unit options will be dynamically loaded here -->
                                                    </div>
                                                    
                                                        <input type="hidden" name="quantityUnit" id="quantityUnitInput" value="{{old('quantityUnit', $product->quantity_unit) }}" /> <!-- Renamed this id -->
                                                </div>
                                            

                                            <!-- Add/Edit Unit Modal -->
                                            <div class="modal fade" id="addEditUnitModal" tabindex="-1"
                                                aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel">Add Quantity
                                                                Unit</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" id="unitInput" class="form-control"
                                                                placeholder="Enter Unit Name">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="saveUnit()">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>
                                            </div>




                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="mrp">MRP of a Box/Bottles</label>
                                                    <input type="number" name="mrp" class="form-control" id="mrp"
                                                        placeholder="Enter MRP" required
                                                        value="{{ old('mrp', $product->mrp) }}" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" class="form-control" id="description"
                                                        rows="5"
                                                        placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update Product</button>
                                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
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
    let categories = [];
    let isEditing = false;
    let editingIndex = null;

    function toggleDropdown() {
        const options = document.getElementById("categoryOptions");
        options.style.display = options.style.display === "none" ? "block" : "none";
    }

    function selectCategory(category) {
        document.getElementById("selectedCategory").textContent = category;
        document.getElementById("productCategoryInput").value = category;
        toggleDropdown(); // Close dropdown after selection
    }

    function loadCategories() {
        fetch('/categories') // Fetch categories from the database
            .then(response => response.json())
            .then(data => {
                console.log(data,"categories");
                categories = data; // Store fetched categories
                displayCategories(); // Display categories in the dropdown

            })
            .catch(error => console.error('Error fetching categories:', error));
    }

    function displayCategories() {
        const optionsContainer = document.getElementById("categoryOptions");
        optionsContainer.innerHTML = ''; // Clear existing options
        categories.forEach((category, index) => {
            const item = document.createElement("div");
            item.className = "dropdown-item d-flex justify-content-between align-items-center";
            item.innerHTML = `
            ${category.name}
            <span>
                <i class="fa fa-edit text-warning me-4" onclick="openAddEditModal('${category.name}', ${index}, event)"></i>
                <i class="fa fa-trash text-danger" onclick="deleteCategory(${category.id}, event)"></i>
            </span>
        `;
            item.onclick = () => selectCategory(category.name);
            optionsContainer.appendChild(item);
        });
    }

    function openAddEditModal(category = "", index = null, event = null) {
        if (event) event.stopPropagation();
        isEditing = index !== null;
        editingIndex = index;
        console.log(editingIndex,"First");
        document.getElementById("modalLabel").innerText = isEditing ? "Edit Category" : "Add Category";
        document.getElementById("categoryInput").value = category;
        const addEditModal = new bootstrap.Modal(document.getElementById("addEditModal"));
        addEditModal.show();
    }

    function saveCategory() {
        const category = document.getElementById("categoryInput").value.trim();
        if (category) {
            const url = isEditing ? `/categories/${categories[editingIndex].id}` : '/categories/save';
            const method = isEditing ? 'PUT' : 'POST';

            fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        category
                    }) // Send the category data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (isEditing) {
                            categories[editingIndex].name = category; // Update existing category
                        } else {
                            categories.push({
                                id: data.category.id,
                                name: data.category.name
                            }); // Append new category
                        }
                        displayCategories(); // Refresh the dropdown
                    }
                })
                .catch(error => console.error('Error saving category:', error));

            const addEditModal = bootstrap.Modal.getInstance(document.getElementById("addEditModal"));
            addEditModal.hide();
        }
    }

    function deleteCategory(id, event) {
        event.stopPropagation();
        if (confirm("Are you sure you want to delete this category?")) {
            fetch(`/categories/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        categories = categories.filter(category => category.id !==
                            id); // Remove category from array
                        displayCategories(); // Refresh the dropdown
                    }
                })
                .catch(error => console.error('Error deleting category:', error));
        }
    }

    
    document.addEventListener("DOMContentLoaded",loadCategories);


    /*************************************************Product   quainty***************************************************** */
    let units = []; // Store quantity units
    let isEditingUnit = false; // Track editing state
    let editingUnitIndex = null; // Track the index of the unit being edited

    // Function to toggle the unit dropdown visibility
    function toggleUnitDropdown() {
        const options = document.getElementById("unitOptions");
        options.style.display = options.style.display === "none" ? "block" : "none";
    }

    // Function to select a unit from the dropdown
    function selectUnit(unit) {
       
        document.getElementById("selectedUnit").textContent = unit;
        document.getElementById("quantityUnitInput").value = unit; 
        toggleUnitDropdown(); // Close dropdown after selection
    }

    // Function to load quantity units from the server
    function loadUnits() {
        fetch('/quantity') // Fetch units from the server (update the endpoint as needed)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log("Fetched units:", data); // Corrected typo here
                units = data; // Store fetched units
                displayUnits(); // Display units in the dropdown
            })
            .catch(error => console.error('Error fetching units:', error));
    }

    // Function to display the available units in the dropdown
    function displayUnits() {
        const optionsContainer = document.getElementById("unitOptions");
        optionsContainer.innerHTML = ''; // Clear existing options

        units.forEach((unit, index) => {
            const quantityText = (unit.quantity && unit.name) ? unit.name : (unit.quantity || unit.name || "Unnamed Unit");
            const item = document.createElement("div");
            item.className = "dropdown-item d-flex justify-content-between align-items-center";
            item.innerHTML = `
            ${quantityText}
            <span>
                <i class="fa fa-edit text-warning me-4" onclick="openAddEditUnitModal('${quantityText}',${index}, event)"></i>
                <i class="fa fa-trash text-danger" onclick="deleteUnit(${unit.id}, event)"></i>
            </span>
        `;
            // Update item.onclick to select the unit based on its id or quantity
            item.onclick = () => selectUnit(quantityText);
            optionsContainer.appendChild(item);
        });
    }

    // Call loadUnits on page load or as needed
    document.addEventListener("DOMContentLoaded", loadUnits);


    // Function to open the modal for adding/editing a unit
    function openAddEditUnitModal(unit = "", index = null, event = null) {
        if (event) event.stopPropagation();
        isEditingUnit = index !== null; // Set editing state
        editingUnitIndex = index;
        
        document.getElementById("modalLabel").innerText = isEditingUnit ? "Edit Quantity Unit" : "Add Quantity Unit";
        document.getElementById("unitInput").value = unit || ""; // Pre-fill for editing
        const addEditUnitModal = new bootstrap.Modal(document.getElementById("addEditUnitModal"));
        addEditUnitModal.show();
    }

    // Function to save the unit
    function saveUnit() {
        const unit = document.getElementById("unitInput").value.trim();
        if (unit) {
            const url = isEditingUnit ? `/quantity/${units[editingUnitIndex].id}` : '/quantity';
            const method = isEditingUnit ? 'PUT' : 'POST';


            fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        name: unit
                    }) // Send the unit data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (isEditingUnit) {
                            units[editingUnitIndex].name = unit; // Update existing unit
                        } else {
                            units.push({
                                id: data.quantity.id, // Access the ID from the quantity
                name: data.quantity.quantity // Access the quantity value
                            }); // Append new unit
                        }
                        displayUnits(); // Refresh the dropdown
                      
                    }
                })
                .catch(error => console.error('Error saving unit:', error));

            const addEditUnitModal = bootstrap.Modal.getInstance(document.getElementById("addEditUnitModal"));
            addEditUnitModal.hide();
        }
    }

    // Function to delete a unit
    function deleteUnit(id, event) {
        event.stopPropagation();
        if (confirm("Are you sure you want to delete this unit?")) {
            fetch(`/quantity/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        units = units.filter(unit => unit.id !== id); // Remove unit from array
                        
                        displayUnits(); // Refresh the dropdown
                        
                    }
                })
                .catch(error => console.error('Error deleting unit:', error));
        }
    }
    document.addEventListener("DOMContentLoaded",loadUnits);

    // Initialize units on page load
    window.onload = loadUnits;
    

    /******************************************** Product Packaging*************************************************************** */
    let packagings = [];
    let isPackagingEditing = false;
    let packagingEditingIndex = null;

    // Toggle the packaging dropdown visibility
    function togglePackagingDropdown() {
        const options = document.getElementById("packagingOptions");
        options.style.display = options.style.display === "none" ? "block" : "none";
    }

    // Select a packaging option
    function selectPackaging(packaging) {
        document.getElementById("selectedPackaging").textContent = packaging;
        document.getElementById("productPackagingInput").value = packaging;
        togglePackagingDropdown(); // Close dropdown after selection
    }

    // Load packagings from the server
    function loadPackagings() {
        fetch('/packaging') // Adjust the endpoint as necessary
            .then(response => response.json())
            .then(data => {
                console.log("data", data);
                packagings = data; // Store fetched packagings
                displayPackagings(); // Display packagings in the dropdown
            })
            .catch(error => console.error('Error fetching packagings:', error));
    }

    // Display packagings in the dropdown
    function displayPackagings() {
        const optionsContainer = document.getElementById("packagingOptions");
        optionsContainer.innerHTML = ''; // Clear existing options
        packagings.forEach((packaging, index) => {
            const packagingText = (packaging.packaging_name && packaging.name) ? packaging.name : (packaging.packaging_name || packaging.name || "Unnamed Unit");
            const item = document.createElement("div");
            item.className = "dropdown-item d-flex justify-content-between align-items-center";
            item.innerHTML = `
            ${packagingText}
            <span>
                <i class="fa fa-edit text-warning me-4" onclick="openAddEditPackagingModal('${packagingText}', ${index}, event)"></i>
                <i class="fa fa-trash text-danger" onclick="deletePackaging(${packaging.id}, event)"></i>
            </span>
        `;
            item.onclick = () => selectPackaging(packagingText);
            optionsContainer.appendChild(item);
        });
    }

    // Open the modal for adding/editing packaging
    function openAddEditPackagingModal(packaging = "", index = null, event = null) {
        if (event) event.stopPropagation();
        isPackagingEditing = index !== null;
        packagingEditingIndex = index;
        console.log(packagingEditingIndex,"indexvalue");
        document.getElementById("packagingModalLabel").innerText = isPackagingEditing ? "Edit Packaging" :
            "Add Packaging";
        document.getElementById("packagingInput").value = packaging;
        const modal = new bootstrap.Modal(document.getElementById("addEditPackagingModal"));
        modal.show();
    }

    // Save packaging (add/edit)
    function savePackaging() {
        const packaging = document.getElementById("packagingInput").value.trim();
        console.log(packaging,"data999999");
        if (packaging) {
            const url = isPackagingEditing ? `/packaging/${packagings[packagingEditingIndex].id}` : '/packaging';
            const method = isPackagingEditing ? 'PUT' : 'POST';

            fetch(url, {
                    method: method,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        packaging
                    }) // Send the packaging data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (isPackagingEditing) {
                            packagings[packagingEditingIndex].name = packaging; // Update existing packaging
                        } else {
                            packagings.push({
                                id: data.packaging.id,
                                name: data.packaging.packaging_name
                            }); // Append new packaging
                        }
                        
                        displayPackagings(); // Refresh the dropdown
                        
                    // Refresh the current page


                    }
                }).catch(error => console.error('Error saving packaging:', error));

            const modal = bootstrap.Modal.getInstance(document.getElementById("addEditPackagingModal"));
            modal.hide();
        }
    }

    // Delete packaging
    function deletePackaging(id, event) {
        event.stopPropagation();
        if (confirm("Are you sure you want to delete this packaging?")) {
            fetch(`/packaging/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        packagings = packagings.filter(packaging => packaging.id !==
                        id); // Remove packaging from array
                        displayPackagings(); // Refresh the dropdown
                    }
                })
                .catch(error => console.error('Error deleting packaging:', error));
        }
    }

    // Initialize packagings on page load
    window.onload = loadPackagings;
    document.addEventListener("DOMContentLoaded",loadPackagings);

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