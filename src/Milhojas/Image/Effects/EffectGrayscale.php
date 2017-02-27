<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Converts an image to Grayscale.
 *
 * @author Fran Iglesias
 */
class EffectGrayscale extends AbstractEffect
{
    public function __construct()
    {
    }

    public function apply(ImageInterface $image)
    {
        imagefilter($image->get(), IMG_FILTER_GRAYSCALE);
    }
}
