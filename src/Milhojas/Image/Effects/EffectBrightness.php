<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Changes the luminosity of a image from -100 to 100.
 *
 * @author Fran Iglesias
 */
class EffectBrightness extends AbstractEffect
{
    public function __construct($intensity = 20)
    {
        $this->maxIntensity = 100;
        $this->intensity = $this->normalize($intensity);
    }

    public function apply(ImageInterface $image)
    {
        imagefilter($image->get(), IMG_FILTER_BRIGHTNESS, $this->intensity);
    }
}
