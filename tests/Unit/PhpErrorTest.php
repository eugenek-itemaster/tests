<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PhpErrorTest extends TestCase
{

    public function test_error()
    {
        $this->expectError(\PHPUnit\Framework\Error\Error::class);
        include 'aaaaaa.php';
    }
}