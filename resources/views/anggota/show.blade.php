<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Anggota - {{ $anggota['nama'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/anggota">Daftar Anggota</a></li>
                <li class="breadcrumb-item active">{{ $anggota['nama'] }}</li>
            </ol>
        </nav>

        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detail Anggota Perpustakaan</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="mb-3">{{ $anggota['nama'] }}</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th width="180">Kode Anggota</th>
                                <td>: <strong>{{ $anggota['kode'] }}</strong></td>
                            </tr>
                            <tr>
                                <th>Nama Lengkap</th>
                                <td>: {{ $anggota['nama'] }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>: <a href="mailto:{{ $anggota['email'] }}">{{ $anggota['email'] }}</a></td>
                            </tr>
                            <tr>
                                <th>Telepon</th>
                                <td>: {{ $anggota['telepon'] }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $anggota['alamat'] }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:
                                    @if ($anggota['status'] === 'Aktif')
                                        <span class="badge bg-success">{{ $anggota['status'] }}</span>
                                    @elseif ($anggota['status'] === 'Nonaktif')
                                        <span class="badge bg-secondary">{{ $anggota['status'] }}</span>
                                    @else
                                        <span class="badge bg-warning text-dark">{{ $anggota['status'] }}</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-light">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center"
                                         style="width: 100px; height: 100px; font-size: 36px;">
                                        {{ strtoupper(substr($anggota['nama'], 0, 1)) }}
                                    </div>
                                </div>
                                <h5 class="mb-1">{{ $anggota['nama'] }}</h5>
                                <p class="text-muted mb-2">{{ $anggota['kode'] }}</p>
                                @if ($anggota['status'] === 'Aktif')
                                    <span class="badge bg-success">Anggota Aktif</span>
                                @else
                                    <span class="badge bg-secondary">{{ $anggota['status'] }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <a href="/anggota" class="btn btn-secondary">
                &laquo; Kembali ke Daftar Anggota
            </a>
        </div>
    </div>
</body>
</html>
