@extends('layouts.elearning-layout')
@section('content')
    <div class="mb-3">
        <h3>Daftar Data Prodi</h3>
        <span>{{ Request::path() }}</span>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Jenjang</th>
                        <th>Nama Prodi</th>
                        <th>Fakultas</th>
                        <th>Kampus</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_prodi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['kode_prodi'] }}</td>
                            <td>{{ $item['jenjang'] }}</td>
                            <td>{{ $item['nama_prodi'] }}</td>
                            <td>{{ $item->fakultas['nama_fk'] }}</td>
                            <td>{{ $item->fakultas->universitas['nama_pt'] }}</td>
                            <td>{{ $item['status'] }}</td>
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
