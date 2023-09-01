composer install
php -S localhost:8000 -t public
docker-compose up -d
php artisan migrate
php artisan db:seed --class=ProductsTableSeeder