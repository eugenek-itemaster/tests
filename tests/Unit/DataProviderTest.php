<?php
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class DataProviderTest extends TestCase
{
    /**
     * @dataProvider myDataProvider
     */
    public function test_data_provider($first, $second, $third)
    {
        $this->assertSame($first + $second, $third);
    }

    public function myDataProvider()
    {
        return [
            [1,1,2],
            [3,1,4],
            [1,5,2],
            [1,6,8],
        ];
    }
}