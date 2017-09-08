```
    __                                ____  ____  __________ 
   / /   ____ __________ __   _____  / / / / / / / /  _/ __ \
  / /   / __ `/ ___/ __ `/ | / / _ \/ / / / / / / // // / / /
 / /___/ /_/ / /  / /_/ /| |/ /  __/ / /_/ / /_/ // // /_/ / 
/_____/\__,_/_/   \__,_/ |___/\___/_/\____/\____/___/_____/  
                                                             
```

Adds support for the UUID datatype column for models.

[![Latest Stable Version](https://poser.pugx.org/hnhdigital-os/laravel-model-uuid/v/stable.svg)](https://packagist.org/packages/hnhdigital-os/laravel-model-uuid) [![Total Downloads](https://poser.pugx.org/hnhdigital-os/laravel-model-uuid/downloads.svg)](https://packagist.org/packages/hnhdigital-os/laravel-model-uuid) [![Latest Unstable Version](https://poser.pugx.org/hnhdigital-os/laravel-model-uuid/v/unstable.svg)](https://packagist.org/packages/hnhdigital-os/laravel-model-uuid) [![Built for Laravel](https://img.shields.io/badge/Built_for-Laravel-green.svg)](https://laravel.com/) [![License](https://poser.pugx.org/hnhdigital-os/laravel-model-uuid/license.svg)](https://packagist.org/packages/hnhdigital-os/laravel-model-uuid)

[![Build Status](https://travis-ci.org/hnhdigital-os/laravel-model-uuid.svg?branch=master)](https://travis-ci.org/hnhdigital-os/laravel-model-uuid) [![StyleCI](https://styleci.io/repos/61543214/shield?branch=master)](https://styleci.io/repos/61543214) [![Test Coverage](https://codeclimate.com/github/hnhdigital-os/laravel-model-uuid/badges/coverage.svg)](https://codeclimate.com/github/hnhdigital-os/laravel-model-uuid/coverage) [![Issue Count](https://codeclimate.com/github/hnhdigital-os/laravel-model-uuid/badges/issue_count.svg)](https://codeclimate.com/github/hnhdigital-os/laravel-model-uuid) [![Code Climate](https://codeclimate.com/github/hnhdigital-os/laravel-model-uuid/badges/gpa.svg)](https://codeclimate.com/github/hnhdigital-os/laravel-model-uuid) 

This package has been developed by H&H|Digital, an Australian botique developer. Visit us at [hnh.digital](http://hnh.digital).

## Installation

Via composer:

`$ composer require hnhdigital-os/laravel-model-uuid ~1.0`

## Usage

### Basic

The feature is exposed through a trait by casting your UUID columns as `uuid`.

```php
use Bluora\ModelUuidColumn\UuidTrait;

class User extends Model
{
    use UuidTrait;

    protected $casts = [
        'id' => 'integer',
        'uuid' => 'uuid'
    ];
}
```

### Querying the UUID column

You can then query the UUID column through `whereUuid` (single uuid) and `whereUuidIn` (many uuid's) methods.

## Contributing

Please see [CONTRIBUTING](https://github.com/hnhdigital-os/laravel-model-uuid/blob/master/CONTRIBUTING.md) for details.

## Credits

* [Rocco Howard](https://github.com/therocis)
* [All Contributors](https://github.com/hnhdigital-os/laravel-model-uuid/contributors)

## License

The MIT License (MIT). Please see [License File](https://github.com/hnhdigital-os/laravel-model-uuid/blob/master/LICENSE) for more information.
