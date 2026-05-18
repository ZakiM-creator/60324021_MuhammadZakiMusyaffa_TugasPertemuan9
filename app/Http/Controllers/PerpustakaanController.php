<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    // Method untuk halaman index
    public function index()
    {
        $nama_sistem = "Sistem Perpustakaan Laravel";
        $versi = "13.9.0";
        $total_buku = 5;

        $buku_list = [
            [
                'id' => 1,
                'judul' => 'Pemrograman PHP',
                'pengarang' => 'Budi Raharjo',
                'harga' => 75000,
                'stok' => 10
            ],
            [
                'id' => 2,
                'judul' => 'Laravel Framework',
                'pengarang' => 'Andi Nugroho',
                'harga' => 125000,
                'stok' => 5
            ],
            [
                'id' => 3,
                'judul' => 'MySQL Database',
                'pengarang' => 'Siti Aminah',
                'harga' => 95000,
                'stok' => 0
            ],
            [
                'id' => 4,
                'judul' => 'Web Design',
                'pengarang' => 'Dedi Santoso',
                'harga' => 85000,
                'stok' => 8
            ],
            [
                'id' => 5,
                'judul' => 'JavaScript Modern',
                'pengarang' => 'Rina Wijaya',
                'harga' => 80000,
                'stok' => 12
            ]
        ];

        return view('perpustakaan.index', compact('nama_sistem', 'versi', 'total_buku', 'buku_list'));
    }

    // Method untuk detail buku
    public function show($id)
    {
        // Data buku (nanti akan dari database)
        // Catatan: ID 1-10 disinkronkan dengan KategoriController::dataBukuPerKategori()
        $buku_list = [
            1 => [
                'id' => 1,
                'judul' => 'Pemrograman PHP',
                'pengarang' => 'Budi Raharjo',
                'penerbit' => 'Informatika',
                'tahun' => 2023,
                'harga' => 75000,
                'stok' => 10,
                'deskripsi' => 'Buku panduan lengkap pemrograman PHP dari dasar hingga advanced'
            ],
            2 => [
                'id' => 2,
                'judul' => 'Laravel Framework',
                'pengarang' => 'Andi Nugroho',
                'penerbit' => 'Graha Ilmu',
                'tahun' => 2024,
                'harga' => 125000,
                'stok' => 5,
                'deskripsi' => 'Membangun aplikasi web modern dengan Laravel framework'
            ],
            3 => [
                'id' => 3,
                'judul' => 'MySQL Database',
                'pengarang' => 'Siti Aminah',
                'penerbit' => 'Elex Media',
                'tahun' => 2023,
                'harga' => 95000,
                'stok' => 0,
                'deskripsi' => 'Mempelajari database MySQL untuk pengembang web'
            ],
            4 => [
                'id' => 4,
                'judul' => 'Web Design',
                'pengarang' => 'Dedi Santoso',
                'penerbit' => 'Andi Publisher',
                'tahun' => 2023,
                'harga' => 85000,
                'stok' => 8,
                'deskripsi' => 'Panduan praktis merancang antarmuka web yang menarik dan responsif'
            ],
            5 => [
                'id' => 5,
                'judul' => 'JavaScript Modern',
                'pengarang' => 'Rina Wijaya',
                'penerbit' => 'Informatika',
                'tahun' => 2024,
                'harga' => 80000,
                'stok' => 12,
                'deskripsi' => 'Mempelajari JavaScript modern (ES6+), async/await, dan paradigma fungsional'
            ],
            6 => [
                'id' => 6,
                'judul' => 'PostgreSQL Lanjutan',
                'pengarang' => 'Hendra Wijaya',
                'penerbit' => 'Gramedia',
                'tahun' => 2024,
                'harga' => 110000,
                'stok' => 6,
                'deskripsi' => 'Teknik lanjutan database PostgreSQL: indexing, optimasi query, dan replikasi'
            ],
            7 => [
                'id' => 7,
                'judul' => 'HTML & CSS Praktis',
                'pengarang' => 'Lina Marlina',
                'penerbit' => 'Elex Media',
                'tahun' => 2022,
                'harga' => 65000,
                'stok' => 15,
                'deskripsi' => 'Belajar HTML5 dan CSS3 dari nol untuk membangun halaman web modern'
            ],
            8 => [
                'id' => 8,
                'judul' => 'Flutter untuk Pemula',
                'pengarang' => 'Eko Prasetyo',
                'penerbit' => 'Informatika',
                'tahun' => 2024,
                'harga' => 130000,
                'stok' => 4,
                'deskripsi' => 'Membangun aplikasi mobile cross-platform dengan Flutter dan Dart'
            ],
            9 => [
                'id' => 9,
                'judul' => 'Android Native Kotlin',
                'pengarang' => 'Maya Sari',
                'penerbit' => 'Graha Ilmu',
                'tahun' => 2023,
                'harga' => 145000,
                'stok' => 7,
                'deskripsi' => 'Pengembangan aplikasi Android native menggunakan bahasa Kotlin'
            ],
            10 => [
                'id' => 10,
                'judul' => 'Jaringan Komputer Dasar',
                'pengarang' => 'Agus Salim',
                'penerbit' => 'Andi Publisher',
                'tahun' => 2022,
                'harga' => 90000,
                'stok' => 9,
                'deskripsi' => 'Konsep dasar jaringan komputer, protokol TCP/IP, dan topologi jaringan'
            ],
        ];

        // Cek apakah buku ada
        if (!isset($buku_list[$id])) {
            abort(404, 'Buku tidak ditemukan');
        }

        $buku = $buku_list[$id];

        return view('perpustakaan.show', compact('buku'));
    }

    // Method untuk halaman about
    public function about()
    {
        $info = [
            'nama' => 'Sistem Perpustakaan ',
            'versi' => 'Masih uji coba....',
            'deskripsi' => 'Sistem manajemen perpustakaan berbasis Laravel framework',
            'developer' => 'Muhammad Zaki Musyaffa',
            'tahun' => date('Y')
        ];

        return view('perpustakaan.about', compact('info'));
    }
}
