<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectSketch;

class EffectSketchTest extends EffectTestCase
{
    public function test_it_colorizes_an_image()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/sketch640-480.jpg');
        $effect = new EffectSketch();
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/sketch640-480.jpg', 'resources/sketch640-480.jpg');
        unlink('resources/sketch640-480.jpg');
    }
}
