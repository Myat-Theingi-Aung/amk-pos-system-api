# AMK POS System

## Requirements
- PHP 8.1
- MySQL 5.7 or 8

## Installation

Clone the repo locally:
```
git clone https://github.com/Myat-Theingi-Aung/AMK-POS-system.git
```

`cd` into cloned directory and install dependencies. run below command one by one.
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
composer require --with-all-dependencies league/flysystem-aws-s3-v3
```

### Configuration in `.env` file

Database **eg.**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=amk_pos
DB_USERNAME=root
DB_PASSWORD=
```

AWS ACCESS KEY ID and Secret Key
```
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=
```

Frontend configure (not use aws)
```
FRONTEND_URL=
SESSION_DOMAIN=
SANCTUM_STATEFUL_DOMAINS=
```

## Database Migration

Run database migrations:
```
php artisan migrate
```

Run database seeder:
```
php artisan db:seed
```

## Server Run

Run the dev server:
```
php artisan serve
```

Visit below url:
```
http://localhost:8000
```
