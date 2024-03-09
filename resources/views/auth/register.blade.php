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
                                <p class="text-center">Register untuk pendaftaran admin pusat</p>
                                @session('error')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <i class="fas fa-times"></i> {{ $value }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endsession
                                <form action="{{ route('auth.register') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="nama" class="form-label">Nama lengkap</label>
                                            <input type="text" class="form-control" id="nama"
                                                placeholder="Masukkan nama" name="nama" required autocomplete="off"
                                                autofocus value="{{ old('nama') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="NIP" class="form-label">NIP Admin Pusat</label>
                                            <input type="text" class="form-control" id="NIP"
                                                placeholder="Masukkan NIP" name="nip_nim" required autocomplete="off"
                                                autofocus value="{{ old('nip_nim') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="jk" class="form-label">Jenis kelamin</label>
                                            <select name="jk" id="" class="form-select">
                                                <option selected>-- Pilih gender --</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Masukkan email" name="email" required autocomplete="off"
                                                autofocus value="{{ old('email') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telepon" class="form-label">No. Telepon</label>
                                            <input type="text" class="form-control" id="telepon"
                                                placeholder="Masukkan telepon" name="telp" required autocomplete="off"
                                                autofocus value="{{ old('telp') }}">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                placeholder="Password" name="password" required autocomplete="off">
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword2"
                                                placeholder="Confirm password" name="confirm_password" required
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <input type="hidden" name="role" value="Admin Pusat">
                                    <input type="hidden" name="status" value="Aktif">
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endSection
