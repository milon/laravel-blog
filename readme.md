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

## Author

- [Nuruzzaman Milon](https://milon.im)

Feel free to email me, if you have any question.
