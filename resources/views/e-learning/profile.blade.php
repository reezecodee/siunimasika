@extends('layouts.elearning-layout')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <img src="/img/profile/{{ $dataUser['photo_profile'] }}" alt="" srcset=""
                        class="w-100 rounded-circle shadow mb-3" id="preview">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop"><i class="fas fa-edit"></i> Edit profile picture</button>
                </div>
                <div class="col-md-9">
                    <h5 class="mb-3">Overview</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Indeks prestasi kumulatif</h5>
                                    <span class="text-primary">IPK: 4.00 (semester 1)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Satuan kredit semester</h5>
                                    <span class="text-primary">18 SKS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Program Studi</h5>
                                    <span class="text-primary">S1 Sistem Informasi</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Kelas</h5>
                                    <span class="text-primary">S1 Sistem Informasi 1A</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Crop your new profile picture</h1>
                    <button type="button" id="btn-close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center gap-5">
                        <div class="w-50" align="center">
                            <label class="mb-2">Crop gambar</label>
                            <div id="display_image_div">
                                <img name="display_image_data" id="display_image_data" src="/img/upload-picture.png"
                                    alt="Picture">
                            </div>
                            <input type="hidden" name="cropped_image_data" id="cropped_image_data">
                            <br>
                            <input type="file" name="browse_image" id="browse_image">
                        </div>
                        <div class="w-50" align="center">
                            <label class="mb-2">Preview</label>
                            <div id="cropped_image_result">
                                <img id="crop_result" class="crop-result" src="/img/preview-picture.png" />
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="crop_button">Crop</button>
                    <button type="button" class="btn btn-primary" id="upload_button" onclick="upload()">
                        Upload
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- <form action="{{ route('e-learn.update-profile', $dataUser['id']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT') --}}
    <div class="card">
        <div class="card-body">
            <div class="card-title mb-3">
                <h5>Data Diri</h5>
            </div>
            <hr>
            @if (!$dataUser['alamat'])
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-warning"></i> Peringatan!</strong> Harap lengkapi data yang masih kosong
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="nama"><strong>Nama</strong></label>
                    <input type="text" class="form form-control mt-2" id="nama" placeholder="Nama lengkap"
                        value="{{ $dataUser['nama'] }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="nip"><strong>Nomor Induk
                            {{ auth()->user()->role == 'Mahasiswa' ? 'Mahasiswa' : 'Pegawai' }}</strong></label>
                    <input type="text" class="form form-control mt-2" id="nip"
                        placeholder="Nomor Induk Pegawai" value="{{ auth()->user()->nip_nim }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="jk"><strong>Jenis kelamin</strong></label>
                    <input type="text" class="form form-control mt-2" id="jk" placeholder="Jenis kelamin"
                        value="{{ $dataUser['jk'] }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="email"><strong>Email</strong></label>
                    <input type="text" class="form form-control mt-2" id="email" placeholder="Email"
                        value="{{ auth()->user()->email }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="no-telp"><strong>Nomor telepon</strong></label>
                    <input type="number" class="form form-control mt-2" id="no-telp" placeholder="No. Telp"
                        value="{{ auth()->user()->telp }}" disabled>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status"><strong>Status</strong></label>
                    <input type="text" class="form form-control mt-2" id="status" placeholder="Status"
                        value="{{ $dataUser['status'] }}" disabled>
                </div>
                <div class="col-md-8 mb-3">
                    <label for="alamat"><strong>Alamat</strong></label>
                    <textarea class="form form-control" name="alamat" id="alamat" rows="4">{{ $dataUser['alamat'] }}</textarea>
                </div>
            </div>
            <button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
        </div>
    </div>
    {{-- </form> --}}

    <div class="card">
        <div class="card-body">
            <div class="card-title mb-4">
                <h5>Ganti Password</h5>
                <p style="font-size: 14px">Ganti password Anda secara berkala untuk menghidari pengguna yang tidak di
                    inginkan
                </p>
            </div>
            <form action="{{ route('e-learn.change-password') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="current-password"><strong>Password saat ini</strong></label>
                        <input type="text" name="current_password" id="current-password"
                            class="form form-control mt-2" placeholder="Current password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="confirm-password"><strong>Konfirmasi password</strong></label>
                        <input type="password" name="confirm_password" id="confirm-password"
                            class="form form-control mt-2" placeholder="Confirm password" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="new-password"><strong>Password baru</strong></label>
                        <input type="password" name="new_password" id="new-password" class="form form-control mt-2"
                            placeholder="New password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Ganti password</button>
            </form>
        </div>
    </div>
@endsection
