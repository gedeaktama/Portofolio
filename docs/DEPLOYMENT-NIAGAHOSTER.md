# Panduan Lengkap Deploy Website Portofolio ke Niagahoster (hPanel)

Dokumentasi ini adalah panduan resmi deployment website portofolio profesional **Gede Erik Aktama, S.Pd., M.Pd.** ke hosting Niagahoster (Hostinger hPanel) untuk target subdomain:
```
https://profil.aktama.com
```

---

## 1. Arsitektur Folder & Server

Berdasarkan struktur server Niagahoster/Hostinger akun Anda:
* **User Akun:** `u107454400`
* **Domain Induk:** `aktama.com`
* **Akses SSH:** `ssh -p 65002 u107454400@147.93.80.47`
* **PHP Binary:** `/opt/alt/php83/usr/bin/php` (PHP 8.3)
* **Composer Binary:** `/usr/bin/composer2`
* **Direktori Source Code Laravel:**  
  `/home/u107454400/domains/aktama.com/public_html/profil-source`
* **Direktori Web Root Subdomain:**  
  `/home/u107454400/domains/aktama.com/public_html/profil`

---

## 2. Langkah 1: Buat Subdomain di hPanel

1. Buka dashboard **hPanel Niagahoster / Hostinger**.
2. Masuk ke menu **Websites** -> pilih **aktama.com** -> pilih **Subdomains**.
3. Masukkan nama subdomain: `profil`.
4. Centang atau pastikan folder direktori mengarah ke:
   ```text
   public_html/profil
   ```
5. Klik **Create / Buat**.

---

## 3. Langkah 2: Buat Database MySQL di hPanel

1. Di hPanel, masuk ke menu **Databases** -> **MySQL Databases**.
2. Buat database baru:
   * **Nama Database:** `u107454400_profil` (atau nama lain yang Anda inginkan)
   * **Username:** `u107454400_profiluser`
   * **Password:** *Buat password yang kuat dan catat*
3. Klik **Create**.

---

## 4. Langkah 3: Setup Awal via SSH

Buka PowerShell di komputer Anda, lalu hubungkan ke server:
```bash
ssh -p 65002 u107454400@147.93.80.47
```

Setelah berhasil masuk ke server, jalankan perintah berikut:

### A. Clone Repository dari GitHub
```bash
cd /home/u107454400/domains/aktama.com/public_html
git clone https://github.com/gedeaktama/Portofolio.git profil-source
cd profil-source
```

### B. Buat dan Sesuaikan File `.env`
Salin template produksi yang telah disediakan:
```bash
cp .env.production.example .env
nano .env
```
Isi konfigurasi database yang baru dibuat:
```env
APP_NAME="Gede Erik Aktama — Personal Portfolio"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://profil.aktama.com
ASSET_URL=https://profil.aktama.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=u107454400_profil
DB_USERNAME=u107454400_profiluser
DB_PASSWORD=ISI_PASSWORD_DATABASE_ANDA
```
Simpan file dengan menekan `Ctrl + O`, lalu `Enter`, kemudian `Ctrl + X`.

### C. Generate Application Key
```bash
/opt/alt/php83/usr/bin/php artisan key:generate
```

### D. Beri Hak Eksekusi Script Deploy
```bash
chmod +x scripts/linux/deploy-niagahoster.sh
```

---

## 5. Langkah 4: Jalankan Script Deploy Otomatis

Cukup jalankan script otomatisasi:
```bash
bash scripts/linux/deploy-niagahoster.sh
```

Script ini akan secara otomatis melakukan:
1. `git pull origin main` (memastikan kode selalu mutakhir)
2. `composer install --no-dev --optimize-autoloader`
3. `php artisan migrate --force`
4. Menjalankan seeder awal data autentik:
   *(Untuk inisialisasi awal, jalankan perintah seeder sekali:)*
   ```bash
   /opt/alt/php83/usr/bin/php artisan db:seed --force
   ```
5. Optimasi cache produksi (`config:cache`, `route:cache`, `view:cache`)
6. Menyinkronkan seluruh aset statis (`public/build`, gambar, favicon, robots, sitemap) ke folder web root `/public_html/profil`
7. Mengonfigurasi jembatan `index.php` yang aman di `/public_html/profil/index.php`
8. Membuat symlink folder storage upload

---

## 6. Langkah 5: Aktifkan SSL (HTTPS)

1. Di hPanel, masuk ke menu **Security** -> **SSL**.
2. Cari domain `profil.aktama.com`.
3. Klik **Install SSL** (Let's Encrypt gratis dan otomatis diperpanjang).
4. Aktifkan opsi **Force HTTPS**.

---

## 7. Langkah 6: Konfigurasi Cron Job di hPanel

Agar tugas berkala Laravel berjalan otomatis:
1. Di hPanel, buka menu **Advanced** -> **Cron Jobs**.
2. Pilih tipe: **Custom**.
3. Interval: **Setiap menit (`* * * * *`)**.
4. Command:
   ```bash
   cd /home/u107454400/domains/aktama.com/public_html/profil-source && /opt/alt/php83/usr/bin/php artisan schedule:run >> /dev/null 2>&1
   ```
5. Klik **Save**.

---

## 8. Alur Kerja Update Rutin (Untuk Pembaruan Berikutnya)

Jika di kemudian hari Anda melakukan perubahan pada portofolio di komputer lokal:

### 1. Di Komputer Lokal (XAMPP):
```powershell
# Jika ada perubahan tampilan/CSS/JS, build ulang:
npm run build

# Commit dan Push ke GitHub:
git add .
git commit -m "Update konten portofolio"
git push
```

### 2. Di Server Niagahoster (via SSH):
```bash
ssh -p 65002 u107454400@147.93.80.47
cd /home/u107454400/domains/aktama.com/public_html/profil-source
bash scripts/linux/deploy-niagahoster.sh
```
Website langsung terbarukan dalam hitungan detik tanpa downtime.

---

## 9. Akses Akun Admin di Server Produksi

Setelah deployment selesai:
* **Halaman Publik:** `https://profil.aktama.com`
* **Admin Dashboard:** `https://profil.aktama.com/admin`
  * **Email Default:** `erikaktama@parnaraya.ac.id`
  * **Password Default:** `password123` *(Segera ganti password melalui admin panel setelah login pertama)*

---

## 10. Diagnosa & Troubleshooting

Jika terjadi kendala:
* **Clear Cache:**
  ```bash
  /opt/alt/php83/usr/bin/php artisan optimize:clear
  ```
* **Cek Log Error Laravel:**
  ```bash
  cat storage/logs/laravel.log | tail -n 50
  ```
* **Periksa Izin Akses Folder Storage:**
  ```bash
  chmod -R 775 storage bootstrap/cache
  ```
