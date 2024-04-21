#!/bin/bash

# Hata durumunda scriptin durmasını sağlar
set -e

# Uygulama dizinine git
cd /var/www/html/Geo-Finder-Api

# Değişiklikleri alır
git pull

# Composer bağımlılıklarını yükle
composer install --no-dev --prefer-dist

# Cache'leri temizle
php artisan cache:clear

# Route cache'leri temizle
php artisan route:cache

# Config cache'leri temizle
php artisan config:cache

# View cache'leri temizle
php artisan view:clear

# Veritabanı migrasyonlarını çalıştır
php artisan migrate --force

# Optimize et
php artisan optimize

# Eğer Laravel Queue kullanılıyorsa, queue'yi restart et
php artisan queue:restart

echo "Deployment tamamlandı."
