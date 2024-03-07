@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-fakultas.update', $data_fakultas->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                            class="form form-control @error('picture') is-invalid @enderror"
                            value="{{ $data_fakultas->picture }}">
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
                                    name="kode_fk" id="kode-fakultas" placeholder="" value="{{ $data_fakultas->kode_fk }}"
                                    required>
                                @error('kode_fk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama-fakultas" class="mb-1">Nama fakultas</label>
                                <input type="text" class="form form-control @error('nama_fk') is-invalid @enderror"
                                    name="nama_fk" id="nama-fakultas" placeholder="" value="{{ $data_fakultas->nama_fk }}"
                                    required>
                                @error('nama_fk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="kampus" class="mb-1">Kampus</label>
                                <select class="form form-select cursor-pointer @error('id_kampus') is-invalid @enderror"
                                    name="id_kampus" id="kampus" required>
                                    <option value="{{ $data_fakultas->universitas->id }}" selected>
                                        {{ $data_fakultas->universitas->nama_pt }}</option>
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
                                <label for="status-fakultas" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status-fakultas" required>
                                    <option value="{{ $data_fakultas->status }}" selected>{{ $data_fakultas->status }}
                                    </option>
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
                                <label for="dekan" class="mb-1">Dekan</label>
                                <select class="form form-select cursor-pointer @error('id_dekan') is-invalid @enderror"
                                    name="id_dekan" id="dekan" required>
                                    <option value="{{ $data_fakultas->dekan->id }}" selected>
                                        {{ $data_fakultas->dekan->nama }}</option>
                                    @foreach ($data_dekan as $item)
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
                            <button type="submit" class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Perbarui
                                data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
