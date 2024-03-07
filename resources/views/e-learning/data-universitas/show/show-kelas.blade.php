@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Kelas</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="nama-kampus" class="mb-1">Nama kampus</label>
                            <input type="text" class="form form-control" value="{{ $data_kelas->universitas->nama_pt }}"
                                readonly disabled id="nama-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kode-kelas" class="mb-1">Kode kelas</label>
                            <input type="text" class="form form-control" value="{{ $data_kelas->kode_kelas }}" readonly
                                disabled id="kode-kelas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nama-kelas" class="mb-1">Nama kelas</label>
                            <input type="text" class="form form-control" value="{{ $data_kelas->nama_kelas }}" readonly
                                disabled id="nama-kelas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nama-fakultas" class="mb-1">Fakultas</label>
                            <input type="text" class="form form-control" value="{{ $data_kelas->fakultas->nama_fk }}"
                                readonly disabled id="nama-fakultas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="status-kelas" class="mb-1">Status kelas</label>
                            <input type="text" class="form form-control" value="{{ $data_kelas->status }}" readonly
                                disabled id="status-kelas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="daya-tampung" class="mb-1">Daya tampung</label>
                            <input type="text" class="form form-control" value="{{ $data_kelas->daya_tampung }}" readonly
                                disabled id="daya-tampung">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="dosenPA" class="mb-1">Dosen pembimbing akademik</label>
                            <input type="text" class="form form-control" value="{{ $data_kelas->dosenPA->nama }}" readonly
                                disabled id="dosenPA">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ url()->current() }}/edit">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit kelas</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Mahasiswa</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <span>Data mahasiswa</span>
                        <button class="btn btn-outline-primary">Total: {{ $data_mahasiswa->count() }}</button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis kelamin</th>
                                <th>Tahun masuk</th>
                                <th>Semester</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_mahasiswa as $item)
                                <tr>
                                    <td> {{ $item->user->nip_nim }}</td>
                                    <td> {{ $item->nama }}</td>
                                    <td> {{ $item->jk }}</td>
                                    <td> {{ $item->tahun_masuk }}</td>
                                    <td> {{ $item->semester }}</td>
                                    <td> {{ $item->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
