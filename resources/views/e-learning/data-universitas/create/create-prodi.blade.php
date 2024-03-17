@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-prodi.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                   <!-- image preview -->
                   @include('e-learning.template.component.image-preview', ['image' => ''])
                   <!-- end image preview --> 
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
                                <label for="status-prodi" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer @error('status') is-invalid @enderror"
                                    name="status" id="status-prodi" required>
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
                        </div>
                        @include('e-learning.template.component.button-form-group')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
