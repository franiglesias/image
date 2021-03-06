<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectBlur;
use Milhojas\Image\Models\Image;

class EffectBlurTest extends EffectTestCase
{
    public function test_it_blurs_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/blur640-480.jpg');
        $effect = new EffectBlur();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/blur640-480.jpg', 'resources/blur640-480.jpg');
        unlink('resources/blur640-480.jpg');
    }

    public function test_it_blurs_an_image_with_low_intensity()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/blur_int_30_640-480.jpg');
        $effect = new EffectBlur(30);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/blur_int_30_640-480.jpg', 'resources/blur_int_30_640-480.jpg');
        unlink('resources/blur_int_30_640-480.jpg');
    }

    public function test_it_blurs_an_image_with_max_intensity()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/blur_int_100_640-480.jpg');
        $effect = new EffectBlur(100);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/blur_int_100_640-480.jpg', 'resources/blur_int_100_640-480.jpg');
        unlink('resources/blur_int_100_640-480.jpg');
    }
}
