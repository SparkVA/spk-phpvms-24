#!/bin/bash
set -e

echo "Deployment started ..."

# Enter maintenance mode or return true
# if already is in maintenance mode
(php artisan down) || true

# Pull the latest version of the app
git pull origin production

git submodule update --recursive

# Install composer dependencies
composer install --no-interaction

# Clear phpVMS Cache
php artisan phpvms:caches

php artisan cache:clear

php artisan view:clear

# Clear the old cache
php artisan clear-compiled

# Recreate cache
php artisan optimize

# Run database migrations
php artisan migrate --force

# Exit maintenance mode
php artisan up

# Compile npm assets
npm run prod

echo "Deployment finished!"
