<?php

namespace Test\Image\Effects;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\ImageDispatcher;

class EffectTestCase extends TestCase
{
    public function setUp()
    {
        $this->dispatcher = new ImageDispatcher();
    }

    public function assertImagesAreEqual($expected, $result)
    {
        $this->assertEquals(md5(file_get_contents($expected)), md5(file_get_contents($result)));
    }
}
