<?php

namespace Test\Image\Effects;

use PHPUnit\Framework\TestCase;

class EffectTestCase extends TestCase
{
    public function assertImagesAreEqual($expected, $result)
    {
        $this->assertEquals(md5(file_get_contents($expected)), md5(file_get_contents($result)));
    }
}
