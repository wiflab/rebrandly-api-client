<?php

namespace Vdhicts\Rebrandly\Models;

use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Tag implements Model
{
    /**
     * Unique identifier of a tag.
     * @var string
     */
    private $id = '';

    /**
     * Unique name of a tag.
     * @var string
     */
    private $name = '';

    /**
     * Hexadecimal representation of a color assigned to a tag.
     * @var string
     */
    private $color = '';

    /**
     * @param stdClass $response
     * @return Tag
     */
    public static function fromResponse(stdClass $response): Tag
    {
        return (new self())
            ->setId($response->id)
            ->setName($response->name)
            ->setColor($response->color);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Tag
     */
    public function setId(string $id): Tag
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Tag
     */
    public function setName(string $name): Tag
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     * @return Tag
     */
    public function setColor(string $color): Tag
    {
        $this->color = $color;
        return $this;
    }
}
