## Twilio

Send text messages with (Twilio)[http://twilio.com] from your application

[![Total downloads](https://img.shields.io/packagist/dt/nodes/twilio.svg)](https://packagist.org/packages/nodes/twilio)
[![Monthly downloads](https://img.shields.io/packagist/dm/nodes/twilio.svg)](https://packagist.org/packages/nodes/twilio)
[![Latest release](https://img.shields.io/packagist/v/nodes/twilio.svg)](https://packagist.org/packages/nodes/twilio)
[![Open issues](https://img.shields.io/github/issues/nodes-php/twilio.svg)](https://github.com/nodes-php/twilio/issues)
[![License](https://img.shields.io/packagist/l/nodes/twilio.svg)](https://packagist.org/packages/nodes/twilio)
[![Star repository on GitHub](https://img.shields.io/github/stars/nodes-php/twilio.svg?style=social&label=Star)](https://github.com/nodes-php/twilio/stargazers)
[![Watch repository on GitHub](https://img.shields.io/github/watchers/nodes-php/twilio.svg?style=social&label=Watch)](https://github.com/nodes-php/twilio/watchers)
[![Fork repository on GitHub](https://img.shields.io/github/forks/nodes-php/twilio.svg?style=social&label=Fork)](https://github.com/nodes-php/twilio/network)

## 📝 Introduction

Integrates the (Twilio)[http://twilio.com] service, which makes it unbelieable easy to send text messages from your application.

## 📦 Installation

To install this package you will need:

* Laravel 5.1+
* PHP 5.5.9+

You must then modify your `composer.json` file and run `composer update` to include the latest version of the package in your project.

```json
"require": {
    "nodes/twilio": "^1.0"
}
```

Or you can run the composer require command from your terminal.

```bash
composer require nodes/twilio:^1.0
```

## 🔧 Setup

Setup service provider in `config/app.php`

```php
Nodes\Services\Twilio\ServiceProvider::class
```

Publish config files

```bash
php artisan vendor:publish --provider="Nodes\Services\Twilio\ServiceProvider"
```

If you want to overwrite any existing config files use the `--force` parameter

```bash
php artisan vendor:publish --provider="Nodes\Services\Twilio\ServiceProvider" --force
```
## ⚙ Usage

### Global method

```php
twilio_sms($to, $body, $from = null)
```

## 🏆 Credits

This package is developed and maintained by the PHP team at [Nodes](http://nodesagency.com)

[![Follow Nodes PHP on Twitter](https://img.shields.io/twitter/follow/nodesphp.svg?style=social)](https://twitter.com/nodesphp) [![Tweet Nodes PHP](https://img.shields.io/twitter/url/http/nodesphp.svg?style=social)](https://twitter.com/nodesphp)

## 📄 License

This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
