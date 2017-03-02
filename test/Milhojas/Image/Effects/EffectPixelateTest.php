<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectPixelate;
use Milhojas\Image\Models\Image;

class EffectPixelateTest extends EffectTestCase
{
    public function test_it_pixelates_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/pixelate640-480.jpg');
        $effect = new EffectPixelate();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/pixelate640-480.jpg', 'resources/pixelate640-480.jpg');
        unlink('resources/pixelate640-480.jpg');
    }

    public function test_it_pixelates_an_image_with_higher_module()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/pixelate_mod_8_640-480.jpg');
        $effect = new EffectPixelate(50, 8);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/pixelate_mod_8_640-480.jpg', 'resources/pixelate_mod_8_640-480.jpg');
        unlink('resources/pixelate_mod_8_640-480.jpg');
    }

    public function test_it_pixelates_an_image_with_lower_module()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/pixelate_mod_2_640-480.jpg');
        $effect = new EffectPixelate(50, 2);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/pixelate_mod_2_640-480.jpg', 'resources/pixelate_mod_2_640-480.jpg');
        unlink('resources/pixelate_mod_2_640-480.jpg');
    }

    public function test_it_pixelates_an_image_with_higher_intensity()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/pixelate_int_80_640-480.jpg');
        $effect = new EffectPixelate(80, 4);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/pixelate_int_80_640-480.jpg', 'resources/pixelate_int_80_640-480.jpg');
        unlink('resources/pixelate_int_80_640-480.jpg');
    }

    public function test_it_pixelates_an_image_with_lower_intensity()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/pixelate_int_25_640-480.jpg');
        $effect = new EffectPixelate(25, 4);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/pixelate_int_25_640-480.jpg', 'resources/pixelate_int_25_640-480.jpg');
        unlink('resources/pixelate_int_25_640-480.jpg');
    }
}
