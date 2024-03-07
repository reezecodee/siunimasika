@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-kampus.update', $data_kampus->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center mb-4">
                            <img src="{{ $data_kampus->picture ? asset('/img/logo-kampus/' . $data_kampus->picture) : asset('/img/example.png') }}"
                                class="w-50 mb-2" id="preview" alt="logo kampus" srcset="">
                            <div id="file-name" class="mb-2"></div>
                            <div class="d-flex justify-content-center">
                                <div style="display: none" class="btn btn-danger" id="cancel-btn"><i
                                        class="fas fa-times"></i>
                                    Batalkan</div>
                            </div>
                        </div>
                        <label for="picture" class="mb-1">Logo kampus</label>
                        <input type="file" name="picture" value="{{ $data_kampus->picture }}" id="picture"
                            class="form form-control @error('picture') is-invalid @enderror">
                        @error('picture')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="nama-kampus" class="mb-1">Nama kampus</label>
                                <input type="text" class="form form-control @error('nama_pt') is-invalid @enderror"
                                    name="nama_pt" id="nama-kampus" value="{{ $data_kampus->nama_pt }}" placeholder=""
                                    required>
                                @error('nama_pt')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kode-kampus" class="mb-1">Kode kampus</label>
                                <input type="text" class="form form-control @error('kode_pt') is-invalid @enderror"
                                    name="kode_pt" id="kode-kampus" value="{{ $data_kampus->kode_pt }}" placeholder=""
                                    required>
                                @error('kode_pt')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kategori-kampus" class="mb-1">Kategori</label>
                                <select class="form form-select cursor-pointer @error('kategori') is-invalid @enderror"
                                    name="kategori" id="kategori-kampus" required>
                                    <option value="{{ $data_kampus->kategori }}" selected>{{ $data_kampus->kategori }}
                                    </option>
                                    <option value="Pusat">Kampus Pusat</option>
                                    <option value="PSDKU">Kampus PSDKU</option>
                                </select>
                                @error('kategori')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="email-kampus" class="mb-1">Email kampus</label>
                                <input type="email" class="form form-control @error('email') is-invalid @enderror"
                                    name="email" id="email-kampus" value="{{ $data_kampus->email }}" placeholder=""
                                    required>
                                @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="telepon-kampus" class="mb-1">Telepon kampus</label>
                                <input type="text" class="form form-control @error('telepon') is-invalid @enderror"
                                    name="telepon" id="telepon-kampus" value="{{ $data_kampus->telepon }}" placeholder=""
                                    required>
                                @error('telepon')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status-kampus" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status-kampus" required>
                                    <option value="{{ $data_kampus->status }}" selected>{{ $data_kampus->status }}
                                    </option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak aktif">Tidak aktif</option>
                                </select>
                                @error('status')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="tanggal-berdiri-kampus" class="mb-1">Tanggal berdiri kampus</label>
                                <input type="text"
                                    class="form form-control @error('tanggal_berdiri') is-invalid @enderror"
                                    name="tanggal_berdiri" id="tanggal-berdiri-kampus" placeholder=""
                                    value="{{ $data_kampus->tanggal_berdiri }}" required>
                                @error('tanggal_berdiri')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="alamat" class="mb-1 mt-2">Alamat kampus</label>
                        <textarea class="form form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                            value="{{ $data_kampus->alamat }}" rows="5">{{ $data_kampus->alamat }}</textarea>
                        @error('alamat')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="d-flex align-items-center mt-3">
                            <input type="checkbox" class="form-check-input cursor-pointer me-2" name=""
                                id="" required>
                            <span>Saya yakin data diatas sudah benar</span>
                        </div>
                        <div class="d-flex justify-content-end mt-4 gap-2">
                            <button type="reset" class="btn btn-danger"><i class="fas fa-power-off"></i> Reset
                                form</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Perbarui
                                data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
