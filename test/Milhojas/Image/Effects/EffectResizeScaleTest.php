<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectResizeScale;
use Milhojas\Image\Values\Size;
use Milhojas\Image\Models\Image;

class EffectResizeScaleTest extends EffectTestCase
{
    public function test_it_resizes_an_image_scaling_to_larger_canvas()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/resize_scale_800_800.jpg');
        $effect = new EffectResizeScale(new Size(800, 800));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/resize_scale_800_800.jpg', 'resources/resize_scale_800_800.jpg');
        unlink('resources/resize_scale_800_800.jpg');
    }

    public function test_it_resizes_an_image_scaling_to_smaller_canvas()
    {
        $image = Image::fromPath('resources/test640-480.jpg');
        $test = $image->duplicateToPath('resources/resize_scale_400_400.jpg');
        $effect = new EffectResizeScale(new Size(400, 400));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/resize_scale_400_400.jpg', 'resources/resize_scale_400_400.jpg');
        unlink('resources/resize_scale_400_400.jpg');
    }
}
