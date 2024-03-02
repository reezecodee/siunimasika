@extends('layouts.elearning-layout')
@section('content')
    @session('success')
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> Selamat datang, <strong>{{ $dataUser['nama'] }}, </strong> {{ $value }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession
@endsection
