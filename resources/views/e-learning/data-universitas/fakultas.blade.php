@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('data-fakultas.create') }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah fakultas</button>
                </a>
            </div>
            <table id="datatable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama FK</th>
                        <th>Kampus</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_fakultas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_fk }}</td>
                            <td>{{ $item->nama_fk }}</td>
                            <td>{{ $item->universitas->nama_pt }}</td>
                            <td>{{ $item->universitas->kategori }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-window-restore"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Tambah</a></li>
                                        <li><a class="dropdown-item" href="#">Detail</a></li>
                                        <li><a class="dropdown-item" href="#">Perbarui</a></li>
                                        <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
