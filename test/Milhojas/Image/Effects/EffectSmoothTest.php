<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectSmooth;
use Milhojas\Image\Models\Image;

class EffectSmoothTest extends EffectTestCase
{
    public function test_it_colorizes_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/smooth640-480.jpg');
        $effect = new EffectSmooth();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/smooth640-480.jpg', 'resources/smooth640-480.jpg');
        unlink('resources/smooth640-480.jpg');
    }
}
