#!/bin/bash

# Pastikan folder database ada
mkdir -p database

# Buat file sqlite jika belum ada
if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite
    echo "Database SQLite berhasil dibuat."
fi

# Jalankan migrasi secara otomatis
echo "Menjalankan migrasi database..."
php artisan migrate --force

# Pembersihan cache untuk performa
echo "Membersihkan cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan server
# Menggunakan php artisan serve --host=0.0.0.0 --port=$PORT adalah standar Railway
echo "Memulai server pada port $PORT..."
php artisan serve --host=0.0.0.0 --port=$PORT
