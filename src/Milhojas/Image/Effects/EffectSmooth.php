<?php

use Milhojas\Image\Effects\AbstractEffect;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Produces a somehow diffuminated effect.
 *
 * @author Fran Iglesias
 */
class EffectSmooth extends AbstractEffect
{
    public function __construct(ImageInterface $Image, $intensity = 30)
    {
        $this->Image = $Image;
        $this->maxIntensity = 10;
        $this->intensity = $this->normalize($intensity);
    }

    public function apply()
    {
        imagefilter($this->Image->get(), IMG_FILTER_SMOOTH, $this->intensity);
        imagefilter($this->Image->get(), IMG_FILTER_GAUSSIAN_BLUR);
    }
}
