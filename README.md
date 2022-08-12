##softpyrmid tasks

# Installation

## Install all the dependencies using composer
composer update if composer.json.lock file exit otherwise composer install 


## Make .env file like .env.example and update following attributes in .env file according to your database credentials
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

# Generate a new application key
php artisan key:generate

# Run the database migrations (Set the database connection in .env before migrating)
php artisan migrate

## make assets

npm i and then npm run dev

## After installation

php artisan serve




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
