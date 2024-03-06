<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover cursor-pointer" id="headerCollapse">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
            <li class="nav-item">
                <div class="nav-link">
                    <div class="fs-2">
                        @if (auth()->user()->role == 'Admin Pusat')
                            <button class="p-1 btn btn-primary">{{ auth()->user()->role }}</button>
                        @elseif(auth()->user()->role == 'Admin Kampus')
                            <button class="p-1 btn btn-warning">{{ auth()->user()->role }}</button>
                        @elseif(auth()->user()->role == 'Dosen')
                            <button class="p-1 btn btn-danger">{{ auth()->user()->role }}</button>
                        @else
                            <button class="p-1 btn btn-success">{{ auth()->user()->role }}</button>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <a href="/profile" class="text-dark">{{ $dataUser['nama'] }}</a>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="/main-assets/images/profile/user-1.jpg" alt="" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ route('e-learn.profile') }}"
                                class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">Profile saya</p>
                            </a>
                            <a href="" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-server fs-6"></i>
                                <p class="mb-0 fs-3">SIAKAD</p>
                            </a>
                            <a href="/logout" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
