<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\KategoriController;

// Route default
Route::get('/', function () {
    return view('welcome');
});

// Route baru - return text
Route::get('/hello', function () {
    return 'Hello dari Laravel!';
});

// Route dengan HTML
Route::get('/info', function () {
    return '<h1>Sistem Perpustakaan</h1><p>Selamat datang!</p>';
});

// Route dengan JSON
Route::get('/buku', function () {
    return [
        'judul' => 'Laravel Programming',
        'pengarang' => 'John Doe',
        'harga' => 150000
    ];
});

// Route dengan parameter required
Route::get('/buku/{id}', function ($id) {
    return "Detail buku dengan ID: " . $id;
});

// Route dengan parameter optional (DINONAKTIFKAN agar tidak konflik dengan KategoriController)
// Route::get('/kategori/{nama?}', function ($nama = 'Semua Kategori') {
//     return "Menampilkan kategori: " . $nama;
// });

// Route dengan multiple parameters
Route::get('/search/{kategori}/{keyword}', function ($kategori, $keyword) {
    return "Cari buku kategori: $kategori dengan keyword: $keyword";
});

// Named route
Route::get('/perpustakaan', function () {
    return 'Halaman Perpustakaan';
})->name('perpus.home');

// Gunakan named route
Route::get('/test-route', function () {
    $url = route('perpus.home');
    return "URL perpustakaan: " . $url;
});

Route::get('/perpustakaan', function () {
    // Data untuk dikirim ke view
    $nama_sistem = "Sistem Perpustakaan Laravel";
    $versi = "13.x";
    $total_buku = 5;

    $buku_list = [
        [
            'judul' => 'Pemrograman PHP',
            'pengarang' => 'Budi Raharjo',
            'harga' => 75000,
            'stok' => 10
        ],
        [
            'judul' => 'Laravel Framework',
            'pengarang' => 'Andi Nugroho',
            'harga' => 125000,
            'stok' => 5
        ],
        [
            'judul' => 'MySQL Database',
            'pengarang' => 'Siti Aminah',
            'harga' => 95000,
            'stok' => 0
        ],
        [
            'judul' => 'Web Design',
            'pengarang' => 'Dedi Santoso',
            'harga' => 85000,
            'stok' => 8
        ],
        [
            'judul' => 'JavaScript Modern',
            'pengarang' => 'Rina Wijaya',
            'harga' => 80000,
            'stok' => 12
        ]
    ];

    // Menggunakan compact() - lebih praktis
    return view('perpustakaan.index', compact('nama_sistem', 'versi', 'total_buku', 'buku_list'));
    
});

// Route menggunakan Controller
Route::get('/perpustakaan', [PerpustakaanController::class, 'index']);
Route::get('/buku/{id}', [PerpustakaanController::class, 'show']);
Route::get('/about', [PerpustakaanController::class, 'about']);

// =====================================================
// Routing untuk Data Anggota Perpustakaan
// =====================================================

// Data anggota (dummy) - dipakai bersama oleh kedua route
$anggota_data = [
    [
        'id' => 1,
        'kode' => 'AGT-001',
        'nama' => 'Budi Santoso',
        'email' => 'budi@email.com',
        'telepon' => '081234567890',
        'alamat' => 'Jakarta',
        'status' => 'Aktif'
    ],
    [
        'id' => 2,
        'kode' => 'AGT-002',
        'nama' => 'Siti Aminah',
        'email' => 'siti@email.com',
        'telepon' => '081298765432',
        'alamat' => 'Bandung',
        'status' => 'Aktif'
    ],
    [
        'id' => 3,
        'kode' => 'AGT-003',
        'nama' => 'Andi Pratama',
        'email' => 'andi@email.com',
        'telepon' => '082134567891',
        'alamat' => 'Surabaya',
        'status' => 'Nonaktif'
    ],
    [
        'id' => 4,
        'kode' => 'AGT-004',
        'nama' => 'Rina Wijaya',
        'email' => 'rina@email.com',
        'telepon' => '085712345678',
        'alamat' => 'Yogyakarta',
        'status' => 'Aktif'
    ],
    [
        'id' => 5,
        'kode' => 'AGT-005',
        'nama' => 'Dedi Santoso',
        'email' => 'dedi@email.com',
        'telepon' => '087812345679',
        'alamat' => 'Semarang',
        'status' => 'Pending'
    ],
    [
        'id' => 6,
        'kode' => 'AGT-006',
        'nama' => 'Maya Sari',
        'email' => 'maya@email.com',
        'telepon' => '089912345670',
        'alamat' => 'Medan',
        'status' => 'Aktif'
    ],
];

// Route daftar anggota
Route::get('/anggota', function () use ($anggota_data) {
    $anggota_list = $anggota_data;
    return view('anggota.index', compact('anggota_list'));
});

// Route detail anggota berdasarkan ID
Route::get('/anggota/{id}', function ($id) use ($anggota_data) {
    $anggota = collect($anggota_data)->firstWhere('id', (int) $id);

    if (!$anggota) {
        abort(404, 'Anggota tidak ditemukan');
    }

    return view('anggota.show', compact('anggota'));
})->whereNumber('id');

// =====================================================
// Routing untuk Kategori Buku (KategoriController)
// =====================================================
// Catatan: route 'search' DIDAFTARKAN SEBELUM '{id}' agar tidak
// tertangkap oleh wildcard {id}.
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/search', [KategoriController::class, 'searchRedirect'])->name('kategori.search.redirect');
Route::get('/kategori/search/{keyword}', [KategoriController::class, 'search'])->name('kategori.search');
Route::get('/kategori/{id}', [KategoriController::class, 'show'])
    ->whereNumber('id')
    ->name('kategori.show');
