<?php

use Milhojas\Image\Values\Size;
use PHPUnit\Framework\TestCase;

class SizeTest extends TestCase
{
    public function test_it_calculates_memory_needed()
    {
        $size = new Size(640, 480);
        $memory = $size->memory();
        $this->assertGreaterThanOrEqual(1843200, $memory);
    }
}
