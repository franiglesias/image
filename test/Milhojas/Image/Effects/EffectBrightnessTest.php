<?php

namespace Test\Image\Effects;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\Effects\EffectBrightness;
use Milhojas\Image\ImageDispatcher;

class EffectBrightnessTest extends TestCase
{
    public function setUp()
    {
        $this->dispatcher = new ImageDispatcher();
    }

    public function test_it_blurs_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/brightness640-480.jpg');
        $effect = new EffectBrightness(40);
        $effect->write($test);
        $this->assertEquals(md5(file_get_contents('resources/test/brightness640-480.jpg')), md5(file_get_contents('resources/brightness640-480.jpg')));
        unlink('resources/brightness640-480.jpg');
    }
}
