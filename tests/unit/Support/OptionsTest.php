<?php

namespace Vdhicts\Rebrandly\Test\Unit\Support;

use PHPUnit\Framework\TestCase;
use Vdhicts\Rebrandly\Support\Options;

class OptionsTest extends TestCase
{
    public function testOptionsWithAttributes()
    {
        $attributes = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];

        $options = new Options($attributes);

        $this->assertSame(3, count($options->get()));
    }

    public function testOptionsAvailableCheck()
    {
        $attributes = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];

        $options = new Options($attributes);

        $this->assertTrue($options->has('a'));
        $this->assertTrue($options->has('b'));
        $this->assertTrue($options->has('c'));
        $this->assertFalse($options->has('d'));
    }

    public function testOptionsRetrieval()
    {
        $attributes = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];

        $options = new Options($attributes);

        $this->assertSame($attributes['a'], $options->get('a'));
        $this->assertSame($attributes['b'], $options->get('b'));
        $this->assertSame($attributes['c'], $options->get('c'));
        $this->assertNull($options->get('d'));
    }

    public function testMutatingOptions()
    {
        $attributes = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];

        $options = new Options($attributes);
        $options->set('d', 8);

        $this->assertTrue($options->has('d'));
        $this->assertSame(8, $options->get('d'));

        $options->set('a', 4);

        $this->assertTrue($options->has('a'));
        $this->assertSame(4, $options->get('a'));
    }

    public function testSerializingOptionsToArray()
    {
        $attributes = [
            'a' => 1,
            'b' => 2,
            'c' => 3,
        ];

        $options = new Options($attributes);
        $optionsArray = $options->toArray();

        $this->assertIsArray($optionsArray);

        $this->assertSame(3, count($optionsArray));

        $this->assertArrayHasKey('a', $optionsArray);
        $this->assertArrayHasKey('b', $optionsArray);
        $this->assertArrayHasKey('c', $optionsArray);

        $this->assertSame($attributes['a'], $optionsArray['a']);
        $this->assertSame($attributes['b'], $optionsArray['b']);
        $this->assertSame($attributes['c'], $optionsArray['c']);
    }
}
