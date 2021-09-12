<?php

namespace Vdhicts\Rebrandly\Models;

use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Tag implements Model
{
    private string $id = '';
    private string $name = '';
    private string $color = '';

    public static function fromResponse(stdClass $response): Tag
    {
        return (new self())
            ->setId($response->id)
            ->setName($response->name)
            ->setColor($response->color);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Tag
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Tag
    {
        $this->name = $name;
        return $this;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setColor(string $color): Tag
    {
        $this->color = $color;
        return $this;
    }
}
