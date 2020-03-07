<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\Script;

class ScriptTest extends TestCase
{
    public function testFromResponse()
    {
        $id = 'id';
        $name = 'name';
        $value = 'value';
        $uri = 'uri';

        $object = (object)[
            'id' => $id,
            'name' => $name,
            'value' => $value,
            'uri' => $uri,
        ];

        $script = Script::fromResponse($object);

        $this->assertSame($id, $script->getId());
        $this->assertSame($name, $script->getName());
        $this->assertSame($value, $script->getValue());
        $this->assertSame($uri, $script->getUri());
    }
}
