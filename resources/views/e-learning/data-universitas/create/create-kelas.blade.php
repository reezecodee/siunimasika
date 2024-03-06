@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-kelas.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="kode-kelas" class="mb-1">Kode kelas</label>
                                <input type="text" class="form form-control @error('kode_kelas') is-invalid @enderror"
                                    name="kode_kelas" value="{{ old('kode_kelas') }}" id="kode-kelas" placeholder=""
                                    required>
                                @error('kode_kelas')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="nama-kelas" class="mb-1">Nama kelas</label>
                                <input type="text" class="form form-control @error('nama_kelas') is-invalid @enderror"
                                    name="nama_kelas" value="{{ old('nama_kelas') }}" id="nama-kelas" placeholder=""
                                    required>
                                @error('nama_kelas')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="daya-tampung" class="mb-1">Daya tampung kelas</label>
                                <input type="text" class="form form-control @error('daya_tampung') is-invalid @enderror"
                                    name="daya_tampung" value="{{ old('daya_tampung') }}" id="daya-tampung" placeholder=""
                                    required>
                                @error('daya_tampung')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="status-kelas" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status-kelas" required>
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
                            <div class="col-md-4 mb-2">
                                <label for="prodi" class="mb-1">Program studi</label>
                                <select class="form form-select cursor-pointer @error('id_prodi') is-invalid @enderror"
                                    name="id_prodi" id="prodi" required>
                                    <option selected>-- Pilih prodi --</option>
                                    @foreach ($dataProdi as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_prodi }}</option>
                                    @endforeach
                                </select>
                                @error('id_prodi')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="fakultas" class="mb-1">Fakultas</label>
                                <select class="form form-select cursor-pointer @error('id_fk') is-invalid @enderror"
                                    name="id_fk" id="fakultas" required>
                                    <option selected>-- Pilih fakultas --</option>
                                    @foreach ($dataFakultas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_fk }}</option>
                                    @endforeach
                                </select>
                                @error('id_fk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="kampus" class="mb-1">Kampus</label>
                                <select class="form form-select cursor-pointer @error('id_kampus') is-invalid @enderror"
                                    name="id_kampus" id="kampus" required>
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
                            <div class="col-md-4 mb-2">
                                <label for="dosen-pa" class="mb-1">Dosen pembimbing akademik</label>
                                <select class="form form-select cursor-pointer @error('id_dosen_pa') is-invalid @enderror"
                                    name="id_dosen_pa" id="dosen-pa" required>
                                    <option selected>-- Pilih dosen PA --</option>
                                    @foreach ($dosenPA as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>
                                @error('id_dosen_pa')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
