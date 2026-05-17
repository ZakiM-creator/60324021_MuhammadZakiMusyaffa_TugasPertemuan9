# Pengenalan Framework Laravel & MVC

> Tugas Pertemuan 9 — Routing, Controller dan View dengan Laravel Framework

---

## Daftar Route

| Method | URL | Controller / Action | Keterangan |
|--------|-----|---------------------|------------|
| GET | `/` | Closure | Halaman welcome |
| GET | `/perpustakaan` | `PerpustakaanController@index` | Daftar buku |
| GET | `/buku/{id}` | `PerpustakaanController@show` | Detail buku |
| GET | `/about` | `PerpustakaanController@about` | Halaman about |
| GET | `/anggota` | Closure | Daftar anggota |
| GET | `/anggota/{id}` | Closure | Detail anggota |
| GET | `/kategori` | `KategoriController@index` | Daftar kategori |
| GET | `/kategori/{id}` | `KategoriController@show` | Detail kategori |
| GET | `/kategori/search/{keyword}` | `KategoriController@search` | Cari kategori |

---

## Screenshot Hasil

### 1. Halaman Home
> Source: [`resources/views/welcome.blade.php`](resources/views/welcome.blade.php)

[![Home](screenshots/01-home.png)](screenshots/01-home.png)

---

### 2. Daftar Buku (`/perpustakaan`)
> Source: [`resources/views/perpustakaan/index.blade.php`](resources/views/perpustakaan/index.blade.php)<br>
> Controller: [`app/Http/Controllers/PerpustakaanController.php`](app/Http/Controllers/PerpustakaanController.php)

[![Daftar Buku](screenshots/02-perpustakaan-index.png)](screenshots/02-perpustakaan-index.png)

---

### 3. Detail Buku (`/buku/1`)
> Source: [`resources/views/perpustakaan/show.blade.php`](resources/views/perpustakaan/show.blade.php)<br>
> Controller: [`app/Http/Controllers/PerpustakaanController.php`](app/Http/Controllers/PerpustakaanController.php)

[![Detail Buku](screenshots/03-buku-detail.png)](screenshots/03-buku-detail.png)

---

### 4. Halaman About (`/about`)
> Source: [`resources/views/perpustakaan/about.blade.php`](resources/views/perpustakaan/about.blade.php) <br>
> Controller: [`app/Http/Controllers/PerpustakaanController.php`](app/Http/Controllers/PerpustakaanController.php)

[![About](screenshots/04-about.png)](screenshots/04-about.png)

---

### 5. Daftar Anggota (`/anggota`)
> Source: [`resources/views/anggota/index.blade.php`](resources/views/anggota/index.blade.php) <br>
> Route: [`routes/web.php`](routes/web.php)

[![Daftar Anggota](screenshots/05-anggota-index.png)](screenshots/05-anggota-index.png)

---

### 6. Detail Anggota (`/anggota/1`)
> Source: [`resources/views/anggota/show.blade.php`](resources/views/anggota/show.blade.php) <br>
> Route: [`routes/web.php`](routes/web.php)

[![Detail Anggota](screenshots/06-anggota-detail.png)](screenshots/06-anggota-detail.png)

---

### 7. Daftar Kategori (`/kategori`)
> Source: [`resources/views/kategori/index.blade.php`](resources/views/kategori/index.blade.php) <br>
> Controller: [`app/Http/Controllers/KategoriController.php`](app/Http/Controllers/KategoriController.php)

[![Daftar Kategori](screenshots/07-kategori-index.png)](screenshots/07-kategori-index.png)

---

### 8. Detail Kategori (`/kategori/1`)
> Source: [`resources/views/kategori/show.blade.php`](resources/views/kategori/show.blade.php) <br>
> Controller: [`app/Http/Controllers/KategoriController.php`](app/Http/Controllers/KategoriController.php)

[![Detail Kategori](screenshots/08-kategori-detail.png)](screenshots/08-kategori-detail.png)

---

### 9. Pencarian Kategori (`/kategori/search/programming`)
> Source: [`resources/views/kategori/search.blade.php`](resources/views/kategori/search.blade.php) <br>
> Controller: [`app/Http/Controllers/KategoriController.php`](app/Http/Controllers/KategoriController.php)

[![Pencarian Kategori](screenshots/09-kategori-search.png)](screenshots/09-kategori-search.png)