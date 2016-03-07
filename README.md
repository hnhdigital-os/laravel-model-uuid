# Laravel Eloquent Model - UUID column support

Adds support for the UUID datatype column for models provided by the [Eloquent ORM](http://laravel.com/docs/eloquent).

## Installation

Require this package in your `composer.json` file:

`"bluora/laravel-model-uuid-column": "dev-master"`

Then run `composer update` to download the package to your vendor directory.

## Usage

### Basic

The feature is exposed through a trait by casting your UUID columns as `uuid`.

```php
use ModelUuidColumn\UuidColumnTrait;

class User extends Model
{
    use UuidColumnTrait;

    protected $casts = [
        'id' => 'integer',
        'uuid' => 'uuid'
    ];
}
```

### Usage

You can then query the UUID column through `whereUuid` (single uuid) and `whereUuidIn` (many uuid's) methods.
