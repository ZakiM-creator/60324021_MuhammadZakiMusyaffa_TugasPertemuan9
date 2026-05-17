@extends('layouts.app')

@section('title', 'Hasil Pencarian: ' . $keyword)

@push('styles')
    <style>
        mark.kw {
            background-color: #fff3cd;
            padding: 0 .15rem;
            border-radius: .2rem;
        }
    </style>
@endpush

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
            <li class="breadcrumb-item active">Pencarian</li>
        </ol>
    </nav>

    <h1 class="mb-2">Hasil Pencarian Kategori</h1>
    <p class="text-muted">
        Keyword: <span class="badge bg-warning text-dark">{{ $keyword }}</span>
        &middot; Ditemukan <strong>{{ $total_hasil }}</strong> kategori
    </p>

    @if ($total_hasil === 0)
        <div class="alert alert-warning">
            Tidak ada kategori yang cocok dengan kata kunci <strong>"{{ $keyword }}"</strong>.
        </div>
    @else
        <div class="row g-4">
            @foreach ($hasil as $kategori)
                @php
                    $highlight = function ($text) use ($keyword) {
                        if ($keyword === '') return e($text);
                        $pattern = '/(' . preg_quote($keyword, '/') . ')/i';
                        return preg_replace($pattern, '<mark class="kw">$1</mark>', e($text));
                    };
                @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h4 class="card-title mb-0">{!! $highlight($kategori['nama']) !!}</h4>
                                <span class="badge bg-primary">{{ $kategori['jumlah_buku'] }} buku</span>
                            </div>
                            <p class="card-text flex-grow-1">{!! $highlight($kategori['deskripsi']) !!}</p>
                            <a href="{{ route('kategori.show', $kategori['id']) }}" class="btn btn-outline-primary mt-3">
                                Lihat Detail &raquo;
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
            &laquo; Kembali ke Daftar Kategori
        </a>
    </div>
@endsection
