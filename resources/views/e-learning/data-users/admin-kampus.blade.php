@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('data-admin-kampus.create') }}">
                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Tambah admin kampus</button>
                </a>
            </div>
            <table id="datatable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Kampus</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_admin_kampus as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('/img/profile-users/' . $item->photo_profile) }}"
                                    alt="photo {{ $item->nama }}" class="rounded-circle" width="30" srcset="">
                            </td>
                            <td>{{ $item->user->nip_nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jk }}</td>
                            <td>{{ $item->universitas->nama_pt }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-window-restore"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('data-admin-kampus.index') }}/{{ $item->id }}">Detail</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('data-admin-kampus.index') }}/{{ $item->id }}/edit">Perbarui</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('data-admin-kampus.destroy', $item->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" href="#">
                                                    Hapus
                                                </button>
                                            </form>
                                        </li>
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
