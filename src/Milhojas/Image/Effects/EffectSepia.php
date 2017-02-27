<?php

use Milhojas\Image\effects\ImageColorize;

/**
 * Old sepia effect, derived from colorize.
 *
 * @author Fran Iglesias
 */
class EffectSepia extends ImageColorize
{
    public function __construct(ImageInterface $Image, $intensity = 50)
    {
        parent::__construct($Image, new ImageColor('8f633f'), $intensity);
    }
}
