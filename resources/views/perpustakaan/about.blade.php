@extends('layouts.app')

@section('title', 'Tentang - ' . $info['nama'])

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">About</li>
        </ol>
    </nav>

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Tentang {{ $info['nama'] }}</h3>
        </div>
        <div class="card-body">
            <p class="lead">{{ $info['deskripsi'] }}</p>

            <hr>

            <table class="table table-borderless">
                <tr>
                    <th width="180">Nama Sistem</th>
                    <td>: {{ $info['nama'] }}</td>
                </tr>
                <tr>
                    <th>Versi</th>
                    <td>: <span class="badge bg-info text-dark">{{ $info['versi'] }}</span></td>
                </tr>
                <tr>
                    <th>Developer</th>
                    <td>: {{ $info['developer'] }}</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>: {{ $info['tahun'] }}</td>
                </tr>
            </table>

            <hr>

            <h5 class="mb-3">Fitur Utama</h5>
            <ul>
                <li>Manajemen data buku</li>
                <li>Manajemen data anggota</li>
                <li>Pengelompokan kategori buku</li>
                <li>Pencarian kategori dengan highlight keyword</li>
            </ul>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ url('/') }}" class="btn btn-secondary">&laquo; Kembali ke Beranda</a>
    </div>
@endsection
