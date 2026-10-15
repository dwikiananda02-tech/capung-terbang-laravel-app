# CapungTerbang.id

Website galeri karya aerial untuk menampilkan foto dan video, lengkap dengan area admin untuk mengelola konten galeri.

> **Catatan:** README ini menjelaskan setup lokal dan struktur database berdasarkan skema proyek saat ini. Sesuaikan versi PHP dengan persyaratan yang tercantum di `composer.json` proyek Anda sebelum deployment.

## Fitur

- Galeri foto dan video.
- Penyimpanan metadata konten di MySQL.
- Upload file ke Laravel public storage.
- Halaman admin untuk melihat, memfilter, mengedit, dan menghapus konten galeri.
- Kategori konten melalui tabel `m_kategori`.

## Teknologi

- **Framework:** Laravel 10
- **Bahasa backend:** PHP
- **Database:** MySQL
- **Dependency manager:** Composer
- **Frontend:** Blade, HTML, CSS, JavaScript
- **File storage:** Laravel filesystem pada disk `public`

## Persyaratan sistem

- PHP **8.1 atau lebih baru** untuk Laravel 10; gunakan versi PHP yang juga memenuhi `composer.json` dan kompatibel dengan ekstensi server.
- Composer 2.x.
- MySQL 8.x atau versi kompatibel yang didukung hosting.
- Ekstensi PHP yang umum diperlukan Laravel, termasuk `BCMath`, `Ctype`, `cURL`, `DOM`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PCRE`, `PDO`, `PDO_MySQL`, `Tokenizer`, dan `XML`.
- Node.js dan npm hanya diperlukan jika proyek memiliki aset frontend yang harus dibangun melalui Vite/npm.

Periksa versi pada komputer Anda:

```bash
php -v
composer --version
mysql --version
```

## Instalasi lokal

### 1. Clone repository

Ganti URL berikut dengan URL repository GitHub Anda:

```bash
git clone https://github.com/dwikiananda02-tech/capung-terbang-laravel-app.git
cd REPOSITORY
```

### 2. Install dependency PHP

```bash
composer install
```

### 3. Siapkan file environment

```bash
cp .env.example .env
php artisan key:generate
```

Di Windows Command Prompt, jika `cp` tidak tersedia, salin `.env.example` secara manual menjadi `.env`.

### 4. Buat database MySQL

Buat database baru, misalnya `capung_terbang`, melalui phpMyAdmin atau MySQL. Kemudian sesuaikan konfigurasi `.env`:

```env
APP_NAME="CapungTerbang.id"
APP_ENV=local
APP_DEBUG=false
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=capung_terbang
DB_USERNAME=root
DB_PASSWORD=
```

Gunakan kredensial database milik Anda sendiri. Jangan commit file `.env` ke GitHub.

### 5. Buat tabel database

Pastikan migration untuk `m_kategori` dan `uploaded_file` sudah ada. Jalankan:

```bash
php artisan migrate
```

Jika database sudah memiliki tabel yang dibuat manual, jangan langsung menjalankan migration yang membuat tabel dengan nama sama. Backup database terlebih dahulu dan pastikan migration sesuai dengan kondisi database agar tidak terjadi konflik.

### 6. Siapkan penyimpanan file publik

```bash
php artisan storage:link
```

File galeri disimpan pada disk `public`, umumnya di:

```text
storage/app/public/uploaded-karya/
```

URL publik file dilayani melalui:

```text
public/storage/uploaded-karya/
```

Pastikan direktori storage dan cache dapat ditulisi oleh proses PHP pada server.

### 7. Jalankan aplikasi

```bash
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser.

Untuk development frontend, jika proyek menggunakan Vite dan memiliki `package.json`, jalankan:

```bash
npm install
npm run dev
```

## Struktur database

### Tabel `m_kategori`

| Kolom | Tipe | Ketentuan |
|---|---|---|
| `id` | `INT` | Primary key, auto increment |
| `nama_kategori` | `VARCHAR(50)` | Wajib diisi |
| `created_date` | `TIMESTAMP` | Wajib diisi |
| `created_by` | `VARCHAR(4)` | Wajib diisi |
| `updated_date` | `TIMESTAMP` | Wajib diisi |
| `updated_by` | `VARCHAR(4)` | Wajib diisi |

Data kategori awal yang digunakan:

| id | nama_kategori |
|---:|---|
| 1 | Landscape |
| 2 | Potrait |

Ejaan `Potrait` dipertahankan mengikuti data yang sudah ada. Jika ingin mengubahnya menjadi `Portrait`, ubah juga data di database.

### Tabel `uploaded_file`

