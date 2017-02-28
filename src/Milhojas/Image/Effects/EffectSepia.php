<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Values\Color;
use Milhojas\Image\Interfaces\ImageInterface;

/**
 * Old sepia effect, derived from colorize.
 *
 * @author Fran Iglesias
 */
class EffectSepia extends EffectColorize
{
    public function __construct($intensity = 50)
    {
        parent::__construct(new Color('8f633f'), $intensity);
    }

    public function apply(ImageInterface $image)
    {
        return parent::apply($image);
    }
}
