## About

Blogging platform website made with Laravel.

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

8. Configure mail driver. Example config:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

9. Migrate database
```sh
php artisan migrate
```

10. Start development server
```sh
php artisan serve
```
