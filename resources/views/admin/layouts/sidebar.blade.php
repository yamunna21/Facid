<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{ url('/dashboard') }}">
                <div class="logo-img">

                </div>
                <span class="text">FACID</span>
            </a>

        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">

                    <div class="nav-item active">
                        <a href="{{ url('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>

                    <div class="nav-item active">
                        <a href="{{ route('profile') }}"><i class="ik ik-user-check"></i><span>Profile</span></a>
                    </div>


                    @if (auth()->user()->role_id == 2)
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Institutions</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{ route('department.create') }}" class="menu-item">Create</a>
                                <a href="{{ route('department.index') }}" class="menu-item">View</a>

                            </div>
                        </div>

                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-file-text"></i><span>Administrators</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{ route('doctor.create') }}" class="menu-item">Create New Admin</a>
                                <a href="{{ route('doctor.index') }}" class="menu-item">View All List</a>

                            </div>
                        </div>
                          @endif
                    @if (auth()->user()->role_id == 1)
                          <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-file-text"></i><span>Record</span> <span
                                    class="badge badge-danger"></span></a>
                            <div class="submenu-content">
                                <a href="{{ route('community.create') }}" class="menu-item">Add New Record</a>
                                <a href="{{ route('community.index') }}" class="menu-item">View Record</a>

                            </div>
                        </div>
                    @endif
                        <div class="nav-item active">
                        <a href="https://www.moh.gov.my/index.php/pages/view/2573"><i class="ik ik-list"></i><span>Current Covid Info</span></a>
                    </div>


              

                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"
                            href="{{ route('logout') }}"><i
                                class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </nav>
            </div>
        </div>
    </div>
