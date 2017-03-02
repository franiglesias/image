<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectResizeFit;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Models\Image;

class EffectResizeFitTest extends EffectTestCase
{
    public function test_it_resizes_an_image_to_fit_in_a_larger_canvas()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/resize_fit_800_800.jpg');
        $effect = new EffectResizeFit(new Size(800, 800));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/resize_fit_800_800.jpg', 'resources/resize_fit_800_800.jpg');
        unlink('resources/resize_fit_800_800.jpg');
    }

    public function test_it_resizes_an_image_to_fit_in_a_smaller_canvas()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/resize_fit_400_400.jpg');
        $effect = new EffectResizeFit(new Size(400, 400));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/resize_fit_400_400.jpg', 'resources/resize_fit_400_400.jpg');
        unlink('resources/resize_fit_400_400.jpg');
    }
}
