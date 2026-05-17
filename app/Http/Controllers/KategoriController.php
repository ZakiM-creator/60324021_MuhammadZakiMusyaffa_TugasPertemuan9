<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Sumber data kategori (dummy).
     * Dikumpulkan dalam satu helper method agar konsisten antar action.
     */
    private function dataKategori(): array
    {
        return [
            [
                'id' => 1,
                'nama' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'jumlah_buku' => 25,
            ],
            [
                'id' => 2,
                'nama' => 'Database',
                'deskripsi' => 'Buku tentang database dan manajemen data',
                'jumlah_buku' => 15,
            ],
            [
                'id' => 3,
                'nama' => 'Web Development',
                'deskripsi' => 'Buku pengembangan web modern',
                'jumlah_buku' => 20,
            ],
            [
                'id' => 4,
                'nama' => 'Mobile Development',
                'deskripsi' => 'Buku pengembangan aplikasi mobile',
                'jumlah_buku' => 12,
            ],
            [
                'id' => 5,
                'nama' => 'Networking',
                'deskripsi' => 'Buku tentang jaringan komputer',
                'jumlah_buku' => 10,
            ],
        ];
    }

    /**
     * Daftar buku per kategori (dummy).
     */
    private function dataBukuPerKategori(): array
    {
        return [
            1 => [
                ['id' => 1, 'judul' => 'Pemrograman PHP',     'pengarang' => 'Budi Raharjo',  'tahun' => 2023, 'harga' => 75000,  'stok' => 10],
                ['id' => 2, 'judul' => 'Laravel Framework',   'pengarang' => 'Andi Nugroho',  'tahun' => 2024, 'harga' => 125000, 'stok' => 5],
                ['id' => 5, 'judul' => 'JavaScript Modern',   'pengarang' => 'Rina Wijaya',   'tahun' => 2024, 'harga' => 80000,  'stok' => 12],
            ],
            2 => [
                ['id' => 3, 'judul' => 'MySQL Database',      'pengarang' => 'Siti Aminah',   'tahun' => 2023, 'harga' => 95000,  'stok' => 0],
                ['id' => 6, 'judul' => 'PostgreSQL Lanjutan', 'pengarang' => 'Hendra Wijaya', 'tahun' => 2024, 'harga' => 110000, 'stok' => 6],
            ],
            3 => [
                ['id' => 4, 'judul' => 'Web Design',          'pengarang' => 'Dedi Santoso',  'tahun' => 2023, 'harga' => 85000,  'stok' => 8],
                ['id' => 7, 'judul' => 'HTML & CSS Praktis',  'pengarang' => 'Lina Marlina',  'tahun' => 2022, 'harga' => 65000,  'stok' => 15],
            ],
            4 => [
                ['id' => 8, 'judul' => 'Flutter untuk Pemula', 'pengarang' => 'Eko Prasetyo', 'tahun' => 2024, 'harga' => 130000, 'stok' => 4],
                ['id' => 9, 'judul' => 'Android Native Kotlin','pengarang' => 'Maya Sari',    'tahun' => 2023, 'harga' => 145000, 'stok' => 7],
            ],
            5 => [
                ['id' => 10, 'judul' => 'Jaringan Komputer Dasar', 'pengarang' => 'Agus Salim', 'tahun' => 2022, 'harga' => 90000, 'stok' => 9],
            ],
        ];
    }

    /**
     * Daftar Kategori.
     */
    public function index()
    {
        $kategori_list = $this->dataKategori();

        return view('kategori.index', compact('kategori_list'));
    }

    /**
     * Detail Kategori beserta daftar buku di dalamnya.
     */
    public function show(string $id)
    {
        $kategori = collect($this->dataKategori())->firstWhere('id', (int) $id);

        if (!$kategori) {
            abort(404, 'Kategori tidak ditemukan');
        }

        $buku_list = $this->dataBukuPerKategori()[$kategori['id']] ?? [];

        return view('kategori.show', compact('kategori', 'buku_list'));
    }

    /**
     * Handle redirect dari form search berbasis query string (?keyword=...)
     * menjadi URL dengan parameter path /kategori/search/{keyword}.
     */
    public function searchRedirect(Request $request)
    {
        $keyword = trim((string) $request->query('keyword', ''));

        if ($keyword === '') {
            return redirect()->route('kategori.index');
        }

        return redirect()->route('kategori.search', ['keyword' => $keyword]);
    }

    /**
     * Cari kategori berdasarkan keyword pada nama / deskripsi.
     */
    public function search(string $keyword)
    {
        $keyword = trim((string) $keyword);

        $hasil = collect($this->dataKategori())
            ->filter(function ($item) use ($keyword) {
                if ($keyword === '') {
                    return true;
                }
                $haystack = strtolower($item['nama'] . ' ' . $item['deskripsi']);
                return str_contains($haystack, strtolower($keyword));
            })
            ->values()
            ->all();

        return view('kategori.search', [
            'keyword'      => $keyword,
            'hasil'        => $hasil,
            'total_hasil'  => count($hasil),
        ]);
    }
}
