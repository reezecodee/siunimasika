@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('data-fakultas.update', $data->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <!-- image preview -->
                    @include('e-learning.template.component.image-preview', ['image' => $data->picture])
                    <!-- end image preview --> 
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="kode-fakultas" class="mb-1">Kode fakultas</label>
                                <input type="text" class="form form-control @error('kode_fk') is-invalid @enderror"
                                    name="kode_fk" id="kode-fakultas" placeholder=""
                                    value="{{ old('kode_fk') ?? $data->kode_fk }}" required>
                                @error('kode_fk')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama-fakultas" class="mb-1">Nama fakultas</label>
                                <input type="text" class="form form-control @error('nama_fk') is-invalid @enderror"
                                    name="nama_fk" id="nama-fakultas" placeholder=""
                                    value="{{ old('nama_fk') ?? $data->nama_fk }}" required>
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
                                    <option value="{{ old('status') ?? $data->status }}" selected>
                                        {{ old('status') ?? $data->status }}
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
                        </div>
                        @include('e-learning.template.component.button-form-group')
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
