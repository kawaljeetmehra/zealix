<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Product Entry Form</title>
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
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="card-title">Edit Order Status</h4>
                                        <h5><strong>Order Date:</strong> {{$order->order_date}}</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mt-3 mb-3 p-2">Order Information</h4>
                                        <div class="form-group ps-3 pe-3">
                                            <!-- Added padding start and end -->
                                            <span><strong>Order Number:</strong>{{ $order->order_id }}</span>
                                        </div>
                                        <div class="form-group ps-3 pe-3">
                                            <label for="deliveryStatus"><strong>Delivery Status:</strong></label>
                                            <select name="delivery_status" id="deliveryStatus"
                                                class="form-select w-25">
                                                <option value="Processing"
                                                    {{ $order->delivery_status == 'Processing' ? 'selected' : '' }}>
                                                    Processing</option>
                                                <option value="In-Transit"
                                                    {{ $order->delivery_status == 'In-Transit' ? 'selected' : '' }}>In
                                                    Transit</option>
                                                <option value="Dispatched"
                                                    {{ $order->delivery_status == 'Dispatched' ? 'selected' : '' }}>
                                                    Dispatched</option>
                                                <option value="Delivered"
                                                    {{ $order->delivery_status == 'Delivered' ? 'selected' : '' }}>
                                                    Delivered</option>
                                            </select>
                                          
                                        </div>
                                        <div class="form-group ps-3 pe-3">
                                            <label for="orderAdjustment"><strong>Order Adjustment:</strong></label>
                                            <select name="order_adjustment" id="orderAdjustment"
                                                class="form-select w-25">
                                                <option value="return"
                                                    {{ $order->order_adjustment == 'return' ? 'selected' : '' }}>Return
                                                </option>
                                                <option value="exchange"
                                                    {{ $order->order_adjustment == 'exchange' ? 'selected' : '' }}>
                                                    Exchange</option>
                                                <option value="Null"
                                                    {{ $order->order_adjustment == 'Null' ? 'selected' : '' }}>No
                                                    Adjustment</option>
                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mt-3 mb-3">Customer Information</h4>
                                        <div class="form-group ps-3 pe-3">
                                            <!-- Added padding start and end -->
                                            <span><strong>Name:</strong> {{$order->order_by}}</span>
                                            <span style="margin-left: 20px;"><strong>Location:</strong> {{$order->location}}</span>
                                        </div>
                                        <div class="form-group ps-3 pe-3">
                                            <!-- Added padding start and end -->
                                            <span><strong>Contact Number:</strong>{{$order->contact}}</span>
                                            <span style="margin-left: 20px;"><strong>Distributor:</strong>
                                               {{$order->distributor_name}}</span>
                                        </div>
                                        <div class="form-group ps-3 pe-3">
                                            <!-- Added padding start and end -->

                                            <span><strong>Email:</strong>{{$order->email}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <h4 class="p-2">Order Products</h4>
                                    <div class="table-responsive ">
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Batch Number</th>
                                                    <th>Product Category</th>
                                                    <th>Product Name </th>
                                                    <th>Stock Count</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orderDetails as $detail)
                                        <tr>
                                            <td>{{ $detail->batch_number }}</td>
                                            <td>{{ $detail->category }}</td>
                                            <td>{{ $detail->name }}</td>
                                            <td>{{ $detail->stock_count }}</td>
                                          
                                        </tr>
                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-11 mt-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex">
                                            <div class="form-group me-3">
                                                <!-- Margin end -->
                                                <label for="totalProducts"><strong>Total Items:</strong></label>
                                                <input type="text" id="totalProducts" class="form-control" value="{{$orderDetails->count()}}"
                                                    readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="totalCost"><strong>Total Cost:</strong></label>
                                                <input type="text" id="totalCost" class="form-control" value="{{$order->total_cost}}"
                                                    readonly>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" id="updateOrderStatus" class="btn btn-primary">Update</button>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                @include('partials.footer')
            </div>
  

            
        </div>
    </div>

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
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>
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


        $('#updateOrderStatus').click(function() {
            // Get the selected values
            const deliveryStatus = $('#deliveryStatus').val();
            const orderAdjustment = $('#orderAdjustment').val();
            const orderId = {{ $order->id }};  // Assuming you have access to the order ID

            // Send the AJAX request
            $.ajax({
                url: `/orderstatus/${orderId}`, // URL for the resource route
                method: 'PUT', // Use PUT for updating
                data: {
                    delivery_status: deliveryStatus,
                    order_adjustment: orderAdjustment,
                    _token: '{{ csrf_token() }}' // CSRF token for Laravel
                },
                success: function(response) {
                    // Handle the success response
                    alert('Order status updated successfully!');
                    // Redirect to the order status index page
                    window.location.href =
                    '{{ url("orderstatus") }}'; // Redirect to the orderStatus index route
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    alert('Error updating order status: ' + error);
                }
            });
        });
    });
    </script>
</body>

</html>