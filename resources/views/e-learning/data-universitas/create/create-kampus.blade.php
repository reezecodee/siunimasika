@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-kampus.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center mb-4">
                            <img src="/img/example.png" class="w-50 mb-2" id="preview" alt="" srcset="">
                            <div id="file-name" class="mb-2"></div>
                            <div class="d-flex justify-content-center">
                                <div style="display: none" class="btn btn-danger" id="cancel-btn"><i
                                        class="fas fa-times"></i>
                                    Batalkan</div>
                            </div>
                        </div>
                        <label for="picture" class="mb-1">Logo kampus</label>
                        <input type="file" name="picture" value="example.png" id="picture"
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
                                <input type="text" class="form form-control @error('nama_kampus') is-invalid @enderror"
                                    name="nama_kampus" id="nama-kampus" value="{{ old('nama_kampus') }}" placeholder="" required>
                                @error('nama_kampus')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kode-kampus" class="mb-1">Kode kampus</label>
                                <input type="text" class="form form-control @error('kode_kampus') is-invalid @enderror"
                                    name="kode_kampus" id="kode-kampus" value="{{ old('kode_kampus') }}" placeholder="" required>
                                @error('kode_kampus')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kategori-kampus" class="mb-1">Kategori</label>
                                <select class="form form-select cursor-pointer @error('kategori') is-invalid @enderror"
                                    name="kategori" id="kategori-kampus" required>
                                    @if (old('kategori'))
                                        <option value="{{ old('kategori') }}" selected>Kampus {{ old('kategori') }}</option>
                                    @else
                                        <option selected>-- Pilih kategori --</option>
                                    @endif
                                    <option value="Utama">Kampus Utama</option>
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
                                    name="email" id="email-kampus" value="{{ old('email') }}" placeholder="" required>
                                @error('email')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="telepon-kampus" class="mb-1">Telepon kampus</label>
                                <input type="text" class="form form-control @error('telepon') is-invalid @enderror"
                                    name="telepon" id="telepon-kampus" value="{{ old('telepon') }}" placeholder=""
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
                                    @if (old('status'))
                                        <option value="{{ old('status') }}" selected>{{ old('status') }}</option>
                                    @else
                                        <option selected>-- Pilih status --</option>
                                    @endif
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak aktif">Tidak aktif</option>
                                </select>
                                @error('status')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <label for="alamat" class="mb-1 mt-2">Alamat kampus</label>
                        <textarea class="form form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"
                            rows="5">{{ old('alamat') }}</textarea>
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
                            <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Simpan
                                data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
