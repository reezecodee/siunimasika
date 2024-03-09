@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-kelas.update', $data_kelas->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="kode-kelas" class="mb-1">Kode kelas</label>
                                <input type="text" class="form form-control @error('kode_kelas') is-invalid @enderror"
                                    name="kode_kelas" value="{{ $data_kelas->kode_kelas }}" id="kode-kelas" placeholder=""
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
                                    name="nama_kelas" value="{{ $data_kelas->nama_kelas }}" id="nama-kelas" placeholder=""
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
                                    name="daya_tampung" value="{{ $data_kelas->daya_tampung }}" id="daya-tampung"
                                    placeholder="" required>
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
                                    <option value="{{ $data_kelas->status }}" selected>{{ $data_kelas->status }}</option>
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
                                    <option value="{{ $data_kelas->id_prodi }} - {{ $data_kelas->id_fk }}" selected>
                                        {{ $data_kelas->prodi->nama_prodi }}</option>
                                    @foreach ($data_prodi as $item)
                                        <option value="{{ $item->id }} - {{ $item->id_fk }}">{{ $item->nama_prodi }}</option>
                                    @endforeach
                                </select>
                                @error('id_prodi')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="dosen-pa" class="mb-1">Dosen pembimbing akademik</label>
                                <select class="form form-select cursor-pointer @error('id_dosen_pa') is-invalid @enderror"
                                    name="id_dosen_pa" id="dosen-pa" required>
                                    <option value="{{ $data_kelas->dosenPA->id }}" selected>
                                        {{ $data_kelas->dosenPA->nama }}
                                    </option>
                                    @foreach ($dosen_pa as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                                @error('id_dosen_pa')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-8 mb-2">
                                <label for="kampus" class="mb-1">Kampus</label>
                                <select class="form form-select cursor-pointer @error('id_kampus') is-invalid @enderror"
                                    name="id_kampus" id="kampus" required>
                                    <option value="{{ $data_kelas->kampus->id }}" selected>
                                        {{ $data_kelas->kampus->nama_kampus }}</option>
                                    @foreach ($data_kampus as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kampus }}</option>
                                    @endforeach
                                </select>
                                @error('id_kampus')
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
                            <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Perbarui
                                data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
