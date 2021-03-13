#!/bin/bash
sudo apt-get install php-mbstring
sudo apt install php-xml php-mysqlnd-ms php8.0-mcrypt php8.0-mysqli php8.0-mbstring php8.0-xml
cd /home/fede/reviewex
git pull https://reassuringgreet@github.com/stefanFramework/reviewex
rsync -azvh /home/fede/reviewex/app/. /var/www
cd /var/www
mv .env.prd .env
chown www-data:www-data -R /var/www
sed -i 's/"php": "^7.4"/"php": "^8.0.3"/g' composer.json
rm composer.lock
composer install -n
npm install
php artisan migrate
npm run production
/etc/init.d/nginx restart