#!/bin/bash
composer install
npm install
npm install -D tailwindcss @tailwindcss/vite
npm install -D daisyui@latest
php artisan key:gen
php artisan config:clear
php artisan route:clear
php artisan view:clear
npm run build
php artisan storage:link
php artisan serve --host 0.0.0.0

