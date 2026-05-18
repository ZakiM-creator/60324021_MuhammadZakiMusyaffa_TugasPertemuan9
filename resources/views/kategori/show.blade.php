@extends('layouts.app')

@section('title', 'Kategori - ' . $kategori['nama'])

@section('content')
<nav aria-label="breadcrumb">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form class="d-flex" action="{{ url('/kategori/search') }}" method="get">
            <input type="search" name="keyword" class="form-control me-2" placeholder="Cari kategori...">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
    </div><br>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
        <li class="breadcrumb-item active">{{ $kategori['nama'] }}</li>
    </ol>
</nav>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3 class="mb-0">{{ $kategori['nama'] }}</h3>
        <span class="badge bg-light text-primary">{{ $kategori['jumlah_buku'] }} buku</span>
    </div>
    <div class="card-body">
        <p class="lead mb-1">{{ $kategori['deskripsi'] }}</p>
        <small class="text-muted">ID Kategori: {{ $kategori['id'] }}</small>
    </div>

</div>

<h4 class="mb-3">Buku dalam kategori ini</h4>

@if (count($buku_list) === 0)
<div class="alert alert-warning">
    Belum ada buku terdaftar pada kategori <strong>{{ $kategori['nama'] }}</strong>.
</div>
@else
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th width="60">No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th class="text-center" width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku_list as $i => $buku)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td><strong>{{ $buku['judul'] }}</strong></td>
                    <td>{{ $buku['pengarang'] }}</td>
                    <td>{{ $buku['tahun'] }}</td>
                    <td>Rp {{ number_format($buku['harga'], 0, ',', '.') }}</td>
                    <td>
                        @if ($buku['stok'] > 0)
                        <span class="badge bg-success">{{ $buku['stok'] }}</span>
                        @else
                        <span class="badge bg-danger">Habis</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ url('/buku/' . $buku['id']) }}" class="btn btn-sm btn-info text-white">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<div class="mt-4">
    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
        &laquo; Kembali ke Daftar Kategori
    </a>
</div>
@endsection