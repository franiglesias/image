<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectSketch;
use Milhojas\Image\Models\Image;

class EffectSketchTest extends EffectTestCase
{
    public function test_it_colorizes_an_image()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/sketch640-480.jpg');
        $effect = new EffectSketch();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/sketch640-480.jpg', 'resources/sketch640-480.jpg');
        unlink('resources/sketch640-480.jpg');
    }
}
