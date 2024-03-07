@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-prodi.store') }}" method="post" enctype="multipart/form-data">
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
                        <label for="picture" class="mb-1">Logo prodi</label>
                        <input type="file" name="picture" id="picture"
                            class="form form-control @error('picture') is-invalid @enderror">
                        @error('picture')
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="kode-prodi" class="mb-1">Kode program studi</label>
                                <input type="text" class="form form-control @error('kode_prodi') is-invalid @enderror"
                                    name="kode_prodi" value="{{ old('kode_prodi') }}" id="kode-prodi" placeholder=""
                                    required>
                                @error('kode_prodi')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama-prodi" class="mb-1">Nama program studi</label>
                                <input type="text" class="form form-control @error('nama_prodi') is-invalid @enderror"
                                    name="nama_prodi" value="{{ old('nama_prodi') }}" id="nama-prodi" placeholder=""
                                    required>
                                @error('nama_prodi')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="jenjang" class="mb-1">Jenjang</label>
                                <input type="text" class="form form-control @error('jenjang') is-invalid @enderror"
                                    name="jenjang" id="jenjang" value="{{ old('jenjang') }}" placeholder="" required>
                                @error('jenjang')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status-prodi" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status-prodi" required>
                                    @if (old('status'))
                                        <option value="{{ old('status') }}" selected>{{ old('status') }}</option>
                                    @else
                                        <option selected>-- Pilih status --</option>
                                    @endif
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tutup">Tutup</option>
                                </select>
                                @error('status')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="kampus" class="mb-1">Kampus</label>
                                <select class="form form-select cursor-pointer @error('id_kampus') is-invalid @enderror"
                                    name="id_kampus" id="kampus" required>
                                    <option selected>-- Pilih kampus --</option>
                                    @foreach ($data_kampus as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_pt }}</option>
                                    @endforeach
                                </select>
                                @error('id_kampus')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="fakultas" class="mb-1">Fakultas</label>
                                <select class="form form-select cursor-pointer @error('id_fk') is-invalid @enderror"
                                    name="id_fk" id="fakultas" required>
                                    <option selected>-- Pilih fakultas --</option>
                                    @foreach ($data_fakultas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_fk }}</option>
                                    @endforeach
                                </select>
                                @error('id_fk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kaprodi" class="mb-1">Kaprodi</label>
                                <select class="form form-select cursor-pointer @error('id_kaprodi') is-invalid @enderror"
                                    name="id_kaprodi" id="kaprodi" required>
                                    <option selected>
                                        -- Pilih kaprodi --
                                    </option>
                                    @foreach ($data_kaprodi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_kaprodi')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
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
