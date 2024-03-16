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
                                <label for="status-kelas" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status-kelas" required>
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
                            <div class="col-md-4 mb-2">
                                <label for="prodi" class="mb-1">Program studi</label>
                                <select class="form form-select cursor-pointer @error('id_prodi') is-invalid @enderror"
                                    name="id_prodi" id="prodi" required>
                                    <option selected>-- Pilih prodi --</option>
                                    @foreach ($data_prodi as $item)
                                        <option value="{{ $item->id }} - {{ $item->id_fk }}">{{ $item->nama_prodi }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_prodi')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <!-- confirmation input, reset and submit button-->
                        @include('e-learning.template.confirm-submit')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
