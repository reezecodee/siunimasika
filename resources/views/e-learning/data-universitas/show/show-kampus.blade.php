@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <h5 class="mb-2">Informasi Kampus</h5>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        <img src="{{ $data_kampus->picture ? asset('/img/logo-kampus/' . $data_kampus->picture) : asset('/img/example.png') }}"
                            class="w-50 mb-2" id="preview" alt="logo kampus" srcset="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <label for="nama-kampus" class="mb-1">Nama kampus</label>
                            <input type="text" class="form form-control" value="{{ $data_kampus->nama_kampus }}" readonly
                                disabled id="nama-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kode-kampus" class="mb-1">Kode kampus</label>
                            <input type="text" class="form form-control" value="{{ $data_kampus->kode_kampus }}" readonly
                                disabled id="kode-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="kategori-kampus" class="mb-1">Kategori kampus</label>
                            <input type="text" class="form form-control" value="{{ $data_kampus->kategori }}" readonly
                                disabled id="kategori-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="email-kampus" class="mb-1">Email</label>
                            <input type="text" class="form form-control" value="{{ $data_kampus->email }}" readonly
                                disabled id="email-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="telepon-kampus" class="mb-1">Telepon</label>
                            <input type="text" class="form form-control" value="{{ $data_kampus->telepon }}" readonly
                                disabled id="telepon-kampus">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="status-kampus" class="mb-1">Status kampus</label>
                            <input type="text" class="form form-control" value="{{ $data_kampus->status }}" readonly
                                disabled id="status-kampus">
                        </div>
                    </div>
                    <label for="alamat-kampus" class="mb-1 mt-2">Alamat kampus</label>
                    <textarea class="form form-control" rows="5" readonly disabled id="alamat-kampus">{{ $data_kampus->alamat }}</textarea>
                    <div class="d-flex justify-content-end mt-4 gap-2">
                        <a href="{{ url()->current() }}/edit">
                            <button class="btn btn-primary"><i class="fas fa-edit"></i> Edit kampus</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
