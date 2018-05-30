<?php

namespace Bluora\LaravelModelUuid;

use Config;
use Webpatser\Uuid\Uuid;

trait UuidTrait
{
    /**
     * Cast an attribute to a native PHP type.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    protected function castAttribute($key, $value)
    {
        if ($this->getCastType($key) == 'uuid') {
            return self::castUuidAttribute($value);
        }

        return parent::castAttribute($key, $value);
    }

    /**
     * Cast a UUID string.
     *
     * @param binary $value
     *
     * @return string
     */
    public static function castUuidAttribute($value)
    {
        if (is_null($value)) {
            return $value;
        }

        if (!Config::get('uuid.binary', true)) {
            return $value;
        }

        $value = unpack('H*', $value);

        return strtolower(preg_replace('/([0-9a-f]{8})([0-9a-f]{4})([0-9a-f]{4})([0-9a-f]{4})([0-9a-f]{12})/', '$1-$2-$3-$4-$5', $value[1]));
    }

    /**
     * Lookup the model using a UUID.
     *
     * @param string $column
     * @param mixed  $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereUuid($query, $column, $value)
    {
        return $query->whereUuidIn($column, $value);
    }

    /**
     * Lookup the models using a UUID.
     *
     * @param string $column
     * @param mixed  $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhereUuidIn($query, $column, $value)
    {
        // Convert object to uuid string.
        if (is_object($value)) {
            $value = $value->uuid;
        }

        if (!is_array($value)) {
            $value = [$value];
        }

        if (count($value) == 0) {
            return $query;
        }

        $value = str_replace('-', '', $value);

        if (Config::get('uuid.binary', true)) {
            $value = preg_replace('/([a-zA-Z0-9].*)/', "UNHEX('$1')", $value);
        }

        $value = implode(',', $value);
        $sql = sprintf("$column IN (%s)", $value);

        return $query->whereRaw($sql);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->getKeyName();
    }

    /**
     * Generate UUID.
     *
     * @return string
     */
    public function generateUuid()
    {
        return (string) Uuid::generate(1, file_get_contents('/etc/machine-id'));
    }

    /**
     * Generate primary key.
     *
     * @return string
     *
     * @todo  Change Uuid generation to use config so determinte what type.
     */
    public function generateUuidPrimaryKey()
    {
        if (empty($this->getKey()) && !$this->getIncrementing()) {
            $name = $this->getKeyName();
            if (!is_null($name) && $this->getCastType($name) === 'uuid') {
                $this->$name = $this->generateUuid();

                return $this->$name;
            }
        }
    }

    /**
     * Boot events for this trait.
     *
     * @return void
     */
    public static function bootUuidTrait()
    {
        // Changes on creating
        static::creating(function ($model) {
            static::unguard();
            $model->generateUuidPrimaryKey();
            static::reguard();
        });
    }
}
