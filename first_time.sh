#!/bin/sh
set -e

echo "Installing Composer dependencies"
composer install

echo "Generating APP_KEY for Laravel"
php artisan key:generate

echo "Clearing configuration cache"
php artisan config:cache

echo "Executing database migrations"
php artisan migrate

echo "Symlinking public storage"
php artisan storage:link

echo "Executing required seeds"
php artisan db:seed

echo "Installing npm dependencies"
npm install

echo "Building npm dependencies"
npm  run dev
