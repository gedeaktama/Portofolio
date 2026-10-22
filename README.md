# Website Portofolio Profesional — Gede Erik Aktama, S.Pd., M.Pd.

Website personal branding, akademik, publikasi riset, dan portofolio profesional resmi **Gede Erik Aktama, S.Pd., M.Pd.** yang dibangun secara utuh (*full-stack*) berbasis **Laravel 12**, panel admin **Filament v5**, database relasional **MySQL / MariaDB**, antarmuka **Blade Templates**, **Tailwind CSS**, **Alpine.js**, dan ikon vektor **Lucide Icons**.

---

## 1. Identitas Pemilik & Nilai Profesional

* **Nama Lengkap & Gelar:** Gede Erik Aktama, S.Pd., M.Pd.
* **Tagline Utama:** *"Akademisi, Inovator Teknologi, dan Penggerak Transformasi Digital."*
* **Peran & Jabatan Kunci:**
  * **Ketua Program Studi & Dosen Tetap Sistem Komputer** — Universitas Parna Raya (UNIPAR) Manado (2021 – Sekarang).
  * **Fasilitator Nasional Koding dan Kecerdasan Artifisial (KKA)** — Kemdikdasmen RI (2024 – Sekarang).
  * **CEO & Founder** — PT Aktama Digital Antika (*Aktama Digital* & *Aktama Music*) (2022 – Sekarang).
  * **Asesor & Pengelola Tata Kelola Rekognisi Pembelajaran Lampau (RPL)** — UNIPAR, mengacu pada Kepdirjen 91/2024.
* **Fokus Keilmuan & Riset:** Kecerdasan Artifisial (AI), *Computer Vision* (Deteksi Manusia Berbasis Jaringan Komputasi Ringan), *Internet of Things* (IoT & Smart Control), Kurikulum Berbasis *Outcome-Based Education* (OBE), dan Digitalisasi UMKM.

---

## 2. Arsitektur Teknologi (*Tech Stack*)

| Lapisan | Komponen | Versi / Spesifikasi |
|---|---|---|
| **Backend Framework** | Laravel | 12.x (PHP 8.2+) |
| **Admin Panel** | Filament Admin Builder | v5.x (dengan Livewire v4) |
| **Database** | MySQL / MariaDB (XAMPP) | Database: `erik_portfolio` (18 tabel relasional) |
| **Frontend UI** | Blade Templating Engine | Komponen Modular, SEO-friendly, Semantik HTML5 |
| **Styling** | Tailwind CSS v4 & PostCSS | Custom glassmorphism, palet navy (`#070c18`), aksen cyan & blue |
| **Interaktivitas JS** | Alpine.js & JavaScript | Mobile toggle, modal pratinjau, interaksi dinamis |
| **Ikonografi** | Lucide Icons | Format SVG vektor responsif |
| **Build Tools** | Vite 7.x & `@tailwindcss/vite` | *Production bundle* terkompilasi optimal |
| **SEO & Feed** | XML Sitemap & Robots.txt | Schema.org Person, Twitter Card, OpenGraph metadata |

---

## 3. Fitur Utama & Struktur Halaman Publik

Semua halaman terhubung langsung ke database dinamis tanpa data statis palsu:

1. **Beranda (`/`):**
   * *Hero section* interaktif dengan foto asli, status ketersediaan kolaborasi, jabatan resmi, dan *quick stats*.
   * Ringkasan pilar peran: Akademik UNIPAR, Fasilitator KKA Kemdikdasmen, CEO Aktama Digital, dan Riset AI/IoT.
   * *Preview* publikasi terakreditasi SINTA, proyek teknologi unggulan, PKM Woloan, dan kegiatan pelatihan.
   * Call to Action (CTA) untuk kemitraan riset dan undangan pemateri.
2. **Profil Lengkap (`/profil`):**
   * Biografi profesional komprehensif.
   * Riwayat pendidikan (S1 Pendidikan Teknik Informatika UNDIKSHA, S2 Pendidikan Teknologi dan Kejuruan UNDIKSHA).
   * Jejak karir & pengalaman organisasi akademik.
   * Kompetensi & keahlian teruji (AI, Computer Vision, IoT, Kurikulum OBE, RPL, Web Engineering).
