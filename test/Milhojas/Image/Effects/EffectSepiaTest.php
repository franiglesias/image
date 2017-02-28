<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectSepia;

class EffectSepiaTest extends EffectTestCase
{
    public function test_it_colorizes_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/sepia640-480.jpg');
        $effect = new EffectSepia();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/sepia640-480.jpg', 'resources/sepia640-480.jpg');
        unlink('resources/sepia640-480.jpg');
    }

    public function test_it_sepias_an_image_with_low_intensity()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/sepia_int_20_640-480.jpg');
        $effect = new EffectSepia(20);
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/sepia_int_20_640-480.jpg', 'resources/sepia_int_20_640-480.jpg');
        unlink('resources/sepia_int_20_640-480.jpg');
    }
}
