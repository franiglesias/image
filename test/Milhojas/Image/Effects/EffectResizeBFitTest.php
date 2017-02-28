<?php

namespace Test\Image\Effects;

use Milhojas\Image\Effects\EffectResizeBfit;
use Milhojas\Image\Values\Size;

class EffectResizeBFitTest extends EffectTestCase
{
    public function test_it_resizes_an_image_to_fit_in_a_larger_canvas()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/resize_bfit_800_800.jpg');
        $effect = new EffectResizeBfit(new Size(800, 800));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/resize_bfit_800_800.jpg', 'resources/resize_bfit_800_800.jpg');
        unlink('resources/resize_bfit_800_800.jpg');
    }

    public function test_it_resizes_an_image_to_fit_in_a_smaller_canvas()
    {
        $image = $this->dispatcher->get('resources/test640-480.jpg');
        $test = $this->dispatcher->duplicate($image, 'resources/resize_bfit_400_400.jpg');
        $effect = new EffectResizeBfit(new Size(400, 400));
        $effect->write($test);
        $this->assertImagesAreEqual('resources/test/resize_bfit_400_400.jpg', 'resources/resize_bfit_400_400.jpg');
        unlink('resources/resize_bfit_400_400.jpg');
    }
}
