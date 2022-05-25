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

5. Configure database. Example config:
```
DB_DATABASE=Laravel
DB_USERNAME=root
DB_PASSWORD=root
```

6. Run Laravel Mix
```sh
npm install && npm run dev
```

7. Configure storage driver. Example config:
```
FTP_HOST=ftp.sirv.com
FTP_USERNAME=example@gmail.com
FTP_PASSWORD=example123
```

8. Configure mail driver

9. Migrate database
```sh
php artisan migrate
```

10. Start development server
```sh
php artisan serve
```
