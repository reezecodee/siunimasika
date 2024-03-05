@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
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
                        <input type="file" name="picture" id="picture" class="form form-control">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="kode-fakultas" class="mb-1">Kode fakultas</label>
                                <input type="text" class="form form-control" name="kode_fk" id="kode-fakultas"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="nama-fakultas" class="mb-1">Nama fakultas</label>
                                <input type="text" class="form form-control" name="nama_fk" id="nama-fakultas"
                                    placeholder="" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="status-kampus" class="mb-1">Status</label>
                                <select class="form form-select cursor-pointer" name="status" id="status-kampus" required>
                                    <option selected>-- Pilih status --</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tutup">Tutup</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kampus" class="mb-1">Kampus</label>
                                <select class="form form-select cursor-pointer" name="id_kampus" id="kampus" required>
                                    <option selected>-- Pilih kampus --</option>
                                    @foreach ($kampus as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_pt }}</option>
                                    @endforeach
                                </select>
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
