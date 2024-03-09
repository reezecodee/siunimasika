@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Kampus</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        <img src="{{ $data_fakultas->picture ? asset('/img/logo-fakultas/' . $data_fakultas->picture) : asset('/img/example.png') }}"
                            class="w-50 mb-2" id="preview" alt="logo fakultas" srcset="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="kode-fakultas" class="mb-1">Kode fakultas</label>
                            <input type="text" class="form form-control" value="{{ $data_fakultas->kode_fk }}" readonly
                                disabled id="kode-fakultas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="nama-fakultas" class="mb-1">Nama fakultas</label>
                            <input type="text" class="form form-control" value="{{ $data_fakultas->nama_fk }}" readonly
                                disabled id="nama-fakultas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="status-fakultas" class="mb-1">Status</label>
                            <input type="text" class="form form-control" value="{{ $data_fakultas->status }}" readonly
                                disabled id="status-fakultas">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="dekan-fakultas" class="mb-1">Dekan</label>
                            <input type="text" class="form form-control" value="{{ $data_fakultas->dekan->nama }}"
                                readonly disabled id="dekan-fakultas">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ url()->current() }}/edit">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit fakultas</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Program Studi</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-end align-items-center gap-2">
                        <span>Data program studi</span>
                        <button class="btn btn-outline-primary">Total: {{ $data_prodi->count() }}</button>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Jenjang</th>
                                <th>Program studi</th>
                                <th>Fakultas</th>
                                <th>Jumlah kelas</th>
                                <th>Total mahasiswa</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_prodi as $item)
                                <tr>
                                    <td>{{ $item->jenjang }}</td>
                                    <td>{{ $item->nama_prodi }}</td>
                                    <td>{{ $item->fakultas->nama_fk }}</td>
                                    <td>{{ $item->kelas->count() }}</td>
                                    <td>{{ $item->mahasiswa->count() }}</td>
                                    <td>{{ $item->status }}</td>
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
@endsection
