@extends('layouts.elearning-layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <img src="https://avatars.githubusercontent.com/u/97270237?v=4" alt="" srcset=""
                            class="w-100 rounded-circle mb-3">
                        <label for="photo_profile">
                            <button type="button" class="btn btn-outline-primary">Edit profile</button>
                        </label>
                        <input type="file" name="photo_profile" id="photo_profile" class="d-none">
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="w-full p-2 border border-primary rounded">
                                    <span class="text-sm">Kelas yang Anda ambil</span>
                                    <h4 class="mt-2">6 Kelas</h4>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="w-full p-2 border border-primary rounded">
                                    <span class="text-sm">Kelas yang Anda ambil</span>
                                    <h4 class="mt-2">6 Kelas</h4>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="w-full p-2 border border-primary rounded">
                                    <span class="text-sm">Kelas yang Anda ambil</span>
                                    <h4 class="mt-2">6 Kelas</h4>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="w-full p-2 border border-primary rounded">
                                    <span class="text-sm">Kelas yang Anda ambil</span>
                                    <h4 class="mt-2">6 Kelas</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-title mb-3">
                <h5>Data diri</h5>
            </div>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-warning"></i> Peringatan!</strong> Harap lengkapi data yang masih kosong
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="nama"><strong>Nama lengkap</strong></label>
                        <input type="text" class="form form-control mt-2" id="nama" placeholder="Nama lengkap"
                            disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="nip"><strong>Nomor Induk Pegawai (NIP)</strong></label>
                        <input type="text" class="form form-control mt-2" name="" id="nip"
                            placeholder="Nomor Induk Pegawai" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="jk"><strong>Jenis kelamin</strong></label>
                        <input type="text" class="form form-control mt-2" name="" id="jk"
                            placeholder="Jenis kelamin" disabled>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="email"><strong>Alamat email</strong></label>
                        <input type="text" class="form form-control mt-2" name="email" id="email"
                            placeholder="Email">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="no-telp"><strong>Nomor telepon / WA</strong></label>
                        <input type="number" class="form form-control mt-2" name="no_telp" id="no-telp"
                            placeholder="No. Telp">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="status"><strong>Status</strong></label>
                        <input type="text" class="form form-control mt-2" name="" id="status"
                            placeholder="Status" disabled>
                    </div>
                </div>
                <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="card-title mb-4">
                <h5>Ganti password</h5>
                <p style="font-size: 14px">Ganti password Anda secara berkala untuk menghidari pengguna yang tidak di
                    inginkan
                </p>
            </div>
            <form action="" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="current-password"><strong>Password saat ini</strong></label>
                        <input type="text" name="current-password" id="current-password"
                            class="form form-control mt-2" placeholder="Current password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="new-password"><strong>Password baru</strong></label>
                        <input type="text" name="password" id="new-password" class="form form-control mt-2"
                            placeholder="New password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="confirm-password"><strong>Konfirmasi password</strong></label>
                        <input type="text" name="confirm-password" id="confirm-password"
                            class="form form-control mt-2" placeholder="Confirm password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Ganti password</button>
            </form>
        </div>
    </div>
@endsection