3. **Direktori Publikasi Ilmiah (`/publikasi` & `/publikasi/{slug}`):**
   * Menampilkan artikel ilmiah terverifikasi SINTA 4 & SINTA 5.
   * Fitur pencarian instan berdasarkan judul, penulis, dan kata kunci.
   * Filter kategori riset dan filter tahun terbit.
   * Detail halaman dengan abstrak lengkap, metadata sitasi, DOI/URL jurnal asli, dan artikel terkait.
4. **Penelitian & Pengabdian Masyarakat (`/riset-dan-pkm`):**
   * Riset algoritma *Machine Learning*, deteksi manusia *lightweight deep learning*, dan *IoT smart control*.
   * Dokumentasi PKM Woloan (*digital marketing* Rumah Panggung Kayu) dan pelatihan institusional.
5. **Katalog Proyek Teknologi (`/proyek` & `/proyek/{slug}`):**
   * Galeri proyek terbagi atas: AI & Vision, IoT & Automation, Web System, Digital Marketing, dan Academic Tech.
   * Filter kategori dinamis dan halaman detail solusi, teknologi *stack*, dan tautan demo/repo.
6. **Akademik & Tata Kelola RPL (`/akademik`):**
   * Informasi Program Studi Sistem Komputer UNIPAR.
   * Struktur daftar Program Studi aktif UNIPAR (S1 Sistem Komputer, S1 TI, S1 SI, S1 Bisnis Digital, S1 Kewirausahaan, S1 Hukum Bisnis, D3 Manajemen Informatika).
   * Landasan regulasi RPL berbasis Kepdirjen 91/2024 (RPL Tipe A & Tipe B).
7. **Pelatihan & Lokakarya (`/pelatihan`):**
   * Dokumentasi pemateri pelatihan AI Polres Mitra, fasilitator KKA nasional, seminar dan lokakarya dosen.
8. **Ekosistem Aktama (`/ventures`):**
   * Profil **PT Aktama Digital Antika** (pelatihan AI kantor, Word Masterclass, pengembangan aplikasi).
   * Profil **Aktama Music** (karya musik digital nusantara & visual AI sinematik).
9. **Blog & Wawasan Digital (`/blog` & `/blog/{slug}`):**
   * Sistem artikel edukasi dengan estimasi waktu baca, counter *view*, tagar, dan rekomendasi tulisan.
10. **Kontak & Kolaborasi (`/kontak`):**
    * Formulir pesan terproteksi **CSRF**, **Server-side Validation**, dan **IP Rate Limiting**.
    * Pesan langsung tersimpan ke database dan dapat dibaca di dashboard admin.
11. **SEO Teknis:**
    * `/sitemap.xml` dinamis terindeks otomatis.
    * `/robots.txt` ramah mesin pencari.

---

## 4. Filament Admin Dashboard

Panel admin beralamat di:
```
http://localhost/contoh/public/admin
```

### Menu Navigasi Admin:
1. **Identitas & Biodata:**
   * Profil Utama (*Tagline, Bio, Kontak, Foto, Lokasi*)
   * Riwayat Pendidikan (*Gelar, Institusi, Tahun*)
   * Pengalaman & Karir (*Jabatan, Instansi, Masa Kerja*)
   * Keahlian & Kompetensi (*Kategori, Tingkat Persentase*)
2. **Akademik & Riset:**
   * Publikasi Ilmiah (*Judul, Jurnal, Akreditasi SINTA, DOI, Abstrak*)
   * Penelitian (*Skema, Tim, Luaran, Tahun*)
   * Pengabdian (PKM) (*Mitra Kerjasama, Dampak, Dokumentasi*)
3. **Portofolio & Kegiatan:**
   * Proyek Teknologi (*Tangkapan Layar, Tech Stack, Status*)
   * Kategori Proyek (*AI, IoT, Web, dll.*)
   * Pelatihan & Seminar (*Penyelenggara, Peran Pemateri, Lokasi*)
