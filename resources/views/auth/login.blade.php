@extends('auth.template.index')
@section('auth-content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center form-card-size">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="/main-assets/images/logos/dark-logo.svg" width="180" alt="">
                                </a>
                                <p class="text-center">Selamat Datang, silahkan login terlebih dahulu</p>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputNIPNIM" class="form-label">NIP Dosen / NIM
                                            Mahasiswa</label>
                                        <input type="text" class="form-control" id="exampleInputNIPNIM"
                                            aria-describedby="emailHelp" placeholder="NIP/NIM" name="nip_nim" required autocomplete="off" autofocus>
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Password" name="password" required autocomplete="off">
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-bold" href="./index.html">Lupa Password ?</a>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
