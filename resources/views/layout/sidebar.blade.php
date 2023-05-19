<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('#') }}" class="brand-link">
        <img src="{{ asset('assets/images/favicon/company.png') }}" class="brand-image img-circle elevation-3" style="opacity: .5">
        <span class="brand-text font-weight-light">PWL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/karyawan') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Karyawan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/mata-kuliah') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Mata Kuliah</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/mahasiswa') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Mahasiswa</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/articles') }}" class="nav-link">
                        <i class="nav-icon fas fa-city"></i>
                        <p>Articles</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
                
            </ul>
            
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>