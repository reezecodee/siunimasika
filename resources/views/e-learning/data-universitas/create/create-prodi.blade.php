@extends('layouts.elearning-layout')
@section('content')
    <div class="mb-3">
        <h3>Tambah Program Studi Baru</h3>
        <span>{{ Request::path() }}</span>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center mb-4">
                            <img src="/img/example.png" class="w-50 mb-2" id="preview" alt="" srcset="">
                            <div id="file-name" class="mb-2"></div>
                            <div class="d-flex justify-content-center">
                                <div style="display: none" class="btn btn-danger" id="cancel-btn"><i
                                        class="fas fa-times"></i> Batalkan</div>
                            </div>
                        </div>
                        <label for="picture" class="mb-1">Logo prodi</label>
                        <input type="file" name="picture" id="picture" class="form form-control">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="kode-prodi" class="mb-1">Kode program studi</label>
                                <input type="text" class="form form-control" name="kode_prodi" id="kode-prodi"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama-prodi" class="mb-1">Nama program studi</label>
                                <input type="text" class="form form-control" name="nama_prodi" id="nama-prodi"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="jenjang" class="mb-1">Jenjang</label>
                                <input type="text" class="form form-control" name="jenjang" id="jenjang"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status-prodi" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer" name="status" id="status-prodi" required>
                                    <option selected>-- Pilih status --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tutup">Tutup</option>
                                </select>
                            </div>
                            {{-- <div class="col-md-6 mb-2">
                                <label for="telepon-kampus" class="mb-1">Telepon kampus</label>
                                <input type="text" class="form form-control" name="telepon" id="telepon-kampus"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email-kampus" class="mb-1">Email kampus</label>
                                <input type="email" class="form form-control" name="email" id="email-kampus"
                                    placeholder="" required>
                            </div> --}}
                        </div>
                        <div class="d-flex justify-content-end mt-4 gap-2">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-power-off"></i> Reset
                                form</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan
                                data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
