@extends('layouts.elearning-layout')
@section('content')
    <div class="mb-3">
        <h3>Tambah Kelas Baru</h3>
        <span>{{ Request::path() }}</span>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="kode-kelas" class="mb-1">Kode kelas</label>
                                <input type="text" class="form form-control" name="kode_kelas" id="kode-kelas"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="nama-kelas" class="mb-1">Nama kelas</label>
                                <input type="text" class="form form-control" name="nama_kelas" id="nama-kelas"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="jenjang" class="mb-1">Daya tampung kelas</label>
                                <input type="text" class="form form-control" name="jenjang" id="jenjang" placeholder=""
                                    required>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="status-kelas" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer" name="status" id="status-kelas" required>
                                    <option selected>-- Pilih status --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tutup">Tutup</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="dosen-pa" class="mb-1">Dosen pembimbing akademik</label>
                                <select class="form form-select cursor-pointer" name="id_dosen_pa" id="dosen-pa" required>
                                    <option selected>-- Pilih dosen PA --</option>
                                    @foreach ($dosenPA as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
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
