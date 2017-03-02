<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectGrayscale;
use Milhojas\Image\Models\Image;

class EffectGrayscaleTest extends EffectTestCase
{
    public function test_it_converts_an_image_to_grayscale()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/grayscale640-480.jpg');
        $effect = new EffectGrayscale();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/grayscale640-480.jpg', 'resources/grayscale640-480.jpg');
        unlink('resources/grayscale640-480.jpg');
    }
}
