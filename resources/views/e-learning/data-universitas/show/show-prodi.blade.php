@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Program Studi</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        <img src="{{ $data_prodi->picture ? asset('/img/logo-fakultas/' . $data_prodi->picture) : asset('/img/example.png') }}"
                            class="w-50 mb-2" id="preview" alt="logo fakultas" srcset="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="nama-kampus" class="mb-1">Nama kampus</label>
                            <input type="text" class="form form-control" value="{{ $data_prodi->universitas->nama_pt }}"
                                readonly disabled id="nama-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kode-prodi" class="mb-1">Kode program studi</label>
                            <input type="text" class="form form-control" value="{{ $data_prodi->kode_prodi }}" readonly
                                disabled id="kode-prodi">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nama-prodi" class="mb-1">Nama program studi</label>
                            <input type="text" class="form form-control" value="{{ $data_prodi->nama_prodi }}" readonly
                                disabled id="nama-prodi">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nama-fakultas" class="mb-1">Fakultas</label>
                            <input type="text" class="form form-control" value="{{ $data_prodi->fakultas->nama_fk }}"
                                readonly disabled id="nama-fakultas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="status-prodi" class="mb-1">Status program prodi</label>
                            <input type="text" class="form form-control" value="{{ $data_prodi->status }}" readonly
                                disabled id="status-prodi">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="jenjang-prodi" class="mb-1">Jenjang</label>
                            <input type="text" class="form form-control" value="{{ $data_prodi->jenjang }}" readonly
                                disabled id="jenjang-prodi">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kaprodi" class="mb-1">Kaprodi</label>
                            <input type="text" class="form form-control" value="{{ $data_prodi->kaprodi->nama }}" readonly
                                disabled id="kaprodi">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ url()->current() }}/edit">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit prodi</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Kelas</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <span>Data kelas</span>
                        <button class="btn btn-outline-primary">Total: {{ $data_kelas->count() }}</button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama kelas</th>
                                <th>Daya tampung</th>
                                <th>Total mahasiswa</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_kelas as $item)
                                <tr>
                                    <td> {{ $item->nama_kelas }}</td>
                                    <td> {{ $item->daya_tampung }}</td>
                                    <td> {{ $item->mahasiswa->count() }}</td>
                                    <td> {{ $item->status }}</td>
                                    <td>
                                        <a href="/e-learning/data-kelas/{{ $item->id }}">
                                            <button class="btn btn-primary"><i class="fas fa-share-square"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
