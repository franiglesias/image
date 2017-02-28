<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Creates a nice pictorical effect, much like drew by hand.
 *
 * @author Fran Iglesias
 */
class EffectSketch extends AbstractEffect
{
    public function __construct()
    {
        $this->intensity = 50;
    }

    public function apply(ImageInterface $Image)
    {
        $this->Image = $Image;
        $this->sketch();
        $this->smooth();
    }

    private function sketch()
    {
        imagefilter($this->Image->get(), IMG_FILTER_MEAN_REMOVAL);
        imagefilter($this->Image->get(), IMG_FILTER_CONTRAST, -$this->intensity);
    }

    private function smooth()
    {
        imagefilter($this->Image->get(), IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($this->Image->get(), IMG_FILTER_GAUSSIAN_BLUR);
    }
}
