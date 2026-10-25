#!/bin/bash
set -e

# ==============================================================================
# Script Otomatisasi Deploy Niagahoster (hPanel / Shared Hosting)
# Target Subdomain : https://profil.aktama.com
# Akun Hosting     : u107454400 (aktama.com)
# ==============================================================================

APP_ROOT="/home/u107454400/domains/aktama.com/public_html/profil-source"
WEB_ROOT="/home/u107454400/domains/aktama.com/public_html/profil"
PHP_BIN="/opt/alt/php83/usr/bin/php"

# Validasi binary PHP
if [ ! -x "$PHP_BIN" ]; then
  if command -v php >/dev/null 2>&1; then
    PHP_BIN="$(command -v php)"
  else
    echo "[ERROR] Binary PHP tidak ditemukan di $PHP_BIN atau PATH server."
    exit 1
  fi
fi

# Validasi binary Composer
COMPOSER_BIN="/usr/bin/composer2"
if [ ! -x "$COMPOSER_BIN" ]; then
  if command -v composer2 >/dev/null 2>&1; then
    COMPOSER_BIN="$(command -v composer2)"
  elif command -v composer >/dev/null 2>&1; then
    COMPOSER_BIN="$(command -v composer)"
  else
    echo "[ERROR] Composer tidak ditemukan di server."
    exit 1
  fi
fi

echo "=========================================================="
echo "🚀 Memulai Deployment Website Portofolio: profil.aktama.com"
echo "=========================================================="

cd "$APP_ROOT"

echo "==> 1. Mengambil kode terbaru dari GitHub (git pull)..."
git pull origin main

echo "==> 2. Menginstal dependensi PHP untuk produksi..."
"$PHP_BIN" "$COMPOSER_BIN" install --no-dev --optimize-autoloader

if grep -q "APP_KEY=$" .env || grep -q "APP_KEY=\"\"" .env; then
  echo "==> Men-generate APP_KEY baru..."
  "$PHP_BIN" artisan key:generate --force
fi

echo "==> 3. Menjalankan migrasi database..."
"$PHP_BIN" artisan migrate --force

echo "==> 4. Memperbarui data profil, publikasi buku ber-ISBN, dan jabatan fungsional..."
"$PHP_BIN" artisan db:seed --force

echo "==> 5. Mengoptimasi cache Laravel (config, routes, views)..."
"$PHP_BIN" artisan optimize:clear
"$PHP_BIN" artisan config:cache
"$PHP_BIN" artisan route:cache
"$PHP_BIN" artisan view:cache

echo "==> 6. Sinkronisasi aset statis ke folder publik subdomain..."
mkdir -p "$WEB_ROOT"
cp -r public/. "$WEB_ROOT"/

echo "==> 7. Menyiapkan jembatan index.php untuk public_html/profil..."
cat > "$WEB_ROOT/index.php" <<'PHP'
<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Cek status maintenance
if (file_exists($maintenance = __DIR__.'/../profil-source/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Autoload composer dari direktori source
require __DIR__.'/../profil-source/vendor/autoload.php';

// Bootstrap aplikasi Laravel
$app = require_once __DIR__.'/../profil-source/bootstrap/app.php';

$app->handleRequest(Request::capture());
PHP

echo "==> 8. Mengonfigurasi symlink storage publik..."
rm -rf "$WEB_ROOT/storage"
ln -s ../profil-source/storage/app/public "$WEB_ROOT/storage"

echo "==> 9. Memastikan izin akses folder storage & cache..."
chmod -R 775 storage bootstrap/cache

echo "=========================================================="
echo "✅ DEPLOYMENT BERHASIL! Website aktif di https://profil.aktama.com"
echo "=========================================================="

