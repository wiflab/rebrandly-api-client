<?php

namespace Vdhicts\Rebrandly\Support;

class Options
{
    private array $attributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * @param string|null $key
     * @return mixed
     */
    public function get(string $key = null)
    {
        if (! is_null($key)) {
            if (! array_key_exists($key, $this->attributes)) {
                return null;
            }

            return $this->attributes[$key];
        }

        return $this->attributes;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * @param mixed $value
     */
    public function set(string $key, $value = null): Options
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    public function toArray(): array
    {
        return $this->attributes;
    }
}
