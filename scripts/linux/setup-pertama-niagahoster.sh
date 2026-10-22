#!/bin/bash
set -e

# ==============================================================================
# Script Setup Pertama Kali di Niagahoster (hPanel)
# Target Subdomain : https://profil.aktama.com
# Akun Hosting     : u107454400 (aktama.com)
# ==============================================================================

APP_ROOT="/home/u107454400/domains/aktama.com/public_html/profil-source"
PHP_BIN="/opt/alt/php83/usr/bin/php"

if [ ! -x "$PHP_BIN" ]; then
  if command -v php >/dev/null 2>&1; then
    PHP_BIN="$(command -v php)"
  else
    echo "[ERROR] PHP binary tidak ditemukan."
    exit 1
  fi
fi

cd "$APP_ROOT"

echo "=========================================================="
echo "⚡ SETUP PERTAMA KALI: Website Portofolio (profil.aktama.com)"
echo "=========================================================="

# 1. Konfigurasi file .env
if [ ! -f .env ]; then
  echo "==> 1. Membuat file .env dari template produksi (.env.production.example)..."
  cp .env.production.example .env
fi

# Tanyakan konfigurasi database jika belum diisi
if grep -q "DB_PASSWORD=$" .env || grep -q "DB_PASSWORD=\"\"" .env; then
  echo ""
  echo "----------------------------------------------------------"
  echo "Konfigurasi Database MySQL Niagahoster:"
  echo "Default DB Name : u107454400_profil"
  echo "Default DB User : u107454400_profiluser"
  echo "----------------------------------------------------------"
  read -sp "Masukkan Password Database MySQL Anda: " DB_PASS
  echo ""
  if [ -n "$DB_PASS" ]; then
    sed -i "s|^DB_PASSWORD=.*|DB_PASSWORD=\"$DB_PASS\"|" .env
    echo "==> Password database berhasil disimpan di .env"
  fi
fi

# 2. Generate Application Key jika kosong
if grep -q "APP_KEY=$" .env; then
  echo "==> 2. Men-generate APP_KEY baru..."
  "$PHP_BIN" artisan key:generate --force
fi

# 3. Beri izin eksekusi script deploy
chmod +x scripts/linux/deploy-niagahoster.sh

# 4. Jalankan deployment penuh
echo "==> 3. Menjalankan deploy-niagahoster.sh..."
bash scripts/linux/deploy-niagahoster.sh

echo ""
echo "=========================================================="
echo "🎉 SETUP PERTAMA SELESAI!"
echo "Website: https://profil.aktama.com"
echo "Admin  : https://profil.aktama.com/admin"
echo "Email  : erikaktama@parnaraya.ac.id"
echo "Pass   : password123"
echo "=========================================================="
