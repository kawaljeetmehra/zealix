<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        <ul class="nav nav-secondary">
        <li class="nav-item">
    <a href="{{ Auth::user()->role_id == 3 ? route('dashboardSalesman') : route('dashboard') }}"
       class="{{ request()->routeIs('dashboard') || request()->routeIs('dashboardSalesman') ? 'active' : '' }}">
        <i class="fas fa-home"></i>
        <p>Dashboard</p>
    </a>
</li>

            <!-- Inventory Management Section -->
            <li class="nav-item submenu">
                <a data-bs-toggle="collapse" href="#inventory"
                    aria-expanded="{{ request()->routeIs('products.*') ? 'true' : 'false' }}">
                    <i class="fas fa-boxes"></i>
                    <p>Inventory Management</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->routeIs('products.*') ? 'show' : '' }}" id="inventory">
                    <ul class="nav nav-collapse">
                        <!-- Product Sub-section -->
                        @if(Auth::check() && Auth::user()->role_id == 1)
                        <li class="{{ request()->routeIs('products.index') ? 'active' : '' }}">
                            <a href="{{ route('products.index') }}">
                                <i class="fas fa-box"></i>

                                <p>Product</p>
                            </a>
                        </li>
                        @endif
                        
                        <!-- Stock Assign Sub-section -->
                        @if(Auth::check() && Auth::user()->role_id == 1 )
                        <li class="{{ request()->routeIs('products.stockAssign') ? 'active' : '' }}">
                            <a href="{{ route('products.stockAssign') }}">
                                <i class="fas fa-clipboard-list"></i>
                                <p>Stock Assign</p>
                            </a>
                        </li>
                        @endif
                        @if(Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 3 )
                        <!-- Stock Admin Sub-section -->
                        <li class="{{ request()->routeIs('stockAdmin') ? 'active' : '' }}">
                            <a href="{{ route('stockAdmin') }}">
                                <i class="fas fa-user-shield"></i>
                                <p>Stock Admin</p>
                            </a>
                        </li>
                        @endif
                        @if(Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3)
                        <!-- Stock Distributor Sub-section -->
                        <li class="{{ request()->routeIs('stockDistributor') ? 'active' : '' }}">
                            <a href="{{ route('stockDistributor') }}">
                                <i class="fas fa-truck"></i>
                                <p>Stock Distributor</p>
                            </a>
                        </li>
                        @endif


                       
                        @if(Auth::check() && Auth::user()->role_id == 1  )
                        <!-- Expired Stock Admin Sub-section -->
                        <li class="{{ request()->routeIs('expirestockAdmin') ? 'active' : '' }}">
                            <a href="{{ route('expirestockAdmin') }}">
                                <i class="fas fa-times-circle"></i>
                                <p>Expired Stock Admin</p>
                            </a>
                        </li>
                        @endif
                        @if(Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 2  )
                        <!-- Expired Stock Distributor Sub-section -->
                        <li class="{{ request()->routeIs('expirestockDistributor') ? 'active' : '' }}">
                            <a href="{{ route('expirestockDistributor') }}">
                                <i class="fas fa-exclamation-triangle"></i>
                                <p>Expired Stock Distributor</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

            <!-- Orders Management Section -->
            <li class="nav-item submenu">
                <a data-bs-toggle="collapse" href="#orders"
                    aria-expanded="{{ request()->routeIs('orders.*') ? 'true' : 'false' }}">
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
                                <!-- Use an appropriate icon for order status -->
                                <p>Order Status</p>
                            </a>
                        </li>
                        <li class="{{ request()->url() == url('/shipping-orders') ? 'active' : '' }}">
                <a href="{{ route('ShippingOrders.shippingDetails') }}">
                    <i class="fas fa-truck"></i> <!-- Optional icon -->
                    <p>Shipping Orders</p>
                </a>
            </li>
            <li class="{{ request()->url() == url('/returnorderstatus') ? 'active' : '' }}">
    <a href="{{ route('Returnorders.index') }}">
        <i class="fas fa-undo"></i> <!-- Optional icon -->
        <p>Return Orders</p>
    </a>
</li>

                    </ul>
                </div>
            </li>
            <!-- Salesman Management Section -->
            <li class="nav-item submenu">
            @if(Auth::check() && Auth::user()->role_id == 1 || Auth::user()->role_id == 3 )
                <a data-bs-toggle="collapse" href="#salesman"
                    aria-expanded="{{ request()->routeIs('salesman.*') ? 'true' : 'false' }}">
                    <i class="fas fa-users"></i>
                    <p>Salesman Management</p>
                    <span class="caret"></span>
                </a>
            @endif
                <div class="collapse {{ request()->routeIs('salesman.*') ? 'show' : '' }}" id="salesman">
                    <ul class="nav nav-collapse">
                        <!-- Assign Task Sub-section -->
                        @if(Auth::check() && Auth::user()->role_id == 1 )
                        <li class="{{ request()->url() == url('/assign') ? 'active' : '' }}">
                            <a href="{{ url('/assign') }}">
                                <i class="fas fa-tasks"></i>
                                <p>Assign Task</p>
                            </a>
                        </li>
                        @endif
                        <!-- Route Planning Sub-section -->
                        <li class="{{ request()->url() == url('/routePlanning') ? 'active' : '' }}">
                            <a href="{{ url('/routePlanning') }}">
                                <i class="fas fa-map-marked-alt"></i>
                                <p>Route Planning</p>
                            </a>
                        </li>
                        <!-- Attendance Sub-section -->
                        <li class="{{ request()->url() == url('/salesmanAttendance') ? 'active' : '' }}">
                            <a href="{{ url('/salesmanAttendance') }}">
                                <i class="fas fa-calendar-check"></i>
                                <p>Attendance</p>
                            </a>
                        </li>
                        <!-- Overall Sales Sub-section -->
                        <li class="{{ request()->url() == url('/oversales') ? 'active' : '' }}">
                            <a href="{{ url('/oversales') }}">
                                <i class="fas fa-chart-line"></i>
                                <p>Overall Sales</p>
                            </a>
                        </li>
                        <!-- Task Reports Sub-section -->
                        @if(Auth::check() && Auth::user()->role_id == 1 )
                        <li class="{{ request()->url() == url('/tasks') ? 'active' : '' }}">
                            <a href="{{ url('/tasks') }}">
                                <i class="fas fa-file-alt"></i>
                                <p>Task Reports</p>
                            </a>
                        </li>
                        <!-- Route Tracking Sub-section -->
                        <li class="{{ request()->url() == url('/routeTracking') ? 'active' : '' }}">
                            <a href="{{ url('/routeTracking') }}">
                                <i class="fas fa-map-marked-alt"></i>
                                <p>Route Tracking for TA and DA</p>
                            </a>
                        </li>
                        @endif
                      

                    </ul>
                </div>
            </li>
            @if(Auth::check() && Auth::user()->role_id == 1)
            <!-- Records Management Section -->
            <li class="nav-item submenu">
                <a data-bs-toggle="collapse" href="#records-management"
                    aria-expanded="{{ request()->routeIs('user.*') ? 'true' : 'false' }}">
                    <i class="fas fa-folder"></i>
                    <p>User Management</p>
                    <span class="caret"></span>
                </a>
                <div class="collapse {{ request()->routeIs('user.*') ? 'show' : '' }}" id="records-management">
                    <ul class="nav nav-collapse">
                        <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                            <a href="{{ route('user.index') }}">
                                <i class="fas fa-list"></i>
                                <p>Users</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>