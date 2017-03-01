<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Applies a blur effect on an image.
 *
 * @author Fran Iglesias
 */
class EffectBlur extends Effect
{
    public function __construct($intensity = 30)
    {
        $this->maxIntensity = 10;
        $this->intensity = $this->normalize($intensity);
    }

    public function apply(ImageInterface $image)
    {
        for ($i = 0; $i <= $this->intensity; ++$i) {
            $this->applyBlur($image);
        }
        $this->brightnessCorrection($image);
    }

    // Steps

    private function applyBlur($image)
    {
        imagefilter($image->get(), IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image->get(), IMG_FILTER_GAUSSIAN_BLUR);
    }

    private function brightnessCorrection($image)
    {
        imagefilter($image->get(), IMG_FILTER_BRIGHTNESS, $this->intensity);
    }
}