4. **Artikel & Blog:**
   * Artikel Blog (*Rich Text Editor, Cover, Status Publikasi, Slug*)
   * Kategori Blog
   * Tag Artikel
5. **Media & Komunikasi:**
   * Galeri Media
   * Tautan Sosial (*LinkedIn, Google Scholar, SINTA, GitHub, YouTube*)
   * Pesan Masuk (*Inbox formulir kontak publik*)
6. **Sistem & Pengaturan:**
   * Pengaturan Website (*Meta SEO Global, Kontak, Status Situs*)

---

## 5. Prasyarat Sistem

* **PHP:** Versi 8.2 atau lebih baru dengan ekstensi: `pdo_mysql`, `curl`, `mbstring`, `fileinfo`, `gd`/`imagick`, `intl`.
* **Database:** MySQL 5.7+ / MariaDB 10.4+ (misalnya bawaan XAMPP).
* **Web Server:** Apache atau Nginx.
* **Node.js & NPM:** Node.js v18+ dan NPM v9+.
* **Composer:** Composer v2.5+.

---

## 6. Panduan Instalasi Lokal (Lingkungan XAMPP)

Jika proyek di-clone atau dipindahkan ke mesin baru:

### Langkah 1: Siapkan Direktori & Dependensi PHP
```bash
cd C:\xampp\htdocs\contoh
composer install
```

### Langkah 2: Konfigurasi File Environment (`.env`)
Salin file `.env.example` ke `.env`:
```bash
copy .env.example .env
php artisan key:generate
```

Pastikan variabel database pada `.env` telah disesuaikan:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=erik_portfolio
DB_USERNAME=root
DB_PASSWORD=
```

### Langkah 3: Siapkan Database di MySQL
Buka phpMyAdmin atau jalankan di MySQL CLI:
```sql
CREATE DATABASE IF NOT EXISTS erik_portfolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Langkah 4: Jalankan Migration & Seeder Otentik
```bash
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
```

### Langkah 5: Kompilasi Aset Frontend (Vite)
```bash
npm install
npm run build
```

---

## 7. Kredensial Admin Default

Setelah seeder dijalankan, akun admin resmi telah tersedia:
* **URL Login:** `http://localhost:8080/fortofolio/public/admin/login`
* **Email:** `erikaktama@parnaraya.ac.id`
* **Password:** `password123`
*(Detail catatan kredensial lengkap tersimpan di [docs/KREDENSIAL.md](docs/KREDENSIAL.md))*

### Menambahkan Akun Admin Baru Secara Aman:
Gunakan perintah Artisan bawaan Filament:
```bash
php artisan make:filament-user
```
Masukkan nama, email institusi, dan password yang kuat.

---

## 8. Panduan Menjalankan Server Lokal

### Menggunakan Apache XAMPP (Direkomendasikan):
1. Buka XAMPP Control Panel dan jalankan modul **Apache** dan **MySQL**.
2. Akses website melalui:
   * **Frontend:** `http://localhost/contoh/public/`
   * **Admin Portal:** `http://localhost/contoh/public/admin`

### Menggunakan Built-in PHP Server:
```bash
php artisan serve
```
Akses di `http://127.0.0.1:8000`.

---

## 9. Panduan Deployment Produksi

### Opsi A: Deployment ke VPS (Ubuntu / Debian dengan Nginx)
1. **Clone repository** ke `/var/www/erik-portfolio`.
2. **Set hak akses folder:**
   ```bash
   sudo chown -R www-data:www-data /var/www/erik-portfolio/storage /var/www/erik-portfolio/bootstrap/cache
   sudo chmod -R 775 /var/www/erik-portfolio/storage /var/www/erik-portfolio/bootstrap/cache
   ```
3. **Konfigurasi Nginx Virtual Host** mengarah ke direktori `/var/www/erik-portfolio/public`:
   ```nginx
   server {
       listen 80;
       server_name erikaktama.com www.erikaktama.com;
       root /var/www/erik-portfolio/public;

       add_header X-Frame-Options "SAMEORIGIN";
       add_header X-Content-Type-Options "nosniff";

       index index.php;
       charset utf-8;

       location / {
           try_files $uri $uri/ /index.php?$query_string;
       }

       location ~ \.php$ {
           fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
           fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
           include fastcgi_params;
       }

       location ~ /\.(?!well-known).* {
           deny all;
       }
   }
   ```
