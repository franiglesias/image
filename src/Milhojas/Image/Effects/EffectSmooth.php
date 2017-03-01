<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Produces a somehow diffuminated effect.
 *
 * @author Fran Iglesias
 */
class EffectSmooth extends Effect
{
    public function __construct($intensity = 30)
    {
        $this->maxIntensity = 10;
        $this->intensity = $this->normalize($intensity);
    }

    public function apply(ImageInterface $image)
    {
        imagefilter($image->get(), IMG_FILTER_SMOOTH, $this->intensity);
        imagefilter($image->get(), IMG_FILTER_GAUSSIAN_BLUR);
    }
}
