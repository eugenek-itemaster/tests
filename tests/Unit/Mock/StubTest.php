<?php

namespace Tests\Unit\Mock;

use PHPUnit\Framework\TestCase;

class Monkey
{
    public function scream()
    {

    }
}

class StubTest extends TestCase
{
    public function test_stub()
    {
        $stub = $this->createMock(Monkey::class);

        $stub->method('scream')->willReturn('AAA1');

        $this->assertSame('AAA', $stub->scream());
    }
}