| Kolom | Tipe | Ketentuan |
|---|---|---|
| `id` | `INT` | Primary key, auto increment |
| `tipe_file` | `ENUM('video','photo')` | Boleh `NULL` |
| `judul_karya` | `VARCHAR(255)` | Wajib diisi |
| `dokumen` | `VARCHAR(500)` | Path file, wajib diisi |
| `kategori_id` | `INT` | Wajib diisi; merujuk ke kategori |
| `harga` | `DECIMAL(10,0)` | Wajib diisi |
| `lokasi_pengambilan` | `VARCHAR(255)` | Wajib diisi |
| `created_date` | `TIMESTAMP` | Wajib diisi |
| `created_by` | `VARCHAR(10)` | Wajib diisi |
| `updated_date` | `TIMESTAMP` | Wajib diisi |
| `updated_by` | `VARCHAR(10)` | Wajib diisi |

> Catatan skema: struktur di atas mengikuti skema database yang diberikan. Pastikan migration mencerminkan kebutuhan timestamp dan kolom audit proyek. Jika ingin menambahkan foreign key, periksa data lama dan urutan pembuatan tabel terlebih dahulu.

## Membuat migration kategori

Buat file migration melalui Artisan:

```bash
php artisan make:migration create_m_kategori_table
```

Buka file baru di `database/migrations/` dan gunakan contoh berikut:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kategori', 50);
            $table->timestamp('created_date');
            $table->string('created_by', 4);
            $table->timestamp('updated_date');
            $table->string('updated_by', 4);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_kategori');
    }
};
```

Migration tersebut meniru kolom yang diberikan. Karena kolom timestamp tidak nullable dan tidak memiliki default, aplikasi harus memberikan nilai `created_date` dan `updated_date` saat memasukkan data.

### (Opsional) Seed kategori awal

Jika ingin otomatis menambahkan dua kategori awal ke database baru, buat seeder:

```bash
php artisan make:seeder KategoriSeeder
```

Isi `database/seeders/KategoriSeeder.php`:

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        DB::table('m_kategori')->insertOrIgnore([
            [
                'id' => 1,
                'nama_kategori' => 'Landscape',
                'created_date' => $now,
                'created_by' => '1',
                'updated_date' => $now,
                'updated_by' => '1',
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Potrait',
                'created_date' => $now,
                'created_by' => '1',
                'updated_date' => $now,
                'updated_by' => '1',
            ],
        ]);
    }
}
```

Jalankan:

```bash
php artisan db:seed --class=KategoriSeeder
```

Seeder di atas menggunakan `insertOrIgnore`; periksa hasilnya jika database sudah memiliki kategori dengan ID yang sama.

## Menyiapkan untuk GitHub

Sebelum push, periksa bahwa file berikut tidak ikut di-commit:

- `.env` (berisi kredensial dan `APP_KEY`).
- `vendor/`.
- File upload privat atau file besar yang tidak seharusnya menjadi bagian source code.
- Log, cache, dan file runtime.

Laravel biasanya sudah menyediakan `.gitignore`. Pastikan `.env` tetap diabaikan dan `.env.example` tersedia tanpa password atau secret.

Contoh perintah Git:

```bash
git init
git add .
git status
git commit -m "Initial commit CapungTerbang.id"
git branch -M main
git remote add origin https://github.com/USERNAME/REPOSITORY.git
git push -u origin main
```

Ganti `USERNAME` dan `REPOSITORY` dengan akun serta repository Anda. Jika repository sudah memiliki remote, periksa dengan `git remote -v` sebelum menambahkan remote baru.

## Deployment ke hosting

1. Pilih hosting yang mendukung versi PHP dan ekstensi Laravel yang dibutuhkan.
2. Buat database MySQL dan user database di panel hosting.
3. Upload/clone source code, lalu jalankan `composer install --no-dev --optimize-autoloader`.
4. Atur environment production: `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL`, dan kredensial database yang benar.
5. Buat `APP_KEY` hanya jika belum ada; jangan mengganti key aplikasi yang sudah dipakai tanpa memahami dampaknya.
6. Jalankan migration setelah memastikan database target benar dan sudah di-backup jika berisi data penting.
7. Jalankan `php artisan storage:link` jika symlink didukung oleh hosting.
8. Arahkan document root domain ke folder `public/`, bukan root repository.
9. Pastikan `storage/` dan `bootstrap/cache/` memiliki permission yang sesuai.
10. Uji halaman publik, login admin, upload, preview, edit, dan delete.

**Penting:** Jangan pernah mengaktifkan `APP_DEBUG=true` pada website production yang dapat diakses publik.

## Troubleshooting

- **Error koneksi database:** periksa `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.
- **Halaman error setelah mengubah `.env`:** jalankan `php artisan config:clear`.
- **File galeri tidak tampil:** periksa file di `storage/app/public/uploaded-karya/` dan jalankan `php artisan storage:link`.
- **Migration gagal:** periksa apakah tabel sudah dibuat manual dan apakah tipe kolom migration sesuai dengan database yang ada.
- **Dependency gagal di-install:** periksa versi PHP dengan `php -v` dan persyaratan platform di `composer.json`.

## Lisensi

Tambahkan informasi lisensi sebelum mendistribusikan atau menggunakan ulang source code ini.
