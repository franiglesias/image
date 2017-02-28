<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectSmooth;

class EffectSmoothTest extends EffectTestCase
{
    public function test_it_colorizes_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/smooth640-480.jpg');
        $effect = new EffectSmooth();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/smooth640-480.jpg', 'resources/smooth640-480.jpg');
        unlink('resources/smooth640-480.jpg');
    }
}
