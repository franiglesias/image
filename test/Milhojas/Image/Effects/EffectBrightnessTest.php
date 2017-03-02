<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectBrightness;
use Milhojas\Image\Models\Image;

class EffectBrightnessTest extends EffectTestCase
{
    public function test_it_brightens_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/brightness640-480.jpg');
        $effect = new EffectBrightness();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/brightness640-480.jpg', 'resources/brightness640-480.jpg');
        unlink('resources/brightness640-480.jpg');
    }

    public function test_it_brightens_an_image_high_intensity()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/brightness_int_80_640-480.jpg');
        $effect = new EffectBrightness(80);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/brightness_int_80_640-480.jpg', 'resources/brightness_int_80_640-480.jpg');
        unlink('resources/brightness_int_80_640-480.jpg');
    }
}
