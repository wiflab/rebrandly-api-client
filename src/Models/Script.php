<?php

namespace Vdhicts\Rebrandly\Models;

use stdClass;
use Vdhicts\Rebrandly\Contracts\Model;

class Script implements Model
{
    /**
     * Unique identifier of script.
     * @var string
     */
    private $id = '';

    /**
     * Unique name of the script.
     * @var string
     */
    private $name = '';

    /**
     * Javascript snippet (enclosed into <script> and </script> HTML tags)
     * @var string
     */
    private $value = '';

    /**
     * Publicly accessible URL to the script content
     * @var string
     */
    private $uri = '';

    /**
     * @param stdClass $response
     * @return Script
     */
    public static function fromResponse(stdClass $response): Script
    {
        return (new self())
            ->setId($response->id)
            ->setName($response->name)
            ->setUri($response->uri)
            ->setValue($response->value);
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
     * @return Script
     */
    public function setId(string $id): Script
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
     * @return Script
     */
    public function setName(string $name): Script
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return Script
     */
    public function setValue(string $value): Script
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @param string $uri
     * @return Script
     */
    public function setUri(string $uri): Script
    {
        $this->uri = $uri;
        return $this;
    }
}
