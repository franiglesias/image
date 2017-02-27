<?php

namespace Test\Image\Effects;

use PHPUnit\Framework\TestCase;
use Milhojas\Image\Effects\EffectColorize;
use Milhojas\Image\ImageDispatcher;
use Milhojas\Image\Values\Color;

class EffectColorizeTest extends TestCase
{
    public function setUp()
    {
        $this->dispatcher = new ImageDispatcher();
    }

    public function test_it_blurs_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/colorize640-480.jpg');
        $effect = new EffectColorize(new Color('#d910a4'));
        $effect->write($test);
        $this->assertEquals(md5(file_get_contents('resources/test/colorize640-480.jpg')), md5(file_get_contents('resources/colorize640-480.jpg')));
        unlink('resources/colorize640-480.jpg');
    }
}
