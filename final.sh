#!/bin/sh
php artisan key:generate
php artisan config:cache
# check if the database is ready
echo "Waiting for Mysql DB"
while ! mysql --protocol TCP -u"store" -p"store" -h"db" -e "show databases;" > /dev/null 2>&1;
do
  echo -n "."
  sleep 1
done
php artisan migrate
php artisan migrate:refresh --seed
php artisan storage:link
php-fpm