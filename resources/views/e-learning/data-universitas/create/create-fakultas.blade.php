@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-fakultas.store') }}" method="post" enctype="multipart/form-data">
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
                        <label for="picture" class="mb-1">Logo fakultas</label>
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
                            <div class="col-md-6 mb-2">
                                <label for="kode-fakultas" class="mb-1">Kode fakultas</label>
                                <input type="text" class="form form-control @error('kode_fk') is-invalid @enderror"
                                    name="kode_fk" id="kode-fakultas" placeholder="" value="{{ old('kode_fk') }}" required>
                                @error('kode_fk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama-fakultas" class="mb-1">Nama fakultas</label>
                                <input type="text" class="form form-control @error('nama_fk') is-invalid @enderror"
                                    name="nama_fk" id="nama-fakultas" placeholder="" value="{{ old('nama_fk') }}" required>
                                @error('nama_fk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status-fakultas" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status-fakultas" required>
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
                            <div class="col-md-6 mb-2">
                                <label for="fakultas" class="mb-1">Kampus</label>
                                <select class="form form-select cursor-pointer @error('id_kampus') is-invalid @enderror"
                                    name="id_kampus" id="fakultas" required>
                                    <option selected>-- Pilih kampus --</option>
                                    @foreach ($dataKampus as $item)
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
                                <label for="dekan" class="mb-1">Dekan</label>
                                <select class="form form-select cursor-pointer @error('id_dekan') is-invalid @enderror"
                                    name="id_dekan" id="dekan" required>
                                    <option selected>-- Pilih dekan --</option>
                                    @foreach ($dataDekan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_dekan')
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
