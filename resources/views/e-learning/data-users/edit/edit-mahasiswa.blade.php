@extends('e-learning.template.index')
@section('card-content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('data-admin-pusat.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="nip-nim" class="mb-1">Nomor Induk Pegawai (NIP)</label>
                                <input type="text" class="form form-control @error('nip_nim') is-invalid @enderror"
                                    name="nip_nim" id="nip-nim" placeholder=""
                                    value="{{ old('nip_nim') ?? $data->user->nip_nim }}" required>
                                @error('nip_nim')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama" class="mb-1">Nama lengkap</label>
                                <input type="text" class="form form-control @error('nama') is-invalid @enderror"
                                    name="nama" id="nama" placeholder="" value="{{ old('nama') ?? $data->nama }}"
                                    required>
                                @error('nama')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="jk" class="mb-1">Jenis kelamin</label>
                                <select class="form form-select cursor-pointer @error('jk') is-invalid @enderror"
                                    name="jk" id="jk" required>
                                    @if (old('jk') || $data->jk)
                                        <option value="{{ old('jk') ?? $data->jk }}" selected>{{ old('jk') ?? $data->jk }}
                                        </option>
                                    @else
                                        <option selected>-- Pilih jenis kelamin --</option>
                                    @endif
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status" required>
                                    @if (old('status') || $data->status)
                                        <option value="{{ old('status') ?? $data->status }}" selected>
                                            {{ old('status') ?? $data->status }}</option>
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
                            <div class="col-md-12 mb-2">
                                <label for="alamat" class="mb-1 mt-2">Alamat</label>
                                <textarea class="form form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" rows="5"
                                    required>{{ old('alamat') ?? $data->alamat }}</textarea>
                                @error('alamat')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- confirmation input, reset and submit button-->
                            @include('e-learning.template.confirm-submit')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
