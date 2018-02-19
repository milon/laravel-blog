# Laravel Blog

A simple blog for demonstration purpose. Based on Laravel 5.4

## Requirements

- Laravel 5.4
- PHP >= 5.6.4
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Installation

```
git clone https://github.com/milon/laravel-blog.git blog
cd blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```

If you want dummy data, then run this-

```
php artisan db:seed --class=DummyDataSeeder
```

## API Endpoints

This projects exposes some API endpoints. You could request those endpoints with the `api_token` passed as query parameters, like this- `/api/tags?api_token=YOUR_API_KEY`. The API key could be obtained from `/api/auth/token` endpoint. Available endpoints are-

```
/api/auth/token
/api/auth/reset-password
/api/auth/change-password

/api/auth/tags
/api/auth/categories
/api/auth/users     // only accessible by admin
/api/auth/posts
```

## Author

- [Nuruzzaman Milon](https://milon.im)

Feel free to email me, if you have any question.
