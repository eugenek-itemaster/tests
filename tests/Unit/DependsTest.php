<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class DependsTest extends TestCase
{
    public function test_empty()
    {
        $array = [];
        $this->assertEmpty($array);

        return $array;
    }

    /**
     * @depends test_empty
     */
    public function test_push(array $array)
    {
        array_push($array, 'foo');
        $this->assertSame('foo', $array[count($array) - 1]);
        $this->assertNotEmpty($array);

        return $array;
    }

    /**
     * @depends test_push
     */
    public function test_pop(array $array)
    {
        $this->assertSame('foo', array_pop($array));
        $this->assertEmpty($array);
    }
}