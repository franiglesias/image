<?php

namespace Test\Image\Models;

use Milhojas\Image\Effects\EffectBlur;
use Milhojas\Image\Effects\EffectColorize;
use Milhojas\Image\Values\Color;
use Test\Image\Effects\EffectTestCase;
use Milhojas\Image\Models\Image;

class ImmageEffectTest extends EffectTestCase
{
    public function test_it_blurs_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/blur640-480.jpg');
        $test->apply(new EffectBlur());
        $test->write();
        $this->assertImagesAreEqual('resources/test/blur640-480.jpg', 'resources/blur640-480.jpg');
        unlink('resources/blur640-480.jpg');
    }

    public function test_it_blurs_an_image_with_low_intensity_and_colorizes_it()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/blur_int_30_colorize_640-480.jpg');
        $test->apply(new EffectBlur(30));
        $test->apply(new EffectColorize(new Color('#73a'), 20));
        $test->write();
        $this->assertImagesAreEqual('resources/test/blur_int_30_colorize_640-480.jpg', 'resources/blur_int_30_colorize_640-480.jpg');
        unlink('resources/blur_int_30_colorize_640-480.jpg');
    }

    public function test_it_blurs_an_image_with_max_intensity()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/blur_int_100_640-480.jpg');
        $test->apply(new EffectBlur(100));
        $test->write();
        $this->assertImagesAreEqual('resources/test/blur_int_100_640-480.jpg', 'resources/blur_int_100_640-480.jpg');
        unlink('resources/blur_int_100_640-480.jpg');
    }
}
