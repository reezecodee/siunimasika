@extends('e-learning.template.index')
@section('card-content')
    <div class="card">
        <div class="card-body">
            @include('e-learning.template.component.download-create-button', ['link_create' => 'data-kelas.create'])
            <table id="datatable" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Kelas</th>
                        <th>Prodi</th>
                        <th>Fakultas</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_kelas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode_kelas }}</td>
                            <td>{{ $item->nama_kelas }}</td>
                            <td>{{ $item->prodi->nama_prodi }}</td>
                            <td>{{ $item->fakultas->nama_fk }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-window-restore"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ route('data-kelas.index') }}/{{ $item->id }}">Detail</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('data-kelas.index') }}/{{ $item->id }}/edit">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('data-kelas.destroy', $item->id) }}" method="post">
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
