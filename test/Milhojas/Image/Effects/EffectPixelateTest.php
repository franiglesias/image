<?php

namespace Test\Image\Effects;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\Effects\EffectPixelate;
use Milhojas\Image\ImageDispatcher;

class EffectPixelateTest extends TestCase
{
    public function setUp()
    {
        $this->dispatcher = new ImageDispatcher();
    }

    public function test_it_pixelates_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/pixelate640-480.jpg');
        $effect = new EffectPixelate(50, 4);
        $effect->write($test);
        $this->assertEquals(md5(file_get_contents('resources/test/pixelate640-480.jpg')), md5(file_get_contents('resources/pixelate640-480.jpg')));
        unlink('resources/pixelate640-480.jpg');
    }
}
