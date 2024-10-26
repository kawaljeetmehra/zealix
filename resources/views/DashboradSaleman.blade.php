<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Zealix</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        .btn-group .btn.active {
            opacity: 1; /* Full opacity for active button */
            background-color: #007bff; /* Primary color for active button */
            color: white; /* Text color for active button */
        }
        .btn-group .btn:disabled {
            background-color: #d3d3d3; /* Grey color for disabled buttons */
            color: #a9a9a9; /* Grey text color for disabled buttons */
        }
        .dot {
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }
        .present {
            background-color: green;
        }
        .leave {
            background-color: yellow;
        }
        .absent {
            background-color: red;
        }
        .current-month {
            font-weight: bold; /* Make it bold */
            color: #007bff; /* Change color if needed */
            margin-left: 10px; /* Add some space */
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
                        <img src="../assets/img/zealx logo.png" alt="navbar brand" class="navbar-brand" height="80" />
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
                                        <img src="../assets/img/profile.jpg" alt="..."
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
                                            <!-- Logout Form -->
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>

                                            <!-- Logout Link -->
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
        <h4> Salesman Dashboard
        </h4>
        <!----------Dashboard Start ----->

        <div class="row">
        <div class="col-md-6 mb-3">
    <div class="card">
        <div class="card-header">Task Report</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Task ID</th>
                        <th>Due Date</th>
                        <th>Completion (%)</th>
                        <th>Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @forelse($taskReports as $taskReport)
                        <tr>
                            <td>{{ $taskReport->Task_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($taskReport->Due_Date)->format('Y-m-d') }}</td>
                            <td>{{ $taskReport->Completion_Percentage }}%</td>
                            <td>
                                @if ($taskReport->Task_Status == 'in-progress')
                                    <button class="btn btn-warning btn-sm">In Progress</button>
                                @elseif ($taskReport->Task_Status == 'not started')
                                    <button class="btn btn-secondary btn-sm">Not Started</button>
                                @elseif ($taskReport->Task_Status == 'completed')
                                    <button class="btn btn-success btn-sm">Completed</button>
                                @endif
                            </td>
                           
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No task reports available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-header">Mark Attendance</div>
                                <div class="card-body text-center">
                                    <div class="btn-group" role="group" id="attendanceButtons">
                                        <button type="button" class="btn btn-success"
                                            data-status="Present">Present</button>
                                        <button type="button" class="btn btn-danger"
                                            data-status="Absent">Absent</button>
                                        <button type="button" class="btn btn-warning" data-status="Leave">Leave</button>
                                    </div>
                                </div>
                            </div>
                        </div>

        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">Stock</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Batch Number</th>
                                    <th>Stock Count</th>
                                    <th>MRP</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Auth::check() && (Auth::user()->role_id === 1 || Auth::user()->role_id === 3))
                                    @foreach($latestStocks as $stock)
                                        <tr>
                                            <td>{{ $stock->batch_number }}</td>
                                            <td>{{ $stock->stock_count }}</td>
                                            <td>{{ $stock->mrp }}</td>
                                            <td>
                                                @if($stock->stock_count == 0)
                                                    <button class="btn btn-danger btn-round btn-sm ms-auto">Out-Stock</button>
                                                @elseif($stock->stock_count < 7)
                                                    <button class="btn btn-warning btn-round btn-sm ms-auto">Low-Stock</button>
                                                @else
                                                    <button class="btn btn-success btn-round btn-sm ms-auto">In-Stock</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- New Column for Attendance and Order Status -->
            <div class="col-md-6 mb-3">
                <div class="card">
                    <div class="card-header">Salesmen Attendance <span class="current-month"> ({{ \Carbon\Carbon::now()->format('F') }})</span></div>
                    <div class="card-body">
                        <table class="table text-center">
                            <tr>
                                <th>Present</th>
                                <th>On Leave</th>
                                <th>Absent</th>
                            </tr>
                            <tr>
                                <td><span class="dot present"></span>{{ $presentCount }}</td>
                                <td><span class="dot leave"></span>{{ $onLeaveCount }}</td>
                                <td><span class="dot absent"></span>{{ $absentCount }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header">Order Status</div>
                    <div class="card-body">
                        <table class="table text-center">
                            <tr>
                                <th>Processing</th>
                                <th>Delivered</th>
                                <th>In-Transit</th>
                                <th>Dispatched</th>
                            </tr>
                            <tr>
                                <td>{{ $statusCounts['Processing'] ?? 0 }}</td>
                                <td>{{ $statusCounts['Delivered'] ?? 0 }}</td>
                                <td>{{ $statusCounts['In-Transit'] ?? 0 }}</td>
                                <td>{{ $statusCounts['Dispatched'] ?? 0 }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!------------Dashboard End-------------->

    </div>
</div>


            @include('partials.footer')
        </div>

    </div>


    </div>


    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="../assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../assets/js/setting-demo2.js"></script>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Get the authenticated user's ID from Laravel
        var salesmanId = {{Auth::user()->id}}; // Use the authenticated user's ID

        // Map status button data to enum values
        var statusMap = {
            'present': 'P', // Present corresponds to 'P'
            'absent': 'A', // Absent corresponds to 'A'
            'leave': 'L' // Leave corresponds to 'L'
        };

        // Fetch today's attendance status from the database
        $.ajax({
            url: '/getAttendanceStatus', // Endpoint to fetch attendance status
            method: 'GET',
            success: function(response) {
                var savedStatus = response.status; // Get the saved status from the response

                // If there's a saved status, update button states
                if (savedStatus) {
                    $('#attendanceButtons button').each(function() {
                        var status = $(this).data('status').toLowerCase();
                        if (status === Object.keys(statusMap).find(key => statusMap[key] ===
                                savedStatus)) {
                            $(this).addClass('active btn-' + status).removeClass(
                                'btn-secondary'); // Highlight active button
                        } else {
                            $(this).prop('disabled', true).addClass(
                            'btn-secondary'); // Disable other buttons
                        }
                    });
                }
            },
            error: function(xhr) {
                alert('An error occurred while fetching attendance status: ' + xhr.responseText);
            }
        });

        $('#attendanceButtons button').on('click', function() {
            // Get the status from the clicked button's data attribute
            var status = $(this).data('status'); // e.g. 'present', 'absent', 'leave'
            var enumStatus = statusMap[status.toLowerCase()]; // Map to enum value

            // Get today's date in 'YYYY-MM-DD' format
            var today = new Date();
            var day = String(today.getDate()).padStart(2, '0'); // Pad with leading zero if necessary
            var month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
            var year = today.getFullYear();
            var dateString = `${year}-${month}-${day}`; // Format as YYYY-MM-DD

            // Prepare the data for the AJAX request
            var data = {
                salesman_id: salesmanId,
                attendance: {
                    [dateString]: enumStatus // Use today's date as the key and the mapped status
                }
            };

            // Make the AJAX request
            $.ajax({
                url: '/markAttendance', // Replace with your endpoint URL
                method: 'POST',
                data: data,
                success: function(response) {
                    alert(response.message); // Display a success message

                    // Disable all buttons and highlight the selected button
                    $('#attendanceButtons button').prop('disabled', true).addClass(
                        'btn-secondary'); // Disable all buttons and change them to grey
                    $(this).removeClass('btn-secondary').addClass('active btn-' + status
                        .toLowerCase()); // Highlight the selected button
                }.bind(this), // Bind 'this' to the success function
                error: function(xhr) {
                    alert('An error occurred: ' + xhr.responseText);
                }
            });
        });
    });
</script>

</body>

</html>