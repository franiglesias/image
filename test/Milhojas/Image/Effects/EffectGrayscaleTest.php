<?php

namespace Test\Image\Effects;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\Effects\EffectGrayscale;
use Milhojas\Image\ImageDispatcher;

class EffectGrayscaleTest extends TestCase
{
    public function setUp()
    {
        $this->dispatcher = new ImageDispatcher();
    }

    public function test_it_blurs_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/grayscale640-480.jpg');
        $effect = new EffectGrayscale();
        $effect->write($test);
        $this->assertEquals(md5(file_get_contents('resources/test/grayscale640-480.jpg')), md5(file_get_contents('resources/grayscale640-480.jpg')));
        unlink('resources/grayscale640-480.jpg');
    }
}
