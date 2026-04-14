# Tugas Laravel Eloquent - Kelas 11 RPL

Proyek ini adalah implementasi tugas Laravel Eloquent untuk Kelas 11 Rekayasa Perangkat Lunak (RPL). Aplikasi ini mengimplementasikan sistem manajemen `Karyawan` dan `Divisi` dengan relasi One-to-Many menggunakan Eloquent ORM.

## Deskripsi Singkat

Aplikasi ini menggunakan Laravel 11 dengan fitur-fitur seperti:
- **Model & Relasi**: Relasi One-to-Many antara `Divisi` (hasMany) dan `Karyawan` (belongsTo).
- **Controller**: Menggunakan standar CRUD controller yang dilengkapi dengan fungsi `findOrFail` dan `validate`.
- **Fitur Pencarian**: Pencarian data karyawan berdasarkan nama pada halaman `index`.
- **Desain UI**: Menggunakan Custom Tailwind CSS dengan tema **Modern Dark Mode Emerald** untuk memberikan tampilan yang lebih elegan dan premium dibandingkan template standar.

## Cara Install & Menjalankan Aplikasi

1. Clone repositori ini atau ekstrak folder project.
2. Buka terminal di dalam folder project dan jalankan perintah install dependency:
   ```bash
   composer install
   npm install
   npm run build
   ```
   *(Catatan: pastikan Anda sudah menginstall Composer dan Node.js)*
3. Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   ```
4. Generate *application key*:
   ```bash
   php artisan key:generate
   ```
5. Sesuaikan konfigurasi database pada file `.env`. Contoh:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=tugas-eloquent
   DB_USERNAME=root
   DB_PASSWORD=
   ```
6. Jalankan **Migrations** untuk membuat tabel di database. **Penting**: Pastikan database sudah dibuat di MySQL (phpMyAdmin) sebelum menjalankan perintah ini!
   ```bash
   php artisan migrate
   ```
7. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
8. Buka browser dan akses: `http://127.0.0.1:8000/karyawan`

## Screenshot Tampilan Aplikasi

> **Catatan untuk Guru:** Berikut adalah dokumentasi Screenshot dari hasil pembuatan aplikasi tugas Eloquent.

### 1. Halaman Index (List Karyawan)
*(Menampilkan daftar tabel Karyawan yang sudah di-JOIN dengan Divisi beserta fitur Search)*

![Screenshot Halaman Index](path/to/screenshot-index.png)

---

### 2. Halaman Tambah Karyawan
*(Menampilkan Form untuk menambah data karyawan beserta pilihan relasi ke divisi)*

![Screenshot Halaman Tambah](path/to/screenshot-tambah.png)

---

### 3. Halaman Edit Karyawan
*(Menampilkan Form untuk mengubah data eksisting menggunakan metode findOrFail dan $karyawan->update())*

![Screenshot Halaman Edit](path/to/screenshot-edit.png)

---

> Dibuat untuk memenuhi Tugas Kelas 11 RPL - Materi Laravel Eloquent.
