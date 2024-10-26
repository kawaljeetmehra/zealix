<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Zealix</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Salesman Attendance</h4>
                            @if (Auth::user()->role_id == 1 )
                                <button type="button" class="btn btn-primary btn-round" id="attendanceButton"
                                    data-toggle="modal" data-target="#attendanceModal">
                                    <i class="fa fa-plus"></i>
                                    <span id="attendanceButtonText">Add Attendance</span>
                                </button>
                            @endif
                        </div>
                        <h4 class="date mb-0 text-center">Date: 
                            {{ \Carbon\Carbon::now()->setTimezone('Asia/Kolkata')->format('d-m-Y') }}
                        </h4>
                    </div>
                    <form action="{{ route('salesman.attendance') }}" method="GET" class="mb-3">
    <div class="row mt-2 d-flex justify-content-center">
        <div class="col-md-3">
            @if (Auth::user()->role_id == 1)
                <label for="salesman_id">Select Salesman</label>
                <select class="form-control" id="salesman_id" name="salesman_id" onchange="this.form.submit()">
                    <option value="" disabled>Select Salesman</option>
                    @foreach ($salesmen as $salesman)
                        <option value="{{ $salesman->id }}" {{ $selectedSalesmanId == $salesman->id ? 'selected' : '' }}>
                            {{ $salesman->name }}
                        </option>
                    @endforeach
                </select>
            @else
                <!-- Add an empty div to maintain layout if not an admin -->
                <div style="height: 38px;"></div>
            @endif
        </div>
        <div class="col-md-3">
            <label for="status">Filter by Status</label>
            <select class="form-control" id="status" name="status" onchange="this.form.submit()">
                <option value="" {{ $selectedStatus === '' ? 'selected' : '' }}>All</option>
                <option value="P" {{ $selectedStatus === 'P' ? 'selected' : '' }}>Present</option>
                <option value="A" {{ $selectedStatus === 'A' ? 'selected' : '' }}>Absent</option>
                <option value="L" {{ $selectedStatus === 'L' ? 'selected' : '' }}>Leave</option>
            </select>
        </div>
    </div>
</form>


                    <div class="table-responsive">
                    <table id="attendance-table" class="display table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Month</th>
            @for ($day = 1; $day <= 31; $day++)
                <th>Day {{ $day }}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @foreach (range(1, 12) as $month)
            <tr>
                <td>{{ \Carbon\Carbon::create()->month($month)->format('F') }}</td>
                @for ($day = 1; $day <= 31; $day++)
                    <td style="background-color: 
                        {{ isset($attendanceData[0]->attendance[$month][$day]) ? 
                            ($attendanceData[0]->attendance[$month][$day] === 'P' ? 'green' : 
                            ($attendanceData[0]->attendance[$month][$day] === 'A' ? 'red' : 
                            ($attendanceData[0]->attendance[$month][$day] === 'L' ? 'yellow' : 'white'))) 
                            : 'white' }};
                        color: {{ isset($attendanceData[0]->attendance[$month][$day]) ? 'white' : 'black' }};">
                        {{ $attendanceData[0]->attendance[$month][$day] ?? 'N/A' }}
                    </td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>


                        <div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog"
                            aria-labelledby="attendanceModalLabel" aria-hidden="true" data-backdrop="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="attendanceModalLabel">Add Attendance</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="attendanceForm" method="POST" action="/attendance">
                                            @csrf
                                            <input type="hidden" name="_method" id="formMethod" value="POST">
                                            <input type="hidden" name="attendance_id" id="attendanceId" value="">
                                            <div class="form-group">
                                                <label for="salesman_id">Salesman</label>
                                                <select class="form-control" id="salesman_id" name="salesman_id" required>
                                                    <option value="">Select Salesman</option>
                                                    @foreach ($salesmen as $salesman)
                                                        <option value="{{ $salesman->id }}"
                                                            {{ isset($attendance) && $attendance->salesman_id == $salesman->id ? 'selected' : '' }}>
                                                            {{ $salesman->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            @php
                                                use Carbon\Carbon;
                                                $currentDay = Carbon::now()->setTimezone('Asia/Kolkata')->day;
                                            @endphp

                                            <div class="form-group">
                                                <label for="day{{ $currentDay }}">Day {{ $currentDay }}</label>
                                                <select class="form-control" id="day{{ $currentDay }}"
                                                    name="attendance[{{ $currentDay }}]">
                                                    <option value="">Select Status</option>
                                                    <option value="P"
                                                        {{ isset($attendance) && isset($attendance->attendance[$currentDay]) && $attendance->attendance[$currentDay] === 'P' ? 'selected' : '' }}>
                                                        Present
                                                    </option>
                                                    <option value="A"
                                                        {{ isset($attendance) && isset($attendance->attendance[$currentDay]) && $attendance->attendance[$currentDay] === 'A' ? 'selected' : '' }}>
                                                        Absent
                                                    </option>
                                                    <option value="L"
                                                        {{ isset($attendance) && isset($attendance->attendance[$currentDay]) && $attendance->attendance[$currentDay] === 'L' ? 'selected' : '' }}>
                                                        Leave
                                                    </option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-primary" id="submitBtn">Save Attendance</button>
                                        </form>
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


            @include('partials.footer')

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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    // Function to open the modal for adding or updating attendance
    function openAttendanceModal(attendance = null) {
        // Clear the form
        $('#attendanceForm')[0].reset();
        $('#attendanceId').val('');
        $('#formMethod').val('POST');
        $('#attendanceModalLabel').text('Add Attendance'); // Default title for adding
        $('#attendanceButtonText').text('Add Attendance'); // Default button text
        $('#attendanceForm').attr('action', '/attendance'); // Default action for adding

        if (attendance) {
            $('#attendanceId').val(attendance.id);
            $('#formMethod').val('PUT'); // Change to PUT for updating
            $('#attendanceModalLabel').text('Update Attendance'); // Change title for updating
            $('#attendanceButtonText').text('Update Attendance'); // Change button text for updating
            $('#attendanceForm').attr('action', '/attendance/' + attendance.id); // Set action for updating

            // Populate the form fields with existing data
            $('#salesman_id').val(attendance.salesman_id);
            const currentDay = new Date().getDate(); // Get today's day of the month
            if (attendance.attendance[currentDay]) {
                $('#day' + currentDay).val(attendance.attendance[currentDay]); // Set attendance status for today
            }
        }

        // Show the modal
        $('#attendanceModal').modal('show');
    }

    $(document).ready(function() {

        $('#attendanceButton').on('click', function() {
            $('#attendanceModal').modal({
                backdrop: false
            });
        })
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
        $('#attendanceButton').on('click', function() {
            openAttendanceModal(); // Open modal for adding attendance
        });

        // Example to simulate updating attendance
        $('.btn-link.btn-primary').on('click', function() {
            // Get the attendance data for editing
            const attendanceId = $(this).closest('tr').data(
                'attendance-id'); // Assuming attendance ID is stored in a data attribute
            const attendance = attendances.find(att => att.id ===
                attendanceId); // Fetch attendance from a global `attendances` array
            openAttendanceModal(attendance);
        });
        $('#addOverSaleModal').on('click', function() {
            $(this).modal({
                backdrop: false
            });
        });
    });
    </script>
</body>

</html>