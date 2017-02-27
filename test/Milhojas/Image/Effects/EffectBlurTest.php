<?php

namespace Test\Image\Effects;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\Effects\EffectBlur;
use Milhojas\Image\ImageDispatcher;

class EffectBlurTest extends TestCase
{
    public function setUp()
    {
        $this->dispatcher = new ImageDispatcher();
    }

    public function test_it_blurs_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/blur640-480.jpg');
        $effect = new EffectBlur(150);
        $effect->write($test);
        $this->assertEquals(md5(file_get_contents('resources/test/blur640-480.jpg')), md5(file_get_contents('resources/blur640-480.jpg')));
        unlink('resources/blur640-480.jpg');
    }
}
