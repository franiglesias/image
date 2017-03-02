<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectRotate;
use Milhojas\Image\Models\Image;

class EffectRotateTest extends EffectTestCase
{
    public function test_it_rotates_image_60_degrees()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/rotate_60.jpg');
        $effect = new EffectRotate(60);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/rotate_60.jpg', 'resources/rotate_60.jpg');
        unlink('resources/rotate_60.jpg');
    }

    public function test_it_rotates_image_90_degrees()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/rotate_90.jpg');
        $effect = new EffectRotate(90);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/rotate_90.jpg', 'resources/rotate_90.jpg');
        unlink('resources/rotate_90.jpg');
    }

    public function test_it_rotares_image_180_degrees()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/rotate_180.jpg');
        $effect = new EffectRotate(180);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/rotate_180.jpg', 'resources/rotate_180.jpg');
        unlink('resources/rotate_180.jpg');
    }
}
