@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi kampus</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        <img src="{{ $dataKampus->picture ? asset('/img/logo-kampus/' . $dataKampus->picture) : asset('/img/example.png') }}"
                            class="w-50 mb-2" id="preview" alt="logo kampus" srcset="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="nama-kampus" class="mb-1">Nama kampus</label>
                            <input type="text" class="form form-control" value="{{ $dataKampus->nama_pt }}" readonly
                                disabled id="nama-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kode-kampus" class="mb-1">Kode kampus</label>
                            <input type="text" class="form form-control" value="{{ $dataKampus->kode_pt }}" readonly
                                disabled id="kode-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kategori-kampus" class="mb-1">Kategori kampus</label>
                            <input type="text" class="form form-control" value="{{ $dataKampus->kategori }}" readonly
                                disabled id="kategori-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="status-kampus" class="mb-1">Status kampus</label>
                            <input type="text" class="form form-control" value="{{ $dataKampus->status }}" readonly
                                disabled id="status-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="telepon-kampus" class="mb-1">Telepon</label>
                            <input type="text" class="form form-control" value="{{ $dataKampus->telepon }}" readonly
                                disabled id="telepon-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="email-kampus" class="mb-1">Email</label>
                            <input type="text" class="form form-control" value="{{ $dataKampus->email }}" readonly
                                disabled id="email-kampus">
                        </div>
                    </div>
                    <label for="alamat-kampus" class="mb-1 mt-2">Alamat kampus</label>
                    <textarea class="form form-control" rows="5" readonly disabled id="alamat-kampus">{{ $dataKampus->alamat }}</textarea>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ url()->current() }}/edit">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit kampus</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Fakultas & Program Studi</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <span>Data fakultas</span>
                        <button class="btn btn-outline-primary">Total: {{ $dataFakultas->count() }}</button>
                    </div>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Nama</th>
                                <th>Total prodi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataFakultas as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->picture ? asset('/img/logo-fakultas/' . $item->picture) : asset('/img/example.png') }}"
                                            alt="logo fakultas" srcset="" width="50">
                                    </td>
                                    <td>{{ $item->nama_fk }}</td>
                                    <td>{{ $item->prodi->count() }}</td>
                                    <td>
                                        <a href="/e-learning/data-fakultas/{{ $item->id }}"><button
                                                class="btn btn-primary"><i class="fas fa-share-square"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <span>Data program studi</span>
                        <button class="btn btn-outline-primary">Total: {{ $dataProdi->count() }}</button>
                    </div>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Logo</th>
                                <th>Jenjang</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataProdi as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->picture ? asset('/img/logo-prodi/' . $item->picture) : asset('/img/example.png') }}"
                                            alt="logo prodi" srcset="" width="50">
                                    </td>
                                    <td>{{ $item->jenjang }}</td>
                                    <td>{{ $item->nama_prodi }}</td>
                                    <td>
                                        <a href="/e-learning/data-prodi/{{ $item->id }}">
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
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Kelas</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <span>Data kelas</span>
                        <button class="btn btn-outline-primary">Total: {{ $dataKelas->count() }}</button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama kelas</th>
                                <th>Program studi</th>
                                <th>Fakultas</th>
                                <th>Daya tampung</th>
                                <th>Total mahasiswa</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKelas as $item)
                                <tr>
                                    <td>{{ $item->nama_kelas }}</td>
                                    <td>{{ $item->prodi->nama_prodi }}</td>
                                    <td>{{ $item->prodi->fakultas->nama_fk }}</td>
                                    <td>{{ $item->daya_tampung }}</td>
                                    <td>{{ $item->mahasiswa->count() }}</td>
                                    <td>{{ $item->status }}</td>
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
