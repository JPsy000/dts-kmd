<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="#" class="brand-link">
            <!--end::Brand Image-->
            <span class="brand-text fw-light">DTS - KMD</span>
            <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">
                <li class="nav-item">
                    <a href="{{ URL::to('dashboard') }}" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Auth::user()->user_type == 'admin')
                    <li class="nav-header">ESSENTIALS</li>
                    <li class="nav-item">
                        <a href="{{ URL::to('admin-office') }}" class="nav-link">
                            <i class="nav-icon bi bi-building"></i>
                            <p>Office</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('admin-position') }}" class="nav-link">
                            <i class="nav-icon bi bi-people"></i>
                            <p>Position</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('admin-userslist') }}" class="nav-link">
                            <i class="nav-icon bi bi-person-lines-fill"></i>
                            <p>List of Users</p>
                        </a>
                    </li>
                @else
                @endif
                <!-- Additional menu items for 'users' user_type -->
                @if (Auth::user()->user_type == 'users')
                    <li class="nav-header">LEGAL DOCUMENTS</li>
                    <li class="nav-item">
                        <a href="{{ URL::to('user-document') }}" class="nav-link">
                            <i class="nav-icon bi bi-file-earmark-text-fill"></i>
                            <p>Documents</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('incoming-documents') }}" class="nav-link">
                            <i class="nav-icon bi bi-arrow-left"></i>
                            <p>Incoming</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('received-documents') }}" class="nav-link">
                            <i class="nav-icon bi bi-arrow-down"></i>
                            <p>Received</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('outgoing-documents') }}" class="nav-link">
                            <i class="nav-icon bi bi-arrow-right"></i>
                            <p>Outgoing</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('completed-documents') }}" class="nav-link">
                            <i class="nav-icon bi bi-check-square-fill"></i>
                            <p>Complete</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ URL::to('track-document') }}" class="nav-link">
                            <i class="nav-icon bi bi-search"></i>
                            <p>Track</p>
                        </a>
                    </li>
                    <li class="nav-header">SETTINGS</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-person-fill-gear"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-key-fill"></i>
                            <p>Change Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                            role="button">
                            <i class="bi bi-box-arrow-right"></i>
                            <p>Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                @else
                @endif
            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>
