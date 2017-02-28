<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectGrayscale;

class EffectGrayscaleTest extends EffectTestCase
{
    public function test_it_converts_an_image_to_grayscale()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/grayscale640-480.jpg');
        $effect = new EffectGrayscale();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/grayscale640-480.jpg', 'resources/grayscale640-480.jpg');
        unlink('resources/grayscale640-480.jpg');
    }
}
