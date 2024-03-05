@extends('layouts.elearning-layout')
@section('content')
    <div class="mb-3">
        <h3>{{ $title ?? '???' }}</h3>
        <span>{{ Request::path() }}</span>
    </div>
    @yield('card-content')
@endsection
