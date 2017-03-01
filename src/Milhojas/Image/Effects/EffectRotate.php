<?php

namespace Milhojas\Image\Effects;

use Milhojas\Image\Interfaces\ImageInterface;
use Milhojas\Image\Values\Color;

/**
 * Rotates an image.
 */
class EffectRotate extends Effect
{
    protected $degrees;

    public function __construct($degrees)
    {
        $this->degrees = $degrees;
    }

    public function apply(ImageInterface $image)
    {
        $Transparent = new Color('000', 0);
        $tmp = imagerotate($image->get(), $this->degrees, $Transparent->get(), 0);
        imagedestroy($image->get());
        $image->set($tmp);
        imagealphablending($image->get(), false);
        imagesavealpha($image->get(), true);
    }
}
