@extends('layouts.elearning-layout')
@section('content')
    <div class="mb-3">
        <h3>Tambah Kampus Baru</h3>
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
                        <label for="picture" class="mb-1">Logo kampus</label>
                        <input type="file" name="picture" value="example.png" id="picture" class="form form-control">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="kode-kampus" class="mb-1">Kode kampus</label>
                                <input type="text" class="form form-control" name="kode_pt" id="kode-kampus"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama-kampus" class="mb-1">Nama kampus</label>
                                <input type="text" class="form form-control" name="nama_pt" id="nama-kampus"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kategori-kampus" class="mb-1">Kategori</label>
                                <select class="form form-select cursor-pointer" name="kategori" id="kategori-kampus"
                                    required>
                                    <option selected>-- Pilih kategori --</option>
                                    <option value="Pusat">Kampus Pusat</option>
                                    <option value="PSDKU">Kampus PSDKU</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status-kampus" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer" name="status" id="status-kampus" required>
                                    <option selected>-- Pilih status --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak aktif">Tidak aktif</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="telepon-kampus" class="mb-1">Telepon kampus</label>
                                <input type="text" class="form form-control" name="telepon" id="telepon-kampus"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email-kampus" class="mb-1">Email kampus</label>
                                <input type="email" class="form form-control" name="email" id="email-kampus"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="tanggal-berdiri-kampus" class="mb-1">Tanggal berdiri kampus</label>
                                <input type="date" class="form form-control" name="tanggal_berdiri"
                                    id="tanggal-berdiri-kampus" placeholder="" required>
                            </div>
                        </div>
                        <label for="alamat" class="mb-1 mt-2">Alamat kampus</label>
                        <textarea class="form form-control" name="alamat" id="alamat" rows="5"></textarea>
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
