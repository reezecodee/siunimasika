<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="" class="text-nowrap logo-img">
                <img src="/landingpage-assets/assets/images/image.png" width="170" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('e-learn.dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Universitas</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('e-learning/data-kampus*') ? 'active' : '' }}" href="{{ route('data-kampus.index') }}" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-university fs-4"></i>
                        </span>
                        <span class="hide-menu">Data kampus</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('e-learning/data-fakultas*') ? 'active' : '' }}" href="{{ route('data-fakultas.index') }}" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-vihara fs-4"></i>
                        </span>
                        <span class="hide-menu">Data fakultas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('e-learning/data-prodi*') ? 'active' : '' }}" href="{{ route('data-prodi.index') }}" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-graduation-cap fs-4"></i>
                        </span>
                        <span class="hide-menu">Data prodi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ Request::is('e-learning/data-kelas*') ? 'active' : '' }}" href="{{ route('data-kelas.index') }}" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-house-user fs-4"></i>
                        </span>
                        <span class="hide-menu">Data kelas</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Data Pengguna</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin-pusat" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-users-cog fs-4"></i>
                        </span>
                        <span class="hide-menu">Admin pusat</span>
                    </a>
                    <a class="sidebar-link" href="/admin-kampus" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-users-cog fs-4"></i>
                        </span>
                        <span class="hide-menu">Admin kampus</span>
                    </a>
                    <a class="sidebar-link" href="/dosen" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-user-graduate fs-4"></i>
                        </span>
                        <span class="hide-menu">Dosen</span>
                    </a>
                    <a class="sidebar-link" href="/mahasiswa" aria-expanded="false">
                        <span class="me-3" style="width: 3px">
                            <i class="fas fa-users fs-4"></i>
                        </span>
                        <span class="hide-menu">Mahasiswa</span>
                    </a>
                </li>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
