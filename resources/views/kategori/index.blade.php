@extends('layouts.app')

@section('title', 'Daftar Kategori Buku')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="mb-1">Daftar Kategori Buku</h1>
            <p class="text-muted mb-0">Total {{ count($kategori_list) }} kategori tersedia.</p>
        </div>
        <form class="d-flex" action="{{ url('/kategori/search') }}" method="get">
            <input type="search" name="keyword" class="form-control me-2" placeholder="Cari kategori...">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
    </div>

    <div class="row g-4">
        @foreach ($kategori_list as $kategori)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="card-title mb-0">{{ $kategori['nama'] }}</h4>
                            <span class="badge bg-primary">{{ $kategori['jumlah_buku'] }} buku</span>
                        </div>
                        <p class="text-muted small mb-3">Kode: KTG-{{ str_pad($kategori['id'], 3, '0', STR_PAD_LEFT) }}</p>
                        <p class="card-text flex-grow-1">{{ $kategori['deskripsi'] }}</p>
                        <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-outline-primary mt-3">
                            Lihat Detail &raquo;
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
