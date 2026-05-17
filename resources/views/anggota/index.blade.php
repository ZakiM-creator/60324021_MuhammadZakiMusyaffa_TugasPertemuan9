<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <!-- Header atau navbar berisi beranda, buku, anggota, kategori dan about, inti kode <nav></nav> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                Sistem Perpustakaan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/perpustakaan') }}">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/anggota') }}">Anggota</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kategori.index') }}">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Daftar Anggota</li>
            </ol>
        </nav>

        <h1>Daftar Anggota Perpustakaan</h1>
        <p class="lead">Informasi anggota terdaftar pada sistem perpustakaan.</p>

        <div class="alert alert-info">
            <strong>Info:</strong> Total anggota terdaftar: {{ count($anggota_list) }}
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Data Anggota</h5>
                <span class="badge bg-light text-primary">{{ count($anggota_list) }} anggota</span>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th width="60">No</th>
                            <th>Kode Anggota</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th width="120" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota_list as $index => $anggota)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><strong>{{ $anggota['kode'] }}</strong></td>
                            <td>{{ $anggota['nama'] }}</td>
                            <td>{{ $anggota['email'] }}</td>
                            <td>
                                @if ($anggota['status'] === 'Aktif')
                                    <span class="badge bg-success">{{ $anggota['status'] }}</span>
                                @elseif ($anggota['status'] === 'Nonaktif')
                                    <span class="badge bg-secondary">{{ $anggota['status'] }}</span>
                                @else
                                    <span class="badge bg-warning text-dark">{{ $anggota['status'] }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="/anggota/{{ $anggota['id'] }}" class="btn btn-sm btn-info text-white">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-3">
            <a href="/" class="btn btn-secondary">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
