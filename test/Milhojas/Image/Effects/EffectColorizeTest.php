<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectColorize;
use Milhojas\Image\Values\Color;

class EffectColorizeTest extends EffectTestCase
{
    public function test_it_colorizes_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/colorize640-480.jpg');
        $effect = new EffectColorize(new Color('#d910a4'));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/colorize640-480.jpg', 'resources/colorize640-480.jpg');
        unlink('resources/colorize640-480.jpg');
    }
}
