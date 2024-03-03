@extends('layouts.elearning-layout')
@section('content')
    <div class="mb-3">
        <h3>Daftar Data Kampus</h3>
        <span>{{ Request::path() }}</span>
    </div>
    <div class="card">
        <div class="card-body">
            <a class="d-flex justify-content-end mb-3" href="{{ route('data-kampus.create') }}">
                <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah kampus</button>
            </a>
            <table id="datatable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kampus</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_kampus as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['kode_pt'] }}</td>
                            <td>{{ $item['nama_pt'] }}</td>
                            <td>{{ $item['kategori'] }}</td>
                            <td>{{ $item['status'] }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-window-restore"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="">Detail</a></li>
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