4. **Optimasi Laravel untuk Produksi:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
5. Pasang sertifikat SSL gratis via Let's Encrypt:
   ```bash
   sudo certbot --nginx -d erikaktama.com -d www.erikaktama.com
   ```

### Opsi B: Shared Hosting (cPanel)
1. Upload seluruh isi proyek kecuali folder `public` ke folder root (misalnya `/home/username/laravel_app`).
2. Pindahkan seluruh isi folder `public` ke dalam folder `public_html`.
3. Sesuaikan `index.php` pada `public_html`:
   ```php
   require __DIR__.'/../laravel_app/vendor/autoload.php';
   $app = require_once __DIR__.'/../laravel_app/bootstrap/app.php';
   ```
4. Buat database MySQL pada cPanel Wizard dan import migrasi database.

---

## 10. Hasil Pengujian Aktual (*Verification Matrix*)

Pengujian dilakukan secara langsung di lingkungan lokal XAMPP (Apache + MySQL):

| No | Fitur / Endpoint | Jenis Pengujian | Hasil Aktual | Status |
|:---:|---|---|---|:---:|
| 1 | `GET /` | Homepage rendering & data binding | HTTP 200 (64 KB rendered) | **LULUS** |
| 2 | `GET /profil` | Karir, riwayat studi, keahlian teruji | HTTP 200 (40 KB rendered) | **LULUS** |
| 3 | `GET /publikasi` | Listing publikasi SINTA, filter, cari | HTTP 200 (31 KB rendered) | **LULUS** |
| 4 | `GET /publikasi/{slug}` | Detail publikasi, sitasi, DOI link | HTTP 200 (26 KB rendered) | **LULUS** |
| 5 | `GET /riset-dan-pkm` | Riset AI, PKM Woloan Jaya | HTTP 200 (29 KB rendered) | **LULUS** |
| 6 | `GET /proyek` | Katalog proyek AI, IoT, Web | HTTP 200 (31 KB rendered) | **LULUS** |
| 7 | `GET /proyek/{slug}` | Detail proyek teknologi | HTTP 200 (22 KB rendered) | **LULUS** |
| 8 | `GET /akademik` | UNIPAR prodi & regulasi RPL | HTTP 200 (29 KB rendered) | **LULUS** |
| 9 | `GET /pelatihan` | Lokakarya KKA & pelatihan AI | HTTP 200 (27 KB rendered) | **LULUS** |
| 10 | `GET /ventures` | Aktama Digital & Aktama Music | HTTP 200 (25 KB rendered) | **LULUS** |
| 11 | `GET /blog` | Blog listing, kategori, tagar | HTTP 200 (26 KB rendered) | **LULUS** |
| 12 | `GET /kontak` | Formulir kontak & info kolaborasi | HTTP 200 (28 KB rendered) | **LULUS** |
| 13 | `POST /kontak` | Proteksi CSRF & validasi backend | Valid token -> 302 Redirect + DB Insert | **LULUS** |
| 14 | `GET /sitemap.xml` | XML feed untuk Google Search Console | HTTP 200 (XML valid) | **LULUS** |
| 15 | `GET /robots.txt` | Aturan crawling search engine | HTTP 200 (Disallow /admin) | **LULUS** |
| 16 | `GET /admin/login` | Filament Login Interface | HTTP 200 (Form Filament aktif) | **LULUS** |
| 17 | `POST /admin/login` | Autentikasi Admin | Berhasil login ke Dashboard Admin | **LULUS** |
| 18 | `Filament Navigation` | 6 Kelompok Navigasi & 18 Resources | Tampil rapi dan dapat di-CRUD | **LULUS** |

---

## 11. Lisensi & Hak Cipta

© 2026 **Gede Erik Aktama, S.Pd., M.Pd.** Seluruh Hak Cipta Dilindungi.  
Dikembangkan untuk personal branding profesional, tridharma perguruan tinggi, serta akselerasi transformasi digital.
