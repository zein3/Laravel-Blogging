## About

This is a [Dev.to](https://dev.to/) clone made with Laravel.


## Running The Server and Testing

1. Clone this repository
```sh
git clone https://github.com/zein3/Laravel-Blogging.git
```

2. Install dependencies
```sh
composer install
```

3. Copy example configuration
```sh
cp .env.example .env
```

4. Generate app key
```sh
php artisan key:generate --ansi
```

5. Configure database

6. Configure mail driver

7. Migrate database
```sh
php artisan migrate
```

8. Start development server
```sh
php artisan serve
```

9. Run tests
