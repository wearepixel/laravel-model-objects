# Laravel Model objects

[![Latest Version on Packagist](https://img.shields.io/packagist/v/wearepixel/laravel-model-objects.svg?style=flat-square)](https://packagist.org/packages/wearepixel/laravel-model-objects)
[![Total Downloads](https://img.shields.io/packagist/dt/wearepixel/laravel-model-objects.svg?style=flat-square)](https://packagist.org/packages/wearepixel/laravel-model-objects)
![GitHub Actions](https://github.com/wearepixel/laravel-model-objects/actions/workflows/main.yml/badge.svg)

A package to easily retrieve model objects for easy storage in Laravel

## Key Features

- [x] Retrieve an object from a model
- [x] Hide fields from the object by using the `$hiddenProperties` array property
- [ ] Hide relationships from the object by setting a config value

## Installation

You can install the package via composer:

```bash
composer require wearepixel/laravel-model-objects
```

## Usage

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use WeArePixel\LaravelModelObjects\HasModelObject;

class User extends Model
{
    use HasModelObject;

    protected $hiddenProperties = [
        'user_id',
    ];
}

// ...
$user = User::find(1);
$userObject = $user->modelObject;
```

## Configuration

### Publshing The Configuration

The configuration file looks like this:

```php
return [
    /**
     * Hide the primary key from the model object
     */
    'hide_primary_key' => env('LARAVEL_MODEL_OBJECTS_HIDE_PRIMARY_KEY', true),

    /**
     * Hide timestamps from the model object
     */
    'hide_timestamps' => env('LARAVEL_MODEL_OBJECTS_HIDE_TIMESTAMPS', true),
];
```

If you need to make any changes to the configuration, feel free to publish the configuration file.

```sh
php artisan vendor:publish --provider="WeArePixel\LaravelModelObjects\LaravelModelObjectsServiceProvider"
```

### Hiding Model Attributes

This package will automatically hide any additional fields, you add into `$hiddenProperties` array property.

```php
protected $hiddenProperties = [
    'user_id',
];
```

This is useful for scenarios where you don't need to store all fields in the object, or you want to hide sensitive information.

### Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
