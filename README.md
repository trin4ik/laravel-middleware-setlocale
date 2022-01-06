# Laravel Middleware SetLocale

[![Latest Version on Packagist](https://img.shields.io/packagist/v/trin4ik/laravel-middleware-setlocale.svg?style=flat-square)](https://packagist.org/packages/trin4ik/laravel-middleware-set-locale)
[![Total Downloads](https://img.shields.io/packagist/dt/trin4ik/laravel-middleware-setlocale.svg?style=flat-square)](https://packagist.org/packages/trin4ik/laravel-middleware-set-locale)

Simple and stupid package for set locale from user data, http header, post data etc.

## Installation

```bash
composer require trin4ik/laravel-middleware-setlocale
php artisan vendor:publish --provider "Trin4ik\LaravelMiddlewareSetLocale\MiddlewareSetLocaleServiceProvider"
```

And add middleware to `app/Http/Kernel.php` to needs routes middleware, or to global:

```php
<?php
namespace App\Http;
...

class Kernel extends HttpKernel
{
    protected $middleware = [
        ...
        
        \Trin4ik\LaravelMiddlewareSetLocale\Http\Middleware\SetLocale::class
    ];
```

## Usage

in `.env` or `config/setlocale.php` u can configure locale sniffer:

| Key                      | Default    | Description                                                                                                                                        |
|--------------------------|------------|----------------------------------------------------------------------------------------------------------------------------------------------------|
| SET_LOCALE_DEFAULT       | en         | Default locale                                                                                                                                     |
| SET_LOCALE_METHODS       | get,header | U have 4 methods to sniff locale, from `user` data, from `get` or `post` fields or from custom `header`. The last method gets the highest priority |
| SET_LOCALE_METHOD_USER   | locale     | User attribute, where sets locale data. Like `User::find(1)->locale`                                                                               |
| SET_LOCALE_METHOD_HEADER | x-locale   | Custom http header, like `HTTP_X_LOCALE`                                                                                                           |
| SET_LOCALE_METHOD_GET    | locale     | Get param like `/?locale=fr`                                                                                                                       |
| SET_LOCALE_METHOD_POST   | locale     | Post field like `$request->post('locale')`                                                                                                         |
| SET_LOCALE_ALLOW         | en,ru      | Allowed locales. others set the default                                                                                                            |

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email trin4ik@gmail.com instead of using the issue tracker.

## Credits

- [trin4ik](https://github.com/trin4ik)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.