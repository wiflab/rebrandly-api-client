<?php

namespace Vdhicts\Rebrandly\Test\unit\Models;

use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Models\Tag;

class TagTest extends TestCase
{
    public function testFromResponse()
    {
        $id = 'id';
        $name = 'name';
        $color = 'color';

        $object = (object)[
            'id' => $id,
            'name' => $name,
            'color' => $color,
        ];

        $tag = Tag::fromResponse($object);

        $this->assertSame($id, $tag->getId());
        $this->assertSame($name, $tag->getName());
        $this->assertSame($color, $tag->getColor());
    }
}
