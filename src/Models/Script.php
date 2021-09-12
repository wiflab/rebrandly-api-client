<?php

namespace Vdhicts\Rebrandly\Models;

use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Script implements Model
{
    private string $id = '';
    private string $name = '';
    private string $value = '';
    private string $uri = '';

    public static function fromResponse(stdClass $response): Script
    {
        return (new self())
            ->setId($response->id)
            ->setName($response->name)
            ->setUri($response->uri)
            ->setValue($response->value);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Script
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Script
    {
        $this->name = $name;
        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Script
    {
        $this->value = $value;
        return $this;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function setUri(string $uri): Script
    {
        $this->uri = $uri;
        return $this;
    }
}
