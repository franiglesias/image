<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectColorize;
use Milhojas\Image\Values\Color;
use Milhojas\Image\Models\Image;

class EffectColorizeTest extends EffectTestCase
{
    public function test_it_colorizes_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/colorize640-480.jpg');
        $effect = new EffectColorize(new Color('#d910a4'));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/colorize640-480.jpg', 'resources/colorize640-480.jpg');
        unlink('resources/colorize640-480.jpg');
    }

    public function test_it_colorizes_an_image_with_low_intensity()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/colorize_int_20_640-480.jpg');
        $effect = new EffectColorize(new Color('#d910a4'), 20);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/colorize_int_20_640-480.jpg', 'resources/colorize_int_20_640-480.jpg');
        unlink('resources/colorize_int_20_640-480.jpg');
    }
}
