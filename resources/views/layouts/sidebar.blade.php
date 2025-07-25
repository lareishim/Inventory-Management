<nav class="sidebar mt-3 rounded-4 sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('images/me.png') }}" alt="image" class="profile-img">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Lare</span>
                    <span class="text-secondary text-small">Project Manager</span>
                </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Icons</span>
                <i class="mdi mdi-contacts menu-icon"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a>
                    </li>
                </ul>
            </div>
        </li> --}}
        <div class="admin-dashboard">

            <ul class="nav flex-column">
                <!-- User Management -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#userManagement" aria-expanded="false"
                        aria-controls="userManagement">
                        <span class="menu-title">Manage Users</span>
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                    </a>
                    <div class="collapse" id="userManagement">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Product Management -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#productManagement" aria-expanded="false"
                        aria-controls="productManagement">
                        <span class="menu-title">Manage Products</span>
                        <i class="mdi mdi-cube-outline menu-icon"></i>
                    </a>
                    <div class="collapse" id="productManagement">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.products') }}">Products</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Activity Logs -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#activityLogs" aria-expanded="false"
                        aria-controls="activityLogs">
                        <span class="menu-title">Activity Logs</span>
                        <i class="mdi mdi-file-document-box menu-icon"></i>
                    </a>
                    <div class="collapse" id="activityLogs">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.logs') }}">Logs</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#userPages" aria-expanded="false"
                        aria-controls="userPages">
                        <span class="menu-title">User Pages</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-lock menu-icon"></i>
                    </a>
                    <div class="collapse" id="userPages">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('products') }}">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        </ul>
                    </div>
                </li>
        </div>
        {{-- <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html" target="_blank">
                <span class="menu-title">Documentation</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
            </a>
        </li> --}}
    </ul>
</nav>